<template>
<!-- Edit Modal HTML -->
	<div id="editPostModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form enctype="multipart/form-data">
					<div class="modal-header">
						<h4 class="modal-title">Edit Post</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>title</label>
							<input type="text" class="form-control" required v-model="PostToEdit.title">
						</div>
						<div class="form-group">
							<label>body</label>
							<textarea name=""  cols="30" class="form-control" v-model="PostToEdit.body"
                            rows="10"></textarea>
						</div>
						<div class="form-group">
							<label>category</label>
							<select v-if="PostToEdit.category" class="form-control" v-model="PostToEdit.category.id">
                                <!-- <option   selected>{{PostToEdit.category.name}}</option> -->

                                <option :value="category.id" v-for="category in categories" :key="category.id">
								 {{ category.name }}
								</option>
                            </select>
						</div>
						<div class="form-group">
							<label>image</label>
                            <img  :src="'/img/'+PostToEdit.image" style="height:60px;width:60px;border:1px solid #999;" alt="" />
                            <!-- <img :src="PostToEdit.image" style="height:60px;width:60px;border:1px solid #999;" alt="" /> -->
							<input type="file" class="form-control" required @change="onImageChange" >
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Update" @click.prevent="updatePost">
					</div>
				</form>
			</div>
		</div>
	</div>
   <!-- <editpost></editpost> -->
</template>

<script>
import $ from 'jquery'
export default {
  data() {
    return {
	 
	  categories:[],
    }
  },
 
 methods: {
	getCategories(){
		axios.get("/api/admin/categories")
        .then(response => {
          this.categories = response.data;
         // console.log(response.data);
         localStorage.setItem('categories',JSON.stringify(this.categories));
        })
        .catch((error) => {
          console.log(error);
        });
	},
	onImageChange(e){
		this.PostToEdit.image = e.target.files[0];
	},
	updatePost(){
		let config ={
			headers:{"content-type" : 'multipart/form-data'}
		}
		let formdata = new FormData();
		formdata.append('title',this.PostToEdit.title);
		formdata.append('id',this.PostToEdit.id);
		formdata.append('body',this.PostToEdit.body);
		formdata.append('image',this.PostToEdit.image);
		formdata.append('category',this.PostToEdit.category.id);
		
		axios.post("/api/admin/updatePost",formdata,config)
        .then((response) => {

		 // this.categories = response.data;
		  
		  
		  //this.posts.data += response.data;
          this.PostToEdit.image= response.data.image;
          $('#editPostModal').modal('hide');
		 
        })
        .catch((error) => {
          console.log(error);
        });
	}
  },
  created(){
	  this.getCategories();
  },
  computed:{
      PostToEdit(){
          return this.$store.getters.PostToEdit;
      }
  }


// $(document).ready(function(){
// 	// Activate tooltip
// 	$('[data-toggle="tooltip"]').tooltip();
// 	// Select/Deselect checkboxes
// 	var checkbox = $('table tbody input[type="checkbox"]');
// 	$("#selectAll").click(function(){
// 		if(this.checked){
// 			checkbox.each(function(){
// 				this.checked = true;
// 			});
// 		} else{
// 			checkbox.each(function(){
// 				this.checked = false;
// 			});
// 		}
// 	});
// 	checkbox.click(function(){
// 		if(!this.checked){
// 			$("#selectAll").prop("checked", false);
// 		}
// 	});
// });
}
</script>
