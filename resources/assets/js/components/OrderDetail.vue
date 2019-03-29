<template>
    <div>
        <div class="detail_header">
            <van-nav-bar title="订单详情" left-text="返回" left-arrow  @click-left="onClickLeft">
                <van-icon name="search" />
            </van-nav-bar>
        </div>
        <div class="detail_body">
            <van-cell :title="'订单号：'+order.venue_id"   value="已取消" />
            <van-cell :title="'验证手机号：'+order.venue.tel"  />
            <van-card
                    num="2"
                    price="2.00"
                    desc="描述信息"
                    :title="order.venue.name"
                    :desc="order.venue.address"
                    thumb="/images/venue_m_icon.jpg"
            />
            <div class="order_detail">
                <h3>乒乓球场地预定</h3>
                <b>订单日期：{{order.order_date}}</b>
                <p>场地：{{order.field}}号场地 时间:{{order.order_time}}:00</p>
            </div>
            <van-cell :title="order.venue.tel">
                <!--<van-cell title="单元格" slot="right-icon" icon="location-o" name="phone-o" class="custom-icon" />-->
                <van-icon slot="right-icon" name="phone-o" class="custom-icon" />
            </van-cell>
            <van-cell title="购票须知" is-link />
            <van-cell-group title="" class="check">
                <van-cell title="支付方式" value="在线支付" />
                <van-cell title="单元格" value="内容" size="large" label="描述信息" />
            </van-cell-group>
            <div class="btn-wrap">
                <van-button plain type="primary" size="small">朴素按钮</van-button>
                <van-button plain type="danger"  size="small">朴素按钮</van-button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "OrderDetail",
        data(){
            return{
                // order_id:''
                order:{
                    venue:{
                        name:'',
                        address:''

                    }
                }
            }
        },
        created(){
            var order_id=this.$route.params.id
            axios.get('/m/order/detail/'+order_id).then(res=>{
                console.log(res);
                this.order=res.data;
            })

        },
     methods:{
         onClickLeft() {
             this.$router.push('/my_orders')
         },
     }
    }
</script>

<style scoped>
    .van-nav-bar{
        background-color: royalblue;
        color: #fff;
    }
    .van-nav-bar__title,.van-nav-bar__text,.van-nav-bar .van-icon{
        color:#fff;
    }
    .order_detail{
        border-top: 1px #ccc solid;
        border-bottom: 1px #ccc solid;
    }
    .detail_body{
        padding: 0 .2rem;
    }
    .van-cell{
        border-bottom: 1px #ccc solid;
    }
    .order_detail{
        padding-left: .1rem;
    }
    .check{
        margin-top: .25rem;
    }
    .btn-wrap{
        width: 100%;
        float: right;
        text-align: right;
        /*display: flex;*/
        /*bottom: 0;right: 0;*/
        height:1.1rem;
        line-height: 1.1rem;
    }
</style>