import Auth from './components/auth.vue'
import App from './components/app.vue'
// Auth Components
let Login = () => import(/* webpackChunkName: "chunks/auth/login"*/'./components/auth/login.vue')
let Register = () => import(/* webpackChunkName: "chunks/auth/register"*/'./components/auth/register.vue')
let Welcome = () => import(/* webpackChunkName: "chunks/auth/welcome"*/'./components/auth/welcome.vue')
// Authenticated componentes
let Home = () => import(/* webpackChunkName: "chunks/home/index"*/'./components/home/index.vue')
let Orders = () => import(/* webpackChunkName: "chunks/orders/order"*/'./components/orders/order.vue')
let OrderDetail = () => import(/* webpackChunkName: "chunks/orders/orderDetail"*/'./components/orders/orderDetail.vue')
let Profile = () => import(/* webpackChunkName: "chunks/profile/profile"*/'./components/profile/profile.vue')
let storeDetail = () => import(/* webpackChunkName: "chunks/home/storeDetail"*/'./components/home/storeDetail.vue')
export default ({
    mode: 'history',
    base: process.env.BASE_URL,
    render: h => h(App),
    routes: [
        {
            path: '/',
            name: 'base',
            beforeEnter: (to, from, next) => {
                if (!localStorage.getItem('authToken') && !localStorage.getItem('guest')) {
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
                    path: '/home', name: 'Home', component: Home,
                    beforeEnter: (to, from, next) => {
                        if (localStorage.getItem('authToken') || localStorage.getItem('guest')) {
                            return next();
                        }
                        return next('/login')

                    },
                },
                {
                    path: '/store/:store_id', name: 'Store Detail', component: storeDetail,
                    // beforeEnter: (to, from, next) => {
                    //     if (localStorage.getItem('authToken')) {
                    //         return next();
                    //     }
                    //     return next('/login')

                    // },
                },

                
                {
                    path: '/orders', name: 'Orders', component: Orders,
                    beforeEnter: (to, from, next) => {
                        if (localStorage.getItem('authToken')) {
                            return next();
                        }
                        return next('/login')

                    },
                },
                {
                    path: '/orders/oder_id', name: 'order detail', component: OrderDetail,
                    beforeEnter: (to, from, next) => {
                        if (localStorage.getItem('authToken')) {
                            return next();
                        }
                        return next('/login')

                    },
                },
                {
                    path: '/profile', name: 'Profile', component: Profile,
                    beforeEnter: (to, from, next) => {
                        if (localStorage.getItem('authToken')) {
                            return next();
                        }
                        return next('/login')

                    },
                },
            ]

        },
    ],

    scrollBehavior() {
        window.scrollTo(0, 0);
    }

})

