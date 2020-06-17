<template>
    <div :key="topKey">
        <v-card max-width="100px" min-height="20px" flat class="transparent mx-auto">
            <v-progress-linear v-if="loading" color="white" indeterminate rounded height="6"/>
        </v-card>
        <v-row>
            <v-col cols="12" v-for="(match, index) in matchData" :key="index" lg="3" md="4" sm="6">
                <v-card>
                    <v-card-text>

                        <v-row>
                            <v-col xs="12" sm="12" md="12" lg="5" class="text-center">
                                <div class="heading">{{ match.home_team.name }}</div>
                                <div
                                    v-for="(player, index) in match.home_team.players"
                                    :key="index">
                                    <small>{{ player.name }}</small>
                                </div>
                            </v-col>
                            <v-col xs="12" sm="12" md="12" lg="2" class="text-center">
                                <v-avatar color="indigo" size="25">
                                    <span class="white--text heading">VS</span>
                                </v-avatar>
                            </v-col>
                            <v-col xs="12" sm="12" md="12" lg="5" class="text-center">
                                <div class="heading">{{ match.away_team.name }}</div>
                                <div
                                    v-for="(player, index) in match.away_team.players"
                                    :key="index">
                                    <small>{{ player.name }}</small>
                                </div>
                            </v-col>
                        </v-row>

                        <h3 class="text-center">{{ match.score.home_team_score }} - {{ match.score.away_team_score }}</h3>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </div>
</template>

<script>
    import ScoreBoardViewAbstract from './ScoreBoardViewAbstract'

    export default {
        extends: ScoreBoardViewAbstract
    }
</script>
