<template>
  <div class="row justify-content-center">
    <div class="col-md-9">
      <div class="media simple-post" v-for="post in posts.data" :key="post.id">
        <img
          class="mr-3"
          :src="'/img/' + post.image" 
          alt="Generic placeholder image"
        />
        <div class="media-body">
          <h4 class="mt-0">
            <router-link
              :to="{ name: 'SinglePost', params: { slug: post.slug } }"
            >
              {{ post.title }}
            </router-link>
          </h4>
          {{ post.body.substr(0, 50) }}...
          <ul class="list-inline list-unstyled d-flex post-info">
            <li>
              <span
                ><i class="fa fa-user"></i> Posted By :
                <strong class="text-primary">{{ post.user.name }}</strong>
              </span>
            </li>
            <li>|</li>
            <li>
              <span><i class="fa fa-calendar"></i> {{ post.added_at }} </span>
            </li>
            <li>|</li>
            <span
              ><i class="fa fa-comment"></i>
              {{ post.comment_count }} Comments</span
            >
          </ul>
        </div>
      </div>
      <pagination :data="posts" @pagination-change-page="getPost"></pagination>
    </div>
    <!-- Sidebar Widgets Column -->
    <div class="col-md-3" style="min-width:200px">
      <!-- Search Widget -->
      <div class="card my-3">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
          <div class="input-group">
            <input
              type="text"
              class="form-control"
              placeholder="Search for..."
            />
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      posts: {}
    };
  },
  components: {},
  mounted() {
    //console.log("Component mounted.");
    this.getPost();
  },
  methods: {
    getPost(page) {
      axios
        .get('/api/category/' + this.$route.params.slug + '/posts?page='+page)
        .then(response => {
          this.posts = response.data;
          // console.log(response.data);
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>
