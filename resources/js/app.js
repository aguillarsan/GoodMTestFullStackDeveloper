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
// ########################## moment ##############################
import moment from 'moment';
import VueMoment from 'vue-moment';
require('moment/locale/es')
moment.locale('es');
Vue.use(VueMoment, { moment })
// ########################## vue toast ##############################
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
Vue.use(VueToast);
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
        Vue.filter('dateFormat', function (val) {
            if (!val) {
                return 'N/A'
            }
            return moment(val).format("DD/MM/yyyy");
        });
        Vue.filter('setBackgroundImageStore', function (store) {
            if (store) {
                const image = 'background-image:url(' + store.image_store + ')';
                return image

            }

        });
        Vue.filter('calculateDiscount', function (product) {
            const priceWithDiscount = product.price - Math.round((product.price * product.discount) / 100)
            return priceWithDiscount

        });
        let self = this
        this.$eventBus.$on('alert.toast.event', function (code, message) {
            self.alertToast(code, message)
        })

    },
    methods: {
        alertToast(code, message) {
            let types = {
                200 : 'success',
                201 : 'success',
                500 : 'error',
                404 : 'error',
            }
            const type = types[code]
            Vue.$toast.open({
                message: message,
                type: type,
                position: 'bottom-right',
                duration: 5000

            });
        },
    }
}).$mount('#app')
