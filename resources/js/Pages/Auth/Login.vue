<script setup>
import {Head, Link} from '@inertiajs/vue3';
import LoginForm from "@/Pages/Auth/LoginForm.vue";
import WelcomeLayout from "@/Layouts/WelcomeLayout.vue";

</script>

<template>
    <Head title="Login" />

    <WelcomeLayout title="Login">
        <LoginForm />
    </WelcomeLayout>
</template>
