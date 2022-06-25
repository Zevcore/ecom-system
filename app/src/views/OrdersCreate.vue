<template>
  <div v-if="processing">
    <div class="row mt-4">
      <p class="display-1 text-center text-warning">Processing...</p>
    </div>
  </div>

  <div v-else>
    <div class="row mt-4" v-if="success">
      <p class="display-1 text-center text-success">
        Thank you for creating an order!
      </p>
      <p class="text-center text-secondary">
        (Don't worry - we're going to take care of the payment for you)
      </p>
    </div>

    <div class="row mx-auto my-4" v-else>
      <h2>Order create form</h2>

      <form
        class="row g-3 mx-0"
        ref="orderCreateForm"
        @submit.prevent="createOrder"
      >
        <div class="col-12">
          <label for="inputEmail" class="form-label">Email</label>
          <input
            type="text"
            class="form-control"
            id="inputEmail"
            :class="{ 'is-invalid': errorFields.includes('email') }"
            v-model="fields.email"
          />
        </div>

        <div class="col-lg-6">
          <label for="inputName" class="form-label">Name</label>
          <input
            type="text"
            class="form-control"
            id="inputName"
            :class="{ 'is-invalid': errorFields.includes('name') }"
            v-model="fields.name"
          />
        </div>

        <div class="col-md-6">
          <label for="inputSurname" class="form-label">Surname</label>
          <input
            type="text"
            class="form-control"
            id="inputSurname"
            :class="{ 'is-invalid': errorFields.includes('surname') }"
            v-model="fields.surname"
          />
        </div>

        <div class="col-12">
          <label for="inputAddress" class="form-label">Address</label>
          <input
            type="text"
            class="form-control"
            id="inputAddress"
            :class="{ 'is-invalid': errorFields.includes('street') }"
            v-model="fields.street"
          />
        </div>

        <div class="col-md-6">
          <label for="inputCity" class="form-label">City</label>
          <input
            type="text"
            class="form-control"
            id="inputCity"
            :class="{ 'is-invalid': errorFields.includes('city') }"
            v-model="fields.city"
          />
        </div>

        <div class="col-md-2">
          <label for="inputZip" class="form-label">Zip</label>
          <input
            type="text"
            class="form-control"
            id="inputZip"
            :class="{ 'is-invalid': errorFields.includes('zip') }"
            v-model="fields.zip"
          />
        </div>

        <div class="col-12">
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              id="inputConsent"
              v-model="fields.consent"
              :class="{ 'is-invalid': errorFields.includes('consent') }"
            />
            <label class="form-check-label" for="inputConsent">
              I consent to everything :)
            </label>
          </div>
        </div>

        <div class="col-12 mt-4">
          <button type="submit" class="btn btn-primary">Create order</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { mapState } from "vuex";

export default {
  name: "OrdersCreate",

  data() {
    return {
      success: false,
      processing: false,
      errorFields: [],
      fields: {
        email: "",
        name: "",
        surname: "",
        street: "",
        city: "",
        zip: "",
        consent: false,
      },
      order: {},
    };
  },

  computed: mapState({
    cartProducts: "cartProducts",

    cartValue: "cartValue",

    address() {
      return (
        this.fields.street + ", " + this.fields.zip + " " + this.fields.city
      );
    },

    cart() {
      return {
        total: this.cartValue,
        items: JSON.stringify(this.cartProducts),
      };
    },
  }),

  methods: {
    validateForm() {
      this.errorFields = [];

      Object.keys(this.fields).forEach((fieldName) => {
        if (
          this.fields[fieldName] === "" ||
          (fieldName === "consent" && this.fields.consent === false)
        ) {
          this.errorFields.push(fieldName);
        }
      });

      return this.errorFields.length === 0;
    },

    createOrder() {
      if (!this.validateForm()) {
        return;
      }

      this.prepareOrder();

      this.processing = true;
      this.storeOrder();
    },

    prepareOrder() {
      this.order = {
        name: this.fields.name,
        surname: this.fields.surname,
        address: this.address,
        email: this.fields.email,
        cart: JSON.stringify(this.cart),
        value: this.cartValue,
      };
    },

    async storeOrder() {
      await this.$api.helpPost("orders", JSON.stringify(this.order));

      this.processing = false;
      this.success = true;
    },
  },
};
</script>

<style lang="scss" scoped>
label::after {
  content: " *";
  color: red;
}
</style>
