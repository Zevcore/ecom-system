<template>
  <div class="min-h-full">
    <Navigation></Navigation>

    <main>
      <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <RouterView></RouterView>
      </div>
    </main>
  </div>
</template>

<script setup>
import Navigation from "./components/Navigation.vue";
</script>
