<template>
    <div>
        <van-nav-bar title="标题" left-text="返回" left-arrow  @click-left="onClickLeft"
                     @click-right="onClickRight">
            <van-icon name="search" slot="right" />
        </van-nav-bar>
        <div class="detail">
            <dl class="item">
                <dt><img src="/images/list_icon.jpg"/></dt>
                <dd>
                    <h3>{{venue.name}}</h3>
                    <p>{{venue.address}}</p>
                    <p>营业时间：8:00-23:00</p>
                </dd>
            </dl>
            <div class="tel-wrap">
                <p>{{venue.tel}}</p>
                <i class="glyphicon glyphicon-earphone"></i>
            </div>
            <div>
                <div class="type">{{venue.type_name}}</div>
                <div class="dates_wrap">
                    <div class="dates">
                        <dl v-for="(item,index) in dates" :class="{active:cur_index==index}" @click="fn(index,item)">
                            <dt>{{item.week}}</dt>
                            <dd>{{item.date}}</dd>
                            <dd class="ac">充足</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <van-cell title="单元格" is-link  value="内容" />
            <van-cell title="单元格" is-link  value="内容" />
            <van-cell title="单元格" is-link  value="内容" />
        </div>
    </div>
</template>

<script>
    export default {
        name: "Detail",
        data(){
          return{
              venue_id:'96',
              venue:{},
              dates:[],
              cur_index:0
          }
        },
        created(){
            //this.venue_id=this.$route.params.id;
            axios.get('/m/venue/detail/'+this.venue_id).then(res=>{
                this.venue=res.data;
                this.dates=res.data.dates;
            })
        },
        methods:{
            onClickLeft() {
                this.$router.push('/venue')
            },
            onClickRight() {
                this.$router.push('/search')
            },
            fn(index,date){
                this.cur_index=index;
                this.$router.push({name:'order',params:{id:this.venue.id,dates:this.dates,date:date}})
                //this.$router.push({path:'/order/'+this.venue.id})
            }
        }
    }
</script>

<style scoped>
    /*.detail{*/
        /*width: 100%;*/

    /*}*/
    .item {
        width: 100%;
        padding: .2rem .3rem;
        display: flex;
    }
    .item>dt{
        width: 1.95rem;
        margin-right: 0.35rem;
    }
    .item>dt>img{
        width: 100%;
    }
    .item>dd{
        width: 4.6rem;
    }
    .item>dd h3{
        margin: 0;
        padding: 0;
        font-weight: bold;
        font-size: .3rem;
    }
    .item>dd>p{
        margin: 0;
    }
    .tel-wrap{
        height: 1.08rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 .3rem;
        border-top: 1px #ccc solid;
        border-bottom: 1px #ccc solid;
    }
    .type{
        width: 1.6rem;
        height: .8rem;
        line-height: .8rem;
        text-align: center;
        border-bottom: 1px royalblue solid;
        color: royalblue;
    }
    .dates_wrap{
        width: 100%;
        overflow: auto;
    }
    .dates{
        width: 12.6rem;
        padding-left: .3rem;
        background-color: #e3e3e3;
        display: flex;
    }
    .dates dl{
        border: 1px #ccc solid;
        width:1.5rem;
        height: 1.6rem;
        background-color: #fff;
        display: flex;
        border-radius: .08rem;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        margin: .1rem;
    }
    .dates dd{
        font-size: .22rem;
    }
    .dates .active{
        border: 1px royalblue solid;
        color: royalblue;
    }
    .dates .ac{
        color: aquamarine;
    }
    .van-nav-bar{
        background-color: royalblue;
        color: #fff;
    }
    .van-nav-bar__title,.van-nav-bar__text,.van-nav-bar .van-icon{
        color:#fff;
    }

</style>