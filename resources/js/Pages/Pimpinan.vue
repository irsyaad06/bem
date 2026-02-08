<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link } from "@inertiajs/vue3"; // Pastikan Link diimport
import { ref, computed } from "vue";

// --- STATE MANAGEMENT ---
const activeKemenkoIndex = ref(0);

// --- NAVIGATION LOGIC ---
const prevKemenkoIndex = computed(() => {
    return activeKemenkoIndex.value === 0
        ? kemenkoanGroups.length - 1
        : activeKemenkoIndex.value - 1;
});

const nextKemenkoIndex = computed(() => {
    return activeKemenkoIndex.value === kemenkoanGroups.length - 1
        ? 0
        : activeKemenkoIndex.value + 1;
});

const switchKemenko = (index) => {
    activeKemenkoIndex.value = index;
    // Opsional: Scroll sedikit ke atas agar user sadar konten berubah
    document
        .getElementById("kemenko-section")
        .scrollIntoView({ behavior: "smooth" });
};

// --- DATA STRUCTURE ---

// 1. Top Leaders (Pres & Wapres)
const topLeaders = [
    {
        name: "Sanditya Saputra",
        role: "Presiden Mahasiswa",
        image: "https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
        color: "from-yellow-500 to-amber-600",
    },
    {
        name: "Ahmad Zulfikar",
        role: "Wakil Presiden Mahasiswa",
        image: "https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
        color: "from-yellow-500 to-amber-600",
    },
];

// 2. Core Cabinet
const coreCabinet = [
    {
        id: "sekneg", // ID untuk link detail
        department: "Kementerian Sekretariat Negara",
        badge: "Sekretariat",
        theme: "blue",
        minister: {
            name: "Karina",
            image: "https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=800&q=80",
        },
        deputy: {
            name: "Neng Wakil",
            image: "https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=800&q=80",
        },
    },
    {
        id: "keuangan", // ID untuk link detail
        department: "Kementerian Keuangan",
        badge: "Keuangan",
        theme: "emerald",
        minister: {
            name: "Salsa",
            image: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=800&q=80",
        },
        deputy: {
            name: "Aulia",
            image: "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&w=800&q=80",
        },
    },
];

// 3. Kemenkoan (Data Terstruktur)
const kemenkoanGroups = [
    {
        id: "tekraf",
        label: "TEKRAF",
        fullname: "Kemenkoan Teknologi & Ekonomi Kreatif",
        theme: "blue",
        menko: {
            name: "Irsyaad Fatahilah",
            role: "Menteri Koordinator",
            image: "https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=800&q=80",
        },
        wamenko: {
            name: "Nadya",
            role: "Wakil Menko",
            image: "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=800&q=80",
        },
        ministries: [
            {
                id: "ekraf",
                name: "Kementerian Ekonomi Kreatif",
                minister: {
                    name: "Senzie",
                    image: "https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80",
                },
                deputy: {
                    name: "Danan",
                    image: "https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=600&q=80",
                },
            },
            {
                id: "kominfo",
                name: "Kementerian Komunikasi & Informasi",
                minister: {
                    name: "Bro Dap",
                    image: "https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?auto=format&fit=crop&w=600&q=80",
                },
                deputy: {
                    name: "Ibnu",
                    image: "https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=600&q=80",
                },
            },
        ],
    },
    {
        id: "polhukam",
        label: "POLHUKAM",
        fullname: "Kemenkoan Politik, Hukum & Keamanan",
        theme: "slate",
        menko: {
            name: "Afif",
            role: "Menteri Koordinator",
            image: "https://images.unsplash.com/photo-1500917293891-ef795e70e1f6?auto=format&fit=crop&w=800&q=80",
        },
        wamenko: {
            name: "Sucipto",
            role: "Wakil Menko",
            image: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=800&q=80",
        },
        ministries: [
            {
                id: "dagri",
                name: "Kementerian Dalam Negeri",
                minister: {
                    name: "Daffa",
                    image: "https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=600&q=80",
                },
                deputy: {
                    name: "Arsael",
                    image: "https://images.unsplash.com/photo-1542909168-82c3e7fdca5c?auto=format&fit=crop&w=600&q=80",
                },
            },
            {
                id: "lugri",
                name: "Kementerian Luar Negeri",
                minister: {
                    name: "Daffa",
                    image: "https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=600&q=80",
                },
                deputy: {
                    name: "Faiz",
                    image: "https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?auto=format&fit=crop&w=600&q=80",
                },
            },
            {
                id: "kastrat",
                name: "Kementerian Kastrat",
                minister: {
                    name: "Ridho",
                    image: "https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=600&q=80",
                },
                deputy: {
                    name: "Roma",
                    image: "https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=600&q=80",
                },
            },
        ],
    },
    {
        id: "pemka",
        label: "PEMKA",
        fullname: "Kemenkoan Pembangunan Karakter",
        theme: "indigo",
        menko: {
            name: "Samuel",
            role: "Menteri Koordinator",
            image: "https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=800&q=80",
        },
        wamenko: {
            name: "Ramdhan",
            role: "Wakil Menko",
            image: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=800&q=80",
        },
        ministries: [
            {
                id: "pendidikan",
                name: "Kementerian Pendidikan",
                minister: {
                    name: "Abdul",
                    image: "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&w=600&q=80",
                },
                deputy: {
                    name: "Soleh",
                    image: "https://images.unsplash.com/photo-1552058544-f2b08422138a?auto=format&fit=crop&w=600&q=80",
                },
            },
            {
                id: "sosial",
                name: "Kementerian Sosial",
                minister: {
                    name: "Alex",
                    image: "https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=600&q=80",
                },
                deputy: {
                    name: "Alox",
                    image: "https://images.unsplash.com/photo-1554151228-14d9def656ec?auto=format&fit=crop&w=600&q=80",
                },
            },
            {
                id: "pora",
                name: "Kementerian Pemuda & Olahraga",
                minister: {
                    name: "Syahrizal",
                    image: "https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=600&q=80",
                },
                deputy: {
                    name: "Yesar",
                    image: "https://images.unsplash.com/photo-1554151228-14d9def656ec?auto=format&fit=crop&w=600&q=80",
                },
            },
        ],
    },
];

// Helper Styling
const getThemeClass = (theme) => {
    const maps = {
        blue: {
            bg: "bg-blue-50",
            text: "text-blue-900",
            border: "border-blue-200",
            btnActive: "bg-blue-600 text-white",
            btnInactive: "text-blue-600 bg-blue-50 hover:bg-blue-100",
            navHover: "hover:bg-blue-100",
            btnDetail: "bg-blue-600 hover:bg-blue-700",
        },
        slate: {
            bg: "bg-slate-100",
            text: "text-slate-900",
            border: "border-slate-200",
            btnActive: "bg-slate-800 text-white",
            btnInactive: "text-slate-600 bg-slate-100 hover:bg-slate-200",
            navHover: "hover:bg-slate-200",
            btnDetail: "bg-slate-800 hover:bg-slate-900",
        },
        emerald: {
            bg: "bg-emerald-50",
            text: "text-emerald-900",
            border: "border-emerald-200",
            btnActive: "bg-emerald-600 text-white",
            btnInactive: "text-emerald-600 bg-emerald-50 hover:bg-emerald-100",
            navHover: "hover:bg-emerald-100",
            btnDetail: "bg-emerald-600 hover:bg-emerald-700",
        },
        indigo: {
            bg: "bg-indigo-50",
            text: "text-indigo-900",
            border: "border-indigo-200",
            btnActive: "bg-indigo-600 text-white",
            btnInactive: "text-indigo-600 bg-indigo-50 hover:bg-indigo-100",
            navHover: "hover:bg-indigo-100",
            btnDetail: "bg-indigo-600 hover:bg-indigo-700",
        },
    };
    return maps[theme] || maps.blue;
};
</script>

<template>
    <Head title="Jajaran Pimpinan" />

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
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-blue-100 bg-white/80 backdrop-blur shadow-sm mb-4"
                >
                    <span
                        class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"
                    ></span>
                    <span
                        class="text-xs font-bold text-slate-500 uppercase tracking-widest"
                        >Wajah Kabinet</span
                    >
                </div>
                <h1
                    class="text-4xl md:text-6xl font-bold text-slate-900 mb-4 tracking-tight"
                >
                    Jajaran Pimpinan
                </h1>
                <p class="text-slate-500 text-lg max-w-2xl mx-auto">
                    Mengenal lebih dekat para penggerak Kabinet Merajut Asa.
                </p>
            </div>

            <div class="container mx-auto px-4 relative z-10 max-w-6xl">
                <div class="mb-24">
                    <div
                        class="flex flex-col md:flex-row justify-center gap-8 md:gap-12 items-center"
                    >
                        <div
                            v-for="(leader, idx) in topLeaders"
                            :key="idx"
                            class="group relative w-full max-w-sm aspect-[4/5] rounded-[2rem] overflow-hidden shadow-2xl transition-all duration-500 hover:-translate-y-2"
                        >
                            <img
                                :src="leader.image"
                                :alt="leader.name"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                            />
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"
                            ></div>
                            <div
                                class="absolute bottom-0 left-0 w-full p-8 text-center"
                            >
                                <h2 class="text-2xl font-bold text-white mb-1">
                                    {{ leader.name }}
                                </h2>
                                <p class="text-slate-300 font-medium text-base">
                                    {{ leader.role }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-24">
                    <div class="text-center mb-12">
                        <h3
                            class="text-2xl font-bold text-slate-800 relative inline-block"
                        >
                            Pejabat Inti Kabinet
                            <div
                                class="absolute -bottom-2 left-1/2 -translate-x-1/2 w-12 h-1 bg-blue-500 rounded-full"
                            ></div>
                        </h3>
                    </div>

                    <div class="flex flex-col gap-12 max-w-6xl mx-auto">
                        <div
                            v-for="(dept, idx) in coreCabinet"
                            :key="idx"
                            class="bg-white rounded-[2.5rem] shadow-xl border border-slate-100 p-8 md:p-10 relative overflow-hidden"
                        >
                            <div
                                class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-blue-50 to-transparent rounded-bl-full -z-0 opacity-50"
                            ></div>

                            <div class="relative z-10 text-center mb-8">
                                <span
                                    class="text-xs font-bold text-blue-600 uppercase tracking-widest bg-blue-50 px-3 py-1 rounded-full mb-3 inline-block"
                                >
                                    {{ dept.badge }}
                                </span>
                                <h3 class="text-3xl font-bold text-slate-900">
                                    {{ dept.department }}
                                </h3>
                            </div>

                            <div
                                class="grid md:grid-cols-2 gap-8 items-center justify-center mb-10"
                            >
                                <div
                                    class="group relative aspect-[3/4] md:aspect-[4/5] rounded-2xl overflow-hidden shadow-lg mx-auto w-full max-w-xs"
                                >
                                    <img
                                        :src="dept.minister.image"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                    />
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"
                                    ></div>
                                    <div
                                        class="absolute bottom-0 p-6 text-center w-full"
                                    >
                                        <h4
                                            class="text-xl font-bold text-white"
                                        >
                                            Menteri
                                        </h4>
                                        <p class="text-slate-300 text-sm">
                                            {{ dept.minister.name }}
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="group relative aspect-[3/4] md:aspect-[4/5] rounded-2xl overflow-hidden shadow-lg mx-auto w-full max-w-xs"
                                >
                                    <img
                                        :src="dept.deputy.image"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                    />
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"
                                    ></div>
                                    <div
                                        class="absolute bottom-0 p-6 text-center w-full"
                                    >
                                        <h4
                                            class="text-xl font-bold text-white"
                                        >
                                            Wakil Menteri
                                        </h4>
                                        <p class="text-slate-300 text-sm">
                                            {{ dept.deputy.name }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center relative z-10">
                                <Link
                                    :href="`/kementerian/${id}`"
                                    class="inline-flex items-center px-8 py-3.5 rounded-xl text-white font-bold shadow-lg shadow-blue-500/30 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 active:scale-95"
                                    :class="getThemeClass(dept.theme).btnDetail"
                                >
                                    <svg
                                        class="w-5 h-5 mr-2"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                        ></path>
                                    </svg>
                                    Informasi Detail
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-24" id="kemenko-section">
                    <div class="text-center mb-10">
                        <h3 class="text-2xl font-bold text-slate-800">
                            Kementerian Koordinator
                        </h3>
                        <p class="text-slate-500 mt-2">
                            Pilih Kemenkoan untuk melihat struktur
                        </p>
                    </div>

                    <div class="flex flex-wrap justify-center gap-4 mb-10">
                        <button
                            v-for="(group, index) in kemenkoanGroups"
                            :key="index"
                            @click="switchKemenko(index)"
                            class="px-6 py-3 rounded-xl font-bold text-sm transition-all duration-300 shadow-sm border border-transparent"
                            :class="
                                activeKemenkoIndex === index
                                    ? getThemeClass(group.theme).btnActive +
                                      ' shadow-lg scale-105'
                                    : getThemeClass(group.theme).btnInactive
                            "
                        >
                            {{ group.label }}
                        </button>
                    </div>

                    <Transition
                        mode="out-in"
                        enter-active-class="transition duration-300 ease-out"
                        enter-from-class="opacity-0 translate-y-4"
                        enter-to-class="opacity-100 translate-y-0"
                        leave-active-class="transition duration-200 ease-in"
                        leave-from-class="opacity-100 translate-y-0"
                        leave-to-class="opacity-0 -translate-y-4"
                    >
                        <div
                            :key="activeKemenkoIndex"
                            class="rounded-[3rem] p-8 md:p-12 border relative overflow-hidden"
                            :class="[
                                getThemeClass(
                                    kemenkoanGroups[activeKemenkoIndex].theme,
                                ).bg,
                                getThemeClass(
                                    kemenkoanGroups[activeKemenkoIndex].theme,
                                ).border,
                            ]"
                        >
                            <div class="text-center mb-12">
                                <h2
                                    class="text-3xl md:text-4xl font-bold mb-2"
                                    :class="
                                        getThemeClass(
                                            kemenkoanGroups[activeKemenkoIndex]
                                                .theme,
                                        ).text
                                    "
                                >
                                    {{
                                        kemenkoanGroups[activeKemenkoIndex]
                                            .fullname
                                    }}
                                </h2>
                            </div>

                            <div
                                class="grid md:grid-cols-2 gap-8 mb-10 max-w-3xl mx-auto"
                            >
                                <div
                                    class="relative group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-xl transition-all aspect-[4/5]"
                                >
                                    <img
                                        :src="
                                            kemenkoanGroups[activeKemenkoIndex]
                                                .menko.image
                                        "
                                        class="w-full h-full object-cover"
                                    />
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"
                                    ></div>
                                    <div
                                        class="absolute bottom-0 p-6 w-full text-center"
                                    >
                                        <h3
                                            class="text-xl font-bold text-white"
                                        >
                                            Menteri Koordinator
                                        </h3>
                                        <p class="text-white/80 text-sm">
                                            {{
                                                kemenkoanGroups[
                                                    activeKemenkoIndex
                                                ].menko.name
                                            }}
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="relative group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-xl transition-all aspect-[4/5]"
                                >
                                    <img
                                        :src="
                                            kemenkoanGroups[activeKemenkoIndex]
                                                .wamenko.image
                                        "
                                        class="w-full h-full object-cover"
                                    />
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"
                                    ></div>
                                    <div
                                        class="absolute bottom-0 p-6 w-full text-center"
                                    >
                                        <h3
                                            class="text-xl font-bold text-white"
                                        >
                                            Wakil Menteri Koordinator
                                        </h3>
                                        <p class="text-white/80 text-sm">
                                            {{
                                                kemenkoanGroups[
                                                    activeKemenkoIndex
                                                ].wamenko.name
                                            }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mb-16 relative z-10">
                                <Link
                                    :href="`/kementerian/${id}`"
                                    class="inline-flex items-center px-6 py-3 rounded-xl text-white font-bold text-sm shadow-md transition-all duration-300 hover:shadow-lg hover:-translate-y-1 active:scale-95"
                                    :class="
                                        getThemeClass(
                                            kemenkoanGroups[activeKemenkoIndex]
                                                .theme,
                                        ).btnDetail
                                    "
                                >
                                    <svg
                                        class="w-4 h-4 mr-2"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                        ></path>
                                    </svg>
                                    Info Kemenkoan
                                </Link>
                            </div>

                            <div
                                class="flex items-center gap-4 mb-10 opacity-50"
                            >
                                <div class="h-px bg-slate-400 flex-1"></div>
                                <span
                                    class="text-sm font-bold uppercase tracking-widest text-slate-600"
                                    >Jajaran Kementerian</span
                                >
                                <div class="h-px bg-slate-400 flex-1"></div>
                            </div>

                            <div
                                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"
                            >
                                <div
                                    v-for="(ministry, mIdx) in kemenkoanGroups[
                                        activeKemenkoIndex
                                    ].ministries"
                                    :key="mIdx"
                                    class="bg-white rounded-3xl p-5 shadow-sm border border-slate-100 hover:shadow-lg transition-all flex flex-col h-full"
                                >
                                    <h5
                                        class="text-center text-lg font-bold text-slate-900 mb-6 border-b border-slate-100 pb-3"
                                    >
                                        {{ ministry.name }}
                                    </h5>

                                    <div class="flex flex-col gap-4 flex-grow">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="w-16 h-16 rounded-full overflow-hidden shrink-0 border-2 border-blue-100"
                                            >
                                                <img
                                                    :src="
                                                        ministry.minister.image
                                                    "
                                                    class="w-full h-full object-cover"
                                                />
                                            </div>
                                            <div>
                                                <p
                                                    class="text-xs font-bold text-blue-600 uppercase"
                                                >
                                                    Menteri
                                                </p>
                                                <p
                                                    class="text-sm font-semibold text-slate-800 leading-tight"
                                                >
                                                    {{ ministry.minister.name }}
                                                </p>
                                            </div>
                                        </div>
                                        <div
                                            class="ml-8 w-0.5 h-4 bg-slate-200"
                                        ></div>
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="w-16 h-16 rounded-full overflow-hidden shrink-0 border-2 border-slate-100 grayscale hover:grayscale-0 transition-all"
                                            >
                                                <img
                                                    :src="ministry.deputy.image"
                                                    class="w-full h-full object-cover"
                                                />
                                            </div>
                                            <div>
                                                <p
                                                    class="text-xs font-bold text-slate-500 uppercase"
                                                >
                                                    Wakil Menteri
                                                </p>
                                                <p
                                                    class="text-sm font-semibold text-slate-700 leading-tight"
                                                >
                                                    {{ ministry.deputy.name }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="mt-6 pt-4 border-t border-slate-50"
                                    >
                                        <Link
                                            :href="`/kementerian/${id}`"
                                            class="w-full inline-flex justify-center items-center py-2.5 rounded-lg bg-slate-50 text-slate-600 text-sm font-bold hover:bg-slate-800 hover:text-white transition-all duration-300"
                                        >
                                            Informasi Detail
                                        </Link>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="mt-20 pt-8 border-t border-slate-200/50 flex flex-col sm:flex-row justify-between gap-4"
                            >
                                <button
                                    @click="switchKemenko(prevKemenkoIndex)"
                                    class="group flex items-center gap-3 p-4 rounded-xl bg-white border border-slate-100 shadow-sm transition-all hover:shadow-md hover:bg-slate-50 text-left"
                                >
                                    <div
                                        class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center group-hover:bg-slate-200 transition-colors"
                                    >
                                        <svg
                                            class="w-5 h-5 text-slate-600"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15 19l-7-7 7-7"
                                            ></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p
                                            class="text-xs text-slate-400 uppercase font-bold"
                                        >
                                            Sebelumnya
                                        </p>
                                        <p
                                            class="text-sm font-bold text-slate-800"
                                        >
                                            {{
                                                kemenkoanGroups[
                                                    prevKemenkoIndex
                                                ].label
                                            }}
                                        </p>
                                    </div>
                                </button>

                                <button
                                    @click="switchKemenko(nextKemenkoIndex)"
                                    class="group flex items-center gap-3 p-4 rounded-xl bg-white border border-slate-100 shadow-sm transition-all hover:shadow-md hover:bg-slate-50 text-right flex-row-reverse"
                                >
                                    <div
                                        class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center group-hover:bg-slate-200 transition-colors"
                                    >
                                        <svg
                                            class="w-5 h-5 text-slate-600"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 5l7 7-7 7"
                                            ></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p
                                            class="text-xs text-slate-400 uppercase font-bold"
                                        >
                                            Selanjutnya
                                        </p>
                                        <p
                                            class="text-sm font-bold text-slate-800"
                                        >
                                            {{
                                                kemenkoanGroups[
                                                    nextKemenkoIndex
                                                ].label
                                            }}
                                        </p>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </Transition>
                </div>
            </div>
        </div>
    </MainLayout>
</template>
