<template>
  <div>
    <div class="container">
      <!-- <div class="row">
                <div class="roof text-left">Roof Catchment Run-off:</div>
                <hr>
      </div>-->
      <div class="row roof">
        <span>Roof Catchment Run-off:</span>
      </div>

      <div class="row d-flex flex-column roof-detail">
        <label for="coeff">Run-off Coefficient :</label>
        <input class="form-control mb-3" type="text" v-model="coeff">
        <!-- <label for="intensity">Rainfall Intensity :</label>
                <select class="form-control mb-2" v-model="intensity">
                    <option value="" disabled>Please select...</option>
                    <option value="50">50 mm/h</option>
                    <option value="100">100 mm/h</option>
                    <option value="150">150 mm/h</option>
        </select>-->
        <label for="intensity">Rainfall Intensity :</label>
        <div class="input-group d-flex align-items-center">
          <select class="form-control" v-model="intensity">
            <option value disabled>Please select...</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="150">150</option>
          </select>
          <div class="input-group-append">
            <span class="input-group-text w-unit" id="basic-addon2 ">mm/h</span>
          </div>
        </div>
      </div>
      <button class="btn btn-primary btn-sm butang" @click="done">Next</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      intensity: "",
      coeff: this.$store.state.coefficient
    };
  },
  computed: {
    catchment() {
      var value =
        this.$store.state.coefficient *
        this.$store.state.area *
        (this.intensity * 0.000277778);
      return value.toFixed(2);
    }
  },
  methods: {
    done() {
      this.$store.commit("SET_COEF", this.coeff);

      this.$store.commit("SET_CATCHMENT", this.catchment);
      this.$store.commit("SET_CATCHMENT_SHOW", true);
      this.$router.push({
        name: "gutter"
      });
    }
  }
};
</script>

<style scoped>
/* .butang {
        width: 80px;
        align-items: center;
        margin-top: 20px
    } */
</style>
