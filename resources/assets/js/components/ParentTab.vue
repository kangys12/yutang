<template>
    <ul class="tab">
        <!--<router-link to="/venue" tag="li"><i class="glyphicon glyphicon-home"></i>场馆</router-link>-->
        <!--<router-link to="/game" tag="li"><i class="glyphicon glyphicon-th-list"></i>活动</router-link>-->
        <!--<router-link to="/find" tag="li"><i class="glyphicon glyphicon-map-marker"></i>发现</router-link>-->
        <!--<router-link to="/about" tag="li"><i class="glyphicon glyphicon-user"></i>我的</router-link>-->
        <child title="场馆" mark="venue" @my_mark="get_mark" :sel="sel_mark"><i class="glyphicon glyphicon-home" slot="icon"></i></child>
        <child title="活动" mark="game"  @my_mark="get_mark" :sel="sel_mark"><i class="glyphicon glyphicon-th-list" slot="icon"></i></child>
        <child title="发现" mark="find"  @my_mark="get_mark" :sel="sel_mark"><i class="glyphicon glyphicon-map-marker" slot="icon"></i></child>
        <child title="我的" mark="about" @my_mark="get_mark" :sel="sel_mark"><i class="glyphicon glyphicon-user" slot="icon"></i></child>

    </ul>
</template>

<script>
    export default {
        name: "parentTab",
        data(){
          return {
              sel_mark:"venue"
            }
        },
        methods:{
            get_mark(mark){
                this.sel_mark=mark;
            }
        }
    }
</script>

<style scoped>

</style>