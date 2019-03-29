<template>
    <div>
        <div class="header">
            <dl  v-if="!islogin">
                <dt><img :src="'/upload/'+form_data.icon"/></dt>
                <dd>{{form_data.name}}</dd>
            </dl>
            <dl v-else="islogin">
                <dt><img src="/upload/01.jpg"/></dt>
                <dd><b @click="register">注册</b><b @click="lgoin">登录</b></dd>
            </dl>
        </div>
        <div>
            <van-cell title="单元格" is-link />
            <van-cell title="我的订单" is-link to="/my_orders" />
            <van-cell title="单元格" is-link  value="内容" />
            <van-cell title="单元格" is-link  value="内容" />
            <van-cell title="单元格" is-link  value="内容" />
        </div>
    </div>

</template>

<script>
    export default {
        name: "About",
        data(){
            return{
                form_data:{
                    name:"",
                    icon:"01.jpg",
                },
                islogin:false
            }
        },
        created(){
            axios.get('/m/user/info').then(res=>{
                this.form_data=res.data;
                console.log(this.form_data)
                if (res.data.code=='3000'){
                    this.islogin=true;
                }
            })
        },
        methods:{
            lgoin(){
                this.$router.push('/Login');
            },
            register(){
                this.$router.push('/Register');

            }
        }
    }
</script>

<style scoped>
.header{
    width: 100%;
    height: 3.9rem;
    /*padding-top: 1.5rem;*/
    background-color: royalblue;
}
    .header dt>img{
        width: 1.5rem;
        height: 1.5rem;
        margin-top:.8rem;
        border-radius: 50%;

    }
.header dd{
    color: #fff;
    text-align: center;
}
.header dl{
    width: 1.5rem;
    height: 1.8rem;
    text-align: center;
    /*display: flex;*/
    margin: 0 auto;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}
</style>