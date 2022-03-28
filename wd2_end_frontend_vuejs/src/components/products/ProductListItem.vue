<template>
  <!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xxl-3 p-2">
    <div class="card product-card h-100">
      <div class="card-body">
        <img :src="product.image" :alt="product.title" :title="product.title" />
        <div class="float-start">
          <p>{{ product.name }}</p>
          <p>
            <small>{{ product.category.name }}</small>
          </p>
        </div>
        <span class="price float-end">{{ product.price }}</span>
      </div>
      <div class="card-footer">
        <button
          class="btn btn-warning"
          @click="editProduct(product.id)"
          v-if="this.$store.getters.isAuthenticated"
        >
          Edit</button
        >&nbsp;&nbsp;
        <button
          class="btn btn-danger"
          @click="deleteProduct(product.id)"
          v-if="this.$store.getters.isAuthenticated"
        >
          Delete
        </button>
      </div>
    </div>
  </div> -->
  <div class="col">
    <div class="card shadow-sm">
      <img :src="product.img_path" alt="ProductImg" class="product-page-image" />
      <div class="card-body">
        <h3 class="product-header">{{this.product.name}}</h3>
        <h4 class="product-price">€{{this.product.price}}</h4>
        <p class="card-text">{{this.product.ingredients}}</p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <button
              type="submit"
              name="add-item"
              class="btn btn-sm btn-outline-primary"
            >
              Add to cart
            </button>
            <button
              class="btn btn-warning"
              @click="editProduct(this.product.id)"
              v-if="this.$store.getters.isAuthenticated"
            >
              Edit</button
            >&nbsp;&nbsp;
            <button
              class="btn btn-danger"
              @click="deleteProduct(this.product.id)"
              v-if="this.$store.getters.isAuthenticated"
            >
              Delete
            </button>
          </div>
          <input
            type="number"
            class="product-amount"
            name="amount"
            value="1"
            min="1"
            max="10"
          />
          <small class="text-muted"
            >Freshly made & Delivered within 60 min.</small
          >
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "../../axios-auth";

export default {
  name: "ProductListItem",
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
      //Use the router to navigate to the editproduct route and pass the id
      this.$router.push("/editproduct/" + id);
    },
  },
};
</script>

<style>
</style>