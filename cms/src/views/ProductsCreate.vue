<template>
  <DataForm table-name="products" v-model="formData" @submit.prevent="createProduct"></DataForm>
</template>
<script>
import DataForm from "../components/DataForm.vue";

export default {
  components: {DataForm},

  data() {
    return {
      product: {},

      formData: {
        name: {
          name: "Nazwa",
          value: '',
          type: "text",
        },
        description: {
          name: "Opis",
          value: '',
          type: "text",
        },
        stock: {
          name: "Stany magazynowe",
          value: 0,
          type: "number",
        },
        basePrice: {
          name: "Cena bazowa",
          value: 0.00,
          type: "number",
        },
        discountPercent: {
          name: "Zniżka",
          value: 0,
          type: "number",
        },
        manufacturer: {
          name: "Productent",
          value: '',
          type: "text",
        },
        specifications: {
          name: "Specyfikacje",
          value: '',
          type: "text",
        },
      },
    };
  },

  methods: {
    createProduct() {
      const product = {};

      for (const [attributeName, attributeData] of Object.entries(this.formData)) {
        product[attributeName] = attributeData.value;
      }

      product.specifications = JSON.stringify(product.specifications.split(', '));
      product.images = JSON.stringify({img: 'temp'});

      this.createProductInApi(product).then((response) => {
        if (response.id) {
          this.$router.push({ name: 'Produkt', params: { id: response.id }});
        }
      });
    },

    async createProductInApi(product) {
      return await this.$api.helpPost("products", product);
    }
  },
};
</script>