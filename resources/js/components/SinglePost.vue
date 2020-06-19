<template>
  <div class="container">
    <div class="col-lg-12">
      <!-- Title -->
      <h1 class="mt-4">{{ post.title }}</h1>

      <!-- Category -->
      <p>
        Category :
        <strong
          class=" alert alert-info"
          style="width: fit-content;
        padding: 5px;
        color: #142d31;"
          v-if="post.category"
          ><router-link :to="{ name: 'CategoryPosts', params: { slug: post.category.slug } }">{{ post.category.name }}</router-link>
        </strong>
      </p>

      <p></p>

      <hr />

      <!-- Date/Time -->
      <p>
        Posted by :
        <strong class="badge badge-primary p-1">{{ post.auther }}</strong> At :
        <strong class="badge badge-danger p-1"> {{ post.added_at }}</strong>
        <span class="float-right"
          ><strong class="badge badge-info p-1" v-if="comments">{{comments.length}}</strong>
          Comments</span
        >
      </p>

      <hr />

      <!-- Preview Image -->
      <img
        class="img-fluid rounded"
        :src="'/assets/img/' + post.image"
        style="width:900px;max-height:300px"
        alt=""
      />

      <hr />

      <!-- Post Content -->
      <p class="lead">{{ post.body }}</p>

      <hr />

      <!-- Comments Form -->
      <div  class="card my-4">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">
          <form>
            <div class="form-group">
              <input type="hidden" v-model="post_id" >
              <textarea class="form-control" rows="3" v-model="content"></textarea>
            </div>
            <button v-if="isLogged" type="submit" class="btn btn-primary" @click.prevent="addComment">Submit</button>
            <p v-else class="lead">Login to active write comments</p>
          </form>
        </div>
      </div>

      <!-- Single Comment -->
      <div
        class="media mb-4"
        v-for="(comment, index) in post.comments"
        :key="index"
      >
        <img
          class="d-flex mr-3 rounded-circle"
          :src="'/assets/img/profile/' + comment.user['profile_img']"
          style="width:70px;"
          alt=""
        />
        <div class="media-body">
          <h5 class="mt-0" v-if="comment.user">
            {{ comment.user.name }}
          </h5>
          <p>
            Posted on
            <strong class="badge badge-primary p-1">{{
              comment.added_at
            }}</strong>
            <!--at <strong class="badge badge-danger p-1"> 12:00 PM</strong></p>-->
          </p>
          <p>{{ comment.content }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      post: [],
      content:'',
      post_id:'',
      comments:[]
    };
  },
  created() {
    //console.log("Component mounted." + this.$route.params.slug);
    this.getSinglePost();
    this.updateToken();
  },
  methods: {
    getSinglePost() {
      axios
        .get("/api/posts/" + this.$route.params.slug)
        .then(response => {
          this.post = response.data;
          this.post_id = this.post.id;
          this.comments = this.post.comments;
          //console.log(response.data);
        })
        .catch(error => {
          console.log(error);
        });
    },
    addComment() {
      let {content,post_id} = this;
      axios.post("/api/comment/create",{content,post_id})
        .then((response) => {
          this.comments.unshift(response.data);
          console.log(response.data);
        })
        .catch(error => {
          console.log(error);
        });
    },
    updateToken(){
      let token = JSON.parse(localStorage.getItem('userToken'));
      this.$store.commit('setUserToken',token);
    }
  },
  computed:{
    isLogged(){
      return this.$store.getters.isLogged;
    }
  }
};
</script>
