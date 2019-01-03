<template>
  <div>
    <router-view></router-view>
  </div>
</template>

<script>
import MainComponent from "./MainComponent";
import StationComponent from "./StationComponent";
import RoofComponent from "./RoofComponent";
import WaterUsageComponent from "./WaterUsageComponent";
import SimulatorComponent from "./SimulatorComponent";

export default {
  components: {
    MainComponent,
    StationComponent,
    RoofComponent,
    WaterUsageComponent,
    SimulatorComponent
  }

  //name: 'app',
};
</script>

<style>
@import url("https://fonts.googleapis.com/css?family=Kreon:700");
@import url("https://fonts.googleapis.com/css?family=Ubuntu");

html,
body,
.container,
.row {
  height: 100%;
}

body {
  font-family: "Ubuntu", sans-serif;
}

.bg {
  min-height: 100vh;
  background: linear-gradient(0deg, rgb(148, 199, 233), rgb(220, 232, 233));
}

h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: "Kreon", serif;
}

.roof {
  margin-top: 20px;
  font-size: 30px;
  color: orange;
  font-weight: bold;
  border-bottom: 2px solid orange;
  margin-bottom: 30px;
}
</style>
