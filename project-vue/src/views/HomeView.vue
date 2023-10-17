<template>
  <div class="home">
    <AppNavbar />
    <div class="container">
      <h1 class="home-text">Ini Adalah Home</h1>
    </div>
    <AppFooter />
  </div>
</template>

<script>
import AppNavbar from "@/components/Navbar.vue";
import AppFooter from "@/components/Footer.vue";

export default {
  name: "HomeView",
  components: {
    AppNavbar,
    AppFooter
  },
};
</script>
