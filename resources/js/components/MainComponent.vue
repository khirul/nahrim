<template>
  <div>
    <div class="wrapper">
      <div class="container d-flex flex-column justify-content-center">
        <div class="title animated zoomIn delay-1s">
          <span class="tag">N</span>ahrim <span class="tag">R</span>ainwater <span class="tag">H</span>arvesting <span class="tag">S</span>ystem <span class="tag">A</span>pplication
        </div>
        <div class="slide-box p-1 animated zoomIn delay-2s">
          <div class="box box02"></div>
          <div class="box box03"></div>
        </div>
      </div>
    </div>
    <!-- <div class="bar">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 logo-container d-flex justify-content-center align-items-center">
            <img
              src="/images/nahrimlogo.png"
              height="50"
              alt
            >
            <div class="logo text-center pl-3">NAHRIM RAINWATER HARVESTING SYSTEM APPLICATION</div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5 a ayaq"></div>
        <div
          class="col-md-4 a tangki d-flex flex-column justify-content-center align-items-center"
          @click="module1"
        >
          <h3>Tangki NAHRIM Simulation</h3>
          <p class="para text-center">The main purpose of this software is for predicting the size of the rainwater tank to be used for a rainwater harvesting system.</p>
          <p class="para1 text-center">Revised version of previous Tangki NAHRIM</p>
        </div>
        <div class="m col-md-3 a d-flex flex-column justify-content-center align-items-center">
          <img
            src="/images/jata01.png"
            class="img-fluid"
            alt
          >
          <span class="jata text-center pl-3 pr-3">National Hydraulic Research Institute of Malaysia</span>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 a tangki d-flex flex-column justify-content-center align-items-center">
          <h3>Rainwater Harvesting System Design</h3>
          <p class="para text-center">Based on NAHRIM Technical Guide No 2:</p>
          <p class="para text-center">The Design Guide for Rainwater Harvesting Systems</p>
        </div>
        <div class="n col-md-4 a p-5 d-flex flex-column justify-content-center align-items-center">
          <span class="para01 text-center mb-3">Rain Water Harvesting System</span>
          <carousel-component></carousel-component>
        </div>
        <div class="col-md-4 a d-flex align-items-center">
          <div
            id="carouselExampleSlidesOnly"
            class="carousel slide"
            data-ride="carousel"
            data-interval="3000"
          >
            <div class="carousel-inner cor text-center">
              <div class="carousel-item active">
                <span>Rainwater Harvesting System in just one click?</span>
              </div>
              <div class="carousel-item">
                <span>How big rainwater harvesting tank?</span>
              </div>
              <div class="carousel-item">
                <span>Design your Rainwater Harvesting System</span>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div> -->
  </div>
</template>

<script>
import CarouselComponent from "./CarouselComponent";
export default {
  components: {
    CarouselComponent
  },
  mounted() {
    $(document).ready(function() {
      $(".box02").on("mouseover", function() {
        $(".box02").addClass("sliding");
      });
      $(".box02").on("mouseout", function() {
        $(".box02").removeClass("sliding");
      });
      $(".box03").on("mouseover", function() {
        $(".box03").addClass("sliding");
      });
      $(".box03").on("mouseout", function() {
        $(".box03").removeClass("sliding");
      });
    });
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
@import url("https://fonts.googleapis.com/css?family=Khand");
@import url("https://fonts.googleapis.com/css?family=Audiowide");
body {
  background: white !important;
}
.wrapper {
  height: 100vh;
}
.title {
  font-family: "Khand", sans-serif;
  font-size: 32px;
  color: gray;
}
.tag {
  color: rgba(220, 20, 60, 0.596);
  font-size: 50px;
  font-family: "Audiowide", cursive;
}
.slide-box {
  border: 1px solid gray;
  height: 300px;
}
.box {
  width: 150px;
  border: 1px solid red;
  height: 100%;
  float: right;
  transition: 0.5s;
  margin-left: 5px;
}
.sliding {
  width: 450px;
  transition: 0.5s;
}
/* .bar {
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
.para1 {
  position: absolute;
  bottom: 0;
  font-size: 20px;
}
.jata {
  font-family: "Quicksand", sans-serif;
  font-size: 30px;
}
.tangki {
  cursor: pointer;
  position: relative;
} */
</style>