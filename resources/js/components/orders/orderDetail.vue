<template>
    <div>
        <div class="appHeader-app  text-light d-flex">
            <div class="left">
                <router-link :to="'/orders'"  class="headerButton goBack">
                    <i class="uil uil-angle-left-b md hydrated"></i>
                </router-link>
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
                    <v-order-detail-skeleton v-if="load"/>
                    <div class="row justify-content-center mt-5" v-if="!load">
                        <div class="col-lg-6 mb-4">
                            <div class="card card-order p-25">
                                <div class="order-container">
                                    <div class="order-header">
                                        <div class="ribbon-order ribbon-label">Rescatada</div>
                                    </div>
                                    <div class="order-body mt-8 d-flex ">
                                        <div class="order-detail w-100">
                                            <div class="display-grid">
                                                <h2>{{order.store.name}}</h2>
                                                <div class="fs-5 fs-w-400">Dirección: {{order.store.direction}}</div>
                                                <div class="fs-5 fs-w-400">Horario de retiro:  {{order.store.opening_hours}} a
                                                    {{order.store.closing_time}}</div>
                                                <div class="fs-5 fs-w-400">Fecha de retiro: 25/06/2022</div>
                                                <div class="fs-5 fs-w-400">Nro° orden: {{order.id}}</div>
                                                <div class="separator"></div>
                                                <h5 class="fs-5">Productos</h5>
                                                <div class="d-flex align-items-center justify-content-between mb-2" v-for="(product, index) in order.products">
                                                    <div class="fs-5 fs-w-400">1</div>
                                                    <div class="fs-5 fs-w-400">{{product.name}}</div>
                                                    <div class="fs-5 fs-w-400">${{product | calculateDiscount | moneyFormat}}</div>
                                                </div>
                                                <div class="separator"></div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="fs-5 fs-w-400">Delivery</div>
                                                    <div class="fs-5 fs-w-400">$3.500</div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="fs-5 fs-w-600">Monto Total</div>
                                                    <div class="fs-5 fs-w-600 mt-3">${{order.total_amount | moneyFormat}}</div>
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
    import orderSkeleton from "../skeleton/skeletonOrderDetail.vue"
    export default {
        components:{
         'v-order-detail-skeleton':orderSkeleton
        },
        data() {
            return {
                load:true,
                order: []
            }
        },
        created() {
            this.getOrderDetail();
        },
        methods: {
            getOrderDetail(){
                axios.get('/api/orders/'+this.$route.params.order_id).then(response=>{
                    this.order = response.data.order
                    this.load = false
                })
            }
        },
    }
</script>