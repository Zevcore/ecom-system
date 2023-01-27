<template>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-md text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th
            scope="col"
            class="px-6 py-3"
            v-for="(fieldName, dataName) in data.headers"
            :key="dataName"
        >
          <div class="flex items-center">
            {{ fieldName }}
            <a href="#">
              <ColumnSortIcon/>
            </a>
          </div>
        </th>

        <th scope="col" class="px-6 py-3">
          <span
              class="sr-only"
              v-for="actionButton in actionButtons"
              :key="actionButton.name"
              v-show="actionButton.visible"
          >{{ actionButton.name }}</span>
        </th>
      </tr>
      </thead>

      <tbody>
      <tr
          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
          v-for="(item, index) in data.items"
          :key="index"
      >
        <td
            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
            v-for="(attributeValue, attributeName) in item"
            :key="attributeName"
        >
          {{ attributeValue }}
        </td>

        <td class="px-6 py-4 text-right">
          <a
              href="#"
              class="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-1"
              v-for="actionButton in actionButtons"
              :key="actionButton.name"
              v-show="actionButton.visible"
          >
            {{ actionButton.name }}
          </a>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import ColumnSortIcon from "./icons/ColumnSortIcon.vue";

export default {
  components: {ColumnSortIcon},
  props: {
    data: {
      required: true,
      type: Object,
    },

    hideShow: {
      required: false,
      type: Boolean,
      default: false,
    },

    hideEdit: {
      required: false,
      type: Boolean,
      default: false,
    },

    hideDelete: {
      required: false,
      type: Boolean,
      default: false,
    }
  },

  data() {
    return {
      actionButtons: [
        {
          name: 'Show',
          visible: !this.hideShow,
        },
        {
          name: 'Edit',
          visible: !this.hideEdit,
        },
        {
          name: 'Delete',
          visible: !this.hideDelete,
        },
      ]
    }
  }
}
</script>