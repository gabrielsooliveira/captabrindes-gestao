<!-- components/FormModalProduct.vue -->
<script setup>
import { ref, watch, defineProps, defineEmits } from "vue";
import Modal from "@/js/components/Modals/Modal.vue";

const props = defineProps({
    isVisible: Boolean,
    product: {
        type: Object,
        default: () => ({}),
    },
});

const emit = defineEmits(["save", "close"]);

const localProduct = ref({ name: "", price: "", category: "" });

watch(
    () => props.product,
    (newVal) => {
        localProduct.value = { ...newVal };
    },
    { immediate: true }
);

const handleSubmit = () => {
    emit("save", { ...localProduct.value });
};
</script>

<template>
    <Modal
        :title="localProduct.id ? 'Editar Produto' : 'Adicionar Produto'"
        :isVisible="isVisible"
        size="lg"
        @close="$emit('close')"
    >
        <template #body>
            <form @submit.prevent="handleSubmit">
                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input
                        v-model="localProduct.name"
                        type="text"
                        class="form-control"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label class="form-label">Preço</label>
                    <input
                        v-model.number="localProduct.price"
                        type="number"
                        step="0.01"
                        class="form-control"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label class="form-label">Categoria</label>
                    <input
                        v-model="localProduct.category"
                        type="text"
                        class="form-control"
                    />
                </div>
                <div class="text-end w-100">
                    <button
                        type="button"
                        class="btn btn-secondary me-2"
                        @click="$emit('close')"
                    >
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Salvar
                    </button>
                </div>
            </form>
        </template>
    </Modal>
</template>
