<template>
    <v-container fluid>
        <v-row
            align="center"
            justify="center"
        >
            <v-col cols="10">
                <v-card>
                    <v-card-text>
                        <v-row>
                            <v-col
                                cols="12"
                                md="6"
                            >
                                <span>Scheme</span>
                                <v-switch
                                    v-model="$vuetify.theme.dark"
                                    primary
                                    label="Dark"
                                />
                            </v-col>
                            <v-col
                                cols="12"
                                md="6"
                            >
                                <span>Footer</span>
                                <!--<v-switch
                                    v-model="footer.inset"
                                    label="Inset"
                                    primary
                                />-->
                            </v-col>
                        </v-row>
                    </v-card-text>
                    <v-card-actions>
                        <v-spacer />
                        <v-btn text>Cancel</v-btn>
                        <v-btn
                            text
                            color="primary"
                        >Submit</v-btn>
                    </v-card-actions>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
