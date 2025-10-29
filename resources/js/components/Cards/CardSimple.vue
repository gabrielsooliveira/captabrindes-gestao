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
    <div class="card shadow">
        <div
            class="card-body d-flex justify-content-between align-items-center"
        >
            <div class="col-10">
                <h5 class="text-muted fs-6 mt-0" title="Number of Customers">
                    {{ title }}
                </h5>
                <h3>{{ formattedValue }}</h3>
            </div>
            <div
                class="col-2 bg-secondary p-3 rounded d-flex align-items-center justify-content-center"
            >
                <font-awesome-icon
                    :icon="props.icon"
                    class="fa-1x text-light"
                />
            </div>
        </div>
    </div>
</template>
