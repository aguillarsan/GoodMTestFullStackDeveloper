<template>
    <div class="d-flex flex-column flex-column-fluid">
        <div class="app-content flex-column-fluid">
            <div class="app-container container-xxl mt-10 mb-60 no-mt" >
                <div class="d-flex justify-content-between align-items-center mb-4" id="location">
                    <div class="d-flex align-items-center justify-content-center">
                        <i class="uil uil-map-marker" style="font-size:20px"></i>
                        <span>Av Vicuña Makena...</span>
                    </div>
                    <div>
                        <button class="btn btn-primary btn-sm"><i class="uil uil-sliders-v-alt"></i></button>
                    </div>
                </div>
                <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_4">Con Stock</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_5">Sin Stock</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_6">Favoritos</a>
                    </li>
                </ul>
              
                <div class="row">
                    <div class="col-lg-4 mb-4" v-for="l in 9">
                        <router-link :to="'/store/'+ l" class="select-card text-decoration-none" href="#">
                            <div class="card card-store">
                                <div class="store-image mb-3">
                                    <div class="store-container">
                                        <div class="store-detail">
                                            <span class="badge text-inherit badge-primary mb-1 fs-6">hoy 09:00 -
                                                21:00</span>
                                            <span class="badge text-inherit badge-info fs-8 text-primary">retiro o
                                                delivery</span>
                                        </div>
                                        <div class="store-like">
                                            <div class="ribbon up">
                                                <div class="content">
                                                    <i class="uil uil-heart" style="font-size:24px;"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="store-logo">
                                    <div class="logo">
                                        <img src="/images/logos/logo.webp">
                                    </div>
                                </div>
                                <div class="store-footer">
                                    <div class="store-footer-detail">
                                        <h2 class="fs-5 text-dark">GoodMeal Market</h2>
                                        <h5 class="fs-8">
                                            <span class="text-primary">Desde $4.500</span>
                                            <span class="text-muted text-line-through">$9.000</span>
                                        </h5>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <div class="store-distance-ubication">
                                                <div>
                                                    <img src="/images/icons/person-walking.png" width="18"> <span  class="text-variant-dark">45
                                                        min</span>
                                                </div>
                                                <div>
                                                    <i class="uil uil-map-marker" style="font-size:20px"></i>
                                                    <span class="text-variant-dark">5 km</span>
                                                </div>

                                            </div>
                                            <div class="store-bag">
                                                <span class="text-variant-dark">0</span>
                                                <i class="uil uil-shopping-bag text-dark"  style="font-size:30px"></i>
                                            </div>
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
</template>
<style>
   
</style>