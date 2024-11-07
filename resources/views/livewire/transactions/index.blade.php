<x-ui.card>
    <div class="flex items-center mb-6">
        <p class=" text-white text-[30px]">Transações</p>
    </div>
    @foreach ($transactions as $transaction)
        <x-transactions.transaction :transaction="$transaction" />
    @endforeach
    <div class="mt-6">
        <button
            class="bg-[#EB8248] text-white font-bold rounded-full tracking-wide uppercase px-8 py-3 rounded-[4px]
                hover:bg-[#7067B0] transition duration-300 ease-in-out w-full"
            wire:click="loadMore">
            Carregar Mais
        </button>
    </div>
</x-ui.card>
