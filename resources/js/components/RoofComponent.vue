<template>
  <div>
    <div class="container">
      <div class="d-flex justify-content-center">
        <img src="/images/roof.png" height="100" alt>
      </div>

      <h1 class="text-center text-success">Roof Characteristics</h1>
      <div class="hr w-100"></div>
      <div class="row">
        <div class="col-md-7">
          <div class="d-flex flex-column align-items-around justify-content-center form">
            <div>
              <h2 class="mt-5">Roof Area Calculation</h2>
            </div>
            <div class="input-group d-flex align-items-center">
              <label for="length">Length</label>
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
            <div class="input-group d-flex align-items-center">
              <label for="width">Width</label>

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
            <div class="input-group d-flex align-items-center">
              <label for="width">Area</label>

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
          <div>
            <h2 class="mt-5">First Flush Volume Calculation</h2>
          </div>
          <div class="input-group d-flex align-items-center">
            <label for="length">
              1
              <sup>st</sup> Flush Depth
            </label>
            <input type="text" class="form-control" v-model="depth" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon2">mm</span>
            </div>
          </div>
          <div>
            <small class="rec">Recommended 1mm</small>
          </div>

          <div class="input-group d-flex align-items-center">
            <label for="length">
              1
              <sup>st</sup> Flush Volume
            </label>
            <input
              type="text"
              class="form-control"
              :value="flush"
              disabled
              aria-describedby="basic-addon2"
            >
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon2">
                mm
                <sup>3</sup>
              </span>
            </div>
          </div>

          <div>
            <h2 class="mt-5">Run-off Coefficient</h2>
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
          <button
            @click="next"
            class="btn btn-lg btn-success"
            style="margin-top: 20px; font-weight:bold;"
          >Next</button>
        </div>
        <div class="col-md-5 d-flex align-items-center justify-content-center">
          <img
            src="/images/roof.jpg"
            class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
            alt
          >
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="container h-100 w-100">
    <div
      class="row h-100 w-100 d-flex flex-column justify-content-center align-items-center wrapper"
    >
      <img src="/images/roof.png" height="100" alt>
      <h1 class="text-center text-success">Roof Characteristics</h1>
      <div class="hr w-100"></div>
      <div class="row">
        <div class="col-md-8">
          <div class="d-flex flex-row form">
            <div>
              <label for="length">Length</label>
              <input type="text" v-model="length">m
            </div>
            <span class="equal">x</span>
            <div>
              <label for="width">Width</label>
              <input type="text" v-model="width">m
            </div>
            <span class="equal">=</span>
            <div>
              <label for="area">Area</label>
              <input type="text" :value="area" disabled>m
              <sup>2</sup>
            </div>
          </div>
          <div class="flush d-flex flex-row">
            <div>
              <div>
                <label for="length">
                  1
                  <sup>st</sup> flush depth
                </label>
                <input type="text" v-model="depth">mm
              </div>
              <div>
                <small class="rec">Recommended 1mm</small>
              </div>
            </div>
            <span class="equal"></span>
            <div>
              <label for="volume">
                1
                <sup>st</sup> flush volume
              </label>
              <input type="text" :value="flush" disabled>m
              <sup>3</sup>
            </div>
          </div>
          <div class="type text-center">
            <h4>Type of Roof Surface</h4>
            <div class="text-right co">
              <span class="small">Run-off Coefficient</span>
            </div>
            <div class="d-flex flex-row sel">
              <select v-model="coefficient" @change="change">
                <option disabled value>Please select roof type</option>
                <option value="0.8">Concrete Tile</option>
                <option value="0.9">Zink / Metal</option>
                <option>Others</option>
              </select>
              <input v-if="others" type="text" disabled :value="coefficient">

              <input v-else type="number" min="0" max="1" step=".1" v-model="coefficient">
            </div>
          </div>
        </div>
        <div class="col-md-4">test</div>
      </div>
      <button
        @click="next"
        class="btn btn-success"
        style="margin-top: 20px; font-weight:bold;"
      >Continue</button>
    </div>
  </div>-->
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
  padding-left: 130px;
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
</style>
