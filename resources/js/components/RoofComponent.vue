<template>
  <div class="container h-100 w-100">
    <div
      class="row h-100 w-100 d-flex flex-column justify-content-center align-items-center wrapper"
    >
      <img src="/images/roof.png" height="100" alt>
      <h1 class="text-center text-success">Roof Characteristics</h1>
      <div class="hr w-100"></div>
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
        <button
          @click="next"
          class="btn btn-success"
          style="margin-top: 20px; font-weight:bold;"
        >Continue</button>
      </div>
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

.hr {
  border-top: 1px solid rgb(165, 182, 235);
}

.form {
  margin-top: 20px;
}

label {
  display: block;
  padding-left: 10px;
  margin-bottom: 0;
  font-size: small;
}

input {
  padding: 0 5px;
  margin-right: 10px;
  text-align: right;
  border: none;
  border-radius: 20px;
}

.equal {
  margin-top: 20px;
  margin-right: 10px;
  margin-left: 10px;
}

.flush {
  padding: 20px 70px;
  margin-top: 20px;
  border: 2px solid white;
  border-radius: 10px;
}

.rec {
  padding-left: 30px;
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
