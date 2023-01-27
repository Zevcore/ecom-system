<template>
  <div class="mb-5">
    <RouterLink :to="{name: 'Edycja produktu', params: { id: $route.params.id }}" type="button"
                class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
      Edytuj
    </RouterLink>
    <RouterLink :to="{name: 'Usuń element', params: { table: 'products', id: $route.params.id }}" type="button"
                class="cursor-pointer focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
      Usuń
    </RouterLink>
  </div>

  <DataShow table-name="products" :data="tableData"></DataShow>
</template>

<script>
import DataShow from "../components/DataShow.vue";

export default {
  components: {
    DataShow,
  },

  beforeMount() {
    this.getProductFromApi(this.$route.params.id).then(this.prepareShowData);
  },

  data() {
    return {
      product: {},
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
          name: {
            name: "Nazwa",
            value: '',
          },
          description: {
            name: "Opis",
            value: '',
          },
          stock: {
            name: "Stany magazynowe",
            value: 0,
          },
          basePrice: {
            name: "Cena bazowa",
            value: '',
          },
          sellPrice: {
            name: "Cena sprzedaży",
            value: '',
          },
          discount: {
            name: "Zniżka",
            value: '',
          },
          manufacturer: {
            name: "Productent",
            value: '',
          },
          specifications: {
            name: "Specyfikacje",
            value: '',
          },
        },
      },
    };
  },

  methods: {
    async getProductFromApi(id) {
      this.product = await this.$api.helpGet("products/" + id);
    },

    prepareShowData() {
      this.tableData.header.title = this.product.name;
      this.tableData.header.subtitle = "ID: " + this.$route.params.id;

      const sellPrice = this.product.basePrice - ((this.product.discountPercent / 100) * this.product.basePrice);

      this.tableData.item.id.value = this.$route.params.id;
      this.tableData.item.name.value = this.product.name;
      this.tableData.item.description.value = this.product.description;
      this.tableData.item.stock.value = this.product.stock;
      this.tableData.item.basePrice.value = parseFloat(this.product.basePrice).toFixed(2) + ' zł';
      this.tableData.item.sellPrice.value = sellPrice.toFixed(2) + ' zł';
      this.tableData.item.discount.value = '-' + this.product.discountPercent + '%';
      this.tableData.item.manufacturer.value = this.product.manufacturer;
      this.tableData.item.specifications.value = JSON.parse(this.product.specifications).join(', ');
    },
  },
};
</script>