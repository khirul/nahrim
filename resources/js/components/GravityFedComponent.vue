<template>
  <div>

    <div class="container">
      <div class="d-flex justify-content-center pt-5">
        <img
          src="/images/tank1.png"
          height="100"
          alt
        >
      </div>

      <h1 class="text-center text-success">Rainwater Harvesting Systems </h1>
      <div class="hr w-100"></div>

      <div class="d-flex flex-column align-items-around justify-content-center form">
        <h2 class="mt-3 text-center">Gravity Fed Calculation Step</h2>

        <nav>
          <div
            class="nav nav-tabs navi nav-fill"
            id="nav-tab"
            role="tablist"
          >
            <router-link
              to="/gravity-fed"
              class="nav-item nav-link active"
              id="nav-home-tab"
              data-toggle="tab"
              role="tab"
              aria-controls="nav-home"
              aria-selected="true"
            >
              Roof<br> Area
            </router-link>
            <router-link
              to="/gravity-fed/catchment"
              class="nav-item nav-link"
              id="nav-profile-tab"
              data-toggle="tab"
              role="tab"
              aria-controls="nav-profile"
              aria-selected="false"
            >
              Roof Catchment <br>Runoff
            </router-link>

            <router-link
              to="/gravity-fed/gutter"
              class="nav-item nav-link"
              id="nav-contact-tab"
              data-toggle="tab"
              role="tab"
              aria-controls="nav-contact"
              aria-selected="false"
            >
              Gutter and <br>Down Pipe Sizes
            </router-link>
            <router-link
              to="/gravity-fed/first-flush"
              class="nav-item nav-link"
              id="nav-contact-tab"
              data-toggle="tab"
              role="tab"
              aria-controls="nav-contact"
              aria-selected="false"
            >
              First Flush <br> Diverter
            </router-link>
            <router-link
              to="/gravity-fed/water-demand"
              class="nav-item nav-link"
              id="nav-contact-tab"
              data-toggle="tab"
              role="tab"
              aria-controls="nav-contact"
              aria-selected="false"
            >
              Water Demand <br> and Rain Water
              Tank
              Size
            </router-link>
            <router-link
              to="/gravity-fed/pumping-system"
              v-if="this.$store.state.menu_type != 'gravity'"
              class="nav-item nav-link"
              id="nav-contact-tab"
              data-toggle="tab"
              role="tab"
              aria-controls="nav-contact"
              aria-selected="false"
            >
              Pumping
              <br>
              System
            </router-link>
            <router-link
              to="/gravity-fed/top-up"
              class="nav-item nav-link"
              id="nav-contact-tab"
              data-toggle="tab"
              role="tab"
              aria-controls="nav-contact"
              aria-selected="false"
            >
              Top-up <br>System
            </router-link>
          </div>
        </nav>

        <div class="row">

          <!-- <div class="col-md-3 d-flex flex-column side-menu mt-4">
                        <span class="side-menu-title"></span>
                        <hr>
                        <router-link to="/gravity-fed">Roof Area</router-link>
                        <router-link to="/gravity-fed/catchment">Roof Catchment Runoff</router-link>
                        <router-link to="/gravity-fed/gutter">Gutter and Down Pipe Sizes</router-link>
                        <router-link to="/gravity-fed/first-flush">First Flush Diverter</router-link>
                        <router-link to="/gravity-fed/water-demand">Water Demand and Rain Water Tank Size</router-link>
                        <router-link to="/gravity-fed/pumping-system" v-if="this.$store.state.menu_type != 'gravity'">Pumping
                            System</router-link>
                        <router-link to="/gravity-fed/top-up">Top-up System</router-link>
                    </div> -->
          <div class="col-md-7 calc">
            <router-view></router-view>
          </div>
          <div class="col-md-5 ">
            <div class="result">RESULTS:</div>
            <table class="table  small">
              <tr v-if="this.$store.state.areaShow">
                <th>Roof Area:</th>
                <td>{{ this.$store.state.area }}</td>
              </tr>
              <tr v-if="this.$store.state.catchmentShow">
                <th>Roof Catchment Runoff</th>
                <td>{{ this.$store.state.catchment }}</td>
              </tr>
              <tr v-if="this.$store.state.gutterShow && this.$store.state.gutterType == 'round'">
                <th>Half Round Gutter & Downpipe Size</th>
                <td class="align">
              <tr v-if="this.$store.state.gutterType == 'round'">
                <th>
                  Gutter Diameter
                </th>
                <td>
                  {{this.$store.state.hr_size}}
                </td>
              </tr>
              <tr v-if="this.$store.state.gutterType == 'round'">
                <th>
                  Downpipe Diameter
                </th>
                <td>
                  {{this.$store.state.hr_downpipe}}
                </td>
              </tr>
              </td>
              </tr>

              <tr v-if="this.$store.state.gutterShow && this.$store.state.gutterType == 'rec'">
                <th>Rectangle Gutter & Downpipe Size</th>
                <td class="align">
              <tr v-if="this.$store.state.gutterType == 'rec'">
                <th>
                  Gutter Width
                </th>
                <td>
                  {{this.$store.state.rt_width}}
                </td>
              </tr>
              <tr v-if="this.$store.state.gutterType == 'rec'">
                <th>
                  Gutter Depth
                </th>
                <td>
                  {{this.$store.state.rt_depth}}
                </td>
              </tr>
              <tr v-if="this.$store.state.gutterType == 'rec'">
                <th>
                  Downpipe Width
                </th>
                <td>
                  {{this.$store.state.rt_downpipe_width}}
                </td>
              </tr>
              <tr v-if="this.$store.state.gutterType == 'rec'">
                <th>
                  Downpipe Depth
                </th>
                <td>
                  {{this.$store.state.rt_downpipe_depth}}
                </td>
              </tr>
              </td>
              </tr>

              <tr v-if="this.$store.state.ffShow">
                <th>First Flush Pipe Lenght</th>
                <td>{{ this.$store.state.fflenght }} m</td>
              </tr>
              <tr v-if="this.$store.state.demandShow">
                <th>Daily Total Rainwater Demand</th>
                <td>{{ this.$store.state.usagevol }}</td>
              </tr>
              <tr v-if="this.$store.state.demandShow">
                <th>Tank Size</th>
                <td>{{ this.$store.state.tankSize }}</td>
              </tr>
              <!-- <tr v-if="this.$store.state.topupShow">
                            <td>Tank Height</td>
                            <td></td>
                        </tr> -->
              <tr v-if="this.$store.state.pumpShow">
                <th>Pump Power:</th>
                <td>{{ this.$store.state.pumppow }}</td>
              </tr>

              <tr v-if="this.$store.state.topupShow && this.$store.state.tank_type == 'square'">
                <th>Square Tank Height and Depth of Topping-up</th>
                <td class="align">
              <tr v-if="this.$store.state.tank_type == 'square'">
                <th>
                  Tank Height
                </th>
                <td>
                  {{this.$store.state.height_sqr}}
                </td>
              </tr>
              <tr v-if="this.$store.state.tank_type == 'square'">
                <th>
                  Depth of Topping-up
                </th>
                <td>
                  {{this.$store.state.topping_sqr}}
                </td>
              </tr>
              </td>
              </tr>

              <tr v-if="this.$store.state.topupShow && this.$store.state.tank_type == 'cylinder'">
                <th>
                  Cylinder Tank Height and Depth of Topping-up
                </th>
                <td class="align">
              <tr v-if="this.$store.state.tank_type == 'cylinder'">
                <th>
                  Tank Height
                </th>
                <td>
                  {{this.$store.state.height_cyl}}
                </td>
              </tr>
              <tr v-if="this.$store.state.tank_type == 'cylinder'">
                <th>
                  Depth of Topping-up
                </th>
                <td>
                  {{this.$store.state.topping_cyl}}
                </td>
              </tr>
              </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      type: "",
      storey: "",
      intensity: "",
      gutter: "",
      houseType: false,
      r: 0.15
    };
  },
  methods: {
    trigger() {
      if (this.type == "indoor" || this.type == "outdoor") {
        this.houseType = true;
      } else {
        this.houseType = false;
      }
    }
  }
};
</script>

<style scoped>
td {
  text-align: right;
}

.align {
  text-align: left;
}

.hr {
  border-top: 1px solid rgb(165, 182, 235);
}

.side-menu a {
  text-decoration: none;
  text-transform: uppercase;
  color: royalblue;
  font-weight: bold;
  padding: 10px 10px;
  width: 250px;
}

.side-menu a:hover {
  background: royalblue;
  color: white;
  width: 250px;
}

.side-menu-title {
  text-transform: uppercase;
  margin-top: 30px;
  padding: 10px 0;
  border: 1px solid royalblue;
  text-align: center;
  font-weight: bold;
}

.result {
  font-size: 30px;
  font-weight: bold;
  color: orange;
  margin-top: 20px;
}

table,
tr,
td,
th {
  border: 1px solid orange;
}

.calc {
  border: 1px solid rgb(165, 182, 235);
  margin-top: 30px;
  height: 510px;
}

.navi {
}

.navi a {
  text-transform: uppercase;
  font-weight: bold;
  font-size: 13px;
  text-align: center;
}

.navi a:hover {
  background-color: royalblue;
  color: white;
  text-transform: uppercase;
  font-weight: bold;
  font-size: 13px;
  text-align: center;
}
</style>
