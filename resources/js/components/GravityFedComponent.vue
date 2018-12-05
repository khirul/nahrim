<template>
    <div>

        <div class="container">

            <div class="row">

                <div class="col-md-3 d-flex flex-column side-menu">
                    <span class="side-menu-title">Gravity Fed Calculation Step</span>
                    <hr>
                    <router-link to="/gravity-fed">Roof Area</router-link>
                    <router-link to="/gravity-fed/catchment">Roof Catchment Runoff</router-link>
                    <router-link to="/gravity-fed/gutter">Gutter and Down Pipe Sizes</router-link>
                    <router-link to="/gravity-fed/first-flush">First Flush Diverter</router-link>
                    <router-link to="/gravity-fed/water-demand">Water Demand and Rain Water Tank Size</router-link>
                    <router-link to="/gravity-fed/pumping-system" v-if="this.$store.state.menu_type != 'gravity'">Pumping
                        System</router-link>
                    <router-link to="/gravity-fed/top-up">Top-up System</router-link>
                </div>
                <div class="col-md-5 calc">
                    <router-view></router-view>
                </div>
                <div class="col-md-4 ">
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
</template>

<script>
    export default {
        data() {
            return {
                type: '',
                storey: '',
                intensity: '',
                gutter: '',
                houseType: false,
                r: 0.15
            }
        },
        methods: {
            trigger() {
                if (this.type == 'indoor' || this.type == 'outdoor') {
                    this.houseType = true
                } else {
                    this.houseType = false
                }
            },
        }
    }

</script>

<style scoped>
    td {
        text-align: right;
    }

    .align {
        text-align: left;
    }

    .side-menu a {
        text-decoration: none;
        text-transform: uppercase;
        color: royalblue;
        font-weight: bold;
        padding: 10px 10px;
    }

    .side-menu a:hover {
        background: royalblue;
        color: white
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
        border: 1px solid orange;
        margin-top: 30px;
    }

</style>
