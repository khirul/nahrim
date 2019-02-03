<template>
  <div>
    <div class="wrapper d-flex flex-column justify-content-center">
      <div class="bg-overlay ">
        <div class="container d-flex flex-column justify-content-center">

          <div class="slide-box animated zoomIn delay-1s">
            <div class="title">
              <span class="tag">N</span>ahrim <span class="tag">R</span>ainwater <span class="tag">H</span>arvesting <span class="tag">S</span>ystem <span class="tag">A</span>pplication
            </div>
            <div class="para pl-5 pr-5">
              <p>How big rainwater harvesting tank? Rainwater Harvesting System in just one click? Design your Rainwater Harvesting System</p>
              <div class="small">( Revised version of previous Tangki NAHRIM )</div>
            </div>
            <div class="box box02">
              <span class="menu d-flex align-items-start">SECTION 02</span>
            </div>
            <div class="box box03">
              <span class="menu d-flex align-items-start">SECTION 01</span>
              <div class="content text-justify p-3">
                <p>The main purpose of this software is for predicting the size of therainwater tank to be used for a rainwater harvesting system.</p>
                <p>
                  <button
                    class="btn btn-outline-info btn-block"
                    @click="module1"
                  >Next</button>
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
@import url("https://fonts.googleapis.com/css?family=Righteous");

.wrapper {
  height: 100vh;
  /* background: url("/images/rainbg.jpg") !important;
  background-size: cover;
  background-position: center; */
}
.bg-overlay {
  background: url("/images/mainbgc.jpg");
  padding: 100px;
  border-top: 5px solid rgba(128, 128, 128, 0.308);
  border-bottom: 5px solid rgba(128, 128, 128, 0.308);
}
.title {
  font-family: "Khand", sans-serif;
  font-size: 32px;
  color: gray;
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
  background: rgba(0, 110, 255, 0.25);
  padding-top: 10px;
  padding-bottom: 10px;
}
.tag {
  color: rgba(0, 110, 255, 0.25);
  font-size: 50px;
  font-family: "Audiowide", cursive;
}
.slide-box {
  /* border: 1px solid rgba(172, 172, 172, 0.247); */
  height: 300px;
  position: relative;
  overflow: hidden;
  background: url("/images/mainbg.jpg");
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

.box02 {
  background: url("/images/calculation.jpg");
  background-size: cover;
}
.box03 {
  background: url("/images/water.jpg");
  background-size: cover;
}
.box02::before {
  content: "";
  display: block;
  background: linear-gradient(
    90deg,
    rgba(51, 255, 0, 0.25),
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
    rgba(0, 110, 255, 0.25),
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
  font-size: 32px;
  color: rgb(255, 255, 255);
  width: 150px;
}
.content {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  left: 150px;
  font-family: "Khand", sans-serif;
}
.sliding {
  width: 450px;
  transition: 0.5s;
}
</style>