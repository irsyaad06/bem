<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head } from "@inertiajs/vue3";
import Welcome from "./LandingSection/Welcome.vue";
import Sambutan from "./LandingSection/Sambutan.vue";
import VisiMisi from "./LandingSection/VisiMisi.vue";
import Quotes from "./LandingSection/Quotes.vue";
</script>

<template>
    <Head title="Beranda" />
    <MainLayout>
        <Welcome />
        <Sambutan />
        <VisiMisi />
        <Quotes />
    </MainLayout>
</template>
