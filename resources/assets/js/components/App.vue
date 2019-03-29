<template>
    <div>
        <router-view></router-view>
        <parent-tab v-if="bool"></parent-tab>
    </div>
</template>

<script>
    export default {
        name: "App",
        data(){
            return{
                bool:true
            }
        },
        watch:{
            "$route":{
                handler:function (route) {

                    var routes=['/venue','/about','/game','/find'];
                    routes.indexOf(route.path)==-1?this.bool=false:this.bool=true;
                    console.log(routes.indexOf(route.path));
                }

            }
        }
    }
</script>

<style scoped>

</style>