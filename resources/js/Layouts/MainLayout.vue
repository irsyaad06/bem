<script setup>
import Navbar from '@/Components/Navbar.vue';
import Footer from '@/Components/Footer.vue';
</script>

<template>
  <div class="min-h-screen flex flex-col bg-[#fafafa] dark:bg-gray-900">
    <Navbar />

    <main class="flex-grow">
      <slot />
    </main>

    <Footer />
  </div>
</template>

<style scoped>
/* CSS khusus layout jika diperlukan */
</style>