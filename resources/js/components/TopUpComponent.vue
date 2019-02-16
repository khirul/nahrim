<template>
    <div>
        <div class="container">
            <div class="row roof">
                Top-Up System
            </div>
            <div class="row d-flex flex-column roof-detail">
                <label for="tanksize">Tank Size : </label>
                <div class="changeForm d-flex align-items-center">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control text-right" v-model="tanksize">
                        <div class="input-group-append">
                            <span class="input-group-text w-unit">m<sup>3</sup></span>
                        </div>
                    </div>
                </div>
                <!-- <div class=" d-flex align-items-center">
                    <input class="form-control" disabled v-model="tanksize" type="text" /> m<sup>3</sup>
                </div> -->
                <!-- </div>
            <div> -->
                <label for="tanktype">Select Tank Type :</label>
                <select class="form-control mb-3" v-model="tankType" @change="type">
                    <option value="" disabled>Tank type...</option>
                    <option value="square">Square</option>
                    <option value="cylinder">Cylinder</option>
                </select>

                <div v-if="squareShow">
                    <label for="width">Tank Width:</label>
                    <div class="changeForm d-flex align-items-center">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-right" v-model="width">
                            <div class="input-group-append">
                                <span class="input-group-text w-unit">m</span>
                            </div>
                        </div>
                    </div>


                    <!-- <label for="width">Tank Width: </label>
                    <input class="form-control " v-model="width" type="text" /> -->
                    <label for="depth">Tank Depth:</label>
                    <div class="changeForm d-flex align-items-center">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-right" v-model="depth">
                            <div class="input-group-append">
                                <span class="input-group-text w-unit">m</span>
                            </div>
                        </div>
                    </div>


                    <!-- <label for="depth">Tank Depth: </label>
                    <input class="form-control " v-model="depth" type="text" /> -->
                </div>
                <div v-if="cylinderShow">
                    <label for="diameter">Tank Diameter:</label>
                    <div class="changeForm d-flex align-items-center">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-right" v-model="diameter">
                            <div class="input-group-append">
                                <span class="input-group-text w-unit">m</span>
                            </div>
                        </div>
                    </div>
                    <!-- <label for="diameter">Tank Diameter: </label>
                    <input class="form-control " v-model="diameter" type="text" /> -->
                </div>

            </div>
            <button class="btn btn-success butang mb-2" @click="done" v-if="!this.$store.state.topupShow">Finish</button>

            <button class="btn btn-warning butang mb-2" @click="start" v-if="this.$store.state.topupShow">Start
                Over?</button>


        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tanksize: this.$store.state.tankSize,
                tankType: '',
                squareShow: false,
                cylinderShow: false,
                width: '',
                depth: '',
                diameter: '',
                tankheight_sqr: 'no input',
                depthtopping_sqr: 'no input',
                tankheight_cyl: 'no input',
                depthtopping_cyl: 'no input'
            }
        },
        methods: {
            type() {
                if (this.tankType == 'square') {
                    this.squareShow = true
                    this.cylinderShow = false
                } else {
                    this.cylinderShow = true
                    this.squareShow = false
                }
            },
            done() {
                if (this.tankType == 'square') {
                    this.tankheight_sqr = (this.$store.state.tankSize / (this.depth * this.width)).toFixed(2)
                    this.depthtopping_sqr = ((this.$store.state.usagevol / 1000) / (this.depth * this.width)).toFixed(2)
                    this.$store.commit('SET_SQUARE_HEIGHT', this.tankheight_sqr)
                    this.$store.commit('SET_SQUARE_TOPPING', this.depthtopping_sqr)
                    this.$store.commit('SET_TANK_TYPE', this.tankType)

                } else {
                    this.tankheight_cyl = (this.$store.state.tankSize / ((22 / 7) * (this.diameter / 2) ** 2)).toFixed(
                        2)
                    this.depthtopping_cyl = ((this.$store.state.usagevol / 1000) / ((22 / 7) * (this.diameter / 2) ** 2))
                        .toFixed(
                            2)
                    this.$store.commit('SET_CYLINDER_HEIGHT', this.tankheight_cyl)
                    this.$store.commit('SET_CYLINDER_TOPPING', this.depthtopping_cyl)
                    this.$store.commit('SET_TANK_TYPE', this.tankType)
                }
                this.$store.commit('SET_TOPUP_SHOW', true)

            },
            start() {
                if (confirm("Are you sure? All data will be reset")) {

                    this.$store.commit('SET_TOPUP_SHOW', false)
                    this.$router.push('/')
                }
            }
        }

    }

</script>

<style scoped>
    .butang {
        width: 100px;
        align-items: center;
        margin-top: 20px
    }

</style>
