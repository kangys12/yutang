<template>
   <div>
       <van-nav-bar title="标题" left-text="返回" left-arrow  @click-left="onClickLeft"
                    @click-right="onClickRight">
           <van-icon name="plus" slot="right" />
       </van-nav-bar>
   </div>
</template>

<script>
    export default {
        name: "MyCreateGames",
        created(){
            axios.get('/m/game/my_create_games').then(res=>{
                console.log(res)

            })
        },
        methods:{
            onClickLeft() {
                this.$router.push('/about')
            },
            onClickRight() {
                this.$router.push('/create_game')
            },
        }
    }
</script>

<style scoped>

</style>