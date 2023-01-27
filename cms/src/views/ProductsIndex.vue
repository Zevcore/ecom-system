<template>
  <RouterLink :to="{name: 'Utwórz produkt'}" type="button"
              class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
    Utwórz
  </RouterLink>

  <div v-if="products.length > 0" class="mt-5">
    <DataTable table-name="products" :data="this.tableData"></DataTable>
    <TablePagination :align="'center'" :class="'my-3'"></TablePagination>
  </div>
  <div v-else class="mt-5">
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
    this.getProductsFromApi().then(this.prepareTableData);
  },

  data() {
    return {
      products: [],
      currentPage: 1,
      tableData: {
        headers: {
          id: 'ID',
          name: 'Nazwa',
          stock: 'Stany',
          sellPrice: 'Cena sprzedaży',
          manufacturer: 'Producent',
        },
        items: [],
      },
    };
  },

  methods: {
    async getProductsFromApi() {
      this.products = await this.$api.helpGet("products");
    },

    prepareTableData() {
      let items = [];

      this.products.forEach(function (product) {
        const sellPrice = product.basePrice - ((product.discountPercent / 100) * product.basePrice);

        const productData = {
          id: product.id,
          name: product.name,
          stock: product.stock,
          sellPrice: sellPrice.toFixed(2) + ' zł',
          manufacturer: product.manufacturer,
        };

        items.push(productData);
      });

      this.tableData.items = items;
    },
  },
};
</script>