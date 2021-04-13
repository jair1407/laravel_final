<template>
        <!-- Main content -->
      <!-- Default box -->
      <main class="main">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Profesionales</h3>
          <button @click="abrirModal('profesionales','registrar')" type="button" class="btn btn-secondary">
              <i class="icon-plus"></i>&nbsp;Nuevo
          </button>
        
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="display" style="width:100%" id="tabla">
              <thead>
                  <tr>
                      <th style="width: 5%">
                          #
                      </th>
                      <th style="width: 15%">
                          Numero Doc
                      </th>
                      <th style="width: 15%">
                          Nombre
                      </th>
                      <th style="width: 15%">
                          Apellidos
                      </th>
                      <th style="width: 20%">
                          Habilidades
                      </th>
                      <th style="width: 20%">
                          Salario
                      </th>
                      <th style="width: 15%">
                          Disponible
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr v-for=" profesionales in arrayProfesional" :key=" profesionales.id">
                      <td >
                          <a v-text="profesionales.id">

                          </a>
                      </td>
                      <td>
                          <a v-text="profesionales.nroDocumento">
                          </a>
                          <br/>
                          <small v-text="profesionales.created_at">
                            Ingreso
                          </small>
                      </td>
                      <td v-text="profesionales.nombre">
                         
                      </td>
                      <td v-text="profesionales.Apellidos">
                         
                      </td>
                      <td v-text="profesionales.Habilidades">
                         
                      </td>
                      <td v-text="profesionales.salario">
                         
                      </td>
                      <td class="project-state">
                          <div v-if="profesionales.disponible==1">
                              <span class="badge badge-success">Activar</span>
                          </div>
                          <div v-if="profesionales.disponible==0">
                              <span class="badge badge-danger">Desactivar</span>
                          </div>
                      </td>
                      <td class="project-actions text-right">
                          <!--<a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              Ver
                          </a>
                          -->
                          <a class="btn btn-info btn-sm" href="#" @click="abrirModal('profesionales','actualizar',profesionales)" >
                              <i class="fas fa-pencil-alt">
                              </i>
                              Editar
                          </a>
                          <template v-if="profesionales.disponible">
                            <a class="btn btn-danger btn-sm" href="#" @click="desactivarProfesional(profesionales.id)">
                                <i class="fas fa-trash">
                                </i>
                                Desactivar
                            </a>
                            </template>
                            <template v-else>
                            <a class="btn btn-info btn-sm" href="#" @click="activarProfesional(profesionales.id)" >
                                <i class="fas fa-check">
                                </i>
                                Activar
                            </a>
                            </template>
                      </td>
                  </tr>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->


      </div>
      <!-- /.card -->


        <!--Inicio del modal agregar/actualizar-->
        <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" :class="{'mostrar':modal}" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title" v-text="tituloModal" ></h4>
                        <button @click="cerrarModal()" type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                               <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Numero Documento</label>
                                <div class="col-md-9">
                                    <input v-model="nroDocumento" type="text" class="form-control" placeholder="Numero de documento">
                                </div>
                            </div>
                               <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                                <div class="col-md-9">
                                    <input v-model="nombre" type="text" class="form-control" placeholder="Nombre del Profesional">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Apellidos</label>
                                <div class="col-md-9">
                                    <input v-model="apellidos" type="text" class="form-control" placeholder="Apellidos del Profesional">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="email-input">Habilidades</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="habilidades" class="form-control" placeholder="Habilidades Profesional">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="email-input">Salario</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="salario" class="form-control" placeholder="Salario Profesional">
                                </div>
                            </div>
                            <div v-show="errorProfesional" class="form-group row div-error">
                                <div class="text-center text-error">
                                    <div v-for="error in errorMostrarMsjProfesional" :key="error" v-text="error">


                                    </div>
                                </div>
                            
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button @click="cerrarModal()" type="button" class="btn btn-secondary">Cerrar</button>
                        <button  @click="registrarProfesional()" v-if="tipoAccion==1" type="button" class="btn btn-primary" >Guardar</button>
                        <button @click="actualizarProfesional()" v-if="tipoAccion==2" type="button" class="btn btn-primary" >Actualizar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->

        </div>
        <!--Fin del modal-->
      </main>

      
</template>

<script>

    export default {
        data(){
            return{
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                profesional_id :0,
                nroDocumento : '',
                nombre : '',
                apellidos : '',
                habilidades : '',
                salario : '',
                arrayProfesional : [],
                errorProfesional : 0,//Determinar si hay errorres
                errorMostrarMsjProfesional :[]
            }
        },
        methods : {//Declarar todas las funciones
            listarProfesional(){
                let me = this;
                
              axios.get('/profesionales')
                .then(response=> {
                    me.arrayProfesional=response.data;
                    this.tabla();
                    console.log(me.arrayProfesional);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
            },
            tabla (){
                this.$nextTick(()=>{
                 $('#tabla').DataTable();
                })
            },
            abrirModal(modelo,accion,data = []){
                switch(modelo){
                    case "profesionales":{
                     switch(accion){
                           case "registrar":{
                               this.modal=1;
                               this.tituloModal = 'Registrar Profesional';
                               this.nroDocumento = '';
                               this.nombre = '';
                               this.apellidos = '';
                               this.habilidades = '';
                               this.salario = '';
                               this.tipoAccion =  1;
                               this.errorProducto =0;
                               break;
                           }
                            case "actualizar":{
                               this.modal=1;
                               this.tituloModal = 'Actualizar Profesional';
                               this.profesional_id = data['id'];
                               this.nroDocumento = data['nroDocumento'];
                               this.nombre = data['nombre'];
                               this.apellidos = data['apellidos'];
                               this.habilidades = data['habilidades'];
                               this.salario = data['salario'];
                               this.tipoAccion =  2;
                               this.errorProducto =0;
                               break;
                           }
                       }
                       break;
                    }
                }
            },
            cerrarModal(){
                this.modal = 0;
                this.tituloModal ='';
                this.nroDocumento ='';
                this.nombre ='';
                this.apellidos ='';
                this.habilidades ='';
                this.salario ='';


            },
            registarProfesional(){
                if(this.validarProfesional()){
                    return;
                }
                let me =this;
                axios.post('/profesionales/registrar', {
                'nroDocumento' : this.nroDocumento,
                'nombre' : this.nombre,
                'apellidos' : this.apellidos,
                'habilidades' : this.habilidades,
                'salario' : this.salario
                
                })
                .then(function (response) {
                    
                    me.cerrarModal();
                    me.listarProfesional();
                    console.log(response);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });


            },
            actualizarProfesional(){
                if(this.validarProfesional()){
                    return;
                }
                let me =this;
                axios.put('/profesionales/actualizar', {
                'id' : this.profesional_id,
                'nroDocumento' : this.nroDocumento,
                'nombre' : this.nombre,
                'apellidos' : this.apellidos,
                'habilidades' : this.habilidades,
                'salario' : this.salario
                })
                .then(function (response) {
                    
                    me.cerrarModal();
                    me.listarProfesional();
                    console.log(response);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });


            },
            validarProfesional(){
                this.errorProfesional = 0;
                this.errorMostrarMsjProfesional = [];

                if(!this.nombre) this.errorMostrarMsjProfesional.push("El nombre no puede estar vacio");
                if(!this.apellidos) this.errorMostrarMsjProfesional.push("Los apellidos no pueden estar vacios");

                if(this.errorMostrarMsjProfesional.length) this.errorProfesional =1;
                return this.errorProfesional;

            },
            desactivarProfesional(id){
                                    Swal.fire({
                    title: 'Esta seguro que desea desactivar el profesional?',
                    //text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Confirmar'
                    }).then((result) => {
                    if (result.isConfirmed) {
                          let me =this;
                         axios.put('/profesionales/desactivar', {
                        'id' : id
                        })
                        .then(function (response) {
                            me.listarProfesional();
                             Swal.fire(
                            'Desactivada!',
                            'El registro se ha desactivado',
                            'success'
                            );
                            
                        })
                        .catch(function (error) {
                            // handle error
                            console.log(error);
                        })
                        .then(function () {
                            // always executed
                        });
                        
                    }
                    })
                  
               

            },
             activarProfesional(id){
                     Swal.fire({
                    title: 'Esta seguro que desea activar el producto?',
                    //text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Confirmar'
                    }).then((result) => {
                    if (result.isConfirmed) {
                          let me =this;
                         axios.put('/profesionales/activar', {
                        'id' : id
                        })
                        .then(function (response) {
                            me.listarProfesional();
                             Swal.fire(
                            'Activada!',
                            'El registro se ha activado',
                            'success'
                            );
                            
                        })
                        .catch(function (error) {
                            // handle error
                            console.log(error);
                        })
                        .then(function () {
                            // always executed
                        });
                        
                    }
                    })
                  
               

            }
            

        },
        mounted() {
            this.listarProfesional();
        },
    }
</script>
<style >
.modal_content{
    width:100%  !important;
    margin-top: 99px;
    position: absolute  !important;
}
.mostrar{
    display : list-item  !important;
    opacity: 1 !important ;
    position: absolute  !important;
    background-color: blue  !important;
}
.div-error{
  display: flex;/*distribuir div a la pantalla principal*/ 
  justify-content: center;/*distribuir div a la pantalla principal*/ 
}
.text-error{
    color:red  !important;
    font-weight: bold;


}
</style>