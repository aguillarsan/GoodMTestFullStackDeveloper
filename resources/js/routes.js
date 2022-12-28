import Welcome from './components/welcome.vue'
import App from './components/app.vue'
// Auth Components
let Login = () => import(/* webpackChunkName: "chunks/auth/login"*/'./components/auth/login.vue')
let Register = () => import(/* webpackChunkName: "chunks/auth/register"*/'./components/auth/register.vue')
// Authenticated componentes
let Home = () => import(/* webpackChunkName: "chunks/home/index"*/'./components/home/index.vue')
export default ({
    mode: 'history',
    base: process.env.BASE_URL,
    render: h => h(App),
    routes: [
        {
            path: '/',
            name: 'base',
            beforeEnter: (to, from, next) => {
                // if (!localStorage.getItem('authToken')) {
                //     return next('/login')
                // }
                return next('/home')

            },
        },
        {
            path: '/',
            name: 'Welcome',
            component: Welcome,
            children: [
                { path: '/login', name: 'login', component: Login },
                { path: '/register', name: 'Register', component: Register }
            ]

        },
        {
            path: '/',
            name: 'App',
            component: App,
            children: [
                { path: '/home', name: 'Home', component: Home },
                { path: '/orders', name: 'Orders', component: Register },
                { path: '/profile', name: 'Profile', component: Register },
            ]

        },


    ],
    scrollBehavior() {
        window.scrollTo(0, 0);
    }

})

