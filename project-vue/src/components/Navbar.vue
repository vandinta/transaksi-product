<template>
  <div class="app-navbar">
    <b-navbar toggleable="lg" type="dark" variant="info">
      <b-navbar-brand href="#">Test</b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item class="nav-link" href="/product">Product</b-nav-item>
          <b-nav-item class="nav-link" href="/transaction">Transaction</b-nav-item>
        </b-navbar-nav>
        <b-navbar-nav class="ml-auto">
          <b-nav-item class="nav-link" href="/login">Login</b-nav-item>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>

<script>
// import axios from "axios";

export default {
  name: "AppNavbar",
  methods: {
    logout() {
      // Lakukan logout, contohnya, dengan mengirim permintaan ke server atau menghapus token
      // Kemudian perbarui state.isLoggedIn
    },
  },
};
</script>

<style scoped>
/* Component-specific styles here */
</style>
