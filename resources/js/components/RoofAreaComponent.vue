<template>
    <div>
        <div class="container">
            <!-- <div class="row">
                <div class="roof text-left">Roof Area:</div>
                <hr>
            </div> -->
            <div class="row roof">
                <span>Roof Area:</span>
            </div>

            <div class="row d-flex flex-column roof-detail">
                <label for="newArea">Roof Area</label>
                <div class="changeForm d-flex align-items-center">
                    <div class="input-group mb-3">

                        <input type="text" class="form-control text-right" v-model="newArea">
                        <div class="input-group-append ">
                            <span class="input-group-text w-unit">m<sup>2</sup></span>
                        </div>
                    </div>

                </div>

            </div>
            <button class="btn btn-success butang" @click="done">Next</button>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                cform: false,
                newArea: this.$store.state.area
            }
        },
        methods: {
            done() {
                if (this.newArea != '') {
                    this.$store.commit('SET_AREA', this.newArea)
                }

                this.$store.commit('SET_AREA_SHOW', true)
                this.$router.push({
                    name: 'catchment'
                })
            },
        },
    }

</script>

<style scoped>
    .bform {
        cursor: pointer;
    }

    .butang {
        width: 80px;
        align-items: center;
        margin-top: 20px
    }

</style>
