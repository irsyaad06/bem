<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { ref, computed, reactive } from "vue";

// --- MOCK DATA KEMENTERIAN ---
const ministriesList = [
    { id: 1, name: "Kementerian Kajian Aksi Strategis" },
    { id: 2, name: "Kementerian Pemuda & Olahraga" },
    { id: 3, name: "Kementerian Luar Negeri" },
    { id: 4, name: "Kementerian Dalam Negeri" },
    { id: 5, name: "Kementerian Ekonomi Kreatif" },
    { id: 6, name: "Kementerian Sosial" },
    { id: 7, name: "Kementerian Komunikasi & Informasi" },
    { id: 8, name: "Kementerian Pendidikan & Kebudayaan" },
];

// --- MOCK DATA AKTIVITAS (Campuran Semua Kementerian) ---
const activitiesData = [
    { id: 1, ministryId: 2, ministryName: "Kemenpora", title: "Liga Futsal UNIKOM 2024", date: "2024-03-10", status: "done", statusLabel: "Berlangsung", image: "https://images.unsplash.com/photo-1574629810360-7efbbe195018?auto=format&fit=crop&w=600&q=80" },
    { id: 2, ministryId: 2, ministryName: "Kemenpora", title: "Fun Run 5K", date: "2024-05-20", status: "upcoming", statusLabel: "Akan Datang", image: "https://images.unsplash.com/photo-1552674605-5d2178b849ce?auto=format&fit=crop&w=600&q=80" },
    { id: 3, ministryId: 7, ministryName: "Kominfo", title: "Workshop Desain Grafis", date: "2024-02-15", status: "finished", statusLabel: "Terlaksana", image: "https://images.unsplash.com/photo-1626785774573-4b7993143d20?auto=format&fit=crop&w=600&q=80" },
    { id: 4, ministryId: 5, ministryName: "Ekraf", title: "Bazaar UMKM Mahasiswa", date: "2024-06-01", status: "upcoming", statusLabel: "Akan Datang", image: "https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=600&q=80" },
    { id: 5, ministryId: 1, ministryName: "Kastrat", title: "Diskusi Publik: Demokrasi", date: "2024-04-05", status: "finished", statusLabel: "Terlaksana", image: "https://images.unsplash.com/photo-1544531586-fde5298cdd40?auto=format&fit=crop&w=600&q=80" },
    { id: 6, ministryId: 6, ministryName: "Kemensos", title: "UNIKOM Berbagi Takjil", date: "2024-03-25", status: "done", statusLabel: "Berlangsung", image: "https://images.unsplash.com/photo-1593113598332-cd288d649433?auto=format&fit=crop&w=600&q=80" },
];

// --- FILTER STATE ---
const filters = reactive({
    search: "",
    ministries: [], // Array ID
    statuses: []    // Array Strings ('done', 'upcoming', 'finished')
});

const isMinistryDropdownOpen = ref(false);

// --- ACTIONS ---
const toggleMinistryFilter = (id) => {
    if (filters.ministries.includes(id)) {
        filters.ministries = filters.ministries.filter(mId => mId !== id);
    } else {
        filters.ministries.push(id);
    }
};

const toggleStatusFilter = (status) => {
    if (filters.statuses.includes(status)) {
        filters.statuses = filters.statuses.filter(s => s !== status);
    } else {
        filters.statuses.push(status);
    }
};

const resetFilters = () => {
    filters.search = "";
    filters.ministries = [];
    filters.statuses = [];
};

// --- COMPUTED FILTER LOGIC ---
const filteredActivities = computed(() => {
    return activitiesData.filter(item => {
        // 1. Filter Search
        const matchSearch = item.title.toLowerCase().includes(filters.search.toLowerCase());
        
        // 2. Filter Ministry (Jika kosong = semua, jika ada isi = cek include)
        const matchMinistry = filters.ministries.length === 0 || filters.ministries.includes(item.ministryId);

        // 3. Filter Status (Jika kosong = semua, jika ada isi = cek include)
        const matchStatus = filters.statuses.length === 0 || filters.statuses.includes(item.status);

        return matchSearch && matchMinistry && matchStatus;
    }).sort((a, b) => new Date(a.date) - new Date(b.date)); // Sort Date Ascending
});

// Helper Label Status
const statusOptions = [
    { value: 'done', label: 'Berlangsung' },
    { value: 'upcoming', label: 'Akan Datang' },
    { value: 'finished', label: 'Terlaksana' },
];
</script>

<template>
    <Head title="Semua Aktivitas Kerja" />

    <MainLayout>
        <div class="min-h-screen bg-slate-50 pt-32 pb-24">
            
            <div class="absolute inset-0 opacity-[0.03] pointer-events-none bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"></div>

            <div class="container mx-auto px-4 max-w-6xl relative z-10">
                
                <div class="text-center mb-10">
                    <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4">Aktivitas Kerja</h1>
                    <p class="text-slate-500 text-lg max-w-2xl mx-auto">
                        Jelajahi seluruh agenda kegiatan BEM UNIKOM secara transparan dan terkini.
                    </p>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-4 mb-10 sticky top-24 z-30">
                    <div class="flex flex-col md:flex-row gap-4">
                        
                        <div class="relative flex-grow">
                            <input 
                                v-model="filters.search"
                                type="text" 
                                placeholder="Cari nama kegiatan..." 
                                class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all outline-none"
                            >
                            <svg class="w-5 h-5 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>

                        <div class="relative">
                            <button 
                                @click="isMinistryDropdownOpen = !isMinistryDropdownOpen"
                                class="w-full md:w-auto px-4 py-2.5 rounded-xl border flex items-center justify-between gap-2 transition-all"
                                :class="filters.ministries.length > 0 ? 'bg-blue-50 border-blue-200 text-blue-700' : 'bg-white border-slate-200 text-slate-600 hover:bg-slate-50'"
                            >
                                <span class="font-medium truncate max-w-[150px]">
                                    {{ filters.ministries.length > 0 ? `${filters.ministries.length} Kementerian` : 'Semua Kementerian' }}
                                </span>
                                <svg class="w-4 h-4 transition-transform" :class="isMinistryDropdownOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>

                            <div v-if="isMinistryDropdownOpen" class="absolute top-full mt-2 left-0 w-72 max-h-80 overflow-y-auto bg-white rounded-xl shadow-xl border border-slate-100 p-2 z-40">
                                <div v-for="min in ministriesList" :key="min.id" class="mb-1 last:mb-0">
                                    <label class="flex items-center gap-3 p-2 rounded-lg hover:bg-slate-50 cursor-pointer select-none">
                                        <input 
                                            type="checkbox" 
                                            :checked="filters.ministries.includes(min.id)"
                                            @change="toggleMinistryFilter(min.id)"
                                            class="w-4 h-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500"
                                        >
                                        <span class="text-sm text-slate-700 font-medium leading-tight">{{ min.name }}</span>
                                    </label>
                                </div>
                            </div>
                            
                            <div v-if="isMinistryDropdownOpen" @click="isMinistryDropdownOpen = false" class="fixed inset-0 z-30 cursor-default"></div>
                        </div>

                        <div class="flex gap-2 overflow-x-auto pb-2 md:pb-0">
                            <button 
                                v-for="opt in statusOptions" 
                                :key="opt.value"
                                @click="toggleStatusFilter(opt.value)"
                                class="px-4 py-2.5 rounded-xl border text-sm font-medium whitespace-nowrap transition-all"
                                :class="filters.statuses.includes(opt.value) 
                                    ? 'bg-slate-800 text-white border-slate-800' 
                                    : 'bg-white border-slate-200 text-slate-600 hover:bg-slate-50'"
                            >
                                {{ opt.label }}
                            </button>
                        </div>

                        <button 
                            v-if="filters.search || filters.ministries.length || filters.statuses.length"
                            @click="resetFilters"
                            class="px-4 py-2.5 rounded-xl text-sm font-bold text-red-500 hover:bg-red-50 transition-colors whitespace-nowrap"
                        >
                            Reset
                        </button>
                    </div>

                    <div v-if="filters.ministries.length > 0" class="flex flex-wrap gap-2 mt-4 pt-3 border-t border-slate-100">
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-wider py-1">Filter Aktif:</span>
                        <span 
                            v-for="mId in filters.ministries" 
                            :key="mId"
                            class="inline-flex items-center px-2 py-1 rounded-md bg-blue-50 text-blue-700 text-xs font-bold"
                        >
                            {{ ministriesList.find(m => m.id === mId)?.name }}
                            <button @click="toggleMinistryFilter(mId)" class="ml-1 hover:text-red-500"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                        </span>
                    </div>
                </div>

                <div v-if="filteredActivities.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div 
                        v-for="activity in filteredActivities" 
                        :key="activity.id"
                        class="bg-white rounded-[1.5rem] overflow-hidden shadow-lg border border-slate-100 hover:shadow-2xl transition-all duration-300 flex flex-col group h-full"
                    >
                        <div class="relative h-56 overflow-hidden">
                            <img :src="activity.image" :alt="activity.title" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-60"></div>
                            
                            <div class="absolute top-4 left-4">
                                <span class="px-2 py-1 rounded-lg bg-black/40 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-wider border border-white/20">
                                    {{ activity.ministryName }}
                                </span>
                            </div>

                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider backdrop-blur-md shadow-sm"
                                    :class="{
                                        'bg-blue-500/90 text-white': activity.status === 'done',
                                        'bg-amber-500/90 text-white': activity.status === 'upcoming',
                                        'bg-green-500/90 text-white': activity.status === 'finished'
                                    }"
                                >
                                    {{ activity.statusLabel }}
                                </span>
                            </div>
                        </div>

                        <div class="p-6 flex flex-col flex-grow relative">
                            <div class="absolute -top-6 left-6 bg-white px-4 py-2 rounded-lg shadow-md border border-slate-50 flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span class="text-sm font-bold text-slate-800">{{ activity.date }}</span>
                            </div>

                            <div class="mt-4 mb-4">
                                <h3 class="text-xl font-bold text-slate-900 leading-snug group-hover:text-blue-700 transition-colors line-clamp-2">
                                    {{ activity.title }}
                                </h3>
                            </div>
                            
                            <div class="mt-auto pt-4 border-t border-slate-50">
                                <Link 
                                    :href="`/aktivitas-kerja/detail/${activity.id}`"
                                    class="w-full py-3 rounded-xl bg-slate-50 text-slate-600 font-bold text-sm hover:bg-slate-900 hover:text-white transition-all duration-300 flex items-center justify-center gap-2"
                                >
                                    Lihat Detail
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-else class="text-center py-24 bg-white rounded-[2rem] border-2 border-dashed border-slate-200">
                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-300">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800">Tidak Ada Kegiatan Ditemukan</h3>
                    <p class="text-slate-500 mt-2">Coba ubah kata kunci pencarian atau atur ulang filter Anda.</p>
                    <button @click="resetFilters" class="mt-6 px-6 py-2 bg-blue-600 text-white rounded-lg font-bold hover:bg-blue-700 transition-colors">
                        Reset Semua Filter
                    </button>
                </div>

            </div>
        </div>
    </MainLayout>
</template>