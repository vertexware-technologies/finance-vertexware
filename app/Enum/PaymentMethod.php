<?php

namespace App\Enum;

enum  PaymentMethod: string
{
    case PIX = 'pix';
    case CARTAO = 'cartão';
    case BOLETO = 'boleto';
}
