<template>
    <div class="d-flex w-100">
        <div class="form-container  boder-1 shadow-md mt-15 w-100">
            <div class="section">
                <img src="images/welcome/Bolsa_Sorpresa.webp" alt="image" width="180" class="form-image">
            </div>
            <div class="section mt-8">
                <h1 class="fs-1">¡Únete a los miles de WasteHeroes!</h1>
                <h4 class="fs-8 mt-5 text-muted">Rescata comida de calidad a tu alrededor</h4>
            </div>
            <div class="section mt-11 mb-8">
                <div class="d-flex w-100 mt-8">
                    <router-link :to="'/login'" class="btn btn-primary w-100 btn-rounded btn-lg">
                        Iniciar Sesión
                    </router-link>
                </div>
                <div class="d-flex w-100 mt-3">
                    <router-link :to="'/register'" class="btn btn-white w-100 btn-rounded btn-lg">
                        Crear cuenta
                    </router-link>
                </div>
            </div>
            <div class="section mt-8 mb-5">
                <p>ingresa como <a href="#" @click.prevent="saveSessionAsGuest()">invitado</a></p>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        methods: {
            saveSessionAsGuest() {
                localStorage.setItem('guest', true)
                this.$router.push('/home')
            }
        },

    }
</script>