<template>
    <div>
        <div class="container">
            <div class="row roof">
                <span>Roof Catchment Run-off:</span>
            </div>

            <div class="row d-fle flex-column">
                <label for="coeff">Run-off Coefficient :</label>
                <input class="form-control mb-3" type="text" v-model="coeff">
                <label for="intensity">Rainfall Intensity :</label>
                <select class="form-control mb-2" v-model="intensity">
                    <option value="" disabled>Please select...</option>
                    <option value="50">50 mm/h</option>
                    <option value="100">100 mm/h</option>
                    <option value="150">150 mm/h</option>
                </select>

                <button class="btn btn-success butang" @click="done">Done</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                intensity: '',
                coeff: this.$store.state.coefficient
            }
        },
        computed: {
            catchment() {
                var value = (this.$store.state.coefficient * this.$store.state.area * (this.intensity * 0.000277778))
                return value.toFixed(2)
            },

        },
        methods: {
            done() {
                this.$store.commit('SET_COEF', this.coeff)

                this.$store.commit('SET_CATCHMENT', this.catchment)
                this.$store.commit('SET_CATCHMENT_SHOW', true)
                this.$router.push({
                    name: 'gutter'
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
