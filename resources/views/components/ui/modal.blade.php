<div x-data="{ showModal: @entangle('modal') }" x-show="showModal">
    <dialog x-ref="modal"
        class="
            fixed inset-0 rounded-lg m-auto max-w-2xl
            bg-[#0F0E11] shadow-lg text-white
            border-[#1E1E2C] border p-8
            flex flex-col gap-6 z-50
        ">
        <!-- Cabeçalho com Título, Subtítulo e Botão de Fechar -->
        <div class="flex justify-between items-center mb-4">
            <div>
                <div class="text-[28px] text-white font-semibold">
                    {{ $title }}
                </div>
                <div class="mt-2 text-[16px] text-[#C3C3D1]">
                    {{ $subtitle }}
                </div>
            </div>
            <button class="bg-[#1E1E2C] hover:bg-[#313145] transition duration-300 ease-in-out p-[8px] rounded-md"
                wire:click="$set('modal', false)">
                <x-ui.icons.x class="w-[32px] h-[32px] text-white" />
            </button>
        </div>

        <!-- Conteúdo do Modal -->
        <div class="flex flex-col gap-6">
            {{ $slot }}
        </div>
    </dialog>

    <!-- Overlay de Fundo com Desfoque -->
    <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm"></div>
</div>
