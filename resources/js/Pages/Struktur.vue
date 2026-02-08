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

            <div class="relative pt-32 pb-16 text-center z-10 px-4">
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

            <div class="container mx-auto px-4 relative z-10 max-w-5xl">
                <svg
                    class="hidden md:block absolute top-[56px] left-1/2 -translate-x-1/2 w-[380px] h-[100px] -z-10 text-slate-400 overflow-visible"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path d="M 0 0 C 190 0, 190 96, 380 96" />
                </svg>

                <div
                    class="flex flex-col md:flex-row justify-center items-center gap-12 md:gap-24 mb-16 relative z-10"
                >
                    <div
                        class="relative bg-white rounded-2xl p-6 shadow-md border-t-4 border-yellow-500 w-full max-w-[280px] text-center hover:-translate-y-1 transition-transform"
                    >
                        <div
                            class="w-16 h-16 mx-auto bg-yellow-50 rounded-full flex items-center justify-center text-yellow-600 mb-4 border border-yellow-100 relative z-20 bg-white"
                        >
                            <svg
                                class="w-8 h-8"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                ></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-slate-900">
                            Presiden
                        </h2>
                        <p class="text-slate-500 text-sm font-medium">
                            mahasiswa
                        </p>
                    </div>

                    <div
                        class="relative bg-white rounded-2xl p-6 shadow-md border-t-4 border-yellow-500 w-full max-w-[280px] text-center hover:-translate-y-1 transition-transform md:mt-8"
                    >
                        <div
                            class="w-16 h-16 mx-auto bg-yellow-50 rounded-full flex items-center justify-center text-yellow-600 mb-4 border border-yellow-100 relative z-20 bg-white"
                        >
                            <svg
                                class="w-8 h-8"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                ></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-slate-900">
                            Wakil Presiden
                        </h2>
                        <p class="text-slate-500 text-sm font-medium">
                            mahasiswa
                        </p>
                    </div>
                </div>

                <div
                    class="hidden md:block absolute left-1/2 -translate-x-1/2 top-[160px] w-[2px] h-[60px] bg-slate-400 z-0"
                ></div>

                <div
                    class="hidden md:block absolute left-1/2 -translate-x-1/2 top-[230px] w-[50%] max-w-[500px] h-[2px] bg-slate-400 z-0"
                >
                    <div
                        class="absolute left-0 top-0 w-[2px] h-[30px] bg-slate-400"
                    ></div>
                    <div
                        class="absolute right-0 top-0 w-[2px] h-[30px] bg-slate-400"
                    ></div>
                </div>

                <div
                    class="grid md:grid-cols-2 gap-6 max-w-4xl mx-auto mb-16 relative z-10 mt-12 md:mt-16"
                >
                    <div
                        class="bg-white rounded-xl p-5 shadow-sm border border-slate-200 flex items-center gap-4 relative"
                    >
                        <div
                            class="md:hidden absolute -top-8 left-1/2 -translate-x-1/2 w-[2px] h-8 bg-slate-400"
                        ></div>

                        <div
                            class="w-12 h-12 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0"
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
                            <h3 class="font-bold text-slate-800">
                                Kementerian Sekretariat Negara
                            </h3>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-xl p-5 shadow-sm border border-slate-200 flex items-center gap-4 relative"
                    >
                        <div
                            class="md:hidden absolute -top-8 left-1/2 -translate-x-1/2 w-[2px] h-8 bg-slate-400"
                        ></div>

                        <div
                            class="w-12 h-12 rounded-lg bg-yellow-50 text-yellow-600 flex items-center justify-center shrink-0"
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
                            <h3 class="font-bold text-slate-800">
                                Kementerian Keuangan
                            </h3>
                        </div>
                    </div>
                </div>

                <div
                    class="hidden md:flex flex-col items-center mb-10 relative"
                >
                    <div
                        class="absolute -top-16 w-[2px] h-16 bg-slate-400"
                    ></div>

                    <div
                        class="w-4 h-4 bg-slate-400 rounded-full z-10 border-4 border-slate-50"
                    ></div>

                    <div
                        class="w-[68%] h-[2px] bg-slate-400 relative mt-[-10px]"
                    >
                        <div
                            class="absolute left-0 top-0 w-[2px] h-8 bg-slate-400"
                        ></div>
                        <div
                            class="absolute left-1/2 -translate-x-1/2 top-0 w-[2px] h-8 bg-slate-400"
                        ></div>
                        <div
                            class="absolute right-0 top-0 w-[2px] h-8 bg-slate-400"
                        ></div>
                    </div>
                </div>

                <div class="grid md:grid-cols-3 gap-8 mt-4">
                    <div
                        v-for="(kemenko, index) in kemenkoanList"
                        :key="index"
                        class="flex flex-col h-full relative"
                    >
                        <div
                            class="md:hidden absolute -top-8 left-1/2 -translate-x-1/2 w-[2px] h-8 bg-slate-400"
                        ></div>

                        <div
                            class="bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden flex-1 group hover:-translate-y-1 transition-transform"
                        >
                            <div
                                class="p-6 flex items-center gap-4 bg-slate-50 border-b border-slate-100"
                            >
                                <div
                                    class="w-10 h-10 rounded-full flex items-center justify-center text-white shrink-0 shadow-sm bg-gradient-to-br"
                                    :class="kemenko.color"
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
                                <div>
                                    <h3
                                        class="text-base font-bold text-slate-800 leading-tight"
                                    >
                                        {{ kemenko.name }}
                                    </h3>
                                    <p
                                        class="text-slate-500 text-sm font-medium"
                                    >
                                        {{ kemenko.fullname }}
                                    </p>
                                </div>
                            </div>

                            <div class="p-5">
                                <div class="space-y-3 relative">
                                    <div
                                        class="absolute left-[7px] top-2 bottom-4 w-[2px] bg-slate-200"
                                    ></div>

                                    <div
                                        v-for="(
                                            ministry, mIndex
                                        ) in kemenko.ministries"
                                        :key="mIndex"
                                        class="relative pl-6"
                                    >
                                        <div
                                            class="absolute left-[7px] top-1/2 -translate-y-1/2 w-3 h-[2px] bg-slate-200"
                                        ></div>

                                        <div
                                            class="p-3 rounded-lg bg-white border border-slate-100 text-slate-600 text-sm font-medium hover:bg-slate-50 hover:text-blue-700 transition-colors shadow-sm"
                                        >
                                            {{ ministry }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>
