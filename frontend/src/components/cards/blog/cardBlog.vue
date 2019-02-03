<template>
  <v-card class="m-3" v-if="post">
    <div v-if="post.thumbnail !== null && post.thumbnail !== undefined">
      <v-img class="white--text" height="200px" :src="post.thumbnail.attachment.url"/>
    </div>
    <div v-else>
      <v-img
        class="white--text"
        height="200px"
        src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
      />
    </div>
    <v-container fill-height fluid>
      <v-layout fill-height>
        <v-flex xs12 align-end flexbox>
          <span class="headline secundary--text">{{post.title | truncate}}</span>
        </v-flex>
      </v-layout>
    </v-container>
    <v-card-text v-html="truncateBody(post.content)" class="truncateBlog"></v-card-text>
    <v-card-actions>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <v-btn block dark color="primary">Ver notícia</v-btn>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <!-- social buttons -->
          </div>
        </div>
      </div>
    </v-card-actions>
  </v-card>
</template>
<script>
export default {
  props: ["post"],

  methods: {
    truncateBody: function(value) {
      if (value.length > 72) {
        value = value.substring(0, 69) + "...";
      }
      return value;
    }
  },
  filters: {
    truncate: function(value) {
      if (value.length > 14) {
        value = value.substring(0, 11) + "...";
      }
      return value;
    }
  }
};
</script>
<style scoped>
</style>