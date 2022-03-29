<template>
  <div class="col">
    <div class="card shadow-sm">
      <img
        :src="product.img_path"
        alt="ProductImg"
        class="product-page-image"
      />
      <div class="card-body">
        <h3 class="product-header">{{ this.product.name }}</h3>
        <h4 class="product-price">€{{ this.product.price }}</h4>
        <p class="card-text">{{ this.product.ingredients }}</p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="row btn-group">
            <div class="col">
              <input
                type="number"
                class="product-amount"
                name="amount"
                value="1"
                min="1"
                max="10"
                v-bind="this.amount"
              />
              <button
                class="btn btn-sm btn-outline-primary"
                @click="addToCart()"
              >
                Add to cart
              </button>
            </div>
            <div class="col">
              <div class="row-2">
                <button
                  class="btn btn-sm btn-warning"
                  @click="editProduct(this.product.id)"
                  v-if="this.$store.getters.isAuthenticated"
                >
                  Edit
                </button>
              </div>
              <div class="row-2">
                <button
                  class="btn btn-sm btn-danger"
                  @click="deleteProduct(this.product.id)"
                  v-if="this.$store.getters.isAuthenticated && product.id > 7"
                >
                  Delete
                </button>
              </div>
            </div>
            <small class="text-muted"
              >Freshly made &amp; Delivered within 60 min.</small
            >
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "../../axios-auth";

export default {
  name: "ProductListItem",
  data() {
    return {
      amount: null,
    };
  },
  props: {
    product: Object,
  },
  methods: {
    deleteProduct(id) {
      //Use axios to delete the product
      axios
        .delete("/products/" + id)
        .then((res) => {
          console.log(res.data);
          this.$emit("update");
        })
        .catch((error) => console.log(error));
    },
    editProduct(id) {
      //Use the router to navigate to the editproduct page and pass the id
      this.$router.push("/editproduct/" + id);
    },
    addToCart() {
      const item = this.product;
      if (!localStorage.getItem("cart")) {
        localStorage.setItem("cart", JSON.stringify([]));
      }
      const cartItems = JSON.parse(localStorage.getItem("cart"));
      cartItems.push(item);
      localStorage.setItem("cart", JSON.stringify(cartItems));
      this.$router.push("/cart");
    },
  },
};
</script>

<style>
</style>