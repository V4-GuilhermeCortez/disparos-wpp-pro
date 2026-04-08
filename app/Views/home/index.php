<?php include BASE_PATH . '/app/Views/components/header.php'; ?>
<?php include BASE_PATH . '/app/Views/components/navbar.php'; ?>

<div class="container mx-auto mt-8 p-4">
    <div class="flex flex-col md:flex-row items-center justify-between mb-6 space-y-4 md:space-y-0">
        <h1 class="text-3xl font-bold text-gray-800">Visão Geral</h1>
        
        <div class="flex flex-wrap gap-2 items-center">
            <form action="/" method="GET" class="flex space-x-2">
                <input type="text" name="search" value="<?= htmlspecialchars($search ?? '') ?>" placeholder="Pesquisar..." class="shadow appearance-none border rounded py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 w-48">
                
                <input type="date" name="filter_date" value="<?= htmlspecialchars($data_filtro) ?>" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                
                <button type="submit" class="bg-white hover:bg-gray-100 border text-gray-700 font-bold py-2 px-4 rounded shadow">Filtrar</button>
            </form>
            
            <a href="/?action=report" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow transition-colors flex items-center ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                Relatório
            </a>
            
            <button onclick="abrirModalCriacao()" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow transition-colors ml-2">
                + Nova Campanha
            </button>
        </div>
    </div>

    <?php include BASE_PATH . '/app/Views/components/dashboard_resumo.php'; ?>

    <h2 class="text-2xl font-bold text-gray-800 mb-4">Campanhas Recentes</h2>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        
        <?php if (empty($campanhas)): ?>
            <p class="text-gray-500 col-span-4">Nenhuma campanha encontrada para este filtro.</p>
        <?php else: ?>
            <?php foreach($campanhas as $campanha): ?>
                <?php $campanhaJson = rawurlencode(json_encode($campanha)); ?>
                
                <div onclick="abrirModalDetalhes('<?= $campanhaJson ?>')" class="relative bg-white rounded-lg shadow overflow-hidden border cursor-pointer hover:shadow-lg transition-shadow duration-200 group">
                    <div class="absolute top-2 right-2 flex space-x-2 z-10">
                        <button onclick="abrirModalEdicao(event, '<?= $campanhaJson ?>')" class="bg-yellow-500 hover:bg-yellow-600 text-white rounded-full p-2 shadow-md transition-colors" title="Editar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                        </button>
                        <button onclick="confirmarReenvio(event, '<?= $campanha['id'] ?>')" class="bg-blue-500 hover:bg-blue-600 text-white rounded-full p-2 shadow-md transition-colors" title="Reenviar"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg></button>
                        <button onclick="confirmarExclusao(event, '<?= $campanha['id'] ?>')" class="bg-red-500 hover:bg-red-600 text-white rounded-full p-2 shadow-md transition-colors" title="Excluir"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg></button>
                    </div>

                    <?php if(!empty($campanha['foto'])): ?>
                        <img src="<?= htmlspecialchars($campanha['foto']) ?>" class="w-full h-40 object-cover">
                    <?php else: ?>
                        <div class="w-full h-40 bg-gray-200 flex items-center justify-center text-gray-400">Sem Imagem</div>
                    <?php endif; ?>
                    
                    <div class="p-4">
                        <p class="text-xs font-bold text-green-600 uppercase tracking-wide mb-1"><?= htmlspecialchars($campanha['nome_campanha'] ?? 'Sem Campanha') ?></p>
                        <h3 class="font-bold text-lg text-gray-800 truncate"><?= htmlspecialchars($campanha['nome']) ?></h3>
                        <p class="text-sm text-gray-500 mt-1 truncate"><?= htmlspecialchars($campanha['descricao']) ?></p>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="font-bold text-gray-800">R$ <?= number_format($campanha['valor'], 2, ',', '.') ?></span>
                            <span class="text-xs font-semibold bg-gray-100 text-gray-600 py-1 px-2 rounded">Estoque: <?= $campanha['quantidade'] ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <?php if ($totalPages > 1): ?>
        <div class="flex justify-center mt-10 space-x-2">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="/?page=<?= $i ?>&search=<?= urlencode($search) ?>&filter_date=<?= urlencode($data_filtro) ?>" class="py-2 px-4 rounded shadow font-bold <?= $currentPage == $i ? 'bg-green-600 text-white' : 'bg-white text-green-600 hover:bg-green-100' ?>">
                    <?= $i ?>
                </a>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
</div>

<?php include BASE_PATH . '/app/Views/components/modal_criacao.php'; ?>
<?php include BASE_PATH . '/app/Views/components/modal_edicao.php'; ?>
<?php include BASE_PATH . '/app/Views/components/modal_detalhes.php'; ?>
<?php include BASE_PATH . '/app/Views/components/footer.php'; ?>