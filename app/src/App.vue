<template>
  <div class="app-container mb-3">
    <the-navigation></the-navigation>
    <router-view />
  </div>
</template>

<script>
import TheNavigation from "@/components/TheNavigation";
import detectMobileMixin from "@/mixins/detectMobile";
export default {
  name: "App",

  components: {
    TheNavigation,
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
