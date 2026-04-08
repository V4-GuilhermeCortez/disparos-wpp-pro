<div id="modalNovaCampanha" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg w-full max-w-lg overflow-hidden shadow-xl">
        
        <div class="px-6 py-4 border-b flex justify-between items-center">
            <h3 class="text-lg font-bold text-gray-800">Criar Nova Campanha</h3>
            <button onclick="fecharModalCriacao()" class="text-gray-400 hover:text-gray-600 font-bold text-xl">&times;</button>
        </div>
        
        <form action="?action=store" method="POST" enctype="multipart/form-data" class="p-6">
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nome da Campanha</label>
                <input type="text" name="nome_campanha" placeholder="Ex: Promoção Dia das Mães" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nome da Peça/Produto</label>
                <input type="text" name="nome" placeholder="Ex: Camiseta Preta M" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Qtd em Estoque</label>
                    <input type="number" name="quantidade" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Valor (R$)</label>
                    <input type="number" step="0.01" name="valor" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Descrição</label>
                <textarea name="descricao" rows="3" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Carregar Foto</label>
                <input type="file" name="foto" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
            </div>

            <div class="flex items-center justify-end space-x-3">
                <button type="button" onclick="fecharModalCriacao()" class="text-gray-600 hover:text-gray-800 font-semibold py-2 px-4">Cancelar</button>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded shadow">Salvar e Enviar</button>
            </div>
            
        </form>
    </div>
</div>