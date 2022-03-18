<template>
  <li class="list-group-item d-flex justify-content-between lh-sm">
    <img src="" alt="" class="product-image" />
    <div>
      <h6 class="my-0">Pizza Margherita x 2</h6>
      <div class="ingredients">
        <small class="text-muted"><i>Tomato Sauce...</i></small>
      </div>
    </div>
    <div>
      <strong>€ 20</strong>
      <div class="btn-group">
        <input type="hidden" name="product-id" value="product-id" />
        <button
          type="button"
          name="del-item"
          class="btn btn-sm btn-danger btn-delete"
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
};
</script>

<style>
</style>