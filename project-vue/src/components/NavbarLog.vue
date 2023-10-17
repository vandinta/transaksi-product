<template>
  <div class="app-navbar">
    <b-navbar toggleable="lg" type="dark" variant="info">
      <b-navbar-brand href="#">Test</b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item class="nav-link" href="/product">Product</b-nav-item>
          <b-nav-item class="nav-link" href="/transaction"
            >Transaction</b-nav-item
          >
        </b-navbar-nav>
        <b-navbar-nav class="ml-auto">
          <a @click="logout"
            ><b-nav-item class="nav-link">Logout</b-nav-item></a
          >
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "AppNavbarLog",
  methods: {
    logout() {
      const token = localStorage.getItem("token");
      axios.defaults.headers.common.Authorization = `Bearer ${token}`;
      axios
        .post("http://127.0.0.1:8000/api/logout", this.token)
        .then((response) => {
          if (response.data.success) {
            console.log("test masuk");
            localStorage.removeItem("token");
            this.$router.push({ path: "/login" });
          }
        })
        .catch((err) => console.log(err));
    },
  },
};
</script>

<style scoped>
/* Component-specific styles here */
</style>
