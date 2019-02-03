<template>
  <v-navigation-drawer fixed v-model="drawer" app >
    <div class="row">
      <div class="col-md-12 text-center py-4">
        <v-avatar color="grey lighten-4">
          <img src="https://vuetifyjs.com/apple-touch-icon-180x180.png" alt="avatar">
        </v-avatar>
      </div>
    </div>

    <v-list dense>
      <v-list-tile @click="redirect('/')">
        <v-list-tile-action>
          <v-icon>home</v-icon>
        </v-list-tile-action>
        <v-list-tile-content>
          <v-list-tile-title>Home</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>
      
    </v-list>
  </v-navigation-drawer>
</template>
<script>
export default {
  computed: {
    drawer: {
      get: function() {
        return this.$store.getters.getDrawer;
      },
      set: function(value) {
        this.$store.commit("SET_DRAWER", value);
      }
    }
  },
  methods:{
      redirect(value){
          this.$router.push(value);
      }
  },
  created() {}
};
</script>
<style scoped>
</style>

