<script setup>
    import PrimaryButton from "@/Components/PrimaryButton.vue";
    import {Head, Link} from '@inertiajs/vue3';
    import WelcomeLayout from "@/Layouts/WelcomeLayout.vue";

    defineProps({
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    });
</script>

<template>
    <Head title="Bem Vindo!" />

    <WelcomeLayout welcomePage="true">
        <div v-if="canLogin" class="w-full">
            <div
                v-if="$page.props.auth.user"
            >
                <div class="flex flex-col justify-center items-center gap-4">
                    <h1 class="text-white text-xl bold">Bem Vindo, <span class="underline">{{ $page.props.auth.user.name }}</span></h1>
                    <Link
                        class="w-full text-center"
                        :href="route('posts.index')"
                    >
                        <PrimaryButton class="w-1/2 h-14">
                            Acessar Parlador Ideal
                        </PrimaryButton>
                    </Link>
                </div>

                <Link
                    :href="route('logout')"
                    method="post"
                    class="flex flex-row items-center justify-center gap-2 mt-4 underline text-lg text-white rounded-md"
                >
                    Sair
                </Link>
            </div>

            <template v-else>
                <div class="flex flex-col justify-center items-center gap-4">
                    <Link
                        class="w-full text-center"
                        :href="route('login')"
                    >
                        <PrimaryButton class="w-1/2 h-14">
                            Entrar
                        </PrimaryButton>
                    </Link>
                    <Link
                        class="w-full text-center"
                        :href="route('register')"
                    >
                        <PrimaryButton class="w-1/2 h-14">
                            Cadastre-se
                        </PrimaryButton>
                    </Link>
                </div>
            </template>
        </div>
    </WelcomeLayout>
</template>

<style scoped>
    @font-face {
        font-family: 'Teko';
        src: url('/assets/fonts/Teko-Medium.ttf');
    }
</style>


