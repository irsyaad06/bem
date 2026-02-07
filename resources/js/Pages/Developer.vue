<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

// Data Developer (Silakan ganti dengan data asli Anda)
const developer = {
    name: "Muhammad Irsyaad Fatahilah",
    role: "Full Stack Developer",
    university: "Universitas Komputer Indonesia",
    bio: "Seorang pengembang web yang berdedikasi menciptakan pengalaman digital yang intuitif dan berkinerja tinggi. Memiliki ketertarikan mendalam pada teknologi modern seperti Vue.js, Laravel, dan Tailwind CSS. Percaya bahwa kode yang bersih adalah seni.",
    avatar: "/img/icad.png",
    cover: "https://images.unsplash.com/photo-1555099962-4199c345e5dd?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80", // Foto Banner coding
    skills: [
        "Vue.js",
        "Laravel",
        "Inertia.js",
        "Tailwind CSS",
        "MySQL",
        "Git",
    ],
    socials: {
        github: "https://github.com/irsyaad06",
        linkedin: "https://www.linkedin.com/in/irsyaad-fatahilah-1329b91b5/",
        instagram: "https://www.instagram.com/caadd__/?hl=id",
        email: "http://wa.me/+6282216295825",
    },
};
</script>

<template>
    <Head title="Developer Profile" />

    <MainLayout>
        <div
            class="min-h-screen bg-slate-50 pt-28 pb-20 flex items-center justify-center relative overflow-hidden"
        >
            <div
                class="absolute inset-0 opacity-[0.03] pointer-events-none bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"
            ></div>
            <div
                class="absolute inset-0 bg-[linear-gradient(to_right,#8080800a_1px,transparent_1px),linear-gradient(to_bottom,#8080800a_1px,transparent_1px)] bg-[size:24px_24px] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_50%,#000_70%,transparent_100%)]"
            ></div>

            <div
                class="absolute top-1/4 left-1/4 w-72 h-72 bg-blue-400/20 rounded-full blur-[100px] -z-10 animate-pulse"
            ></div>
            <div
                class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-indigo-500/20 rounded-full blur-[100px] -z-10"
            ></div>

            <div class="container mx-auto px-4 relative z-10 max-w-2xl">
                <div class="mb-6">
                    <Link
                        href="/"
                        class="inline-flex items-center text-sm font-bold text-slate-500 hover:text-blue-600 transition-colors group"
                    >
                        <svg
                            class="w-4 h-4 mr-1 transform group-hover:-translate-x-1 transition-transform"
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
                        Kembali ke Beranda
                    </Link>
                </div>

                <div
                    class="bg-white rounded-[2rem] shadow-2xl border border-slate-100 overflow-hidden relative group hover:shadow-blue-900/10 transition-shadow duration-500"
                >
                    <div class="h-48 relative overflow-hidden">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent z-10"
                        ></div>
                        <img
                            :src="developer.cover"
                            alt="Cover"
                            class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700"
                        />
                    </div>

                    <div class="px-8 pb-8 relative">
                        <div class="relative -mt-20 mb-6 inline-block">
                            <div
                                class="w-32 h-32 md:w-40 md:h-40 rounded-full border-[6px] border-white shadow-lg overflow-hidden relative z-20 bg-slate-200"
                            >
                                <img
                                    :src="developer.avatar"
                                    alt="Developer Avatar"
                                    class="w-full h-full object-cover"
                                />
                            </div>
                            <div
                                class="absolute bottom-2 right-2 z-30 bg-blue-500 text-white p-1.5 rounded-full border-4 border-white shadow-sm"
                                title="Verified Developer"
                            >
                                <svg
                                    class="w-4 h-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="3"
                                        d="M5 13l4 4L19 7"
                                    ></path>
                                </svg>
                            </div>
                        </div>

                        <div
                            class="flex flex-col md:flex-row md:items-start md:justify-between gap-4"
                        >
                            <div>
                                <h1
                                    class="text-3xl font-bold text-slate-900 leading-tight"
                                >
                                    {{ developer.name }}
                                </h1>
                                <p class="text-blue-600 font-medium text-lg">
                                    {{ developer.role }}
                                </p>
                                <div
                                    class="flex items-center text-slate-500 text-sm mt-1"
                                >
                                    <svg
                                        class="w-4 h-4 mr-1"
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
                                    {{ developer.university }}
                                </div>
                            </div>

                            <a
                                :href="developer.socials.email"
                                class="inline-flex items-center justify-center px-6 py-2.5 bg-slate-900 text-white text-sm font-bold rounded-xl hover:bg-blue-600 transition-colors shadow-lg shadow-blue-900/20 active:scale-95"
                            >
                                Hubungi Saya
                                <svg
                                    class="w-4 h-4 ml-2"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
                                    ></path>
                                </svg>
                            </a>
                        </div>

                        <div class="h-px w-full bg-slate-100 my-8"></div>

                        <div class="mb-8">
                            <h3
                                class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-3"
                            >
                                Tentang Pengembang
                            </h3>
                            <p class="text-slate-600 leading-relaxed text-lg">
                                "{{ developer.bio }}"
                            </p>
                        </div>

                        <div class="mb-8">
                            <h3
                                class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-3"
                            >
                                Tech Stack
                            </h3>
                            <div class="flex flex-wrap gap-2">
                                <span
                                    v-for="skill in developer.skills"
                                    :key="skill"
                                    class="px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 text-slate-600 text-sm font-bold hover:bg-blue-50 hover:text-blue-600 hover:border-blue-200 transition-all cursor-default"
                                >
                                    {{ skill }}
                                </span>
                            </div>
                        </div>

                        <div
                            class="flex items-center justify-between pt-6 border-t border-slate-100"
                        >
                            <span class="text-sm font-medium text-slate-400"
                                >Temukan saya di:</span
                            >
                            <div class="flex items-center gap-3">
                                <a
                                    :href="developer.socials.github"
                                    target="_blank"
                                    class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-600 hover:bg-slate-900 hover:text-white transition-all duration-300"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"
                                        />
                                    </svg>
                                </a>
                                <a
                                    :href="developer.socials.linkedin"
                                    target="_blank"
                                    class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-600 hover:bg-[#0077b5] hover:text-white transition-all duration-300"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"
                                        />
                                    </svg>
                                </a>
                                <a
                                    :href="developer.socials.instagram"
                                    target="_blank"
                                    class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-600 hover:bg-pink-600 hover:text-white transition-all duration-300"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"
                                        />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>
