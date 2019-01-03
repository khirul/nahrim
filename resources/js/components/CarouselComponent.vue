<template>
  <div>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active" @click="gravity">
          <img src="/images/pump3.png" width="200" alt>
          <span class="gravity d-flex flex-column">Gravity Fed System</span>
        </div>
        <div class="carousel-item" @click="indirect">
          <img src="/images/pump1.png" width="200" alt>
          <span class="gravity d-flex flex-column">Indirect Pumping System</span>
        </div>
        <div class="carousel-item" @click="direct">
          <img src="/images/pump2.png" width="200" alt>
          <span class="gravity d-flex flex-column">Direct Pumping System</span>
        </div>
      </div>
      <a
        class="carousel-control-prev"
        href="#carouselExampleControls"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="carousel-control-next"
        href="#carouselExampleControls"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      show: false
    };
  },
  methods: {
    module1() {
      this.$router.push({
        name: "station"
      });
    },
    module2() {
      this.show = true;
    },
    mouseout() {
      this.show = false;
    },
    gravity() {
      this.$router.push({
        name: "gravity-fed"
      });
      this.$store.commit("MENU_TYPE", "gravity");
    },
    direct() {
      this.$router.push({
        name: "gravity-fed"
      });
      this.$store.commit("MENU_TYPE", "direct");
    },
    indirect() {
      this.$router.push({
        name: "gravity-fed"
      });
      this.$store.commit("MENU_TYPE", "indirect");
    }
  }
};
</script>

<style scoped>
.gravity {
  font-size: 30px;
  color: azure;
}
.carousel-item {
  width: 300px;
  text-align: center;
  height: 220px;
  cursor: pointer;
}
</style>