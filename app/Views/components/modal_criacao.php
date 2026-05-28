<div id="modalNovaCampanha" class="hidden fixed inset-0 bg-gray-900/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 transition-all">
    
    <div class="bg-white rounded-2xl w-full max-w-lg overflow-hidden shadow-2xl transform transition-all">
        
        <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
            <h3 class="text-lg font-semibold text-gray-800">Criar Nova Campanha</h3>
            <button onclick="fecharModalCriacao()" class="text-gray-400 hover:text-gray-700 hover:bg-gray-100 p-1.5 rounded-lg transition-colors focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <form action="?action=store" method="POST" enctype="multipart/form-data" class="p-6">
            
            <div class="mb-5">
                <label class="block text-gray-600 text-sm font-medium mb-1.5">Nome da Campanha</label>
                <input type="text" name="nome_campanha" placeholder="Ex: Promoção Dia das Mães" required 
                       class="w-full px-4 py-2.5 text-gray-700 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all">
            </div>

            <div class="mb-5">
                <label class="block text-gray-600 text-sm font-medium mb-1.5">Nome da Peça/Produto</label>
                <input type="text" name="nome" placeholder="Ex: Camiseta Preta M" required 
                       class="w-full px-4 py-2.5 text-gray-700 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all">
            </div>

            <div class="grid grid-cols-2 gap-5 mb-5">
                <div>
                    <label class="block text-gray-600 text-sm font-medium mb-1.5">Qtd em Estoque</label>
                    <input type="number" name="quantidade" required 
                           class="w-full px-4 py-2.5 text-gray-700 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all">
                </div>
                <div>
                    <label class="block text-gray-600 text-sm font-medium mb-1.5">Valor (R$)</label>
                    <input type="number" step="0.01" name="valor" required placeholder="0,00"
                           class="w-full px-4 py-2.5 text-gray-700 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all">
                </div>
            </div>

            <div class="mb-5">
                <label class="block text-gray-600 text-sm font-medium mb-1.5">Descrição</label>
                <textarea name="descricao" rows="3" required placeholder="Detalhes do produto ou da campanha..."
                          class="w-full px-4 py-2.5 text-gray-700 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all resize-none"></textarea>
            </div>

            <div class="mb-8">
                <label class="block text-gray-600 text-sm font-medium mb-1.5">Carregar Foto</label>
                <div class="mt-1 flex items-center">
                    <input type="file" name="foto" accept="image/*" 
                           class="block w-full text-sm text-gray-500
                           file:mr-4 file:py-2.5 file:px-4
                           file:rounded-lg file:border-0
                           file:text-sm file:font-medium
                           file:bg-green-50 file:text-green-700
                           hover:file:bg-green-100 cursor-pointer transition-colors border border-gray-200 rounded-lg bg-gray-50 focus:outline-none">
                </div>
            </div>

            <div class="flex items-center justify-end space-x-3 pt-2 border-t border-gray-50">
                <button type="button" onclick="fecharModalCriacao()" 
                        class="text-gray-500 hover:text-gray-700 hover:bg-gray-100 font-medium py-2.5 px-5 rounded-lg transition-colors focus:outline-none">
                    Cancelar
                </button>
                <button type="submit" 
                        class="bg-green-600 hover:bg-green-700 text-white font-medium py-2.5 px-6 rounded-lg shadow-sm shadow-green-600/20 transition-all focus:outline-none focus:ring-4 focus:ring-green-500/30">
                    Salvar e Enviar
                </button>
            </div>
            
        </form>
    </div>
</div>