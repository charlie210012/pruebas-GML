<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de usuarios por pais</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Pais</th>
                <th>cant usuarios</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data->data["reports"] as $report)
            <tr>
                <td>{{ $report[0] }}</td>
                <td>{{ $report[1] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table> 
</body>
</html>