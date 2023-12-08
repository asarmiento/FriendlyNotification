<template>
    <div class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registro de Terminal</div>

                    <div class="card-body">
                       <div class="row">
                           <div class="form-group">
                               <label>Nombre Terminal: </label>
                               <input type="text" v-model="data.name" class="form-control" />
                           </div>
                           <div class="form-group">
                               <label>ID Telegram: </label>
                               <input type="text" v-model="data.id_telegram" class="form-control" />
                           </div>
                           <div class="form-group">
                               <label>Tienda tienda: </label>
                               <select v-model="data.store_id" class="form-control" >

                                   <option v-for="list in listStore" :value="list.id">{{list.name}}</option>
                               </select>
                           </div>
                       </div>

                        <div class="row mt-3 ">
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
                                    <th>Supervisor</th>
                                    <th>ID Telegram</th>
                                    <th>Nombre de tienda</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr v-for="(list,index) in listEmployees">
                                    <td>{{index+1}}</td>
                                    <td>{{list.name}}</td>
                                    <td>{{list.id_telegram}}</td>
                                    <td>{{list.store_id}}</td>
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
                  name:"",
                  id_telegram:"",
                  type:"Supervisor",
                  store_id:"",
              },
              listEmployees:[],
              listStore:[],
          }
        },
        mounted() {
            console.log('Component mounted.')
            this.lists()
            this.listsStore()
        },
        methods:{
            send(){
                axios.post('/save-employee', this.data).then(response=>
                {
                    Swal.fire("Excelente", "Se guardó con Éxito")
                    this.lists()
                })
            },
            lists(){
                axios.post('/list-employees', this.data).then(response=>
                {
                   this.listEmployees = response.data
                })
            },
            listsStore(){
                axios.post('/list-employees', this.data).then(response=>
                {
                   this.listStore = response.data
                })
            }
        }
    }
</script>
