<template>
    <div>
        <div class="container">
            <div class="row roof">
                Water Demand & Tank Size
            </div>
            <div class="row d-flex flex-column">
                <label for="waterDemand">Daily Total Rainwater Demand :</label>
                <div class="changeForm d-flex align-items-center mb-3">
                    <input type="text" class="form-control" v-model="waterDemand">liter<sup></sup>
                </div>
                <label for="waterDemand">Tank Size :</label>
                <div class="changeForm d-flex align-items-center">
                    <input type="text" class="form-control" v-model="tanksize">m<sup>3</sup>
                </div>
                <button class="btn btn-success butang" @click="done">Done</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                cform: false,
                waterDemand: this.$store.state.usagevol,
                tanksize: this.$store.state.tankSize
            }
        },
        methods: {
            done() {
                this.$store.commit('SET_TANKSIZE', this.tanksize)
                this.$store.commit('SET_DEMAND', this.waterDemand)
                this.$store.commit('SET_DEMAND_SHOW', true)
                if (this.$store.state.menu_type == 'gravity') {
                    this.$router.push({
                        name: 'top-up'
                    })
                } else {
                    this.$router.push({
                        name: 'pump'
                    })
                }

            },
        },
    }

</script>

<style scoped>
    .butang {
        width: 80px;
        align-items: center;
        margin-top: 20px
    }

</style>
