<template>
    <div class="container">

                    <div class="card-body">
                        <div class="marca-de-agua" style="width:470px !important; height:auto !important;">
                            <img alt="" src="http://diunsa.friendlystore.net/Logo/Logo_Diunsa_2022-03.png" />

                        </div>

                        <div class="row ">
                           <div class="col-md-12 text-center">
                               <h2>Sistema de Notificación {{code}}</h2>
                           </div>
                        </div>

                        <div class="row">
                            <div class="col-6 text-center mt-5 p-4">
                                <a href="#" @click="sendMessage(timed)" class="btn btn-danger btn-lg " style="width: 50%; height: 100%; padding: 50px 0 50px 0; font-size: 32px">Cambio de 500</a>
                            </div>
                            <div class="col-6 text-center mt-5 p-4">
                                <a href="#" @click="sendMessage(timeW)" class="btn btn-danger btn-lg" style="width: 50%; height: 100%; padding: 50px 0 50px 0;  font-size: 32px">Llamar a Supervisor</a>
                            </div>
                        </div>

                    </div>
    </div>
</template>

<script>
import Swal from "sweetalert2"
    export default {
    components:{Swal},
        data(){
            return {
                data:{
                    code:'',
                    type:''
                },

                timed:1,
                timeW:2
            }
        },
        created() {
         this.sendParams()

        },
        methods:{
            sendMessage(timed){
this.data.code =this.routeSend()
this.data.type =timed
               // var  ddata = {"code":this.routeSend(),"type":timed }

                axios.post('send-message-employee',this.data).then(response=>{
                    Swal.fire("Excelente", " Su mensaje fue enviado con éxtio","success")
                })

            },
            sendParams(){
                axios.get("/send-params").then(response=>{
                    this.code = response.data
                })
            },
            routeSend(){
                console.log(window.location.pathname)
                let urlD = window.location.pathname
this.data.code = urlD
              return urlD
            }
        }
    }
</script>
