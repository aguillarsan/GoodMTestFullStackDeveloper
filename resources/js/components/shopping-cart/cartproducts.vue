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
                    <div class="container-products-store mt-5">
                        <div class="card card-store" v-for="l in 6" style="height:350px">
                            <div class="card-store-product" style="position: relative; height: 281px;">
                                <div class="product-image w-100 d-flex justify-content-center align-items-center mt-4">
                                    <img src="/images/examples/food/meat.png" class="image-product" width="100">
                                </div>
                                <div class="add-product-cart" style="padding:20px">
                                    <div classs="fs-w-400 fs-5">{{l}}</div>

                                </div>
                                <div class="d-flex justify-content-center align-items-center mt-5">
                                    <div class="d-flex justify-content-between align-items-center" style="    width: 100%;
                                    padding: 30px;">
                                        <span class="text-primary">$12.000</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <span class="badge text-inherit badge-primary mb-1 fs-6">%50 descuento</span>
                                </div>
                                <div class="description-product-store mb-5">
                                    <p>Pack de papas más bebida</p>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>