<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<table border="1">
    <tr>
        <th >id</th>
        <th>Nombre</th>
        <th>Paterno </th>
        <th>Materno </th>
        <th>Fecha Nacimiento</th>
        <th>Genero</th>
        <th>Correo</th>
    </tr>

    @foreach($cliente as $item)
        <tr>
            <td>{{$item-> id}}</td>
            <td>{{$item-> nombre}}</td>
            <td>{{$item-> paterno}}</td>
            <td>{{$item-> materno}}</td>
            <td>{{$item-> ci}}</td>
            <td>{{$item-> fecha_nacimiento}}</td>
            <td>{{$item-> genero}}</td>
            <td>{{$item-> correo}}</td>
        </tr>
    @endforeach()
</table>

</body>
</html>
