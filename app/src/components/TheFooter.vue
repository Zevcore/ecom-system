<template>
  <footer class="py-3 mt-4 bg-light">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li v-for="item in items" class="nav-item" :key="item.name">
        <router-link :to="item.to" class="nav-link px-2 text-muted">
          {{ item.text }}
        </router-link>
      </li>
    </ul>

    <p class="text-center text-muted">© 2022 {{ $appName }}</p>
  </footer>
</template>

<script>
export default {
  name: "TheFooter",

  data() {
    return {
      items: [
        { text: "Home", to: { name: "Home" } },
        {
          text: "Listing",
          to: { name: "ProductsIndex" },
        },
        {
          text: "Cart",
          to: { name: "Cart" },
        },
      ],
    };
  },
};
</script>
