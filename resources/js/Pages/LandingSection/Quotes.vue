<script setup></script>

<template>
    <section
        class="relative pt-15 pb-32 flex items-center justify-center overflow-hidden bg-slate-50 selection:bg-blue-100 selection:text-blue-900"
    >
        <div
            class="absolute inset-0 opacity-[0.03] pointer-events-none bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"
        ></div>

        <div
            class="absolute top-0 left-1/4 w-96 h-96 bg-blue-400/10 rounded-full blur-[100px] -z-10 animate-pulse"
        ></div>
        <div
            class="absolute bottom-0 right-1/4 w-96 h-96 bg-indigo-400/10 rounded-full blur-[100px] -z-10"
        ></div>

        <div
            class="absolute inset-0 bg-[linear-gradient(to_right,#00000008_1px,transparent_1px),linear-gradient(to_bottom,#00000008_1px,transparent_1px)] bg-[size:32px_32px] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_50%,#000_70%,transparent_100%)]"
        ></div>

        <div class="relative z-10 container mx-auto px-6 max-w-5xl text-center">
            <svg
                class="absolute -top-12 -left-4 md:-top-20 md:-left-20 w-32 h-32 md:w-48 md:h-48 text-slate-900/5 transform -scale-x-100 pointer-events-none"
                fill="currentColor"
                viewBox="0 0 32 32"
                aria-hidden="true"
            >
                <path
                    d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.552-7.104 6.624-9.024L25.864 4z"
                />
            </svg>

            <blockquote class="relative">
                <p
                    class="text-2xl md:text-3xl lg:text-4xl leading-relaxed font-serif text-slate-700 italic font-medium drop-shadow-sm"
                >
                    Kabinet Merajut Asa adalah tentang
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600 font-bold not-italic"
                        >merangkai</span
                    >
                    yang tercerai,
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600 font-bold not-italic"
                        >menyatukan</span
                    >
                    yang berjalan sendiri, dan
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600 font-bold not-italic"
                        >mengubah</span
                    >
                    harapan menjadi kerja bersama. Bukan tentang siapa yang
                    paling lantang, tapi siapa yang paling konsisten
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600 font-bold not-italic"
                        >merajut perubahan</span
                    >."
                </p>

                <div
                    class="w-24 h-1 bg-gradient-to-r from-blue-400 to-indigo-400 mx-auto mt-10 mb-6 rounded-full"
                ></div>

                <footer class="flex flex-col items-center justify-center gap-1">
                    <cite
                        class="not-italic text-xl md:text-2xl font-bold text-slate-900 tracking-wide uppercase"
                    >
                        Sanditya Saputra
                    </cite>
                    <span
                        class="text-sm font-medium text-slate-500 tracking-wider"
                    >
                        Presiden Mahasiswa UNIKOM 2025-2026
                    </span>
                </footer>
            </blockquote>

            <svg
                class="absolute -bottom-12 -right-4 md:-bottom-20 md:-right-20 w-32 h-32 md:w-48 md:h-48 text-slate-900/5 pointer-events-none"
                fill="currentColor"
                viewBox="0 0 32 32"
                aria-hidden="true"
            >
                <path
                    d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.552-7.104 6.624-9.024L25.864 4z"
                />
            </svg>
        </div>
    </section>
</template>
