<template>
    <div>
        <div class="container">
            <table class="table table-bordered text-center">
                <td>
                <th>January</th>
                <tr>{{ (rain[0]/years).toFixed(2) }}</tr>
                </td>
                <td>
                <th>February</th>
                <tr>{{ (rain[1]/years).toFixed(2) }}</tr>
                </td>
                <td>
                <th>March</th>
                <tr>{{ (rain[2]/years).toFixed(2) }}</tr>
                </td>
                <td>
                <th>April</th>
                <tr>{{ (rain[3]/years).toFixed(2) }}</tr>
                </td>
                <td>
                <th>May</th>
                <tr>{{ (rain[4]/years).toFixed(2) }}</tr>
                </td>
                <td>
                <th>Jun</th>
                <tr>{{ (rain[5]/years).toFixed(2) }}</tr>
                </td>
                <td>
                <th>July</th>
                <tr>{{ (rain[6]/years).toFixed(2) }}</tr>
                </td>
                <td>
                <th>August</th>
                <tr>{{ (rain[7]/years).toFixed(2) }}</tr>
                </td>
                <td>
                <th>September</th>
                <tr>{{ (rain[8]/years).toFixed(2) }}</tr>
                </td>
                <td>
                <th>October</th>
                <tr>{{ (rain[9]/years).toFixed(2) }}</tr>
                </td>
                <td>
                <th>November</th>
                <tr>{{ (rain[10]/years).toFixed(2) }}</tr>
                </td>
                <td>
                <th>Disember</th>
                <tr>{{ (rain[11]/years).toFixed(2) }}</tr>
                </td>
            </table>

            <chart-component :rain="rain" :years="years" class="mb-5"></chart-component>
            <chart-year-component :yearsInfo="yearsInfo" :yearsTotal="yearsTotal"></chart-year-component>
            <co-chart-component :range="range" :rr_coef="rr_coef" :rr_st="rr_st"></co-chart-component>
            <div class="button d-flex justify-content-center mt-5" style="margin-bottom:70px;">
              <router-link class="btn btn-primary btn-sm" :to="{name: 'simulator'}">back</router-link>
            </div>
            <!-- /.button -->
        </div>

    </div>
</template>

<script>
    import ChartComponent from "./ChartComponent";
    import ChartYearComponent from "./ChartYearComponent";
    import CoChartComponent from "./CoChartComponent";
    export default {
      components: { ChartComponent, ChartYearComponent, CoChartComponent },
      mounted() {
        this.$store.dispatch("get_info");
      },
      computed: {
        rain() {
          return this.$store.state.info.monthlyTotal;
        },
        years() {
          return this.$store.state.info.totalYears;
        },
        yearsInfo(){
          return this.$store.state.info.years;
        },
        yearsTotal(){
          return this.$store.state.info.byyear;
        },
        range(){
          return this.$store.state.range;
        },
        rr_coef(){
          return this.$store.state.rr_coef;
        },
        rr_st(){
          return this.$store.state.rr_st;
        }
      }
    };
</script>

<style scoped>
</style>