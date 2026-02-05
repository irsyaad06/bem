<script setup>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";

// LOGIC TETAP SAMA
const isMenuOpen = ref(false);
const menuItems = ["Beranda", "Informasi", "Program"];

const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};

const closeMenu = () => {
    isMenuOpen.value = false;
};
</script>

<template>
    <nav
        class="fixed top-6 left-0 right-0 z-50 flex justify-center px-4 pointer-events-none"
    >
        <div
            class="pointer-events-auto w-full max-w-5xl rounded-full px-6 py-3 flex items-center justify-between transition-all duration-300 
            bg-white/80 backdrop-blur-xl 
            border border-white/60 ring-1 ring-gray-900/5
            shadow-[0_8px_30px_rgb(0,0,0,0.04)]
            hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] hover:bg-white/90"
        >
            <a href="/" class="flex items-center gap-3 shrink-0 group pl-1">
                <img
                    src="/img/logo_bem.png"
                    alt="BEM Logo"
                    class="h-8 w-auto object-contain"
                />
                <span
                    class="font-bold text-slate-800 sm:block text-lg tracking-tight group-hover:text-blue-700 transition-colors"
                >
                    BEM UNIKOM
                </span>
            </a>

            <ul class="hidden md:flex items-center gap-1">
                <li v-for="item in menuItems" :key="item">
                    <a
                        href="#"
                        class="text-[15px] font-medium text-slate-600 hover:text-blue-700 hover:bg-blue-50/50 px-4 py-2 rounded-lg transition-all duration-200"
                    >
                        {{ item }}
                    </a>
                </li>
            </ul>

            <div class="flex items-center gap-3 pr-1">
                <a
                    href="#"
                    class="hidden sm:inline-flex items-center justify-center px-6 py-2.5 text-[14px] font-bold text-white transition-all duration-300 
                    bg-[#14274f]
                    border border-[#2a4580]
                    shadow-md shadow-blue-900/10
                    hover:bg-gradient-to-b hover:from-gray-800 hover:to-black
                    hover:border-gray-600
                    hover:shadow-lg
                    rounded-full
                    active:scale-95 active:translate-y-0.5"
                >
                    Ruang Asa
                </a>

                <button
                    @click="toggleMenu"
                    class="md:hidden p-2 text-slate-600 hover:bg-slate-100 rounded-lg transition-colors focus:outline-none"
                >
                    <svg
                        v-if="!isMenuOpen"
                        class="w-6 h-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg
                        v-else
                        class="w-6 h-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <transition
            enter-active-class="transition duration-200 ease-out"
            enter-from-class="opacity-0 translate-y-2 scale-95"
            enter-to-class="opacity-100 translate-y-0 scale-100"
            leave-active-class="transition duration-150 ease-in"
            leave-from-class="opacity-100 translate-y-0 scale-100"
            leave-to-class="opacity-0 translate-y-2 scale-95"
        >
            <div
                v-if="isMenuOpen"
                class="pointer-events-auto absolute top-full mt-3 w-[92%] max-w-md bg-white/90 backdrop-blur-xl rounded-xl shadow-xl border border-white/50 p-4 flex flex-col gap-2 md:hidden z-40 ring-1 ring-black/5"
            >
                <a
                    v-for="item in menuItems"
                    :key="item"
                    href="#"
                    @click="closeMenu"
                    class="block text-center text-slate-700 font-medium p-3 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition-all"
                >
                    {{ item }}
                </a>
                <a
                    href="#"
                    class="block text-center bg-[#14274f] text-white font-bold p-3 rounded-lg shadow-md mt-2"
                >
                    Ruang Asa
                </a>
            </div>
        </transition>
    </nav>
</template>