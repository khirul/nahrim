<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="roof text-left">ROOF AREA:</div>
                <hr>
            </div>

            <div class="row d-flex flex-column">
                <label for="newArea">Roof Area</label>
                <div class="changeForm d-flex align-items-center">
                    <div class="input-group mb-3">

                        <input type="text" class="form-control text-right" v-model="newArea">
                        <div class="input-group-append">
                            <span class="input-group-text">m<sup>2</sup></span>
                        </div>
                    </div>

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
