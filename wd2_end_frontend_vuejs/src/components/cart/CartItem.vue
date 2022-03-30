<template>
  <li class="list-group-item d-flex justify-content-between lh-sm">
    <img :src="product.img_path" alt="product" class="product-image" />
    <div>
      <h6 class="my-0">{{ product.name }}</h6>
      <div class="ingredients">
        <small class="text-muted"><i>{{ product.ingredients }}</i></small>
      </div>
    </div>
    <div>
      <strong>€ {{product.price}}</strong>
      &nbsp;
      <div class="btn-group">
        <input type="hidden" name="product-id" value="product-id" />
        <button
          type="button"
          class="btn btn-sm btn-danger btn-delete"
          @click="delFromCart(product.id)"
        >
          Delete
        </button>
      </div>
    </div>
  </li>
</template>

<script>
export default {
  name: "CartItem",
  props:{
    product: Object
  },
  methods: {
    delFromCart(id){
      this.$emit("delete", id)
    },
    passOrderLineInfo(){
      this.$emit("passInfo", this.product.id, this.product.price)
    }
  },
  mounted(){
    this.passOrderLineInfo();
  }
};
</script>

<style>
</style>