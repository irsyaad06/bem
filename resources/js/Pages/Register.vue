<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import AuthBanner from '@/Components/AuthBanner.vue'; // Import Komponen Banner

// --- MOCK DATA ---
const ministries = [
    { id: 1, name: 'Kementerian Sekretariat Negara' },
    { id: 2, name: 'Kementerian Keuangan' },
    { id: 3, name: 'Kementerian Dalam Negeri' },
    { id: 4, name: 'Kementerian Luar Negeri' },
    { id: 5, name: 'Kementerian Komunikasi & Informasi' },
    { id: 6, name: 'Kementerian Ekonomi Kreatif' },
    { id: 7, name: 'Kementerian Pendidikan' },
    { id: 8, name: 'Kementerian Sosial' },
    { id: 9, name: 'Kementerian Pemuda & Olahraga' },
    { id: 99, name: 'Non-Kementerian (BPH Inti)' },
];

// --- STATE LOKAL (UI ONLY) ---
const form = ref({
    name: '',
    email: '',
    ministry_id: '',
    position: '',
    password: '',
    password_confirmation: '',
});

const isLoading = ref(false);

// --- DUMMY SUBMIT FUNCTION ---
const submit = () => {
    isLoading.value = true;
    
    // Simulasi loading 1.5 detik
    setTimeout(() => {
        isLoading.value = false;
        alert("Simulasi Registrasi Berhasil!\n\nData yang dikirim:\n" + JSON.stringify(form.value, null, 2));
    }, 1500);
};
</script>

<template>
    <Head title="Daftar Akun Staff" />

    <div class="min-h-screen flex bg-white font-sans">
        
        <AuthBanner />

        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 md:p-12 bg-slate-50 lg:bg-white relative">
             
             <div class="lg:hidden absolute inset-0 opacity-[0.03] pointer-events-none bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"></div>

            <div class="max-w-md w-full relative z-10">
                
                <div class="lg:hidden text-center mb-10">
                    <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 text-3xl shadow-lg shadow-blue-600/20">
                        🦅
                    </div>
                    <h2 class="text-2xl font-bold text-slate-900">Registrasi Staff</h2>
                </div>

                <div class="hidden lg:block mb-10">
                    <h2 class="text-3xl font-bold text-slate-900">Buat Akun Baru</h2>
                    <p class="text-slate-500 mt-2">Silakan lengkapi data diri untuk mengajukan akses.</p>
                </div>

                <form @submit.prevent="submit" class="space-y-5">
                    
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Nama Lengkap</label>
                        <input 
                            v-model="form.name"
                            type="text" 
                            required 
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all font-semibold text-slate-700 placeholder:text-slate-300"
                            placeholder="Contoh: Muhammad Rizky"
                        >
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Email Universitas</label>
                        <input 
                            v-model="form.email"
                            type="email" 
                            required 
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all font-semibold text-slate-700 placeholder:text-slate-300"
                            placeholder="nama@email.unikom.ac.id"
                        >
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Unit Kerja</label>
                            <div class="relative">
                                <select 
                                    v-model="form.ministry_id"
                                    required
                                    class="w-full pl-4 pr-10 py-3 rounded-xl border border-slate-200 bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all font-semibold text-slate-700 appearance-none cursor-pointer text-sm truncate"
                                    :class="{'text-slate-300': !form.ministry_id}"
                                >
                                    <option value="" disabled selected>Pilih Unit</option>
                                    <option v-for="m in ministries" :key="m.id" :value="m.id">{{ m.name }}</option>
                                </select>
                                <svg class="w-4 h-4 text-slate-400 absolute right-3 top-3.5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Jabatan</label>
                            <input 
                                v-model="form.position"
                                type="text" 
                                required 
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all font-semibold text-slate-700 placeholder:text-slate-300"
                                placeholder="Cth: Staff Ahli"
                            >
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Password</label>
                        <input 
                            v-model="form.password"
                            type="password" 
                            required 
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all font-semibold text-slate-700 placeholder:text-slate-300"
                            placeholder="••••••••"
                        >
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Konfirmasi Password</label>
                        <input 
                            v-model="form.password_confirmation"
                            type="password" 
                            required 
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all font-semibold text-slate-700 placeholder:text-slate-300"
                            placeholder="••••••••"
                        >
                    </div>

                    <button 
                        :disabled="isLoading"
                        type="submit" 
                        class="w-full py-4 bg-slate-900 hover:bg-blue-600 text-white font-bold rounded-xl shadow-xl shadow-slate-900/20 hover:shadow-blue-600/30 transition-all transform active:scale-[0.98] flex items-center justify-center gap-3 disabled:opacity-70 disabled:cursor-not-allowed mt-4"
                    >
                        <svg v-if="isLoading" class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                        <span v-else>Daftar Sekarang</span>
                        <svg v-if="!isLoading" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>

                    <p class="text-center text-sm text-slate-500 mt-6">
                        Sudah punya akun? 
                        <Link href="/login" class="font-bold text-blue-600 hover:text-blue-700 hover:underline">
                            Login disini
                        </Link>
                    </p>

                </form>
            </div>

        </div>
    </div>
</template>