<script setup>
import { Link } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? "inline-flex items-center px-1 py-1 text-sm font-medium leading-5 text-secondary-600 focus:outline-none focus:border-primary-700 transition duration-150 ease-in-out"
        : "inline-flex items-center px-1 py-1 text-sm font-medium leading-5 text-gray-500 hover:text-primary-700 hover:bg-primary-100 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"
);
</script>

<template>
    <Link :href="href" :class="classes" class="rounded-md px-2">
        <slot />
    </Link>
</template>
