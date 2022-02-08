require('./bootstrap');
require('axios');

export default {
    data() {
        return {
            posts: {},
        }
    },
    methods: {
        getPosts() {
            axios.get('posts/fetch')
                .then(function (response) {
                    this.posts
                    console.log('check');
                });
        }
    },
    created() {
        this.getPost()
    }
}
