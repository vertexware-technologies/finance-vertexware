<div class="flex justify-between items-center mb-6">
    <div class=" items-center">
        <div>
            <div class="text-white text-[25px] font-bold tracking-wide truncate w-[140px]">
                R$ {{ $transaction->amount }}
            </div>
            @if ($transaction->category_id == 1)
                <div class="text-[red]">
                @else
                    <div class="text-[green]">
            @endif
            {{ $transaction->category->name }}
        </div>
    </div>
</div>
<div
    class="whitespace-nowrap uppercase font-bold text-[#111827] flex items-center space-x-2 px-[8px] py-[4px] rounded-full bg-[#EB8248] text-[12px]">
    <span>{{ $transaction->accountType->name }}</span>
</div>
</div>
