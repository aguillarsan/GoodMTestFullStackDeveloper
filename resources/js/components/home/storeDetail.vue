<template>
    <div>
        <div class="appHeader-app  text-light d-flex">
            <div class="left">
                <a href="#" @click.prevent="$router.go(-1)" class="headerButton goBack">
                    <i class="uil uil-angle-left-b md hydrated"></i>
                </a>
            </div>
            <div class="pageTitle text-dark">{{store.name}}</div>
            <div class="right">
                <span class="text-dark d-flex">{{productCart}}</span>
                <i class="uil uil-shopping-cart-alt text-dark" style="font-size:20px"> </i>
            </div>
        </div>
        <div class="hero-image display-none" :style="store | setBackgroundImageStore" id="hero-mobile">
        </div>
        <div class="d-flex flex-column flex-column-fluid">
            <div class="app-content flex-column-fluid">
                <div class="app-container container-xxl mt-10 mb-60 no-mt" style="height:100vh"
                    id="container-store-detail">
                    <div class="card-detail-store">
                        <div class="d-flex justify-content-between align-items-center mb-4" id="storeInfoDesktop">
                            <div class="d-flex align-items-center justify-content-between">
                                <i class="uil uil-store" style="font-size:28px"></i>
                                <span class="fs-4 fs-w-500" style="margin-left:0.8rem;">{{store.name}}</span>
                            </div>
                            <div>
                                <span class="text-dark">{{productCart}}</span>
                                <router-link :to="'/shopping-cart'">
                                <i class="uil uil-shopping-cart-alt text-dark " style="font-size:28px;"></i>
                                </router-link>
                            </div>
                        </div>
                        <div class="hero-image img-inherit" :style="store | setBackgroundImageStore" id="hero-desktop">
                        </div>
                        <div class="store-logo fixed" id="hero-desktop">
                            <div class="logo">
                                <img :src="store.logo_store">
                            </div>
                        </div>
                        <div class="d-flex   mt-10 align-items-center">
                            <i class="uil uil-location-point " style="font-size:28px"></i>
                            <span class="text-primary m-l-05">{{store.direction}}</span>
                        </div>
                        <div class="d-flex   mt-1 align-items-center ">
                            <i class="uil uil-clock " style="font-size:28px"></i>
                            <span class="text-muted m-l-05  fs-w-500">horario de retiro Hoy: de {{store.opening_hours}}
                                a
                                {{store.closing_time}}</span>
                        </div>
                        <div class="d-flex   mt-1 align-items-center ">
                            <span class=" m-l-05 fs-w-500 text-dark">Calificación</span>
                            <i class="uil uil-star m-l-05 fs-w-5 text-primary" style="font-size:26px"></i>
                            <span class="text-muted m-l-05 fs-w-500 text-dark">{{store.qualification}}/5</span>
                        </div>
                        <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6 mt-5"
                            id="tab_store_categorie_products">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_4">Ver todo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_5">Snaks</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_6">Lacteos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_6">Congelados</a>
                            </li>
                        </ul>
                        <v-skeleton-store v-show="load"></v-skeleton-store>
                        <div  v-show="!load" class="container-products-store">
                            <div class="card card-store" v-for="l in 6" style="height:350px">
                                <div class="card-store-product" style="position: relative; height: 281px;">
                                    <div
                                        class="product-image w-100 d-flex justify-content-center align-items-center mt-4">
                                        <img src="/images/examples/food/meat.png" class="image-product" width="100">
                                    </div>
                                    <div class="add-product-cart">
                                        <a href="#" @click="addProductCart()"> 
                                            <i class="uil uil-plus-circle text-primary" style="font-size:40px;"></i>
                                        </a>
                                       
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center mt-5">
                                        <div class="d-flex justify-content-between align-items-center" style="    width: 100%;
                                        padding: 30px;">
                                            <span class="text-primary">${{store.actual_price | moneyFormat}}</span>
                                            <span class="text-muted text-line-through"> ${{store.old_price |
                                                moneyFormat}}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <span class="badge text-inherit badge-primary mb-1 fs-6">%50 descuento</span>
                                    </div>
                                    <div class="description-product-store mb-5">
                                        <p>Pack de papas mas bebida mas mas</p>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="appBottomMenu type-buttom">
            <div class="item ">
                <div class="col">
                    <router-link :to="'/shopping-cart'">
                        <button class="btn btn-primary w-100 btn-rounded btn-lg">Comprar</button>
                    </router-link>
                  
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
                store: [],
                load:true,
                productCart:0
            }
        },
        created() {
            this.getStoreDetail()
        },
        methods: {
            getStoreDetail() {
                axios.get('/api/stores/' + this.$route.params.store_id).then(response => {
                    this.store = response.data.store
                    this.load=false
                })
            },
            addProductCart(){
                this.productCart += 1
            }
        },
    }
</script>