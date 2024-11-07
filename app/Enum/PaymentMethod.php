<?php

namespace App\Enum;

enum  PaymentMethod: string
{
    case PIX = 'pix';
    case CARD = 'card';
    case BOLETO = 'boleto';
}
