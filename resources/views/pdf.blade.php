<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
</head>
<body>
    <table class="table table-striped" border="1">
        <caption>CUETIANS: {{count($users)}}</caption>
        <thead>
        <tr>
            <th>Batch</th>
            <th>Department</th>
            <th>Hall</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile1</th>
            <th>Mobile2</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $row)
            <tr>
                <td>{{$row->batch or ''}}</td>
                <td>{{isset($row->department)==true?departmentName($row->department):''}}</td>
                <td>{{isset($row->hall)==true?hallName($row->hall):''}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->mobile1}}</td>
                <td>{{$row->mobile2}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <caption align="center">
        <a href="http:\\cuettabligcommunity.com">
            Copyright @ cuet-tablig-community
        </a>
    </caption>
</body>
</html>