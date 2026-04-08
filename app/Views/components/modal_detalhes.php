<div id="modalDetalhesCampanha" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg w-full max-w-md overflow-hidden shadow-xl">
        
        <img id="detalheFoto" src="" alt="Foto da Peça" class="w-full h-48 object-cover hidden">
        
        <div class="p-6">
            <span id="detalheCampanha" class="text-xs font-bold text-green-600 uppercase tracking-wide block mb-1"></span>
            
            <div class="flex justify-between items-start mb-4">
                <h3 id="detalheNome" class="text-2xl font-bold text-gray-800">Nome da Peça</h3>
                <span id="detalheValor" class="text-xl font-bold text-gray-800">R$ 0,00</span>
            </div>
            
            <p class="text-sm font-semibold text-gray-500 uppercase mb-1">Descrição</p>
            <p id="detalheDescricao" class="text-gray-700 mb-4 whitespace-pre-wrap"></p>
            
            <div class="bg-gray-50 border rounded p-3 flex justify-between items-center mb-6">
                <span class="text-gray-600 font-medium">Quantidade em Estoque:</span>
                <span id="detalheEstoque" class="font-bold text-lg text-gray-800">0</span>
            </div>

            <div class="flex justify-end">
                <button onclick="fecharModalDetalhes()" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-6 rounded shadow transition-colors">
                    Fechar
                </button>
            </div>
        </div>
    </div>
</div>