<script setup>
import { ref, onMounted, onUnmounted } from "vue";
import { usePage, Link } from "@inertiajs/vue3";

// --- STATE ---
const isMobileMenuOpen = ref(false);
const activeDesktopMenu = ref(null); // Menyimpan string label menu yang sedang aktif (misal: 'Informasi')
const navContainerRef = ref(null); // Referensi untuk deteksi click outside

// --- DATA MENU ---
const menuItems = [
    { label: "Beranda", url: "/" },
    { label: "Struktur", url: "/struktur" },
    {
        label: "Informasi",
        url: "#", 
        children: [
            { 
                label: "Program Kerja", 
                url: "/program-kerja", 
                desc: "Rencana strategis & agenda kegiatan.",
                icon: "🚀"
            },
            { 
                label: "Aktivitas Kerja", 
                url: "/list-kementerian", 
                desc: "Dokumentasi kegiatan kementerian.",
                icon: "⚡"
            },
            { 
                label: "Transparansi Dana", 
                url: "/transparansi-dana", 
                desc: "Laporan keuangan terbuka.",
                icon: "💰" // Ganti dengan SVG icon nyata nanti
            },
            { 
                label: "Kesekretariatan", 
                url: "/kesekretariatan", 
                desc: "Administrasi & surat menyurat.",
                icon: "📑" // Ganti dengan SVG icon nyata nanti
            },
        ]
    },
    { label: "Kontak", url: "/kontak" },
];

// --- HELPER ---
const page = usePage();
const isActive = (url) => {
    if (url === '/') return page.url === '/';
    return page.url.startsWith(url);
};

// Cek apakah parent menu aktif (karena salah satu anaknya aktif)
const isParentActive = (item) => {
    if (item.children) {
        return item.children.some(child => isActive(child.url));
    }
    return isActive(item.url);
};

// --- ACTIONS DESKTOP ---
const toggleDesktopMenu = (label) => {
    if (activeDesktopMenu.value === label) {
        // Jika diklik lagi, tutup
        activeDesktopMenu.value = null;
    } else {
        // Buka menu baru
        activeDesktopMenu.value = label;
    }
};

const closeDesktopMenu = () => {
    activeDesktopMenu.value = null;
};

// Logic Click Outside
const handleClickOutside = (event) => {
    if (navContainerRef.value && !navContainerRef.value.contains(event.target)) {
        closeDesktopMenu();
    }
};

// Lifecycle Hooks untuk Click Outside
onMounted(() => {
    document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
});

// --- ACTIONS MOBILE ---
const toggleMobileMenu = () => isMobileMenuOpen.value = !isMobileMenuOpen.value;
</script>

<template>
    <nav 
        ref="navContainerRef"
        class="fixed top-6 left-0 right-0 z-50 flex flex-col items-center px-4"
    >
        <div
            class="relative z-50 w-full max-w-5xl rounded-full px-6 py-3 flex items-center justify-between transition-all duration-300 
            bg-white/90 backdrop-blur-xl 
            border border-white/60 ring-1 ring-gray-900/5
            shadow-sm hover:shadow-md"
        >
            <Link href="/" class="flex items-center gap-3 shrink-0 group pl-1" @click="closeDesktopMenu">
                <img src="/img/logo_bem.png" alt="BEM Logo" class="h-8 w-auto object-contain" />
                <span class="font-bold text-slate-800 sm:block text-lg tracking-tight group-hover:text-blue-700 transition-colors">
                    BEM UNIKOM
                </span>
            </Link>

            <ul class="hidden md:flex items-center gap-1">
                <li v-for="item in menuItems" :key="item.label">
                    
                    <button
                        v-if="item.children"
                        @click="toggleDesktopMenu(item.label)"
                        class="flex items-center gap-1.5 px-4 py-2 text-[15px] font-medium rounded-full transition-all duration-200"
                        :class="[
                            activeDesktopMenu === item.label || isParentActive(item)
                                ? 'bg-slate-100 text-blue-700 font-semibold' 
                                : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50'
                        ]"
                    >
                        {{ item.label }}
                        <svg 
                            class="w-4 h-4 transition-transform duration-300"
                            :class="activeDesktopMenu === item.label ? 'rotate-180 text-blue-700' : 'text-slate-400'"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <Link
                        v-else
                        :href="item.url"
                        @click="closeDesktopMenu"
                        class="block px-4 py-2 text-[15px] font-medium rounded-full transition-all duration-200"
                        :class="isActive(item.url) ? 'text-blue-700 bg-blue-50 font-bold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50'"
                    >
                        {{ item.label }}
                    </Link>
                </li>
            </ul>

            <div class="flex items-center gap-3 pr-1">
                <Link
                    href="/ruang-asa"
                    class="hidden sm:inline-flex items-center justify-center px-6 py-2.5 text-[14px] font-bold text-white transition-all duration-300 
                    bg-[#14274f] border border-[#2a4580] shadow-md shadow-blue-900/10
                    hover:bg-slate-800 hover:shadow-lg rounded-full active:scale-95"
                >
                    Ruang Asa
                </Link>

                <button
                    @click="toggleMobileMenu"
                    class="md:hidden p-2 text-slate-600 hover:bg-slate-100 rounded-full transition-colors focus:outline-none"
                >
                    <svg v-if="!isMobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    <svg v-else class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
        </div>

        <Transition
            enter-active-class="transition duration-300 ease-out"
            enter-from-class="opacity-0 -translate-y-4 scale-95"
            enter-to-class="opacity-100 translate-y-0 scale-100"
            leave-active-class="transition duration-200 ease-in"
            leave-from-class="opacity-100 translate-y-0 scale-100"
            leave-to-class="opacity-0 -translate-y-2 scale-95"
        >
            <div
                v-if="activeDesktopMenu"
                class="absolute top-full mt-2 w-full max-w-5xl z-40 origin-top"
            >
                <div class="bg-white/95 backdrop-blur-2xl rounded-3xl shadow-2xl border border-white/50 ring-1 ring-gray-900/5 p-2 overflow-hidden">
                    
                    <template v-for="item in menuItems" :key="item.label">
                        <div v-if="activeDesktopMenu === item.label && item.children" class="p-4">
                            
                            <div class="mb-4 px-2">
                                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest">
                                    Menu {{ item.label }}
                                </h3>
                            </div>

                            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                                <Link 
                                    v-for="child in item.children" 
                                    :key="child.label"
                                    :href="child.url"
                                    @click="closeDesktopMenu"
                                    class="group flex items-start gap-3 p-3 rounded-2xl hover:bg-slate-50 transition-all duration-200"
                                    :class="isActive(child.url) ? 'bg-blue-50/50 ring-1 ring-blue-100' : ''"
                                >
                                    <div class="shrink-0 w-10 h-10 rounded-xl bg-white border border-slate-100 shadow-sm flex items-center justify-center text-lg group-hover:scale-110 group-hover:border-blue-200 transition-all">
                                        {{ child.icon || '📄' }}
                                    </div>
                                    
                                    <div>
                                        <p class="font-bold text-slate-800 text-sm group-hover:text-blue-700 transition-colors" :class="isActive(child.url) ? 'text-blue-700' : ''">
                                            {{ child.label }}
                                        </p>
                                        <p class="text-xs text-slate-500 mt-0.5 line-clamp-2 leading-relaxed">
                                            {{ child.desc || 'Deskripsi singkat halaman.' }}
                                        </p>
                                    </div>
                                </Link>
                            </div>

                        </div>
                    </template>

                </div>
            </div>
        </Transition>

        <Transition
            enter-active-class="transition duration-200 ease-out"
            enter-from-class="opacity-0 translate-y-2 scale-95"
            enter-to-class="opacity-100 translate-y-0 scale-100"
            leave-active-class="transition duration-150 ease-in"
            leave-from-class="opacity-100 translate-y-0 scale-100"
            leave-to-class="opacity-0 translate-y-2 scale-95"
        >
            <div v-if="isMobileMenuOpen" class="absolute top-full mt-3 w-[92%] max-w-md bg-white rounded-2xl shadow-2xl p-4 md:hidden z-50 ring-1 ring-black/5">
                <div class="flex flex-col gap-1">
                     <template v-for="item in menuItems" :key="item.label">
                        <div v-if="item.children" class="mb-2">
                             <p class="px-3 py-2 text-xs font-bold text-slate-400 uppercase">{{ item.label }}</p>
                             <div class="grid grid-cols-1 gap-1">
                                <Link v-for="child in item.children" :key="child.label" :href="child.url" class="block px-3 py-2 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-50">
                                    {{ child.label }}
                                </Link>
                             </div>
                        </div>
                        <Link v-else :href="item.url" class="block px-3 py-2 rounded-lg font-medium text-slate-700 hover:bg-slate-50">
                            {{ item.label }}
                        </Link>
                     </template>
                </div>
            </div>
        </Transition>
    </nav>
</template>