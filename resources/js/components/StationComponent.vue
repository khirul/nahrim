<template>
  <div class="container h-100">
    <div class="row h-100 d-flex align-items-center justify-content-center">
      <div class="map">
        <LMap
          ref="map"
          style="height:100vh; width: 100vw"
          :center="currentPosition"
          :zoom="zoom"
        >
          <LTileLayer url="http://{s}.tile.osm.org/{z}/{x}/{y}.png" />
          <LMarker
            :latlng="currentPosition"
            class="blink"
          >
            <LTooltip
              class="yah"
              :options="{interactive: true,permanent: true}"
            >
              <strong>You are HERE!</strong>
            </LTooltip>
          </LMarker>
          <span
            v-for="c in this.$store.state.coords"
            :key="c.id"
          >
            <LMarker
              :latlng="[c.lat, c.lon]"
              class="blink"
              @click="clicked_location(c.stn_name)"
            >
              <LTooltip :options="{interactive: true,permanent: true}">
                <strong>{{ c.stn_name }}</strong>
              </LTooltip>
            </LMarker>
          </span>
        </LMap>
      </div>
      <div class="dd-container">
        <div class="dd d-flex flex-column align-items-center justify-content-center rain">
          <img
            src="images/rain.png"
            height="100"
            alt
          >
          <h1 style="color: rgba(11, 179, 101, 0.815);">Rainfall Station</h1>
          <div class="alert alert-primary text-center">Please select the nearest rainfall station to your rainwater harvesting tank.</div>
          <select
            class="form-control"
            v-model="loc"
          >
            <option
              v-for="(value, key) in locations"
              :key="key"
            >{{ value.stn_name }}</option>
          </select>
          <div class="d-flex">
            <button
              @click="back"
              class="btn btn-success mr-1"
              style="margin-top: 20px; font-weight:bold;"
            >
              <i class="fas fa-chevron-circle-left"></i>
              Back
            </button>
            <button
              @click="next"
              class="btn btn-success"
              style="margin-top: 20px; font-weight:bold;"
            >
              Next
              <i class="fas fa-chevron-circle-right"></i>
            </button></div>

        </div>
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
    },
    back() {
      this.$router.push({ name: "root" });
    },
    clicked_location(loc) {
      this.loc = loc;
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

    this.$store.dispatch("get_all_latlong");
  }
};
</script>
<style scoped>
.btncls {
  margin-top: 20px;
}
.rain {
  background: rgba(255, 0, 0, 0);
}
.rain img {
  margin-bottom: 20px;
}
.map {
  position: relative;
  z-index: 1;
}

.dd-container {
  background: rgba(87, 84, 84, 0.397);
  z-index: 2;
  top: 0;
  right: 0;
  position: fixed;
  width: 400px;

  padding: 50px 50px;
}
.dd {
  z-index: 3;
}
</style>
