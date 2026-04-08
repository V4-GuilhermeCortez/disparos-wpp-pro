<div>
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6 border-b pb-4 gap-4">
        <h3 class="text-xl font-bold text-gray-800">Histórico de Resultados (<?= $totalEnquetes ?? 0 ?>)</h3>
        
        <div class="flex items-center space-x-2 w-full md:w-auto">
            <form action="/" method="GET" class="flex flex-1 md:flex-none">
                <input type="hidden" name="action" value="poll">
                <input type="text" name="search" value="<?= htmlspecialchars($search ?? '') ?>" placeholder="Pesquisar campanha..." class="shadow-sm appearance-none border rounded-l w-full py-1.5 px-3 text-gray-700 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-1.5 px-3 rounded-r text-sm transition-colors">
                    Buscar
                </button>
            </form>
            
            <?php if(!empty($search)): ?>
                <a href="/?action=poll" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-1.5 px-3 rounded text-sm transition-colors" title="Limpar Busca">
                    &times;
                </a>
            <?php endif; ?>

            <button onclick="window.location.reload()" class="text-sm bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-1.5 px-3 rounded flex items-center transition-colors whitespace-nowrap" title="Atualizar Votos">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
            </button>
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
        <?php if(isset($enquetes) && !empty($enquetes)): ?>
            <?php foreach($enquetes as $enq): ?>
                <div class="bg-white rounded-lg shadow-md border overflow-hidden relative group">
                    <a href="/?action=delete_poll&id=<?= $enq['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir a enquete <?= htmlspecialchars($enq['nome_campanha']) ?>?')" class="absolute top-2 right-2 bg-red-500 hover:bg-red-700 text-white p-1 rounded-full opacity-0 group-hover:opacity-100 transition-opacity" title="Excluir Enquete">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                    </a>

                    <div class="bg-gray-100 px-4 py-2 border-b flex items-center pr-10">
                        <span class="text-xs text-gray-500 font-bold uppercase truncate pr-2 border-r border-gray-300 mr-2"><?= htmlspecialchars($enq['nome_campanha']) ?></span>
                        <span class="text-xs text-gray-400 whitespace-nowrap"><?= date('d/m/Y H:i', strtotime($enq['data_disparo'])) ?></span>
                    </div>
                    <div class="p-5">
                        <h4 class="text-lg font-bold text-indigo-700 mb-4"><?= htmlspecialchars($enq['pergunta']) ?></h4>
                        <div class="space-y-3">
                            <?php foreach($enq['opcoes'] as $op): ?>
                                <?php $qtdVotos = isset($enq['votos'][$op]) ? $enq['votos'][$op] : 0; ?>
                                <div class="flex justify-between items-center <?= $qtdVotos > 0 ? 'bg-indigo-50 border-indigo-200' : 'bg-gray-50 border-gray-200' ?> p-3 rounded border transition-colors">
                                    <span class="text-gray-700 font-medium"><?= htmlspecialchars($op) ?></span>
                                    <span class="<?= $qtdVotos > 0 ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-600' ?> font-bold py-1 px-3 rounded-full text-sm">
                                        <?= $qtdVotos ?> <?= $qtdVotos == 1 ? 'voto' : 'votos' ?>
                                    </span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-gray-500 col-span-2 text-center py-10 bg-white rounded-lg border border-dashed">
                <?= !empty($search) ? 'Nenhuma enquete encontrada com esse nome.' : 'Nenhuma enquete disparada ainda. Crie sua primeira enquete acima!' ?>
            </p>
        <?php endif; ?>
    </div>

    <?php if(isset($totalPages) && $totalPages > 1): ?>
        <?php 
            // Mantém o termo pesquisado na URL quando o usuário trocar de página
            $searchParam = !empty($search) ? '&search=' . urlencode($search) : ''; 
        ?>
        <div class="flex justify-center items-center space-x-2 mt-4">
            <?php if ($currentPage > 1): ?>
                <a href="/?action=poll&page=<?= $currentPage - 1 ?><?= $searchParam ?>" class="px-4 py-2 bg-white border rounded text-indigo-600 hover:bg-indigo-50 font-semibold shadow-sm">Anterior</a>
            <?php endif; ?>
            
            <span class="text-gray-600 px-4">Página <b><?= $currentPage ?></b> de <b><?= $totalPages ?></b></span>
            
            <?php if ($currentPage < $totalPages): ?>
                <a href="/?action=poll&page=<?= $currentPage + 1 ?><?= $searchParam ?>" class="px-4 py-2 bg-white border rounded text-indigo-600 hover:bg-indigo-50 font-semibold shadow-sm">Próxima</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>