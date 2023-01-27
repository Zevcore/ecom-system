<template>
  <DataForm table-name="orders" v-model="formData" @submit.prevent="updateOrder"></DataForm>
</template>
<script>
import DataForm from "../components/DataForm.vue";

export default {
  components: {DataForm},

  beforeMount() {
    this.getOrderFromApi(this.$route.params.id).then(this.prepareFormData);
  },

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
    async getOrderFromApi(id) {
      this.order = await this.$api.helpGet("orders/" + id);
    },

    prepareFormData() {
      this.formData.name.value = this.order.name;
      this.formData.surname.value = this.order.surname;
      this.formData.email.value = this.order.email;
      this.formData.address.value = this.order.address;
      this.formData.value.value = parseFloat(this.order.value).toFixed(2);
      this.formData.cart.value = JSON.parse(this.order.cart).items.join(', ');
    },

    updateOrder() {
      const order = {};

      for (const [attributeName, attributeData] of Object.entries(this.formData)) {
        order[attributeName] = attributeData.value;
      }

      order.cart = JSON.stringify(order.cart.split(', '));

      this.updateOrderInApi(order).then((response) => {
        if (response.id) {
          this.$router.push({ name: 'Zamówienie', params: { id: response.id }});
        }
      });
    },

    async updateOrderInApi(order) {
      return await this.$api.helpPatch("orders/" + this.$route.params.id, order);
    }
  },
};
</script>