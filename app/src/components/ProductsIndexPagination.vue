<template>
  <nav aria-label="Listing pagination buttons">
    <ul class="pagination justify-content-center">
      <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
          Previous
        </a>
      </li>
      <li
        class="page-item"
        :class="{ active: isPageNumber(1) }"
        @click="$emit('changePageClick', 1)"
      >
        <a class="page-link" href="#">1</a>
      </li>
      <li
        class="page-item"
        :class="{ active: isPageNumber(2) }"
        @click="$emit('changePageClick', 2)"
      >
        <a class="page-link" href="#">2</a>
      </li>
      <li
        class="page-item"
        :class="{ active: isPageNumber(3) }"
        @click="$emit('changePageClick', 3)"
      >
        <a class="page-link" href="#">3</a>
      </li>
      <li class="page-item" @click="$emit('changePageClick')">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: "ProductsIndexPagination",

  props: {
    currentPage: {
      required: true,
      type: Number,
    },
  },

  emits: ["changePageClick"],

  methods: {
    isPageNumber(number) {
      return this.currentPage === number;
    },
  },
};
</script>
