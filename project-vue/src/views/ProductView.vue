<template>
  <div class="home">
    <AppNavbarLog />
    <div class="container">
      <b-table striped hover :items="items"></b-table>
    </div>
    <AppFooter />
  </div>
</template>

<script>
import AppNavbarLog from "@/components/NavbarLog.vue";
import AppFooter from "@/components/Footer.vue";
import axios from "axios";

export default {
  name: "HomeView",
  components: {
    AppNavbarLog,
    AppFooter,
  },
  mounted() {
    const token = localStorage.getItem('token');

    if (!token) {
      this.$router.push({ path: "/login" });
    }
    axios.defaults.headers.common.Authorization = `Bearer ${token}`;
  },
};
</script>
