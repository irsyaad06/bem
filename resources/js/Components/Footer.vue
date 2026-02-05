<script setup>
// Script setup kosong, atau bisa diisi import Link dari inertia jika perlu navigasi SPA
// import { Link } from '@inertiajs/vue3';
</script>

<template>
    <footer
        class="relative bg-slate-900 pt-20 pb-10 overflow-hidden text-slate-300 border-t border-slate-800"
    >
        <div
            class="absolute inset-0 bg-gradient-to-br from-slate-900 via-[#14274f] to-slate-900 opacity-90"
        ></div>

        <div
            class="absolute inset-0 opacity-[0.05] pointer-events-none bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"
        ></div>

        <div
            class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-600/10 rounded-full blur-[128px] -z-10"
        ></div>
        <div
            class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-indigo-600/10 rounded-full blur-[128px] -z-10"
        ></div>

        <div
            class="absolute inset-0 bg-[linear-gradient(to_right,#ffffff05_1px,transparent_1px),linear-gradient(to_bottom,#ffffff05_1px,transparent_1px)] bg-[size:32px_32px] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)] pointer-events-none"
        ></div>

        <div class="container mx-auto px-4 relative z-10 max-w-6xl">
            <div
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-8 mb-16"
            >
                <div class="lg:col-span-5">
                    <div class="flex items-center gap-4 mb-6">
                        <div
                            class="w-12 h-12 bg-white rounded-full flex items-center justify-center p-1 shadow-lg shadow-blue-900/20 hover:scale-110 transition-transform duration-300"
                        >
                            <img
                                src="https://upload.wikimedia.org/wikipedia/id/archive/8/88/20211116084654%21Logo_Unikom.png"
                                alt="Logo UNIKOM"
                                class="w-full h-full object-contain"
                            />
                        </div>

                        <div
                            class="w-12 h-12 bg-white rounded-full flex items-center justify-center p-1 shadow-lg shadow-blue-900/20 hover:scale-110 transition-transform duration-300"
                        >
                            <img
                                src="/img/logo_bem.png"
                                onerror="
                                    this.src =
                                        'https://via.placeholder.com/50?text=BEM'
                                "
                                alt="Logo BEM"
                                class="w-full h-full object-contain"
                            />
                        </div>

                        <div
                            class="w-12 h-12 bg-white rounded-full flex items-center justify-center p-1 shadow-lg shadow-blue-900/20 hover:scale-110 transition-transform duration-300"
                        >
                            <img
                                src="/img/logo_kabinet.png"
                                onerror="
                                    this.src =
                                        'https://via.placeholder.com/50?text=KBN'
                                "
                                alt="Logo Kabinet"
                                class="w-full h-full object-contain"
                            />
                        </div>
                    </div>

                    <h2
                        class="text-2xl font-bold text-white mb-4 tracking-tight"
                    >
                        BEM UNIKOM
                    </h2>
                    <p class="text-slate-400 leading-relaxed mb-6 pr-4">
                        Kabinet
                        <span class="text-blue-400 font-semibold"
                            >Merajut Asa</span
                        >. Wadah aspirasi dan kreasi mahasiswa Universitas
                        Komputer Indonesia. Bergerak bersama mewujudkan
                        kebermanfaatan nyata.
                    </p>

                    <div class="flex items-start gap-3 text-slate-400 text-sm">
                        <svg
                            class="w-5 h-5 mt-0.5 text-blue-500 flex-shrink-0"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                            ></path>
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                            ></path>
                        </svg>
                        <span>
                            Jl. Dipati Ukur No.112-116, Lebakgede,<br />
                            Kecamatan Coblong, Kota Bandung,<br />
                            Jawa Barat 40132
                        </span>
                    </div>
                </div>

                <div class="lg:col-span-3 lg:pl-8">
                    <h3
                        class="text-white font-bold text-lg mb-6 relative inline-block"
                    >
                        Jelajahi
                        <span
                            class="absolute -bottom-2 left-0 w-1/2 h-1 bg-blue-500 rounded-full"
                        ></span>
                    </h3>
                    <ul class="space-y-4">
                        <li>
                            <a
                                href="#"
                                class="group flex items-center gap-2 hover:text-white transition-colors duration-200"
                            >
                                <span
                                    class="w-1.5 h-1.5 rounded-full bg-slate-600 group-hover:bg-blue-400 transition-colors"
                                ></span>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a
                                href="#"
                                class="group flex items-center gap-2 hover:text-white transition-colors duration-200"
                            >
                                <span
                                    class="w-1.5 h-1.5 rounded-full bg-slate-600 group-hover:bg-blue-400 transition-colors"
                                ></span>
                                Tentang Kami
                            </a>
                        </li>
                        <li>
                            <a
                                href="#"
                                class="group flex items-center gap-2 hover:text-white transition-colors duration-200"
                            >
                                <span
                                    class="w-1.5 h-1.5 rounded-full bg-slate-600 group-hover:bg-blue-400 transition-colors"
                                ></span>
                                Program Kerja
                            </a>
                        </li>
                        <li>
                            <a
                                href="#"
                                class="group flex items-center gap-2 hover:text-white transition-colors duration-200"
                            >
                                <span
                                    class="w-1.5 h-1.5 rounded-full bg-slate-600 group-hover:bg-blue-400 transition-colors"
                                ></span>
                                Berita & Artikel
                            </a>
                        </li>
                        <li>
                            <a
                                href="#"
                                class="group flex items-center gap-2 hover:text-white transition-colors duration-200"
                            >
                                <span
                                    class="w-1.5 h-1.5 rounded-full bg-slate-600 group-hover:bg-blue-400 transition-colors"
                                ></span>
                                Layanan Mahasiswa
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="lg:col-span-4">
                    <h3
                        class="text-white font-bold text-lg mb-6 relative inline-block"
                    >
                        Hubungi Kami
                        <span
                            class="absolute -bottom-2 left-0 w-1/2 h-1 bg-blue-500 rounded-full"
                        ></span>
                    </h3>

                    <div class="space-y-4 mb-8">
                        <a
                            href="mailto:bem@email.unikom.ac.id"
                            class="flex items-center gap-3 p-3 rounded-lg bg-slate-800/50 border border-slate-700/50 hover:bg-slate-800 hover:border-blue-500/50 transition-all group"
                        >
                            <div
                                class="w-10 h-10 rounded-full bg-blue-500/10 flex items-center justify-center text-blue-400 group-hover:bg-blue-500 group-hover:text-white transition-colors"
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
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                    ></path>
                                </svg>
                            </div>
                            <div>
                                <p
                                    class="text-xs text-slate-500 font-semibold uppercase"
                                >
                                    Email
                                </p>
                                <p
                                    class="text-sm text-slate-300 group-hover:text-white"
                                >
                                    bem@email.unikom.ac.id
                                </p>
                            </div>
                        </a>

                        <a
                            href="https://wa.me/6281234567890"
                            target="_blank"
                            class="flex items-center gap-3 p-3 rounded-lg bg-slate-800/50 border border-slate-700/50 hover:bg-slate-800 hover:border-green-500/50 transition-all group"
                        >
                            <div
                                class="w-10 h-10 rounded-full bg-green-500/10 flex items-center justify-center text-green-400 group-hover:bg-green-500 group-hover:text-white transition-colors"
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
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                                    ></path>
                                </svg>
                            </div>
                            <div>
                                <p
                                    class="text-xs text-slate-500 font-semibold uppercase"
                                >
                                    WhatsApp (Hotline)
                                </p>
                                <p
                                    class="text-sm text-slate-300 group-hover:text-white"
                                >
                                    +62 812-3456-7890
                                </p>
                            </div>
                        </a>
                    </div>

                    <p class="text-sm text-slate-400 mb-4">
                        Temukan kami di sosial media:
                    </p>
                    <div class="flex gap-3">
                        <a
                            href="#"
                            class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-gradient-to-br hover:from-purple-500 hover:to-pink-500 hover:text-white transition-all duration-300 hover:-translate-y-1"
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
                        <a
                            href="#"
                            class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-black hover:text-white transition-all duration-300 hover:-translate-y-1 border border-transparent hover:border-slate-700"
                        >
                            <svg
                                class="w-5 h-5"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"
                                />
                            </svg>
                        </a>
                        <a
                            href="#"
                            class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-red-600 hover:text-white transition-all duration-300 hover:-translate-y-1"
                        >
                            <svg
                                class="w-5 h-5"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"
                                />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div
                class="pt-8 border-t border-slate-800 flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-slate-500"
            >
                <p class="text-center md:text-left">
                    &copy; 2026
                    <span class="text-blue-400 font-semibold">BEM UNIKOM</span>.
                    All Rights Reserved.
                </p>
                <div class="flex items-center gap-6">
                    <a href="#" class="hover:text-blue-400 transition-colors"
                        >Privacy Policy</a
                    >
                    <a href="#" class="hover:text-blue-400 transition-colors"
                        >Terms of Service</a
                    >
                </div>
            </div>
        </div>
    </footer>
</template>
