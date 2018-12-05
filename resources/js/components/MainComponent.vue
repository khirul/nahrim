<template>
    <div class="main">
        <div class="title">NAHRIM App 2018</div>
        <p style="color:#4973ff">Interested in installing a rainwater harvesting system? How big should your tank be?</p>
        <p style="color:#4973ff">How to make the most of the rainfall in your area?</p>
        <p style="color:#4973ff">Tangki NAHRIM can help you estimate your rainwater harvesting tank size. </p>
        <p style="color:#4973ff; font-weight:bold">Click on 'Get Start' to calculate.</p>
        <div class="circle">
            <div class="wave">
            </div>
        </div>
        <router-link :to="{name: 'menu'}" class="btn btn-success" style="margin-top: 40px; font-weight:bold;">Get
            Started ></router-link>
    </div>
</template>
<script>
    export default {

    };

</script>
<style scoped>
    .title {
        margin-bottom: 20px;
        color: rgba(11, 179, 101, .815);
        font-family: "Kreon", serif;
        font-size: 3em;
    }

    .main {
        position: absolute;
        top: 50%;
        left: 50%;
        text-align: center;
        transform: translate(-50%, -50%);
    }

    .circle {
        overflow: hidden;
        width: 150px;
        height: 150px;
        margin: 0 auto;
        background: rgba(204, 204, 204, 0);
        box-shadow: 0 0 0 5px #4973ff;
        border: 5px solid rgba(255, 255, 255, .596);
        border-radius: 50%;
    }

    .wave {
        position: relative;
        width: 100%;
        height: 100%;
        background: #4973ff;
        box-shadow: inset 0 0 50px rgba(0, 0, 0, .5);
        border-radius: 50%;
    }

    .wave:before,
    .wave:after {
        content: "";
        position: absolute;
        top: 0;
        left: 50%;
        width: 200%;
        height: 200%;
        background: #000;
        transform: translate(-50%, -75%);
    }

    .wave:before {
        background: rgba(255, 255, 255, .74);
        border-radius: 45%;
        animation: animate 5s linear infinite;
    }

    .wave:after {
        background: rgba(255, 255, 255, .295);
        border-radius: 40%;
        animation: animate 10s linear infinite;
    }

    @keyframes animate {
        0% {
            transform: translate(-50%, -75%) rotate(0deg);
        }

        100% {
            transform: translate(-50%, -75%) rotate(360deg);
        }
    }

</style>
