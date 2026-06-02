<?php

namespace App\Filament\Resources\Pedidos\Pages;

use App\Filament\Resources\Pedidos\PedidoResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Mail;
use App\Mail\PedidoCriado;

class CreatePedido extends CreateRecord
{
    protected static string $resource = PedidoResource::class;

    protected function afterCreate(): void
    {
        $pedido = $this->record;

        $preco = (float) ($pedido->produto?->preco ?? 0);
        $quantidade = (float) ($pedido->quantidade ?? 0);
        $total = $quantidade * $preco;

        $pedido->update([
            'total' => $total,
        ]);

        $pedido->refresh();

        if ($pedido->cliente?->email) {
            Mail::to($pedido->cliente->email)
                ->send(new PedidoCriado($pedido));
        }
    }
}