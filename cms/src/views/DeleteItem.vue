<template>

</template>

<script>
export default {
  mounted() {
    const params = this.$route.params;
    this.$api.helpDelete(params.table + '/' + params.id).then(() => {
      this.$router.push('/' + params.table);
    });
  }
};
</script>