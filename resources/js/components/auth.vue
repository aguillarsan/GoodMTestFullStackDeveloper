<template>
    <div>
        <v-splash :options="options"></v-splash>
        <div class="appHeader  text-light " :class="path != '/welcome' ? 'display-block' :''">
            <div class="left">
                <a href="#" @click.prevent="$router.go(-1)" class="headerButton goBack">
                    <i class="uil uil-angle-left-b md hydrated"></i>
                </a>
            </div>
            <div class="pageTitle"></div>
            <div class="right"></div>
        </div>
        <div class="d-flex flex-root " :class="path != '/welcome' ? 'mt-10' :''">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    import splashLoad from "./splashLoading/splash.vue"
    export default {
        components: {
            'v-splash': splashLoad
        },
        data() {
            return {
                options: {
                    visibility: 'show'
                }
            }
        },
        computed: {
            path() {
                return this.$route.path;
            },
        },
        mounted() {
            setTimeout(() => this.closeSaplash(), 1300);
        },
        methods: {
            closeSaplash() {
                this.options.visibility = 'hidden'
            }
        },
    }
</script>

<style>
    body {
        display: flex;
        flex-direction: column;
    }
</style>