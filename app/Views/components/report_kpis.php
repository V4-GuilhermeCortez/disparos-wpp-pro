<div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-10">
    
    <div class="bg-gray-50 p-4 rounded border-l-4 border-blue-500 shadow-sm">
        <p class="text-xs text-gray-500 font-bold uppercase truncate">Campanhas</p>
        <p class="text-2xl font-bold text-gray-800"><?= $totalCampanhas ?? 0 ?></p>
    </div>
    
    <div class="bg-gray-50 p-4 rounded border-l-4 border-purple-500 shadow-sm">
        <p class="text-xs text-gray-500 font-bold uppercase truncate">Base de Contatos</p>
        <p class="text-2xl font-bold text-gray-800"><?= number_format($totalContatos ?? 0, 0, ',', '.') ?></p>
    </div>

    <div class="bg-gray-50 p-4 rounded border-l-4 border-indigo-500 shadow-sm">
        <p class="text-xs text-gray-500 font-bold uppercase truncate cursor-help" title="<?= $totalDisparos ?? 0 ?> Disparos Totais realizados">Leads Alcançados</p>
        <p class="text-2xl font-bold text-gray-800"><?= number_format($leadsAlcancados ?? 0, 0, ',', '.') ?></p>
    </div>
    
    <div class="bg-gray-50 p-4 rounded border-l-4 border-yellow-500 shadow-sm">
        <p class="text-xs text-gray-500 font-bold uppercase truncate">Itens Estoque</p>
        <p class="text-2xl font-bold text-gray-800"><?= number_format($totalItens ?? 0, 0, ',', '.') ?></p>
    </div>
    
    <div class="bg-gray-50 p-4 rounded border-l-4 border-green-500 shadow-sm">
        <p class="text-xs text-gray-500 font-bold uppercase truncate">Valor Total</p>
        <p class="text-2xl font-bold text-gray-800 truncate" title="R$ <?= number_format($valorTotalEstoque ?? 0, 2, ',', '.') ?>">
            R$ <?= number_format($valorTotalEstoque ?? 0, 2, ',', '.') ?>
        </p>
    </div>
    
</div>