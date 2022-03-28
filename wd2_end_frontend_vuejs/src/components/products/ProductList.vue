<template>
  <!-- <div class="container">
      <h2 class="mt-3 mt-lg-5">Products</h2>
      <button
        type="button"
        class="btn btn-primary mt-3"
        @click="this.$router.push('/createproduct')"
        v-if="this.$store.getters.isAuthenticated"
      >
        Add product
      </button>
      <div class="row mt-3">
        <product-list-item
          v-for="product in products"
          :key="product.id"
          :product="product"
          @update="loadProducts"
          
        />
        @update="loadProducts" -->
  <!-- </div>
    </div> -->
  <div class="album py-5 bg-light">
    <div class="container">
      <h1 class="product-type">Products</h1>
      <button
        type="button"
        class="btn btn-primary mt-3"
        @click="this.$router.push('/createproduct')"
        v-if="this.$store.getters.isAuthenticated"
      >
        Add product
      </button>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="pizzas">
        <product-list-item
          v-for="product in products"
          :key="product.id"
          :product="product"
          @update="loadProducts"
        />
      </div>

      <!-- <h1 class="product-type">Pasta</h1>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"></div> -->
    </div>
  </div>
</template>

<script>
import ProductListItem from "./ProductListItem.vue";
import axios from "../../axios-auth";

export default {
  name: "ProductList",
  components: {
    ProductListItem,
  },
  data() {
    return {
      products: [],
    };
  },
  mounted() {
    this.loadProducts();
  },
  methods: {
    loadProducts() {
      axios
        .get("/products")
        .then((res) => {
          console.log(res);
          this.products = res.data;
        })
        .catch((error) => console.log(error));
    },
  },
};
</script>

<style>
</style>