<template>
  <div
    class="modal fade"
    id="cartModal"
    tabindex="-1"
    aria-labelledby="cartModalLabel"
    aria-hidden="true"
    v-on="{ 'hidden.bs.modal': resetContent }"
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
            v-if="content.footerButton"
            :to="content.footerButton.linkTo"
            type="button"
            class="btn btn-primary"
            @click="clickedCartModalButton"
          >
            {{ content.footerButton.text }}
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Modal } from "bootstrap";
import { mapState } from "vuex";
export default {
  name: "AppCartModal",

  data() {
    return {
      cartModal: Modal,
      content: {
        title: "",
        body: "",
        footerButton: {
          text: "",
          linkTo: "",
        },
      },
    };
  },

  computed: mapState({
    status: "cartModalStatus",
    product: "productToRemove",
  }),

  watch: {
    status() {
      if (!this.status) {
        return false;
      }

      this.updateModalContent();
      this.cartModal.show();

      if (this.status !== "removed") {
        this.$store.dispatch("changeCartModalStatus", { status: null });
      }
    },
  },

  mounted() {
    this.cartModal = new Modal(document.getElementById("cartModal"));
  },

  methods: {
    updateModalContent() {
      if (this.status === "added") {
        this.content = {
          title: "Added product to cart",
          body: "You can either continue shopping or go to your cart to finish your order.",
          footerButton: {
            text: "Go to Cart",
            linkTo: { name: "Cart" },
          },
        };
      } else if (this.status === "duplicated") {
        this.content = {
          title: "Product already in cart",
          body: "This product is already in your cart and you can't add another one.",
          footerButton: null,
        };
      } else if (this.status === "removed" && this.product) {
        this.content = {
          title: "Remove product from cart",
          body: "Are you sure that you want to remove this product from your cart?",
          footerButton: {
            text: "Confirm",
            linkTo: "",
          },
        };
      }
    },

    clickedCartModalButton() {
      this.cartModal.hide();

      if (this.status === "removed") {
        this.$store.dispatch("updateCartValue", {
          value: -this.product.value,
        });

        this.$store.dispatch("removeProductFromCart", {
          productId: this.product.id,
        });

        this.$store.dispatch("changeCartModalStatus", { status: null });
      }
    },

    resetContent() {
      this.content = {
        title: "",
        body: "",
        footerButton: {
          text: "",
          linkTo: "",
        },
      };
    },
  },
};
</script>
