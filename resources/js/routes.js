import Auth from './components/auth.vue'
import App from './components/app.vue'
// Auth Components
let Login = () => import(/* webpackChunkName: "chunks/auth/login"*/'./components/auth/login.vue')
let Register = () => import(/* webpackChunkName: "chunks/auth/register"*/'./components/auth/register.vue')
let Welcome = () => import(/* webpackChunkName: "chunks/auth/welcome"*/'./components/auth/welcome.vue')
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
            props:true,
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
            props:true,
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
                    path: '/orders', name: 'Orders', component: Register,
                    beforeEnter: (to, from, next) => {
                        if (localStorage.getItem('authToken')) {
                            return next();
                        }
                        return next('/login')

                    },
                },
                {
                    path: '/profile', name: 'Profile', component: Register,
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

