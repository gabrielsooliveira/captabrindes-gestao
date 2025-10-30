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

    <div class="px-3">
        <!-- Título e filtros -->
        <div
            class="d-flex flex-column flex-md-row justify-content-md-between align-items-center text-center text-md-start mb-4 gap-3"
        >
            <div>
                <h2 class="fw-bold mb-0">Dashboard</h2>
                <p class="text-muted m-0 p-0">
                    Faturamento, lucro estimado e ticket médio
                </p>
            </div>

            <form
                class="bg-light shadow px-3 py-2 rounded d-flex align-items-center gap-2"
            >
                <div>
                    <label
                        for="startDate"
                        class="form-label m-0 fw-semibold small"
                        >Data Inicial</label
                    >
                    <input
                        id="startDate"
                        type="date"
                        class="form-control form-control-sm"
                    />
                </div>
                <div>
                    <label
                        for="endDate"
                        class="form-label m-0 fw-semibold small"
                        >Data Final</label
                    >
                    <input
                        id="endDate"
                        type="date"
                        class="form-control form-control-sm"
                    />
                </div>
                <div>
                    <button class="btn btn-primary btn-sm mt-4 text-white">
                        <font-awesome-icon icon="fas fa-search" />
                    </button>
                </div>
            </form>
        </div>

        <div class="row gy-3 justify-content-between">
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
