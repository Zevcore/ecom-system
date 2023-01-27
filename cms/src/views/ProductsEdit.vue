<template>
  <DataForm table-name="products" v-model="formData" @submit.prevent="updateProduct"></DataForm>
</template>
<script>
import DataForm from "../components/DataForm.vue";

export default {
  components: {DataForm},

  beforeMount() {
    this.getProductFromApi(this.$route.params.id).then(this.prepareFormData);
  },

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
          value: '',
          type: "number",
        },
        discountPercent: {
          name: "Zniżka",
          value: '',
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
    async getProductFromApi(id) {
      this.product = await this.$api.helpGet("products/" + id);
    },

    prepareFormData() {
      this.formData.name.value = this.product.name;
      this.formData.description.value = this.product.description;
      this.formData.stock.value = this.product.stock;
      this.formData.basePrice.value = this.product.basePrice;
      this.formData.discountPercent.value = this.product.discountPercent;
      this.formData.manufacturer.value = this.product.manufacturer;
      this.formData.specifications.value = JSON.parse(this.product.specifications).join(', ');
    },

    updateProduct() {
      const product = {};

      for (const [attributeName, attributeData] of Object.entries(this.formData)) {
        product[attributeName] = attributeData.value;
      }

      product.specifications = JSON.stringify(product.specifications.split(', '));
      product.images = JSON.stringify({img: 'temp'});

      this.updateProductInApi(product).then((response) => {
        if (response.id) {
          this.$router.push({ name: 'Produkt', params: { id: response.id }});
        }
      });
    },

    async updateProductInApi(product) {
      return await this.$api.helpPatch("products/" + this.$route.params.id, product);
    }
  },
};
</script>