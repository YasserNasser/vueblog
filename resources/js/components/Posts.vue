<template>
  <div class="row">
    <div class="col-md-8" v-if="isSearching">
      Searching in the Posts....
    </div>
    <div class="col-md-8" v-else>
      <div class="media simple-post" v-for="post in posts" :key="post.id">
        <img
          class="mr-3"
          :src="'/assets/img/' + post.image"
          alt="Generic placeholder image"
        />
        <div class="media-body" v-if="post">
          <h4 class="mt-0">
            <router-link
              :to="{ name: 'SinglePost', params: { slug: post.slug } }"
            >
              {{ post.title }}
            </router-link>
          </h4>
          <div v-if="post">{{ post.body.substr(0, 50) }}...</div>
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
    </div>
    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">
      <!-- Search Widget -->
      <div class="card my-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
          <div class="input-group">
            <input
              type="text"
              class="form-control"
              placeholder="Search for..."
            v-model="searchposts" />
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button" >Go!</button>
            </span>
          </div>
        </div>
      </div>
      <!-- Categories Widget -->
      <categories></categories>
    </div>
  </div>
</template>

<script>
import categories from "./Categories";
export default {
  data() {
    return {
      posts: [],
      isSearching:false,
      searchposts:'',
    };
  },
  watch:{

    searchposts(query){
      if(query.length > 0){

        this.isSearching = true;
      axios.get('/api/searchposts/'+query)
      .then((response) =>{
        this.posts = response.data;
        //console.log(response.data);
        this.isSearching = false;

      })
      .catch((error)=>{
        console.log(error);
      });
      }else {
        this.posts = JSON.parse(localStorage.getItem('posts'));
      }
    }
  },
  components: {
    categories
  },
  mounted() {
    //console.log("Component mounted.");
    this.getPost();
  },
  methods: {
    getPost() {
      axios.get("/api/posts")
        .then(response => {
          this.posts = response.data;
         // console.log(response.data);
         localStorage.setItem('posts',JSON.stringify(this.posts));
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>
