<template>

    <nav id="navItems">
        <div class="logo-name">
            <div class="logo-image">
                <img class="logo-light" src="/images/logos/logo.webp" width="100" />
            </div>
            <span class="logo_name">
                GoodMeal
            </span>
        </div>
        <div class="menu-items">
            <ul class="nav-links pd-l no-padding-left">
                <li v-for="link in navLinks">
                    <router-link :to="link.rute" :class="path == link.rute ? 'active':''">
                        <i :class="[link.icon,path == link.rute ? 'active':'']"></i>
                        <span class="link-name" :class="path == link.rute ? 'active':''">{{link.name}}</span>
                    </router-link>
                </li>
            </ul>
            <ul class="logout-mode pd-l no-padding-left">
                <li class="mode">
                    <a href="">
                        <i class="uil uil-moon"></i>
                        <span class="link-name">Dark Mode</span>
                    </a>
                    <div class="mode-toggle">
                        <span class="switch"></span>
                    </div>

                </li>
                <li>
                    <a href="">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Cerrar sesión</span>
                    </a>

                </li>

            </ul>
        </div>
    </nav>


</template>
<script>
    export default {
        data() {
            return {
                navLinks: [
                    { name: 'Inicio', icon: 'uil uil-estate', rute: '/home' },
                    { name: 'Ordenes', icon: 'uil uil-receipt-alt', rute: '/orders' },
                    { name: 'Perfil', icon: 'uil uil-users-alt', rute: '/profile' }
                ]
            }
        },
       
        computed: {
            ruteName() {
                return this.$route.name;
            },
            path() {
                return this.$route.path;
            },
        },
    }
</script>