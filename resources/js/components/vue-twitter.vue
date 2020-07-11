<template>
<div class="row">
    <div v-if="formulario_Twitter" class="col-lg-12 ">
        <div class="main-card mb-3 card formulario">
            <div class="card-body"><h1 class="card-title"></h1>
                  <h2>Formulario </h2>
                    <div class="col-md-12 row">
                      <div class="form-group col-md-12 col-sm-12" style="margin-bottom: 6px;">
                        <button type="submit"  @click="formulario()" class="btn btn-primary">Guardar </button>
                        <a class="btn btn-warning" @click="cancelar_registro()" >Cancelar</a>
                      </div>
                    </div>
                    <div class="col-lg-12">

      <form ref="form"   v-on:submit.prevent="formulario()">
        <div class="row">
          <div class="col-md-12 row">
            <input type="hidden" v-model="input_Twitter_id">

            <div class="form-group col-md-12 col-sm-12">
                <label for="exampleInputEmail1"><b>content</b></label>
                <textarea type="text" v-model="input_content" placeholder="content" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" ></textarea>
                <b-alert show v-for="data in validacion.content" v-bind:key="data.content" variant="danger">
                {{data}}
              </b-alert>
              <!--
                <b-alert show  v-if="validacion.content" variant="danger" >{{validacion.content[0]}}</b-alert>
                -->
            </div>
            <div class="form-group col-md-12 col-sm-12 text-center">
              <button type="submit" class="btn btn-primary">Publicar</button>
            </div>
          </div>
        </div>
      </form>
      </div>
      </div>
  </div>
</div>


  <div v-else class='col-lg-12'>



    <div class='main-card mb-3 card'>
    <div class='card-body'><h1 class=''>Lista de Twitter </h1>

    <nav>
      <pagination :data='consulta_datos' @pagination-change-page='consulta'></pagination>
    </nav>

    <div class='col-12'>

      <b-button v-if="$can('Twitter Anadir')"  @click='anadir_registro()' type='button' class='btn btn-wangir btn-lg' data-toggle='button' size='sm' aria-pressed='false' variant='success' style='margin-bottom: 5px; margin: 5px;'>Añadir registro
      </b-button>
 
      <div class='flexbox  float-right' >
        <form ref='form'    v-on:submit.prevent='consulta()'>
          <b-input-group size='sm' class='float-right  margin-bottom-0' prepend=''  style='margin-bottom: 0px;'>
            <b-form-input type='text' v-model='input_consulta_data' ></b-form-input>
            <b-input-group-append>
              <b-button @click='consulta()' size='sm' text='Button' variant='success'>Buscar</b-button>
            </b-input-group-append>
          </b-input-group>
        </form>
      </div><br><br>
    </div>
    <div class="col-4 offset-4 center">

    <div class="card" style="width: 100%;" v-for="data in consulta_datos.data">
        <div class="card-body">
            <p>{{data.created_at}}</p>
            <h5 class="card-title">{{data.user_id.name}}</h5>
            <p class="card-text">{{data.content}}</p>
            <a :href="'Twitter/'+data.id" class="btn btn-primary">Ver Mas</a>
            <b-button v-if="data.user_id.id==input_usuario_id"   v-b-modal.moda-registro size="sm" variant="warning" @click="editar_registro(data)" type="button" class="btn-sm btn btn-wangir mr-1" data-toggle="button" aria-pressed="false" style="margin-bottom: 5px; margin: 5px;">Editar</b-button>
            <b-button v-if="data.user_id.id==input_usuario_id" v-b-modal.moda-eliminar @click="eliminar_registro(data.id)" type="button" class="btn-sm btn btn-danger mr-1" size="sm" data-toggle="button" aria-pressed="false" style="margin-bottom: 5px; margin: 5px;">Eliminar</b-button>

        </div>

    </div>
    </div> 


</div>
</div>

</div>




<b-modal id="moda-eliminar" ref="my-modal" size="xl" hide-footer >
  <template slot="modal-title">Eliminar un Registro </template>
  <div class="d-block text-center">
    <h3>¿Desea eliminar el registro permanente?</h3>
    <b-button class="mt-3 btn btn-danger " @click="eliminar_registro_delete()">Eliminar</b-button>
  </div>
</b-modal>


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
  data() {

    return {
      formulario_Twitter:false,
      input_usuario_id:'',
      validacion: [],
      editar_dato: false,
      show_dato: 0,
      data: [],
      datas: [],
      input_consulta_data:"",
      stickyHeader: true,
      noCollapse: false,
      


      input_Twitter_id:[],

      input_id:[],
      input_content:[],
      input_user_id:[],
      input_created_at:[],
      input_updated_at:[],

      consulta_datos:[],
      errors: {},
      mensaje_formulario: "",
        page:1,
        show_twitter:[],
    };
  },
  mounted() {
    this.consulta();
    this.data_foraneo();
  },
  methods: {

    consulta(page = 1){
      if (localStorage.getItem("Twitter")) {
        try { this.items = JSON.parse(localStorage.getItem("Twitter"));
        } catch (e) { localStorage.removeItem("Twitter");}
      }

      this.page=page;
      //axios.get("Twitter/consulta?page=" +page+"&consulta_data="+this.input_consulta_data)
      axios.get(`Twitter/consulta?page=${page}&consulta_data=${this.input_consulta_data}`)
      .then(response => {
        this.consulta_datos = response.data;
        const parsed = JSON.stringify(response.data);
        localStorage.setItem("Twitter", parsed);
      });
    },
    data_foraneo(){
      axios.get(`Twitter/create`).then(response => {
        this.productos_all = response.data;
        this.input_usuario_id = response.data.usuario_id;
        

      });
    },
   
    eliminar_registro(data_id){
    this.input_Twitter_id=data_id;
    },
    eliminar_registro_delete(){
      var data_id=this.input_Twitter_id;
      axios.delete(`Twitter/${this.input_Twitter_id}`).then(response => {
        const data = response.data;
        if(response.data.id){
          this.validacion="";
          //this.$toastr.info("Operacio exitosa", "Datos Eliminados");
          this.$refs['my-modal'].hide()
          this.consulta(this.page);
        }
      });

    },
    anadir_registro(){
      this.validacion="";
      this.formulario_Twitter=true;
      this.editar_dato = false;
      this.limpiar_form();
      this.mensaje_formulario="Añadir un nuevo registro"
    },
    formulario(){

      const data = {
        id: this.input_Twitter_id,
        id :this.input_id,
        content :this.input_content,
        user_id :this.input_user_id,
        created_at :this.input_created_at,
        updated_at :this.input_updated_at,

        //name: this.input_name,
        //email: this.input_email
      };

      if(this.editar_dato == true){
        axios.put(`Twitter/${this.input_Twitter_id}`, data)
        .then(response => {

            const datos = response.data;
            if(response.data.errors){
              //this.$toastr.warning("Verifique los datos", "Verifique los datos");
              this.validacion=response.data.errors;
            }
            if(response.data.id){
              this.validacion="";
              //this.$toastr.success("Operacio exitosa", "Datos modificados");
              this.consulta(this.page);
              this.formulario_Twitter=false;


            }
        },
        (err) => {
          console.log("Err", err);
            //this.$toastr.warning(err, "Error en el servidor");
            //this.$toastr.warning(err.message, "Error en el servidor");
        });

      }else{

        axios.post(`Twitter`, data).then(response => {
            const datos = response.data;
            if(response.data.errors){
              //this.$toastr.warning("Verifique los datos", "Verifique los datos");
              this.validacion=response.data.errors;
            }
            if(response.data.id){
              this.validacion="";
              //this.$toastr.success("Operacio exitosa", "Datos modificados");
              this.consulta(this.page);
              this.formulario_Twitter=false;
              this.limpiar_form();


            }
        },
        (err) => {
          console.log("Err", err);
            //this.$toastr.warning(err, "Error en el servidor");
            //this.$toastr.warning(err.message, "Error en el servidor");
        }

        );

      }

    },
    cancelar_registro(){
      this.formulario_Twitter=false;
    },
    $can(permissionName) {
      return true;
      //return Permissions.indexOf(permissionName) !== -1;
    },
    editar_registro(data){//show
    //alert(data);
      this.validacion="";
      this.formulario_Twitter=true;
      this.mensaje_formulario="Editar un registro"
      this.input_id = data.id;
              this.input_content = data.content;
              this.input_user_id = data.user_id;
              this.input_created_at = data.created_at;
              this.input_updated_at = data.updated_at;


      axios.get(`Twitter/${data.id}/edit`).then(response => {
            const data = response.data;
            if(!response.data){
              //this.$toastr.warning("Operacio no exitosa", "Regitro no obtenido");
            }else{
              //this.$toastr.success("Operacio exitosa", "Regitro obtenido");
              this.editar_dato = true;
              this.input_Twitter_id = data.id
              this.input_id = data.id;
              this.input_content = data.content;
              this.input_user_id = data.user_id;
              this.input_created_at = data.created_at;
              this.input_updated_at = data.updated_at;

              //this.input_user_id = data.id;
              //this.input_name = data.name;
            }
        });
    },
    limpiar_form(){
      this.input_id = '';
      this.input_content = '';
      this.input_user_id = '';
      this.input_created_at = '';
      this.input_updated_at = '';

      this.validacion="";

    },

  }
};


</script>
