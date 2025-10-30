<!-- pages/Product.vue -->
<script setup>
import { ref } from "vue";
import ProductList from "@/js/components/ListS/Product/ProductList.vue";
import ProductFormModal from "@/js/components/Modals/Product/ProductFormModal.vue";

const products = ref([
    { id: 1, name: "Arroz", price: 12.5, category: "Alimentos" },
    { id: 2, name: "Sabão", price: 4.9, category: "Limpeza" },
]);

const showModal = ref(false);
const selectedProduct = ref({});

const handleAdd = () => {
    selectedProduct.value = {};
    showModal.value = true;
};

const handleEdit = (product) => {
    selectedProduct.value = { ...product };
    showModal.value = true;
};

const handleSave = (product) => {
    if (product.id) {
        const index = products.value.findIndex((p) => p.id === product.id);
        if (index !== -1) products.value[index] = { ...product };
    } else {
        product.id = Date.now();
        products.value.push(product);
    }
    showModal.value = false;
};

const handleDelete = (product) => {
    if (confirm(`Excluir ${product.name}?`)) {
        products.value = products.value.filter((p) => p.id !== product.id);
    }
};
</script>

<template>
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Produtos</h3>
            <button
                class="btn btn-primary btn-sm text-white fw-semibold"
                @click="handleAdd"
            >
                <i class="bi bi-plus-circle"></i> Novo Produto
            </button>
        </div>

        <ProductList
            :products="products"
            @edit="handleEdit"
            @delete="handleDelete"
        />

        <ProductFormModal
            :isVisible="showModal"
            :product="selectedProduct"
            @save="handleSave"
            @close="showModal = false"
        />
    </div>
</template>
