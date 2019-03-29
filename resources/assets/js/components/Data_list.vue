<template>
    <div>data_list
        <li v-for="(item,index) in data_list" v-if="index==cur_index">{{item}}</li>

    </div>
</template>

<script>
    export default {
        name: "Data_list",
        data(){
            return{
              data_list:[
                     '0',
                     '1',
                     '2',
                     '3',
                     '4',
                     '5',
                     '6'
              ],
              cur_index:0 ,
            }
        },
        watch:{
            "$route":{
                handler:function (route) {
                    this.cur_index=route.params.index;
                }
            }
        },
        created(){

        },





    }
</script>

<style scoped>

</style>