<template>
  <div>
    <vue-good-table
      :columns="columns"
      :rows="this.$store.state.stations"
      :pagination-options="{
    enabled: true,
    mode: 'records',
    perPage: 10,
    position: 'top',
    perPageDropdown: [30, 50, 100],
    dropdownAllowAll: false,
    setCurrentPage: 1,
    nextLabel: 'next',
    prevLabel: 'prev',
    rowsPerPageLabel: 'Rows per page',
    ofLabel: 'of',
    pageLabel: 'page', // for 'pages' mode
    allLabel: 'All',
  }"
    />
  </div>
</template>

<script>
export default {
  data() {
    return {
      columns: [
        {
          label: "Station Name",
          field: "stn_name",
          filterOptions: {
            enabled: true
          }
        },
        {
          label: "State",
          field: "state",
          filterOptions: {
            enabled: true
          }
        },
        {
          label: "latitude",
          field: "latitude"
        },
        {
          label: "longitude",
          field: "longitude"
        }
      ]
    };
  },
  mounted() {
    this.$store.dispatch("get_all_locations");
  }
};
</script>
