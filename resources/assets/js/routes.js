import  VueRouter from "vue-router";

let routes=[
    {
        path:"/",
        component:require("./components/Venue")
    },
    {
        path:"/venue",
        component:require("./components/Venue"),
        name:"venue"
    },
    {
        path:"/detail",
        component:require("./components/Detail"),
        name:"venue_detail"
    },
    {
        path:"/order",
        component:require("./components/Order"),
        name:"order",
        children:[
            {
                path:"/data_list/:index",
                component:require("./components/Data_list"),
                name:"date_list"
            },
        ]
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
    },
    {
        path:"/login",
        component:require("./components/Login")
    },
    {
        path:"/search",
        component:require("./components/Search")
    },
    {
        path:"/my_orders",
        component:require("./components/MyOrders")
    },
    {
        path:"/order_detail/:id",
        component:require("./components/OrderDetail")
    },
    {
        path:"/create_game",
        component:require("./components/CreateGame")
    },
    {
        path:"/game_list",
        component:require("./components/GameList")
    }


]

export default new VueRouter({
    //  "mode":"history",
    routes
})