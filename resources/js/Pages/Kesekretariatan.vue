<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";

// --- STATE MANAGEMENT ---
const activeSopTab = ref("surat"); // 'surat', 'ruangan', 'proposal'

// --- DATA SEKRETARIAT (Updated Terms) ---
const secretariatStatus = {
    isOpen: true,
    hours: "09:00 - 17:00 WIB",
    location: "Gedung Sekretariat Lt. 1, Ruang 1.02"
};

// Layanan Cepat
const services = [
    {
        title: "Nomor Surat",
        desc: "Minta nomor surat keluar resmi organisasi.",
        icon: "🔢",
        action: "Ajukan",
        link: "#", 
        color: "blue"
    },
    {
        title: "Pinjam Ruangan",
        desc: "Cek jadwal & booking ruang sekretariat.",
        icon: "🔑",
        action: "Booking",
        link: "#",
        color: "emerald"
    },
    {
        title: "Legalisir",
        desc: "Pengesahan proposal & LPJ kegiatan.",
        icon: "✍️",
        action: "Prosedur",
        link: "#",
        color: "purple"
    }
];

// Data Arsip
const templates = [
    { name: "Template Proposal Kegiatan.docx", size: "2.4 MB", type: "doc" },
    { name: "Format LPJ Kegiatan 2024.docx", size: "1.8 MB", type: "doc" },
    { name: "Surat Peminjaman Tempat.docx", size: "500 KB", type: "doc" },
    { name: "Logo BEM UNIKOM (High Res).png", size: "3.2 MB", type: "img" },
];

// SOP Data
const sops = {
    surat: [
        { title: "Drafting", desc: "Buat draft surat sesuai format baku BEM." },
        { title: "Revisi Sekum", desc: "Serahkan ke Sekretaris Umum/Kementerian." },
        { title: "Ambil Nomor", desc: "Minta nomor surat via website/admin." },
        { title: "Tanda Tangan", desc: "Proses TTD Ketua Pelaksana & Presiden." },
        { title: "Stempel Basah", desc: "Stempel surat di Sekretariat BEM." }
    ],
    ruangan: [
        { title: "Cek Jadwal", desc: "Lihat kalender ketersediaan ruangan." },
        { title: "Isi Form", desc: "Isi formulir peminjaman H-3 kegiatan." },
        { title: "Konfirmasi", desc: "Tunggu persetujuan Biro Rumah Tangga." },
        { title: "Pakai Ruangan", desc: "Ambil kunci dan jaga kebersihan." }
    ]
};
</script>

<template>
    <Head title="Kesekretariatan" />

    <MainLayout>
        <div class="min-h-screen bg-slate-50 pt-32 pb-24 relative">
            
            <div class="absolute inset-0 opacity-[0.03] pointer-events-none bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"></div>

            <div class="container mx-auto px-4 max-w-6xl relative z-10">

                <div class="text-center mb-10">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-blue-100 bg-white shadow-sm mb-4">
                        <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                        <span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Biro Administrasi</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4">
                        Kesekretariatan
                    </h1>
                    <p class="text-slate-500 text-lg max-w-2xl mx-auto">
                        Pusat pelayanan administrasi, surat-menyurat, dan inventaris BEM UNIKOM.
                    </p>
                </div>

                <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-sm border border-slate-200 p-5 flex flex-col md:flex-row items-center justify-between gap-6 mb-12">
                    <div class="flex items-center gap-4 w-full md:w-auto">
                        <div class="relative shrink-0">
                            <div class="w-12 h-12 rounded-full flex items-center justify-center text-2xl bg-slate-50 border border-slate-100">
                                🏠
                            </div>
                            <div class="absolute bottom-0 right-0 w-4 h-4 rounded-full border-2 border-white" :class="secretariatStatus.isOpen ? 'bg-green-500' : 'bg-red-500'"></div>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm uppercase tracking-wide">Status Sekretariat</h4>
                            <p class="text-xs font-bold" :class="secretariatStatus.isOpen ? 'text-green-600' : 'text-red-500'">
                                {{ secretariatStatus.isOpen ? 'BUKA SEKARANG' : 'TUTUP' }}
                            </p>
                        </div>
                    </div>
                    
                    <div class="hidden md:block w-px h-10 bg-slate-200"></div>

                    <div class="flex items-center gap-3 w-full md:w-auto">
                        <div class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400 uppercase font-bold">Jam Layanan</p>
                            <p class="text-sm font-bold text-slate-700">{{ secretariatStatus.hours }}</p>
                        </div>
                    </div>

                    <div class="hidden md:block w-px h-10 bg-slate-200"></div>

                    <div class="flex items-center gap-3 w-full md:w-auto">
                        <div class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400 uppercase font-bold">Lokasi</p>
                            <p class="text-sm font-bold text-slate-700">{{ secretariatStatus.location }}</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
                    <div 
                        v-for="(svc, idx) in services" 
                        :key="idx"
                        class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-lg hover:shadow-xl transition-all duration-300 group flex flex-col items-start"
                    >
                        <div 
                            class="w-12 h-12 rounded-2xl flex items-center justify-center text-2xl mb-4 shadow-inner transition-transform group-hover:scale-110"
                            :class="`bg-${svc.color}-50 text-${svc.color}-600`"
                        >
                            {{ svc.icon }}
                        </div>
                        <h3 class="text-lg font-bold text-slate-800 mb-1">{{ svc.title }}</h3>
                        <p class="text-slate-500 text-sm leading-relaxed mb-6 flex-grow">{{ svc.desc }}</p>
                        
                        <a 
                            :href="svc.link" 
                            class="w-full py-2.5 rounded-xl font-bold text-xs text-center transition-colors flex items-center justify-center gap-2"
                            :class="`bg-${svc.color}-50 text-${svc.color}-600 hover:bg-${svc.color}-600 hover:text-white`"
                        >
                            {{ svc.action }}
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    
                    <div class="lg:col-span-7">
                        <div class="bg-white rounded-[2rem] border border-slate-200 shadow-sm p-8 h-full relative overflow-hidden">
                            
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-10 relative z-10">
                                <h3 class="text-xl font-bold text-slate-800">Alur Administrasi</h3>
                                <div class="flex bg-slate-100 p-1 rounded-xl w-fit">
                                    <button 
                                        @click="activeSopTab = 'surat'"
                                        class="px-4 py-1.5 rounded-lg text-xs font-bold transition-all"
                                        :class="activeSopTab === 'surat' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-500 hover:text-slate-700'"
                                    >
                                        Surat
                                    </button>
                                    <button 
                                        @click="activeSopTab = 'ruangan'"
                                        class="px-4 py-1.5 rounded-lg text-xs font-bold transition-all"
                                        :class="activeSopTab === 'ruangan' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-500 hover:text-slate-700'"
                                    >
                                        Ruangan
                                    </button>
                                </div>
                            </div>

                            <div class="relative pl-2">
                                <div class="absolute left-[19px] top-2 bottom-4 w-0.5 bg-slate-100"></div>

                                <TransitionGroup name="fade" tag="div" class="space-y-8 relative z-10">
                                    <div 
                                        v-for="(step, idx) in sops[activeSopTab]" 
                                        :key="idx" 
                                        class="relative flex items-start gap-6 group"
                                    >
                                        <div class="w-10 h-10 rounded-full bg-white border-2 border-slate-100 text-slate-400 flex items-center justify-center text-sm font-bold z-10 shadow-sm group-hover:border-blue-500 group-hover:text-blue-600 transition-colors shrink-0">
                                            {{ idx + 1 }}
                                        </div>
                                        
                                        <div class="pt-2">
                                            <h4 class="text-base font-bold text-slate-800 group-hover:text-blue-600 transition-colors">
                                                {{ step.title }}
                                            </h4>
                                            <p class="text-sm text-slate-500 mt-1 leading-relaxed">{{ step.desc }}</p>
                                        </div>
                                    </div>
                                </TransitionGroup>
                            </div>

                        </div>
                    </div>

                    <div class="lg:col-span-5">
                        <div class="bg-slate-900 rounded-[2rem] p-8 text-white relative overflow-hidden shadow-xl">
                            <div class="absolute -top-10 -right-10 w-48 h-48 bg-blue-600 rounded-full blur-[80px] opacity-40 pointer-events-none"></div>
                            
                            <h3 class="text-xl font-bold mb-2 relative z-10">Bank Data</h3>
                            <p class="text-slate-400 text-sm mb-8 relative z-10">Unduh template dokumen resmi.</p>

                            <div class="space-y-4 relative z-10">
                                <div 
                                    v-for="(file, idx) in templates" 
                                    :key="idx"
                                    class="bg-white/5 backdrop-blur-sm p-4 rounded-2xl hover:bg-white/10 transition-colors flex items-center gap-4 group border border-white/5"
                                >
                                    <div 
                                        class="w-12 h-12 rounded-xl flex items-center justify-center shrink-0"
                                        :class="file.type === 'doc' ? 'bg-blue-500/20 text-blue-300' : 'bg-purple-500/20 text-purple-300'"
                                    >
                                        <svg v-if="file.type === 'doc'" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        <svg v-else class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>

                                    <div class="flex-grow min-w-0">
                                        <p class="text-sm font-bold text-slate-100 truncate group-hover:text-white" :title="file.name">
                                            {{ file.name }}
                                        </p>
                                        <p class="text-xs text-slate-400 mt-0.5">{{ file.size }}</p>
                                    </div>

                                    <button class="text-slate-500 group-hover:text-white transition-colors p-2 hover:bg-white/10 rounded-lg">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    </button>
                                </div>
                            </div>

                            <button class="w-full mt-8 py-3.5 rounded-xl border border-white/10 text-sm font-bold hover:bg-white hover:text-slate-900 transition-all bg-white/5">
                                Lihat Semua Arsip
                            </button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </MainLayout>
</template>

<style scoped>
/* Simple Fade for Tabs Content */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>