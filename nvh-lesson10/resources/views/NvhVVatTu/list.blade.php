<div>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sach nha cung cap</title>
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <header>
        <h1>danh sach vat tu</h1>
    </header>
    <section class="container my-1 border p-2">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ma vat tu</th>
                    <th>ten vat tu</th>
                    <th>DV Tinh</th>
                    <th>Phan Tram</th>
                </tr>
            </thead>
            <tbody>
                $forelse($nvhVatTus as $item)
                    <tr>
                        <td>1</td>
                        <td>{{$item->$nvhMaVTU}}</td>
                        <td>{{$item->$nvhTenVTu}}</td>
                        <td>{{$item->$nvhDiaChi}}</td>
                        <td>{{$item->$nvhPhnTram}}</td>
                        <td>
                            view / edit / delete
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">chua co du lieu</td>
                    </tr>
                        
            </tbody>
        </table>
        <button class="btn btn-primary">Them moi</button>
    </section>
</body>
</html>
