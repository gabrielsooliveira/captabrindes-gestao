<script setup>
import ImageMain from "@/assets/images/logo_com_titulo.webp";
import ImageMobile from "@/assets/images/brand_capta_brindes.webp";
</script>

<template>
    <div class="min-vh-100 d-flex flex-column flex-lg-row">
        <div
            class="text-white d-flex flex-column justify-content-center align-items-center p-5 d-none d-lg-flex"
        >
            <div class="text-center text-primary">
                <img
                    :src="ImageMain"
                    alt="Logo"
                    class="img-fluid mb-4"
                    width="400"
                />
                <h2 class="fw-bold mb-3">Bem-vindo de volta!</h2>
                <p class="lead mb-0">
                    Acesse sua conta e continue sua jornada.
                </p>
            </div>
        </div>

        <div
            class="bg-secondary d-flex flex-column justify-content-center align-items-center flex-grow-1"
        >
            <img
                :src="ImageMobile"
                alt="Logo"
                class="img-fluid mb-4 d-block d-lg-none"
                width="400"
            />
            <div class="w-100">
                <slot />
            </div>
        </div>
    </div>
</template>
