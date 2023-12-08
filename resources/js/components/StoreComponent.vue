<template>
    <div class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registro de tienda</div>

                    <div class="card-body">
                       <div class="row">
                           <div class="form-group">
                               <label>Nombre de la tienda: </label>
                               <input type="text" v-model="data.name" class="form-control" />
                           </div>
                       </div>

                        <div class="row mt-3">
                            <div class="col-md-12 text-center">
                               <a @click="send" class="btn btn-success">Registrar</a>
                            </div>
                        </div>

                        <div>
                            <table class="table table-bordered mt-3">
                                <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>Nombre de tienda</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(list,index) in listStores">
                                    <td>{{index+1}}</td>
                                    <td>{{list.name}}</td>
                                </tr>
                                </tbody>
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
                    this.lists()
                })
            },
            lists(){
                axios.get('/list-stores', this.data).then(response=>
                {
                   this.listStores = response.data
                })
            }
        }
    }
</script>
