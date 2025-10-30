<!-- components/Modal.vue -->
<script setup>
import {
    ref,
    onMounted,
    onBeforeUnmount,
    watch,
    nextTick,
    computed,
} from "vue";
import { Modal } from "bootstrap";

const props = defineProps({
    title: { type: String, default: "" },
    size: { type: String, default: "md" },
    isVisible: { type: Boolean, default: false },
    backdrop: { type: [Boolean, String], default: "static" },
});

const emit = defineEmits(["close"]);
const modalRef = ref(null);
let modalInstance = null;

const closeModal = () => {
    if (modalInstance) modalInstance.hide();
    document.activeElement?.blur();
};

onMounted(() => {
    if (!modalRef.value) return;

    modalInstance = new Modal(modalRef.value, {
        backdrop: props.backdrop,
        keyboard: false,
    });

    if (props.isVisible) {
        nextTick(() => modalInstance.show());
    }

    modalRef.value.addEventListener("hidden.bs.modal", () => {
        document.activeElement?.blur();
        document.body.focus();
        emit("close");
    });
});

watch(
    () => props.isVisible,
    (val) => {
        if (!modalInstance) return;

        if (val) {
            nextTick(() => modalInstance.show());
        } else {
            document.activeElement?.blur();
            modalInstance.hide();
        }
    }
);

onBeforeUnmount(() => {
    if (modalInstance) modalInstance.dispose();
});

const sizeClass = computed(() => (props.size ? `modal-${props.size}` : ""));
</script>

<template>
    <div
        ref="modalRef"
        class="modal fade"
        tabindex="-1"
        role="dialog"
        aria-modal="true"
    >
        <div class="modal-dialog" :class="sizeClass">
            <div class="modal-content rounded-4 bg-light shadow">
                <div
                    v-if="title"
                    class="d-flex justify-content-between align-items-center px-3 pt-3"
                >
                    <h4 class="modal-title text-primary fw-bold">
                        {{ title }}
                    </h4>

                    <button
                        type="button"
                        class="btn-close"
                        @click="closeModal"
                    ></button>
                </div>

                <div class="modal-body">
                    <slot name="body"></slot>
                </div>
            </div>
        </div>
    </div>
</template>
