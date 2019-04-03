<template>
  <div>
    <navbar-component></navbar-component>
    <div class="container">
      <!-- <div class="d-flex justify-content-center pt-5">
        <img src="/images/tank1.png" height="100" alt>
      </div>

      <h1 class="text-center text-primary">Rainwater Harvesting Systems</h1>-->

      <div class="row">
        <div class="d-flex flex-column align-items-around justify-content-center form">
          <div>
            <h4 class="mt-3">
              NAHRIM Technical Guide No. 2: The Design Guide for Rainwater Harvesting
              Systems (2014)
            </h4>
            <div class="hr w-100"></div>
            <div class="d-flex justify-content-center pt-5">
              <img src="/images/main_page1.jpg" height="350" alt>
            </div>
            <div class="border border-info pl-3 pr-3 mt-3">
              <h5 class="pt-3">OBJECTIVES:</h5>
              <p>
                To provide an easy-to-follow guide to the public/users in designing and installing a
                <span>RWHS for residential use.</span>
              </p>
              <p>
                To give same ideas to the public how a
                <span>typical RWHS functions</span> through the
                illustrations
                of the various components of the system
              </p>
              <p>
                It is a design guide for the
                <span>typical residential systems</span> and easy to
                understand/follow
                by the public/users
              </p>
            </div>

            <div class="border border-info pl-3 pr-3 mt-3">
              <h4
                class="pt-3"
              >This application is divided into 3 types of rainwater harvesting design:</h4>
              <div>
                <h4 class="mt-5">1. Gravity Fed System</h4>

                <div class="d-flex justify-content-center border border-info mt-3">
                  <img src="/images/gravity_fed2.jpg" height="350" alt>
                </div>
                <h5 class="text-center">Single Storey</h5>
                <div class="d-flex justify-content-center border border-info mt-3">
                  <img src="/images/gravity_fed1.jpg" height="350" alt>
                </div>
                <h5 class="text-center">Double Storey</h5>
              </div>
              <div>
                <h4 class="mt-5">2. Indirect Pumping System</h4>
                <div class="d-flex justify-content-center border border-info mt-3">
                  <img src="/images/pump_in1.jpg" height="350" alt>
                </div>
                <h5 class="text-center">Single Storey – Above Ground Tank</h5>
                <div class="d-flex justify-content-center border border-info mt-3">
                  <img src="/images/pump_in2.jpg" height="350" alt>
                </div>
                <h5 class="text-center">Double Storey – Above Ground Tank</h5>
              </div>
              <div>
                <h4 class="mt-5">3. Direct Pumping System</h4>
                <div class="row border border-info justify-content-center mr-1 ml-1 mt-3">
                  <div class="mt-3 pr-5">
                    <img src="/images/pump_out1a.jpg" height="350" alt>
                  </div>
                  <div class="d-flex justify-content-center mt-3">
                    <img src="/images/pump_out1b.jpg" height="350" alt>
                  </div>
                </div>

                <h5 class="text-center">Single Storey – Underground Tank</h5>
                <div class="row border border-info justify-content-center mr-1 ml-1 mt-3">
                  <div class="mt-3 pr-5">
                    <img src="/images/pump_out2a.jpg" height="350" alt>
                  </div>
                  <div class="d-flex justify-content-center mt-3">
                    <img src="/images/pump_out2b.jpg" height="350" alt>
                  </div>
                </div>
                <h5 class="text-center">Double Storey – Underground Tank</h5>
              </div>
            </div>
            <div class="d-flex justify-content-center" style="margin-bottom:70px;">
              <button
                @click="back"
                class="btn btn-sm btn-primary mr-1"
                style="margin-top: 20px; font-weight:bold;"
              >Back</button>

              <button
                @click="home"
                class="btn btn-sm btn-outline-primary mr-1"
                style="margin-top: 20px; font-weight:bold;"
              >Home</button>

              <button
                @click="next"
                class="btn btn-sm btn-primary"
                style="margin-top: 20px; font-weight:bold;"
              >Next</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import NavbarComponent from "./NavbarComponent";
export default {
  components: {
    NavbarComponent
  },
  methods: {
    next() {
      this.$router.push({
        name: "menu"
      });
    },
    back() {
      this.$router.push({
        name: "root"
      });
    },
    home() {
      this.$router.push({
        name: "root"
      });
    }
  }
};
</script>

<style scoped>
.hr {
  border-top: 1px solid rgb(165, 182, 235);
}

span {
  color: rgb(58, 58, 255);
}
</style>
