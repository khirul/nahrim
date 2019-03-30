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
    <div class="container h-100 w-100">
      <div
        class="row h-100 w-100 d-flex flex-column justify-content-center align-items-center wrapper"
      >
        <img src="images/waterdrop.png" height="50" alt />
        <div style="font-size:18px" class="text-center text-primary">
          Daily Water Usage
        </div>
        <div class="hr w-100"></div>
        <div class="d-flex flex-row form">
          <div class="nop d-flex flex-column align-items-center">
            <label for="person" class="d-flex justify-content-center"
              >Number of Person</label
            >
            <br />
            <div class="pimg">
              <img src="images/minus.png" height="20" alt @click="minus" />
              <span v-for="x in person" :key="x.id">
                <img src="images/user-green.png" height="40" alt />
              </span>
              <img src="images/plus.png" height="20" alt @click="add" />
            </div>
            <small class="d-flex justify-content-center">
              <div class="input-group d-flex align-items-center">
                <input
                  id="countValue"
                  type="text"
                  class="form-control"
                  aria-describedby="basic-addon2"
                  :value="person.length"
                  @change="totalCount"
                />
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2">
                    person
                    <span v-if="person.length > 1">s</span>
                  </span>
                </div>
              </div>
            </small>
          </div>
          <!-- <span class="equal">=</span>
                <div>
                    <label for="area">Area</label>
                    <input type="text" :value="area" disabled>m<sup>2</sup>
        </div>-->
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <div>
                <div class="mt-5">
                  <b>Water Usage</b>
                </div>
              </div>
              <div
                class="d-flex flex-column align-items-around justify-content-center form"
              >
                <div class="input-group d-flex align-items-center">
                  <label for="toilet">Toilet Flushing</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model.number="toilet"
                    aria-describedby="basic-addon2"
                  />
                  <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"
                      >liter(s)</span
                    >
                  </div>
                </div>

                <div class="input-group d-flex align-items-center">
                  <label for="clean">General Cleaning</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model.number="clean"
                    aria-describedby="basic-addon2"
                  />
                  <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"
                      >liter(s)</span
                    >
                  </div>
                </div>

                <div class="input-group d-flex align-items-center">
                  <label for="garden">Gardening</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model.number="garden"
                    aria-describedby="basic-addon2"
                  />
                  <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"
                      >liter(s)</span
                    >
                  </div>
                </div>
                <div class="input-group d-flex align-items-center">
                  <label>Other</label>
                  <input
                    placeholder="Other item"
                    type="text"
                    class="form-control"
                    aria-describedby="basic-addon2"
                  />
                  <input
                    type="text"
                    class="form-control"
                    v-model.number="bath"
                    aria-describedby="basic-addon2"
                  />
                  <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"
                      >liter(s)</span
                    >
                  </div>
                </div>
                <div class="input-group d-flex align-items-center">
                  <label for="usagevol">Total Volume Per Day</label>
                  <input
                    type="text"
                    disabled
                    :value="usagevol"
                    class="form-control"
                    aria-describedby="basic-addon2"
                  />
                  <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"
                      >liter(s)</span
                    >
                  </div>
                </div>
                <div class="input-group d-flex align-items-center">
                  <label for="aveperson">Average Per Person</label>
                  <input
                    type="text"
                    disabled
                    :value="aveperson"
                    class="form-control"
                    aria-describedby="basic-addon2"
                  />
                  <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"
                      >liter(s)</span
                    >
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5"></div>
          </div>
        </div>

        <div class="d-flex flex-row form">
          <!-- <div class="pad">
                    <label for="cook">Cooking/Drinking</label><br>
                    <input type="text" v-model.number="cook">liter(s)
        </div>-->

          <!-- <div class="pad">
        <input type="text">-->
          <!-- <label for="bath">Bathing</label><br> -->
          <!-- <input
            type="text"
            v-model.number="bath"
          >liter(s)
        </div>-->

          <!-- <div class="pad">
                    <label for="wash">Washing</label><br>
                    <input type="text" v-model.number="wash">liter(s)
        </div>-->
        </div>
        <div class="hr w-100"></div>
        <div style="margin-bottom:70px;">
          <button
            @click="back"
            class="btn btn-sm btn-primary"
            style="margin-top: 20px; font-weight:bold;"
          >
            Back
          </button>

          <button
            @click="home"
            class="btn btn-sm btn-outline-primary"
            style="margin-top: 20px; font-weight:bold;"
          >
            Home
          </button>

          <button
            @click="next"
            class="btn btn-sm btn-primary"
            style="margin-top: 20px; font-weight:bold;"
          >
            Next
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      person: ["a"],
      cook: 0,
      bath: 0,
      wash: 0,
      toilet: 0,
      clean: 0,
      garden: 0
    };
  },
  computed: {
    usagevol() {
      return (
        this.cook +
        this.bath +
        this.wash +
        this.toilet +
        this.clean +
        this.garden
      );
    },
    aveperson() {
      return (
        (this.cook +
          this.bath +
          this.wash +
          this.toilet +
          this.clean +
          this.garden) /
        this.person.length
      ).toFixed(2);
    }
  },
  methods: {
    next() {
      this.$store.commit("SET_DEMAND", this.usagevol);
      this.$store.commit("SET_AVG", this.aveperson);
      this.$router.push("/simulator");
    },
    back() {
      this.$router.push({
        name: "roof"
      });
    },
    home() {
      this.$router.push({
        name: "root"
      });
    },
    add() {
      this.person.push("a");
    },
    minus() {
      if (this.person.length > 1) {
        this.person.pop("");
      } else {
        alert("Number of person must be greater than 1");
      }
    },
    totalCount({ type, target }) {
      this.person = [];
      for (let index = 0; index < target.value; index++) {
        this.person.push("a");
      }
    }
  }
};
</script>
<style scoped>
.hr {
  border-top: 1px solid rgb(165, 182, 235);
}

.form {
  margin: 20px auto;
}
.pimg {
  margin-bottom: 20px;
  text-align: center;
}
.nop {
  max-width: 960px;
}

.flush {
  padding: 20px 70px;
  margin-top: 20px;
  border: 2px solid white;
  border-radius: 10px;
}

label {
  width: 180px;
  padding: 15px 0;
}
/* label {
  display: block;
  padding-left: 10px;
  margin-bottom: -20px;
  font-size: small;
} */

.pad {
  margin-right: 20px;
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
  background: rgb(137, 179, 235);
  color: white;
}
.fourthstep {
  background: rgba(128, 128, 128, 0.24);
  color: grey;
}

.thirdstep i,
.fourthstep i {
  display: none;
}
</style>
