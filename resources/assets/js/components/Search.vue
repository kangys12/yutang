<template>
    <div>
        <form class="venue_wrap" >

            <van-search
                    label="地址"
                    v-model="value"
                    placeholder="请输入搜索关键词"
                    show-action
                    shape="round"
                    @keyup.enter="onSearch"
                    @search="onSearch"
            >
                <div slot="action" @click="onSearch">搜索</div>
            </van-search>

            <template v-for="venue in venues" class="item">
                <!--<dt><img src="/images/venue_m_icon.jpg"/></dt>-->
                <!--<dd>-->
                    <!--<h3>{{venue.name}}</h3>-->
                    <!--<p>{{venue.id}}=====>{{venue.type_name}}</p>-->
                    <!--<p class="address"><span>朝阳区</span><b>32.6km</b></p>-->
                    <!--<p><span>线上预定</span><b>10元每小时</b></p>-->
                <!--</dd>-->
                <venue-ttem :item="venue"></venue-ttem>
            </template>


        </form>

    </div>
</template>

<script>
    export default {
        name: "Search",
        data(){
          return{
              value:'',
              venues:[]
          }
        },
        methods:{
            onSearch(){
                axios.post('/m/venue/search',{'value':this.value}).then(res=>{
                    this.venues=res.data.data;
                })
            }
        }
    }
</script>

<style scoped>
    .venue_wrap{
        width: 100%;
        padding: .2rem .3rem;
        padding-bottom: 1.5rem;
        /*padding-top: 1.4rem;*/
    }
    .item {
        width: 100%;
        /*padding: .2rem 0;*/
        display: flex;
        border-bottom: 1px #ccc solid;

    }
    .item>dt{
        width: 1.95rem;
        margin-right: 0.35rem;
    }
    .item>dt>img{
        width: 100%;
    }
    .item>dd{

        width: 4.55rem;
    }
    .item>dd h3{
        margin: 0;
        padding: 0;
        font-size: .3rem;
    }
    .item .address{

        border-bottom: 1px #ccc solid;

    }
    .item>dd p b{
        float: right;
        font-weight: 400;
        color: #ed8629;

    }
    .more{
        width: 100%;
        height: .8rem;
        line-height: .8rem;
        font-size: .3rem;
        background-color: #ccc;
        text-align: center;

    }
</style>