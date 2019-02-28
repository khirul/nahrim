
<script>
import { Bar } from "vue-chartjs";

export default {
  extends: Bar,
  props: ["range", "rr_coef", "rr_st"],
  mounted() {
    setTimeout(() => {
      this.renderChart(
        {
          labels: this.range,
          datasets: [
            {
              label: "Co-efficient",
              fill: false,
              backgroundColor: "#42adf4",
              borderColor: "#f1f442",
              data: this.rr_coef
            },
            {
              label: "Storage Efficient",
              fill: false,
              backgroundColor: "#f1f442",
              borderColor: "#42adf4",
              data: this.rr_st
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