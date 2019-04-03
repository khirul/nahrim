<template>
  <div>
    <div class="container">
      <button @click="logout">logout</button>
    </div>
    <!-- /.container -->
  </div>
</template>

<script>
export default {
  methods: {
    logout() {
      this.$store
        .dispatch("logout")
        .then(response => {
          this.$router.push({ name: "root" });
        })
        .catch(e => {
          console.log(e);
        });
    }
  }
};
</script>

<style scoped>
</style>