<template>
  <div
    class="modal fade"
    id="cartModal"
    tabindex="-1"
    aria-labelledby="cartModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="cartModalLabel">{{ content.title }}</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">{{ content.body }}</div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal"
          >
            Close
          </button>
          <router-link
            :to="content.footerButton.linkTo"
            type="button"
            class="btn btn-primary"
          >
            {{ content.footerButton.text }}
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import { Modal } from "bootstrap";
export default {
  name: "AppCartModal",

  data() {
    return {
      state: String,
      content: {
        title: String,
        body: String,
        footerButton: {
          text: String,
          linkTo: String,
        },
      },
    };
  },

  computed: {
    ...mapGetters(["cartProductsCount"]),
  },

  watch: {
    cartProductsCount(newValue, oldValue) {
      if (newValue > oldValue) {
        this.state = "add";
      } else {
        this.state = "remove";
      }
      this.updateModalContent();

      const cartModal = new Modal(document.getElementById("cartModal"));
      cartModal.show();
    },
  },

  methods: {
    updateModalContent() {
      if (this.state === "add") {
        this.content = {
          title: "Added product to cart",
          body: "You can either continue shopping or go to your cart to finish your order.",
          footerButton: {
            text: "Go to Cart",
            linkTo: "/",
            // linkTo: { name: "Cart" },
          },
        };
      }
    },
  },
};
</script>
