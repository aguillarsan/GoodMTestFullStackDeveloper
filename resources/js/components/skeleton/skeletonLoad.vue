<template>
    <div class="row" v-show="config_skeleton.load">
        <div class="col-lg-4 mb-4"  :class="config_skeleton.col ? config_skeleton.col:''" v-for="l in 3">
            <div class="card card-store">
                <div class="store-image mb-3">
                    <div class="store-container ">
                        <div class="store-detail w-100">
                            <span class="skeleton skeleton-text w-50"></span>
                            <span class="skeleton skeleton-text  w-30"></span>
                        </div>
                        <div class="store-like">

                        </div>
                    </div>
                </div>
                <div class="store-logo">
                    <div class="logo">
                        <span class=" sekeleton sekeleton-image"></span>
                    </div>
                </div>
                <div class="store-footer">
                    <div class="store-footer-detail mb-2">
                        <div class="store-detail w-100">
                            <span class="skeleton skeleton-text w-80"></span>
                            <span class="skeleton skeleton-text  w-80"></span>
                        </div>
                        <div class="store-detail w-100">
                            <span class="skeleton skeleton-text w-80"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['config_skeleton'],
    }

</script>