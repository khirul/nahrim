
<script>
import { Bar } from "vue-chartjs";

export default {
  extends: Bar,
  props: ["yearsInfo", "yearsTotal"],
  data() {
    return {
      years: []
    };
  },
  mounted() {
    setTimeout(() => {
      this.renderChart(
        {
          labels: this.yearsInfo,
          datasets: [
            {
              label: "Total Rainfall By Year",
              backgroundColor: "blue",
              data: this.yearsTotal
            }
          ]
        },
        { responsive: true, maintainAspectRatio: false }
      );
      console.log(this.yearsInfo);
    }, 1000);
  }
};
</script>

<style scoped>
</style>