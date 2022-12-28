require('./bootstrap');

window.Vue = require('vue');
// ########################## Vue Libraries ##############################
import Vue from 'vue';
// ########################## Axios Libraries ##############################
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
// ################################ Event Bus #########################################
Vue.prototype.$eventBus = new Vue()
// ########################## Vue Router ##############################
import VueRouter from 'vue-router';
import routes from './routes';
Vue.use(VueRouter);

// import "bootstrap";
// import "bootstrap/dist/css/bootstrap.min.css";


const app = new Vue({
    router: new VueRouter(routes),
}).$mount('#app')
