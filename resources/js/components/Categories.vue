<template>
  <div class="card my-4">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <ul class=" mb-0" v-if="categories.length > 0">
            <li v-for="(category, index) in categories" :key="index">
              <router-link :to="{ name: 'CategoryPosts', params: { slug: category.slug } }">{{ category.name }}</router-link>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      categories:[]
    };
  },
  created() {
    this.getCategories();
  },
  methods: {
    getCategories() {
      axios
        .get("/api/categories")
        .then((response) => {
          this.categories = response.data;
          //console.log(response);
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>
