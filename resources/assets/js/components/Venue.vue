<template>
   <div class="venue_wrap">
       <types></types>

       <dl v-for="venue in venues" class="item" @click="detail(venue.id)">
           <dt><img src="/images/venue_m_icon.jpg"/></dt>
           <dd>
               <h3>{{venue.name}}</h3>
               <p>{{venue.id}}=====>{{venue.type_name}}</p>
               <p class="address"><span>朝阳区</span><b>32.6km</b></p>
               <p><span>线上预定</span><b>10元每小时</b></p>
           </dd>
       </dl>
       <div class="more" @click="get_more" v-if="!finish"><span v-if="loading">loading...</span>加载更多</div>
       <div v-if="finish">没有更多数据了</div>

   </div>
</template>

<script>
    import bus from '../bus';
    export default {
        name: "Venue",
        // props:['item'],
        data(){
            return {
                venues:[],
                type_id:1,
                page:1,
                url:'',
                finish:false,
                loading:false,
                model:"all_type"
            }
        },
        created(){
            bus.$on('change_type',(type_id)=>{
                //console.log(type_id);
                this.get_venues(type_id);
            });
            axios.get('/venue/my_list').then(res=>{
                this.venues=res.data.data;
            })

        },
        methods:{
            detail(venue_id){
                this.$router.push({ name: 'venue_detail', params: { id: venue_id }})
            },
            get_datas(){
                if (this.finish || this.loading){
                    return false;
                }
                if (this.model=="all_type"){
                    this.url='/venue/my_list?page='+this.page;
                } else {
                    this.url='/venue/get_type/'+this.type_id+'?page='+this.page;
                }
                this.loading=true;
                axios.get(this.url).then(res=>{
                    this.loading=false;

                    if (res.data.data.length==0){this.finish=true;}

                    if (this.page==1) {
                        this.venues=res.data.data;
                    }else{
                        this.venues=this.venues.concat(res.data.data);
                    }
                })
            },
            get_venues(type_id){
                this.page=1;
                this.finish=false;
                this.model=type_id==0? "all_type":"cur_type";
                this.type_id=type_id;
                //this.model="cur_type";
                this.get_datas()
            },
            get_more(){
                this.page++;
                this.get_datas()
            }
        }
    }
</script>

<style scoped>
.venue_wrap{
    width: 100%;
    padding: .2rem .3rem;
    padding-bottom: 1.5rem;
    padding-top: 1.4rem;
}
.item {
    width: 100%;
    /*padding: .2rem 0;*/
    display: flex;
    border-bottom: 1px #ccc solid;

}
.item>dt{
    width: 1.95rem;
    margin-right: 0.35rem;
}
.item>dt>img{
    width: 100%;
}
.item>dd{

    width: 4.55rem;
}
.item>dd h3{
    margin: 0;
    padding: 0;
    font-size: .3rem;
}
.item .address{

    border-bottom: 1px #ccc solid;

}
.item>dd p b{
    float: right;
    font-weight: 400;
    color: #ed8629;

}
    .more{
        width: 100%;
        height: .8rem;
        line-height: .8rem;
        font-size: .3rem;
        background-color: #ccc;
        text-align: center;

    }
</style>