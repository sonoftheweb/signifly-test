<template>
    <div>
        <v-toolbar color="transparent" flat dark>
            <v-toolbar-title>Seasons</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn icon dark>
                <v-icon>mdi-filter</v-icon>
            </v-btn>
            <v-btn @click="add_season_form = true" icon dark>
                <v-icon>mdi-plus-circle</v-icon>
            </v-btn>
        </v-toolbar>

        <p class="white--text px-4">Below is a list of all seasons, past and present. You may add new seasons here too.
            Please select a
            season to administer.</p>

        <transition name="fade" mode="out-in">
            <div v-if="add_season_form" class="my-5">
                <v-card flat color="transparent">
                    <v-card-text>
                        <v-card>
                            <v-card-text>
                                <v-form lazy-validation ref="addForm">
                                    <v-row>
                                        <v-col cols="12">
                                            <v-text-field outlined v-model="season.name" label="Season name *"
                                                          required/>
                                        </v-col>
                                    </v-row>
                                </v-form>
                                <small>*indicates required field</small>
                            </v-card-text>
                        </v-card>
                    </v-card-text>
                    <v-card-actions class="mr-2">
                        <v-spacer></v-spacer>
                        <v-btn color="white darken-1" text @click="add_season_form = false">Close</v-btn>
                        <v-btn color="success" :loading="loading" @click="saveSeason">Save</v-btn>
                    </v-card-actions>
                </v-card>
            </div>

            <div class="px-4 pt-5" v-if="!add_season_form">

                <v-row no-gutters>
                    <v-col>
                        <v-checkbox dark class="select-all" color="white" v-model="selectAllSeasons"/>
                    </v-col>
                    <v-col>
                        <v-select
                            dense
                            :items="['desc', 'asc']"
                            label="Sort"
                            solo
                        ></v-select>
                    </v-col>
                </v-row>


                <v-card class="clickable" flat v-for="(seasonData, index) in seasonsList" :key="index" @click="seasonDeets(seasonData)">
                    <v-card-title>
                        <div class="subtitle-1">{{ seasonData.name }}</div>
                        <!--<v-spacer/>
                        <v-btn icon><v-icon small>mdi-flag-triangle</v-icon></v-btn>-->
                    </v-card-title>
                    <v-card-text>
                        <v-row>
                            <v-col>
                                <v-icon small>mdi-calendar-range</v-icon> {{ seasonData.created_at }}
                            </v-col>
                            <v-col>
                                <v-icon small>mdi-account-group</v-icon>
                                {{ seasonData.team_count }} teams
                            </v-col>
                            <v-col>
                                <v-icon small>mdi-ballot</v-icon>
                                {{ seasonData.matches_count }} matches
                            </v-col>
                        </v-row>
                    </v-card-text>
                </v-card>
            </div>


        </transition>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                loading: false,
                add_season_form: false,
                seasonsList: [],
                season: {
                    name: null
                },
                selectAllSeasons: false
            }
        },
        methods: {
            saveSeason() {
                this.loading = true
                this.$http.post('/api/admin/seasons', this.season)
                    .then(response => {
                        this.add_season_form = false
                        // show alert
                        this.fetchData()
                        this.loading = false
                    })
            },
            fetchData() {
                this.$http.get('/api/admin/seasons')
                    .then(response => {
                        this.seasonsList = response.data.data
                        this.loading = false
                    })
            },
            seasonDeets(selectedSeason) {
                this.$eventBus.$emit('showSeasonDetails', selectedSeason)
            }
        },
        mounted() {
            this.loading = true
            this.fetchData()
        }
    }
</script>
