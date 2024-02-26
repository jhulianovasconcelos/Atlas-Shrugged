<script setup>
import { Head } from '@inertiajs/vue3';
import WelcomeLayout from "@/Layouts/WelcomeLayout.vue";
import RegisterForm from "@/Pages/Auth/RegisterForm.vue";
</script>

<template>
    <Head title="Cadastrar-se" />

    <WelcomeLayout title="Cadastro">
        <RegisterForm />
    </WelcomeLayout>
</template>
