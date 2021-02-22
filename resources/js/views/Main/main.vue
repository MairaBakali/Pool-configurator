<template>
  <v-app>
    <div class="hero">
      <v-app-bar class="appbar">
        <div class="hidden-xs-only appbar-img">
          <v-img src="https://i.ibb.co/mJXPTz2/Group-14-2x.jpg" />
        </div>

        <div class="bar-content">
          <h3>Konfigurieren Sie Ihren Wunschpool</h3>
          <p>Rein in den Traumpool mit Cranpool</p>
        </div>
        <v-spacer></v-spacer>
        <div class="hidden-sm-and-up">
          <v-app-bar-nav-icon @click.stop="drawer = !drawer">
          </v-app-bar-nav-icon>
        </div>
      </v-app-bar>
      <div class="sheet">
        <h3>Herzlich willkommen im Cranpool Konfigurator!</h3>
        <span class="hidden-sm-and-down">
          <v-row class="mt-10" align="center" justify="center">
            <button class="lg-button">
              <v-icon color="white" x-large>mdi-swim</v-icon>

              <h5>Jetzt Ihren Traumpool konfigurieren!</h5>
            </button>
          </v-row>
          <v-row class="mt-12" align="center" justify="center">
            <button large class="sm-button">
              <v-icon color="white">mdi-help-circle-outline</v-icon>
              Benötigen Sie Hilfe?
            </button>
          </v-row>
        </span>
        <span class="hidden-md-and-up">
          <v-row class="mt-2" align="center" justify="center">
            <button class="lg-button">
              <v-icon color="white" large>mdi-swim</v-icon>

              <h4>Jetzt Ihren Traumpool konfigurieren!</h4>
            </button>
          </v-row>
          <v-row class="mt-8" align="center" justify="center">
            <button class="sm-button">
              <v-icon color="white">mdi-help-circle-outline</v-icon>
              Benötigen Sie Hilfe?
            </button>
          </v-row>
        </span>
      </div>
      <v-navigation-drawer v-model="drawer" right temporary absolute>
        <v-list>
          <v-list-item
            v-for="item in items"
            :key="item.title"
            :to="item.link"
            link
          >
            {{ item.title }}
          </v-list-item>
        </v-list>
      </v-navigation-drawer>
    </div>
  </v-app>
</template>
<script>
export default {
  data() {
    return {
      drawer: false,
      items: [
        { title: "Startseite", link: "/home" },
        { title: "Infos", link: "/help" },
        { title: "Konfigurator", link: "/config" },
      ],
    };
  },
};
</script>
<style lang="scss" src="./main.scss">
</style>

