<template>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6 mb-4">
            <div class="card card-order p-25">
                <div class="order-container">
                    <div class="order-header">
                        <div class="ribbon-order ribbon-label">Rescatada</div>
                    </div>
                    <div class="order-body mt-8 d-flex ">
                        <div class="order-detail w-100">
                            <div class="display-grid">
                                <h2 class="display-grid"> <span class="skeleton skeleton-text w-60"></span></h2>
                                <div class="fs-5 fs-w-400 display-grid" v-for="(h,index) in 4"> <span
                                        class="skeleton skeleton-text w-40"></span></div>
                                <div class="separator"></div>
                                <h5 class="fs-5 display-grid w-100"> <span class="skeleton skeleton-text w-30"></span>
                                </h5>
                                <div class="fs-5 fs-w-400 display-grid"> <span
                                        class="skeleton skeleton-text w-100"></span></div>
                                <div class="separator"></div>
                                <div class="fs-5 fs-w-400 display-grid"> <span
                                        class="skeleton skeleton-text w-100"></span></div>
                                <div class="fs-5 fs-w-400 display-grid"> <span
                                        class="skeleton skeleton-text w-100"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>