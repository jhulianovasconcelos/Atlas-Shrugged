<script setup>
import { ref } from 'vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import { Head } from '@inertiajs/vue3';
import NavBar from "@/Components/NavBar.vue";

const showingNavigationDropdown = ref(false);
</script>

<template>
    <Head title="Página Inicial" />
    <div class="flex">
        <NavBar />
        <div class="min-h-screen bg-[#151E23] w-full ml-20 md:ml-0">
            <div class="w-full">
                <!-- Page Heading -->
                <header class="shadow" v-if="$slots.header">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <slot name="header" />
                    </div>
                </header>

                <!-- Page Content -->
                <main>
                    <slot />
                </main>
            </div>
        </div>
    </div>

</template>
