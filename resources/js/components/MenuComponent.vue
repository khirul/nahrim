<template>
    <div class="container d-flex flex-column">
        <div class="modules ">
            <div class="d-flex flex-column align-items-center pt-5" @click="module1">
                <img src="/images/rain-icon.png" alt="" class="mr-3 ">
                <span class="moduleOne">Tank Simulation</span>
            </div>

        </div>
        <div class="modules2  ">
            <div class="d-flex flex-column align-items-center">
                <img src="/images/tank.png" alt="" class="mr-3" @mouseover="module2">
                <span class="moduleOne">Rainwater Harvesting System</span>
            </div>
            <div class="btn2 d-flex justify-content-center align-items-center" v-if="show">
                <div class="sub mr-1 text-center" @click="gravity">Gravity Fed System
                </div>
                <div class="sub mr-1 text-center justify-item-center" @click="indirect">Indirect Pumping System</div>
                <div class="sub text-center" @click="direct">Direct Pumping System</div>
            </div>

        </div>


        <!-- <div class="mod2 d-flex flex-column justify-content-center align-items-center" @mouseover="module2" @mouseout="mouseout">
            <div class="one" v-if="!show">Module 2</div>
            <div class="name" v-if="!show">Rainwater Harvesting System</div>
            <div class="btn2 d-flex justify-content-center align-items-center" v-if="show">
                <div class="sub mr-1 text-center" @click="gravity">
                    Gravity Fed
                    System
                </div>
                <div class="sub mr-1 text-center" @click="indirect">Indirect Pumping System</div>
                <div class="sub text-center" @click="direct">Direct Pumping System</div>
            </div>
        </div> -->

    </div>
</template>

<script>
    export default {
        data() {
            return {
                show: false
            };
        },
        methods: {
            module1() {
                this.$router.push({
                    name: "station"
                });
            },
            module2() {
                this.show = true;
            },
            mouseout() {
                this.show = false;
            },
            gravity() {
                this.$router.push({
                    name: "gravity-fed"
                });
                this.$store.commit("MENU_TYPE", "gravity");
            },
            direct() {
                this.$router.push({
                    name: "gravity-fed"
                });
                this.$store.commit("MENU_TYPE", "direct");
            },
            indirect() {
                this.$router.push({
                    name: "gravity-fed"
                });
                this.$store.commit("MENU_TYPE", "indirect");
            }
        }
    };

</script>

<style scoped>
    .mod1,
    .mod2 {
        height: 300px;
        width: 300px;
        border-radius: 15px;
        cursor: pointer;
    }

    .mod1 {
        background: lightblue;
    }

    .mod2 {
        background: lightcoral;
    }

    .sub {
        height: 80px;
        width: 120px;
        color: white;
        background: #006df0;
        border-radius: 20px;
        line-height: 80px;
        cursor: pointer;
    }

    .modules img {
        height: 200px;
        width: 200px;
        color: aqua;
        cursor: pointer;
        border: 5px solid #006df0;
        border-radius: 50%;
    }

    .modules2 img {
        height: 200px;
        width: 200px;
        cursor: pointer;
        /* border: 5px solid aqua;
        border-radius: 50%; */
    }

    .moduleOne {
        font-size: 60px;
        color: grey;
    }

    .moduleTwo {
        font-size: 60px;
        color: grey;
    }

</style>
