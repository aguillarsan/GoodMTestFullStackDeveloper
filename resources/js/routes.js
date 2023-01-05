import Auth from './components/auth.vue'
import App from './components/app.vue'
// Auth Components
let Login = () => import(/* webpackChunkName: "chunks/auth/login"*/'./components/auth/login.vue')
let Register = () => import(/* webpackChunkName: "chunks/auth/register"*/'./components/auth/register.vue')
let Welcome = () => import(/* webpackChunkName: "chunks/auth/welcome"*/'./components/auth/welcome.vue')
// Authenticated componentes
let Stores = () => import(/* webpackChunkName: "chunks/home/stores"*/'./components/home/stores.vue')
let Orders = () => import(/* webpackChunkName: "chunks/orders/order"*/'./components/orders/order.vue')
let OrderDetail = () => import(/* webpackChunkName: "chunks/orders/orderDetail"*/'./components/orders/orderDetail.vue')
let Profile = () => import(/* webpackChunkName: "chunks/profile/profile"*/'./components/profile/profile.vue')
let storeDetail = () => import(/* webpackChunkName: "chunks/home/storeDetail"*/'./components/home/storeDetail.vue')
let ShoppingCart = () => import(/* webpackChunkName: "chunks/shopping-cart/cartProducts"*/'./components/shopping-cart/cartproducts.vue')
export default ({
    mode: 'history',
    base: process.env.BASE_URL,
    render: h => h(App),
    routes: [
        {
            path: '/',
            name: 'base',
            beforeEnter: (to, from, next) => {
                if (!localStorage.getItem('guest')) {
                    return next('/welcome')
                }
                return next('/home')

            },
        },
        {
            path: '/',
            name: 'Auth',
            component: Auth,
            props: true,
            children: [
                { path: '/login', name: 'login', component: Login },
                { path: '/register', name: 'Register', component: Register },
                { path: '/welcome', name: 'welcome', component: Welcome }
            ]

        },
        {
            path: '/',
            name: 'App',
            component: App,
            props: true,
            children: [
                {
                    path: '/home', name: 'Home', component: Stores,
                    // beforeEnter: (to, from, next) => {
                    //     // if (localStorage.getItem('authToken') || localStorage.getItem('guest')) {
                    //     //     return next();
                    //     // }
                    //     // return next('/login')

                    // },
                },
                {
                    path: '/store/:store_id', name: 'Store Detail', component: storeDetail,

                },

                
                {
                    path: '/orders', name: 'Orders', component: Orders,
                },
                {
                    path: '/order/:order_id', name: 'order detail', component: OrderDetail,
        
                },
                {
                    path: '/profile', name: 'Profile', component: Profile,
    
                },
                {
                    path: '/shopping-cart/:store_id', name: 'shopping cart', component: ShoppingCart,
                },
            ]

        },
    ],

    scrollBehavior() {
        window.scrollTo(0, 0);
    }

})

