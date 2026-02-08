<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { ref, computed } from "vue";

// --- STATE ---
const searchQuery = ref("");
const selectedMonth = ref("all");

// --- MOCK DATA TRANSAKSI ---
const transactions = [
    { id: 1, date: "2024-03-01", desc: "Dana Kemahasiswaan Termin 1", category: "Subsidi Kampus", type: "in", amount: 15000000, proof: "#" },
    { id: 2, date: "2024-03-05", desc: "Sponsorship Bank BNI", category: "Sponsorship", type: "in", amount: 5000000, proof: "#" },
    { id: 3, date: "2024-03-10", desc: "Sewa Venue Liga Futsal", category: "Proker: Olahraga", type: "out", amount: 3500000, proof: "#" },
    { id: 4, date: "2024-03-12", desc: "Konsumsi Rapat Pleno I", category: "Operasional", type: "out", amount: 450000, proof: "#" },
    { id: 5, date: "2024-04-02", desc: "Penjualan Merchandise", category: "Dana Usaha", type: "in", amount: 2100000, proof: "#" },
    { id: 6, date: "2024-04-05", desc: "Cetak Banner Seminar", category: "Publikasi", type: "out", amount: 300000, proof: "#" },
    { id: 7, date: "2024-04-10", desc: "Honor Pemateri Seminar", category: "Proker: Pendidikan", type: "out", amount: 1500000, proof: "#" },
    { id: 8, date: "2024-04-15", desc: "Donasi Bencana Alam", category: "Sosial", type: "in", amount: 3000000, proof: "#" },
    { id: 9, date: "2024-04-16", desc: "Penyaluran Donasi", category: "Sosial", type: "out", amount: 3000000, proof: "#" },
    { id: 10, date: "2024-05-01", desc: "ATK Kesekretariatan", category: "Operasional", type: "out", amount: 250000, proof: "#" },
];

// --- LOGIC: FILTERING & SEARCH ---
const filteredTransactions = computed(() => {
    return transactions.filter(item => {
        // Filter Search
        const matchSearch = item.desc.toLowerCase().includes(searchQuery.value.toLowerCase()) || 
                            item.category.toLowerCase().includes(searchQuery.value.toLowerCase());
        
        // Filter Month
        let matchMonth = true;
        if (selectedMonth.value !== 'all') {
            const itemMonth = new Date(item.date).getMonth() + 1; // 0-11 to 1-12
            matchMonth = itemMonth === parseInt(selectedMonth.value);
        }

        return matchSearch && matchMonth;
    }).sort((a, b) => new Date(b.date) - new Date(a.date)); // Sort terbaru
});

// --- LOGIC: DYNAMIC SUMMARY (Menghitung berdasarkan hasil filter) ---
const summary = computed(() => {
    let income = 0;
    let expense = 0;

    filteredTransactions.value.forEach(t => {
        if (t.type === 'in') income += t.amount;
        if (t.type === 'out') expense += t.amount;
    });

    return {
        income,
        expense,
        balance: income - expense
    };
});

// --- LOGIC: CHART PERCENTAGE ---
const chartData = computed(() => {
    const total = summary.value.income; // Basis persentase adalah total pemasukan
    if (total === 0) return { income: 0, expense: 0 };
    return {
        expense: Math.min(Math.round((summary.value.expense / total) * 100), 100),
        balance: Math.max(0, 100 - Math.round((summary.value.expense / total) * 100))
    };
});

// --- HELPER: FORMATTER ---
const formatRp = (num) => {
    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(num);
};

const formatDate = (dateString) => {
    const options = { day: 'numeric', month: 'short', year: 'numeric' };
    return new Date(dateString).toLocaleDateString('id-ID', options);
};

// Ambil list bulan unik dari data untuk dropdown
const availableMonths = computed(() => {
    const months = new Set();
    transactions.forEach(t => {
        const d = new Date(t.date);
        months.add(d.getMonth() + 1);
    });
    return Array.from(months).sort((a, b) => a - b);
});

const getMonthName = (monthIndex) => {
    const date = new Date();
    date.setMonth(monthIndex - 1);
    return date.toLocaleString('id-ID', { month: 'long' });
};
</script>

<template>
    <Head title="Transparansi Dana" />

    <MainLayout>
        <div class="min-h-screen bg-slate-50 pt-32 pb-24 relative">
            
            <div class="absolute inset-0 opacity-[0.03] pointer-events-none bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"></div>

            <div class="container mx-auto px-4 max-w-6xl relative z-10">

                <div class="text-center mb-12">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-emerald-100 bg-white shadow-sm mb-4">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Laporan Keuangan Terbuka</span>
                    </div>
                    <h1 class="text-3xl md:text-5xl font-bold text-slate-900 mb-4">
                        Transparansi Anggaran
                    </h1>
                    <p class="text-slate-500 text-lg max-w-2xl mx-auto">
                        Akses data keuangan organisasi secara real-time sebagai bentuk komitmen kami terhadap akuntabilitas dan integritas.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm relative overflow-hidden group">
                        <div class="absolute top-0 right-0 p-4 opacity-10">
                            <svg class="w-16 h-16 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        </div>
                        <p class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-1">Total Pemasukan</p>
                        <h3 class="text-3xl font-bold text-emerald-600 mb-2">{{ formatRp(summary.income) }}</h3>
                        <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-emerald-500 w-full"></div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm relative overflow-hidden group">
                        <div class="absolute top-0 right-0 p-4 opacity-10">
                            <svg class="w-16 h-16 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path></svg>
                        </div>
                        <p class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-1">Total Pengeluaran</p>
                        <h3 class="text-3xl font-bold text-rose-600 mb-2">{{ formatRp(summary.expense) }}</h3>
                        <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-rose-500 transition-all duration-500" :style="`width: ${chartData.expense}%`"></div>
                        </div>
                        <p class="text-xs text-rose-500 mt-2 font-bold">{{ chartData.expense }}% dari anggaran terpakai</p>
                    </div>

                    <div class="bg-gradient-to-br from-slate-800 to-slate-900 p-6 rounded-2xl text-white shadow-xl relative overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-32 h-32 bg-white opacity-5 rounded-full blur-2xl"></div>
                        <p class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-1">Sisa Saldo Kas</p>
                        <h3 class="text-3xl font-bold mb-2">{{ formatRp(summary.balance) }}</h3>
                        <p class="text-xs text-slate-400 mt-2">*Berdasarkan filter yang aktif</p>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6 bg-white p-4 rounded-2xl border border-slate-200 shadow-sm">
                    
                    <div class="flex flex-col md:flex-row gap-3 w-full md:w-auto">
                        <div class="relative">
                            <input 
                                v-model="searchQuery"
                                type="text" 
                                placeholder="Cari transaksi..." 
                                class="pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none text-sm font-semibold text-slate-700 w-full md:w-64"
                            >
                            <svg class="w-4 h-4 text-slate-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>

                        <div class="relative">
                            <select 
                                v-model="selectedMonth"
                                class="pl-4 pr-10 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none text-sm font-semibold text-slate-700 appearance-none cursor-pointer w-full md:w-48"
                            >
                                <option value="all">Semua Bulan</option>
                                <option v-for="m in availableMonths" :key="m" :value="m">
                                    {{ getMonthName(m) }}
                                </option>
                            </select>
                            <svg class="w-4 h-4 text-slate-500 absolute right-3 top-3 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>

                    <button class="w-full md:w-auto px-6 py-2.5 bg-blue-600 text-white text-sm font-bold rounded-xl hover:bg-blue-700 transition-colors flex items-center justify-center gap-2 shadow-lg shadow-blue-600/20">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Download Laporan
                    </button>
                </div>

                <div class="bg-white rounded-[1.5rem] border border-slate-200 shadow-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50 border-b border-slate-200">
                                    <th class="p-5 text-xs font-bold text-slate-500 uppercase tracking-wider">Tanggal</th>
                                    <th class="p-5 text-xs font-bold text-slate-500 uppercase tracking-wider w-1/3">Keterangan</th>
                                    <th class="p-5 text-xs font-bold text-slate-500 uppercase tracking-wider">Kategori</th>
                                    <th class="p-5 text-xs font-bold text-slate-500 uppercase tracking-wider text-center">Jenis</th>
                                    <th class="p-5 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Nominal</th>
                                    <th class="p-5 text-xs font-bold text-slate-500 uppercase tracking-wider text-center">Bukti</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <tr v-for="item in filteredTransactions" :key="item.id" class="hover:bg-blue-50/50 transition-colors">
                                    <td class="p-5 text-sm font-medium text-slate-600 whitespace-nowrap">
                                        {{ formatDate(item.date) }}
                                    </td>
                                    <td class="p-5">
                                        <p class="text-sm font-bold text-slate-800">{{ item.desc }}</p>
                                    </td>
                                    <td class="p-5">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-slate-100 text-slate-500 border border-slate-200">
                                            {{ item.category }}
                                        </span>
                                    </td>
                                    <td class="p-5 text-center">
                                        <span 
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wide"
                                            :class="item.type === 'in' ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700'"
                                        >
                                            {{ item.type === 'in' ? 'Pemasukan' : 'Pengeluaran' }}
                                        </span>
                                    </td>
                                    <td 
                                        class="p-5 text-right text-sm font-bold font-mono"
                                        :class="item.type === 'in' ? 'text-emerald-600' : 'text-rose-600'"
                                    >
                                        {{ item.type === 'in' ? '+' : '-' }} {{ formatRp(item.amount) }}
                                    </td>
                                    <td class="p-5 text-center">
                                        <a href="#" class="text-slate-400 hover:text-blue-600 transition-colors" title="Lihat Bukti">
                                            <svg class="w-5 h-5 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                                        </a>
                                    </td>
                                </tr>
                                
                                <tr v-if="filteredTransactions.length === 0">
                                    <td colspan="6" class="p-12 text-center">
                                        <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-300">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        </div>
                                        <h3 class="text-lg font-bold text-slate-700">Data Tidak Ditemukan</h3>
                                        <p class="text-slate-500 text-sm mt-1">Coba ubah filter bulan atau kata kunci pencarian.</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-8 text-center text-xs text-slate-400">
                    <p>Laporan ini diperbarui secara berkala setiap tanggal 1 dan 15 setiap bulannya.</p>
                    <p>BEM UNIKOM © 2024</p>
                </div>

            </div>
        </div>
    </MainLayout>
</template>