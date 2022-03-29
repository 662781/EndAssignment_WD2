<template>
  <li class="list-group-item d-flex justify-content-between lh-sm">
    <img src="" alt="" class="product-image" />
    <div>
      <h6 class="my-0">{{item.name}}</h6>
      <div class="ingredients">
        <small class="text-muted"><i>{{item.ingredients}}</i></small>
      </div>
    </div>
    <div>
      <strong>€ {{item.price}}</strong>
      <div class="btn-group">
        <input type="hidden" name="product-id" value="product-id" />
        <button
          type="button"
          class="btn btn-sm btn-danger btn-delete"
          @click="delFromCart(item.id)"
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
    item: Object
  },
  methods: {
    delFromCart(id){
      this.$emit("delete", id)
    }
  }
};
</script>

<style>
</style>