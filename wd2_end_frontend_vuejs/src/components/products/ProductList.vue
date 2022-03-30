<template>
  <div class="album py-5 bg-light">
    <div class="container">
      <button
        type="button"
        class="btn btn-primary mt-3 mb-2"
        @click="this.$router.push('/createproduct')"
        v-if="this.$store.getters.isAuthenticated"
      >
        Add product
      </button>
      <h1 class="product-type">Pizza</h1>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="pizzas">
        <product-list-item
          v-for="product in pizzas"
          :key="product.id"
          :product="product"
          @update="loadProducts"
        />
        <!-- @update="loadProducts" -->
      </div>
      <h1 class="product-type">Pasta</h1>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <product-list-item
          v-for="product in pastas"
          :key="product.id"
          :product="product"
          @update="loadProducts"
        />
      </div>
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
      pizzas: [],
      pastas: []
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
          this.pizzas = [];
          this.pastas = [];
          this.splitArray();
        })
        .catch((error) => console.log(error));
    },
    splitArray(){
      this.products.forEach(product => {
        if(product.category_id == 1){
          this.pastas.push(product);
        }
        
        if(product.category_id == 2){
          this.pizzas.push(product);
        }
      });
    }
  },
};
</script>
