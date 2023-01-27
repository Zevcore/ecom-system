<template>
  <div class="mb-5">
    <RouterLink :to="{name: 'Edycja zamówienia', params: { id: $route.params.id }}" type="button"
                class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
      Edytuj
    </RouterLink>
<!--    <RouterLink :to="{name: 'Usuń element', params: { table: 'orders', id: $route.params.id }}" type="button"-->
<!--                class="cursor-pointer focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">-->
<!--      Usuń-->
<!--    </RouterLink>-->
  </div>

  <DataShow table-name="orders" :data="tableData"></DataShow>
</template>

<script>
import DataShow from "../components/DataShow.vue";

export default {
  components: {
    DataShow,
  },

  beforeMount() {
    this.getOrderFromApi(this.$route.params.id).then(this.prepareShowData);
  },

  data() {
    return {
      order: {},
      tableData: {
        header: {
          title: '',
          subtitle: '',
        },

        item: {
          id: {
            name: "ID",
            value: 0,
          },
          client: {
            name: "Imię i nazwisko",
            value: '',
          },
          email: {
            name: "Adres e-mail",
            value: 0,
          },
          address: {
            name: "Adres",
            value: '',
          },
          orderValue: {
            name: "Wartość zamówienia",
            value: '',
          },
          orderProducts: {
            name: "Produkty w zamówieniu",
            value: '',
          },
        },
      },
    };
  },

  methods: {
    async getOrderFromApi(id) {
      this.order = await this.$api.helpGet("orders/" + id);
    },

    prepareShowData() {
      this.tableData.header.title = '#' + this.$route.params.id;

      this.tableData.item.id.value = this.$route.params.id;
      this.tableData.item.client.value = this.order.name + ' ' + this.order.surname;
      this.tableData.item.email.value = this.order.email;
      this.tableData.item.address.value = this.order.address;
      this.tableData.item.orderValue.value = parseFloat(this.order.value).toFixed(2) + ' zł';
      this.tableData.item.orderProducts.value = JSON.parse(this.order.cart).items.join(', ');
    },
  },
};
</script>