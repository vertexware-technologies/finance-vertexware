<x-ui.card>
    <div class="flex justify-between items-center mb-6">
        <p class="text-lg font-bold text-white text-[30px]">Transações</p>
        <x-button.primary class="px-4 ml-8 py-2 bg-[#EB8248] text-white rounded hover:bg-[#726ab4]">
            Ver Mais
        </x-button.primary>
    </div>
    @foreach ($transactions as $transaction)
        <x-transactions.transaction :transaction="$transaction" />
    @endforeach
</x-ui.card>
