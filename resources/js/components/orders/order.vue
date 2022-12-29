<template>
    <div>
        <div class="appHeader-app  text-light d-flex">
            <div class="left">
            </div>
            <div class="pageTitle text-dark">Mis Órdenes</div>
            <div class="right">
                <i class="uil uil-phone-volume text-dark" style="font-size:25px"></i>
            </div>
        </div>
        <div class="d-flex flex-column flex-column-fluid">
            <div class="app-content flex-column-fluid">
                <div class="app-container container-xxl mt-10 mb-60 no-mt">
                    <div class="d-flex justify-content-between align-items-center mb-4" id="order_detail">
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="fs-w-500 fs-4">Mis Órdenes</span>
                        </div>
                        <div>
                            <button class="btn btn-primary btn-sm"><i class="uil uil-phone-volume"></i></button>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-4 mb-4" v-for="(l, index) in 6">
                            <router-link :to="'/order/'+6" class=" text-decoration-none">
                                <div class="card card-order">
                                    <div class="order-container">
                                        <div class="order-header">
                                            <div class="fs-w-500 fs-6 text-secondary-variant">25/06/2022</div>
                                            <div class="ribbon-order ribbon-label">Rescatada</div>
                                        </div>
                                        <div class="order-body mt-3 d-flex justify-content-between">
                                            <div class="order-detail">
                                                <div class="display-grid">
                                                    <div class="fs-w-500 text-dark">Tienda: Os Market</div>
                                                    <div class="fs-w-500 text-dark">Nro° Order: 1819189</div>
                                                    <div class="fs-w-500 text-dark">Monto Total: $15.500</div>
                                                    <div class="fs-w-500 text-dark">Horario: 09:00 a 19:00</div>
                                                </div>
                                            </div>
                                            <div class="order-access">
                                                <i class="uil uil-arrow-circle-right text-dark"
                                                    style="font-size:40px"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </router-link>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
</template>
<script>
    export default {

    }
</script>
<style>

</style>