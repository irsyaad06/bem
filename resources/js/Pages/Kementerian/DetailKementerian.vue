<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";

// --- STATE MANAGEMENT ---
const activeTab = ref("profil"); // Options: 'profil', 'staff', 'aktivitas'

// --- MOCK DATA KEMENTERIAN (Contoh: KOMINFO) ---
const ministry = {
    id: "kominfo",
    name: "Kementerian Komunikasi & Informasi",
    kemenko: "Kemenkoan TEKRAF",
    logo: "📡", 
    theme: "blue", 
    description: "Bertanggung jawab sebagai garda terdepan dalam pengelolaan informasi, publikasi, dan branding BEM UNIKOM serta menjadi jembatan informasi antara BEM dengan mahasiswa dan masyarakat luas.",
    
    // Data Tab 1: Tupoksi
    duties: [
        "Mengelola seluruh akun media sosial resmi BEM UNIKOM (Instagram, TikTok, YouTube, Website).",
        "Bertanggung jawab atas publikasi informasi kegiatan dan isu-isu strategis kampus.",
        "Melakukan maintenance dan pengembangan Website BEM UNIKOM.",
        "Menjalin hubungan baik dengan media partner eksternal.",
        "Membuat desain grafis dan video editing untuk keperluan organisasi."
    ],

    // Data Tab 2: Staff
    // PERBAIKAN: Menambahkan ID unik untuk setiap staff agar routing berfungsi
    staff: [
        { id: 1, name: "Nama Menteri", role: "Menteri", image: "https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?auto=format&fit=crop&w=400&q=80" },
        { id: 2, name: "Nama Wakil", role: "Wakil Menteri", image: "https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=400&q=80" },
        { id: 3, name: "Nama Staff 1", role: "Dirjen Media Kreatif", image: "https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=400&q=80" },
        { id: 4, name: "Nama Staff 2", role: "Dirjen Public Relation", image: "https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&q=80" },
        { id: 5, name: "Nama Staff 3", role: "Staff Ahli Desain", image: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=400&q=80" },
        { id: 6, name: "Nama Staff 4", role: "Staff Ahli Video", image: "https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=400&q=80" },
    ],

    // Data Tab 3: Aktivitas
    activities: [
        { id: 1, title: "Grand Launching Website BEM", date: "20 Februari 2024", status: "Terlaksana", image: "https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=600&q=80" },
        { id: 2, title: "Pelatihan Jurnalistik Mahasiswa", date: "15 April 2024", status: "Akan Datang", image: "https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=600&q=80" },
        { id: 3, title: "Podcast: Suara Mahasiswa Vol.1", date: "10 Maret 2024", status: "Berlangsung", image: "https://images.unsplash.com/photo-1478737270239-2f02b77ac6d5?auto=format&fit=crop&w=600&q=80" },
    ]
};

// Menu Sidebar
const menus = [
    { id: 'profil', label: 'Profil & Tupoksi', icon: 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z' },
    { id: 'staff', label: 'Struktur & Staff', icon: 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z' },
    { id: 'aktivitas', label: 'Aktivitas Kerja', icon: 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10' },
];
</script>

<template>
    <Head :title="ministry.name" />

    <MainLayout>
        <div class="relative min-h-screen bg-slate-50 pb-24">
            
            <div class="absolute inset-0 opacity-[0.03] pointer-events-none bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"></div>
            <div class="absolute inset-0 bg-[linear-gradient(to_right,#8080800a_1px,transparent_1px),linear-gradient(to_bottom,#8080800a_1px,transparent_1px)] bg-[size:32px_32px]"></div>

            <div class="relative pt-32 pb-12 bg-white border-b border-slate-200">
                <div class="container mx-auto px-4 text-center">
                    
                    <div class="mb-8">
                        <Link href="/kementerian" class="inline-flex items-center text-sm font-bold text-slate-400 hover:text-blue-600 transition-colors">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            Kembali ke Daftar
                        </Link>
                    </div>

                    <div class="flex flex-col items-center">
                        <div class="w-24 h-24 md:w-32 md:h-32 rounded-[2rem] bg-blue-50 text-blue-600 flex items-center justify-center text-6xl shadow-inner border border-blue-100 mb-6">
                            {{ ministry.logo }}
                        </div>
                        <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-500 text-xs font-bold uppercase tracking-widest mb-3">
                            {{ ministry.kemenko }}
                        </span>
                        <h1 class="text-3xl md:text-5xl font-bold text-slate-900 max-w-4xl leading-tight mb-4">
                            {{ ministry.name }}
                        </h1>
                        <p class="text-slate-500 text-lg max-w-2xl mx-auto leading-relaxed">
                            {{ ministry.description }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="container mx-auto px-4 py-12 max-w-6xl">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    
                    <div class="lg:col-span-3 lg:sticky lg:top-28 z-10">
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-2 space-y-1">
                            
                            <button 
                                v-for="menu in menus" 
                                :key="menu.id"
                                @click="activeTab = menu.id"
                                class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition-all duration-300"
                                :class="activeTab === menu.id 
                                    ? 'bg-blue-50 text-blue-700 shadow-sm' 
                                    : 'text-slate-500 hover:bg-slate-50 hover:text-slate-700'"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="menu.icon"></path></svg>
                                {{ menu.label }}
                            </button>

                        </div>

                        <div class="mt-6 bg-slate-900 rounded-2xl p-6 text-white text-center">
                            <h4 class="font-bold text-lg mb-2">Ingin Kolaborasi?</h4>
                            <p class="text-slate-400 text-sm mb-4">Hubungi kementerian ini untuk kerjasama.</p>
                            <button class="w-full py-2 bg-blue-600 hover:bg-blue-500 rounded-lg text-sm font-bold transition-colors">
                                Kontak Sekarang
                            </button>
                        </div>
                    </div>

                    <div class="lg:col-span-9 min-h-[500px]">
                        
                        <Transition mode="out-in" enter-active-class="transition duration-300 ease-out" enter-from-class="opacity-0 translate-y-2" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition duration-200 ease-in" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 -translate-y-2">
                            
                            <div v-if="activeTab === 'profil'" key="profil">
                                <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm">
                                    <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                                        <span class="w-1 h-6 bg-blue-600 rounded-full"></span>
                                        Tugas Pokok & Fungsi
                                    </h3>
                                    
                                    <div class="space-y-4">
                                        <div v-for="(duty, idx) in ministry.duties" :key="idx" class="flex gap-4 items-start p-4 rounded-xl bg-slate-50 border border-slate-100 hover:border-blue-200 transition-colors">
                                            <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-blue-600 font-bold shrink-0 shadow-sm">
                                                {{ idx + 1 }}
                                            </div>
                                            <p class="text-slate-700 leading-relaxed">{{ duty }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div v-else-if="activeTab === 'staff'" key="staff">
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                    <div 
                                        v-for="(person, idx) in ministry.staff" 
                                        :key="idx"
                                        class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-200 hover:shadow-lg transition-all duration-300"
                                    >
                                        <div class="aspect-[4/5] relative overflow-hidden bg-slate-100">
                                            <img :src="person.image" :alt="person.name" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                            <div class="absolute bottom-0 left-0 p-4 w-full">
                                                <p class="text-xs font-bold text-blue-300 uppercase tracking-wider mb-1">{{ person.role }}</p>
                                                <h4 class="text-lg font-bold text-white leading-tight">{{ person.name }}</h4>
                                            </div>
                                        </div>
                                        
                                        <div class="relative z-10">
                                            <Link 
                                                :href="`/profile/${person.id}`" 
                                                class="block w-full py-2 rounded-lg bg-slate-50 text-center text-xs font-bold text-slate-600 transition-colors duration-300 hover:bg-slate-900 hover:text-white"
                                            >
                                                Lihat Profil
                                            </Link>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div v-else-if="activeTab === 'aktivitas'" key="aktivitas">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div 
                                        v-for="activity in ministry.activities" 
                                        :key="activity.id"
                                        class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-200 hover:shadow-lg transition-all duration-300 flex flex-col group"
                                    >
                                        <div class="h-48 relative overflow-hidden">
                                            <img :src="activity.image" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                            <div class="absolute top-3 right-3">
                                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider text-white shadow-sm"
                                                    :class="{
                                                        'bg-green-500': activity.status === 'Terlaksana',
                                                        'bg-blue-500': activity.status === 'Berlangsung',
                                                        'bg-amber-500': activity.status === 'Akan Datang',
                                                    }"
                                                >
                                                    {{ activity.status }}
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <div class="p-5 flex flex-col flex-grow">
                                            <div class="text-xs font-bold text-slate-400 mb-2 flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                {{ activity.date }}
                                            </div>
                                            <h3 class="text-lg font-bold text-slate-800 mb-4 line-clamp-2 group-hover:text-blue-700 transition-colors">
                                                {{ activity.title }}
                                            </h3>
                                            <div class="mt-auto">
                                                <Link :href="`/aktivitas-kerja/detail/${activity.id}`" class="inline-flex items-center text-sm font-bold text-blue-600 hover:text-blue-800">
                                                    Lihat Detail
                                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                                </Link>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </Transition>
                    </div>

                </div>
            </div>

        </div>
    </MainLayout>
</template>