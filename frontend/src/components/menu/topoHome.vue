<template>
  <v-toolbar color="indigo" dark fixed app>
    <v-toolbar-side-icon @click.stop="setDrawer(drawer = !drawer)"></v-toolbar-side-icon>
    <v-toolbar-title>{{$route.name}}</v-toolbar-title>
    <v-spacer></v-spacer>
    <v-menu bottom left v-if="!usuario">
      <v-btn slot="activator" dark icon>
        <v-icon>more_vert</v-icon>
      </v-btn>

      <v-list>
        <v-list-tile>
          <v-list-tile-title>
            <router-link to="login">Login</router-link>
          </v-list-tile-title>
        </v-list-tile>
        <v-list-tile>
          <v-list-tile-title to="registro">
            <router-link to="registro">Cadastro</router-link>
          </v-list-tile-title>
        </v-list-tile>
      </v-list>
    </v-menu>
    <v-menu v-else v-model="menu" :close-on-content-click="false" :nudge-width="200" offset-x>
      <v-avatar slot="activator">
        <img v-if="usuario.photo_url" :src="usuario.photo_url" alt="User">
        <img v-else :src="require('@/assets/images/icons/SVG/pessoas.svg')" alt>
      </v-avatar>

      <v-card>
        <v-list>
          <v-list-tile avatar>
            <v-list-tile-avatar>
              <img v-if="usuario.photo_url" :src="usuario.photo_url" :alt="usuario.name">
              <img
                v-else
                :src="require('@/assets/images/icons/SVG/pessoas.svg')"
                :alt="usuario.name"
              >
            </v-list-tile-avatar>

            <v-list-tile-content>
              <v-list-tile-title>{{usuario.name}}</v-list-tile-title>
              <v-list-tile-sub-title>Tipo: {{usuario.type_user.name}}</v-list-tile-sub-title>
            </v-list-tile-content>

            <v-list-tile-action>
              <v-btn :class="fav ? 'red--text' : ''" icon @click="fav = !fav">
                <v-icon>favorite</v-icon>
              </v-btn>
            </v-list-tile-action>
          </v-list-tile>
        </v-list>

        <v-card-actions>
          <div class="row">
            <div class="col-md-12 mb-1">
              <v-btn block color="primary" @click="minhaConta">
                <v-icon>account_circle</v-icon>Minha Conta
              </v-btn>
            </div>
            <div class="col-md-12">
              <v-btn block color="error" @click="logOut()">
                <v-icon>exit_to_app</v-icon>Sair
              </v-btn>
            </div>
          </div>
        </v-card-actions>
      </v-card>
    </v-menu>
  </v-toolbar>
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
    },
    usuario() {
      return this.$store.getters.getUsuario;
    }
  },
  methods: {
    setDrawer(value) {
      this.drawer = value;
      this.$store.commit("SET_DRAWER", value);
    },
    logOut() {
      this.$store.commit("SET_USUARIO", null);
      this.$router.push("/login");
    },
    minhaConta() {
      this.$router.push("/minhaconta");
    }
  },
  mounted(){
   
  },
  data() {
    return {
      fav: true,
      menu: false,
      message: false,
      hints: true
    };
  }
};
</script>
<style scoped>
</style>
