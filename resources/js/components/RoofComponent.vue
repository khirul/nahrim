<template>
  <div>
    <div class="menu mb-5">
      <div class="container">
        <div class="row d-flex align-items-center justify-content-between">
          <div class="logo d-flex align-items-center">
            <img src="images/nahrimlogo.png" height="70" alt>
          </div>
          <!-- /.logo -->
          <div class="step d-flex align-items-center">
            <div class="steplist firststep d-flex align-items-center justify-content-between">
              <div>
                <div class="small">Step 1:</div>
                <div class="step-name">Rainfall Station</div>
                <div class="stationchosen">
                  <small>
                    <em>Location:</em>
                    {{ this.$store.state.location }}
                  </small>
                </div>
              </div>

              <i class="far fa-check-circle" style="font-size: 28px; color: green"></i>
            </div>
            <div class="steplist secondstep d-flex align-items-center justify-content-between">
              <div>
                <div class="small">Step 2:</div>
                <div class="step-name">Roof Characteristics</div>
                <div class="stationchosen">
                  <small>
                    <em>Coefficient:</em>
                    {{ this.$store.state.coefficient }}
                  </small>
                </div>
              </div>

              <i class="far fa-check-circle" style="font-size: 28px; color: green"></i>
            </div>
            <div class="steplist thirdstep d-flex align-items-center justify-content-between">
              <div>
                <div class="small">Step 3:</div>
                <div class="step-name">Water Usage</div>
                <div class="stationchosen">
                  <small>
                    <em>Average/Person:</em>
                    {{ this.$store.state.aveperson }}
                  </small>
                </div>
              </div>

              <i class="far fa-check-circle" style="font-size: 28px; color: green"></i>
            </div>
            <div class="steplist fourthstep d-flex align-items-center justify-content-between">
              <div>
                <div class="small">Step 4:</div>
                <div class="step-name">Calculation</div>
                <div class="stationchosen">
                  <small>
                    <em>Simulation:</em>Single / Range
                  </small>
                </div>
              </div>

              <i class="far fa-check-circle" style="font-size: 28px; color: green"></i>
            </div>
          </div>
          <!-- /.step -->
        </div>
      </div>
    </div>
    <div class="container">
      <!-- <div class="d-flex justify-content-center">
        <img src="/images/roof.png" height="100" alt>
      </div>-->

      <div class="text-center rc">Roof Characteristics</div>
      <div class="hr w-100 mb-5"></div>
      <div class="row">
        <div class="col-md-7">
          <div class="d-flex align-items-around justify-content-center form">
            <div class="col-md-6">
              <div>
                <div class="mt-5">Roof Area Calculation</div>
              </div>
              <div class="input-group d-flex align-items-center">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon2-prepend">Length</span>
                </div>
                <input
                  type="text"
                  class="form-control"
                  v-model="length"
                  aria-describedby="basic-addon2"
                >
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2">m</span>
                </div>
              </div>

              <!-- <span class="equal pl-3">x</span> -->
              <div class="input-group d-flex align-items-center mt-1">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon2-prepend">Width</span>
                </div>

                <input
                  type="text"
                  class="form-control"
                  v-model="width"
                  aria-describedby="basic-addon2"
                >
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2">m</span>
                </div>
              </div>

              <!-- <span class="equal d-flex align-self-center">=</span> -->
              <div class="input-group d-flex align-items-center mt-1">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon2-prepend">Area</span>
                </div>

                <input
                  type="text"
                  class="form-control"
                  :value="area"
                  disabled
                  aria-describedby="basic-addon2"
                >
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2">
                    m
                    <sup>2</sup>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div>
                <div class="mt-5">First Flush Volume Calculation</div>
                <div class="input-group d-flex align-items-center">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon2-prepend">
                      1
                      <sup>st</sup> Flush Depth
                    </span>
                  </div>

                  <input
                    type="text"
                    class="form-control"
                    v-model="depth"
                    aria-describedby="basic-addon2"
                  >
                  <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">mm</span>
                  </div>
                </div>
              </div>

              <div class="d-flex justify-content-end pr-1">
                <small class="rec">Recommended 1mm</small>
              </div>

              <div class="input-group d-flex align-items-center">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon2-prepend">
                    1
                    <sup>st</sup> Flush Volume
                  </span>
                </div>
                <input
                  type="text"
                  class="form-control"
                  :value="flush"
                  disabled
                  aria-describedby="basic-addon2"
                >
                <div class="input-group-append">
                  <span class="input-group-text adleft" id="basic-addon2">
                    mm
                    <sup>3</sup>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div>
            <div class="mt-5">Run-off Coefficient</div>
          </div>
          <div class="d-flex flex-row">
            <select v-model="coefficient" @change="change" class="form-control mr-1">
              <option disabled value>Please select roof type</option>
              <option value="0.8">Concrete Tile</option>
              <option value="0.9">Zink / Metal</option>
              <option>Others</option>
            </select>
            <input v-if="others" type="text" disabled :value="coefficient" class="form-control">
            <input
              v-else
              type="number"
              min="0"
              max="1"
              step=".1"
              v-model="coefficient"
              class="form-control"
            >
          </div>
        </div>
        <div class="roof col-md-5 d-flex align-items-center justify-content-center">
          <img src="/images/roof01.png" class="img-fluid" alt>
        </div>
      </div>
      <div class="hr w-100 mt-5"></div>
    </div>

    <div class="btnav d-flex justify-content-center">
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
</template>
<script>
export default {
  data() {
    return {
      length: 0,
      width: 0,
      depth: 1,
      coefficient: "",
      others: true
    };
  },
  methods: {
    next() {
      this.$store.commit("SET_AREA", this.area);
      this.$store.commit("SET_COEF", this.coefficient);
      this.$store.commit("SET_FLUSH", this.flush);
      this.$router.push({
        name: "usage"
      });
    },
    back() {
      this.$router.push({
        name: "station"
      });
    },
    home() {
      this.$router.push({
        name: "root"
      });
    },
    change() {
      if (this.coefficient == "Others") {
        this.others = false;
      } else {
        this.others = true;
      }
    }
  },
  computed: {
    area() {
      return this.length * this.width;
    },
    flush() {
      return (this.area * this.depth) / 1000;
    }
  }
};
</script>
<style scoped>
.rc {
  font-size: 18px;
}
.wrapper img {
  margin-right: 20px;
  border-radius: 50%;
}
label {
  width: 130px;
  padding: 15px 0;
}
input {
  text-align: right;
}
#basic-addon2 {
  width: 50px;
  text-align: center;
}
#basic-addon2-prepend {
  width: 130px;
  background: lightblue;
  color: white;
  border: 1px solid lightblue;
}
.hr {
  border-top: 1px solid rgb(165, 182, 235);
}

.flush {
  padding: 20px 70px;
  margin-top: 20px;
  border: 2px solid white;
  border-radius: 10px;
}

.rec {
  font-style: italic;
}

.co {
  padding-right: 20px;
}

.type {
  margin-top: 50px;
}

.type > .sel > input {
  margin-left: 20px;
}
.roof {
  border: 3px solid lightblue;
  padding: 10px 10px;
}
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
  color: white;
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
  display: none !important;
}
.btnav {
  margin-bottom: 100px;
}
</style>
