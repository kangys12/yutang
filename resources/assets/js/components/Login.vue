<template>
    <form class="login_wrap">

        <div class="form-group">
            <label for="exampleInputEmail1">邮箱</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" v-model="form_data.email">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">密码</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" v-model="form_data.password">
        </div>

        <button type="button" class="btn btn-info" @click="login">用户登录</button>
    </form>
</template>

<script>
    export default {
        name: "Login.vue",
        data(){
            return{
                form_data:{
                    email:"",
                    password:""
                }
            }
        },
        methods:{
            login(){
                axios.post('/m/user/login',this.form_data).then(res=>{
                    console.log(res);
                    if (res.data.status==200){
                        this.$router.push('/About');
                    }
                })

            }
        }

    }
</script>

<style scoped>
.login_wrap{
    padding: .3rem;
}
</style>