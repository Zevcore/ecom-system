<template>
  <div class="card">
    <div class="card-body">
      <p class="h5 card-title">Karta produktu o ID: <span class="fw-bold">{{ $route.params.id }}</span>.</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "Product",
}
</script>