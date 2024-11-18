<div class="overflow-hidden bg-[#111827] shadow sm:rounded-lg border border-[#0F0E11]">
    <table class="min-w-full divide-y divide-[#0F0E11]">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-[#EB8248] uppercase tracking-wider">
                Categoria
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-[#EB8248] uppercase tracking-wider">
                Valor
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-[#EB8248] uppercase tracking-wider">
                Tipo de Conta
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-[#EB8248] uppercase tracking-wider">
                Metodo de Pagamento
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-[#EB8248] uppercase tracking-wider">
                Data do pagamento
            </th>
        </tr>
        </thead>
        <tbody class="bg-[#0f0E11] divide-y divide-[#111827]">
            @forelse ($transactions as $transaction)
                <tr>
                    <td class="px-6 py-4 text-sm font-medium text-white">
                        {{ $transaction->category->name }}
                    </td>
                    @if ($transaction->category_id == 1)
                        <td class="px-6 py-4 text-sm text-green-500">
                            R$ {{ number_format($transaction->amount, 2, ',', '.') }}
                        </td>
                    @elseif ($transaction->category_id == 2)
                        <td class="px-6 py-4 text-sm text-red-500">
                            R$ - {{ number_format($transaction->amount, 2, ',', '.') }}
                        </td>
                    @else
                        <td class="px-6 py-4 text-sm text-white">
                            R$ {{ number_format($transaction->amount, 2, ',', '.') }}
                        </td>
                    @endif
                    <td class="px-6 py-4 text-sm font-medium text-white">
                        {{ $transaction->accountType->name }}
                    </td>
                    <td class="px-6 py-4 text-sm font-medium text-white">
                        {{ $transaction->payment_method->name }}
                    </td>
                    <td class="px-6 py-4 text-sm font-medium text-white">
                        {{ \Carbon\Carbon::parse($transaction->date)->format('d/m/Y') }}
                    </td>
                    <td class="pl-8 py-4 text-sm font-medium text-white flex items-center space-x-4">
                        <livewire:transactions.button-transaction-update :transaction="$transaction" />
                        <livewire:transactions.button-transaction-delete :transaction="$transaction" />
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-sm text-center text-gray-400">
                        Nenhuma transação encontrada.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
