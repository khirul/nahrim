<template>
  <div>
    <navbar-component></navbar-component>
    <div class="container">
      <div class="row">
        <div class="login">
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" v-model="username">
          </div>
          <div class="form-group">
            <label for="username">Password:</label>
            <input type="password" class="form-control" v-model="password">
          </div>
          <div class="form-group">
            <button class="btn btn-primary" @click="login">Login</button>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </div>
</template>

<script>
import NavbarComponent from "./NavbarComponent";
export default {
  data() {
    return {
      username: "",
      password: "",
      error: ""
    };
  },
  components: { NavbarComponent },
  methods: {
    login() {
      this.$store
        .dispatch("login", {
          username: this.username,
          password: this.password
        })
        .then(response => {
          this.$router.push({ name: "admin" });
        })
        .catch(e => {
          this.error = "Wrong Credentials. Please try again";
        });
    }
  }
};
</script>

<style scoped>
</style>