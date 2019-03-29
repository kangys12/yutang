<template>
    <div>
        <div class="order_header">
            <van-nav-bar title="我的订单" left-text="返回" left-arrow  @click-left="onClickLeft">
                <van-icon name="search" />
            </van-nav-bar>
        </div>
        <div class="order_body">
            <van-cell-group>
                <template v-for="order in orders">
                    <van-cell :title="order.venue_name" is-link :to="'order_detail/'+order.id" />
                </template>
            </van-cell-group>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MyOrders",
        data(){
            return{
                orders:[]
            }
        },
        created(){
            axios.get('/m/user/my_orders').then(res=>{
                console.log(res);
                this.orders=res.data;
            })
        },
        methods:{
            onClickLeft() {
                this.$router.push('/about')
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
</style>