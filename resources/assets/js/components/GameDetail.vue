<template>
    <div>
        <div class="detail_header">
            <van-nav-bar title="活动详情" left-text="返回" left-arrow  @click-left="onClickLeft">
                <van-icon name="search" />
            </van-nav-bar>
        </div>
        <div class="detail_list">
            <ul>
                <li>{{game.title}}==>{{game.des}}
                    <dl>
                        <dt><span>{{game.user.name}}</span>
                            <img :src="'/upload/'+game.user.icon">
                        </dt>
                        <dd>{{game.venue.name}}{{game.venue.address}}</dd>
                        <dd>报名用户：{{game.join_num}}/{{game.venue.num}}</dd>
                    </dl>

                </li>
            </ul>
            <van-button plain type="primary" size="large" class="btn-b" @click="submit(game.id)">加入活动</van-button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "GameDetail",
        data(){
            return{
                game:{}
            }
        },
        created(){
            console.log(this.$route.params)
            this.game=this.$route.params;
        },
        methods:{
            onClickLeft() {
                this.$router.push('/game_list')
            },
            submit(id){
                axios.get('/m/game/join/'+id).then(res=>{
                    console.log(res);
                })
            }
        }
    }
</script>

<style scoped>
    .detail_list{
        padding: 0 .3rem 0;
    }
    img{width: 100%}
    .btn-b{
        border-radius: .4rem;
        position: fixed;
        bottom: 0;
        left: 0;
    }
</style>