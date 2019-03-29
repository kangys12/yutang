<template>
    <div>
        <div class="detail_header">
            <van-nav-bar title="创建活动" left-text="返回" left-arrow  @click-left="onClickLeft">
                <van-icon name="search" />
            </van-nav-bar>
        </div>
        <!--<van-cell-group title="活动信息">-->
            <!--<van-cell title="单元格" value="内容" />-->
        <!--</van-cell-group>-->
        <van-cell-group>
            <van-field v-model="title" placeholder="请输入标题" />
        </van-cell-group>
        <div>
            <template>
                <van-cell-group title="活动信息">
                    <van-cell title="项目活动" :value="my_type" @click="sel_type"/>
                </van-cell-group>
            </template>
        </div>

        <van-cell-group>

            <van-cell title="时间" :value="resDate" is-link @click="popup"/>
            <van-cell title="地点" value="请选择" is-link/>
        </van-cell-group>
        <van-cell-group title="活动情况" class="header">
            <van-cell title="活动人数"  islink>
                <van-stepper v-model="num" />
            </van-cell>
            <van-cell-group>
                <van-cell title="活动详情"/>
                <div class="form">
                    <textarea class="form-control" rows="5" placeholder="请输入...." v-model="des"></textarea>
                </div>
            </van-cell-group>
        </van-cell-group>


        <van-popup v-model="show" position="bottom">
            <van-datetime-picker
                    v-model="currentDate"
                    type="datetime"
                    :min-date="minDate"
                    :max-date="maxDate"
                    @confirm="confirm"
            />
        </van-popup>
        <van-popup v-model="bool" position="bottom">
            <van-radio-group v-model="type_id">
                <van-cell-group>
                    <template v-for="type in types">
                        <van-cell :title="type.name" clickable @click="sel(type.id+'',type.name)">
                            <van-radio :name="type.id+''" />
                        </van-cell>
                    </template>
                </van-cell-group>
            </van-radio-group>
        </van-popup>
        <div class="forms"><van-button plain type="primary" size="large" class="btn-b" @click="submit">提交活动</van-button></div>
    </div>
</template>

<script>
    export default {
        name: "CreateGame",
        data(){
            return{
                title:'',
                type_id:'1',
                venue_id:96,
                message:'',
                show:false,
                bool:false,
                minHour: 10,
                maxHour: 20,
                minDate: new Date(),
                maxDate: new Date(2019, 10, 1),
                currentDate: new Date(),
                resDate:'当前未选择时间',
                my_type:'选择项目',
                types:[],
                des:'',
                num:1,
                params:{}
            }
        },
        created(){
            axios.get('/m/order/types').then(res=>{
                console.log(res);
                this.types=res.data;
            })

        },
        methods:{
            onClickLeft() {
                this.$router.push('/my_orders')
            },
            popup(){
                this.show=true;

            },
            sel_type(){
                this.bool=true;

            },
            sel(index,my_type){
                this.type_id=index;
                this.my_type=my_type;
                this.bool=false;
            },
            confirm(){
                var d =this.currentDate;
                var  resDate = d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate() + ' ' + d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds();
                this.resDate=resDate;
                this.show=false;
            },
            submit(){

                this.params.venue_id=this.venue_id;
                this.params.type_id=this.type_id;
                this.params.game_date=this.resDate;
                this.params.num=this.num;
                this.params.des=this.des;
                this.params.title=this.title;
                axios.post('/m/game/save',this.params).then(res=>{
                    console.log(res);
                    //this.types=res.data;
                })

            }
        }
    }
</script>

<style scoped>
    .header{
        height: 1rem;
        line-height: 1rem;
    }
.ra{
    display: flex;
}
    .btn-b{
        position: fixed;
        bottom: 0;
        left: 0;
    }
    .van-field>textarea{
        border:1px #ccc solid;
    }
.form{
    padding: 0 .3rem;
}
    .forms{
        padding: 0 .3rem;
    }
    .van-button{
        border-radius: 25px;
    }
</style>