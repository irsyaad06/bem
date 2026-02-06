<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { ref, computed } from "vue";

// Props dari Laravel Controller (ID Kementerian yang dipilih)
const props = defineProps({
    ministryId: String // ID dikirim dari route
});

// Mock Data Kementerian (Idealnya ini dari DB berdasarkan props.ministryId)
const currentMinistry = {
    id: props.ministryId,
    name: "Kementerian Pemuda & Olahraga", // Contoh Hardcode
    icon: "⚽",
    description: "Bertanggung jawab dalam memfasilitasi minat dan bakat mahasiswa di bidang olahraga serta kepemudaan."
};

// Mock Data Aktivitas
const activitiesData = [
    { id: 1, title: "Liga Futsal UNIKOM 2024", date: "2024-03-10", status: "done", statusLabel: "Berlangsung", image: "https://images.unsplash.com/photo-1574629810360-7efbbe195018?auto=format&fit=crop&w=600&q=80" },
    { id: 2, title: "Fun Run 5K", date: "2024-05-20", status: "upcoming", statusLabel: "Akan Datang", image: "https://images.unsplash.com/photo-1552674605-5d2178b849ce?auto=format&fit=crop&w=600&q=80" },
    { id: 3, title: "Turnamen E-Sport MLBB", date: "2024-02-15", status: "done", statusLabel: "Terlaksana", image: "https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=600&q=80" },
    { id: 4, title: "Pelatihan Wasit Nasional", date: "2024-06-01", status: "upcoming", statusLabel: "Akan Datang", image: "https://images.unsplash.com/photo-1556621379-37380965e687?auto=format&fit=crop&w=600&q=80" },
];

// State
const activeTab = ref("done"); // 'done' | 'upcoming'

// Computed: Filter & Sort
const filteredActivities = computed(() => {
    // 1. Filter by Status Tab
    let filtered = activitiesData.filter(item => item.status === activeTab.value);
    
    // 2. Sort by Date (Ascending - Terdekat dulu)
    return filtered.sort((a, b) => new Date(a.date) - new Date(b.date));
});
</script>

<template>
    <Head :title="`Aktivitas - ${currentMinistry.name}`" />

    <MainLayout>
        <div class="min-h-screen bg-slate-50 pt-32 pb-24">
            
            <div class="container mx-auto px-4 max-w-6xl relative z-10">
                
                <div class="mb-8">
                    <Link href="/list-kementerian" class="inline-flex items-center text-sm font-bold text-slate-500 hover:text-blue-600 transition-colors">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        Kembali ke Pilihan Kementerian
                    </Link>
                </div>

                <div class="bg-white rounded-3xl p-8 md:p-10 shadow-lg border border-slate-100 mb-10 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-blue-50 rounded-full blur-[80px] -translate-y-1/2 translate-x-1/2"></div>
                    
                    <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center gap-6">
                        <div class="w-20 h-20 md:w-24 md:h-24 rounded-2xl bg-gradient-to-br from-blue-50 to-indigo-50 border border-blue-100 flex items-center justify-center text-4xl md:text-5xl shadow-inner">
                            {{ currentMinistry.icon }}
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-blue-600 uppercase tracking-widest mb-1">Daftar Aktivitas</h4>
                            <h1 class="text-2xl md:text-4xl font-bold text-slate-900 mb-2">{{ currentMinistry.name }}</h1>
                            <p class="text-slate-500 max-w-2xl">{{ currentMinistry.description }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mb-10">
                    <div class="bg-white p-1.5 rounded-xl shadow-sm border border-slate-200 inline-flex">
                        <button 
                            @click="activeTab = 'done'"
                            class="px-6 py-2.5 rounded-lg text-sm font-bold transition-all duration-300 flex items-center gap-2"
                            :class="activeTab === 'done' ? 'bg-slate-900 text-white shadow-md' : 'text-slate-500 hover:bg-slate-50'"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Terlaksana & Berlangsung
                        </button>
                        <button 
                            @click="activeTab = 'upcoming'"
                            class="px-6 py-2.5 rounded-lg text-sm font-bold transition-all duration-300 flex items-center gap-2"
                            :class="activeTab === 'upcoming' ? 'bg-slate-900 text-white shadow-md' : 'text-slate-500 hover:bg-slate-50'"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            Akan Datang
                        </button>
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
                            
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider backdrop-blur-md"
                                    :class="activeTab === 'done' ? 'bg-green-500/80 text-white' : 'bg-blue-500/80 text-white'"
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

                <div v-else class="text-center py-24 bg-white rounded-[2rem] border border-dashed border-slate-200">
                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-300">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800">Tidak Ada Aktivitas</h3>
                    <p class="text-slate-500 mt-2">Belum ada data aktivitas untuk filter ini.</p>
                </div>

            </div>
        </div>
    </MainLayout>
</template>