<template>
    <div class="d-flex w-100">
        <div class="form-container boder-1 shadow-md mt-15 w-100">
            <div class="section">
                <img src="images/logos/logo.webp" alt="image" class="form-image">
            </div>
            <div class="section mt-1">
                <h1 class="fs-1">Dejanos tus datos</h1>
                <h4 class="fs-8 mt-4 text-muted">Para poder ofrecer una experiencia personalizada</h4>
            </div>
            <div class="section mt-8 mb-5">
                <form>
                    <div class="form-group boxed ">
                        <div class="input-wrapper">
                            <input type="email" class="form-control" id="email1" placeholder="Correo">
                            <i class="clear-input">
                                <ion-icon name="close-circle" role="img" class="md hydrated"
                                    aria-label="close circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-group boxed w">
                        <div class="input-wrapper">
                            <input type="password" class="form-control" id="password1" placeholder="Contraseña"
                                autocomplete="off">
                            <i class="clear-input">
                                <ion-icon name="close-circle" role="img" class="md hydrated"
                                    aria-label="close circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-group boxed w">
                        <div class="input-wrapper">
                            <input type="password" class="form-control" id="password1" placeholder="Contraseña"
                                autocomplete="off">
                            <i class="clear-input">
                                <ion-icon name="close-circle" role="img" class="md hydrated"
                                    aria-label="close circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="d-flex w-100 mt-8">
                        <button type="submit" class="btn btn-primary w-100 btn-rounded btn-lg" @click.prevent="saveSessionAsGuest">Registrarse</button>
                    </div>
                </form>
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