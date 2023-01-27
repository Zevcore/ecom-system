<template>
  <div v-if="users.length > 0">
    <DataTable :data="this.tableData"></DataTable>
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
    this.getUsersFromApi().then(this.prepareTableData);
  },

  data() {
    return {
      users: [],
      currentPage: 1,
      tableData: {
        headers: {
          id: 'ID',
          name: 'Nazwa',
          email: 'Email',
          createdAt: 'Data utworzenia',
        },
        items: [],
      },
    };
  },

  methods: {
    async getUsersFromApi() {
      this.users = await this.$api.helpGet("users");
    },

    prepareTableData() {
      let items = [];

      this.users.forEach(function (user) {
        const userData = {
          id: user.id,
          name: user.name,
          email: user.email,
          createdAt: user.created_at,
        };

        items.push(userData);
      });

      this.tableData.items = items;
    },
  },
};
</script>