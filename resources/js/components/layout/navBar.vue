<template>
    <div class="top" id="navBar">
        <i class="uil uil-bars sidebar-toggle"></i>
        <div class="d-flex">
            <h6 class="m-r-15">Invitado</h6>
          
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            this.closeSidebar()
        },
        methods: {
            closeSidebar() {
                const body = document.querySelector("body");
                const modeToggle = body.querySelector(".mode-toggle");
                const sideBarToggle = body.querySelector(".sidebar-toggle");
                const sidebar = body.querySelector("nav");
                sideBarToggle.addEventListener("click", () => {
                    sidebar.classList.toggle("close");
                });
            }
        },
    }
</script>