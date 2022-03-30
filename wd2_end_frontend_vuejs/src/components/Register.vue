<template>
  <section>
    <div class="container">
      <main class="form-signin">
        <div class="login-form">
          <figure class="logo-figure">
            <router-link to="/"
              ><img
                class="mb-4 logo"
                src="images/pizza_logo.png"
                alt="Pizza time?"
            /></router-link>
            <figcaption>It's Pizza Time!</figcaption>
          </figure>

          <h1 class="h3 mb-3 fw-normal title">Register a new account</h1>
          <div class="form-floating">
            <input
              type="username"
              class="form-control"
              id="username"
              v-model="user.username"
              placeholder="fluffyunicorn420"
            />
            <label for="username">Username</label>
          </div>
          <div class="form-floating">
            <input
              type="email"
              class="form-control"
              id="email"
              v-model="user.email"
              placeholder="email@example.com"
            />
            <label for="email">E-mail</label>
          </div>
          <div class="form-floating">
            <input
              type="password"
              class="form-control"
              id="password"
              placeholder="Password"
              v-model="user.password"
            />
            <label for="password">Password</label>
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="newsletter" /> I would like to
              recieve the newsletter weekly
            </label>
            <label class="error_msg">
              {{ errorMessage }}
            </label>
          </div>
          <button
            class="w-100 btn btn-lg btn-primary"
            type="button"
            @click="register()"
          >
            Register
          </button>
          <label class="login"
            ><router-link to="/login"
              >Already an account? Login here</router-link
            ></label
          >
          <p class="mt-5 mb-3 text-muted">© 2021–2022</p>
        </div>
      </main>
    </div>
  </section>
</template>

<script>
import axios from "../axios-auth";
export default {
  name: "Register",
  data() {
    return {
      user: {
        username: "",
        email: "",
        password: "",
      },
      errorMessage: "",
    };
  },
  methods: {
    register() {
      axios
        .post("/users/register", {
          username: this.user.username,
          password: this.user.password,
          email: this.user.email
        })
        .then(res => {
          console.log(res.data);
          this.$router.push('/login')
        })
        .catch(error => console.log(error));
    },
  },
};
</script>
