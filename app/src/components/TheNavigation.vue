<template>
  <nav
    id="navigation"
    class="navbar navbar-expand-lg navbar-dark bg-primary px-3 d-flex"
    v-click-away="hideNavbar"
  >
    <router-link to="/" class="navbar-brand order-first">
      {{ $appName }}
    </router-link>

    <div id="navbarToggle" class="d-flex align-items-center gap-3 order-2">
      <button
        class="navbar-toggler ms-3"
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

    <button
      type="button"
      class="btn bi bi-cart text-light fs-4 order-lg-last ms-auto position-relative"
    >
      <span
        class="position-absolute top-0 mt-1 ms-3 start-50 translate-middle badge rounded-pill bg-danger fs-6 py-1 px-2"
      >
        {{ cartProductsCount }}
        <span class="visually-hidden">amount of products in cart</span>
      </span>
    </button>

    <div
      class="collapse navbar-collapse order-last order-lg-2"
      id="navbarNav"
      ref="navbarNav"
    >
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
  </nav>
</template>

<script>
import { Collapse } from "bootstrap";
import { mapGetters } from "vuex";
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

  computed: {
    ...mapGetters(["cartProductsCount"]),
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
