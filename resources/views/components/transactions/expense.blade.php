<div class=" text-white p-4 rounded-lg flex flex-col space-y-2 items-start border border-[#111827]">
    <!-- Ícone e Título -->
    <div class="flex items-center space-x-2">
        <!-- Ícone (use o ícone apropriado) -->
        <div class="text-xl text-gray-400">
            <x-akar-statistic-down class="w-5 h-5" style="color: red" />
        </div>
        <span class="text-sm text-red-900">Despesa</span>
    </div>

    <!-- Valor -->
    <span class="text-3xl font-bold text-[20px]">R$ - {{ number_format($expense, 2, ',', '.') }}</span>
</div>
