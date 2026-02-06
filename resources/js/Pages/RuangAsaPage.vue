<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { ref } from "vue";


const form = useForm({
    judul: "",
    kategori: "",
    jenis: "Saran", 
    tujuan: "",
    skala: "",
    urgensi: "Sedang",
    lokasi: "",
    isi: "",
    bukti: null,
    bersedia_dihubungi: false,
});


const kategoriOptions = [
    "Akademik",
    "Fasilitas Kampus",
    "Keuangan / UKT",
    "Organisasi",
    "Pelayanan Kampus",
    "Sosial",
    "Lainnya",
];

const jenisOptions = ["Pengaduan", "Saran", "Kritik", "Permintaan Informasi"];

const tujuanOptions = [
    "Fakultas",
    "Rektorat",
    "Biro Akademik",
    "Sarana & Prasarana",
    "Ormawa",
    "BEM UNIKOM",
];

const skalaOptions = [
    "Pribadi",
    "Kelas",
    "Program Studi",
    "Fakultas",
    "Kampus",
];

const urgensiOptions = [
    { label: "Rendah", color: "bg-green-100 text-green-700 border-green-200 hover:bg-green-200" },
    { label: "Sedang", color: "bg-yellow-100 text-yellow-700 border-yellow-200 hover:bg-yellow-200" },
    { label: "Tinggi", color: "bg-red-100 text-red-700 border-red-200 hover:bg-red-200" },
];

// --- Handlers ---
const handleFileChange = (e) => {
    form.bukti = e.target.files[0];
};

const submit = () => {
    // Simulasi submit (Ganti route 'aspirasi.store' sesuai route backend Laravel Anda)
    // form.post(route('aspirasi.store'), {
    //     onSuccess: () => form.reset(),
    // });
    alert("Formulir berhasil dikirim! (Ini hanya simulasi frontend)");
    console.log(form.data());
};
</script>

<template>
    <Head title="Ruang Asa - Aspirasi Mahasiswa" />

    <MainLayout>
        <section
            class="relative min-h-screen pt-32 pb-20 flex flex-col items-center justify-center overflow-hidden bg-slate-50 selection:bg-blue-600 selection:text-white"
        >
            <div class="absolute inset-0 opacity-[0.03] pointer-events-none bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"></div>
            <div class="absolute top-0 left-0 w-full h-full bg-[linear-gradient(to_right,#8080800a_1px,transparent_1px),linear-gradient(to_bottom,#8080800a_1px,transparent_1px)] bg-[size:24px_24px] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)]"></div>
            <div class="absolute top-20 left-10 w-72 h-72 bg-blue-400/20 rounded-full blur-[100px] -z-10 animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-80 h-80 bg-indigo-500/10 rounded-full blur-[100px] -z-10"></div>

            <div class="container mx-auto px-4 relative z-10 max-w-4xl">
                
                <div class="text-center mb-10">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 border border-blue-100 text-blue-600 text-xs font-bold uppercase tracking-wider mb-4">
                        <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                        Voice of Students
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4 tracking-tight">
                        Ruang <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">Aspirasi Mahasiswa</span>
                    </h1>
                    <p class="text-lg text-slate-500 max-w-2xl mx-auto">
                        Sampaikan aspirasi, kritik, atau pengaduan Anda untuk kemajuan UNIKOM. Suara Anda adalah langkah awal perubahan.
                    </p>
                </div>

                <div class="bg-white rounded-[2rem] shadow-xl border border-slate-100 overflow-hidden relative">
                    <div class="h-2 w-full bg-gradient-to-r from-blue-500 via-indigo-500 to-blue-600"></div>

                    <form @submit.prevent="submit" class="p-8 md:p-10 space-y-8">
                        
                        <div class="space-y-6">
                            <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100 pb-2 mb-4">Informasi Utama</h3>
                            
                            <div>
                                <label for="judul" class="block text-sm font-semibold text-slate-700 mb-2">Judul Aspirasi <span class="text-red-500">*</span></label>
                                <input 
                                    v-model="form.judul"
                                    type="text" 
                                    id="judul" 
                                    placeholder="Contoh: Perbaikan AC di Ruang Kelas 4014" 
                                    class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none placeholder:text-slate-400 font-medium"
                                    required
                                >
                            </div>

                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="kategori" class="block text-sm font-semibold text-slate-700 mb-2">Kategori Aspirasi <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <select 
                                            v-model="form.kategori"
                                            id="kategori" 
                                            class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none appearance-none font-medium text-slate-700 cursor-pointer"
                                            required
                                        >
                                            <option value="" disabled selected>Pilih Kategori</option>
                                            <option v-for="opt in kategoriOptions" :key="opt" :value="opt">{{ opt }}</option>
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-slate-500">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Jenis Aspirasi <span class="text-red-500">*</span></label>
                                    <div class="flex flex-wrap gap-3">
                                        <label 
                                            v-for="jenis in jenisOptions" 
                                            :key="jenis"
                                            class="cursor-pointer group"
                                        >
                                            <input type="radio" v-model="form.jenis" :value="jenis" class="peer sr-only">
                                            <span class="px-4 py-2.5 rounded-lg bg-slate-50 border border-slate-200 text-sm font-medium text-slate-600 peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600 peer-checked:shadow-md transition-all group-hover:border-blue-300 block">
                                                {{ jenis }}
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100 pb-2 mb-4">Detail & Target</h3>
                            
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="tujuan" class="block text-sm font-semibold text-slate-700 mb-2">Unit Tujuan <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <select 
                                            v-model="form.tujuan"
                                            id="tujuan" 
                                            class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none appearance-none font-medium text-slate-700 cursor-pointer"
                                            required
                                        >
                                            <option value="" disabled selected>Pilih Unit Terkait</option>
                                            <option v-for="opt in tujuanOptions" :key="opt" :value="opt">{{ opt }}</option>
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-slate-500">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label for="skala" class="block text-sm font-semibold text-slate-700 mb-2">Skala Dampak <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <select 
                                            v-model="form.skala"
                                            id="skala" 
                                            class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none appearance-none font-medium text-slate-700 cursor-pointer"
                                            required
                                        >
                                            <option value="" disabled selected>Pilih Skala</option>
                                            <option v-for="opt in skalaOptions" :key="opt" :value="opt">{{ opt }}</option>
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-slate-500">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-6 items-start">
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Tingkat Urgensi <span class="text-red-500">*</span></label>
                                    <div class="flex gap-3">
                                        <label 
                                            v-for="urgency in urgensiOptions" 
                                            :key="urgency.label"
                                            class="cursor-pointer flex-1"
                                        >
                                            <input type="radio" v-model="form.urgensi" :value="urgency.label" class="peer sr-only">
                                            <div 
                                                class="text-center px-3 py-2.5 rounded-xl border-2 text-sm font-bold transition-all opacity-60 hover:opacity-100 peer-checked:opacity-100 peer-checked:shadow-md peer-checked:scale-105"
                                                :class="urgency.color"
                                            >
                                                {{ urgency.label }}
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div>
                                    <label for="lokasi" class="block text-sm font-semibold text-slate-700 mb-2">Lokasi / Detail Unit (Opsional)</label>
                                    <input 
                                        v-model="form.lokasi"
                                        type="text" 
                                        id="lokasi" 
                                        placeholder="Cth: Gedung 4 Lantai 2" 
                                        class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none placeholder:text-slate-400 font-medium"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100 pb-2 mb-4">Isi Aspirasi</h3>

                            <div>
                                <label for="isi" class="block text-sm font-semibold text-slate-700 mb-2">Isi Aspirasi <span class="text-red-500">*</span></label>
                                <textarea 
                                    v-model="form.isi"
                                    id="isi" 
                                    rows="5" 
                                    placeholder="Jelaskan aspirasi, kronologi, atau saran Anda secara detail..." 
                                    class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none placeholder:text-slate-400 font-medium resize-none"
                                    required
                                ></textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Bukti Pendukung (Opsional)</label>
                                <div class="relative border-2 border-dashed border-slate-300 rounded-xl bg-slate-50 hover:bg-slate-100 transition-colors group">
                                    <input 
                                        type="file" 
                                        @change="handleFileChange"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                    >
                                    <div class="flex flex-col items-center justify-center py-6 px-4 text-center">
                                        <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                        </div>
                                        <p class="text-sm font-medium text-slate-700">
                                            <span v-if="form.bukti">{{ form.bukti.name }}</span>
                                            <span v-else>Klik atau seret file ke sini</span>
                                        </p>
                                        <p class="text-xs text-slate-400 mt-1" v-if="!form.bukti">JPG, PNG, PDF (Max. 5MB)</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-3 p-4 rounded-xl bg-blue-50/50 border border-blue-100">
                                <div class="flex items-center h-5">
                                    <input 
                                        v-model="form.bersedia_dihubungi"
                                        id="consent" 
                                        type="checkbox" 
                                        class="w-5 h-5 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 focus:ring-2 cursor-pointer"
                                    >
                                </div>
                                <label for="consent" class="text-sm font-medium text-slate-600 cursor-pointer select-none">
                                    Saya bersedia dihubungi oleh pihak BEM UNIKOM apabila diperlukan klarifikasi lebih lanjut mengenai aspirasi ini.
                                </label>
                            </div>
                        </div>

                        <div class="pt-4">
                            <button 
                                type="submit" 
                                :disabled="form.processing"
                                class="w-full flex items-center justify-center gap-2 px-8 py-4 text-base font-bold text-white transition-all duration-300 
                                bg-gradient-to-r from-blue-600 to-indigo-600 
                                hover:from-blue-700 hover:to-indigo-700 
                                hover:shadow-lg hover:shadow-blue-500/30 
                                rounded-xl active:scale-[0.98] disabled:opacity-70 disabled:cursor-not-allowed"
                            >
                                <svg v-if="!form.processing" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                <svg v-else class="animate-spin -ml-1 mr-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                {{ form.processing ? 'Mengirim...' : 'Kirim Aspirasi' }}
                            </button>
                            
                            <p class="text-center text-xs text-slate-400 mt-4">
                                * Aspirasi yang masuk akan diverifikasi dan diproses sesuai kewenangan BEM UNIKOM. Kerahasiaan identitas pelapor terjaga.
                            </p>
                        </div>

                    </form>
                </div>

            </div>
        </section>
    </MainLayout>
</template>