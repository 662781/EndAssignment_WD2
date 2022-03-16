<template>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="container-fluid">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <!-- Add a router link to the homepage (don't use the a tag!) -->
          <router-link
            v-if="this.$store.getters.isAuthenticated"
            to="/profile"
            class="nav-link"
            active-class="active"
            >{{ this.$store.state.username }}</router-link
          >
        </li>
        <li class="nav-item">
          <!-- Add a router link to the homepage (don't use the a tag!) -->
          <router-link to="/" class="nav-link" active-class="active"
            >Home</router-link
          >
        </li>
        <li class="nav-item" v-if="this.$store.getters.isAuthenticated">
          <!-- add a router link to the products page (don't use the a tag!) -->
          <router-link to="/products" class="nav-link" active-class="active"
            >Products</router-link
          >
        </li>
        <li class="nav-item" v-if="!this.$store.getters.isAuthenticated">
          <!-- add a router link to the products page (don't use the a tag!) -->
          <router-link to="/login" class="nav-link" active-class="active"
            >Login</router-link
          >
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item" v-if="this.$store.getters.isAuthenticated">
          <!-- Make and use a logout component! -->
          <a
            @click="this.$store.dispatch('logout')"
            class="nav-link"
            active-class="active"
            >Logout</a
          >
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Navigation",
};
</script>

<style>
</style>