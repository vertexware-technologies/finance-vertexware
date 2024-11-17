<div class="col-span-2 space-y-4">
    <x-ui.card>
        <!-- Componente de saldo ocupando toda a largura -->
        <x-transactions.balance :balance="$balance" />

        <!-- Grid para os outros componentes em 3 colunas -->
        <div class="grid grid-cols-3 gap-4 mt-3">
            <x-transactions.investment :investment="$investment" />
            <x-transactions.income :income="$income" />
            <x-transactions.expense :expense="$expense" />
        </div>
        <div class="grid grid-cols-2 gap-4 mt-3">
            <x-transactions.category-chart />
        </div>
    </x-ui.card>
</div>
