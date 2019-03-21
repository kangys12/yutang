<template>
    <ul class="types">
        <li class="type" @click="toggle_type(0)">全部</li>
        <li v-for="type in types" @click="toggle_type(type.id)" class="type">{{type.name}}</li>
    </ul>
</template>

<script>
    import bus from '../bus';
    export default {
        name: "Types",
        data(){
            return {
                types:[],
            }
        },
        created(){
            axios.get('/venue/types').then(res=>{
                this.types=res.data;
            })
        },
        mounted(){
            $('.type').eq(0).addClass('active');
        },
        methods:{
            toggle_type(type_id){
                $('.type').eq(type_id).addClass('active').siblings().removeClass('active');
                bus.$emit('change_type',type_id);
            }
        }
    }
</script>

<style scoped>
    .types{

        display: flex;
        width: 100%;
        height: 1rem;
        flex-direction: row;
        align-items: center;
        justify-content: space-around;
        background-color: #fff;
        position: fixed;
        left: 0;
        top: 0;
    }
    .types li{
        display: flex;
        height: .5rem;
    }
    .types li.active{
        color: royalblue;
        font-weight: bold;
    }
</style>