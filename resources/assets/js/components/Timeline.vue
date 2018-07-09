<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        Timeline
                    </div>
                        <div class="card-body">
                            <post-tweet :tweets="tweets"></post-tweet>
                            <hr>
                            <div class="media" v-for="tweet in tweets" :key="tweet.id">
                                <a href="#"><img class="mr-3" src="https://i1.wp.com/laracasts.s3.amazonaws.com/images/generic-avatar.png?ssl=true&w=64&h=64" alt="User Avatar"></a>
                                <div class="media-body">
                                    <h5 class="mt-0">{{tweet.user.name}}</h5>
                                    <p>{{tweet.body}}</p>
                                    <hr>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    import PostTweet from "./PostTweet.vue"
    export default {
        data() {
            // we will load data here
            return {
                tweets : []
            };
        },
        components: {
            PostTweet
        },
        mounted() {
            console.log('Component mounted.')
            // we will load http request here
            axios.get('/tweets').then((response)=>{
                this.tweets = response.data
            })
        }
    }
</script>

