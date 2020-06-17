<template>
    <div>
        <v-card max-width="100px" min-height="20px" flat class="transparent">
            <v-progress-linear v-if="loading" color="white" indeterminate rounded height="6"/>
        </v-card>
        <v-card max-width="700px">
            <v-data-table
                :sort-by="['points']"
                :sort-desc="[true]"
                :headers="headers"
                :items="teams"
                :items-per-page="8"
            ></v-data-table>
        </v-card>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                loading: false,
                teams: [],
                headers: [ // this could possibly be served from the backend too, that way we could have a dynamic magic table
                    {
                        text: '#',
                        align: 'start',
                        sortable: false,
                        value: 'id'
                    },
                    {
                        text: 'Team',
                        align: 'center',
                        sortable: true,
                        value: 'name'
                    },
                    {
                        text: 'Won',
                        align: 'center',
                        sortable: true,
                        value: 'wins'
                    },
                    {
                        text: 'Lost',
                        align: 'center',
                        sortable: true,
                        value: 'losses'
                    },
                    {
                        text: 'Points',
                        align: 'center',
                        sortable: true,
                        value: 'points'
                    },
                ],
                interval: null
            }
        },
        methods: {
            fetchData() {
                this.loading = true

                this.$http.get('/api/public/teams?with=matchesAsHome')
                .then(response => {
                    this.teams = response.data.data
                    this.loading = false
                })
            }
        },
        mounted() {
            this.fetchData()

            this.interval = setInterval(() => this.fetchData(), 60000);
        },
        destroyed() {
            clearInterval(this.interval)
        }
    }
</script>

<style scoped>

</style>
