<template>
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12"  v-if="posts == 'loader'">
              <v-progress-linear :indeterminate="true"></v-progress-linear>
          </div>
          
      </div>
    <div class="row">
      <div class="col-md-12 text-center py-4" >
          <h2 class="font-weight-medium primary--text">Ultimas notícias do blog</h2>
      </div>
    </div>
    <div class="row" v-if="posts">
      <div class="col-sm-12 col-md-6 col-lg-3" v-for="post in posts" :key="post.ID">
        <blogCard :post="post"></blogCard>
      </div>
    </div>
  </div>
</template>
<script>
import blogCard from "@/components/cards/blog/cardBlog";
export default {
  components: {
    blogCard
  },
  created() {
    this.$store.dispatch("GET_POSTS");
  },
  computed: {
    posts() {
      return this.$store.getters.getPosts;
    }
  }
};
</script>
<style >
.truncateBlog > * {
  font-size: 14px !important;
  font-weight: 200;
  height: auto;
  padding: 0px !important;
  margin: 0px !important;
}
.truncateBlog.v-card__text {
  padding: 0px 16px 0px !important;

  height: 55px;
}
</style>
