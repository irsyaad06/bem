<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

// Props ini nantinya diisi data asli dari Controller Laravel
// defineProps({ program: Object });

// Mock Data untuk preview tampilan
const program = {
    title: "UNIKOM Leadership Camp 2024",
    category: "Kaderisasi",
    date: "15 - 17 Maret 2024",
    status: "Terlaksana",
    location: "Wisma Buana, Lembang",
    target: "Mahasiswa Baru Angkatan 2023",
    description: `
        <p>UNIKOM Leadership Camp adalah program unggulan dari Kementerian Dalam Negeri BEM UNIKOM yang bertujuan untuk mencetak pemimpin-pemimpin muda yang berkarakter, inovatif, dan adaptif terhadap perubahan zaman.</p>
        <p>Kegiatan ini dilaksanakan selama tiga hari dua malam dengan materi yang mencakup Manajemen Organisasi, Public Speaking, Critical Thinking, dan Problem Solving. Selain materi ruangan, peserta juga diajak untuk melakukan simulasi aksi dan outbound untuk melatih kekompakan tim.</p>
        <p>Diharapkan pasca kegiatan ini, para peserta dapat berkontribusi aktif dalam organisasi kemahasiswaan di lingkungan UNIKOM maupun masyarakat luas.</p>
    `,
    image: "https://images.unsplash.com/photo-1517048676732-d65bc937f952?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80",
    gallery: [
        "https://images.unsplash.com/photo-1523580494863-6f3031224c94?auto=format&fit=crop&w=400&q=80",
        "https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=400&q=80",
        "https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=400&q=80"
    ]
};
</script>

<template>
    <Head :title="program.title" />

    <MainLayout>
        <div class="min-h-screen bg-slate-50 pt-40 pb-15">
            
            <div class="container mx-auto px-4 max-w-5xl mb-8">
                <div class="flex items-center gap-2 text-sm text-slate-500">
                    <Link href="/program-kerja" class="hover:text-blue-600 transition-colors">Program Kerja</Link>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="text-slate-800 font-semibold truncate max-w-50">{{ program.title }}</span>
                </div>

                <div></div>
            </div>

            <div class="container mx-auto px-4 max-w-5xl">
                
                <div class="bg-white rounded-[2rem] shadow-xl overflow-hidden border border-slate-100 mb-8">
                    <div class="h-64 md:h-96 w-full relative">
                        <img :src="program.image" :alt="program.title" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent"></div>
                        
                        <div class="absolute bottom-0 left-0 p-6 md:p-10 w-full">
                            <div class="flex flex-wrap gap-3 mb-4">
                                <span class="px-3 py-1 rounded-full bg-blue-600 text-white text-xs font-bold uppercase tracking-wider shadow-sm">
                                    {{ program.category }}
                                </span>
                                <span class="px-3 py-1 rounded-full bg-white/20 backdrop-blur-md text-white border border-white/30 text-xs font-bold uppercase tracking-wider">
                                    {{ program.status }}
                                </span>
                            </div>
                            <h1 class="text-3xl md:text-5xl font-bold text-white leading-tight mb-2 drop-shadow-md">
                                {{ program.title }}
                            </h1>
                            <div class="flex items-center text-slate-300 text-sm md:text-base gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ program.date }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid lg:grid-cols-3 gap-8">
                    
                    <div class="lg:col-span-2 space-y-8">
                        <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
                            <h2 class="text-xl font-bold text-slate-800 mb-6 border-l-4 border-blue-600 pl-4">Deskripsi Kegiatan</h2>
                            
                            <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed" v-html="program.description"></div>
                        </div>

                        <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
                            <h2 class="text-xl font-bold text-slate-800 mb-6 border-l-4 border-blue-600 pl-4">Dokumentasi</h2>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                <div v-for="(img, idx) in program.gallery" :key="idx" class="aspect-square rounded-xl overflow-hidden hover:opacity-90 cursor-pointer transition-opacity">
                                    <img :src="img" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-white p-6 rounded-2xl shadow-lg border border-slate-100 sticky top-28">
                            <h3 class="text-lg font-bold text-slate-800 mb-4 pb-4 border-b border-slate-100">Informasi Detail</h3>
                            
                            <ul class="space-y-4">
                                <li>
                                    <div class="text-xs font-bold text-slate-400 uppercase mb-1">Lokasi</div>
                                    <div class="flex items-start gap-2 text-slate-700 font-medium">
                                        <svg class="w-5 h-5 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        {{ program.location }}
                                    </div>
                                </li>
                                <li>
                                    <div class="text-xs font-bold text-slate-400 uppercase mb-1">Target Peserta</div>
                                    <div class="flex items-start gap-2 text-slate-700 font-medium">
                                        <svg class="w-5 h-5 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                        {{ program.target }}
                                    </div>
                                </li>
                            </ul>

                            <div class="mt-8 pt-6 border-t border-slate-100">
                                <button class="w-full py-3 bg-slate-900 text-white font-bold rounded-xl hover:bg-blue-700 transition-colors shadow-lg shadow-blue-900/20">
                                    Daftar Sekarang
                                </button>
                                <p class="text-center text-xs text-slate-400 mt-2">*Hanya jika pendaftaran dibuka</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </MainLayout>
</template>
