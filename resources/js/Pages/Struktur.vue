<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head } from "@inertiajs/vue3";

// Data Kemenkoan & Kementerian
const kemenkoanList = [
    {
        name: "Kemenkoan TEKRAF",
        fullname: "Teknologi & Ekonomi Kreatif",
        icon: "M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z",
        color: "from-blue-500 to-cyan-500",
        ministries: [
            "Kementerian Ekonomi Kreatif",
            "Kementerian Komunikasi & Informasi",
        ],
    },
    {
        name: "Kemenkoan POLHUKAM",
        fullname: "Politik, Hukum & Keamanan",
        icon: "M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3",
        color: "from-slate-700 to-slate-900",
        ministries: [
            "Kementerian Luar Negeri",
            "Kementerian Dalam Negeri",
            "Kementerian Kajian Aksi Strategis",
        ],
    },
    {
        name: "Kemenkoan PEMKA",
        fullname: "Pembangunan Karakter",
        icon: "M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z",
        color: "from-indigo-500 to-purple-500",
        ministries: [
            "Kementerian Pendidikan & Kebudayaan",
            "Kementerian Sosial",
            "Kementerian Pemuda & Olahraga",
        ],
    },
];
</script>

<template>
    <Head title="Struktur Organisasi" />

    <MainLayout>
        <div class="relative min-h-screen bg-slate-50 overflow-hidden pb-32">
            <div
                class="absolute inset-0 opacity-[0.03] pointer-events-none bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"
            ></div>
            <div
                class="absolute inset-0 bg-[linear-gradient(to_right,#8080800a_1px,transparent_1px),linear-gradient(to_bottom,#8080800a_1px,transparent_1px)] bg-[size:32px_32px]"
            ></div>

            <div class="relative pt-32 pb-12 text-center z-10 px-4">
                <div
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-blue-100 bg-white/50 backdrop-blur shadow-sm mb-4"
                >
                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                    <span
                        class="text-xs font-bold text-slate-500 uppercase tracking-widest"
                        >Organogram Kabinet</span
                    >
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-2">
                    Struktur Organisasi
                </h1>
                <p class="text-slate-500 text-lg">
                    Sinergi kepemimpinan untuk UNIKOM yang lebih baik.
                </p>
            </div>

            <div class="container mx-auto px-4 relative z-10 max-w-6xl">
                <div
                    class="absolute left-1/2 -translate-x-1/2 top-[280px] w-px h-24 bg-slate-300 hidden md:block"
                ></div>

                <div
                    class="flex flex-col md:flex-row justify-center items-center gap-8 md:gap-12 mb-20 relative"
                >
                    <div class="relative group w-full max-w-sm">
                        <div
                            class="relative bg-white rounded-[2rem] p-3 shadow-xl border border-slate-100 group-hover:-translate-y-2 transition-transform duration-300"
                        >
                            <div
                                class="aspect-[4/5] rounded-[1.5rem] overflow-hidden bg-slate-200 relative mb-4"
                            >
                                <img
                                    src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                    alt="Presiden Mahasiswa"
                                    class="w-full h-full object-cover"
                                />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-blue-900/80 to-transparent"
                                ></div>

                                <div
                                    class="absolute bottom-4 left-0 right-0 text-center"
                                >
                                    <h2 class="text-white text-xl font-bold">
                                        Nama Presiden
                                    </h2>
                                    <p
                                        class="text-blue-200 text-sm font-medium uppercase tracking-wider"
                                    >
                                        Presiden Mahasiswa
                                    </p>
                                </div>
                            </div>
                            <div
                                class="absolute -top-3 left-1/2 -translate-x-1/2 bg-gradient-to-r from-yellow-400 to-amber-500 text-white px-6 py-1.5 rounded-full text-xs font-bold shadow-lg uppercase tracking-wider"
                            >
                                01 Pimpinan
                            </div>
                        </div>
                    </div>

                    <div class="relative group w-full max-w-sm mt-8 md:mt-12">
                        <div
                            class="relative bg-white rounded-[2rem] p-3 shadow-xl border border-slate-100 group-hover:-translate-y-2 transition-transform duration-300"
                        >
                            <div
                                class="aspect-[4/5] rounded-[1.5rem] overflow-hidden bg-slate-200 relative mb-4"
                            >
                                <img
                                    src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                    alt="Wakil Presiden Mahasiswa"
                                    class="w-full h-full object-cover"
                                />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent"
                                ></div>

                                <div
                                    class="absolute bottom-4 left-0 right-0 text-center"
                                >
                                    <h2 class="text-white text-xl font-bold">
                                        Nama Wakil
                                    </h2>
                                    <p
                                        class="text-slate-300 text-sm font-medium uppercase tracking-wider"
                                    >
                                        Wakil Presiden
                                    </p>
                                </div>
                            </div>
                            <div
                                class="absolute -top-3 left-1/2 -translate-x-1/2 bg-slate-700 text-white px-6 py-1.5 rounded-full text-xs font-bold shadow-lg uppercase tracking-wider"
                            >
                                02 Pimpinan
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden md:flex justify-center mb-8">
                    <div class="w-px h-16 bg-slate-300"></div>
                </div>
                <div
                    class="hidden md:block relative h-px bg-slate-300 w-1/2 mx-auto mb-8"
                >
                    <div
                        class="absolute left-0 top-0 w-px h-8 bg-slate-300"
                    ></div>
                    <div
                        class="absolute right-0 top-0 w-px h-8 bg-slate-300"
                    ></div>
                </div>

                <div class="grid md:grid-cols-2 gap-6 max-w-4xl mx-auto mb-20">
                    <div
                        class="bg-white rounded-2xl p-6 shadow-lg border-l-4 border-blue-600 hover:shadow-xl transition-all duration-300 group"
                    >
                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform"
                            >
                                <svg
                                    class="w-6 h-6"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"
                                    ></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-slate-800">
                                    Kementerian Sekretariat Negara
                                </h3>
                                <p class="text-sm text-slate-500 mt-1">
                                    Pusat administrasi, kesekretariatan, dan
                                    manajemen data organisasi.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-2xl p-6 shadow-lg border-l-4 border-yellow-400 hover:shadow-xl transition-all duration-300 group"
                    >
                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 rounded-xl bg-yellow-50 text-yellow-600 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform"
                            >
                                <svg
                                    class="w-6 h-6"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    ></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-slate-800">
                                    Kementerian Keuangan
                                </h3>
                                <p class="text-sm text-slate-500 mt-1">
                                    Pengelolaan anggaran, transparansi dana, dan
                                    stabilitas finansial.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden md:flex flex-col items-center mb-10">
                    <div class="w-px h-12 bg-slate-300"></div>
                    <div
                        class="w-10 h-10 bg-slate-200 rounded-full flex items-center justify-center text-slate-500 z-10 border-4 border-slate-50"
                    >
                        <svg
                            class="w-5 h-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                            ></path>
                        </svg>
                    </div>
                    <div class="w-px h-8 bg-slate-300"></div>
                    <div class="w-2/3 h-px bg-slate-300 relative">
                        <div
                            class="absolute left-0 top-0 w-px h-8 bg-slate-300"
                        ></div>
                        <div
                            class="absolute left-1/2 -translate-x-1/2 top-0 w-px h-8 bg-slate-300"
                        ></div>
                        <div
                            class="absolute right-0 top-0 w-px h-8 bg-slate-300"
                        ></div>
                    </div>
                </div>

                <div class="grid md:grid-cols-3 gap-8 mt-8">
                    <div
                        v-for="(kemenko, index) in kemenkoanList"
                        :key="index"
                        class="flex flex-col h-full"
                    >
                        <div
                            class="bg-white rounded-[2rem] shadow-xl border border-slate-100 overflow-hidden flex-1 hover:shadow-2xl transition-all duration-300 group hover:-translate-y-1"
                        >
                            <div
                                class="h-24 p-6 flex items-start justify-between bg-gradient-to-br relative overflow-hidden"
                                :class="kemenko.color"
                            >
                                <div
                                    class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-20 transition-opacity"
                                ></div>
                                <div
                                    class="text-white font-bold text-lg relative z-10 w-2/3"
                                >
                                    {{ kemenko.name }}
                                </div>
                                <div
                                    class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center text-white backdrop-blur-sm"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            :d="kemenko.icon"
                                        ></path>
                                    </svg>
                                </div>
                            </div>

                            <div class="p-6">
                                <h4
                                    class="text-sm font-semibold text-slate-400 uppercase tracking-wide mb-4"
                                >
                                    Koordinasi Bidang
                                </h4>
                                <h3
                                    class="text-lg font-bold text-slate-800 mb-6 min-h-[3.5rem]"
                                >
                                    {{ kemenko.fullname }}
                                </h3>

                                <div class="space-y-3">
                                    <div
                                        v-for="(
                                            ministry, mIndex
                                        ) in kemenko.ministries"
                                        :key="mIndex"
                                        class="flex items-center gap-3 p-3 rounded-xl bg-slate-50 border border-slate-100 text-slate-600 text-sm font-medium hover:bg-blue-50 hover:text-blue-700 hover:border-blue-100 transition-colors cursor-default"
                                    >
                                        <div
                                            class="w-1.5 h-1.5 rounded-full bg-slate-300"
                                        ></div>
                                        {{ ministry }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            v-if="index !== kemenkoanList.length - 1"
                            class="h-8 w-px bg-slate-300 mx-auto md:hidden my-2"
                        ></div>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<style scoped>
/* Tambahan CSS jika diperlukan untuk garis hierarki yang lebih kompleks */
</style>
