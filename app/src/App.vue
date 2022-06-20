<template>
  <div class="modals">
    <app-cart-modal></app-cart-modal>
  </div>

  <div class="app-container">
    <header>
      <the-navigation></the-navigation>
    </header>

    <main class="col-lg-9 mx-auto mt-lg-4 mb-3">
      <router-view />
    </main>

    <the-footer></the-footer>
  </div>
</template>

<script>
import TheNavigation from "@/components/TheNavigation";
import TheFooter from "@/components/TheFooter";
import AppCartModal from "@/components/AppCartModal";
import detectMobileMixin from "@/mixins/detectMobile";
export default {
  name: "App",

  components: {
    TheFooter,
    TheNavigation,
    AppCartModal,
  },

  mixins: [detectMobileMixin],
};
</script>

<style lang="scss">
.price-tag {
  &:after {
    content: " PLN";
  }
}

.discount-tag {
  &:before {
    content: "-";
  }
  &:after {
    content: "%";
  }
}
</style>
