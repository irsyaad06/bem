<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";

// --- STATE MANAGEMENT ---
const activeTab = ref("general"); // 'general', 'academic', 'social', 'security'
const isLoading = ref(false);

// --- MOCK DATA (Data awal user) ---
const form = ref({
    // General
    name: "Muhammad Rizky",
    nickname: "Iky",
    quote: "Kreativitas adalah kecerdasan yang bersenang-senang.",
    bio: "Mahasiswa Teknik Informatika yang gemar coding dan desain.",
    
    // Academic
    nim: "10115566",
    faculty: "Teknik & Ilmu Komputer",
    prodi: "Teknik Informatika",
    batch: "2021",
    ministry: "Kementerian Komunikasi & Informasi",
    position: "Menteri",

    // Socials
    email_public: "rizky.public@gmail.com",
    instagram: "rizky_design",
    tiktok: "rizky_creator",
    linkedin: "muhammad-rizky-123",

    // Security
    current_password: "",
    new_password: "",
    confirm_password: ""
});

// State untuk Preview Gambar
const photoPreview = ref("https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80");
const coverPreview = ref("https://images.unsplash.com/photo-1557683316-973673baf926?auto=format&fit=crop&w=1000&q=80");

// --- ACTIONS ---

// Handle File Upload Preview
const handleFileChange = (event, type) => {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            if (type === 'photo') photoPreview.value = e.target.result;
            if (type === 'cover') coverPreview.value = e.target.result;
        };
        reader.readAsDataURL(file);
    }
};

// Simulasi Simpan
const submit = () => {
    isLoading.value = true;
    setTimeout(() => {
        isLoading.value = false;
        alert("Perubahan berhasil disimpan! (Simulasi UI)");
    }, 1500);
};
</script>

<template>
    <Head title="Edit Profil" />

    <MainLayout>
        <div class="min-h-screen bg-slate-50 pt-28 pb-20">
            
            <div class="container mx-auto px-4 max-w-4xl">

                <div class="mb-8 flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-slate-900">Pengaturan Profil</h1>
                        <p class="text-slate-500 text-sm">Kelola informasi pribadi dan tampilan publik Anda.</p>
                    </div>
                    <Link href="/profile/1" class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-lg text-sm font-bold hover:bg-slate-50 transition-colors">
                        Lihat Profil Publik
                    </Link>
                </div>

                <form @submit.prevent="submit">
                    
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden mb-8 group">
                        <div class="h-48 relative bg-slate-200">
                            <img :src="coverPreview" class="w-full h-full object-cover">
                            
                            <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <label class="cursor-pointer px-4 py-2 bg-black/50 text-white rounded-lg backdrop-blur-sm hover:bg-black/70 transition-all flex items-center gap-2 text-sm font-bold">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    Ganti Sampul
                                    <input type="file" class="hidden" accept="image/*" @change="(e) => handleFileChange(e, 'cover')">
                                </label>
                            </div>
                        </div>

                        <div class="px-8 pb-8 relative flex flex-col md:flex-row items-end gap-6">
                            
                            <div class="relative -mt-16">
                                <div class="w-32 h-32 rounded-full border-4 border-white bg-slate-100 overflow-hidden relative group/avatar">
                                    <img :src="photoPreview" class="w-full h-full object-cover">
                                    
                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover/avatar:opacity-100 transition-opacity flex items-center justify-center cursor-pointer">
                                        <label class="cursor-pointer text-white">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                            <input type="file" class="hidden" accept="image/*" @change="(e) => handleFileChange(e, 'photo')">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2">
                                <h2 class="text-2xl font-bold text-slate-900">{{ form.name }}</h2>
                                <p class="text-slate-500 font-medium">{{ form.position }} • {{ form.ministry }}</p>
                            </div>

                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                        
                        <div class="lg:col-span-1">
                            <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden sticky top-28">
                                <div class="flex flex-col">
                                    <button type="button" @click="activeTab = 'general'" class="px-4 py-3 text-left text-sm font-bold border-l-4 hover:bg-slate-50 transition-colors" :class="activeTab === 'general' ? 'border-blue-600 text-blue-600 bg-blue-50' : 'border-transparent text-slate-500'">
                                        Profil Utama
                                    </button>
                                    <button type="button" @click="activeTab = 'academic'" class="px-4 py-3 text-left text-sm font-bold border-l-4 hover:bg-slate-50 transition-colors" :class="activeTab === 'academic' ? 'border-blue-600 text-blue-600 bg-blue-50' : 'border-transparent text-slate-500'">
                                        Data Akademik
                                    </button>
                                    <button type="button" @click="activeTab = 'social'" class="px-4 py-3 text-left text-sm font-bold border-l-4 hover:bg-slate-50 transition-colors" :class="activeTab === 'social' ? 'border-blue-600 text-blue-600 bg-blue-50' : 'border-transparent text-slate-500'">
                                        Sosial Media
                                    </button>
                                    <button type="button" @click="activeTab = 'security'" class="px-4 py-3 text-left text-sm font-bold border-l-4 hover:bg-slate-50 transition-colors" :class="activeTab === 'security' ? 'border-blue-600 text-blue-600 bg-blue-50' : 'border-transparent text-slate-500'">
                                        Keamanan
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="lg:col-span-3">
                            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 md:p-8">
                                
                                <div v-if="activeTab === 'general'" class="space-y-6">
                                    <div class="pb-4 border-b border-slate-100">
                                        <h3 class="text-lg font-bold text-slate-900">Informasi Umum</h3>
                                        <p class="text-sm text-slate-400">Informasi ini akan tampil di halaman publik.</p>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Nama Lengkap</label>
                                            <input v-model="form.name" type="text" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none text-slate-700 font-semibold text-sm">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Nama Panggilan</label>
                                            <input v-model="form.nickname" type="text" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none text-slate-700 font-semibold text-sm">
                                        </div>
                                        <div class="md:col-span-2">
                                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Bio Singkat</label>
                                            <textarea v-model="form.bio" rows="4" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none text-slate-700 font-medium text-sm resize-none"></textarea>
                                            <p class="text-right text-xs text-slate-400 mt-1">Maksimal 200 karakter.</p>
                                        </div>
                                        <div class="md:col-span-2">
                                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Kutipan Favorit (Quote)</label>
                                            <input v-model="form.quote" type="text" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none text-slate-700 font-medium text-sm italic">
                                        </div>
                                    </div>
                                </div>

                                <div v-if="activeTab === 'academic'" class="space-y-6">
                                    <div class="pb-4 border-b border-slate-100">
                                        <h3 class="text-lg font-bold text-slate-900">Data Akademik</h3>
                                        <p class="text-sm text-slate-400">Data ini digunakan untuk verifikasi anggota.</p>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Nomor Induk Mahasiswa</label>
                                            <input v-model="form.nim" type="text" disabled class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-400 font-semibold text-sm cursor-not-allowed">
                                            <p class="text-[10px] text-red-400 mt-1">*Hubungi admin jika NIM salah.</p>
                                        </div>
                                        <div>
                                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Angkatan</label>
                                            <input v-model="form.batch" type="text" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none text-slate-700 font-semibold text-sm">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Fakultas</label>
                                            <input v-model="form.faculty" type="text" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none text-slate-700 font-semibold text-sm">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Program Studi</label>
                                            <input v-model="form.prodi" type="text" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none text-slate-700 font-semibold text-sm">
                                        </div>
                                    </div>
                                </div>

                                <div v-if="activeTab === 'social'" class="space-y-6">
                                    <div class="pb-4 border-b border-slate-100">
                                        <h3 class="text-lg font-bold text-slate-900">Jejak Digital</h3>
                                        <p class="text-sm text-slate-400">Tautkan akun sosial media agar mudah dihubungi.</p>
                                    </div>

                                    <div class="space-y-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center text-slate-500">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                            </div>
                                            <input v-model="form.email_public" type="email" placeholder="Email Publik" class="flex-1 px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 outline-none text-sm font-semibold text-slate-700">
                                        </div>

                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-lg bg-pink-50 flex items-center justify-center text-pink-600">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                            </div>
                                            <div class="flex-1 relative">
                                                <span class="absolute left-4 top-3.5 text-slate-400 text-sm">@</span>
                                                <input v-model="form.instagram" type="text" placeholder="Username Instagram" class="w-full pl-8 pr-4 py-3 rounded-xl border border-slate-200 focus:border-pink-500 outline-none text-sm font-semibold text-slate-700">
                                            </div>
                                        </div>

                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-lg bg-slate-900 flex items-center justify-center text-white">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 1 0-1 13.6 6.84 6.84 0 0 0 6.9-6.9V8a8.16 8.16 0 0 0 3.65 1.31V6.69z"/></svg>
                                            </div>
                                            <div class="flex-1 relative">
                                                <span class="absolute left-4 top-3.5 text-slate-400 text-sm">@</span>
                                                <input v-model="form.tiktok" type="text" placeholder="Username TikTok" class="w-full pl-8 pr-4 py-3 rounded-xl border border-slate-200 focus:border-slate-900 outline-none text-sm font-semibold text-slate-700">
                                            </div>
                                        </div>

                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center text-blue-700">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                            </div>
                                            <div class="flex-1 relative">
                                                <span class="absolute left-4 top-3.5 text-slate-400 text-sm">in/</span>
                                                <input v-model="form.linkedin" type="text" placeholder="Username LinkedIn" class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 focus:border-blue-700 outline-none text-sm font-semibold text-slate-700">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div v-if="activeTab === 'security'" class="space-y-6">
                                    <div class="pb-4 border-b border-slate-100">
                                        <h3 class="text-lg font-bold text-slate-900">Keamanan Akun</h3>
                                        <p class="text-sm text-slate-400">Ganti password secara berkala untuk keamanan.</p>
                                    </div>

                                    <div class="space-y-4 max-w-md">
                                        <div>
                                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Password Saat Ini</label>
                                            <input v-model="form.current_password" type="password" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none text-slate-700 font-bold">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Password Baru</label>
                                            <input v-model="form.new_password" type="password" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none text-slate-700 font-bold">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Konfirmasi Password</label>
                                            <input v-model="form.confirm_password" type="password" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none text-slate-700 font-bold">
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-8 pt-6 border-t border-slate-100 flex justify-end gap-3">
                                    <button type="button" class="px-6 py-2.5 rounded-xl border border-slate-200 text-slate-600 text-sm font-bold hover:bg-slate-50">
                                        Batal
                                    </button>
                                    <button 
                                        type="submit" 
                                        :disabled="isLoading"
                                        class="px-8 py-2.5 rounded-xl bg-blue-600 text-white text-sm font-bold hover:bg-blue-700 shadow-lg shadow-blue-600/30 transition-all flex items-center gap-2"
                                    >
                                        <svg v-if="isLoading" class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                        {{ isLoading ? 'Menyimpan...' : 'Simpan Perubahan' }}
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </MainLayout>
</template>