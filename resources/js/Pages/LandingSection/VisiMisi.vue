<script setup>
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";

// State: Default ke index 0 (Misi pertama terbuka)
const activeIndex = ref(0);

// Function ganti tab
const setActive = (index) => {
    // Logic tambahan untuk mobile: Jika diklik lagi, bisa tutup (toggle)
    // Tapi untuk desktop tetap harus ada yang aktif satu.
    if (window.innerWidth < 1024 && activeIndex.value === index) {
        activeIndex.value = null; // Bisa tutup di mobile
    } else {
        activeIndex.value = index;
    }
};

const missions = [
    {
        letter: "M",
        restTitle: "ovement Catalyst",
        desc: "Menjadi katalisator gerakan mahasiswa yang progresif dan berdaya guna melalui pemberdayaan potensi serta pengembangan nilai intelektual, sosial, dan kemanusiaan."
    },
    {
        letter: "E",
        restTitle: "mpowerment Space",
        desc: "Mengoptimalkan wadah pengembangan mahasiswa sebagai ruang aktualisasi minat, bakat, dan potensi seluruh IKM UNIKOM."
    },
    {
        letter: "R",
        restTitle: "einforced Collaboration",
        desc: "Membangun budaya organisasi yang inklusif dan kolaboratif melalui ruang dialog, partisipasi setara, dan kerja sama antara BEM, himpunan, serta seluruh elemen IKM UNIKOM."
    },
    {
        letter: "A",
        restTitle: "dvanced Regeneration",
        desc: "Membangun ekosistem regenerasi yang berkelanjutan melalui pelatihan kepemimpinan, manajemen organisasi, dan peningkatan kapasitas kader secara sistematis."
    },
    {
        letter: "S",
        restTitle: "ocial Contribution",
        desc: "Optimalisasi pengabdian kepada masyarakat melalui program yang relevan, solutif, sehingga masyarakat dapat merasakan dampak nyatanya."
    },
    {
        letter: "A",
        restTitle: "spirational Synergy",
        desc: "Mewujudkan sinergi aspiratif antara mahasiswa, organisasi, dan masyarakat dalam menciptakan ruang gerak bersama yang visioner dan berkelanjutan."
    }
];
</script>

<template>
        <Head title="Visi & Misi" />

        <section class="relative min-h-screen pt-10 pb-16 flex flex-col items-center overflow-hidden selection:bg-blue-600 selection:text-white">
            
            <div class="absolute inset-0 -z-20 h-full w-full bg-[linear-gradient(to_right,#8080800a_1px,transparent_1px),linear-gradient(to_bottom,#8080800a_1px,transparent_1px)] bg-[size:24px_24px] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)]"></div>
            <div class="absolute inset-0 -z-10 opacity-[0.03] pointer-events-none bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"></div>
            <div class="absolute top-1/4 left-0 w-96 h-96 bg-blue-400/10 rounded-full blur-[128px] -z-10"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-indigo-500/10 rounded-full blur-[128px] -z-10"></div>

            <div class="w-full max-w-5xl mx-auto px-4 relative z-10">

                <div class="text-center mb-6">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-blue-100/80 bg-white/70 backdrop-blur-md shadow-sm cursor-default">
                        <span class="flex h-2.5 w-2.5 relative">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-500 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-blue-600"></span>
                        </span>
                        <span class="text-xs md:text-sm font-semibold text-slate-600 tracking-wider uppercase">
                            Arah Gerak Kabinet
                        </span>
                    </div>
                </div>

                <h1 class="text-center text-4xl md:text-5xl lg:text-6xl font-bold text-slate-900 mb-16">
                    Visi & Misi <br />
                    <span style="font-family: 'Dancing Script', cursive;" class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600 pb-2">
                        Merajut Asa
                    </span>
                </h1>

                <div class="mb-24 max-w-4xl mx-auto">
                    <div class="relative group">
                        <div class="absolute -inset-1 bg-gradient-to-r from-blue-200 to-indigo-200 rounded-[2rem] blur-xl opacity-50 group-hover:opacity-75 transition duration-500"></div>
                        <div class="relative bg-white/80 backdrop-blur-xl border border-white/50 rounded-[2rem] p-8 md:p-12 shadow-xl text-center">
                            <h2 class="text-lg md:text-xl font-bold text-blue-600 uppercase tracking-[0.2em] mb-6">Visi Kami</h2>
                            <p class="text-2xl md:text-3xl lg:text-4xl font-medium text-slate-800 leading-relaxed font-serif italic">
                                "Terwujudnya BEM UNIKOM sebagai <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600 font-bold not-italic">episentrum sinergi</span> dalam merajut asa bagi IKM UNIKOM."
                            </p>
                        </div>
                    </div>
                </div>

                <div class="max-w-5xl items-center">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-slate-900">Misi Kami</h2>
                        <p class="text-slate-500 mt-2">Nilai-nilai utama yang membentuk "MERASA"</p>
                    </div>

                    <div class="grid lg:grid-cols-12 gap-8 items-start">
                        
                        <div class="lg:col-span-5 flex flex-col gap-3">
                            <div v-for="(mission, index) in missions" :key="index">
                                
                                <button 
                                    @click="setActive(index)"
                                    class="group relative flex items-center p-4 rounded-xl transition-all duration-300 border text-left w-full"
                                    :class="activeIndex === index 
                                        ? 'bg-white border-blue-200 shadow-lg scale-[1.02] z-10' 
                                        : 'bg-white/40 border-transparent hover:bg-white hover:border-slate-100 hover:shadow-sm text-slate-500'"
                                >
                                    <div 
                                        class="absolute left-0 top-1/2 -translate-y-1/2 w-1.5 h-12 bg-gradient-to-b from-blue-600 to-indigo-600 rounded-r-full transition-all duration-300"
                                        :class="activeIndex === index ? 'opacity-100' : 'opacity-0'"
                                    ></div>

                                    <div class="pl-4">
                                        <h3 class="text-xl font-bold transition-colors"
                                            :class="activeIndex === index ? 'text-slate-800' : 'text-slate-400 group-hover:text-slate-600'"
                                        >
                                            <span class="text-2xl font-extrabold mr-0.5"
                                                :class="activeIndex === index ? 'text-blue-600' : 'text-slate-400 group-hover:text-slate-500'"
                                            >
                                                {{ mission.letter }}
                                            </span>
                                            {{ mission.restTitle }}
                                        </h3>
                                    </div>
                                    
                                    <svg 
                                        class="w-5 h-5 ml-auto transition-all duration-300 transform"
                                        :class="activeIndex === index ? 'text-blue-600 rotate-90 lg:rotate-0' : 'text-slate-300 opacity-0 group-hover:opacity-100'"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>

                                <div 
                                    v-show="activeIndex === index"
                                    class="lg:hidden mt-2 p-6 bg-white/60 border border-blue-100 rounded-xl shadow-sm animate-fade-in-down"
                                >
                                    <div class="mb-3">
                                        <span class="inline-block px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold uppercase tracking-wider rounded-full">
                                            Poin Misi {{ index + 1 }}
                                        </span>
                                    </div>
                                    <p class="text-slate-600 leading-relaxed font-medium">
                                        {{ mission.desc }}
                                    </p>
                                </div>

                            </div>
                        </div>

                        <div class="hidden lg:block lg:col-span-7">
                            <div class="relative bg-white rounded-[2rem] p-8 md:p-12 shadow-2xl border border-slate-100 min-h-[300px] flex flex-col justify-center overflow-hidden">
                                
                                <div class="absolute -right-10 -bottom-10 text-[12rem] font-black text-slate-50 opacity-50 select-none pointer-events-none transition-all duration-500">
                                    {{ activeIndex !== null ? missions[activeIndex].letter : '' }}
                                </div>
                                <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-bl-[100%] -z-10 opacity-60"></div>

                                <Transition mode="out-in" 
                                    enter-active-class="transition duration-300 ease-out"
                                    enter-from-class="opacity-0 translate-y-4"
                                    enter-to-class="opacity-100 translate-y-0"
                                    leave-active-class="transition duration-200 ease-in"
                                    leave-from-class="opacity-100 translate-y-0"
                                    leave-to-class="opacity-0 -translate-y-4"
                                >
                                    <div v-if="activeIndex !== null" :key="activeIndex" class="relative z-10">
                                        <div class="mb-6">
                                            <span class="inline-block px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold uppercase tracking-wider rounded-full mb-3">
                                                Poin Misi {{ activeIndex + 1 }}
                                            </span>
                                            <h3 class="text-3xl md:text-4xl font-bold text-slate-900 leading-tight">
                                                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">
                                                    {{ missions[activeIndex].letter }}
                                                </span>{{ missions[activeIndex].restTitle }}
                                            </h3>
                                        </div>
                                        
                                        <div class="w-20 h-1.5 bg-slate-100 rounded-full mb-8">
                                            <div class="h-full bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full w-1/3"></div>
                                        </div>

                                        <p class="text-lg text-slate-600 leading-relaxed font-medium">
                                            {{ missions[activeIndex].desc }}
                                        </p>
                                    </div>
                                </Transition>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap');

/* Animasi untuk accordion mobile */
.animate-fade-in-down {
    animation: fadeInDown 0.3s ease-out;
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>