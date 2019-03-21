<template>
    <form class="register">
        <div class="form-group">
            <label for="name">用户名</label>
            <input type="text" class="form-control" id="name" placeholder="Username" v-model="form_data.name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">邮箱</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" v-model="form_data.email">
        </div>
        <div class="form-group">
            <label for="tel">电话</label>
            <input type="tel" class="form-control" id="tel" placeholder="tel" v-model="form_data.tel">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">密码</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" v-model="form_data.password">
        </div>
        <div class="form-group">
            <label for="pwd2">确认密码</label>
            <input type="password" class="form-control" id="pwd2" placeholder="Password" v-model="form_data.pwd2">
        </div>
        <div class="form-group">
            <label for="exampleInputFile">上传文件</label>
            <input type="file" id="exampleInputFile">
            <p class="help-block">Example block-level help text here.</p>
        </div>
        <button type="button" class="btn btn-info" @click="submit">Submit</button>
    </form>
</template>

<script>
    export default {
        name: "Register",
        data(){
            return{
                form_data:{
                    name:'',
                    email:"",
                    tel:"",
                    password:"",
                    pwd2:""
                }

            }

        },
        methods:{
            submit(){
                //console.log(this.form_data);
                axios.post('/m/user/save',this.form_data).then(res=>{
                    console.log(res);


                })
            }
        }
    }
</script>

<style scoped>
    .register{
        padding: .3rem;
    }
</style>