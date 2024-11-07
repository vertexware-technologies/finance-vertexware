<div class="bg-gray-900 text-white p-6 rounded-lg flex justify-between items-center">
    <div class="flex items-center space-x-2">
        <!-- Ícone de carteira (use um ícone de sua biblioteca, como Font Awesome ou Heroicons) -->
        <x-zondicon-wallet class="w-8 h-8 mr-3" />

        <div class="flex flex-col">
            <span class="text-sm">Saldo</span>
            <span class="text-3xl font-semibold">R$ {{ number_format($balance, 2, ',', '.') }}</span>
        </div>
    </div>

    <div class="flex items-center space-x-2">
        <!-- Botão "Adicionar Transação" -->
        <button class="bg-[#EB8248] text-white text-sm font-semibold py-2 px-4 rounded-full flex items-center">
            Adicionar Transação
            <x-grommet-transaction class="w-5 h-5 ml-1" />
        </button>
    </div>
</div>
