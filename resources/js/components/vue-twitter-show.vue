<template>
<div class="row">
    <div class="col-4">

<div  class='col-lg-12 offset-4 center'>
    <div class="card" style="width: 100%;" >
        <div v-if="twitter_id" class="card-body">
            <p>{{twitter_id.created_at}}</p>
            <h5 class="card-title">{{twitter_id.user_id.name}}</h5>
            <p class="card-text">{{twitter_id.content}}</p>
        </div>
    </div>
</div>

</div>
</div>
</template>




<script type="application/javascript">
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
  props:["twitter_id"],
  data() {
    
    return {
      data_id: [],
      

    };
  },
  mounted() {
    this.show();
  },
  methods: {

    show(){
      axios.get(``).then(response => {

        this.data_id = response.data;
  //      this.input_usuario_id = response.data.usuario_id;
        

      });
    },


  }
};


</script>
