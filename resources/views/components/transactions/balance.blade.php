<div class="bg-gray-900 text-white p-6 rounded-lg flex justify-between items-center">
    <div class="flex items-center space-x-2">
        <x-zondicon-wallet class="w-8 h-8 mr-3" />
        <div class="flex flex-col">
            <span class="text-sm">Saldo</span>
            <span class="text-3xl font-semibold">R$ {{ number_format($balance, 2, ',', '.') }}</span>
        </div>
    </div>
    <livewire:transactions.transaction-create />
</div>
