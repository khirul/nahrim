<template>
  <div>
    <div class="menu mb-5">
      <div class="container">
        <div class="row d-flex align-items-center justify-content-between">
          <div class="logo d-flex align-items-center">
            <img src="images/nahrimlogo.png" height="70" alt="" />
          </div>
          <!-- /.logo -->
          <div class="step d-flex align-items-center">
            <div
              class="steplist firststep d-flex align-items-center justify-content-between"
            >
              <div>
                <div class="small">Step 1:</div>
                <div class="step-name">
                  Rainfall Station
                </div>
                <div class="stationchosen">
                  <small
                    ><em>Location: </em>{{ this.$store.state.location }}</small
                  >
                </div>
              </div>

              <i
                class="far fa-check-circle"
                style="font-size: 28px; color: green"
              ></i>
            </div>
            <div
              class="steplist secondstep d-flex align-items-center justify-content-between"
            >
              <div>
                <div class="small">Step 2:</div>
                <div class="step-name">
                  Roof Characteristics
                </div>
                <div class="stationchosen">
                  <small
                    ><em>Coefficient: </em
                    >{{ this.$store.state.coefficient }}</small
                  >
                </div>
              </div>

              <i
                class="far fa-check-circle"
                style="font-size: 28px; color: green"
              ></i>
            </div>
            <div
              class="steplist thirdstep d-flex align-items-center justify-content-between"
            >
              <div>
                <div class="small">Step 3:</div>
                <div class="step-name">
                  Water Usage
                </div>
                <div class="stationchosen">
                  <small
                    ><em>Average/Person: </em
                    >{{ this.$store.state.aveperson }}</small
                  >
                </div>
              </div>

              <i
                class="far fa-check-circle"
                style="font-size: 28px; color: green"
              ></i>
            </div>
            <div
              class="steplist fourthstep d-flex align-items-center justify-content-between"
            >
              <div>
                <div class="small">Step 4:</div>
                <div class="step-name">
                  Calculation
                </div>
                <div class="stationchosen">
                  <small><em>Simulation: </em>Single / Range</small>
                </div>
              </div>

              <i
                class="far fa-check-circle"
                style="font-size: 28px; color: green"
              ></i>
            </div>
          </div>
          <!-- /.step -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
.menu {
  height: 100px;
  background: lightblue;
}
.steplist {
  padding: 5px 10px;
  height: 80px;
  width: 250px;
  margin-right: 5px;
}
.firststep {
  background: rgba(128, 128, 128, 0.24);
  color: grey;
}
.secondstep {
  background: rgb(137, 179, 235);
  color: white;
}
.thirdstep {
  background: rgba(128, 128, 128, 0.24);
  color: grey;
}
.fourthstep {
  background: rgba(128, 128, 128, 0.24);
  color: grey;
}
.secondstep i,
.thirdstep i,
.fourthstep i {
  display: none;
}
</style>