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
                               <input type="text" v-model="data.name" disabled class="form-control" />
                           </div>
                           <div class="form-group">
                               <label>Tienda tienda: </label>
                               <select v-model="data.store_id" @change="changeStore"  class="form-control" >

                                   <option v-for="list in listStore" :value="list.id">{{list.name}}</option>
                               </select>
                           </div>
                           <div class="form-group">
                               <label>Código: </label>
                               <input type="text" v-model="data.mac_address" disabled class="form-control" />
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
                                    <th>Terminal</th>
                                    <th>Código</th>
                                    <th>Nombre de tienda</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr v-for="(list,index) in listTerminals">
                                    <td>{{index+1}}</td>
                                    <td>{{list.name}}</td>
                                    <td>{{list.mac_address}}</td>
                                    <td>{{list.t_store.name}}</td>
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
                  name:"Caja",
                  mac_address:"",
                  store_id:"",
              },
              listTerminals:[],
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
                axios.post('/save-terminal', this.data).then(response=>
                {
                    this.data.name =''
                    this.data.mac_address =''
                    Swal.fire("Excelente", "Se guardó con Éxito")
                    this.lists()
                })
            },
            changeStore(){
                this.codeTerminal(this.data.store_id)
            },
            lists(){
                axios.get('/list-terminals', this.data).then(response=>
                {
                   this.listTerminals = response.data
                })
            },
            listsStore(){
                axios.get('/list-stores', this.data).then(response=>
                {
                   this.listStore = response.data
                })
            },
            codeTerminal(id){
                axios.get('/list-code-terminal/'+id, this.data).then(response=>
                {
                   this.data.mac_address = response.data +1
                })
            }
        }
    }
</script>
