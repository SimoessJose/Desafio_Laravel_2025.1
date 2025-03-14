<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Compras</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        img { max-width: 50px; height: auto; border-radius: 5px; }
    </style>
</head>
<body>

    <h2>Relatório de Compras</h2>

    <table>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Preço</th>
                <th>Categoria</th>
                <th>Vendedor</th>
                <th>Comprador</th>
                <th>Data da Compra</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($sales as $transaction)
                <tr>
                    <td>{{ $transaction->product->name }}</td>
                    <td>R$ {{ number_format($transaction->product->price, 2, ',', '.') }}</td>
                    <td>{{ $transaction->product->category }}</td>
                    <td>{{ $transaction->product->creator->name ?? 'Sistema' }}</td>
                    <td>{{ $transaction->buyer->name ?? 'Sistema'}}</td>
                    <td>{{ \Carbon\Carbon::parse($transaction->date)->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>