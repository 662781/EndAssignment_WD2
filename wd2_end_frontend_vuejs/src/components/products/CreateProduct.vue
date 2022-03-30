<template>
  <section>
    <div class="container">
      <form ref="form">
        <h2 class="mt-3 mt-lg-5">Create a new product</h2>
        <h5 class="mb-4"></h5>

        <div class="input-group mb-3">
          <span class="input-group-text">Name</span>
          <input type="text" class="form-control" v-model="product.name" />
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text">Price</span>
          <input
            type="number"
            class="form-control"
            v-model="product.price"
            placeholder="0.00"
          />
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text">Category ID</span>
          <input
            type="number"
            class="form-control"
            v-model="product.category_id"
            placeholder="e.g. 1 (Pizza)"
            min="1"
            max="2"
          />
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text">Ingredients</span>
          <textarea
            class="form-control"
            v-model="product.ingredients"
          ></textarea>
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text">Image Path/URL</span>
          <input
            type="text"
            class="form-control"
            v-model="product.img_path"
            placeholder="e.g. images/pizza-salame.png"
          />
        </div>

        <div class="input-group mt-4">
          <button type="button" class="btn btn-primary" @click="addProduct">
            Create product
          </button>
          &nbsp;
          <button
            type="button"
            class="btn btn-danger"
            @click="this.$router.push('/products')"
          >
            Cancel
          </button>
        </div>
      </form>
    </div>
  </section>
</template>

<script>
import axios from "../../axios-auth";

export default {
  name: "CreateProduct",
  data() {
    return {
      product: {
        id: 0,
        name: "",
        category_id: 1,
        price: "",
        ingredients: "",
        img_path: "",
      },
    };
  },
  methods: {
    addProduct() {
      axios
        .post("/products", this.product)
        .then((res) => {
          console.log(res.data);
          this.$router.push("/products");
        })
        .catch((error) => console.log(error));
    },
  },
};
</script>
