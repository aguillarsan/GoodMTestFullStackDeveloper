<template>
    <div class="appBottomMenu">
        <div v-for="(option, index) in optionsMenu" class="item " :class="path == option.rute ? 'active':''"> 
            <router-link :to="option.rute">
                <div class="col">
                    <i :class="option.icon" class="sidebar-toggle hydrated" style="font-size: 26px;"></i>
                    <p class="fs-9" v-text="option.name"></p>
                </div>
            </router-link>
        </div>
       
    </div>
</template>
<script>
    export default {
        data() {
            return {
                optionsMenu: [
                    { name: 'Inicio', icon: 'uil uil-estate', rute: '/home' },
                    { name: 'Ordenes', icon: 'uil uil-receipt-alt', rute: '/orders' },
                    { name: 'Perfil', icon: 'uil uil-users-alt', rute: '/profile' }
                ]
            }
        },
        computed: {
            path() {
                return this.$route.path;
            },
        },
    }
</script>