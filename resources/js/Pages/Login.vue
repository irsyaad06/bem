<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import AuthBanner from '@/Components/AuthBanner.vue'; // Import Banner

// State Lokal
const form = ref({
    email: '',
    password: '',
    remember: false,
});

const isLoading = ref(false);

// Dummy Submit
const submit = () => {
    isLoading.value = true;
    setTimeout(() => {
        isLoading.value = false;
        alert("Login Berhasil!\n" + JSON.stringify(form.value, null, 2));
    }, 1500);
};
</script>

<template>
    <Head title="Masuk Akun" />

    <div class="min-h-screen flex bg-white font-sans">
        
        <AuthBanner />

        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 md:p-12 bg-slate-50 lg:bg-white relative">
             
             <div class="lg:hidden absolute inset-0 opacity-[0.03] pointer-events-none bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"></div>

            <div class="max-w-md w-full relative z-10">
                
                <div class="lg:hidden text-center mb-10">
                    <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 text-3xl shadow-lg shadow-blue-600/20">
                        🦅
                    </div>
                    <h2 class="text-2xl font-bold text-slate-900">Login Staff</h2>
                </div>

                <div class="hidden lg:block mb-10">
                    <h2 class="text-3xl font-bold text-slate-900">Selamat Datang Kembali</h2>
                    <p class="text-slate-500 mt-2">Silakan masuk untuk mengakses dashboard.</p>
                </div>

                <form @submit.prevent="submit" class="space-y-6">
                    
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

                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Password</label>
                            <a href="#" class="text-xs font-bold text-blue-600 hover:text-blue-700 hover:underline">Lupa Password?</a>
                        </div>
                        <input 
                            v-model="form.password"
                            type="password" 
                            required 
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all font-semibold text-slate-700 placeholder:text-slate-300"
                            placeholder="••••••••"
                        >
                    </div>

                    <div class="flex items-center">
                        <input 
                            v-model="form.remember"
                            id="remember" 
                            type="checkbox" 
                            class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 cursor-pointer"
                        >
                        <label for="remember" class="ml-2 block text-sm font-semibold text-slate-600 cursor-pointer select-none">
                            Ingat saya di perangkat ini
                        </label>
                    </div>

                    <button 
                        :disabled="isLoading"
                        type="submit" 
                        class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-xl shadow-blue-600/20 hover:shadow-blue-600/40 transition-all transform active:scale-[0.98] flex items-center justify-center gap-3 disabled:opacity-70 disabled:cursor-not-allowed"
                    >
                        <svg v-if="isLoading" class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                        <span v-else>Masuk Dashboard</span>
                        <svg v-if="!isLoading" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                    </button>

                    <p class="text-center text-sm text-slate-500 mt-8">
                        Belum terdaftar sebagai pengurus? 
                        <Link href="/register" class="font-bold text-slate-900 hover:text-blue-600 hover:underline transition-colors">
                            Daftar Staff Baru
                        </Link>
                    </p>

                </form>
            </div>

        </div>
    </div>
</template>