<template>
  <div class="d-grid mb-2">
    <button
      class="btn btn-primary btn-sm"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#productPropertiesList"
      aria-expanded="false"
      aria-controls="productPropertiesList"
    >
      Properties
    </button>
  </div>
  <div class="collapse mb-3" id="productPropertiesList">
    <ul class="list-group">
      <li
        v-for="(spec, index) in specifications"
        :key="index"
        class="list-group-item"
      >
        {{ spec }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "ProductsShowSpecifications",

  props: {
    specifications: {
      required: true,
      type: Object,
    },
  },
};
</script>
