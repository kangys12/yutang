<template>
    <li @click="go" :class="{active:bool}"><slot name="icon"></slot>{{title}}</li>
</template>

<script>
    export default {
        name: "Child",
        props:['title','mark',"sel_mark","sel"],
        methods:{
            go(){
                this.$router.push(this.mark);
                this.$emit('my_mark',this.mark)
            }
        },
        computed:{
            bool:function () {
                return this.mark==this.sel;
            }

        }
    }
</script>

<style scoped>

</style>