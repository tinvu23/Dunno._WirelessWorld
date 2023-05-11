<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, td, th{
            border: 1px solid;
            text-align: center;
        }
        td, th{
            padding: 1rem;
        }
        .container {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <b> Hi {{ $name}},</b>
    <p> We are delighted that you have found something you like!</p>
    <p> As soon as your package is on its way, you will receive a delivery confirmation form us by email.</p>
    <div class="container">
        <b> Delivery information: </b>
        <p> {{ $address}} - {{$phone}}</p>
    </div>
    <div>
        <table>
            <tr>
                <th>Detail</th>
                <th>Price</th>
            </tr>
            <tr>
                <td>{{$detail}}</td>
                <td>$ {{ $price}}</td>
            </tr>
        </table>
    </div>
</body>
</html>