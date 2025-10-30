<!-- components/ProductList.vue -->
<script setup>
import List from "@/js/components/Lists/List.vue";
import { computed } from "vue";

const props = defineProps({
    products: {
        type: Array,
        required: true,
        default: () => [],
    },
});

const emit = defineEmits(["edit", "delete"]);

const columns = [
    { key: "code", label: "Codigo" },
    { key: "name", label: "Nome" },
    { key: "category", label: "Categoria" },
    { key: "min_quantity", label: "Quantidade Minima" },
    { key: "status", label: "Status" },
];

const formattedProducts = computed(() =>
    props.products.map((p) => ({
        ...p,
        priceFormatted: `R$ ${p.price.toFixed(2)}`,
    }))
);
</script>

<template>
    <List
        :columns="columns"
        :items="formattedProducts"
        @edit="(item) => $emit('edit', item)"
        @delete="(item) => $emit('delete', item)"
    />
</template>
