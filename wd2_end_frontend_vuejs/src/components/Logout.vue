<template>
  <button
    @click="logout()"
    class="btn nav-link link-dark px-2"
    active-class="active"
  >
    Logout
  </button>
</template>
<script>
export default {
  name: "Logout",
  methods: {
    logout() {
      this.$store
        .dispatch("logout")
        .then(() => {
          this.$router.push("/");
        })
        .catch((error) => {
          this.errorMessage = error;
          console.log(error);
        });
    },
  },
};
</script>