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

            <chart-component :rain="rain" :years="years"></chart-component>
        </div>

    </div>
</template>

<script>
    import ChartComponent from "./ChartComponent";
    export default {
      components: { ChartComponent },
      mounted() {
        this.$store.dispatch("get_info");
      },
      computed: {
        rain() {
          return this.$store.state.info.monthlyTotal;
        },
        years() {
          return this.$store.state.info.totalYears;
        }
      }
    };
</script>

<style scoped>
</style>