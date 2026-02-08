<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { ref, computed, watch } from "vue";

// --- STATE MANAGEMENT ---
const searchQuery = ref(""); // State untuk pencarian
const selectedCategory = ref("all");
const selectedFaculty = ref("all");
const currentPage = ref(1);
const itemsPerPage = 10;

// --- DATA MOCK (FAKULTAS) ---
const faculties = [
    "Teknik & Ilmu Komputer",
    "Ekonomi & Bisnis",
    "Desain",
    "Ilmu Sosial & Ilmu Politik",
    "Hukum",
    "Sastra"
];

// --- DATA MOCK (ORGANISASI) ---
const organizations = [
    // --- UKM ---
    { id: 1, name: "UKM Futsal", type: "ukm", logo: "⚽", faculty: null, instagram: "ukmfutsal_unikom", website: "#" },
    { id: 2, name: "UKM Basket", type: "ukm", logo: "🏀", faculty: null, instagram: "basketunikom", website: "#" },
    { id: 3, name: "UKM Paduan Suara", type: "ukm", logo: "🎵", faculty: null, instagram: "psm_unikom", website: "#" },
    { id: 4, name: "UKM Coding", type: "ukm", logo: "💻", faculty: null, instagram: "coding_unikom", website: "#" },
    { id: 5, name: "UKM Robotika", type: "ukm", logo: "🤖", faculty: null, instagram: "robotics_unikom", website: "#" },
    { id: 6, name: "UKM Fotografi", type: "ukm", logo: "📸", faculty: null, instagram: "lensa_unikom", website: "#" },
    { id: 7, name: "UKM Teater", type: "ukm", logo: "🎭", faculty: null, instagram: "teater_unikom", website: "#" },
    { id: 8, name: "Korps Protokoler", type: "ukm", logo: "👔", faculty: null, instagram: "protokoler_unikom", website: "#" },
    { id: 9, name: "UKM Bulutangkis", type: "ukm", logo: "🏸", faculty: null, instagram: "badminton_unikom", website: "#" },
    { id: 13, name: "UKM Voli", type: "ukm", logo: "🏐", faculty: null, instagram: "voli_unikom", website: "#" },
    { id: 14, name: "UKM Renang", type: "ukm", logo: "🏊", faculty: null, instagram: "renang_unikom", website: "#" },

    // --- HIMA (TEKNIK) ---
    { id: 10, name: "HIMA IF (Informatika)", type: "hima", logo: "👾", faculty: "Teknik & Ilmu Komputer", instagram: "himaif_unikom", website: "#" },
    { id: 11, name: "HIMA SI (Sistem Informasi)", type: "hima", logo: "📊", faculty: "Teknik & Ilmu Komputer", instagram: "himasi_unikom", website: "#" },
    { id: 12, name: "HIMA TE (Teknik Elektro)", type: "hima", logo: "⚡", faculty: "Teknik & Ilmu Komputer", instagram: "himate_unikom", website: "#" },

    // --- HIMA (DESAIN) ---
    { id: 20, name: "HIMA DKV", type: "hima", logo: "🎨", faculty: "Desain", instagram: "himadkv_unikom", website: "#" },
    { id: 21, name: "HIMA Arsitektur", type: "hima", logo: "🏛️", faculty: "Desain", instagram: "himaars_unikom", website: "#" },

    // --- HIMA (EKONOMI) ---
    { id: 30, name: "HIMA Manajemen", type: "hima", logo: "📈", faculty: "Ekonomi & Bisnis", instagram: "himamanajemen", website: "#" },
    { id: 31, name: "HIMA Akuntansi", type: "hima", logo: "🧾", faculty: "Ekonomi & Bisnis", instagram: "himaakuntansi", website: "#" },

    // --- HIMA (SOSPOL) ---
    { id: 40, name: "HIMA Komunikasi", type: "hima", logo: "📢", faculty: "Ilmu Sosial & Ilmu Politik", instagram: "himakom_unikom", website: "#" },
    { id: 41, name: "HIMA HI", type: "hima", logo: "🌍", faculty: "Ilmu Sosial & Ilmu Politik", instagram: "himahi_unikom", website: "#" },
    
     // --- HIMA (HUKUM) ---
    { id: 50, name: "HIMA Hukum", type: "hima", logo: "⚖️", faculty: "Hukum", instagram: "himahukum", website: "#" },

     // --- HIMA (SASTRA) ---
    { id: 60, name: "HIMA Sastra Jepang", type: "hima", logo: "🏯", faculty: "Sastra", instagram: "himasaje", website: "#" },
    { id: 61, name: "HIMA Sastra Inggris", type: "hima", logo: "🇬🇧", faculty: "Sastra", instagram: "himasing", website: "#" },
];

// --- FILTER LOGIC ---
const filteredList = computed(() => {
    return organizations.filter(org => {
        // 1. Filter Search (Nama)
        const searchMatch = org.name.toLowerCase().includes(searchQuery.value.toLowerCase());

        // 2. Filter Category
        let categoryMatch = true;
        if (selectedCategory.value !== 'all') {
            categoryMatch = org.type === selectedCategory.value;
        }

        // 3. Filter Faculty
        let facultyMatch = true;
        if (selectedCategory.value === 'hima' && selectedFaculty.value !== 'all') {
            facultyMatch = org.faculty === selectedFaculty.value;
        }

        return searchMatch && categoryMatch && facultyMatch;
    });
});

// Pagination Logic
const paginatedList = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    return filteredList.value.slice(start, end);
});

const totalPages = computed(() => {
    return Math.ceil(filteredList.value.length / itemsPerPage);
});

// --- WATCHERS ---
// Reset halaman ke 1 jika filter/search berubah
watch([searchQuery, selectedCategory, selectedFaculty], () => {
    currentPage.value = 1;
});

// --- ACTIONS ---
const setCategory = (cat) => {
    selectedCategory.value = cat;
    if (cat !== 'hima') {
        selectedFaculty.value = 'all';
    }
};

const changePage = (page) => {
    if (page >= 1 && page <= totalPages.value) {
        currentPage.value = page;
        window.scrollTo({ top: 300, behavior: 'smooth' });
    }
};
</script>

<template>
    <Head title="Daftar UKM & HIMA" />

    <MainLayout>
        <div class="min-h-screen bg-slate-50 pt-32 pb-24 relative">
            
            <div class="absolute inset-0 opacity-[0.03] pointer-events-none bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"></div>

            <div class="container mx-auto px-4 max-w-6xl relative z-10">

                <div class="text-center mb-12">
                    <h1 class="text-3xl md:text-5xl font-bold text-slate-900 mb-4">Unit Kegiatan & Himpunan</h1>
                    <p class="text-slate-500 text-lg max-w-2xl mx-auto">
                        Temukan wadah untuk mengembangkan minat, bakat, dan potensimu di UNIKOM.
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 items-start">
                    
                    <div class="lg:col-span-1 lg:sticky lg:top-32 z-20">
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 transition-all duration-300">
                            
                            <div class="mb-6 relative">
                                <label class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2 block">Pencarian</label>
                                <input 
                                    v-model="searchQuery" 
                                    type="text" 
                                    placeholder="Cari UKM / Hima..." 
                                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition-all text-sm font-semibold text-slate-700"
                                >
                                <svg class="w-4 h-4 text-slate-400 absolute left-3 top-[2.4rem]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>

                            <div class="border-b border-slate-100 mb-6"></div>

                            <h3 class="font-bold text-slate-800 text-lg mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                                Filter Kategori
                            </h3>

                            <div class="mb-6">
                                <div class="space-y-2">
                                    <button 
                                        @click="setCategory('all')"
                                        class="w-full text-left px-4 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200 flex items-center justify-between group"
                                        :class="selectedCategory === 'all' ? 'bg-slate-900 text-white shadow-md' : 'text-slate-600 hover:bg-slate-50'"
                                    >
                                        Semua
                                        <span v-if="selectedCategory === 'all'" class="w-2 h-2 rounded-full bg-blue-500"></span>
                                    </button>
                                    <button 
                                        @click="setCategory('ukm')"
                                        class="w-full text-left px-4 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200 flex items-center justify-between"
                                        :class="selectedCategory === 'ukm' ? 'bg-blue-600 text-white shadow-md' : 'text-slate-600 hover:bg-slate-50'"
                                    >
                                        UKM
                                        <span v-if="selectedCategory === 'ukm'" class="w-2 h-2 rounded-full bg-white"></span>
                                    </button>
                                    <button 
                                        @click="setCategory('hima')"
                                        class="w-full text-left px-4 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200 flex items-center justify-between"
                                        :class="selectedCategory === 'hima' ? 'bg-indigo-600 text-white shadow-md' : 'text-slate-600 hover:bg-slate-50'"
                                    >
                                        HIMA
                                        <span v-if="selectedCategory === 'hima'" class="w-2 h-2 rounded-full bg-white"></span>
                                    </button>
                                </div>
                            </div>

                            <Transition
                                enter-active-class="transition duration-300 ease-out"
                                enter-from-class="opacity-0 -translate-y-2"
                                enter-to-class="opacity-100 translate-y-0"
                                leave-active-class="transition duration-200 ease-in"
                                leave-from-class="opacity-100 translate-y-0"
                                leave-to-class="opacity-0 -translate-y-2"
                            >
                                <div v-if="selectedCategory === 'hima'" class="border-t border-slate-100 pt-6">
                                    <label class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3 block">Pilih Fakultas</label>
                                    <div class="space-y-1">
                                        <label class="flex items-center gap-3 p-2 rounded-lg hover:bg-slate-50 cursor-pointer transition-colors">
                                            <input type="radio" value="all" v-model="selectedFaculty" class="w-4 h-4 text-indigo-600 border-slate-300 focus:ring-indigo-500">
                                            <span class="text-sm font-medium text-slate-700">Semua Fakultas</span>
                                        </label>
                                        <label 
                                            v-for="fac in faculties" 
                                            :key="fac" 
                                            class="flex items-center gap-3 p-2 rounded-lg hover:bg-slate-50 cursor-pointer transition-colors"
                                        >
                                            <input type="radio" :value="fac" v-model="selectedFaculty" class="w-4 h-4 text-indigo-600 border-slate-300 focus:ring-indigo-500">
                                            <span class="text-sm font-medium text-slate-700">{{ fac }}</span>
                                        </label>
                                    </div>
                                </div>
                            </Transition>

                        </div>
                    </div>

                    <div class="lg:col-span-3 flex flex-col min-h-[600px]">
                        
                        <div class="mb-6 flex items-center justify-between">
                            <h2 class="text-xl font-bold text-slate-800">
                                {{ selectedCategory === 'all' ? 'Semua Organisasi' : (selectedCategory === 'ukm' ? 'Unit Kegiatan Mahasiswa' : 'Himpunan Mahasiswa') }}
                            </h2>
                            <span class="text-sm font-medium text-slate-500 bg-white px-3 py-1 rounded-full border border-slate-200">
                                {{ filteredList.length }} Item
                            </span>
                        </div>

                        <div v-if="paginatedList.length > 0" class="grid grid-cols-2 md:grid-cols-3 gap-6 mb-8">
                            <TransitionGroup name="list">
                                <div 
                                    v-for="org in paginatedList" 
                                    :key="org.id"
                                    class="group bg-white rounded-2xl p-5 shadow-sm border border-slate-200 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center h-full"
                                >
                                    <Link href="#" class="w-full flex flex-col items-center flex-grow">
                                        <div 
                                            class="w-16 h-16 rounded-2xl flex items-center justify-center text-3xl mb-4 shadow-inner transition-transform duration-300 group-hover:scale-110"
                                            :class="org.type === 'ukm' ? 'bg-blue-50 text-blue-600 border border-blue-100' : 'bg-indigo-50 text-indigo-600 border border-indigo-100'"
                                        >
                                            {{ org.logo }}
                                        </div>

                                        <div class="mb-2">
                                            <span 
                                                class="text-[10px] font-bold uppercase tracking-widest px-2 py-1 rounded"
                                                :class="org.type === 'ukm' ? 'bg-blue-100 text-blue-700' : 'bg-indigo-100 text-indigo-700'"
                                            >
                                                {{ org.type.toUpperCase() }}
                                            </span>
                                        </div>

                                        <h3 class="text-base font-bold text-slate-800 group-hover:text-blue-600 transition-colors line-clamp-2 mb-1">
                                            {{ org.name }}
                                        </h3>

                                        <p v-if="org.type === 'hima'" class="text-xs text-slate-400 line-clamp-1 mb-2">
                                            {{ org.faculty }}
                                        </p>
                                    </Link>

                                    <div class="mt-4 pt-4 border-t border-slate-50 w-full flex flex-col xl:flex-row gap-2">
                                        <a 
                                            :href="org.website" 
                                            target="_blank" 
                                            class="flex-1 px-3 py-2 rounded-lg bg-slate-50 text-slate-600 text-[10px] sm:text-xs font-bold hover:bg-slate-800 hover:text-white transition-colors border border-slate-100"
                                        >
                                            Website
                                        </a>
                                        <a 
                                            :href="`https://instagram.com/${org.instagram}`" 
                                            target="_blank" 
                                            class="flex-1 px-3 py-2 rounded-lg bg-pink-50 text-pink-600 text-[10px] sm:text-xs font-bold hover:bg-pink-600 hover:text-white transition-colors border border-pink-100"
                                        >
                                            Instagram
                                        </a>
                                    </div>
                                </div>
                            </TransitionGroup>
                        </div>

                        <div v-else class="bg-white rounded-2xl border-2 border-dashed border-slate-200 p-12 text-center">
                            <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-300">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h3 class="text-lg font-bold text-slate-700">Tidak Ditemukan</h3>
                            <p class="text-slate-500 text-sm">Coba ganti kata kunci atau filter lainnya.</p>
                        </div>

                        <div v-if="totalPages > 1" class="mt-auto pt-6 border-t border-slate-200 flex justify-center items-center gap-4">
                            
                            <button 
                                @click="changePage(currentPage - 1)" 
                                :disabled="currentPage === 1"
                                class="px-4 py-2 rounded-xl text-sm font-bold border border-slate-200 flex items-center gap-2 transition-all"
                                :class="currentPage === 1 ? 'text-slate-300 cursor-not-allowed bg-slate-50' : 'text-slate-600 bg-white hover:bg-slate-50 hover:border-slate-300'"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                Sebelumnya
                            </button>

                            <span class="text-sm font-bold text-slate-500">
                                Halaman <span class="text-slate-900">{{ currentPage }}</span> dari {{ totalPages }}
                            </span>

                            <button 
                                @click="changePage(currentPage + 1)" 
                                :disabled="currentPage === totalPages"
                                class="px-4 py-2 rounded-xl text-sm font-bold border border-slate-200 flex items-center gap-2 transition-all flex-row-reverse"
                                :class="currentPage === totalPages ? 'text-slate-300 cursor-not-allowed bg-slate-50' : 'text-slate-600 bg-white hover:bg-slate-50 hover:border-slate-300'"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                Selanjutnya
                            </button>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </MainLayout>
</template>

<style scoped>
/* List Transition Animation */
.list-enter-active,
.list-leave-active {
  transition: all 0.4s ease;
}
.list-enter-from,
.list-leave-to {
  opacity: 0;
  transform: scale(0.9);
}
</style>