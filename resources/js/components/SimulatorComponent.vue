<template>
  <div>
    <div class="container">
      <br>
      <div class="row h-100 w-100 d-flex flex-column justify-content-center align-items-center wrapper">
        <div class="info text-center">
          <h3>Location: {{ this.$store.state.location}}</h3>
          <h3>Data dari tahun {{yearsInfo[0]}} hingga {{yearsInfo[years-1]}}</h3>
        </div>
        <div class="changeForm mt-4">
          <h4 style="text-align:center">Proposed Tank Size</h4>
          <div class="input-group mb-3">
            <input
              type="text"
              class="form-control text-right"
              v-model="tanksize"
            >
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
          Run
          Simulation
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
            <div class="d-flex flex-column align-items-around justify-content-center form">
              <div class="input-group d-flex align-items-center">
                <label for="toilet">Rainwater Captured</label>
                <input
                  type="text"
                  disabled
                  class="form-control"
                  :value="results.total_captured"
                  aria-describedby="basic-addon2"
                >
                <div class="input-group-append">
                  <span
                    class="input-group-text"
                    id="basic-addon2"
                  >liter(s)</span>
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
                >
                <div class="input-group-append">
                  <span
                    class="input-group-text"
                    id="basic-addon2"
                  >liter(s)</span>
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
                >
                <div class="input-group-append">
                  <span
                    class="input-group-text"
                    id="basic-addon2"
                  >liter(s)</span>
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
                >
                <div class="input-group-append">
                  <span
                    class="input-group-text"
                    id="basic-addon2"
                  >days</span>
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
                >
                <div class="input-group-append">
                  <span
                    class="input-group-text"
                    id="basic-addon2"
                  >days</span>
                </div>
              </div>
              <div class="input-group d-flex align-items-center">
                <label for="toilet">No. of Days With No Rain and Tank Empty</label>
                <input
                  type="text"
                  disabled
                  class="form-control"
                  :value="results.norain_tankempty"
                  aria-describedby="basic-addon2"
                >
                <div class="input-group-append">
                  <span
                    class="input-group-text"
                    id="basic-addon2"
                  >days</span>
                </div>
              </div>

            </div>
          </div>
          <div class="col-md-6">
            <div>
              <h2 class="mt-5">Analysis Results</h2>
            </div>
            <div class="d-flex flex-column align-items-around justify-content-center form">
              <div class="input-group d-flex align-items-center">
                <label for="toilet">Reliability Ration</label>
                <input
                  type="text"
                  disabled
                  class="form-control"
                  :value="results.reliability"
                  aria-describedby="basic-addon2"
                >
                <div class="input-group-append">
                  <span
                    class="input-group-text"
                    id="basic-addon2"
                  >%</span>
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
                >
                <div class="input-group-append">
                  <span
                    class="input-group-text"
                    id="basic-addon2"
                  >%</span>
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
                >
                <div class="input-group-append">
                  <span
                    class="input-group-text"
                    id="basic-addon2"
                  >%</span>
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
                >
                <div class="input-group-append">
                  <span
                    class="input-group-text"
                    id="basic-addon2"
                  >%</span>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center">
      <div class=" btn-group">
        <button
          @click="back"
          class="btn btn-lg btn-success"
          style="margin-top: 20px; font-weight:bold;"
        >Back</button>

        <button
          @click="home"
          class="btn btn-lg btn-outline-success"
          style="margin-top: 20px; font-weight:bold;"
        >Home</button>
        <button
          @click="next"
          class="btn btn-lg btn-success"
          style="margin-top: 20px; font-weight:bold;"
        >Continue to Module 2</button>
        <router-link
          :to="{name: 'average'}"
          class="btn btn-lg btn-success "
          style="margin-top: 20px; font-weight:bold;"
        >More Info</router-link>
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
      raincap: ""
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
</style>
