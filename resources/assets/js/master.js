
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
require('./responsive');

// 引入vue-router
import VueRouter from "vue-router";

// 调用vue-router
Vue.use(VueRouter);

// 引入 router路由配置文件
import router from "./routes.js";


import Vant from 'vant';
import 'vant/lib/index.css';

Vue.use(Vant);

// import VeeValidate from 'vee-validate';
// import VeeValidate, { Validator } from 'vee-validate';
// Vue.use(VeeValidate);
import zh_CN from 'vee-validate/dist/locale/zh_CN';
import VeeValidate, { Validator } from 'vee-validate';
Vue.use(VeeValidate);
Validator.localize('zh_CN', zh_CN);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('parent-tab', require('./components/ParentTab'));
Vue.component('child', require('./components/Child'));
Vue.component('types', require('./components/Types'));
Vue.component('app', require('./components/App'));
Vue.component('venue-ttem', require('./components/VenueTtem'));
const app = new Vue({
    el: '#app',
    router
});
