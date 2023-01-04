<template>
    <div>
        <div class="appHeader-app  text-light d-flex">
            <div class="left">
                <a href="#" @click.prevent="$router.go(-1)" class="headerButton goBack">
                    <i class="uil uil-angle-left-b md hydrated"></i>
                </a>
            </div>
            <div class="pageTitle text-dark">Carrito de compras</div>
            <div class="right">

            </div>
        </div>
        <div class="d-flex flex-column flex-column-fluid">
            <div class="app-content flex-column-fluid">
                <div class="app-container container-xxl mt-10 mb-60 no-mt">
                    <div class="d-flex justify-content-between align-items-center mb-4" id="order_detail">
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="fs-w-500 fs-4">Carrito de compras</span>
                        </div>
                    </div>
                    <v-skeleton-store :config_skeleton="config_skeleton"></v-skeleton-store>
                    <div class="p-4 mt-5 w-100 d-flex justify-content-between align-items-center mb-5 card card-shopping-cart"
                        v-for="(product_shopping, key) in products_shopping_cart">
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <div class="d-flex">
                                <img :src="product_shopping.product.image" class="image-product" width="100">
                                <div class="display-grid m-l-05 p-3">
                                    <span>{{product_shopping.total_product}} x ${{product_shopping.product |
                                        calculateDiscount | moneyFormat}}</span>
                                    <span> {{product_shopping.product.name }}</span>
                                </div>
                            </div>
                            <div class="">
                                <span class="fs-w-500 text-primary">{{totalPriceProduct(product_shopping) |
                                    moneyFormat}}</span>
                            </div>
                        </div>
                    </div>
                    <div class=" w-100 d-flex justify-content-between align-items-center mb-5">
                        <div class="display-grid">
                            <span class="fs-w-300 text-dark">Ahorro</span>
                            <span class="fs-w-600 text-primary">Total a pagar</span>
                        </div>
                        <div class="display-grid">
                            <span class="fs-w-300 text-muted">-${{totalSavings | moneyFormat}}</span>
                            <span class="fs-w-600 text-primary">${{totalPriceWithDiscount | moneyFormat}}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center w-100 ">
                        <button class="btn btn-primary w-30 btn-rounded btn-lg hidden-button"
                            :disabled="orderLoad? true:false" type="button" @click="storeOrder">
                            <span v-show="!orderLoad">Pagar</span>
                            <div v-show="orderLoad" class="spinner-border text-secondary" role="status">
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="appBottomMenu type-buttom">
            <div class="item p-5">
                <div class="col">
                    <button class="btn btn-primary w-100 btn-rounded btn-lg"  @click="storeOrder"  :disabled="orderLoad? true:false" >
                        <span v-show="!orderLoad">Pagar</span>
                        <div v-show="orderLoad" class="spinner-border text-secondary" role="status">
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import skeletonLoad from '../skeleton/skeletonLoad.vue'
    export default {
        components: {
            'v-skeleton-store': skeletonLoad
        },
        data() {
            return {

                products_shopping_cart: [],
                config_skeleton: {
                    col: 'col-lg-12',
                    load: true
                },
                orderLoad: false


            }
        },
        created() {
            this.getProductsShoppingCart()
        },
        computed: {
            totalPriceWithDiscount() {
                let totalPrice = 0
                this.products_shopping_cart.reduce((total, product) => {
                    totalPrice += product.total_product * (product.product.price - Math.round((product.product.price * product.product.discount / 100)))
                }, 0)
                return totalPrice

            },
            totalSavings() {
                let totalSaving = 0
                this.products_shopping_cart.reduce((total, product) => {
                    totalSaving += product.total_product * Math.round((product.product.price * product.product.discount / 100))
                }, 0)
                return totalSaving
            }
        },
        methods: {
            getProductsShoppingCart() {
                axios.get('/api/shopping-cart', {
                    params: {
                        store_id: this.$route.params.store_id
                    }
                }).then(response => {
                    this.products_shopping_cart = response.data.product_shopping_cart
                    this.config_skeleton.load = false
                })
            },
            totalPriceProduct(product_shopping) {
                const originalPrice = product_shopping.product.price
                const discount = product_shopping.product.discount
                const totalProduct = product_shopping.total_product
                const priceWithDiscount = originalPrice - Math.round((originalPrice * discount / 100))
                const totalPrice = priceWithDiscount * totalProduct
                return totalPrice
            },
            storeOrder() {
                this.orderLoad = true
                let formData = new FormData
                formData.append('store_id', this.$route.params.store_id)
                formData.append('delivery_type_id', 1)
                formData.append('total_amount', this.totalPriceWithDiscount)

                axios.post('/api/orders', formData).then(response => {
                    const order_id = response.data.orderNumber
                    this.storeOrderProducts(order_id);
                }).catch(error => {
                    alert(error.message)
                })
            },
            storeOrderProducts(order_id) {
                let formData = new FormData
                console.log(order_id)
                formData.append('store_id', this.$route.params.store_id)
                formData.append('order_id', order_id)
                axios.post('/api/order-products', formData).then(response => {
                    this.$router.push('/order/' + order_id)
                    this.orderLoad = false
                }).catch(error => {
                    alert(error.message)
                })

            }
        },
    }
</script>