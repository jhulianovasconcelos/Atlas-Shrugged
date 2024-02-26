<script setup>
    import HomeLayout from '@/Layouts/HomeLayout.vue';
    import Post from '@/Pages/Posts/Post.vue';
    import InputError from '@/Components/InputError.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import { useForm, Head } from '@inertiajs/vue3';
    import Modal from "@/Components/Modal.vue";
    import {nextTick, ref} from "vue";
    import Lamp from "@/Components/Lamp.vue";

    defineProps(['posts']);

    const form = useForm({
        message: '',
    });

    const postInput = ref(null);
    const creatingPost = ref(false);

    const createNewPost = () => {
        creatingPost.value = true;

        nextTick(() => postInput.value.focus());
    };

    const closeModal = () => {
        creatingPost.value = false;

        form.reset();
    };
</script>

<template>
    <Head title="Posts" />

    <HomeLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8 w-full">
            <div @click="createNewPost" class=" bottom-0 right-80 flex flex-col items-center">
                <span class="text-white">Novo Pensamento</span>
                <Lamp class="hover:bg-gray-300 transition duration-150 p-3 bg-white rounded-full cursor-pointer mt-1 active:transform active:-translate-y-3"/>
            </div>
            <Modal :show="creatingPost" @close="closeModal">
                <div class="p-6 bg-[#1D2A30]">
                    <form @submit.prevent="form.post(route('posts.store'), { onSuccess: () => [form.reset(), closeModal()] })">
                    <textarea
                        ref="postInput"
                        v-model="form.message"
                        placeholder="O que você está pensando?"
                        class="h-20 placeholder-white text-white block w-full bg-transparent border-gray-300 focus:ring-0 focus:border-gray-300 rounded-md shadow-sm"
                    ></textarea>
                        <InputError :message="form.errors.message" class="mt-2" />
                        <PrimaryButton class="mt-4">Compartilhar</PrimaryButton>
                    </form>
                </div>
            </Modal>

            <div v-for="post in posts"></div>

            <div class="divide-y ">
                <Post
                    v-for="post in posts"
                    :key="post.id"
                    :post="post"
                />
            </div>
        </div>

    </HomeLayout>

</template>
