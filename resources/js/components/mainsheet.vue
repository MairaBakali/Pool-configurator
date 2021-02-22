<template>
  <v-main>
    <v-container>
      <!-- THIS IS THE LARGE SCREEN CONTAINER -->
      <div class="lgsccontainer hidden-xs-only">
        <v-row class="mt-5" align="center" justify="center">
          <div class="maintext">
            <h4>Herzlich willkommen im Cranpool Konfigurator!</h4>
          </div>
          <!-- <v-btn
            to="/config"
            class="mt-10 btn-content"
            :width="btncolor.wd"
            :height="btncolor.he"
            :class="btncolor.txt"
            rounded
            :color="btncolor.config"
          >
            <v-icon large> mdi-swim </v-icon>

            <span style="text-transform: capitalize" class="btntext">
              Jetzt Ihren Traumpool konfigurieren!
            </span>
          </v-btn> -->
          <v-btn
            to="/config"
            class="mt-7 btn-content"
            :width="btncolor.wd"
            :height="btncolor.he"
            :class="btncolor.txt"
            rounded
            :color="btncolor.config"
          >
            <v-row>
              <v-col>
                <v-row>
                  <span>
                    <span class="icon-center">
                      <v-icon large>mdi-swim</v-icon></span
                    >
                    <v-row class="mt-1">
                      <span style="text-transform: capitalize" class="btntext">
                        Jetzt Ihren Traumpool konfigurieren!
                      </span>
                    </v-row>
                  </span>
                </v-row>
              </v-col>
            </v-row>
          </v-btn>
        </v-row>
        <v-row class="mt-4" align="center" justify="center">
          <v-col align="center" justify="center">
            <v-btn
              to="/help"
              class="mt-6"
              :width="btncolor.wdhelp"
              :height="btncolor.heighthelp"
              :class="btncolor.txt"
              rounded
              :color="btncolor.help"
            >
              <v-icon medium> mdi-help-circle-outline </v-icon>

              <span style="text-transform: capitalize" class="mb-2 infotext">
                Benötigen Sie Hilfe?
              </span>
            </v-btn>
          </v-col>
        </v-row>
      </div>
      <!-- THIS IS THE SMALL SCREEN CONTAINER -->
      <div class="smcontainer hidden-sm-and-up">
        <v-row class="mt-4" align="center" justify="center">
          <div class="maintext">
            <h4>Herzlich willkommen im Cranpool Konfigurator!</h4>
          </div>
          <v-btn
            to="/config"
            class="mt-4"
            :width="btncolor.wdsm"
            :height="btncolor.htsm"
            :class="btncolor.txt"
            rounded
            :color="btncolor.config"
          >
            <v-row>
              <v-col>
                <v-row>
                  <span>
                    <span class="icon-center">
                      <v-icon small>mdi-swim</v-icon></span
                    >
                    <v-row class="mt-1">
                      <span
                        style="text-transform: capitalize"
                        class="btntextsm"
                      >
                        Jetzt Ihren Traumpool konfigurieren!
                      </span>
                    </v-row>
                  </span>
                </v-row>
              </v-col>
            </v-row>
          </v-btn>
        </v-row>
        <v-row align="center" justify="center">
          <v-col align="center" justify="center">
            <v-btn
              to="/help"
              class="mt-6"
              :width="btncolor.infowidthsmall"
              :height="btncolor.infosmallheight"
              :class="btncolor.txt"
              rounded
              :color="btncolor.help"
            >
              <v-icon x-small> mdi-help-circle-outline </v-icon>

              <span style="text-transform: capitalize" class="helptextsmall">
                Benötigen Sie Hilfe?
              </span>
            </v-btn>
          </v-col>
        </v-row>
      </div>
    </v-container>
  </v-main>
</template>
<script>
export default {
  data() {
    return {
      btn: {
        min: "4px",
        width: "10px",
      },
      btncolor: {
        txt: "white--text",
        config: "#018FD5",
        help: "#EF7D01",
        he: "15vh",
        wd: "30vw",
        wdsm: "45vw",
        htsm: "9vh",
        wdhelp: "15vw",
        heighthelp: "3vw",
        infosmallheight: "4vw",
        infowidthsmall: "25vw",
      },
    };
  },
};
</script>
<style lang="scss" scoped>
@import url("https://fonts.googleapis.com/css2?family=Lato&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&display=swap");
.btn-content {
  display: grid;
}
.icon-center {
  display: grid;
}
.lgsccontainer {
  width: 65vw;
  height: 60vh;
  position: fixed;
  top: 47%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  border-radius: 1.5%;
  border: 1px solid #707070;
  background-color: rgba(255, 255, 255, 0.8);
  margin-bottom: 4%;
}
.smcontainer {
  width: 60vw;
  height: 40vh;
  position: fixed;
  top: 40%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  border-radius: 1.5%;
  background-color: rgba(255, 255, 255, 0.8);
}
.btntext {
  margin-bottom: 1%;
  font-size: 1.4vw;
  margin-left: 2%;

  font-weight: bold;
}
#body {
  width: 100vw;
  height: 100vh;
  overflow-x: hidden;
  font-family: "Lato", sans-serif;
}
.btntextsm {
  font-weight: bold;
  margin-left: 4vw;
  font-size: 1.7vw;
}
.helptextsmall {
  font-size: 1.3vw;
}

h4 {
  margin-left: 3%;
  color: #ef7d01;
  margin-top: 1%;
  text-align: center;
  font-size: 2.5vw;
  font-weight: 450;
  font-family: "Lato", sans-serif;
}
</style>
