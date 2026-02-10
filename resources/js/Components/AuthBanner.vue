<template>
    <div class="hidden lg:flex lg:w-1/2 relative bg-slate-900 items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
        
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-blue-600 rounded-full blur-[120px] opacity-40 animate-pulse"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-purple-600 rounded-full blur-[120px] opacity-40 animate-pulse" style="animation-delay: 2s"></div>

        <div class="relative z-10 p-12 text-center text-white max-w-lg">
            <div class="w-24 h-24 bg-white/10 backdrop-blur-md rounded-3xl flex items-center justify-center mx-auto mb-8 border border-white/20 shadow-2xl transform hover:scale-105 transition-transform duration-500">
                <span class="text-5xl">🦅</span> </div>
            <h2 class="text-4xl font-bold mb-6 tracking-tight">BEM UNIKOM</h2>
            <h3 class="text-xl font-medium text-blue-200 mb-6">Sistem Informasi Terintegrasi</h3>
            <p class="text-slate-400 text-lg leading-relaxed">
                Satu pintu untuk pengelolaan program kerja, administrasi surat, dan transparansi organisasi.
            </p>
            
            <div class="mt-12 pt-8 border-t border-white/10">
                <p class="italic text-slate-300 font-serif">"Kabinet Merajut Asa"</p>
            </div>
        </div>
    </div>
</template>