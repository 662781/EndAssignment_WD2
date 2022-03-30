<template>
  <div class="container p-5">
    <h4 class="mb-3">{{ currentUser.username }}'s Data</h4>
    <form class="needs-validation" novalidate="">
      <div class="row g-3">
        <div class="col-6">
          <label for="username" class="form-label">Username</label>
          <div class="input-group has-validation">
            <span class="input-group-text">@</span>
            <input
              type="text"
              class="form-control"
              id="username"
              placeholder="Username"
              required=""
              :value="currentUser.username"
              readonly
            />
          </div>
        </div>
        <div class="col-6">
          <label for="email" class="form-label">Email</label>
          <input
            type="email"
            class="form-control"
            id="email"
            placeholder="you@example.com"
            :value="currentUser.email"
            readonly
          />
        </div>
         <div class="col-6">
          <label for="acc-age" class="form-label">Account Created</label>
          <input
            class="form-control"
            id="acc-age"
            :value="currentUser.created_at"
            readonly
          />
        </div>
      </div>
    </form>
  </div>
</template>
<script>
import axios from "../axios-auth";
export default {
  name: "Profile",
  data() {
    return {
      currentUser: Object,
    };
  },
  methods: {
    getUser() {
      axios
        .get("/users/" + this.$store.state.id)
        .then((res) => {
          this.currentUser = res.data;
          console.log(res.data);
        })
        .catch((error) => console.log(error));
    },
  },
  mounted() {
    this.getUser();
  },
};
</script>
<style scoped>
</style>