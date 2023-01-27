<template>
  <div v-if="orders.length > 0">
    <DataTable :data="this.tableData" hide-delete></DataTable>
    <TablePagination :align="'center'" :class="'my-3'"></TablePagination>
  </div>
  <div v-else>
    <p>Brak danych.</p>
  </div>
</template>

<script>
import DataTable from "../components/DataTable.vue";
import TablePagination from "../components/TablePagination.vue";

export default {
  components: {
    DataTable,
    TablePagination
  },

  beforeMount() {
    this.getOrdersFromApi().then(this.prepareTableData);
  },

  data() {
    return {
      orders: [],
      currentPage: 1,
      tableData: {
        headers: {
          id: 'ID',
          email: 'Email',
          name: 'Imię i nazwisko',
          address: 'Adres dostawy',
          orderValue: 'Wartość zamówienia',
          orderProducts: 'Produkty',
        },
        items: [],
      },
    };
  },

  methods: {
    async getOrdersFromApi() {
      this.orders = await this.$api.helpGet("orders");
    },

    prepareTableData() {
      let items = [];

      this.orders.forEach(function (order) {
        order.cart = JSON.parse(order.cart);

        const orderData = {
          id: order.id,
          email: order.email,
          name: order.name + ' ' + order.surname,
          address: order.address,
          orderValue: parseFloat(order.value).toFixed(2) + ' zł',
          orderProducts: order.cart.join(', '),
        };

        items.push(orderData);
      });

      this.tableData.items = items;
    },
  },
};
</script>