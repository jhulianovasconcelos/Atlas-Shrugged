<script setup>
    import NavLink from "@/Components/NavLink.vue";
    import Dropdown from "@/Components/Dropdown.vue";
    import DropdownLink from "@/Components/DropdownLink.vue";
</script>

<template>
    <nav class="bg-[#1D2A30] fixed border-r border-gray-100 h-screen w-1/6 pt-6 px-3 flex flex-col justify-between items-center">
        <!-- Primary Navigation Menu -->
        <div class="flex flex-col items-center max-w-7xl mx-auto gap-4 w-full">
            <!-- Logo -->
            <img class="w-14" src="/assets/images/atlas-logo.png">

            <!-- Navigation Links -->

            <NavLink class="text-white w-full hover:bg-white hover:bg-opacity-10 justify-center text-2xl py-5" :href="route('posts.index')" :active="route().current('posts.index')">
                <div class="sm:flex gap-1 items-center">
                    <svg fill="#fff" width="30" viewBox="-3.52 -3.52 39.04 39.04" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="">
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#fafafa" stroke-width="2">
                            <path d="M0 14.016l2.016 1.984h4v14.016q0 0.832 0.576 1.408t1.408 0.576h4v-12q0-0.832 0.576-1.408t1.44-0.576h4q0.8 0 1.408 0.576t0.576 1.408v12h4q0.832 0 1.408-0.576t0.608-1.408v-14.016h4l1.984-1.984-16-14.016z"></path>
                        </g>
                    </svg>
                    <span class="hidden md:block">Página Inicial</span>
                </div>
            </NavLink>

        </div>

        <div class="sm:flex w-full">
            <!-- Settings Dropdown -->
            <div class="w-full">
                <Dropdown align="" width="48">
                    <template #trigger>
                        <div
                            class="w-full inline-flex items-center justify-center p-1 md:p-5 text-2xl border-t font-bold cursor-pointer text-white hover:bg-white hover:bg-opacity-10 transition ease-in-out duration-150"
                        >
                            <img class="w-10 rounded-full" src="https://randomuser.me/api/portraits/women/0.jpg">
                            <span class="hidden md:block ml-3 text-lg">{{ $page.props.auth.user.name }}</span>

                            <svg
                                class="-scale-y-100 ms-2 h-4 w-4 hidden md:block"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </div>
                    </template>

                    <template #content>
                        <DropdownLink :href="route('profile.edit')">
                            Perfil
                        </DropdownLink>
                        <DropdownLink :href="route('logout')" method="post" as="button">
                            Sair
                        </DropdownLink>
                    </template>
                </Dropdown>
            </div>
        </div>
    </nav>
</template>
