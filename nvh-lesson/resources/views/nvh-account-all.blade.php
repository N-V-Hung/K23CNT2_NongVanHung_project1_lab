<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
        <h1>nvh- ds tai khoan</h1>
        <table class="la">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>UserName</th>
                    <th>password</th>
                    <th>FullName</th>
                </tr>

            </thead>
            <tbody>

                @foreach ($model as $item)
                <tr>
                    <td>1</td>
                    <td>{{$item->nvh-id}}</td>
                    <td>{{$item->nvh-name}}</td>
                    <td>{{$item->nvh-password}}</td>
                    <td>{{$item->nvh-fullname}}</td>
                </tr>
            </tbody>
        </table>
    </section>
</body>
</html>