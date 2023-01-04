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
                        <v-skeleton-store :config_skeleton="config_skeleton"/>
                        <div class="col-lg-4 mb-4" v-for="(order, index) in orders.data" >
                            <router-link :to="'/order/'+order.id" class=" text-decoration-none">
                                <div class="card card-order ">
                                    <div class="order-container">
                                        <div class="order-header">
                                            <div class="fs-w-500 fs-6 text-secondary-variant">{{order.created_at | dateFormat}}</div>
                                            <div class="ribbon-order ribbon-label">Rescatada</div>
                                        </div>
                                        <div class="order-body mt-3 d-flex justify-content-between">
                                            <div class="order-detail">
                                                <div class="display-grid">
                                                    <div class="fs-w-500 text-dark">Tienda: {{order.store.name}}</div>
                                                    <div class="fs-w-500 text-dark">Nro° Order: {{order.id}}</div>
                                                    <div class="fs-w-500 text-dark">Monto Total: ${{order.total_amount |
                                                        moneyFormat}}</div>
                                                    <div class="fs-w-500 text-dark">
                                                        Horario:{{order.store.opening_hours}} a
                                                        {{order.store.closing_time}}</div>
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
    import skeletonLoad from '../skeleton/skeletonLoad.vue'
    export default {
        components: {
            'v-skeleton-store': skeletonLoad
        },
        data() {
            return {
                orders: [],
                config_skeleton: {
                    load:true
                }
            }
        },
        created() {
            this.getOrders()
        },
        methods: {
            getOrders() {
                axios.get('/api/orders').then(response => {
                    this.orders = response.data.orders
                    this.config_skeleton.load = false
                })
            }
        },
    }
</script>