<template>
    <v-app>
        <v-main>
            <v-row md="4">
            <v-card class="my-6 mx-2" width="300" v-for="item in categories" :key="item">
                <v-img width="300" height="150" src="../assets/tile.png"></v-img>
                <v-card-title >{{item.name}}</v-card-title>
                <v-card-text >price is  ${{item.price}}</v-card-text>
            <v-spacer></v-spacer>
            <v-checkbox
          value
        ></v-checkbox>
            </v-card>
            </v-row>
        </v-main>
    </v-app>
</template>
<script>
export default {
    data(){
        return {
            categories :[
                {img: "img/tile.png", name : "blue",price : 200}
                ,{img: "img/tile.png", name : "white",price : 400}
                ,{img: "img/tile.png", name : "red",price : 100}
                ,{img: "img/tile.png", name : "green",price : 500}
            ]
        }
    }
}
</script>
