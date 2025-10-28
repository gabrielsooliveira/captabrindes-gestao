<script setup>
import { computed } from "vue";
import { formatCurrencyBRL } from "@/js/utils";

const props = defineProps({
    title: {
        type: String,
        required: true,
    },
    icon: {
        type: [String, Array],
        required: true,
    },
    value: {
        type: [Number, String],
        required: true,
    },
    type: {
        type: String,
        default: "number",
    },
    formatter: {
        type: Function,
        default: null,
    },
});

const formattedValue = computed(() => {
    if (props.formatter) return props.formatter(props.value);

    switch (props.type) {
        case "money":
            return formatCurrencyBRL(props.value);
        case "percent":
            return `${props.value}%`;
        default:
            return props.value;
    }
});
</script>

<template>
    <div class="card text-center border-0 shadow-md p-3">
        <font-awesome-icon
            :icon="props.icon"
            class="fa-3x text-secondary mb-3"
        />
        <h5 class="fw-bold">{{ title }}</h5>
        <p class="fs-5">{{ formattedValue }}</p>
    </div>
</template>
