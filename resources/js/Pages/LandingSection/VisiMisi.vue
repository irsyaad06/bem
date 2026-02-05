<script setup>
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";

// State untuk Accordion
const activeAccordion = ref(null);

const toggleAccordion = (index) => {
    if (activeAccordion.value === index) {
        activeAccordion.value = null;
    } else {
        activeAccordion.value = index;
    }
};

// Data Misi (Dipisah huruf depannya untuk styling 'MERASA')
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

    <MainLayout>
        <section class="relative min-h-screen pt-10 pb-24 flex flex-col items-center overflow-hidden selection:bg-blue-600 selection:text-white">
            
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

                <div class="mb-20">
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

                <div>
                    <div class="text-center mb-10">
                        <h2 class="text-3xl font-bold text-slate-900">Misi Kami</h2>
                        <p class="text-slate-500 mt-2">Nilai-nilai utama yang membentuk "MERASA"</p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div 
                            v-for="(mission, index) in missions" 
                            :key="index"
                            class="group"
                        >
                            <div 
                                @click="toggleAccordion(index)"
                                class="bg-white border border-slate-200 rounded-2xl overflow-hidden cursor-pointer transition-all duration-300 hover:shadow-lg hover:border-blue-200 relative"
                                :class="{'ring-2 ring-blue-100 shadow-md': activeAccordion === index}"
                            >
                                <div class="p-6 flex items-center justify-between gap-4">
                                    <h3 class="text-xl md:text-2xl font-bold text-slate-700 group-hover:text-slate-900 transition-colors">
                                        <span class="text-3xl md:text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-br from-blue-600 to-indigo-600 mr-0.5">
                                            {{ mission.letter }}
                                        </span>
                                        <span>{{ mission.restTitle }}</span>
                                    </h3>

                                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-blue-50 group-hover:text-blue-600 transition-all duration-300">
                                        <svg 
                                            class="w-5 h-5 transform transition-transform duration-300"
                                            :class="{'rotate-180': activeAccordion === index}"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        >
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>

                                <div 
                                    class="grid transition-all duration-300 ease-out"
                                    :class="activeAccordion === index ? 'grid-rows-[1fr] opacity-100 pb-6' : 'grid-rows-[0fr] opacity-0'"
                                >
                                    <div class="overflow-hidden px-6">
                                        <div class="pt-2 border-t border-slate-100">
                                            <p class="text-slate-600 leading-relaxed text-lg mt-4">
                                                {{ mission.desc }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div 
                                    class="absolute bottom-0 left-0 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 transition-all duration-300"
                                    :class="activeAccordion === index ? 'w-full' : 'w-0'"
                                ></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </MainLayout>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap');
</style>