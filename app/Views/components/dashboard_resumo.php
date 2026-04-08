<?php
// Se o filtro estiver vazio ou for exatamente o dia de hoje, exibe "Disparos Hoje"
if (empty($data_filtro) || $data_filtro === date('Y-m-d')) {
    $tituloDisparos = 'Disparos Hoje';
} else {
    // Caso contrário, mostra "Disparos em DD/MM/AAAA"
    $tituloDisparos = 'Disparos em ' . date('d/m/Y', strtotime($data_filtro));
}
?>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
    
    <div class="bg-white rounded-lg p-6 shadow-sm border-l-4 border-blue-500">
        <h2 class="text-gray-500 text-sm font-bold uppercase">Status do WhatsApp</h2>
        <p class="text-2xl font-bold text-gray-800 mt-2 flex items-center">
            <span class="w-3 h-3 rounded-full bg-green-500 mr-2"></span>Conectado
        </p>
    </div>
    
    <div class="bg-white rounded-lg p-6 shadow-sm border-l-4 border-green-500">
        <h2 class="text-gray-500 text-sm font-bold uppercase"><?= $tituloDisparos ?></h2>
        <p class="text-3xl font-bold text-gray-800 mt-2"><?= $disparos_hoje ?? 0 ?></p>
    </div>
    
    <div class="bg-white rounded-lg p-6 shadow-sm border-l-4 border-purple-500">
        <h2 class="text-gray-500 text-sm font-bold uppercase">Contatos na Base</h2>
        <p class="text-3xl font-bold text-gray-800 mt-2"><?= number_format($contatos_cadastrados ?? 0, 0, ',', '.') ?></p>
    </div>

    <div class="bg-white rounded-lg p-6 shadow-sm border-l-4 border-yellow-500">
        <h2 class="text-gray-500 text-sm font-bold uppercase" title="Total de envios x Contatos na base">Leads Alcançados</h2>
        <p class="text-3xl font-bold text-gray-800 mt-2"><?= number_format($leads_alcancados ?? 0, 0, ',', '.') ?></p>
    </div>

</div>