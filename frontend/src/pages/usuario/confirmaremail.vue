<template>
    <v-container fluid fill-height>
    <v-layout justify-center class="mt-5">
      <v-flex xs12 sm6 md4 lg4 class="mt-5">
        
          <v-card class="elevation-12 animated fadeInDown">
            <v-toolbar dark color="indigo">
              <v-toolbar-title>Por favor confirme seu email</v-toolbar-title>
              <v-spacer></v-spacer>
            </v-toolbar>
            <v-card-text>
              <h3>
                  Por favor, confime seu email para poder logar na plataforma ;)
              </h3>
              <v-img class="my-3" max-height="150" contain=true :src="require('@/assets/images/icons/SVG/email.svg')">

              </v-img>
            </v-card-text>
            <v-card-actions>
              <v-btn
                block
                type="submit"
                color="primary"
                dark
                to="/login"
              >Login</v-btn>
            </v-card-actions>
          </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>
<script>
export default {
    
}
</script>
<style scoped>

</style>
