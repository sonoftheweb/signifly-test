<template>
    <div>
        <v-app>
            <v-main class="indigo">
                <v-container class="pa-0" fluid>
                    <div class="mt-10"></div>
                    <transition name="fade" mode="out-in">
                        <router-view></router-view>
                    </transition>
                </v-container>
            </v-main>
        </v-app>
    </div>
</template>

<script>
  export default {
    name: "App"
  }
</script>
