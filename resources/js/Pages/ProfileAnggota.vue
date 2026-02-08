<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

// Props ID dari route (dikirim dari controller)
const props = defineProps({
    id: String
});

// MOCK DATA STAFF (Idealnya data ini diambil dari Database berdasarkan props.id)
// Data ini disesuaikan dengan struktur yang ada di DetailKementerian sebelumnya
const staff = {
    id: 1,
    name: "Muhammad Rizky",
    nickname: "Rizky",
    role: "Menteri Komunikasi & Informasi",
    ministry: "Kementerian Komunikasi & Informasi",
    ministryId: "kominfo", // ID untuk tombol kembali ke kementerian
    faculty: "Teknik Informatika",
    batch: "2021",
    email: "rizky.bem@unikom.ac.id",
    instagram: "rizky_design", 
    tiktok: "rizky_creator",
    linkedin: "muhammad-rizky",
    photo: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
    cover: "https://images.unsplash.com/photo-1557683316-973673baf926?auto=format&fit=crop&w=1000&q=80",
    quote: "Kreativitas adalah kecerdasan yang bersenang-senang. Jangan takut untuk memulai hal baru.",
    bio: `
        <p>Halo! Saya Rizky, mahasiswa Teknik Informatika angkatan 2021 yang memiliki ketertarikan mendalam pada dunia desain grafis dan komunikasi digital.</p>
        <p>Di BEM UNIKOM Kabinet Merajut Asa, saya dipercaya mengemban amanah sebagai Menteri Kominfo. Fokus utama saya adalah mentransformasi wajah digital BEM UNIKOM agar lebih interaktif, informatif, dan estetik.</p>
        <p>Saya percaya bahwa komunikasi yang baik adalah kunci dari organisasi yang sehat. Mari bersinergi!</p>
    `,
    contributions: [
        "Project Leader Website BEM UNIKOM 2024",
        "Koordinator Publikasi PKKMB 2023",
        "Rebranding Visual Identity Kabinet Merajut Asa"
    ]
};
</script>

<template>
    <Head :title="staff.name" />

    <MainLayout>
        <div class="min-h-screen bg-slate-50 pt-28 pb-20">
            
            <div class="absolute inset-0 opacity-[0.03] pointer-events-none bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"></div>
            <div class="absolute inset-0 bg-[linear-gradient(to_right,#8080800a_1px,transparent_1px),linear-gradient(to_bottom,#8080800a_1px,transparent_1px)] bg-[size:24px_24px]"></div>
            
            <div class="container mx-auto px-4 max-w-6xl relative z-10">

                <div class="mb-6">
                    <Link :href="`/kementerian/${staffministryId}`" class="inline-flex items-center text-sm font-bold text-slate-400 hover:text-blue-600 transition-colors group">
                        <svg class="w-4 h-4 mr-1 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        Kembali ke Kementerian
                    </Link>
                </div>

                <div class="bg-white rounded-[2.5rem] shadow-xl border border-slate-100 overflow-hidden mb-8 relative group">
                    <div class="h-48 md:h-64 relative overflow-hidden">
                        <img :src="staff.cover" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent"></div>
                    </div>

                    <div class="px-8 pb-8 md:px-12 md:pb-12 relative flex flex-col md:flex-row items-end gap-6 md:gap-10">
                        <div class="relative -mt-20 shrink-0">
                            <div class="w-40 h-40 md:w-48 md:h-48 rounded-[2rem] border-[6px] border-white bg-white shadow-2xl overflow-hidden">
                                <img :src="staff.photo" :alt="staff.name" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                            <div class="absolute bottom-2 right-2 bg-blue-500 text-white p-1.5 rounded-full border-4 border-white shadow-sm" title="Verified Staff">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                        </div>

                        <div class="flex-1 w-full text-center md:text-left mb-2">
                            <div class="inline-block px-3 py-1 rounded-lg bg-blue-50 text-blue-600 text-xs font-bold uppercase tracking-wider mb-2">
                                {{ staff.ministry }}
                            </div>
                            <h1 class="text-3xl md:text-4xl font-bold text-slate-900 mb-1">{{ staff.name }}</h1>
                            <p class="text-lg text-slate-500 font-medium">{{ staff.role }}</p>
                        </div>

                        <div class="w-full md:w-auto flex justify-center md:justify-end mb-2">
                            <a :href="`mailto:${staff.email}`" class="px-6 py-3 rounded-xl bg-slate-900 text-white font-bold hover:bg-blue-600 transition-colors shadow-lg active:scale-95 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                Email Saya
                            </a>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">

                    <div class="space-y-6 lg:sticky lg:top-28 z-10">
                        
                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200">
                            <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-6 border-b border-slate-100 pb-2">Informasi Akademik</h3>
                            
                            <ul class="space-y-5">
                                <li class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-500 shrink-0">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-slate-400 uppercase font-bold">Fakultas / Prodi</p>
                                        <p class="text-sm font-bold text-slate-800">{{ staff.faculty }}</p>
                                    </div>
                                </li>
                                <li class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-500 shrink-0">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-slate-400 uppercase font-bold">Angkatan</p>
                                        <p class="text-sm font-bold text-slate-800">{{ staff.batch }}</p>
                                    </div>
                                </li>
                                <li class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-500 shrink-0">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-slate-400 uppercase font-bold">Panggilan</p>
                                        <p class="text-sm font-bold text-slate-800">{{ staff.nickname }}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200">
                            <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-4">Sosial Media</h3>
                            <div class="grid grid-cols-3 gap-3">
                                
                                <a :href="`https://instagram.com/${staff.instagram}`" target="_blank" class="flex flex-col items-center justify-center py-3 rounded-xl bg-slate-50 text-slate-600 font-bold text-xs hover:bg-pink-600 hover:text-white transition-all gap-1 group">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                    </svg>
                                    Instagram
                                </a>

                                <a :href="`https://tiktok.com/@${staff.tiktok}`" target="_blank" class="flex flex-col items-center justify-center py-3 rounded-xl bg-slate-50 text-slate-600 font-bold text-xs hover:bg-black hover:text-white transition-all gap-1 group">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 1 0-1 13.6 6.84 6.84 0 0 0 6.9-6.9V8a8.16 8.16 0 0 0 3.65 1.31V6.69z"/>
                                    </svg>
                                    TikTok
                                </a>

                                <a :href="`https://linkedin.com/in/${staff.linkedin}`" target="_blank" class="flex flex-col items-center justify-center py-3 rounded-xl bg-slate-50 text-slate-600 font-bold text-xs hover:bg-[#0077b5] hover:text-white transition-all gap-1 group">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                    LinkedIn
                                </a>

                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-2 space-y-8">
                        
                        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-[2rem] p-8 md:p-10 text-white shadow-lg relative overflow-hidden">
                            <div class="absolute top-0 left-0 text-9xl leading-none opacity-10 font-serif font-bold">“</div>
                            <p class="relative z-10 text-xl md:text-2xl font-medium italic leading-relaxed text-center">
                                "{{ staff.quote }}"
                            </p>
                        </div>

                        <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-200">
                            <h2 class="text-xl font-bold text-slate-800 mb-6 flex items-center gap-3">
                                <span class="w-2 h-8 bg-blue-600 rounded-full"></span>
                                Tentang Saya
                            </h2>
                            <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed" v-html="staff.bio"></div>
                        </div>

                        <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-200">
                            <h2 class="text-xl font-bold text-slate-800 mb-6 flex items-center gap-3">
                                <span class="w-2 h-8 bg-emerald-500 rounded-full"></span>
                                Jejak Kontribusi
                            </h2>
                            
                            <div class="space-y-4">
                                <div v-for="(item, index) in staff.contributions" :key="index" class="flex items-start gap-4 p-4 rounded-xl bg-slate-50 border border-slate-100 hover:border-blue-200 transition-colors">
                                    <div class="w-8 h-8 rounded-full bg-white border border-slate-200 flex items-center justify-center text-blue-600 font-bold text-sm shadow-sm shrink-0">
                                        {{ index + 1 }}
                                    </div>
                                    <p class="text-slate-700 font-medium pt-1">{{ item }}</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </MainLayout>
</template>