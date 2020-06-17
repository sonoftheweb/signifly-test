<template>
    <div :key="topKey">
        <v-card max-width="100px" min-height="20px" flat class="transparent mx-auto">
            <v-progress-linear v-if="loading" color="white" indeterminate rounded height="6"/>
        </v-card>
        <v-row v-for="(team, index) in matchData" :key="index" class="mb-sm-10 mb-md-10 mb-lg-0">
            <v-col cols="12" :lg="rowWidth.first" md="12" sm="12">
                <v-card>
                    <v-card-text>
                        {{ team.name }}
                        <v-toolbar dense class="no-padding" flat color="transparent">
                            <players :team="team"/>
                            <v-spacer></v-spacer>
                            <wins-losses :team="team"/>
                        </v-toolbar>
                    </v-card-text>
                </v-card>
            </v-col>
            <v-col cols="12" class="text-center" v-for="(match, matchIndex) in team.matches_as_home" :key="matchIndex" :lg="rowWidth.others" md="2" sm="12">
                <v-card v-on:dblclick="fireEdit(match)">
                    <v-card-text>
                        {{ match.away_team.name }}
                        <players :small="true" :team="match.away_team"/>
                        <h3 class="heading mt-2">
                            {{ match.score.home_team_score }} - {{ match.score.away_team_score }}
                        </h3>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </div>
</template>

<script>
    import ScoreBoardViewAbstract from './ScoreBoardViewAbstract'
    import Players from '../utils/Players'
    import WinsLosses from '../utils/WinsLosses'

    export default {
        extends: ScoreBoardViewAbstract,
        components: { Players, WinsLosses },
        computed:{
            rowWidth() {
                let matchesLength = this.matchData[0].matches_as_home.length
                let colCount = matchesLength + 1
                let eachColWidth = Math.floor(12 / colCount)
                let firstCol = (12 % colCount) + 1

                return {
                    'first': firstCol,
                    'others': eachColWidth
                }
            }
        }
    }
</script>
