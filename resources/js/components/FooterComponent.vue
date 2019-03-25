<template>
  <div>
    <div class="footer d-flex align-items-center justify-content-center">
      <small>&copy;{{ current_year }} Nahrim App. All Right Reserved</small>
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    current_year() {
      return new Date().getFullYear();
    }
  }
};
</script>

<style scoped>
.footer {
  position: fixed;
  bottom: 0;
  height: 50px;
  width: 100vw;
  background: black;
  margin-top: 30px;
  color: gray;
}
</style>