<template>
    <div class="pa-10">

        <v-row>
            <v-col md="3">
                <season-lists/>
            </v-col>
            <v-col md="3">
                <season-editor :selected-data="seasonEditorData" v-if="showSeasonEditor"/>
            </v-col>
            <v-col md="3"></v-col>
        </v-row>

        <!--<v-card flat class="mx-auto transparent" max-width="900">

        </v-card>-->

    </div>
</template>

<script>
    import SeasonLists from './dash/SeasonLists'
    import SeasonEditor from './dash/SeasonEditor'

    export default {
        components: { SeasonLists, SeasonEditor },
        data() {
            return {
                tab: null,
                seasonEditorData: null,
                showSeasonEditor: false
            }
        },
        mounted() {
            let self = this
            this.$eventBus.$on('showSeasonDetails', function (selectedSeason) {
                self.seasonEditorData = selectedSeason
                self.showSeasonEditor = true
            })
        }
    }
</script>

<style scoped>

</style>
