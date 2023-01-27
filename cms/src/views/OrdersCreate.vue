<template>
  <DataForm table-name="orders" v-model="formData" @submit.prevent="createOrder"></DataForm>
</template>
<script>
import DataForm from "../components/DataForm.vue";

export default {
  components: {DataForm},

  data() {
    return {
      order: {},

      formData: {
        name: {
          name: "Imię",
          value: '',
          type: "text",
        },
        surname: {
          name: "Nazwisko",
          value: '',
          type: "text",
        },
        email: {
          name: "Adres e-mail",
          value: '',
          type: "email",
        },
        address: {
          name: "Adres",
          value: '',
          type: "text",
        },
        value: {
          name: "Wartość zamówienia",
          value: '',
          type: "number",
        },
        cart: {
          name: "Produkty w zamówieniu",
          value: '',
          type: "text",
        },
      },
    };
  },

  methods: {
    createOrder() {
      const order = {};

      for (const [attributeName, attributeData] of Object.entries(this.formData)) {
        order[attributeName] = attributeData.value;
      }

      order.cart = JSON.stringify(order.cart.split(', '));

      this.createOrderInApi(order).then((response) => {
        if (response.id) {
          this.$router.push({ name: 'Zamówienie', params: { id: response.id }});
        }
      });
    },

    async createOrderInApi(order) {
      return await this.$api.helpPost("orders", order);
    }
  },
};
</script>