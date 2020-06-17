<script>
    export default {
        props: ["url"],
        data() {
            return {
                loading: false,
                matchData: [],
                interval: null,
                topKey: Math.random()
            }
        },
        methods: {
            fetchData() {
                this.loading = true
                this.$http.get(this.url)
                    .then(response => {
                        this.matchData = response.data.data
                        this.loading = false
                    })
            },
            fireEdit(match) {
                this.$emit('fireEdit', match)
            }
        },
        mounted() {
            this.fetchData()

            let self = this
            this.$eventBus.$on('reloadData', function () {
                self.fetchData()
                self.topKey += 1
            })

            this.interval = setInterval(() => {
                this.fetchData()
                this.topKey += 1
            }, 60000);
        },
        destroyed() {
            clearInterval(this.interval)
        }
    }
</script>

<style scoped>

</style>
