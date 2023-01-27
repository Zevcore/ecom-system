<template>
  <form>
    <div
        class="mb-6"
        v-for="(attribute, attributeName) in modelValue"
        :key="attribute.name"
    >
      <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">{{ attribute.name }}</label>
      <input :value="attribute.value" @input="update(attributeName + '.value', $event.target.value)" :type="attribute.type" step="0.01" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
    </div>

    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Wyślij</button>
  </form>
</template>

<script>
import { cloneDeep, tap, set } from 'lodash';
export default {
  props: {
    modelValue: {
      type: Object,
      default: () => ({}),
    }
  },

  emits: ['update:modelValue'],

  methods: {
    update(key, value) {
      this.$emit('update:modelValue', tap(cloneDeep(this.modelValue), v => set(v, key, value)));
    },
  },
};
</script>