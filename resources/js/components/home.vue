<template>
    <div class="container">

                    <div class="card-body">
                        <div class="marca-de-agua" style="width:870px !important; height:auto !important;">
                            <img alt="" src="http://127.0.0.1:8000/Logo/Logo_Diunsa_2022-03.png" /></div>

                        <div class="row">
                            <div class="col-6 text-center mt-5 p-4">
                                <a href="" class="btn btn-outline-primary btn-lg ">Cambio de 500</a>
                            </div>
                            <div class="col-6 text-center mt-5 p-4">
                                <a href="" class="btn btn-outline-primary btn-lg">Codigo</a>
                            </div>
                        </div>
                    </div>
    </div>
</template>

<script>

    export default {
        mounted() {
            showMacAddress()
        },
        methods:{
             showMacAddress() {
                 if($length == NULL){ $length = 30; }
                 $characters =
                     '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                 $charactersLength = strlen($characters);
                 $randomString = '';
                 for ($i = 0; $i < $length; $i++) {
                     $randomString += $characters[rand(0, $charactersLength - 1)];
                 }
                 return $randomString;
    }
        }
    }
</script>
