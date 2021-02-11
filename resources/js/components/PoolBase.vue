<template>
<div>
<v-container >
    <v-card>
        <v-card-actions>

            <v-btn text
            @click="show = !show">
            LEGEN SIE IHR BUDGET FEST
 <v-icon>{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
            </v-btn>
        </v-card-actions>
    </v-card>
</v-container>
<v-container>
    <v-card>
        <v-card-actions>

            <v-btn text
            @click="show = !show">
            LEGEN SIE IHR BUDGET FEST
 <v-icon>{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
            </v-btn>
        </v-card-actions>
    </v-card>
</v-container>
</div>
</template>

<script>
export default {
    data(){
        return{
            show: false
        }
    }

}
</script>
<style scoped>

</style>

