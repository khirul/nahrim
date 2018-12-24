
<script>
import { Bar } from "vue-chartjs";

export default {
  extends: Bar,
  props: ["rain", "years"],
  mounted() {
    setTimeout(() => {
      this.renderChart(
        {
          labels: [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
          ],
          datasets: [
            {
              label: "Average Rainfall",
              backgroundColor: "red",
              data: [
                (this.rain[0] / this.years).toFixed(2),
                (this.rain[1] / this.years).toFixed(2),
                (this.rain[2] / this.years).toFixed(2),
                (this.rain[3] / this.years).toFixed(2),
                (this.rain[4] / this.years).toFixed(2),
                (this.rain[5] / this.years).toFixed(2),
                (this.rain[6] / this.years).toFixed(2),
                (this.rain[7] / this.years).toFixed(2),
                (this.rain[8] / this.years).toFixed(2),
                (this.rain[9] / this.years).toFixed(2),
                (this.rain[10] / this.years).toFixed(2),
                (this.rain[11] / this.years).toFixed(2)
              ]
            }
          ]
        },
        { responsive: true, maintainAspectRatio: false }
      );
    }, 1000);
  }
};
</script>

<style scoped>
</style>