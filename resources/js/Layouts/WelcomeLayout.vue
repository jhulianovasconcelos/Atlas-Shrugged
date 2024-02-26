<script setup>
    import {Link} from "@inertiajs/vue3";

    defineProps({
        title: {
            type: String,
        },
        welcomePage: {
            type: Boolean,
        },
    });
</script>

<template>
    <div class="h-screen flex flex-col justify-center bg-[#151E23]">
        <div class="flex flex-row justify-evenly min-h-screen">
            <div class="hidden md:flex w-1/3 flex-col justify-center items-center">
                <img class="mb-6" src="/assets/images/atlas-logo.png">
                <h1 class="text-white bold text-7xl" style="font-family: Teko">Atlas Shrugged</h1>
            </div>

            <div class="w-full px-10 md:px-0 md:w-1/3 flex flex-col items-center justify-center">
                <img class="block md:hidden w-24 my-6" src="/assets/images/atlas-logo.png">
                <div class="w-full flex flex-col justify-center items-center gap-4">
                    <div class="w-full flex flex-col justify-center items-center">
                        <h1 v-if="title" class="text-white text-5xl font-bold mb-6">{{ title }}</h1>
                        <slot />
                    </div>
                </div>

                <Link
                    v-if="!welcomePage"
                    :href="route('default')"
                    class="flex flex-row items-center justify-center gap-2 mt-4 hover:underline text-lg text-white rounded-md"
                >
                    <svg width="25" height="25" viewBox="0 0 800 800" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M359.725 198.9V308.25L386.125 308.5C569.5 310.275 672.775 391.825 699.7 557.1C598.975 440.575 482.825 440.525 386.4 440.5H359.725V548.925L112.625 373.9L359.725 198.9ZM386.4 147.325L66.525 373.9L386.4 600.475V467.175C514.425 467.225 633.125 473.675 733.5 652.675C733.5 539 714.725 285.025 386.4 281.85V147.325Z" fill="white"/>
                    </svg>

                    Voltar
                </Link>
            </div>
        </div>

        <div class="text-center text-gray-600 mb-10">
            © 2024 Atlas Shrugged. Todos os direitos reservados.
        </div>
    </div>


</template>

<style scoped>
    @font-face {
        font-family: 'Teko';
        src: url('/assets/fonts/Teko-Medium.ttf');
    }
</style>
