<script setup>
const props = defineProps({
    columns: {
        type: Array,
        required: true,
    },
    items: {
        type: Array,
        required: true,
        default: () => [],
    },
    emptyMessage: {
        type: String,
        default: "Nenhum registro encontrado.",
    },
});

const emit = defineEmits(["edit", "delete"]);
</script>

<template>
    <div class="card shadow p-3">
        <div class="table-responsive rounded-3">
            <table class="table table-sm align-middle">
                <thead>
                    <tr>
                        <th
                            v-for="col in columns"
                            :key="col.key"
                            class="text-truncate"
                        >
                            {{ col.label }}
                        </th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="!items.length">
                        <td
                            :colspan="columns.length + 1"
                            class="text-center text-muted py-4"
                        >
                            {{ emptyMessage }}
                        </td>
                    </tr>
                    <tr v-for="item in items" :key="item.id">
                        <td v-for="col in columns" :key="col.key">
                            {{ item[col.key] }}
                        </td>
                        <td class="text-end">
                            <button
                                class="btn btn-sm btn-primary me-2"
                                @click="$emit('edit', item)"
                            >
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button
                                class="btn btn-sm btn-danger"
                                @click="$emit('delete', item)"
                            >
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
