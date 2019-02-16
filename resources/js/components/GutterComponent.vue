<template>
    <div>
        <div class="container">
            <div class="row roof">
                <span>Gutter Type :</span>
            </div>

            <div class="row d-flex flex-column roof-detail">
                <label for="gutter">Gutter Type :</label>
                <div class="input-group d-flex align-items-center">
                    <select class="form-control " v-model="gutter">
                        <option value="" disabled>Please select...</option>
                        <option value="round">Half Round</option>
                        <option value="rec">Rectangular</option>
                    </select>
                </div>
            </div>
            <button class="btn btn-success butang" @click="done">Done</button>

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                intensity: '',
                gutter: ''
            }
        },
        computed: {
            gutterSizeHR() {
                var value = Math.pow(this.$store.state.catchment / (1.4 * this.$store.state.coefficient * 2.67 * 10 **
                    -5), 1 / 1.25);
                return (Math.sqrt(value * 8 / (22 / 7))).toFixed(2)
            },
            downpipeHR() {
                return ((66 / 100) * this.gutterSizeHR).toFixed(2)
            },
            gutterSizeRTW() {
                var value = Math.pow((64 * (this.$store.state.catchment / (1.4 * this.$store.state.coefficient * (9.67 /
                            10 ** 5))) **
                        2),
                    1 / 5);

                return value.toFixed(2)
            },
            gutterSizeRTD() {
                return (this.gutterSizeRTW / 2).toFixed(2)
            },
            downpipeRTW() {
                return ((66 / 100) * this.gutterSizeRTW).toFixed(2)
            },
            downpipeRTD() {
                return ((66 / 100) * this.gutterSizeRTW / 2).toFixed(2)
            },

        },
        methods: {
            done() {
                this.$store.commit('SET_GUTTER_HR', this.gutterSizeHR)
                this.$store.commit('SET_GUTTER_DOWNPIPE_HR', this.downpipeHR)
                this.$store.commit('SET_GUTTER_RTW', this.gutterSizeRTW)
                this.$store.commit('SET_GUTTER_RTD', this.gutterSizeRTD)
                this.$store.commit('SET_GUTTER_DOWNPIPE_RTW', this.downpipeRTW)
                this.$store.commit('SET_GUTTER_DOWNPIPE_RTD', this.downpipeRTD)
                this.$store.commit('SET_GUTTER_TYPE', this.gutter)
                this.$store.commit('SET_GUTTER_SHOW', true)
                this.$router.push({
                    name: 'first-flush'
                })
            }
        }
    }

</script>

<style scoped>
    .butang {
        width: 80px;
        align-items: center;
        margin-top: 20px
    }

</style>
