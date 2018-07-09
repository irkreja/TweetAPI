<template>
  <form action="" v-on:submit.prevent="post">
	  <div class="form-group">
		  <textarea class="form-control {is-invalid : errors.length}" v-model="body"></textarea>
			<div v-if="errors.length" v-for="error in errors" :key="error.id" class="text-danger">
				{{error}}
			</div>
	  </div>
	  <div class="form-group">
		  <button type="submit">Publish</button>
	  </div>

  </form>
</template>

<script>
export default {
	data(){
		return {
			body : null,
			errors : []
		}
	},
	props: [
		'tweets'
	],
	methods : {
		post(){
			axios.post('/tweets',{ body : this.body }).then((response)=>{
				this.tweets.unshift(response.data)
				this.body = null
				this.errors = []
			}).catch(error => {
				console.log(error.response.data.errors.body);
				this.errors = error.response.data.errors.body;
				console.log(this.errors);

			});
		}
	},
	mounted(){
		console.log(this.errors.length);

	}
}
</script>

