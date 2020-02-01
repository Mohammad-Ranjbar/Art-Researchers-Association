<template>

    <div class="dropdown float-left" align="right">
        <input type="text" placeholder="جستجوی کتاب..." v-model="query" v-on:keyup="autoComplete" class="dropdown-toggle" data-toggle="dropdown">

        <div class="dropdown-menu dropdown-menu-right" align="right">
            <ul  v-if="results.length" >
                <li class="dropdown-item " v-for="result in results" name="fade" >
                    <a :href="'/showBook/'+result.id">
                        <img class="float-right ml-4" :src="'/book-image/'+result.image" alt="" style="height: 50px;width: 50px">
                        <small class="float-left">{{ result.name }}</small>
                    </a>
                </li>
            </ul>

        </div>

    </div>

</template>

<script>
	export default {
		name: 'search',
		data() {
			return {
				query: '',
				results: [],
			};
		},
		methods: {
			autoComplete() {
				this.results = [];
				if (this.query.length > 1) {
					axios.get('/search', { params: { query: this.query } }).then(response => {
						this.results = response.data;
					});
				}
			},
		},
	};
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }

</style>
