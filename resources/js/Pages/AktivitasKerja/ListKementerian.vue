<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

// Data Kementerian
const ministries = [
    { id: 1, name: "Kementerian Kajian Aksi Strategis", icon: "📢", color: "bg-red-50 text-red-600 border-red-200" },
    { id: 2, name: "Kementerian Pemuda & Olahraga", icon: "⚽", color: "bg-orange-50 text-orange-600 border-orange-200" },
    { id: 3, name: "Kementerian Luar Negeri", icon: "🌏", color: "bg-blue-50 text-blue-600 border-blue-200" },
    { id: 4, name: "Kementerian Dalam Negeri", icon: "🏠", color: "bg-emerald-50 text-emerald-600 border-emerald-200" },
    { id: 5, name: "Kementerian Ekonomi Kreatif", icon: "💡", color: "bg-purple-50 text-purple-600 border-purple-200" },
    { id: 6, name: "Kementerian Sosial", icon: "🤝", color: "bg-pink-50 text-pink-600 border-pink-200" },
    { id: 7, name: "Kementerian Komunikasi & Informasi", icon: "📡", color: "bg-cyan-50 text-cyan-600 border-cyan-200" },
    { id: 8, name: "Kementerian Pendidikan & Kebudayaan", icon: "🎓", color: "bg-yellow-50 text-yellow-600 border-yellow-200" },
];
</script>

<template>
    <Head title="Pilih Kementerian" />

    <MainLayout>
        <div class="min-h-screen bg-slate-50 pt-32 pb-24">
            <div class="absolute inset-0 opacity-[0.03] pointer-events-none bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"></div>
            
            <div class="container mx-auto px-4 max-w-6xl relative z-10">

                <div class="text-center mb-16">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-blue-100 bg-white shadow-sm mb-4">
                        <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                        <span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Arsip Kegiatan</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4">Pilih Kementerian</h1>
                    <p class="text-slate-500 text-lg max-w-xl mx-auto">
                        Silakan pilih kementerian untuk melihat rekam jejak aktivitas kerja, program, dan agenda yang telah maupun akan dilaksanakan.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <Link 
                        v-for="ministry in ministries" 
                        :key="ministry.id"
                        :href="`/aktivitas-kerja/kementerian/${ministry.id}`"
                        class="group bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative overflow-hidden"
                    >
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-400 to-indigo-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>

                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-14 h-14 rounded-2xl flex items-center justify-center text-3xl shadow-inner" :class="ministry.color">
                                {{ ministry.icon }}
                            </div>
                        </div>
                        
                        <h3 class="text-lg font-bold text-slate-800 group-hover:text-blue-700 transition-colors leading-tight min-h-[3rem]">
                            {{ ministry.name }}
                        </h3>

                        <div class="mt-6 flex items-center justify-between border-t border-slate-50 pt-4">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Lihat Aktivitas</span>
                            <div class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-blue-600 group-hover:text-white transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </div>
                        </div>
                    </Link>
                </div>

            </div>
        </div>
    </MainLayout>
</template>