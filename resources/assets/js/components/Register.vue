<template>
    <form class="register">
        <div class="form-group" :class="{'has-error':errors.has('name')}">
            <label for="name1">用户名</label>
            <input type="text" data-vv-as="用户名" v-validate="{ required: true, min: 6 }"  name="name" class="form-control" id="name1" placeholder="Username" v-model="form_data.name">
            <span class="help-block" v-show="errors.has('name')">{{errors.first('name')}}</span>
        </div>
        <div class="form-group" :class="{'has-error':errors.has('Email')}">
            <label for="exampleInputEmail1">邮箱</label>
            <input type="email" class="form-control" v-validate="{ required: true, min: 6 }" id="exampleInputEmail1" placeholder="Email" name="Email" v-model="form_data.email">
            <span class="help-block" v-show="errors.has('Email')">{{errors.first('Email')}}</span>
        </div>
        <div class="form-group" :class="{'has-error':errors.has('tel')}">
            <label for="tel">电话</label>
            <input type="tel" class="form-control" v-validate="{ required: true, min: 6 ,max:11}" name="tel" id="tel" placeholder="tel" v-model="form_data.tel">
            <span class="help-block" v-show="errors.has('tel')">{{errors.first('tel')}}</span>

        </div>
        <div class="form-group" :class="{'has-error':errors.has('password')}">
            <label for="exampleInputPassword1">密码</label>
            <input type="password" class="form-control" data-vv-as="密码" v-validate="{ required: true, min: 6 }" name="password" id="exampleInputPassword1" placeholder="Password" v-model="form_data.password">
            <span class="help-block" v-show="errors.has('password')">{{errors.first('password')}}</span>

        </div>
        <div class="form-group">
            <label for="pwd2">确认密码</label>
            <input type="password" class="form-control" id="pwd2" placeholder="Password" v-model="form_data.pwd2">
        </div>
        <div class="form-group">
            <label for="exampleInputFile">上传文件</label>
            <input type="file" id="exampleInputFile" @change="get_img">
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
                    pwd2:"",
                    icon:""
                }
            }
        },
        methods:{
            submit(){
                axios.post('/m/user/save',this.form_data).then(res=>{
                    if (res.status=='200'){
                        this.$toast('注册成功')
                    }
                })
            },
            get_img(event){
                let img=event.target.files[0];
                let form=new FormData();
                form.append('icon',img,img.name);
                axios.post('/m/user/upload',form).then(res=>{
                     console.log(res);
                    if (res.data.code=='200'){
                        this.form_data.icon=res.data.img_name;
                    }
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