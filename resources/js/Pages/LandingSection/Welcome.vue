<template>
    <section
        class="relative min-h-[90vh] pt-32 pb-32 flex flex-col justify-center items-center overflow-hidden selection:bg-blue-600 selection:text-white z-10 md:pt-55"
    >
        <div
            class="absolute inset-0 -z-20 h-full w-full bg-[linear-gradient(to_right,#8080800a_1px,transparent_1px),linear-gradient(to_bottom,#8080800a_1px,transparent_1px)] bg-size-[24px_24px] mask-[radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)]"
        ></div>
        <div
            class="absolute inset-0 -z-10 opacity-[0.03] pointer-events-none bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"
        ></div>
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 -z-10 w-200 h-200 border border-slate-100/50 rounded-full opacity-50"
        ></div>
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 -z-10 w-150 h-150 border border-slate-100/50 rounded-full opacity-60"
        ></div>
        <!-- <div
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 -z-10 w-100 h-100 border border-slate-200/60 rounded-full opacity-70"
            ></div> -->
        <div
            class="absolute -top-24 -left-24 w-96 h-96 bg-blue-400/20 rounded-full blur-[128px] -z-10"
        ></div>
        <div
            class="absolute top-1/4 right-0 w-80 h-80 bg-indigo-500/20 rounded-full blur-[100px] -z-10 animate-pulse"
        ></div>

        <img
            src="/img/logo_kabinet.png"
            alt="Logo Kabinet Background"
            class="absolute top-[30%] md:top-[60%] left-[50%] -translate-x-1/2 -translate-y-1/2 opacity-5 w-100 sm:w-125 md:w-150 lg:w-250 z-0 pointer-events-none mix-blend-multiply"
        />

        <div class="w-full max-w-5xl mx-auto px-4 text-center relative z-10">
            <div
                class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-blue-100/80 bg-white/70 backdrop-blur-md shadow-sm mb-8 hover:shadow-md hover:scale-105 transition-all cursor-default"
            >
                <span class="flex h-2.5 w-2.5 relative">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-500 opacity-75"
                    ></span>
                    <span
                        class="relative inline-flex rounded-full h-2.5 w-2.5 bg-blue-600 shadow-[0_0_10px_rgba(37,99,235,0.5)]"
                    ></span>
                </span>
                <span
                    class="text-xs md:text-sm font-semibold text-slate-600 tracking-wider uppercase"
                >
                    Official Website BEM UNIKOM
                </span>
            </div>

            <h1
                class="text-5xl md:text-7xl lg:text-8xl font-semibold text-[#0f172a] tracking-tighter leading-[1.1] mb-6 drop-shadow-sm"
            >
                Kabinet <br class="md:hidden" />
                <span
                    style="font-family: 'Dancing Script', cursive"
                    class="text-transparent bg-clip-text bg-linear-to-r from-blue-700 via-indigo-600 to-blue-800 drop-shadow-sm pb-2 font-bold"
                >
                    Merajut Asa
                </span>
            </h1>

            <p
                class="mt-4 text-lg md:text-xl text-slate-500 max-w-2xl mx-auto leading-relaxed mb-10 font-medium"
            >
                "Setiap simpul adalah usaha, setiap benang adalah peran. Tidak
                ada peran yang terlalu kecil, karena satu benang pun menentukan
                bentuk akhir"
                <br class="hidden md:block" />
                <span
                    class="text-sm md:text-base text-slate-400 mt-2 block italic"
                    >Dirajut Bersama, Digerakkan Bersama.</span
                >
            </p>

            <div
                class="flex flex-col sm:flex-row items-center justify-center gap-5 mb-12"
            >
                <a
                    href="#"
                    class="group w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 text-[15px] font-semibold text-white transition-all duration-300 bg-linear-to-b from-[#14274f] to-[#14274f] border-t border-[#3b5998] shadow-[inset_0_1px_0_rgba(255,255,255,0.2),0_10px_20px_-5px_rgba(20,39,79,0.4)] hover:from-gray-800 hover:to-black hover:border-gray-600 hover:shadow-[inset_0_1px_0_rgba(255,255,255,0.2),0_15px_30px_-5px_rgba(0,0,0,0.5)] hover:-translate-y-1 rounded-full active:scale-95 active:translate-y-0 active:shadow-none"
                >
                    Program Kami
                    <svg
                        class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6"
                        ></path>
                    </svg>
                </a>
                <a
                    href="#"
                    class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 text-[15px] font-semibold text-slate-600 transition-all duration-200 bg-white rounded-full border border-slate-200 border-b-slate-300 shadow-sm hover:bg-slate-50 hover:text-black hover:border-slate-300 hover:shadow-md active:scale-[0.98] active:border-b-slate-200"
                >
                    Tentang Kami
                </a>
            </div>
        </div>

        <div
            class="absolute bottom-0 left-0 right-0 h-48 bg-linear-to-b from-transparent via-slate-50/30 to-slate-50 z-0 pointer-events-none"
        ></div>

        <div
            class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-50 hover:opacity-100 transition-all duration-300 cursor-pointer animate-bounce z-20"
        >
            <span
                class="text-[10px] md:text-xs font-medium uppercase tracking-[0.2em] text-slate-500"
                >Scroll Down</span
            >
            <div
                class="w-px h-12 bg-linear-to-b from-slate-400 via-slate-300 to-slate-50/20"
            ></div>
        </div>
    </section>
</template>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap");
</style>
