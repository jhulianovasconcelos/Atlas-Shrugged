<script setup>
    import { computed } from 'vue';
    import { Link } from '@inertiajs/vue3';

    const props = defineProps({
        href: {
            type: String,
            required: true,
        },
        active: {
            type: Boolean,
        },
    });
</script>

<template>
    <Link :href="href" class="inline-flex px-1 text-xl font-medium leading-5 text-gray-500 transition duration-150 ease-in-out">
        <slot />
    </Link>
</template>
