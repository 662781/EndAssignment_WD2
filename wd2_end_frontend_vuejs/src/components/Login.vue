<template>
  <section>
    <div class="container">
      <!-- <div class="row">
        <div class="col-md-6">
          <form>
            <div class="mb-3">
              <label for="inputUsername" class="form-label">Username</label>
              <input
                id="inputUsername"
                type="text"
                class="form-control"
                v-model="username"
              />
            </div>
            <div class="mb-3">
              <label for="inputPassword" class="form-label">Password</label>
              <input
                type="password"
                class="form-control"
                id="inputPassword"
                v-model="password"
              />
            </div>
            <button type="button" @click="login()" class="btn btn-primary">
              Submit
            </button>
          </form>
        </div>
      </div> -->
      <main class="form-signin">
        <div class="login-form">
          <figure class="logo-figure">
            <a href="home"
              ><img
                class="mb-4 logo-login"
                src="images/pizza_logo.png"
                alt="Pizza time?"
            /></a>
            <figcaption>It's Pizza Time!</figcaption>
          </figure>

          <h1 class="h3 mb-3 fw-normal title">Please sign in</h1>

          <div class="form-floating">
            <input
              type="username"
              class="form-control"
              id="username"
              v-model="username"
              placeholder="fluffyunicorn420"
            />
            <label for="username">Username</label>
          </div>
          <div class="form-floating">
            <input
              type="password"
              class="form-control"
              id="password"
              v-model="password"
              placeholder="Password"
            />
            <label for="password">Password</label>
          </div>

          <div class="error-box mb-3">
            <label class="error_msg"> </label>
          </div>
          <button
            type="button"
            @click="login()"
            class="w-100 btn btn-lg btn-primary"
          >
            Sign in
          </button>
          <label class="register"
            ><a href="register">No account? Register here</a></label
          >
          <p class="mt-5 mb-3 text-muted">© 2021–2022</p>
        </div>
      </main>
    </div>
  </section>
</template>

<script>
// import axios from '../axios-auth';

export default {
  name: "Login",
  data() {
    return {
      username: "",
      password: "",
      errorMessage: null,
    };
  },
  methods: {
    login() {
      this.$store
        .dispatch("login", {
          username: this.username,
          password: this.password,
        })
        .then(() => {
          this.$router.push("/products");
        })
        .catch((error) => {
          this.errorMessage = error;
          console.log(error);
        });
    },
  },
};
</script>

<style>
</style>