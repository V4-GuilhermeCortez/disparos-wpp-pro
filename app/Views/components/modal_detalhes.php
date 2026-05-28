<div id="modalDetalhesCampanha" class="hidden fixed inset-0 bg-gray-900/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 transition-all">
    <div class="bg-white rounded-2xl w-full max-w-md overflow-hidden shadow-2xl transform transition-all relative">
        
        <button onclick="fecharModalDetalhes()" class="absolute top-3 right-3 bg-black/20 hover:bg-black/40 text-white p-1.5 rounded-full backdrop-blur-md transition-colors z-10 focus:outline-none">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        
        <img id="detalheFoto" src="" alt="Foto da Peça" class="w-full h-56 object-cover hidden">
        
        <div class="p-6 sm:p-7">
            
            <div class="mb-4">
                <span id="detalheCampanha" class="inline-flex items-center px-2.5 py-1 rounded-md bg-green-50 text-green-700 text-xs font-medium tracking-wide uppercase"></span>
            </div>
            
            <div class="flex justify-between items-start gap-4 mb-5">
                <h3 id="detalheNome" class="text-xl font-semibold text-gray-900 leading-tight">Nome da Peça</h3>
                <span id="detalheValor" class="text-xl font-bold text-green-600 whitespace-nowrap">R$ 0,00</span>
            </div>
            
            <div class="mb-6">
                <p class="text-sm font-medium text-gray-900 mb-1.5">Descrição</p>
                <p id="detalheDescricao" class="text-sm text-gray-600 leading-relaxed whitespace-pre-wrap"></p>
            </div>
            
            <div class="bg-gray-50/80 rounded-xl p-4 flex justify-between items-center mb-6 border border-gray-100">
                <div class="flex items-center text-gray-600">
                    <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    <span class="font-medium text-sm">Disponível em Estoque</span>
                </div>
                <span id="detalheEstoque" class="font-bold text-lg text-gray-900">0</span>
            </div>

            <div class="flex justify-end pt-2 border-t border-gray-50">
                <button onclick="fecharModalDetalhes()" class="w-full sm:w-auto bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2.5 px-6 rounded-lg transition-colors focus:outline-none focus:ring-4 focus:ring-gray-200/50">
                    Fechar
                </button>
            </div>
        </div>
    </div>
</div>