<template>
    <dl  class="item" @click="detail(item.id)">
        <dt><img src="/images/venue_m_icon.jpg"/></dt>
        <dd>
            <h3>{{item.name}}</h3>
            <p>{{item.id}}=====>{{item.type_name}}</p>
            <p class="address"><span>朝阳区</span><b>32.6km</b></p>
            <p><span>线上预定</span><b>10元每小时</b></p>
        </dd>
    </dl>
</template>

<script>
    export default {
        name: "VenueTtem",
        props:['item'],
        methods:{
            detail(venue_id){
                this.$router.push({ name: 'venue_detail', params: { id: venue_id }})
            },
        }
    }
</script>

<style scoped>
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
</style>