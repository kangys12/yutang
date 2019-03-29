<template>
    <div>
        <div class="order_wrap">
            <van-nav-bar title="标题" left-text="返回" left-arrow  @click-left="onClickLeft">
                <van-icon name="search" slot="right" />
            </van-nav-bar>
            <div class="dates_wrap">
                <div class="dates">
                    <dl v-for="(item,index) in dates " :class="{active:cur_index==index}" @click="fn(index,item)">
                        <dt>{{item.week}}</dt>
                        <dd>{{item.date}}</dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="order_body">
            <div class="time_list" >
                <div v-for="time in times">{{time+":00"}}</div>
            </div>
            <div>
                <div class="date_list" v-for="(filed_list,date,index) in date_list" :class="{ac:index == cur_index}">
                    <dl v-for="(time_price,filed) in filed_list">
                        <dt>{{filed+"号场"}}</dt>
                        <template v-for="(value,time) in time_price">
                            <dd  v-if="value.is_ordered" class="ordered">{{value.price}}
                            </dd>
                            <dd  v-else @click="order" :filed="filed" :time="time" :price="value.price">
                                {{value.price}}
                            </dd>
                        </template>
                    </dl>
                </div>
            </div>

        </div>
        <van-submit-bar
            :price="price"
            button-text="提交订单"
            type="info"
            @submit="onSubmit"
        >
            <van-checkbox v-model="params">全选</van-checkbox>
            <span slot="tip">
            你的收货地址不支持同城送, <span>修改地址</span>
          </span>
        </van-submit-bar>
    </div>
</template>

<script>
    export default {
        name: "Order",
        data(){
          return{
              dates:[],
              venue_id:'',
              cur_index:0,
              times:[],
              date_list:[],
              date:'',
              price:0,
              params:{
                  venue_id:'',
                  order_date:'',
                  items:[]
              },
          }
        },
        created(){
            // return false;
            this.dates=this.$route.params.dates;
            this.venue_id=this.$route.params.id;
            this.params.venue_id=this.venue_id;
            console.log(this.$route.params);

            this.params.order_date=this.$route.params.date.date;

            axios.get('/m/order/times/'+this.venue_id).then(res=>{
                //console.log(res.data.date);
                this.times=res.data.times;
                this.date_list=res.data.date_list;
                this.date=res.data.date;
            })



        },
        mounted(){
            //this.fn(0);
        },
        methods:{
            onClickLeft() {
                this.$router.push({ name: 'venue_detail', params: { id: this.venue_id }})
            },
            fn(index,item){
                //this.$router.push({name:'date_list'})// $('.date_list').eq(index).show().siblings().hide();
                this.cur_index=index;
                //this.$router.push({path:'/data_list/'+this.cur_index});

                this.params.order_date = item.date;
                console.log(this.params.order_date);
            },

            order(event){
                var field=event.target.getAttribute('filed');
                var time=event.target.getAttribute('time');
                var price=event.target.getAttribute('price');
                var mark=time+"_"+field;
                var $obj=$(event.target);
                if ($obj.hasClass('select')){
                    $obj.removeClass('select');
                    // var index=this._get_index(mark);
                    this.price=this.price-price*100;
                    this.params.items.forEach((item,index)=>{
                        if (mark==item.mark){
                            this.params.items.splice(index,1);
                        }
                    })
                } else {
                    if (this.params.items.length==4){
                        this.$toast('最多只能添加4个');
                        return false;
                    }
                    $obj.addClass('select');
                    this.params.items.push({"time":time,"field":field,"mark":mark});
                    this.price=this.price+price*100;
                }
                console.log(this.params.items);
            },
           /* _get_index(mark){
                for (let index=0;index<this.params.items.length;index++){
                    if (mark==this.params.items[index].mark){
                        return index;
                    }
                }
            },*/
            onSubmit(){

                console.log(this.params);
                //return false;

                axios.post('/m/order/save',{'params':this.params}).then(res=>{
                    //console.log(res);
                    if (res.data.code==200){
                        this.$toast('添加成功！');
                    }
                })
            }
        }
    }
</script>

<style scoped>
    .dates_wrap{
        width: 100%;
        overflow: auto;
    }
    .dates{
        width: 16.6rem;
        /*padding-left: .3rem;*/
        background-color: #e3e3e3;
        display: flex;
    }
    .dates dl{
        border: 1px #ccc solid;
        width:2.3rem;
        height: 1.5rem;
        background-color: #fff;
        display: flex;
        /*border-radius: .08rem;*/
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        margin: .1rem 0;
    }
    .dates dd{
        font-size: .22rem;
    }
    .dates .active{
        border-bottom: 2px royalblue solid;
        /*color: royalblue;*/
    }
    .van-nav-bar{
        background-color: royalblue;
        color: #fff;
    }
    .van-nav-bar__title,.van-nav-bar__text,.van-nav-bar .van-icon{
        color:#fff;
    }
    .order_body{
        display: flex;
        /*float: left;*/
    }
    .time_list{
        margin-left: .1rem;
        width: 1rem;
        padding-top: 1.2rem;
        padding-bottom: 1.4rem;
        text-align: center;
    }
    .time_list div{
        margin-bottom: .45rem;
        text-align: center;
    }
    .date_list{
        /*display: flex;*/
        width: 6.35rem;
        display: none;
    }
    .ac{
        display: block;
    }
    .date_list dl{
        /*padding-top: .5rem;*/
        text-align: center;
        float: left;
        width: 1.2rem;
        height: 15.33rem;
        border: 1px #ccc solid;
    }
    .date_list dl dt,dd{
        height: .9rem;
        line-height: .9rem;
        border-bottom: 1px #ccc solid;
    }
    .date_list dl dd.select{
        background-color: royalblue;
        color: #fff;
    }
    .date_list dl dd.ordered{
        background-color: #ccc;
        color: #fff;
    }
</style>