<template>
<div>
<v-app-bar app max-height="134px" class="top">
<div class='logo'>
  <v-img max-height="70px" max-width="70px" src='https://i.ibb.co/mJXPTz2/Group-14-2x.jpg' alt="logo"/>
     </div>
     <div class="title">
    <h2>Konfigurieren Sie Ihren Wunschpool</h2>
    <p>Rein in den Traumpool mit Cranpool</p>
     </div>
    </v-app-bar>
    <v-main>
    <!-- <mainsheet /> -->

    </v-main>
</div>
</template>
<script>
import mainsheet from '../components/mainsheet.vue'
export default {
    components:{
        mainsheet
    }

}
</script>
<style lang="scss">
@import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');
body{
   font-family: 'Lato', sans-serif;
}
.top{
    background:transparent;
    background: linear-gradient(to right, #FFFFFF,#34AAE1);
    opacity: 0.8;

}
p{
    color: #9A9A9A;
    font-size: 22px;
    margin: 0;
}
h2{
    margin-top:2%;
    text-align: center;
    font-family: 'Lato', sans-serif;
    font-weight: bold;
    letter-spacing: 0;
}
.title{
    font-size: 32vw !important;
    margin-left: 2%;
    color : #EF7D01;
//     font-weight: bold  !important;
//    font-family: Lato, sans-serif !important;
//    letter-spacing: 0;
}
.logo{
    border-radius: 10;
    }
</style>

