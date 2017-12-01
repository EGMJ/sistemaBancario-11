<!DOCTYPE html>
<html><head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <style>
        .centrar
        {
            position: absolute;
            /*nos posicionamos en el centro del navegador*/
            top:25%;
            left:55%;
            /*determinamos una anchura*/
            width:400px;
            /*indicamos que el margen izquierdo, es la mitad de la anchura*/
            margin-left:-200px;
            /*determinamos una altura*/
            height:300px;
            /*indicamos que el margen superior, es la mitad de la altura*/
            margin-top:-150px;
            border:1px solid #808080;
            padding:5px;
        }
    </style>
</head><body class="centrar">


<table class="table-and">
    <tr >

        <th class="th-and" style="background-color: #0000cc; color: white" ><a class="image featured"><img src="images/icono.jpg" style="width: 10%  "/></a></th>

        <td class="th-and"> <h1 id="cabeza">Comprobante</h1></td>

    </tr>
    </table>

<br>
<div >
    <table class="table-and">
        <tr >

            <th class="th-and" style="background-color: #0000cc; color: white" >Nombre</th>

            <td class="th-and">{{$cliente->nombre}} {{$cliente->paterno}} {{$cliente->materno}}</td>

        </tr>
        <tr >

            <th class="th-and" style="background-color: #0000cc; color: white" >Nro. de Cuenta</th>

            <td class="th-and">{{$request->id_cuenta}}</td>

        </tr>
        <tr >

            <th class="th-and" style="background-color: #0000cc; color: white" >Tipo de Movimiento</th>

            <td class="th-and">{{$request->tipo}}</td>

        </tr>
        <tr >

            <th class="th-and" style="background-color: #0000cc; color: white" >Fecha</th>

            <td class="th-and">{{$request->fecha}}</td>

        </tr>
        <tr style="background: #CCCCCC">

            <th class="th-and" style="background-color: #0000cc; color: white" >Monto</th>

            <td class="th-and">{{$request->monto}} Bs.</td>

        </tr>



    </table>
    <br>
    <br>
    Fecha de Impresion {{\Carbon\Carbon::now()}}
    <br><br>
    <br>
    Este comprobante es de uso Particular.

</div>
</body></html>