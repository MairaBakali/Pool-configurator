<template>
  <v-app>
    <div class="hero">
      <div class="appbar">
        <v-app-bar class="appbar" :color="bar.background">
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
          <div class="hidden-xs-only">
            <v-btn x-small text>
              <v-icon left dark small color="#FFFFFF"> mdi-information </v-icon>
              <p class="mt-4 infotext">Infos und Hinweise</p>
            </v-btn>
          </div>
        </v-app-bar>
      </div>
      <div class="sheet">
        <h3>Herzlich willkommen im Cranpool Konfigurator!</h3>
        <span class="hidden-sm-and-down">
          <v-row class="mt-10" align="center" justify="center">
            <button @click="configpage()" class="lg-button">
              <v-icon color="white" x-large>mdi-swim</v-icon>

              <h5>Jetzt Ihren Traumpool konfigurieren!</h5>
            </button>
          </v-row>
          <v-row class="mt-12" align="center" justify="center">
            <button @click="helppage()" large class="sm-button">
              <v-icon color="white">mdi-help-circle-outline</v-icon>
              Benötigen Sie Hilfe?
            </button>
          </v-row>
        </span>
        <span class="hidden-md-and-up">
          <v-row class="mt-2" align="center" justify="center">
            <button @click="configpage()" class="lg-button">
              <v-icon color="white" large>mdi-swim</v-icon>

              <h4>Ihren Traumpool konfigurieren!</h4>
            </button>
          </v-row>
          <v-row class="mt-8" align="center" justify="center">
            <button @click="helppage()" class="sm-button">
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
        { title: "Startseite", link: "/" },
        { title: "Infos", link: "/help" },
        { title: "Konfigurator", link: "/config" },
      ],
      bar: {
        background: "transparent",
      },
    };
  },
  methods: {
    configpage() {
      this.$router.push("/config");
    },
    helppage() {
      this.$router.push("/help");
    },
  },
};
</script>
<style lang="scss" src="./homepage.scss">
</style>

