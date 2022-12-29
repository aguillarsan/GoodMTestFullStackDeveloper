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
    mounted() {
        Vue.filter('moneyFormat', function (value) {
            if (value) {
                if (value % 1 == 0) {
                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                } else {
                    let val = (value / 1).toFixed(2).replace('.', ',')
                    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                }
            }
            return 0

        });
        Vue.filter('setBackgroundImageStore', function (store) {
            if (store) {
                const image = 'background-image:url(' + store.image_store + ')';
                return image

            }

        });



    }
}).$mount('#app')
