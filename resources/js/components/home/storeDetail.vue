<template>
    <div>
        <div class="appHeader  text-light d-flex">
            <div class="left">
                <a href="#" @click.prevent="$router.go(-1)" class="headerButton goBack">
                    <i class="uil uil-angle-left-b md hydrated"></i>
                </a>
            </div>
            <div class="pageTitle text-dark">Good Meal Market</div>
            <div class="right">
                <i class="uil uil-shopping-cart-alt text-dark" style="font-size:20px"></i>
            </div>
        </div>
    </div>
</template>