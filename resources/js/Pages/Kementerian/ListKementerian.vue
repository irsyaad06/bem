<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { ref, computed } from "vue";

// --- STATE FILTER ---
const activeFilter = ref("Semua");

// Daftar Tombol Filter
const filterTabs = [
    { label: "Semua", value: "Semua" },
    { label: "Inti", value: "Inti Kabinet" }, // Label: Inti -> Data: Inti Kabinet
    { label: "Tekraf", value: "Tekraf" },
    { label: "Polhukam", value: "Polhukam" },
    { label: "Pemka", value: "Pemka" },
];

// --- DATA KEMENTERIAN ---
const ministries = [
    { 
        id: "sekneg", 
        name: "Kementerian Sekretariat Negara", 
        kemenko: "Inti Kabinet",
        icon: "🗂️", 
        color: "bg-blue-50 text-blue-600 border-blue-100",
        btnColor: "group-hover:bg-blue-600"
    },
    { 
        id: "keuangan", 
        name: "Kementerian Keuangan", 
        kemenko: "Inti Kabinet",
        icon: "💰", 
        color: "bg-emerald-50 text-emerald-600 border-emerald-100",
        btnColor: "group-hover:bg-emerald-600"
    },
    { 
        id: "dagri", 
        name: "Kementerian Dalam Negeri", 
        kemenko: "Polhukam",
        icon: "🏠", 
        color: "bg-slate-50 text-slate-600 border-slate-200",
        btnColor: "group-hover:bg-slate-800"
    },
    { 
        id: "lugri", 
        name: "Kementerian Luar Negeri", 
        kemenko: "Polhukam",
        icon: "🌏", 
        color: "bg-sky-50 text-sky-600 border-sky-100",
        btnColor: "group-hover:bg-sky-600"
    },
    { 
        id: "kastrat", 
        name: "Kementerian Kajian Aksi Strategis", 
        kemenko: "Polhukam",
        icon: "📢", 
        color: "bg-red-50 text-red-600 border-red-100",
        btnColor: "group-hover:bg-red-600"
    },
    { 
        id: "ekraf", 
        name: "Kementerian Ekonomi Kreatif", 
        kemenko: "Tekraf",
        icon: "💡", 
        color: "bg-purple-50 text-purple-600 border-purple-100",
        btnColor: "group-hover:bg-purple-600"
    },
    { 
        id: "kominfo", 
        name: "Kementerian Komunikasi & Informasi", 
        kemenko: "Tekraf",
        icon: "📡", 
        color: "bg-cyan-50 text-cyan-600 border-cyan-100",
        btnColor: "group-hover:bg-cyan-600"
    },
    { 
        id: "pendidikan", 
        name: "Kementerian Pendidikan", 
        kemenko: "Pemka",
        icon: "🎓", 
        color: "bg-yellow-50 text-yellow-600 border-yellow-100",
        btnColor: "group-hover:bg-yellow-500"
    },
    { 
        id: "sosial", 
        name: "Kementerian Sosial", 
        kemenko: "Pemka",
        icon: "🤝", 
        color: "bg-pink-50 text-pink-600 border-pink-100",
        btnColor: "group-hover:bg-pink-500"
    },
    { 
        id: "pora", 
        name: "Kementerian Pemuda & Olahraga", 
        kemenko: "Pemka",
        icon: "⚽", 
        color: "bg-orange-50 text-orange-600 border-orange-100",
        btnColor: "group-hover:bg-orange-500"
    },
];

// --- LOGIC FILTERING ---
const filteredMinistries = computed(() => {
    if (activeFilter.value === "Semua") {
        return ministries;
    }
    return ministries.filter(m => m.kemenko === activeFilter.value);
});
</script>

<template>
    <Head title="Daftar Kementerian" />

    <MainLayout>
        <div class="relative min-h-screen bg-slate-50 pt-32 pb-24">
            
            <div class="absolute inset-0 opacity-[0.03] pointer-events-none bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"></div>
            <div class="absolute inset-0 bg-[linear-gradient(to_right,#8080800a_1px,transparent_1px),linear-gradient(to_bottom,#8080800a_1px,transparent_1px)] bg-[size:24px_24px]"></div>

            <div class="container mx-auto px-4 max-w-6xl relative z-10">
                
                <div class="text-center mb-12">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-blue-100 bg-white shadow-sm mb-4">
                        <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                        <span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Unit Kerja Kabinet</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4">
                        Kementerian BEM UNIKOM
                    </h1>
                    <p class="text-slate-500 text-lg max-w-2xl mx-auto">
                        Bersinergi dalam setiap bidang untuk mewujudkan visi Merajut Asa.
                    </p>
                </div>

                <div class="flex flex-wrap justify-center gap-3 mb-12">
                    <button 
                        v-for="tab in filterTabs" 
                        :key="tab.label"
                        @click="activeFilter = tab.value"
                        class="px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 border shadow-sm select-none"
                        :class="activeFilter === tab.value 
                            ? 'bg-slate-900 text-white border-slate-900 scale-105 shadow-md' 
                            : 'bg-white text-slate-500 border-slate-200 hover:bg-blue-50 hover:text-blue-600 hover:border-blue-200'"
                    >
                        {{ tab.label }}
                    </button>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 relative">
                    <TransitionGroup name="fade">
                        <div 
                            v-for="dept in filteredMinistries" 
                            :key="dept.id"
                            class="group bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center relative overflow-hidden"
                        >
                            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-slate-200 to-transparent group-hover:via-blue-400 transition-all"></div>

                            <div 
                                class="w-20 h-20 rounded-2xl flex items-center justify-center text-4xl mb-6 shadow-inner border transition-transform duration-300 group-hover:scale-110"
                                :class="dept.color"
                            >
                                {{ dept.icon }}
                            </div>

                            <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-2 bg-slate-50 px-2 py-1 rounded">
                                {{ dept.kemenko }}
                            </span>

                            <h3 class="text-lg font-bold text-slate-800 mb-6 group-hover:text-blue-700 transition-colors min-h-[3.5rem] flex items-center justify-center">
                                {{ dept.name }}
                            </h3>

                            <div class="mt-auto w-full">
                                <Link 
                                    :href="`/kementerian/${dept.id}`" 
                                    class="w-full inline-flex items-center justify-center px-4 py-3 rounded-xl bg-slate-50 text-slate-600 text-sm font-bold transition-all duration-300 group-hover:text-white"
                                    :class="dept.btnColor"
                                >
                                    Informasi Lebih Lanjut
                                    <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </Link>
                            </div>
                        </div>
                    </TransitionGroup>
                </div>

                <div v-if="filteredMinistries.length === 0" class="text-center py-20">
                    <p class="text-slate-400 text-lg">Tidak ada kementerian dalam kategori ini.</p>
                </div>

            </div>
        </div>
    </MainLayout>
</template>

<style scoped>
/* Simple Fade Animation */
.fade-move,
.fade-enter-active,
.fade-leave-active {
  transition: all 0.4s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
  transform: scale(0.95);
}

/* Penting agar layout tidak berantakan saat item menghilang */
.fade-leave-active {
  position: absolute; 
  /* Sembunyikan item yang sedang leave agar grid langsung rapi */
  visibility: hidden; 
}
</style>