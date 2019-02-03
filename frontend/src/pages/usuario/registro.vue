<template>
  <v-container fluid fill-height>
    <v-layout justify-center class="mt-5">
      <v-flex xs12 sm6 md4 lg4 class="mt-5">
        <form v-on:submit.prevent="cadastro" id="cadastro">
          <v-card class="elevation-12 animated fadeInDown">
            <v-toolbar dark color="indigo">
              <v-toolbar-title>Cadastro na plataforma</v-toolbar-title>
              <v-spacer></v-spacer>
            </v-toolbar>
            <v-card-text>
              <v-text-field
                prepend-icon="person"
                v-model="form.name"
                label="Nome"
                type="text"
                required
              ></v-text-field>
              <v-text-field
                prepend-icon="person"
                v-model="form.email"
                label="email"
                type="email"
                required
              ></v-text-field>
              <v-text-field
                id="password"
                prepend-icon="lock"
                v-model="form.password"
                label="Senha"
                type="password"
                required
              ></v-text-field>
              <v-text-field
                prepend-icon="lock"
                v-model="form.password_confirmation"
                label="Confirme Sua Senha"
                type="password"
                required
              ></v-text-field>
            </v-card-text>
            <v-card-actions>
              <v-btn
                :loading="loading"
                :disabled="loading"
                block
                type="submit"
                color="primary"
                dark
              >
                Registrar
                <span slot="loader" class="custom-loader">
                  <v-icon light>cached</v-icon>
                </span>
              </v-btn>
              <v-btn block to="login" outline color="secundary">Login</v-btn>
            </v-card-actions>
          </v-card>
        </form>
      </v-flex>
    </v-layout>
  </v-container>
</template>
<script>
export default {
  data() {
    return {
      form: {
        name: "",
        email: "",
        password: "",
        password_confirmation: ""
      },
      errors: {
        form: ""
      },
      loading: false
    };
  },
  methods: {
    cadastro(e) {
      this.loading = true;
      this.errors.form = "";
      if (!this.validate) {
        return;
      }
      let data = this.form;

      let config = {
        header: {
          "Content-Type": "multipart/form-data"
        }
      };
      this.axios
        .post(sessionStorage.getItem("urlAPI") + "register", data, config)
        .then(response => {
          if (response.data.status) {
            this.$store.commit("SET_USUARIO", response.data.usuario);
            this.$router.push("/confirmaremail");
          } else if (response.data.status == false && response.data.validacao) {
            let erros = "";
            for (let erro of Object.values(response.data.erros)) {
              if (erro != "no" && erro != "false") {
                erros += " - " + erro;
              }
            }
            this.errors.form = erros;
          } else {
            this.errors.form = "Error ao cadastrar usuário";
          }
        })
        .finally(() => {
          this.loading = false;
        });
    },
    validate() {
      if (
        this.form.password !== this.form.repeat_password ||
        this.form.password == null
      ) {
        this.$swal("Hello Vue world!!!");
        this.$swal({
          type: "error",
          title: "Oops...",
          text: "Something went wrong!"
        });
        return false;
      } else {
        return true;
      }
    }
  }
};
</script>
<style scoped>
</style>
