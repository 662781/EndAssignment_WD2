<template>
  <div class="container">
    <main>
      <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Your cart</span>
            <span class="badge bg-primary rounded-pill">0</span>
          </h4>
          <ul class="list-group mb-3" id="cart">
            <!-- Show CartItems -->
            <cart-item >

            </cart-item>
            <!-- Show if cart is empty -->
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <i> Your cart is empty </i>
            </li>
            <!-- Total Price -->
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (EUR)</span>
              <strong>€20</strong>
            </li>
          </ul>
          <h4 class="conf_msg">Confirmation</h4>
        </div>
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Billing address</h4>
          <h5 class="error_msg">Error Message</h5>
          <form
            class="needs-validation"
            novalidate=""
            function="cart"
            method="post"
          >
            <div class="row g-3">
              <div class="col-12">
                <label for="username" class="form-label">Username</label>
                <div class="input-group has-validation">
                  <span class="input-group-text">@</span>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    placeholder="Username"
                    required=""
                    name="cartUser"
                  />
                  <div class="invalid-feedback">Your username is required.</div>
                </div>
              </div>

              <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  placeholder="you@example.com"
                  name="cartEmail"
                />
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>

              <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input
                  type="text"
                  class="form-control"
                  id="address"
                  placeholder="Cloud St 4"
                  required=""
                  name="cartAddress"
                />
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>

              <div class="col-md-3">
                <label for="zip" class="form-label">Postal Code</label>
                <input
                  type="text"
                  class="form-control"
                  id="zip"
                  placeholder="1234AB"
                  required=""
                  name="cartPostalCode"
                />
                <div class="invalid-feedback">Postal Code required.</div>
              </div>
            </div>

            <hr class="my-4" />

            <h4 class="mb-3">Payment</h4>

            <div class="my-3">
              <div class="form-check">
                <input
                  id="ideal"
                  name="paymentMethod"
                  type="radio"
                  class="form-check-input"
                  checked=""
                  required=""
                  value="IDEAL"
                />
                <label class="form-check-label" for="ideal">IDEAL</label>
              </div>
              <div class="form-check">
                <input
                  id="paypal"
                  name="paymentMethod"
                  type="radio"
                  class="form-check-input"
                  required=""
                  value="PayPal"
                />
                <label class="form-check-label" for="paypal">PayPal</label>
              </div>
              <div class="form-check">
                <input
                  id="monopoly"
                  name="paymentMethod"
                  type="radio"
                  class="form-check-input"
                  required=""
                  value="Monopoly Money"
                />
                <label class="form-check-label" for="monopoly"
                  >Monopoly Money</label
                >
              </div>
            </div>

            <hr class="my-4" />

            <button
              class="w-100 btn btn-primary btn-lg"
              type="submit"
              name="pay"
            >
              Commence Payment
            </button>
          </form>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import CartItem from "./CartItem.vue";

export default {
  name: "Cart",
  data(){
      return{
          cartItems: []
      }
  },
  components: {
    CartItem,
  },
};
</script>

<style>
</style>