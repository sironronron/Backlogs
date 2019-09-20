<template>
    <div>
        <li class="uk-margin-small-bottom" v-for="category in categories" :key="category.id">
            <a :href="`/category/${category.slug}`" class="uk-text-dark">{{ category.name }}</a>
        </li>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: 'categories',

        data: () => ({
            categories: []
        }),

        created() {
            this.getCategories()
        },

        methods: {
            getCategories() {
                axios.get('/get-categories')
                .then((res) => {
                    this.categories = res.data.categories
                })
            }
        }
        
    }
</script>