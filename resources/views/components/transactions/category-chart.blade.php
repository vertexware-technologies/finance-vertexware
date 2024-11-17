<div class="bg-gray-900 p-6 rounded-lg text-center">
    <!-- Contêiner principal -->
    <div class="flex flex-col items-center justify-center">
        <!-- Gráfico -->
        <div class="relative w-48 h-48">
            <!-- Gráfico em SVG -->
            <svg width="200" height="200" viewBox="0 0 42 42">
                <!-- Segmento 1 (Receitas) -->
                <circle cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#22c55e"
                    stroke-width="3" stroke-dasharray="{{ $percentages['income'] }} {{ 100 - $percentages['income'] }}"
                    stroke-dashoffset="25" stroke-linecap="round" transform="rotate(-90 21 21)" />
                <!-- Segmento 2 (Despesas) -->
                <circle cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#ef4444"
                    stroke-width="3"
                    stroke-dasharray="{{ $percentages['expense'] }} {{ 100 - $percentages['expense'] }}"
                    stroke-dashoffset="{{ 25 - $percentages['income'] }}" stroke-linecap="round"
                    transform="rotate(-90 21 21)" />
                <!-- Segmento 3 (Investimentos) -->
                <circle cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#f59e0b"
                    stroke-width="3"
                    stroke-dasharray="{{ $percentages['investment'] }} {{ 100 - $percentages['investment'] }}"
                    stroke-dashoffset="{{ 25 - ($percentages['income'] + $percentages['expense']) }}"
                    stroke-linecap="round" transform="rotate(-90 21 21)" />
            </svg>
        </div>

        <!-- Legenda -->
        <div class="mt-6 w-48">
            <div class="space-y-4 text-center text-white">
                <!-- Receitas -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <x-akar-statistic-up class="w-5 h-5" style="color: green" />
                        <span class="text-sm">Receitas:</span>
                    </div>
                    <span class="text-sm">{{ round($percentages['income']) }}%</span>
                </div>
                <!-- Despesas -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <x-akar-statistic-down class="w-5 h-5" style="color: red" />
                        <span class="text-sm">Despesas:</span>
                    </div>
                    <span class="text-sm">{{ round($percentages['expense']) }}%</span>
                </div>
                <!-- Investimentos -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <x-fas-piggy-bank class="w-5 h-5" />
                        <span class="text-sm">Investimentos:</span>
                    </div>
                    <span class="text-sm">{{ round($percentages['investment']) }}%</span>
                </div>
            </div>
        </div>
    </div>
</div>
