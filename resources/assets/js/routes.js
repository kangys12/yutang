import  VueRouter from "vue-router";

let routes=[
    {
        path:"/",
        component:require("./components/Venue")
    },
    {
        path:"/venue",
        component:require("./components/Venue")
    },
    {
        path:"/detail",
        component:require("./components/Detail"),
        name:"venue_detail"
    },
    {
        path:"/game",
        component:require("./components/Game")
    },
    {
        path:"/find",
        component:require("./components/Find")
    },
    {
        path:"/about",
        component:require("./components/About")
    },
    {
        path:"/register",
        component:require("./components/Register")
    }

]

export default new VueRouter({
    //  "mode":"history",
    routes
})