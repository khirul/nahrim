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
          <LMarker :latlng="currentPosition" class="blink">
            <!-- <LTooltip class="yah" :options="{interactive: true,permanent: true}">
              <strong>You are HERE!</strong>
            </LTooltip>-->
          </LMarker>
          <span v-for="c in this.$store.state.coords" :key="c.id">
            <LMarker
              :latlng="[c.latitude, c.longitude]"
              class="blink"
              @click="clicked_location(c.stn_name)"
            >
              <LTooltip :options="{ interactive: true, permanent: true }">
                <strong>{{ c.stn_name }}</strong>
              </LTooltip>
            </LMarker>
          </span>
        </LMap>
      </div>
      <div
        class="dd-container d-flex flex-column justify-content-center align-items-center p-3"
      >
        <p class="text-light">
          Please select the nearest rainfall station to your rainwater
          harvesting tank.
        </p>
        <div class="selist mb-3">
          <select
            class="form-control input-sm select2"
            v-model="loc"
            @change="setZoom(loc)"
          >
            <optgroup
              v-for="(state, key) in uniqueNames"
              :key="key"
              :label="state"
            >
              <option
                v-for="l in locations"
                :key="l.id"
                v-if="l.state == state"
                >{{ l.stn_name }}</option
              >
            </optgroup>
          </select>
        </div>
        <div class="d-flex">
          <button
            @click="back"
            class="btn btn-primary btn-sm mr-1"
            style="font-weight:bold;"
          >
            <i class="fas fa-chevron-circle-left"></i>
            Back
          </button>
          <button
            @click="next"
            class="btn btn-primary btn-sm"
            style="font-weight:bold;"
          >
            Next
            <i class="fas fa-chevron-circle-right"></i>
          </button>
        </div>
        <!-- <div class="dd rain d-flex align-items-center justify-content-between">
          <img src="images/rain.png" height="100" alt>
          <h1 style="color: rgba(11, 179, 101, 0.815);">Rainfall Station</h1>
          <div
            class="text-center"
          >Please select the nearest rainfall station to your rainwater harvesting tank.</div>
          <select class="form-control select2" v-model="loc" @change="setZoom(loc)">
            <optgroup v-for="(state, key) in uniqueNames" :key="key" :label="state">
              <option v-for="l in locations" :key="l.id" v-if="l.state == state">{{ l.stn_name }}</option>
            </optgroup>
          </select>
          <div class="d-flex">
            <button @click="back" class="btn btn-primary btn-sm mr-1" style="font-weight:bold;">
              <i class="fas fa-chevron-circle-left"></i>
              Back
            </button>
            <button @click="next" class="btn btn-primary btn-sm" style="font-weight:bold;">
              Next
              <i class="fas fa-chevron-circle-right"></i>
            </button>
          </div>
        </div>-->
      </div>
    </div>
  </div>
</template>

<script>
import { LMap, LTileLayer, LMarker, LTooltip } from "vue-leaflet";
export default {
  data() {
    return {
      loc: "WILAYAH PERSEKUTUAN",
      locations: []
    };
  },
  components: {
    LMap,
    LTileLayer,
    LMarker,
    LTooltip
  },
  mounted() {},
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
      axios
        .post(this.$store.state.url + "/api/show/", { name: loc })
        .then(response => {
          this.$store.commit("SET_LAT", response.data.latitude);
          this.$store.commit("SET_LONG", response.data.longitude);
        })
        .catch(e => {
          console.log(e);
        });
    },
    setZoom(name) {
      axios
        .post(this.$store.state.url + "/api/show/", { name: name })
        .then(response => {
          this.$store.commit("SET_LAT", response.data.latitude);
          this.$store.commit("SET_LONG", response.data.longitude);
        })
        .catch(e => {
          console.log(e);
        });
    }
  },
  computed: {
    currentPosition() {
      return this.$store.getters.currentPos;
    },
    zoom() {
      return 12;
    },
    uniqueNames() {
      var filtered_array = [];

      for (var i = 0; i < this.locations.length; i++) {
        if (filtered_array.indexOf(this.locations[i].state) === -1) {
          filtered_array.push(this.locations[i].state);
        }
      }
      return filtered_array;
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

    // navigator.geolocation.getCurrentPosition(position => {
    //   this.$store.commit("SET_LAT", position.coords.latitude);
    //   this.$store.commit("SET_LONG", position.coords.longitude);
    //   console.log(position);
    // });
    axios
      .post(this.$store.state.url + "/api/show/", {
        name: "WILAYAH PERSEKUTUAN"
      })
      .then(response => {
        this.$store.commit("SET_LAT", response.data.latitude);
        this.$store.commit("SET_LONG", response.data.longitude);
      })
      .catch(e => {
        console.log(e);
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
.map {
  position: relative;
  z-index: 1;
}

.dd-container {
  background: rgba(0, 0, 0, 0.808);
  z-index: 2;
  bottom: 0;
  left: 0;
  position: fixed;
  width: 100vw;
}
.dd {
  z-index: 3;
}
</style>
