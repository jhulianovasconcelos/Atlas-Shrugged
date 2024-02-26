<script setup>
    import Dropdown from '@/Components/Dropdown.vue';
    import DropdownLink from '@/Components/DropdownLink.vue';
    import InputError from '@/Components/InputError.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import dayjs from 'dayjs';
    import relativeTime from 'dayjs/plugin/relativeTime';
    import { useForm } from '@inertiajs/vue3';
    import { ref } from 'vue';

    dayjs.extend(relativeTime);

    const props = defineProps(['post']);

    const form = useForm({
        message: props.post.message,
    });

    const editing = ref(false);
</script>

<template>
    <div class="p-6 flex space-x-2">
        <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/0.jpg">
        <div class="flex-1 w-full">
            <div class="flex justify-between items-center">
                <div>
                    <span class="text-white font-bold">{{ post.user.name }}</span>
                    <small class="ml-2 text-sm text-white">{{ dayjs(post.created_at).fromNow() }}</small>
                    <small v-if="post.created_at !== post.updated_at" class="text-sm text-white"> &middot; editado</small>
                </div>
                <Dropdown v-if="post.user.id === $page.props.auth.user.id">
                    <template #trigger>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="white">
                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </button>
                    </template>
                    <template #content>
                        <button class="block hover:text-gray-700 w-full px-4 py-2 text-left text-sm leading-5 text-white hover:bg-gray-100 focus:bg-gray-100 transition duration-150 ease-in-out" @click="editing = true">
                            Editar
                        </button>
                        <DropdownLink as="button" :href="route('posts.destroy', post.id)" method="delete">
                            Deletar
                        </DropdownLink>
                    </template>
                </Dropdown>
            </div>
            <form v-if="editing" @submit.prevent="form.put(route('posts.update', post.id), { onSuccess: () => editing = false })">
                <textarea v-model="form.message" class="bg-[#151E23] mt-4 w-full text-white border-gray-300 focus:ring-0 focus:border-white rounded-md shadow-sm"></textarea>
                <InputError :message="form.errors.message" class="mt-2" />
                <div class="space-x-2">
                    <PrimaryButton class="mt-4">Salvar</PrimaryButton>
                    <button class="text-white mt-4" @click="editing = false; form.reset(); form.clearErrors()">Cancelar</button>
                </div>
            </form>
            <p v-else class="mt-4 text-white break-words w-11/12">{{ post.message }}</p>
        </div>
    </div>
</template>
