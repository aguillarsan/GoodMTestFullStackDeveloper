<template>
    <div class="splash" :class="options.visibility">
        <div class=" fade-in" style="height: 100%;">
            <div class="d-flex w-100 justify-content-center align-items-center h-100vh ">
               
                    <img src="/images/logos/logo.webp" class="bounceIn" width="100" />
               
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props:['options']
    }
</script>