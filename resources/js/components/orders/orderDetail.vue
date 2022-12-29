<template>
    <div>
        <div class="appHeader-app  text-light d-flex">
            <div class="left">
                <a href="#" @click.prevent="$router.go(-1)" class="headerButton goBack">
                    <i class="uil uil-angle-left-b md hydrated"></i>
                </a>
            </div>
            <div class="pageTitle text-dark">Detalle de la orden</div>
            <div class="right">
            </div>
        </div>
        <div class="d-flex flex-column flex-column-fluid">
            <div class="app-content flex-column-fluid">
                <div class="app-container container-xxl mt-10 mb-60 no-mt">
                    <div class="d-flex justify-content-between align-items-center mb-4" id="order_detail">
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="fs-w-500 fs-4">Detalle de la orden</span>
                        </div>
                    </div>
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
                                                <h2>Fork bilbao</h2>
                                                <div class="fs-5 fs-w-400">Dirección: Av san carlos 01863</div>
                                                <div class="fs-5 fs-w-400">Horario de retiro: 09:00 a 19:00</div>
                                                <div class="fs-5 fs-w-400">Fecha de retiro: 25/06/2022</div>
                                                <div class="fs-5 fs-w-400">Nro° orden: 268595</div>
                                                <div class="separator"></div>
                                                <h5 class="fs-5">Productos</h5>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="fs-5 fs-w-400">2</div>
                                                    <div class="fs-5 fs-w-400">kit XXL</div>
                                                    <div class="fs-5 fs-w-400">$13.500</div>
                                                </div>
                                                <div class="separator"></div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="fs-5 fs-w-400">Delivery</div>
                                                    <div class="fs-5 fs-w-400">$3.500</div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="fs-5 fs-w-600">Monto Total</div>
                                                    <div class="fs-5 fs-w-600 mt-3">$17.000</div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
    export default {

    }
</script>