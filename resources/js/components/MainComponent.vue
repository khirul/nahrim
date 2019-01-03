<template>
  <div>
    <div class="bar">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 logo-container d-flex justify-content-center align-items-center">
            <img src="/images/nahrimlogo.png" height="50" alt>
            <div class="logo text-center pl-3">TANGKI NAHRIM APP</div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.bar -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5 a ayaq"></div>
        <div
          class="col-md-4 a tangki d-flex flex-column justify-content-center align-items-center"
          @click="module1"
        >
          <h3>Tank Simulation</h3>
          <p
            class="para text-center"
          >The main purpose of this software is for predicting the size of the rainwater tank to be used for a rainwater harvesting system.</p>
        </div>
        <div class="m col-md-3 a d-flex flex-column justify-content-center align-items-center">
          <img src="/images/jata01.png" height="250" alt>
          <span class="jata text-center pl-3 pr-3">National Hydraulic Research Institute of Malaysia</span>
        </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-md-4 a d-flex align-items-center">
          <div
            id="carouselExampleSlidesOnly"
            class="carousel slide"
            data-ride="carousel"
            data-interval="3000"
          >
            <div class="carousel-inner cor text-center">
              <div class="carousel-item active">
                <span>Interested in installing a rainwater harvesting system?</span>
              </div>
              <div class="carousel-item">
                <span>How big should your tank be?</span>
              </div>
              <div class="carousel-item">
                <span>How to make the most of the rainfall in your area?</span>
              </div>
              <div class="carousel-item">
                <span>
                  <span class="nahrim">TANGKI NAHRIM APP</span>
                  <br>help you estimate your rainwater harvesting tank size.
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="n col-md-4 a p-5 d-flex flex-column justify-content-center align-items-center">
          <span class="para01 text-center mb-3">Rain Water Harvesting System</span>
          <carousel-component></carousel-component>
        </div>
        <div class="col-md-4 a"></div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
</template>

<script>
import CarouselComponent from "./CarouselComponent";
export default {
  components: {
    CarouselComponent
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
@import url("https://fonts.googleapis.com/css?family=Quicksand");
body {
  background: white !important;
}
.bar {
  border: 2px solid black;
  border-top: 4px solid black;
  margin-top: 20px;
}
.cor span {
  font-family: "Quicksand", sans-serif;
  font-size: 30px;
}
.carousel-item {
  width: 600px;
  height: 150px;
}
.logo-container {
  background: rgb(110, 106, 106);
  line-height: 80px;
  border-right: 4px solid black;
}
.logo {
  font-size: 32px;
  color: azure;
}
.n {
  background: rgb(172, 172, 172);
}
.m {
  background: lightgrey;
}
.a {
  border: 2px solid black;
  padding: 0;
  min-height: 500px;
}
.ayaq {
  background: url("/images/ayaq001.gif");
  background-size: cover;
}
.nahrim {
  color: lightgrey;
  font-weight: bolder;
  background-color: black;
}
.para {
  padding: 0 150px;
  font-family: "Quicksand", sans-serif;
  font-size: 20px;
}
.para01 {
  padding: 0 50px;
  color: azure;
  font-family: "Quicksand", sans-serif;
  font-size: 24px;
  font-weight: bold;
}
.jata {
  font-family: "Quicksand", sans-serif;
  font-size: 30px;
}
.tangki {
  cursor: pointer;
}
</style>