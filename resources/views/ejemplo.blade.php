<!doctype html>
<html lang="es" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Friendly Notification</title>
    <style>


        .marca-de-agua {
            background-image:  url("http://localhost:8003/Logo/Logo_Diunsa_2022-03.png");
            width: 500px;
            height: 341px;
            margin: 0 auto;
            display: block;
            position: relative;
        }

        .marca-de-agua img{
            padding:0;
            width:100%;
            height:100%;
            margin:0;
            filter:alpha(opacity=90);
            opacity:.90;
        }

     </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="m-0 border-0" >

<div id="app" >
@if($terminal['store']!= null && $terminal["terminal"] !=null)
<home/>
    @else
        <div class="container">

            <div class="card-body">
                <div class="marca-de-agua" style="width:470px !important; height:auto !important;">
                    <img alt="" src="http://diunsa.friendlystore.net/Logo/Logo_Diunsa_2022-03.png" />

                </div>

                <div class="row ">
                    <div class="col-md-12 text-center">
                        <h2>Sistema de Notificación </h2>
                    </div>
                </div>

                <div class="row text-center">
                   <h1 class="text-danger">Esta ruta no esta AUTORIZADA</h1>
                </div>

            </div>
        </div>
    @endif
</div>

<script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script
    src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"
    integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c="
    crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('app.js')}}">

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
