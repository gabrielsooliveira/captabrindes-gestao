<script setup>
import { Head } from "@inertiajs/vue3";
import CardSimple from "@/js/components/Cards/CardSimple.vue";

const items = [
    {
        title: "Faturamento",
        value: 2132.13,
        type: "money",
        icon: ["fas", "dollar-sign"],
    },
    {
        title: "Lucro Estimado",
        value: 13231.23,
        type: "money",
        icon: ["fas", "chart-line"],
    },
    {
        title: "Ticket Médio",
        value: 7455.4,
        type: "money",
        icon: ["fas", "receipt"],
    },
    {
        title: "Projetos Abertos",
        value: 74,
        type: "number",
        icon: ["fas", "folder-open"],
    },
    {
        title: "Progressão de Meta",
        value: 80,
        type: "percent",
        icon: ["fas", "bullseye"],
    },
];
</script>

<template>
    <Head>
        <title>Inicio</title>
    </Head>
    <div class="p-3">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-2" v-for="(item, index) in items" :key="index">
                <CardSimple
                    :title="item.title"
                    :value="item.value"
                    :type="item.type"
                    :icon="item.icon"
                />
            </div>
        </div>
    </div>
</template>
