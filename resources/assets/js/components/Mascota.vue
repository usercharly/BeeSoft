<template>
            <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Escritorio</a></li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Mascotas
                        <button type="button" @click="abrirModal('mascota','registrar')" class="btn btn-secondary">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="criterio">
                                      <option value="nombre">Nombre</option>

                                    </select>
                                    <input type="text" v-model="buscar" @keyup.enter="listarMascota(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarMascota(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Especie</th>
                                    <th>Nombre</th>
                                    <th>Imagen</th>    
                                    <th>telefono</th>
                                    <th>lugar</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="mascota in arrayMascota" :key="mascota.id">
                                    <td>
                                        <button type="button" @click="abrirModal('mascota','actualizar',mascota)" class="btn btn-warning btn-sm">
                                          <i class="icon-pencil"></i>
                                        </button> &nbsp;
                                        <template v-if="mascota.condicion">
                                            <button type="button" class="btn btn-danger btn-sm" @click="desactivarMascota(mascota.id)">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </template>
                                        <template v-else>
                                            <button type="button" class="btn btn-info btn-sm" @click="activarMascota(mascota.id)">
                                                <i class="icon-check"></i>
                                            </button>
                                        </template>
                                    </td>
                                    <td v-text="mascota.nombre_especie"></td>
                                    <td v-text="mascota.nombre"></td>
                                    <td><img v-bind:src="mascota.imagen" class="img-responsive" width="100" height="100"></td>
                                    <td v-text="mascota.telefono"></td>
                                    <td v-text="mascota.lugar"></td>
                                    <td v-text="mascota.descripcion"></td>
                                    <td>
                                        <div v-if="mascota.condicion">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else>
                                            <span class="badge badge-danger">Desactivado</span>
                                        </div>
                                        
                                    </td>
                                </tr>                                
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item" v-if="pagination.current_page > 1">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Ant</a>
                                </li>
                                <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                                </li>
                                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Sig</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!--Inicio del modal agregar/actualizar-->
            <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;height: 100%;overflow-y: auto;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" v-text="tituloModal"></h4>
                            <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Especie</label>
                                    <div class="col-md-9">
                                        <select class="form-control" v-model="idespecie">
                                            <option value="0" disabled>Seleccione</option>
                                            <option v-for="especie in arrayEspecie" :key="especie.id" :value="especie.id" v-text="especie.nombre"></option>
                                        </select>                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="nombre" class="form-control" placeholder="Nombre de la mascota">                                        
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Telefono</label>
                                    <div class="col-md-9">
                                        <input type="number" v-model="telefono" class="form-control" placeholder="Ingrese su numero de contacto">                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Lugar de Desaparición</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="lugar" class="form-control" placeholder="Lugar de desaparición">                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Descripción</label>
                                    <div class="col-md-9">
                                        <input type="email" v-model="descripcion" class="form-control" placeholder="Ingrese descripción">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label">Imagen</label>
                                    
                                    <div class="col-md-12">
                                        <input type="file" v-on:change="onFileChange" class="form-control">
                                    </div>
                                    <div class="col-md-8">
                                        <img :src="imagen" width="300" height="300" >
                                    </div>
                                </div>
                                <div v-show="errorMascota" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjMascota" :key="error" v-text="error">

                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrarMascota()">Guardar</button>
                            <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarMascota()">Actualizar</button>
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
    import VueBarcode from 'vue-barcode';
    export default {
        data (){
            return {
                mascota_id: 0,
                idespecie : 0,
                nombre_Especie : '',
                nombre : '',
                imagen : '',
                telefono : 0,
                lugar : '',
                descripcion : '',
                arrayMascota : [],
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorMascota : 0,
                errorMostrarMsjMascota : [],
                pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
                offset : 3,
                criterio : 'nombre',
                buscar : '',
                arrayEspecie :[]
            }
        },
        components: {
        'barcode': VueBarcode
    },
        computed:{
            isActived: function(){
                return this.pagination.current_page;
            },
            //Calcula los elementos de la paginación
            pagesNumber: function() {
                if(!this.pagination.to) {
                    return [];
                }
                
                var from = this.pagination.current_page - this.offset; 
                if(from < 1) {
                    from = 1;
                }

                var to = from + (this.offset * 2); 
                if(to >= this.pagination.last_page){
                    to = this.pagination.last_page;
                }  

                var pagesArray = [];
                while(from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;             

            }
        },
        methods : {
            listarMascota (page,buscar,criterio){
                let me=this;
                var url= '/mascota?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayMascota = respuesta.mascotas.data;
                    me.pagination= respuesta.pagination;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            cargarPdf(){
                window.open('/mascota/listarPdf','_blank');
            },
            selectEspecie(){
                let me=this;
                var url= '/especie/selectEspecie';
                axios.get(url).then(function (response) { 
                    //console.log(response);
                    var respuesta= response.data;
                    me.arrayEspecie = respuesta.especies;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            cambiarPagina(page,buscar,criterio){
                let me = this;
                //Actualiza la página actual
                me.pagination.current_page = page;
                //Envia la petición para visualizar la data de esa página
                me.listarMascota(page,buscar,criterio);
            },
            onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.imagen = e.target.result;
                };
                reader.readAsDataURL(file); 
            },
            registrarMascota(){
                if (this.validarMascota()){
                    return;
                }
                
                let me = this;

                axios.post('/mascota/registrar',{
                    'idespecie': this.idespecie,
                    'nombre': this.nombre,
                    'telefono': this.telefono,
                    'imagen': this.imagen,
                    'lugar': this.lugar,
                    'descripcion': this.descripcion
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarMascota(1,'','nombre');
                }).catch(function (error) {
                    console.log(error);
                });
            },
            actualizarMascota(){
               if (this.validarMascota()){
                    return;
                }
                
                let me = this;

                axios.put('/mascota/actualizar',{
                    'idespecie': this.idespecie,
                    'nombre': this.nombre,
                    'imagen': this.imagen,
                    'telefono': this.telefono,
                    'lugar': this.lugar,
                    'descripcion': this.descripcion,
                    'id': this.mascota_id
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarMascota(1,'','nombre');
                }).catch(function (error) {
                    console.log(error);
                }); 
            },
            desactivarMascota(id){
               swal({
                title: 'Esta seguro de desactivar este artículo?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar!',
                cancelButtonText: 'Cancelar',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me = this;

                    axios.put('/mascota/desactivar',{
                        'id': id
                    }).then(function (response) {
                        me.listarMascota(1,'','nombre');
                        swal(
                        'Desactivado!',
                        'El registro ha sido desactivado con éxito.',
                        'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });
                    
                    
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    
                }
                }) 
            },
            activarMascota(id){
               swal({
                title: 'Esta seguro de activar este artículo?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar!',
                cancelButtonText: 'Cancelar',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me = this;

                    axios.put('/especie/activar',{
                        'id': id
                    }).then(function (response) {
                        me.listarMascota(1,'','nombre');
                        swal(
                        'Activado!',
                        'El registro ha sido activado con éxito.',
                        'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });
                    
                    
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    
                }
                }) 
            },
            validarMascota(){
                this.errorMascota=0;
                this.errorMostrarMsjMascota =[];

                if (this.idespecie==0) this.errorMostrarMsjMascota.push("Seleccione una Especie.");
                if (!this.nombre) this.errorMostrarMsjMascota.push("El nombre de la mascota es obligatorio.");
                if (!this.telefono) this.errorMostrarMsjMascota.push("El Telefono de la mascota debe ser un número de contacto y es obligatorio.");
                if (this.telefono>99999999) this.errorMostrarMsjMascota.push("Excede el numero de digitos para un telefono.");
                if (this.telefono<999999) this.errorMostrarMsjMascota.push("Falta el numero de digitos para un telefono.");
                if (!this.lugar) this.errorMostrarMsjMascota.push("El Lugar de perdida es obligatorio");

                if (this.errorMostrarMsjMascota.length) this.errorMascota = 1;

                return this.errorMascota;
            },
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
                this.idespecie= 0;
                this.nombre = '';
                this.imagen = '';
                this.telefono = 0;
                this.lugar = '';
                this.stock = 0;
                this.descripcion = '';
		        this.errorMascota=0;
            },
            abrirModal(modelo, accion, data = []){
                switch(modelo){
                    case "mascota":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar Artículo';
                                this.idespecie=0;
                                this.nombre='';
                                this.imagen='';
                                this.telefono= '';
                                this.lugar='';
                                this.descripcion = '';
                                this.tipoAccion = 1;
                                break;
                            }
                            case 'actualizar':
                            {
                                //console.log(data);
                                this.modal=1;
                                this.tituloModal='Actualizar Artículo';
                                this.tipoAccion=2;
                                this.mascota_id=data['id'];
                                this.idespecie=data['idespecie'];
                                this.nombre=data['nombre'];
                                this.imagen = data['imagen'];
                                this.telefono=data['telefono'];
                                this.lugar=data['lugar'];
                                this.descripcion= data['descripcion'];
                                break;
                            }
                        }
                    }
                }
                this.selectEspecie();
            }
        },
        mounted() {
            this.listarMascota(1,this.buscar,this.criterio);
        }
    }
</script>
<style>    
    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
    }
    .div-error{
        display: flex;
        justify-content: center;
    }
    .text-error{
        color: red !important;
        font-weight: bold;
    }
</style>
