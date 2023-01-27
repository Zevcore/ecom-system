<template>
  <div class="overflow-hidden bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
      <h3 class="text-lg font-medium leading-6 text-gray-900">{{ data.header.title }}</h3>
      <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ data.header.subtitle }}</p>
    </div>

    <div class="border-t border-gray-200">
      <dl>
        <div
            class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
            v-for="(attributeData, attributeName, index) in data.item"
            :key="attributeName"
            :class="(index % 2 === 0) ? 'bg-gray-50' : 'bg-white'"
        >
          <dt class="text-sm font-medium text-gray-500">{{ attributeData.name }}</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ attributeData.value }}</dd>
        </div>
      </dl>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    tableName: {
      required: false,
      type: String,
    },

    data: {
      required: true,
      type: Object,
    },
  },
};
</script>