<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

// Mock Data Program Kerja
const programs = [
    {
        id: 1,
        title: "UNIKOM Leadership Camp 2024",
        date: "15 - 17 Maret 2024",
        category: "Kaderisasi",
        status: "Terlaksana",
        excerpt: "Pelatihan kepemimpinan tingkat dasar untuk mencetak kader mahasiswa yang berintegritas dan visioner.",
        image: "https://images.unsplash.com/photo-1517048676732-d65bc937f952?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
    },
    {
        id: 2,
        title: "Festival Budaya Nusantara",
        date: "20 Mei 2024",
        category: "Seni & Budaya",
        status: "Akan Datang",
        excerpt: "Pagelaran seni tari, musik, dan pameran budaya dari berbagai daerah di Indonesia yang dibawakan oleh mahasiswa.",
        image: "https://images.unsplash.com/photo-1514525253440-b393452e8d26?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
    },
    {
        id: 3,
        title: "Seminar Nasional Teknologi 5.0",
        date: "10 Juli 2024",
        category: "Akademik",
        status: "Akan Datang",
        excerpt: "Menghadirkan pembicara ahli untuk membedah tantangan dan peluang di era Society 5.0.",
        image: "https://images.unsplash.com/photo-1544531586-fde5298cdd40?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
    },
    {
        id: 4,
        title: "BEM Mengabdi: Desa Binaan",
        date: "Agustus 2024",
        category: "Sosial Masyarakat",
        status: "Direncanakan",
        excerpt: "Program pengabdian masyarakat terintegrasi di Desa Ciburial, fokus pada edukasi dan sanitasi.",
        image: "https://images.unsplash.com/photo-1593113598332-cd288d649433?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
    }
];

// Helper untuk status badge color
const getStatusColor = (status) => {
    if (status === 'Terlaksana') return 'bg-green-100 text-green-700 border-green-200';
    if (status === 'Akan Datang') return 'bg-blue-100 text-blue-700 border-blue-200';
    return 'bg-slate-100 text-slate-600 border-slate-200';
};
</script>

<template>
    <Head title="Program Kerja" />

    <MainLayout>
        <div class="relative min-h-screen bg-slate-50 overflow-hidden pb-32">
            
            <div class="absolute inset-0 opacity-[0.03] pointer-events-none bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"></div>
            <div class="absolute top-0 left-0 w-full h-full bg-[linear-gradient(to_right,#8080800a_1px,transparent_1px),linear-gradient(to_bottom,#8080800a_1px,transparent_1px)] bg-[size:24px_24px]"></div>

            <div class="relative pt-32 pb-16 text-center z-10 px-4">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-blue-100 bg-white/50 backdrop-blur shadow-sm mb-4">
                    <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                    <span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Agenda & Aksi Nyata</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4">Program Kerja</h1>
                <p class="text-slate-500 text-lg max-w-2xl mx-auto">
                    Rangkaian kegiatan strategis BEM UNIKOM dalam mewujudkan visi Merajut Asa selama satu periode kepengurusan.
                </p>
            </div>

            <div class="container mx-auto px-4 relative z-10 max-w-6xl">
                
                <div class="absolute left-8 md:left-1/2 top-0 bottom-0 w-px bg-slate-300 md:-translate-x-1/2 h-full z-0"></div>

                <div class="space-y-12 md:space-y-24 relative">
                    
                    <div 
                        v-for="(program, index) in programs" 
                        :key="program.id"
                        class="relative flex flex-col md:flex-row items-center w-full"
                        :class="index % 2 === 0 ? 'md:flex-row-reverse' : ''"
                    >
                        
                        <div class="hidden md:block w-1/2"></div>

                        <div class="absolute left-8 md:left-1/2 w-8 h-8 rounded-full bg-white border-4 border-blue-600 z-10 -translate-x-1/2 shadow-lg flex items-center justify-center">
                            <div class="w-2.5 h-2.5 rounded-full bg-blue-600"></div>
                        </div>

                        <div class="w-full md:w-1/2 pl-16 md:pl-0" :class="index % 2 === 0 ? 'md:pr-12 text-left' : 'md:pl-12 text-left'">
                            
                            <div class="group bg-white rounded-2xl p-4 shadow-lg border border-slate-100 hover:shadow-2xl transition-all duration-300 relative overflow-hidden">
                                
                                <div class="absolute top-0 left-0 w-1 h-full bg-blue-600 opacity-0 group-hover:opacity-100 transition-opacity"></div>

                                <div class="h-48 w-full rounded-xl overflow-hidden mb-4 relative">
                                    <img :src="program.image" :alt="program.title" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                    <div class="absolute top-3 right-3 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider border bg-white/90 backdrop-blur-sm" :class="getStatusColor(program.status)">
                                        {{ program.status }}
                                    </div>
                                </div>

                                <div class="flex items-center gap-3 mb-2 text-xs font-bold text-slate-400 uppercase tracking-wider">
                                    <span class="text-blue-600">{{ program.category }}</span>
                                    <span>•</span>
                                    <span>{{ program.date }}</span>
                                </div>

                                <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-blue-700 transition-colors line-clamp-2">
                                    {{ program.title }}
                                </h3>
                                
                                <p class="text-slate-500 text-sm mb-4 line-clamp-3 leading-relaxed">
                                    {{ program.excerpt }}
                                </p>

                                <Link 
                                    :href="`/program-kerja/${program.id}`" 
                                    class="inline-flex items-center text-sm font-bold text-blue-600 hover:text-blue-800 transition-colors group/btn"
                                >
                                    Lihat Detail
                                    <svg class="w-4 h-4 ml-1 transform group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </Link>

                            </div>
                        </div>

                    </div>

                </div>

                <div class="relative mt-12 flex justify-start md:justify-center pl-8 md:pl-0">
                    <div class="w-3 h-3 bg-slate-300 rounded-full md:-translate-x-1/2 -translate-x-1/2"></div>
                </div>

            </div>
        </div>
    </MainLayout>
</template>