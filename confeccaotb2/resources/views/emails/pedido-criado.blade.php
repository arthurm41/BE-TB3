<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pedido Realizado</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f4f4f4; padding:30px;">

<div style="max-width:600px; margin:auto; background:white; border-radius:10px; padding:30px;">

    <h1 style="color:#2563eb;">
        Pedido Confirmado 🎉
    </h1>

    <p>Olá, {{ $pedido->cliente->nome }}!</p>

    <p>Seu pedido foi registrado com sucesso.</p>

    <hr>

    <p><strong>Produto:</strong> {{ $pedido->produto->nome ?? 'Produto' }}</p>

    <p><strong>Quantidade:</strong> {{ $pedido->quantidade }}</p>

    <p><strong>Total:</strong> R$ {{ number_format($pedido->total, 2, ',', '.') }}</p>

    <hr>

    <p>Obrigado pela preferência.</p>

    <p><strong>Confecção TB2</strong></p>

</div>

</body>
</html> 