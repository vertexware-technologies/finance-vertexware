<div class="overflow-hidden bg-[#111827] shadow sm:rounded-lg border border-[#111827]">
    <x-transactions.transactions-index :transactions="$transactions" />
    <div class="mt-4 ml-4 mb-4">
        {{ $transactions->links() }}
    </div>
</div>
