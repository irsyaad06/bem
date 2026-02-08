<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    email: "",
    subject: "",
    message: "",
});

const submit = () => {
    // Simulasi submit
    console.log(form.data());
    alert("Pesan berhasil dikirim! (Simulasi)");
    form.reset();
};
</script>

<template>
    <Head title="Hubungi Kami" />

    <MainLayout>
        <section
            class="relative min-h-screen pt-24 pb-12 flex items-center justify-center overflow-hidden bg-slate-50 selection:bg-blue-600 selection:text-white"
        >
            <div
                class="absolute inset-0 opacity-[0.03] pointer-events-none bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"
            ></div>
            <div
                class="absolute inset-0 bg-[linear-gradient(to_right,#8080800a_1px,transparent_1px),linear-gradient(to_bottom,#8080800a_1px,transparent_1px)] bg-[size:24px_24px] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)]"
            ></div>

            <div
                class="absolute top-1/4 left-0 w-96 h-96 bg-blue-400/10 rounded-full blur-[100px] -z-10 animate-pulse"
            ></div>
            <div
                class="absolute bottom-0 right-0 w-96 h-96 bg-indigo-500/10 rounded-full blur-[100px] -z-10"
            ></div>

            <div class="container mx-auto px-4 relative z-10 max-w-5xl">
                <div
                    class="bg-white/60 backdrop-blur-2xl rounded-[2.5rem] shadow-2xl border border-white/50 overflow-hidden"
                >
                    <div class="grid lg:grid-cols-2">
                        <div
                            class="relative bg-gradient-to-br from-[#14274f] to-[#0f1d3a] p-10 md:p-12 text-white flex flex-col justify-between overflow-hidden"
                        >
                            <div
                                class="absolute top-0 right-0 w-64 h-64 bg-blue-500/20 rounded-full blur-[80px] -translate-y-1/2 translate-x-1/2"
                            ></div>
                            <div
                                class="absolute bottom-0 left-0 w-64 h-64 bg-indigo-500/20 rounded-full blur-[80px] translate-y-1/2 -translate-x-1/2"
                            ></div>

                            <div class="relative z-10">
                                <h4
                                    class="text-blue-300 font-bold uppercase tracking-widest text-xs mb-2"
                                >
                                    Get in Touch
                                </h4>
                                <h1
                                    class="text-4xl md:text-5xl font-bold mb-6 leading-tight"
                                >
                                    Mari Terhubung <br />Bersama Kami.
                                </h1>
                                <p
                                    class="text-slate-300 text-lg leading-relaxed mb-10"
                                >
                                    Punya pertanyaan, tawaran kerjasama, atau
                                    sekadar ingin menyapa? Kami siap mendengar
                                    dari Anda.
                                </p>

                                <div class="space-y-6">
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
                            </div>

                            <div class="relative z-10 mt-12">
                                <p class="text-slate-400 text-sm mb-4">
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
                            class="p-8 md:p-12 bg-white flex flex-col justify-center"
                        >
                            <form @submit.prevent="submit" class="space-y-5">
                                <h3
                                    class="text-2xl font-bold text-slate-800 mb-2"
                                >
                                    Kirim Pesan
                                </h3>

                                <div class="grid md:grid-cols-2 gap-5">
                                    <div class="space-y-2">
                                        <label
                                            class="text-sm font-semibold text-slate-600"
                                            >Nama Lengkap</label
                                        >
                                        <input
                                            v-model="form.name"
                                            type="text"
                                            placeholder="Nama Anda"
                                            class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all"
                                        />
                                    </div>
                                    <div class="space-y-2">
                                        <label
                                            class="text-sm font-semibold text-slate-600"
                                            >Email</label
                                        >
                                        <input
                                            v-model="form.email"
                                            type="email"
                                            placeholder="email@contoh.com"
                                            class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all"
                                        />
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label
                                        class="text-sm font-semibold text-slate-600"
                                        >Subjek</label
                                    >
                                    <select
                                        v-model="form.subject"
                                        class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all cursor-pointer"
                                    >
                                        <option value="" disabled selected>
                                            Pilih Subjek Pesan
                                        </option>
                                        <option>Undangan Kegiatan</option>
                                        <option>Penawaran Kerjasama</option>
                                        <option>Pertanyaan Umum</option>
                                        <option>Lainnya</option>
                                    </select>
                                </div>

                                <div class="space-y-2">
                                    <label
                                        class="text-sm font-semibold text-slate-600"
                                        >Pesan</label
                                    >
                                    <textarea
                                        v-model="form.message"
                                        rows="4"
                                        placeholder="Tuliskan pesan Anda di sini..."
                                        class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all resize-none"
                                    ></textarea>
                                </div>

                                <button
                                    type="submit"
                                    class="w-full py-4 px-6 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold text-lg shadow-lg hover:shadow-blue-500/30 hover:-translate-y-1 transition-all duration-300 active:scale-95"
                                >
                                    Kirim Sekarang
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </MainLayout>
</template>
