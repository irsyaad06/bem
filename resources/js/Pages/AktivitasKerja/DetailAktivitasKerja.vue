<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

// Props ID dari route
const props = defineProps({
    id: String
});

// Mock Data Detail Aktivitas (Nanti diganti data dari Database berdasarkan props.id)
const activity = {
    id: 1,
    title: "Liga Futsal UNIKOM 2024",
    ministry: "Kementerian Pemuda & Olahraga",
    ministryId: 2, // ID Kementerian untuk tombol back
    date: "10 - 15 Maret 2024",
    time: "08:00 - 17:00 WIB",
    location: "GOR C-Tra Arena Bandung",
    status: "Berlangsung", // Status: Berlangsung, Terlaksana, Akan Datang
    description: `
        <p>Liga Futsal UNIKOM adalah kompetisi tahunan yang mempertemukan tim-tim terbaik dari setiap program studi dan fakultas di lingkungan UNIKOM. Kegiatan ini bertujuan untuk menjunjung tinggi sportivitas, menyalurkan bakat mahasiswa di bidang olahraga futsal, serta mempererat tali silaturahmi antar mahasiswa.</p>
        <p>Tahun ini, kompetisi diikuti oleh 32 tim putra dan 16 tim putri dengan sistem gugur. Antusiasme peserta sangat tinggi terlihat dari slot pendaftaran yang habis hanya dalam waktu 3 hari.</p>
        <p>Selain pertandingan utama, juga terdapat pertandingan eksibisi antara Dosen vs Pengurus BEM serta penampilan hiburan dari UKM Tari dan Musik.</p>
        <h3>Tujuan Kegiatan:</h3>
        <ul>
            <li>Mencari bibit atlet futsal potensial untuk mewakili UNIKOM di tingkat nasional.</li>
            <li>Membangun jiwa kompetitif yang sehat di kalangan mahasiswa.</li>
            <li>Sebagai sarana refreshing dan hiburan bagi civitas akademika.</li>
        </ul>
    `,
    image: "https://images.unsplash.com/photo-1574629810360-7efbbe195018?auto=format&fit=crop&w=1200&q=80",
    gallery: [
        "https://images.unsplash.com/photo-1518609878373-06d740f60d8b?auto=format&fit=crop&w=600&q=80",
        "https://images.unsplash.com/photo-1575361204480-aadea25e6e68?auto=format&fit=crop&w=600&q=80",
        "https://images.unsplash.com/photo-1517466787929-bc90951d0974?auto=format&fit=crop&w=600&q=80"
    ]
};

// Helper warna status
const getStatusColor = (status) => {
    if (status === 'Berlangsung') return 'bg-blue-600 text-white';
    if (status === 'Terlaksana') return 'bg-green-600 text-white';
    return 'bg-amber-500 text-white';
};
</script>

<template>
    <Head :title="activity.title" />

    <MainLayout>
        <div class="min-h-screen bg-slate-50 pt-32 pb-24">
            
            <div class="container mx-auto px-4 mb-6 max-w-5xl">
                <Link :href="`/aktivitas-kerja/kementerian/${activity.ministryId}`" class="inline-flex items-center text-sm font-bold text-slate-500 hover:text-blue-600 transition-colors group">
                    <svg class="w-4 h-4 mr-1 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    Kembali ke Daftar Aktivitas
                </Link>
            </div>

            <div class="container mx-auto px-4 max-w-5xl">
                
                <div class="bg-white rounded-[2rem] shadow-xl overflow-hidden border border-slate-100 mb-8 relative group">
                    <div class="h-[300px] md:h-[500px] w-full relative">
                        <img :src="activity.image" :alt="activity.title" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/20 to-transparent"></div>
                        
                        <div class="absolute bottom-0 left-0 w-full p-8 md:p-12">
                            <div class="flex flex-wrap items-center gap-3 mb-4">
                                <span class="px-3 py-1 rounded-full bg-white/20 backdrop-blur-md border border-white/30 text-white text-xs font-bold uppercase tracking-wider">
                                    {{ activity.ministry }}
                                </span>
                                <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider shadow-lg" :class="getStatusColor(activity.status)">
                                    {{ activity.status }}
                                </span>
                            </div>
                            
                            <h1 class="text-3xl md:text-5xl font-bold text-white mb-2 leading-tight drop-shadow-md">
                                {{ activity.title }}
                            </h1>
                            
                            <div class="flex items-center text-slate-200 font-medium text-sm md:text-base mt-4 gap-6">
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    {{ activity.date }}
                                </div>
                                <div class="hidden md:flex items-center gap-2">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    {{ activity.time }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid lg:grid-cols-3 gap-8">
                    
                    <div class="lg:col-span-2 space-y-8">
                        
                        <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100">
                            <h2 class="text-xl font-bold mb-6 pb-2 border-b border-slate-100 flex items-center gap-2">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                                Tentang Kegiatan
                            </h2>
                            
                            <div class="prose prose-slate prose-lg max-w-none text-slate-600 leading-relaxed">
                                <div v-html="activity.description"></div>
                            </div>
                        </div>

                        <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100">
                            <h2 class="text-xl font-bold mb-6 pb-2 border-b border-slate-100 flex items-center gap-2">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                Dokumentasi
                            </h2>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div v-for="(img, idx) in activity.gallery" :key="idx" class="rounded-xl overflow-hidden aspect-video shadow-md hover:shadow-xl transition-all duration-300 group cursor-pointer">
                                    <img :src="img" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="space-y-6">
                        <div class="bg-white p-6 rounded-[2rem] shadow-lg border border-slate-100 sticky top-28">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <h3 class="text-lg font-bold text-slate-800">Detail Informasi</h3>
                            </div>
                            
                            <ul class="space-y-6">
                                <li>
                                    <div class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Lokasi</div>
                                    <div class="flex items-start gap-3 text-slate-700 font-medium">
                                        <svg class="w-5 h-5 text-red-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        {{ activity.location }}
                                    </div>
                                </li>
                                <li>
                                    <div class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Waktu Pelaksanaan</div>
                                    <div class="flex items-start gap-3 text-slate-700 font-medium">
                                        <svg class="w-5 h-5 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <div>
                                            <div>{{ activity.date }}</div>
                                            <div class="text-sm text-slate-500">{{ activity.time }}</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Penyelenggara</div>
                                    <div class="flex items-center gap-3 text-slate-700 font-medium">
                                        <div class="w-5 h-5 rounded-full bg-slate-200 flex items-center justify-center text-[10px] font-bold text-slate-600">B</div>
                                        {{ activity.ministry }}
                                    </div>
                                </li>
                            </ul>

                            <div class="mt-8 pt-6 border-t border-slate-100">
                                <button class="w-full py-3 bg-slate-900 text-white font-bold rounded-xl hover:bg-blue-700 transition-colors shadow-lg shadow-blue-900/20 active:scale-95 duration-200">
                                    Hubungi Panitia
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </MainLayout>
</template>