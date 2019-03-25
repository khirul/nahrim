<template>
    <div>
        <div class="container">
            <div class="row roof">
                Pumping System
            </div>
            <div class="row d-flex flex-column roof-detail">
                <label for="house_type">House type :</label>
                <select class="form-control mb-2" v-model="house_type">
                    <option value="" disabled>Please select...</option>
                    <option value="1">Single Storey</option>
                    <option value="2">Double Storey</option>
                </select>
                <div>
                    {{house_type}} Horse Power
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
                house_type: ''
            }
        },
        methods: {
            done() {
                this.$store.commit('SET_PUMP_POWER', this.house_type)
                this.$store.commit('SET_PUMP_SHOW', true)
                this.$router.push({
                    name: 'top-up'
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
