<template>

    <div align="right">
        <input type="text" placeholder="جستجوی کتاب..." v-model="query" v-on:keyup="autoComplete" class="form-control">

        <transition name="fade">
            <div class="panel-footer" v-if="results.length" align="right">
                <ul >

                    <li class="list-group-item border border-bottom border-dark " v-for="result in results" name="fade">
                        <a :href="'/showBook/'+result.id">
                            <img class="ml-5" :src="'/book-image/'+result.image" alt="" style="height: 50px;width: 50px">
                           {{ result.name }}
                        </a>
                    </li>

                </ul>
            </div>
        </transition>
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
