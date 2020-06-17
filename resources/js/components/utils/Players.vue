<template>
    <div>
        <v-chip :small="small" v-for="(player, playerIndex) in team.players" :key="playerIndex" class="mr-2 mt-2" color="indigo" text-color="white">
            <v-avatar left>
                <v-icon>mdi-account-circle</v-icon>
            </v-avatar>
            {{ player.name }}
        </v-chip>
    </div>
</template>

<script>
  export default {
    props: ["team", "small"]
  }
</script>
