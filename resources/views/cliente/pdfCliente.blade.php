<!DOCTYPE html>
<html><head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    {!!Html::style('css/myStyle.css')!!}
</head><body>
<a class="image featured"><img src="images/cavezera1.png" style="width: 100%  "/></a>

<h1 id="cabeza">Lista de Clientes</h1>


<br>
<div>
    <table class="table-and">
        <tr style="background: #CCCCCC">
            @if ($nombre==1)
            <th class="th-and">Nombre</th>
            @endif
            @if ($paterno==1)
            <th class="th-and">Paterno</th>
                @endif
             @if ($materno==1)
            <th class="th-and">Materno</th>
                @endif
             @if ($ci==1)
            <th class="th-and">Ci</th>
                @endif
             @if ($fecha_nacimiento==1)
            <th class="th-and">Fecha Nac</th>
                @endif
             @if ($genero==1)
            <th class="th-and">Genero</th>
                @endif
             @if ($telefono==1)
            <th class="th-and">Telefono</th>
                @endif
             @if ($correo==1)
            <th class="th-and">Correo</th>
                @endif
             @if ($banco==1)
            <th class="th-and">Banco</th>
                @endif

        </tr>
        @foreach($clientes as $item)
            <tr>
                @if ($nombre==1)
                <td class="td-and" style="padding-left: 10px">{{$item->nombre}}</td>
                @endif
                @if ($paterno==1)
                <td class="td-and" style="padding-left: 10px">{{$item->paterno}}</td>
                    @endif
                    @if ($materno==1)
                <td class="td-and" style="padding-left: 10px">{{$item->materno}}</td>
                    @endif
                    @if ($ci==1)
                <td class="td-and" style="padding-left: 10px">{{$item->ci}}</td>
                    @endif
                    @if ($fecha_nacimiento==1)
                <td class="td-and" style="padding-left: 10px">{{$item->fecha_nacimiento}}</td>
                    @endif
                    @if ($genero==1)
                <td class="td-and" style="padding-left: 10px">{{$item->genero}}</td>
                    @endif
                    @if ($telefono==1)
                <td class="td-and" style="padding-left: 10px">{{$item->correo}}</td>
                    @endif
                    @if ($correo==1)
                <td class="td-and" style="padding-left: 10px">{{$item->telefono}}</td>
                    @endif
                    @if ($banco==1)
                <td class="td-and" style="padding-left: 10px">{{$item->razon_social}}.</td>
            @endif
        @endforeach
                    <br>
                    <br>
            Fecha de Impresion {{\Carbon\Carbon::now()}}
    </table>
</div>
</body></html>