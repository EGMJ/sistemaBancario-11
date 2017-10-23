<!DOCTYPE html>
<html>
<head>
    <h1>Historial de Cuentas</h1>
</head>
<body>
<table border="1">
    <tr>
        <th >id</th>
        <th>fecha</th>
        <th>idcaja</th>
        <th>detalle</th>
    </tr>

    @foreach($detalles as $item)
    <tr>
        <td>{{$item-> fecha}}</td>
        <td>{{$item-> id_caja}}</td>
        <td>{{$item-> monto}}</td>
        <td>{{$item-> detalle}}</td>
    </tr>
    @endforeach()
</table>

</body>
</html>