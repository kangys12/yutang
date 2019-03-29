<template>
    <div>
        <div class="detail_header">
            <van-nav-bar title="活动详情" left-text="返回" left-arrow  @click-left="onClickLeft">
                <van-icon name="search" />
            </van-nav-bar>
        </div>
        <van-tabs v-model="active">
            <template v-for="date in dates">
                <van-tab>
                    <dl slot="title">
                        <dt>{{date.week}}</dt>
                        <dd>{{date.date}}</dd>
                    </dl>
                    <div class="detail_list">
                        <ul>
                            <li v-for="game in date.list">{{game.title}}</li>
                        </ul>
                    </div>
                </van-tab>
            </template>


        </van-tabs>
    </div>
</template>

<script>
    export default {
        name: "GameList",
        data(){
            return{
                active:3,
                dates:[]
            }
        },
        created(){
            axios.get('/m/game/dates').then(res=>{
                console.log(res);
                this.dates=res.data;
            })
        },
        methods:{
            onClickLeft() {
                this.$router.push('/create_game')
            },
        }

    }
</script>

<style scoped>
    .van-tabs__wrap{
        height: 1rem;
    }
    .detail_list{
        padding: 0 .3rem 0;
    }
</style>