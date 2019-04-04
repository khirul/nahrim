<template>
  <div class="ad">
    <navbar-component></navbar-component>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <p>Upload Station Data</p>
          <input type="file" class="form-control" @change="onFileChanged">
          <button class="btn btn-primary btn-sm mt-3 mb-3" @click="upload">
            upload
            <i class="fas fa-spinner fa-spin" v-if="show"></i>
          </button>
        </div>
        <div class="col-md-6">
          <p>Upload Rain Data</p>
          <input type="file" class="form-control" @change="onFileChanged_r">
          <button class="btn btn-primary btn-sm mt-3 mb-3" @click="upload_r">
            upload
            <i class="fas fa-spinner fa-spin" v-if="show_r"></i>
          </button>
        </div>
        <!-- <div>
          <button @click="logout">logout</button>
        </div>-->
      </div>
      <station-data></station-data>
    </div>
    <!-- /.container -->
  </div>
</template>

<script>
import StationData from "./StationData";
import NavbarComponent from "./NavbarComponent";
export default {
  data() {
    return {
      excel_r: "",
      message: "Done",
      show: false,
      message_r: "Done",
      show_r: false
    };
  },
  components: {
    StationData,
    NavbarComponent
  },
  methods: {
    onFileChanged(event) {
      this.excel = event.target.files[0];
    },
    onFileChanged_r(event) {
      this.excel_r = event.target.files[0];
    },
    upload() {
      const formData = new FormData();
      formData.append("file", this.excel);
      this.$store.dispatch("station_upload", formData).then(response => {
        this.show = true;
        location.reload();
      });
    },
    upload_r() {
      const formData = new FormData();
      formData.append("file", this.excel_r);
      this.show_r = true;
      this.$store.dispatch("rain_upload", formData).then(response => {
        this.show_r = false;
        location.reload();
      });
    },
    logout() {
      this.$store
        .dispatch("logout")
        .then(response => {
          this.$router.push({ name: "root" });
        })
        .catch(e => {
          console.log(e);
        });
    }
  }
};
</script>

<style scoped>
.ad {
  margin-bottom: 100px;
}
</style>