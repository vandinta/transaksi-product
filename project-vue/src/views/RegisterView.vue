<template>
  <div class="container mt-5">
    <b-card class="card-login">
      <div class="head">
        <H3>Register</H3>
      </div>
      <hr />
      <b-form v-on:submit.prevent v-if="show">
        <b-form-group id="username" label="Username" label-for="username">
          <b-form-input
            id="username"
            v-model="form.username"
            type="text"
            placeholder="Username"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-group id="password" label="Password" label-for="password">
          <b-form-input
            id="input-2"
            v-model="form.password"
            type="password"
            placeholder="Password"
            required
          ></b-form-input>
        </b-form-group>

        <b-button type="submit" variant="primary" @click="register"
          >Submit</b-button
        >
      </b-form>
    </b-card>
    <center>
      <b-nav-item class="nav-link" href="/login">Login</b-nav-item>
    </center>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "RegisterView",
  data() {
    return {
      form: {},
      show: true,
    };
  },
  methods: {
    register() {
      if (this.form.username && this.form.password) {
        axios
          .post("http://127.0.0.1:8000/api/register", this.form)
          .then((response) => {
            if (response.data.success) {
              console.log('masuk');
              // localStorage.setItem("token", response.data.token);
              this.$router.push({ path: "/login" });
            }
          })
          .catch((err) => console.log(err));
      } else {
        this.$toast.error("Username Dan Password Harus diisi", {
          type: "error",
          position: "top-right",
          duration: 3000,
          dismissible: true,
        });
      }
    },
  },
};
</script>