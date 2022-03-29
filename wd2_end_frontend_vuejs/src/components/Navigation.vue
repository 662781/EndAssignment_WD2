<template>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <router-link class="navbar-brand" to="/"
        ><img
          class="logo"
          src="images/pizza_logo_ico.ico"
          alt="Pizza Time!"
        />PizzaTime!</router-link
      >
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#main_nav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="main_nav">
        <ul class="nav me-auto">
          <li class="nav-item active">
            <router-link class="nav-link link-dark px-2" to="/"
              >Home
            </router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link link-dark px-2" to="/products">
              Pasta
            </router-link>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link link-dark px-2 dropdown-toggle"
              data-bs-toggle="dropdown"
              >Pizza</a
            >
            <ul class="dropdown-menu">
              <li>
                <router-link
                  class="dropdown-item"
                  to="/creator"
                  v-if="this.$store.getters.isAuthenticated"
                  >Start creating!</router-link
                >
              </li>
              <li>
                <router-link class="dropdown-item" to="/products"
                  >Our masterpieces</router-link
                >
              </li>
            </ul>
          </li>
        </ul>

        <ul class="nav">
          <li class="nav-item" v-if="!this.$store.getters.isAuthenticated">
            <router-link to="/login" class="nav-link link-dark px-2"
              ><img src="images/person-circle.svg" alt="login" />
              Login</router-link
            >
          </li>
          <li class="nav-item" v-if="!this.$store.getters.isAuthenticated">
            <router-link to="/register" class="nav-link link-dark px-2"
              ><img src="images/person-plus-fill.svg" alt="sign up" />
              Register</router-link
            >
          </li>
          <li class="nav-item" v-if="this.$store.getters.isAuthenticated">
            <router-link to="/profile" class="nav-link link-dark px-2"
              ><img src="images/person-circle.svg" alt="profile" /> {{this.$store.state.username}}
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/cart" class="nav-link link-dark px-2"
              ><img src="images/cart.svg" alt="cart" /> Cart</router-link
            >
          </li>
          <li class="nav-item" v-if="this.$store.getters.isAuthenticated">
            <logout>
            </logout>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import Logout from './Logout.vue';
export default {
  components: { Logout },
  name: "Navigation",
};
</script>

<style>
</style>