<template>
  <div
    id="productImageCarousel"
    class="carousel slide"
    data-bs-ride="carousel"
    :data-bs-interval="autoplayInterval"
    :data-bs-wrap="loopInfinitely"
  >
    <div class="carousel-indicators">
      <button
        v-for="(item, index) in images"
        :key="item.id"
        type="button"
        data-bs-target="#productImageCarousel"
        :data-bs-slide-to="index"
        :class="{ active: item.active }"
        :aria-current="{ true: item.active }"
        :aria-label="'Slide ' + item.id"
      ></button>
    </div>

    <div class="carousel-inner">
      <div
        v-for="item in images"
        :key="item.id"
        class="carousel-item"
        :class="{ active: item.active }"
      >
        <img :src="item.src" :alt="item.alt" class="d-block w-100" />
      </div>
    </div>

    <button
      class="carousel-control-prev"
      type="button"
      data-bs-target="#productImageCarousel"
      data-bs-slide="prev"
    >
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button
      class="carousel-control-next"
      type="button"
      data-bs-target="#productImageCarousel"
      data-bs-slide="next"
    >
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</template>

<script>
export default {
  name: "ProductsShowCarousel",

  props: {
    images: {
      required: true,
      type: Object,
    },
  },

  data() {
    return {
      autoplayInterval: false,
      loopInfinitely: true,
    };
  },
};
</script>
