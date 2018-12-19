<template>
  <div class="container h-100">
    <div class="row h-100 d-flex align-items-center justify-content-center pt-5">
      <div class="col-md-8">
        <LMap
          ref="map"
          style="height:400px ; width: 640px"
          :center="currentPosition"
          :zoom="zoom"
        >
          <LTileLayer url="http://{s}.tile.osm.org/{z}/{x}/{y}.png" />
          <LMarker
            :latlng="currentPosition"
            class="blink"
          >
            <!-- <LTooltip :options="{interactive: true,permanent: true}">
                            <strong>You are HERE!</strong>
                        </LTooltip> -->

          </LMarker>/>
        </LMap>
      </div>
      <div class="col-md-4 d-flex flex-column align-items-center justify-content-center rain">
        <img
          src="images/rain.png"
          height="100"
          alt=""
        >
        <h1 style="color: rgba(11, 179, 101, 0.815);">Rainfall Station</h1>
        <div class="alert alert-primary text-center">
          Please select the nearest rainfall station to your rainwater harvesting tank.
        </div>
        <select
          class="form-control"
          v-model="loc"
        >
          <option
            v-for="(value, key) in locations"
            :key="key"
          >{{ value }}</option>
        </select>
        <button
          @click="next"
          class="btn btn-success"
          style="margin-top: 20px; font-weight:bold;"
        >Roof
          Characteristics</button>
      </div>
    </div>
  </div>
</template>
<script>
import { LMap, LTileLayer, LMarker, LTooltip } from "vue-leaflet";
export default {
  data() {
    return {
      loc: "",
      locations: []
    };
  },
  components: {
    LMap,
    LTileLayer,
    LMarker,
    LTooltip
  },
  methods: {
    next() {
      this.$store.commit("SET_LOCATION", this.loc);
      this.$router.push("/roof-characteristics");
    }
  },
  computed: {
    currentPosition() {
      return this.$store.getters.currentPos;
    },
    zoom() {
      return 12;
    }
  },
  mounted() {
    axios
      .get(this.$store.state.url + "/api/locations")
      .then(response => {
        this.locations = response.data;
      })
      .catch(e => {
        console.log(e);
      });

    navigator.geolocation.getCurrentPosition(position => {
      this.$store.commit("SET_LAT", position.coords.latitude);
      this.$store.commit("SET_LONG", position.coords.longitude);
      console.log(position);
    });
  }
};
</script>
<style scoped>
.btncls {
  margin-top: 20px;
}

.rain img {
  margin-bottom: 20px;
}
</style>
