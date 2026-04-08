<div id="modalEdicaoCampanha" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg w-full max-w-lg overflow-hidden shadow-xl">
        <div class="px-6 py-4 border-b flex justify-between items-center bg-yellow-50">
            <h3 class="text-lg font-bold text-gray-800">Editar Campanha</h3>
            <button onclick="fecharModalEdicao()" class="text-gray-400 hover:text-gray-600 font-bold text-xl">&times;</button>
        </div>
        
        <form action="?action=update" method="POST" enctype="multipart/form-data" class="p-6">
            <input type="hidden" name="id" id="edit_id">
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nome da Campanha</label>
                <input type="text" name="nome_campanha" id="edit_nome_campanha" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-yellow-500">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nome da Peça/Produto</label>
                <input type="text" name="nome" id="edit_nome" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-yellow-500">
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Qtd em Estoque</label>
                    <input type="number" name="quantidade" id="edit_quantidade" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Valor (R$)</label>
                    <input type="number" step="0.01" name="valor" id="edit_valor" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Descrição</label>
                <textarea name="descricao" id="edit_descricao" rows="3" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-yellow-500"></textarea>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Atualizar Foto (Opcional)</label>
                <input type="file" name="foto" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100">
            </div>

            <div class="flex items-center justify-end space-x-3">
                <button type="button" onclick="fecharModalEdicao()" class="text-gray-600 hover:text-gray-800 font-semibold py-2 px-4">Cancelar</button>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-6 rounded shadow">Salvar Edição</button>
            </div>
        </form>
    </div>
</div>