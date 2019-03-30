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
    <div class="container">
      <br />
      <div
        class="row h-100 w-100 d-flex flex-column justify-content-center align-items-center wrapper"
      >
        <div class="info text-center">
          <h3>Location: {{ this.$store.state.location }}</h3>
          <h3>
            Data dari tahun {{ yearsInfo[0] }} hingga {{ yearsInfo[years - 1] }}
          </h3>
        </div>
        <div class="changeForm mt-4">
          <h4 style="text-align:center">Proposed Tank Size</h4>
          <div class="input-group mb-3">
            <input
              type="text"
              class="form-control text-right"
              v-model="tanksize"
            />
            <div class="input-group-append">
              <span class="input-group-text">
                m
                <sup>3</sup>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="row d-flex justify-content-center">
        <button
          @click="simulate"
          class="btn btn-success mr-2"
          style="margin-top: 20px; font-weight:bold;"
          v-if="sButton"
        >
          Run Simulation
        </button>
        <!-- <router-link :to="{name: 'root'}" class="btn btn-success" style="margin-top: 20px; font-weight:bold;"
        v-if="!sButton">Start Over?</router-link>-->
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div>
              <h2 class="mt-5">Simulation Results</h2>
            </div>
            <div
              class="d-flex flex-column align-items-around justify-content-center form"
            >
              <div class="input-group d-flex align-items-center">
                <label for="toilet">Rainwater Captured</label>
                <input
                  type="text"
                  disabled
                  class="form-control"
                  :value="results.total_captured"
                  aria-describedby="basic-addon2"
                />
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2"
                    >liter(s)</span
                  >
                </div>
              </div>
              <div class="input-group d-flex align-items-center">
                <label for="toilet">Total Rain Volume Delivered</label>
                <input
                  type="text"
                  disabled
                  class="form-control"
                  :value="results.total_delivered"
                  aria-describedby="basic-addon2"
                />
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2"
                    >liter(s)</span
                  >
                </div>
              </div>
              <div class="input-group d-flex align-items-center">
                <label for="toilet">Average Rain Delivered Per Day</label>
                <input
                  type="text"
                  disabled
                  class="form-control"
                  :value="results.daily_average_delivered"
                  aria-describedby="basic-addon2"
                />
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2"
                    >liter(s)</span
                  >
                </div>
              </div>
              <div class="input-group d-flex align-items-center">
                <label for="toilet">No. of Days Usage Volume Not Meet</label>
                <input
                  type="text"
                  disabled
                  class="form-control"
                  :value="results.volume_not_meet"
                  aria-describedby="basic-addon2"
                />
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2">days</span>
                </div>
              </div>
              <div class="input-group d-flex align-items-center">
                <label for="toilet">No. of Days With No Rain</label>
                <input
                  type="text"
                  disabled
                  class="form-control"
                  :value="results.total_no_rain_day"
                  aria-describedby="basic-addon2"
                />
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2">days</span>
                </div>
              </div>
              <div class="input-group d-flex align-items-center">
                <label for="toilet"
                  >No. of Days With No Rain and Tank Empty</label
                >
                <input
                  type="text"
                  disabled
                  class="form-control"
                  :value="results.norain_tankempty"
                  aria-describedby="basic-addon2"
                />
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2">days</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div>
              <h2 class="mt-5">Analysis Results</h2>
            </div>
            <div
              class="d-flex flex-column align-items-around justify-content-center form"
            >
              <div class="input-group d-flex align-items-center">
                <label for="toilet">Reliability Ration</label>
                <input
                  type="text"
                  disabled
                  class="form-control"
                  :value="results.reliability"
                  aria-describedby="basic-addon2"
                />
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2">%</span>
                </div>
              </div>
              <div class="input-group d-flex align-items-center">
                <label for="toilet">Coefficient of Rainwater Utalization</label>
                <input
                  type="text"
                  disabled
                  class="form-control"
                  :value="results.coefficient"
                  aria-describedby="basic-addon2"
                />
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2">%</span>
                </div>
              </div>
              <div class="input-group d-flex align-items-center">
                <label for="toilet">Storage Efficiency</label>
                <input
                  type="text"
                  disabled
                  class="form-control"
                  :value="results.storage_efficient"
                  aria-describedby="basic-addon2"
                />
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2">%</span>
                </div>
              </div>
              <div class="input-group d-flex align-items-center">
                <label for="toilet">Percent(%) Time Tank Empty</label>
                <input
                  type="text"
                  disabled
                  class="form-control"
                  :value="results.volume_not_meet"
                  aria-describedby="basic-addon2"
                />
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2">%</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- new calculation -->
    <div class="nc d-flex flex-column align-items-center">
      <h3>New Calculation</h3>
      <br />
      <div class="d-flex">
        <input type="number" name="start" v-model.number="start" />
        <input type="number" name="end" v-model.number="end" />
        <input type="text" name="step" v-model.number="step" />
        <button @click="calculate" v-if="uc">Calculate</button>
      </div>

      <div>
        <table class="table table-bordered mt-5" v-if="show">
          <tr>
            <td>Proposed Tank</td>
            <td v-for="r in range" :key="r.id">{{ r }}</td>
          </tr>
          <tr>
            <td>Coefficient</td>
            <td v-for="c in rr_coef" :key="c.id">{{ c }}</td>
          </tr>
          <tr>
            <td>Storage Coefficient</td>
            <td v-for="s in rr_st" :key="s.id">{{ s }}</td>
          </tr>
        </table>
      </div>
    </div>

    <!-- /new calculation -->
    <div class="text-center">
      <div class="btn-group">
        <button
          @click="back"
          class="btn btn-lg btn-success"
          style="margin-top: 20px; font-weight:bold;"
        >
          Back
        </button>

        <button
          @click="home"
          class="btn btn-lg btn-outline-success"
          style="margin-top: 20px; font-weight:bold;"
        >
          Home
        </button>
        <button
          @click="next"
          class="btn btn-lg btn-success"
          style="margin-top: 20px; font-weight:bold;"
        >
          Continue to Module 2
        </button>
        <router-link
          :to="{ name: 'average' }"
          class="btn btn-lg btn-success"
          style="margin-top: 20px; font-weight:bold;"
        >
          More Info
        </router-link>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      sButton: true,
      results: "",
      tanksize: this.$store.state.tankSize,
      raincap: "",
      start: "",
      end: "",
      step: "",
      range: [],
      rr_coef: [],
      rr_st: [],
      t: 0,
      uc: true,
      show: false
      //captured: results.total_captured
    };
  },

  mounted() {
    this.$store.dispatch("get_info");
  },
  computed: {
    rain() {
      return this.$store.state.info.monthlyTotal;
    },
    years() {
      return this.$store.state.info.totalYears;
    },
    yearsInfo() {
      return this.$store.state.info.years;
    },
    yearsTotal() {
      return this.$store.state.info.byyear;
    }
  },
  methods: {
    back() {
      this.$router.push({
        name: "usage"
      });
    },
    home() {
      this.$router.push({
        name: "root"
      });
    },
    next() {
      this.$router.push({
        name: "landing02"
      });
    },
    simulate() {
      // if (this.tankSize != '') {
      this.$store.commit("SET_TANKSIZE", this.tanksize);
      // }
      var data = {
        location: this.$store.state.location,
        area: this.$store.state.area,
        flush: this.$store.state.flush,
        coefficient: this.$store.state.coefficient,
        demand: this.$store.state.usagevol,
        average: this.$store.state.aveperson,
        tanksizes: this.tanksize
      };

      axios
        .post(this.$store.state.url + "/api/calc", data)
        .then(response => {
          //this.sButton = false;
          this.results = response.data;
          console.log(response.data);
          //this.$store.commit('SET_TOTAL_RAINCAP', this.results.total_captured);
        })
        .catch(e => console.log(e));
    },
    async calculate() {
      // this.uc = true;

      this.range = [];
      this.rr_coef = [];
      this.rr_st = [];
      this.t = 0;
      this.show = true;
      for (let index = this.start; index <= this.end; index += this.step) {
        this.range.push(index);

        var data = {
          location: this.$store.state.location,
          area: this.$store.state.area,
          flush: this.$store.state.flush,
          coefficient: this.$store.state.coefficient,
          demand: this.$store.state.usagevol,
          average: this.$store.state.aveperson,
          tanksizes: this.range[this.t]
        };

        await axios
          .post(this.$store.state.url + "/api/calc", data)
          .then(response => {
            //this.sButton = false;
            this.rr_coef.push(response.data.coefficient);
            this.rr_st.push(response.data.storage_efficient);
            this.$store.commit("SET_RANGE", this.range);
            this.$store.commit("SET_RR_COEF", this.rr_coef);
            this.$store.commit("SET_RR_ST", this.rr_st);
          })
          .catch(e => console.log(e));
        //console.log(this.range);

        console.log(this.rr_coef);
        this.t = this.t + 1;
      }
    }
  }
};
</script>
<style scoped>
.flush {
  padding: 20px 70px;
  margin-top: 20px;
  /* border: 2px solid white; */
  border-radius: 10px;
}

.input {
  padding: 0 5px;
  margin-right: 10px;
  text-align: right;
  border: none;
  border-radius: 20px;
  background-color: white;
  height: 30px;
  width: 300px;
}

input {
  text-align: right;
}

label {
  width: 300px;
  padding: 15px 0;
}

.input-group-text {
  width: 80px;
}

.pad {
  margin-right: 20px;
  margin-left: 20px;
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
  background: rgba(128, 128, 128, 0.24);
  color: white;
}
.thirdstep {
  background: rgba(128, 128, 128, 0.24);
  color: white;
}
.fourthstep {
  background: rgb(137, 179, 235);
  color: white;
}

.fourthstep i {
  display: none;
}
</style>
