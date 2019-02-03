<template>
  <div>
    <v-jumbotron
      dark
      src="https://cdn.vuetifyjs.com/images/parallax/material2.jpg"
    >
      <div class="row">
        <div class="col-md-12 text-center mt-5">
          <h2>Sua plataforma de vídeos online</h2>
        </div>
      </div>
    </v-jumbotron>
    <blogFull></blogFull>
  </div>
</template>

<script>
import blogFull from '@/components/sections/blog/blogfull'
export default {
  name: "App",
  components:{
    blogFull
  }
};
</script>

<style>
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
