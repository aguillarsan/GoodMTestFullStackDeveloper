<template>
    <div>
        <v-sideBar></v-sideBar>
        <section class="dashboard">
            <v-navBar></v-navBar>
            <div class="app-main d-flex flex-column flex-row-fluid mt-5 h-100vh">
                <router-view></router-view>
            </div>
        </section>
        <v-app-bottom-menu></v-app-bottom-menu>
    </div>
</template>

<script>
    import navBar from './layout/navBar.vue'
    import sideBar from './layout/sideBar.vue'
    import appBottomMenu from './layout/appBottomMenu.vue'
    export default {
        components: {
            'v-navBar': navBar,
            'v-sideBar': sideBar,
            'v-app-bottom-menu': appBottomMenu
        },

    }
</script>