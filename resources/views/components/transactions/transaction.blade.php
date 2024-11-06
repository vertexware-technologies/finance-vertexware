<div class="flex justify-between items-center mb-6">
    <div class="flex items-center">
        <!-- Ícone à esquerda -->
        <div class="bg-[#333333] p-2 rounded-md mr-4">
            <x-fab-pix class="w-6 h-6 text-white" />
        </div>

        <!-- Detalhes da transação -->
        <div>
            <div class="text-white text-lg text-[17px]">
                {{ $transaction->accountType->name }}
            </div>
            <div class="text-gray-400 text-sm">
                {{ @date('d M, Y', strtotime($transaction->date)) }}
            </div>
        </div>
    </div>

    <!-- Valor da transação -->
    @if ($transaction->account_type_id == 1)
        <div class="text-green-500 text-[15px] tracking-wide truncate">
            R$ {{ number_format($transaction->amount, 2, ',', '.') }}
        </div>
    @elseif ($transaction->account_type_id == 2)
        <div class="text-red-500 text-[15px] tracking-wide truncate">
            - R$ {{ number_format($transaction->amount, 2, ',', '.') }}
        </div>
    @else
        <div class="text-white text-[15px] tracking-wide truncate">
            - R$ {{ number_format($transaction->amount, 2, ',', '.') }}
        </div>
    @endif

</div>
