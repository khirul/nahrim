<template>
  <div>
    <div class="container">
      <br>
      <div class="row h-100 w-100 d-flex flex-column justify-content-center align-items-center wrapper">
        <div class="changeForm">
          <h4 style="text-align:center">Tank Size</h4>
          <div class="input-group mb-3">
            <input
              type="text"
              class="form-control text-right"
              v-model="tanksize"
            >
            <div class="input-group-append">
              <span class="input-group-text">m<sup>3</sup></span>
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
        >Run
          Simulation</button>
        <!-- <router-link :to="{name: 'root'}" class="btn btn-success" style="margin-top: 20px; font-weight:bold;"
                    v-if="!sButton">Start Over?</router-link> -->
        <button
          @click="next"
          class="btn btn-success"
          style="margin-top: 20px; font-weight:bold;"
        >Continue</button>
      </div>
      <div class="row d-flex justify-content-center">
        <router-link
          :to="{name: 'average'}"
          class="btn btn-success mr-2"
          style="margin-top: 20px; font-weight:bold;"
        >More Info</router-link>
        <!-- <router-link :to="{name: 'root'}" class="btn btn-success" style="margin-top: 20px; font-weight:bold;"
                    v-if="!sButton">Start Over?</router-link> -->
      </div>
      <br><br>
      <div class="flush">
        <div style="text-align: center">
          <h4>Simulation Results</h4>
        </div>
        <div class="d-flex flex-row justify-content-center align-items-center wrapper">
          <div class="pad">
            <div style="text-align:center">Rainwater Captured:</div>
            <div class="input">
              <h5>{{results.total_captured}} m<sup>3</sup></h5>
            </div>
          </div>
          <!-- <span class="equal">x</span> -->
          <div class="pad">
            <div style="text-align:center">Total Rain Volume Delivered:</div>
            <div class="input">
              <h5>
                {{results.total_delivered}} m<sup>3</sup></h5>
            </div>
          </div>
          <!-- <span class="equal">=</span> -->
          <div class="pad">
            <div style="text-align:center"> Average Rain Delivered Per Day:
            </div>
            <div class="input">
              <h5>{{results.daily_average_delivered}} m<sup>3</sup></h5>
            </div>
          </div>
        </div><br>
        <div class="d-flex flex-row justify-content-center align-items-center wrapper">
          <div class="pad">
            <div style="text-align:center">No. of Days Usage Volume Not Meet:</div>
            <div class="input">
              <h5>{{results.volume_not_meet}} days</h5>
            </div>
          </div>
          <!-- <span class="equal">x</span> -->
          <div class="pad">
            <div style="text-align:center">No. of Days With No Rain:</div>
            <div class="input">
              <h5>{{results.total_no_rain_day}} days</h5>
            </div>
          </div>
          <!-- <span class="equal">=</span> -->
          <div class="pad">
            <div style="text-align:center">No. of Days With No Rain and Tank Empty:</div>
            <div class="input">
              <h5>{{results.norain_tankempty}} days</h5>
            </div>
          </div>

        </div>
        <div class="flush">
          <div style="text-align: center">
            <h4>Analysis Results</h4>
          </div>
          <div class="d-flex flex-row justify-content-center align-items-center wrapper">
            <div class="pad">
              <div style="text-align:center">Reliability Ration:</div>
              <div class="input">
                <h5>{{results.reliability}} %</h5>
              </div>
            </div>
            <!-- <span class="equal">x</span> -->
            <div class="pad">
              <div style="text-align:center">Coefficient of Rainwater Utalization:</div>
              <div class="input">
                <h5>{{results.coefficient}} %</h5>
              </div>
            </div>
            <!-- <span class="equal">=</span> -->
            <!-- <div class="pad">
                            <div style="text-align:center"> Average Rain Delivered Per Day:
                            </div>
                            <div class="input">
                                <h5>{{results.daily_average_delivered}} m<sup>3</sup></h5>
                            </div>
                        </div> -->
          </div><br>
          <div class="d-flex flex-row justify-content-center align-items-center wrapper">
            <div class="pad">
              <div style="text-align:center">Storage Efficiency:</div>
              <div class="input">
                <h5>{{results.storage_efficient}} %</h5>
              </div>
            </div>
            <!-- <span class="equal">x</span> -->
            <div class="pad">
              <div style="text-align:center">Percent(%) Time Tank Empty:</div>
              <div class="input">
                <h5>{{results.percent_tank_empty}} %</h5>
              </div>
            </div>
            <!-- <span class="equal">=</span> -->
            <!-- <div class="pad">
                            <div style="text-align:center">No. of Days With No Rain and Tank Empty:</div>
                            <div class="input">
                                <h5>{{results.norain_tankempty}} m<sup>3</sup></h5>
                            </div>
                        </div> -->

          </div>
        </div>
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
  methods: {
    next() {
      this.$router.push({
        name: "menu"
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
  border: 2px solid white;
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

.pad {
  margin-right: 20px;
  margin-left: 20px;
}
</style>
