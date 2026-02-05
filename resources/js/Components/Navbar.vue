<script setup>
import { ref } from "vue";
import { usePage, Link } from "@inertiajs/vue3"; // Pastikan Link diimport jika ingin SPA, atau pakai <a> biasa

// STATE
const isMenuOpen = ref(false);
const isMobileDropdownOpen = ref(false); // State khusus dropdown mobile

// DATA MENU (Update Struktur)
const menuItems = [
    { label: "Beranda", url: "/" },
    { label: "Struktur", url: "/struktur" },
    {
        label: "Informasi",
        url: "#", // Parent tidak navigasi langsung biasanya
        children: [
            { label: "Program Kerja", url: "/program-kerja" },
            { label: "Aktivitas Kerja", url: "/aktivitas-kerja" },
            { label: "Transparansi Dana", url: "/transparansi-dana" },
            { label: "Kesekretariatan", url: "/kesekretariatan" },
        ]
    },
    { label: "Kontak", url: "/kontak" },
];

// HELPER: Cek Active Class
const page = usePage();
const isActive = (url) => {
    // Logic sederhana: jika URL sama persis ATAU jika diawali URL tersebut (untuk nested route)
    // Hindari match '/' untuk semua route
    if (url === '/') return page.url === '/';
    return page.url.startsWith(url);
};

// ACTIONS
const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};

const closeMenu = () => {
    isMenuOpen.value = false;
    isMobileDropdownOpen.value = false; // Reset dropdown mobile saat menu tutup
};

const toggleMobileDropdown = () => {
    isMobileDropdownOpen.value = !isMobileDropdownOpen.value;
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
                <li v-for="item in menuItems" :key="item.label" class="relative group">
                    
                    <div v-if="item.children" class="relative">
                        <button
                            class="flex items-center gap-1 px-4 py-2 text-[15px] font-medium rounded-lg transition-all duration-200 group-hover:text-blue-700"
                            :class="item.children.some(child => isActive(child.url)) ? 'text-blue-700 bg-blue-50/50' : 'text-slate-600 hover:text-blue-700 hover:bg-blue-50/50'"
                        >
                            {{ item.label }}
                            <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </button>

                        <div class="absolute top-full left-1/2 -translate-x-1/2 mt-2 w-48 bg-white rounded-xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top translate-y-2 group-hover:translate-y-0 overflow-hidden">
                            <ul class="py-1">
                                <li v-for="child in item.children" :key="child.label">
                                    <a 
                                        :href="child.url" 
                                        class="block px-4 py-2 text-sm transition-colors"
                                        :class="isActive(child.url) ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-slate-600 hover:bg-gray-50 hover:text-blue-600'"
                                    >
                                        {{ child.label }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <a
                        v-else
                        :href="item.url"
                        class="text-[15px] font-medium px-4 py-2 rounded-lg transition-all duration-200 block"
                        :class="isActive(item.url) ? 'text-blue-700 bg-blue-50/80 font-bold shadow-sm' : 'text-slate-600 hover:text-blue-700 hover:bg-blue-50/50'"
                    >
                        {{ item.label }}
                    </a>
                </li>
            </ul>

            <div class="flex items-center gap-3 pr-1">
                <a
                    href="/ruang-asa"
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
                    <svg v-if="!isMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    <svg v-else class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
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
                class="pointer-events-auto absolute top-full mt-3 w-[92%] max-w-md bg-white/95 backdrop-blur-xl rounded-2xl shadow-2xl border border-white/50 p-4 flex flex-col gap-1 md:hidden z-40 ring-1 ring-black/5 max-h-[80vh] overflow-y-auto"
            >
                <template v-for="item in menuItems" :key="item.label">
                    
                    <div v-if="item.children" class="rounded-lg overflow-hidden">
                        <button 
                            @click="toggleMobileDropdown"
                            class="w-full flex items-center justify-between p-3 text-slate-700 font-medium hover:bg-blue-50 hover:text-blue-700 transition-all text-left rounded-lg"
                            :class="item.children.some(child => isActive(child.url)) ? 'bg-blue-50 text-blue-700' : ''"
                        >
                            {{ item.label }}
                            <svg 
                                class="w-4 h-4 transition-transform duration-200"
                                :class="isMobileDropdownOpen ? 'rotate-180' : ''"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        
                        <div v-if="isMobileDropdownOpen" class="bg-slate-50 pl-4 py-2 space-y-1">
                            <a 
                                v-for="child in item.children" 
                                :key="child.label"
                                :href="child.url"
                                @click="closeMenu"
                                class="block p-2 text-sm text-slate-600 rounded-md"
                                :class="isActive(child.url) ? 'font-bold text-blue-700 bg-blue-100/50' : 'hover:text-blue-600'"
                            >
                                • {{ child.label }}
                            </a>
                        </div>
                    </div>

                    <a
                        v-else
                        :href="item.url"
                        @click="closeMenu"
                        class="block text-center p-3 rounded-lg transition-all"
                        :class="isActive(item.url) ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 font-medium hover:bg-blue-50 hover:text-blue-700'"
                    >
                        {{ item.label }}
                    </a>

                </template>

                <hr class="border-gray-100 my-2">

                <a
                    href="/ruang-asa"
                    class="block text-center bg-[#14274f] text-white font-bold p-3 rounded-xl shadow-md active:scale-95 transition-transform"
                >
                    Ruang Asa
                </a>
            </div>
        </transition>
    </nav>
</template>