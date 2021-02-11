<template>
  <v-app class="container">
    <div class="config-container">
      <v-row class="mt-12" align="center" justify="center">
        <v-sheet class="sheet-container">
          <v-container class="sheet-items">
            <v-row class="mt-8" align="center" justify="center">
              <h4 class="title">
                Herzlich willkommen im Cranpool Konfigurator!
              </h4>

              <v-btn text class="config-button">
                <v-icon class="iconstyle"> mdi-swim </v-icon>
                <br />
                Jetzt Ihren Traumpool konfigurieren!
              </v-btn>
            </v-row>
            <div class="text-md-center">
              <v-btn
                :width="help_button.width"
                :color="help_button.primarycolor"
                class="white--text"
                rounded
              >
                <v-icon>mdi-help-circle-outline </v-icon>
                Benötigen Sie Hilfe?
              </v-btn>
            </div>
          </v-container>
        </v-sheet>
      </v-row>
    </div>
  </v-app>
</template>
<script>
export default {
  data() {
    return {
      help_button: {
        primarycolor: "#EF7D01",
        width: "80px",
      },
    };
  },
};
</script>
<style lang="scss">
.container {
  overflow: hidden;
  justify-content: center;
  flex-direction: column;
  align-content: center;
}
.config-container {
  opacity: 0.9;
  justify-content: center;
  align-items: center;
  align-self: center;
  flex-direction: column;
}
.sheet-container {
  margin-top: 10% !important;
  min-height: 50vh;
  min-width: 110vh;
  max-height: 50vh;
  max-width: 120vh;
  position: fixed;
  border-radius: 2% !important;
  align-items: center;
  align-content: center;
  justify-content: center;
  font-size: 36px !important;
}
#app {
  background: url("../src/back.jpg") no-repeat center center fixed;
  background-size: cover;
}
.sheet-items {
  align-content: center;
  justify-content: center;
  flex-direction: column;
  opacity: 1 !important;
  font-size: 36px !important;
}
.config-button {
  background-color: #018fd5;
  color: #ffffff !important;
  opacity: 1 !important;
  font-weight: bold !important;
  padding-top: 10;
  border-radius: 10% !important;
  min-height: 15vh;
  max-height: 30vh;
  min-width: 50vh;
  max-width: 90vh;
}
h4 {
  margin-top: 2%;
  text-align: center;
  font-family: "Lato", sans-serif;
  font-weight: bold !important;
  letter-spacing: 0;
  font-size: 36px !important;
}
.title {
  font-size: 36px !important;
  margin-left: 2%;
  color: #ef7d01;
  //     font-weight: bold  !important;
  //    font-family: Lato, sans-serif !important;
  //    letter-spacing: 0;
}
.iconstyle {
  align-content: center;
  align-self: center;
  justify-content: center;
  justify-items: center;
}
.help_button {
  background-color: orange !important;
}
</style>
