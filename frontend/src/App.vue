<template>

  <v-app id="inspire">
    <esquerdoHome>
      
    </esquerdoHome>
    <topo-home>
      
    </topo-home>
    
    <v-content>
      <router-view></router-view>
    </v-content>
    <footerHome>

    </footerHome>
  </v-app>

</template>

<script>
import footerHome from '@/components/menu/footerHome'
import topoHome from '@/components/menu/topoHome'
import esquerdoHome from '@/components/menu/esquerdoHome'
import '@/assets/css/animated.css'

export default {
  name: 'App',
  components: {
    topoHome,
    esquerdoHome,
    footerHome
  },
  data () {
    return {
      
    }
  },
  mounted(){
    
  }
}
</script>
<style>
body{
  font-family: 'Roboto', sans-serif !important;
}
.router-link-exact-active{
  text-decoration: none !important;
}
.v-btn--router:hover, .router-link-exact-active:hover{
  text-decoration: none !important;
}
</style>

