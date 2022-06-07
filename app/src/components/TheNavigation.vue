<template>
  <nav
    id="navigation"
    class="navbar navbar-expand-lg navbar-dark bg-primary"
    v-click-away="hideNavbar"
  >
    <div class="container-fluid">
      <router-link to="/" class="navbar-brand">Ecom-system</router-link>

      <div class="d-flex align-items-center gap-3">
        <button type="button" class="btn bi bi-cart text-light fs-4"></button>

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse" id="navbarNav" ref="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li v-for="item in items" class="nav-item" :key="item.name">
            <router-link
              :to="item.to"
              class="nav-link"
              aria-current="page"
              @click="hideNavbar"
            >
              {{ item.text }}
            </router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import { Collapse } from "bootstrap";
export default {
  name: "TheNavigation",

  data() {
    return {
      items: [
        { text: "Home", to: { name: "Home" } },
        {
          text: "Example product",
          to: { name: "ProductsShow", params: { id: 1 } },
        },
      ],
    };
  },

  methods: {
    hideNavbar() {
      if (this.$store.state.isMobile === false) return;

      const bsCollapse = new Collapse(this.$refs.navbarNav, { toggle: false });
      bsCollapse.hide();
    },
  },
};
</script>
