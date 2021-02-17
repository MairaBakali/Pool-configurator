<template>
  <v-app>
    <div class="bar hidden-sm-and-down">
      <v-app-bar
        :color="topbar.trans"
        :max-height="topbar.mh"
        :height="topbar.height"
      >
        <div>
          <v-img
            @click="homepage()"
            height="12vh"
            width="9vw"
            contain
            src="https://i.ibb.co/mJXPTz2/Group-14-2x.jpg"
            alt="logo"
          />
        </div>
        <div class="title">
          <h2 :class="textmargin.class">Konfigurieren Sie Ihren Wunschpool</h2>
          <br />
          <p>Rein in den Traumpool mit Cranpool</p>
        </div>
        <v-spacer></v-spacer>
        <v-btn class="btnunder" to="/help" small text>
          <v-icon left medium color="#FFFFFF"> mdi-information </v-icon>
          <p class="infotext">Infos und Hinweise</p>
        </v-btn>
      </v-app-bar>
      <v-toolbar color="#EF7D01" height="7px" max-height="8px"></v-toolbar>
    </div>
    <div class="bar hidden-md-and-up">
      <v-app-bar :color="topbar.trans" :height="topbar.sh" class="top">
        <div>
          <v-img
            @click="homepage()"
            height="80px"
            width="90px"
            contain
            src="https://i.ibb.co/mJXPTz2/Group-14-2x.jpg"
            alt="logo"
          />
        </div>
        <div class="title">
          <h2 :class="textmargin.class">Konfigurieren Sie Ihren Wunschpool</h2>
          <br />
          <p class="small">Rein in den Traumpool mit Cranpool</p>
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

      <v-toolbar color="#EF7D01" height="5px" max-height="5px"></v-toolbar>
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
    <v-main>
      <mainsheet />
    </v-main>
  </v-app>
</template>

<script>
import mainsheet from "../components/mainsheet.vue";
export default {
  data() {
    return {
      items: [
        { title: "Startseite", link: "/home" },
        { title: "Infos", link: "/help" },
        { title: "Konfigurator", link: "/config" },
      ],
      drawer: false,
      topbar: {
        height: "80px",
        mh: "85px",
        sh: "55px", //small screen bar height
        trans: "transparent",
      },
      textmargin: {
        class: "mt-2 ",
        font: "3.5vw 3.6vh",
      },
    };
  },
  methods: {
    homepage() {
      this.$router.push("/home");
    },
  },
  components: {
    mainsheet,
  },
};
</script>
<style lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Lato&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&display=swap");
.v-application--wrap {
  background-color: rgba(0, 0, 0, 0.3);
}
#app {
  background: url("../src/back.jpg");
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
  display: block;
  height: 100%;
  width: 100%;
}
body {
  width: 100vw;
  height: 100vh;
  font-family: "Lato", sans-serif;
}
.v-btn:hover {
  text-decoration: none;
}
.infotext {
  margin-top: 1vw;
  letter-spacing: 0;
  font-family: "Open Sans", sans-serif;
  font-size: 1.2vw;
  color: #ffffff;
  text-transform: capitalize;
}
.bar {
  background: linear-gradient(
    to right,
    white,
    white,
    rgba(202, 231, 245, 0.8),
    rgba(38, 165, 223, 0.83)
  );
}

p {
  color: #9a9a9a;
  line-height: 1.3;
  font-size: 2.5vw;
  font-size: 2vh;
  font-weight: 200;
}
.small {
  color: #9a9a9a;
  line-height: 1;
  font-size: 2vw;
  font-size: 1.5vh;
  font-weight: 200;
}
h2 {
  font-size: 2.5vw;
  margin-top: 2%;
  // text-align: center;
  font-family: "Lato", sans-serif;
  font-weight: bold;
  letter-spacing: 0;
  display: contents;
  white-space: pre;
}
.title {
  opacity: 1;
  color: #ef7d01;
}
.smalltitle {
  margin-top: 1.5%;
  margin-left: 3%;
}
.smallh2 {
  color: #ef7d01;
  font-size: 3.5vw;
  text-align: center;
  font-family: "Lato", sans-serif;
  font-weight: bold;
  letter-spacing: 0;
  display: contents;
  white-space: pre;
}
img {
  max-width: 40%;
  height: auto;
  width: 100%;
}
</style>

