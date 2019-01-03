<template>
  <div class="container h-100 w-100">
    <div
      class="row h-100 w-100 d-flex flex-column justify-content-center align-items-center wrapper"
    >
      <img src="images/waterdrop.png" height="100" alt>
      <h1 class="text-center text-success">Daily Water Usage</h1>
      <div class="hr w-100"></div>
      <div class="d-flex flex-row form">
        <!-- <div>
                    <label for="length">Length</label>
                    <input type="text" v-model.number="length">m
                </div>
        <span class="equal">x</span>-->
        <div>
          <label for="person" class="d-flex justify-content-center">Number of Person</label>
          <br>
          <div class="d-flex justify-content-center align-items-center">
            <img src="images/minus.png" height="20" alt @click="minus">
            <span v-for="x in person" :key="x.id">
              <img src="images/user-green.png" height="40" alt>
            </span>
            <img src="images/plus.png" height="20" alt @click="add">
          </div>
          <small class="d-flex justify-content-center">
            {{person.length}} person
            <span v-if="person.length > 1">s</span>
          </small>
        </div>
        <!-- <span class="equal">=</span>
                <div>
                    <label for="area">Area</label>
                    <input type="text" :value="area" disabled>m<sup>2</sup>
        </div>-->
      </div>

      <div class="d-flex flex-row form">
        <div class="pad">
          <label for="toilet">Toilet Flushing</label>
          <br>
          <input type="text" v-model.number="toilet">liter(s)
        </div>
        <!-- <span class="equal">x</span> -->
        <div class="pad">
          <label for="clean">General Cleaning</label>
          <br>
          <input type="text" v-model.number="clean">liter(s)
        </div>
        <!-- <span class="equal">=</span> -->
        <div class="pad">
          <label for="garden">Gardening</label>
          <br>
          <input type="text" v-model.number="garden">liter(s)
        </div>
      </div>

      <div class="d-flex flex-row form">
        <!-- <div class="pad">
                    <label for="cook">Cooking/Drinking</label><br>
                    <input type="text" v-model.number="cook">liter(s)
        </div>-->
        <div class="pad">
          <input type="text">
          <!-- <label for="bath">Bathing</label><br> -->
          <input type="text" v-model.number="bath">liter(s)
        </div>

        <!-- <div class="pad">
                    <label for="wash">Washing</label><br>
                    <input type="text" v-model.number="wash">liter(s)
        </div>-->
      </div>

      <div class="flush d-flex flex-row">
        <div class="d-flex flex-row">
          <div class="pad">
            <label for="usagevol">Total Volume Per Day</label>
            <br>
            <input type="text" disabled :value="usagevol">liter
          </div>
          <div>
            <label for="aveperson">Average Per Person</label>
            <br>
            <input type="text" disabled :value="aveperson">liter
          </div>
        </div>
        <!-- <div>
                    <label for="volume">1<sup>st</sup> flush volume</label>
                    <input type="text" :value="volume" disabled>m<sup>3</sup>
        </div>-->
      </div>
      <button
        @click="next"
        class="btn btn-success"
        style="margin-top: 20px; font-weight:bold;"
      >Run Simulation</button>
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
    add() {
      this.person.push("a");
    },
    minus() {
      if (this.person.length > 1) {
        this.person.pop("");
      } else {
        alert("Number of person must be greater than 1");
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
  margin-top: 20px;
}

input {
  padding: 0 5px;
  margin-right: 10px;
  text-align: right;
  border: none;
  border-radius: 20px;
}

.flush {
  padding: 20px 70px;
  margin-top: 20px;
  border: 2px solid white;
  border-radius: 10px;
}

label {
  display: block;
  padding-left: 10px;
  margin-bottom: -20px;
  font-size: small;
}

.pad {
  margin-right: 20px;
}
</style>
