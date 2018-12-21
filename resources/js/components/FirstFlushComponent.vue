<template>
  <div>
    <div class="container">
      <div class="row roof">
        First Flush Diverter
      </div>
      <div class="row d-flex flex-column">
        <label for="radius"> First Flush Volume :</label>
        <div class="changeForm d-flex align-items-center">
          <div class="input-group mb-3">
            <input
              type="text"
              class="form-control text-right"
              v-model="firstflush"
            >
            <div class="input-group-append">
              <span class="input-group-text">m<sup>3</sup></span>
            </div>
          </div>
        </div>
        <label for="radius"> Diameter :</label>
        <div class="changeForm d-flex align-items-center">
          <div class="input-group mb-3">
            <input
              type="text"
              class="form-control text-right"
              v-model="radius"
            >
            <div class="input-group-append">
              <span class="input-group-text">m</span>
            </div>
          </div>
        </div>
        <button
          class="btn btn-success butang"
          @click="done"
        >Done</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      radius: 0.15,
      firstflush: this.$store.state.flush
    };
  },
  computed: {
    ffpipe() {
      var value = this.firstflush / ((22 * this.radius ** 2) / 7);
      return value.toFixed(2);
    }
  },
  methods: {
    done() {
      this.$store.commit("SET_FF_LENGHT", this.ffpipe);
      this.$store.commit("SET_FF_SHOW", true);
      this.$router.push({
        name: "water-demand"
      });
    }
  }
};
</script>

<style scoped>
.butang {
  width: 80px;
  align-items: center;
  margin-top: 20px;
}
</style>
