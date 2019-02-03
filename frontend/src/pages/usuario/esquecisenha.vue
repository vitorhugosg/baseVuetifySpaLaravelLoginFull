<template>
    <v-container fluid fill-height>
    <v-layout justify-center class="mt-5">
      <v-flex xs12 sm6 md4 lg4 class="mt-5">
        <form v-on:submit.prevent="login" id="resetarSenha">
          <v-card class="elevation-12 animated fadeInDown">
            <v-toolbar dark color="indigo">
              <v-toolbar-title>Resetar Senha</v-toolbar-title>
              <v-spacer></v-spacer>
            </v-toolbar>
            <v-card-text>
              <p v-if="errors.form">{{errors.form}}</p>
              <v-text-field
                prepend-icon="person"
                v-model="form.email"
                label="email"
                type="email"
                required
              ></v-text-field>
              
            </v-card-text>
            <v-card-actions>
              <v-btn
                block
                :loading="loading"
                :disabled="loading"
                type="submit"
                color="primary"
                dark
              >resetar</v-btn>
              <v-btn block outline to="registro" color="secundary">Registrar</v-btn>
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
        email: "",
        password: ""
      },
      errors: {
        form: ""
      },
      loading: false
    };
  },
  methods: {
    resetarSenha(e) {
      this.loading = true;
      let data = this.form;
      this.errors.form = "";
      let config = {
        header: {
          "Content-Type": "multipart/form-data"
        }
      };
      this.axios
        .post(sessionStorage.getItem("urlAPI") + "login", data, config)
        .then(response => {
          if (response.data.status) {
            console.log(response.data);
          } else if (response.data.status == false && response.data.validacao) {
            let erros = "";
            for (let erro of Object.values(response.data.erros)) {
              if (erro != "no" && erro != "false") {
                erros += " - " + erro;
              }
            }
            this.errors.form = erros;
          } else {
            this.errors.form =
              "Não foi encontrado usuário com esse email e senha.";
          }
        })
        .finally(() => {
          this.loading = false;
        });
    }
  }
};
</script>
<style scoped>
</style>

