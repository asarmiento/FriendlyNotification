<template>
    <div class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registro de tienda</div>

                    <div class="card-body">
                       <div class="row">
                           <div class="input-group">
                               <label>Nombre de la tienda: </label>
                               <input type="text" v-model="data.name" class="form-control" />
                           </div>
                       </div>

                        <div class="row text-center">
                            <div class="input-group ">
                               <a @click="send" class="btn btn-success">Registrar</a>
                            </div>
                        </div>

                        <div>
                            <table>
                                <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>Nombre de tienda</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
    import axios from "axios"
    import Swal from "sweetalert2"
    export default {
        components:{Swal},
        data(){
          return {
              data:{
                  name:""
              },
              listStores:[]
          }
        },
        mounted() {
            console.log('Component mounted.')
            this.lists()
        },
        methods:{
            send(){
                axios.post('/save-store', this.data).then(response=>
                {
                    Swal.fire("Excelente", "Se guardó con Éxito")
                })
            },
            lists(){
                axios.post('/list-stores', this.data).then(response=>
                {
                   this.listStores = response.data
                })
            }
        }
    }
</script>
