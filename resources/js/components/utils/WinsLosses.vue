<template>
    <div class="pt-4">
        <span class="ml-4"><v-icon>mdi-bookmark-check</v-icon> {{ wins }} {{ verbs.w }}</span>
        <span class="ml-4"><v-icon>mdi-bookmark-remove</v-icon> {{ losses }} {{ verbs.l }}</span>
    </div>
</template>

<script>
    export default {
        props: ["team"],
        data () {
            return {
                wins: 0,
                losses: 0
            }
        },
        computed: {
            verbs() {
                return {
                    w: (this.wins === 1) ? 'win' : 'wins',
                    l: (this.losses === 1) ? 'loss' : 'losses'
                }
            }
        },
        mounted() {
            this.wins = this.team.wins
            this.losses = this.team.losses
        }
    }
</script>

<style scoped>

</style>
