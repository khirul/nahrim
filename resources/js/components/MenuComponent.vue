<template>
  <div>
    <div class="wrapper d-flex flex-column justify-content-center">
      <div class="bg-overlay">
        <div class="container d-flex flex-column justify-content-center">
          <div class="slide-box animated zoomIn delay-1s">
            <div class="title">
              <span class="tag">R</span>ainwater
              <span class="tag">H</span>arvesting
              <span class="tag">S</span>ystem
            </div>
            <div class="para pl-5 pr-5">
              <p>The Design Guide for Rainwater Harvesting Systems</p>
              <div class="small">( RBased on NAHRIM Technical Guide No 2 )</div>
            </div>
            <div class="box box01">
              <span class="menu d-flex align-items-start">Direct Pumping System</span>
              <div class="content text-justify p-3">
                <h4>Direct Pumping System</h4>
                <p>
                  The main purpose of this software is for predicting the size of therainwater tank to
                  be used for a rainwater harvesting system.
                </p>
                <p>
                  <button class="btn btn-outline-info btn-block" @click="direct">Next</button>
                </p>
              </div>
            </div>
            <div class="box box02">
              <span class="menu d-flex align-items-start">Indirect Pumping System</span>
              <div class="content text-justify p-3">
                <h5>Indirect Pumping System</h5>
                <p>Based on NAHRIM Technical Guide No 2:</p>
                <p>The Design Guide for Rainwater Harvesting Systems</p>
                <p>
                  <button class="btn btn-outline-info btn-block" @click="indirect">Next</button>
                </p>
              </div>
            </div>
            <div class="box box03">
              <span class="menu d-flex align-items-start">Gravity Fed System</span>
              <div class="content text-justify p-3">
                <h4>Gravity Fed System</h4>
                <p>
                  The main purpose of this software is for predicting the size of therainwater tank to
                  be used for a rainwater harvesting system.
                </p>
                <p>
                  <button class="btn btn-outline-info btn-block" @click="gravity">Next</button>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
      $(".box01").on("mouseover", function() {
        $(".box01").addClass("sliding");
      });
      $(".box01").on("mouseout", function() {
        $(".box01").removeClass("sliding");
      });
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
        name: "roof-area"
      });
    },
    module2() {
      this.$router.push({
        name: "landing02"
      });
    },
    mouseout() {
      this.show = false;
    },
    gravity() {
      this.$router.push({
        name: "roof-area"
      });
      this.$store.commit("MENU_TYPE", "gravity");
    },
    direct() {
      this.$router.push({
        name: "roof-area"
      });
      this.$store.commit("MENU_TYPE", "direct");
    },
    indirect() {
      this.$router.push({
        name: "roof-area"
      });
      this.$store.commit("MENU_TYPE", "indirect");
    }
  }
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css?family=Khand");
@import url("https://fonts.googleapis.com/css?family=Audiowide");
@import url("https://fonts.googleapis.com/css?family=Righteous");

.wrapper {
  height: 100vh;
  /* background: url("/images/rainbg.jpg") !important;
  background-size: cover;
  background-position: center; */
}

.bg-overlay {
  background: url("/images/rhs.jpg");
  padding: 100px;
  border-top: 5px solid rgba(128, 128, 128, 0.308);
  border-bottom: 5px solid rgba(128, 128, 128, 0.308);
}

.title {
  font-family: "Khand", sans-serif;
  font-size: 32px;
  color: black;
  position: absolute;
  top: 0;
  overflow: hidden;
}

.para {
  position: absolute;
  width: 650px;
  top: 50%;
  transform: translateY(-50%);
  overflow: hidden;
  font-size: 16px;
  color: white;
  background: rgba(0, 0, 0, 0.25);
  padding-top: 10px;
  padding-bottom: 10px;
}

.tag {
  color: rgb(255, 94, 0);
  font-size: 50px;
  font-family: "Audiowide", cursive;
}

.slide-box {
  /* border: 1px solid rgba(172, 172, 172, 0.247); */
  height: 300px;
  position: relative;
  overflow: hidden;
  background: url("/images/rhsi.jpg");
  background-size: cover;
  background-position: center;
}

.box {
  width: 150px;
  /* border: 1px solid rgba(128, 128, 128, 0.144); */
  height: 100%;
  float: right;
  transition: 0.5s;
  position: relative;
  overflow: hidden;
}
.box01 {
  background: url("/images/rhsi.jpg");
  background-size: cover;
}
.box02 {
  background: url("/images/calculation.jpg");
  background-size: cover;
}

.box03 {
  background: url("/images/water.jpg");
  background-size: cover;
}
.box01::before {
  content: "";
  display: block;
  background: linear-gradient(
    90deg,
    rgba(0, 247, 255, 0.25),
    rgba(255, 0, 0, 0)
  );
  width: 150px;
  height: 100%;
}
.box02::before {
  content: "";
  display: block;
  background: linear-gradient(
    90deg,
    rgba(0, 68, 255, 0.25),
    rgba(255, 0, 0, 0)
  );
  width: 150px;
  height: 100%;
}

.box03::before {
  content: "";
  display: block;
  background: linear-gradient(
    90deg,
    rgba(68, 0, 255, 0.25),
    rgba(255, 0, 0, 0)
  );
  width: 150px;
  height: 100%;
}

.menu {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  left: 0;
  writing-mode: vertical-lr;
  text-orientation: upright;
  font-family: "Righteous", cursive;
  font-weight: bold;
  font-size: 20px;
  color: rgb(255, 255, 255);
  width: 150px;
}

.content {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  left: 150px;
  font-family: "Khand", sans-serif;
  color: black;
}

.sliding {
  width: 450px;
  transition: 0.5s;
}
</style>
