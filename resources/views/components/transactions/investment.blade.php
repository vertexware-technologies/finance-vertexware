<div class="bg-gray-900 text-white p-4 rounded-lg flex flex-col space-y-2 items-start">

    <div class="flex items-center space-x-2">

        <div class="text-xl text-gray-400">
            <x-fas-piggy-bank class="w-5 h-5" />
        </div>
        <span class="text-sm text-gray-400">Investido</span>
    </div>

    <span class="text-3xl font-bold text-[20px]">R$ {{ number_format($investment, 2, ',', '.') }}</span>
</div>
