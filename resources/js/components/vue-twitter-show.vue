<template>
<div class="row">
    <div class="col-12">

        <div class='col-md-6 offset-3 center'>
            <div class="card" style="width: 100%;">
                <b-list-group-item class="d-flex align-items-center color-name">
                    <b-avatar variant="primary" text="BV" class="mr-3 center"></b-avatar>
                    <span class="mr-auto">
                        <h4 class="card-title"></h4><b style="font-size: 25px;"></h4>{{twitter_id.user_id.name}}</b></h4>
                    </span>
                    <b-badge style="font-size: 20px;">{{ twitter_id.created_at | moment("from", "now") }}</b-badge>
                </b-list-group-item>
                <div class="card-body">
                    <p class="card-text">{{twitter_id.content}}</p>
                    <!--
                    <a :href="'Twitter/'+data.id" class="btn-sm btn btn-primary">Ver Mas</a>
                    <b-button v-if="data.user_id.id==input_usuario_id" v-b-modal.moda-registro variant="warning" @click="editar_registro(data)" type="button" class="btn-sm btn btn-wangir mr-1" data-toggle="button" aria-pressed="false" style="margin-bottom: 5px; margin: 5px;">Editar</b-button>
                    <b-button v-if="data.user_id.id==input_usuario_id" v-b-modal.moda-eliminar @click="eliminar_registro(data.id)" type="button" class="btn-sm btn btn-danger mr-1" data-toggle="button" aria-pressed="false" style="margin-bottom: 5px; margin: 5px;">Eliminar</b-button>
                    -->
                </div>

            </div>
        </div>

    </div>
</div>
</template>

<script>
import Vue from "vue";
//import VueSingleSelect from "vue-single-select";

//import VueToast from "vue-toast-notification";
//import "vue-toast-notification/dist/index.css";
//import Select2 from "v-select2-component";
//https://www.npmjs.com/package/vue-toastr-2
//import VueToastr2 from "vue-toastr-2";
//import "vue-toastr-2/dist/vue-toastr-2.min.css";
//window.toastr = require("toastr");
//Vue.use(VueToastr2);

export default {
    components: {
        //  VueSingleSelect,
        // VueToastr2,
        //Select2
    },
    props: ["twitter_id"],
    data() {

        return {
            data_id: [],

        };
    },
    mounted() {
        this.show();
    },
    methods: {

        show() {
            axios.get(``).then(response => {

                this.data_id = response.data;
                //      this.input_usuario_id = response.data.usuario_id;

            });
        },

    }
};
</script>

<style scoped>
p.card-text {
    font-size: 30px;
}

.color-name {
    background-color: #eaeaea;
}

.card {
    margin-bottom: 10px
}
</style>
