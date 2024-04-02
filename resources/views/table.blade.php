<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table border="2">
    <tr><td>Le Titreest :</td><td> {{ $TitreFormation }} </td></tr>
    <tr><td>Le Prix :</td><td> {{ $Prix }} </td></tr>
    <tr><td>La Duree :</td><td> {{ $Durée }} </td></tr>
    <tr><td>Specialite :</td><td> 
        <ul>
            @foreach ($Specialite as $s)
            <li>{{ $s }}</li>
            @endforeach
        </ul>
    </td></tr>
</table>


</body>
</html>