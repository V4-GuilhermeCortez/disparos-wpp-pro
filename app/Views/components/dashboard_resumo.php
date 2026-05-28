<?php
// Se o filtro estiver vazio ou for exatamente o dia de hoje, exibe "Disparos Hoje"
if (empty($data_filtro) || $data_filtro === date('Y-m-d')) {
    $tituloDisparos = 'Disparos Hoje';
} else {
    // Caso contrário, mostra "Disparos em DD/MM/AAAA"
    $tituloDisparos = 'Disparos em ' . date('d/m/Y', strtotime($data_filtro));
}
?>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    
    <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-200">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-gray-500 text-sm font-medium">Status do WhatsApp</h2>
            <div class="p-2 bg-blue-50 rounded-lg">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                </svg>
            </div>
        </div>
        <div class="flex items-center">
            <span class="relative flex h-3 w-3 mr-3">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
            </span>
            <p class="text-2xl font-bold text-gray-800 tracking-tight">Conectado</p>
        </div>
    </div>
    
    <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-200">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-gray-500 text-sm font-medium"><?= $tituloDisparos ?></h2>
            <div class="p-2 bg-green-50 rounded-lg">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                </svg>
            </div>
        </div>
        <p class="text-3xl font-bold text-gray-800 tracking-tight"><?= $disparos_hoje ?? 0 ?></p>
    </div>
    
    <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-200">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-gray-500 text-sm font-medium">Contatos na Base</h2>
            <div class="p-2 bg-purple-50 rounded-lg">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
        </div>
        <p class="text-3xl font-bold text-gray-800 tracking-tight"><?= number_format($contatos_cadastrados ?? 0, 0, ',', '.') ?></p>
    </div>

    <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-200" title="Total de envios x Contatos na base">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-gray-500 text-sm font-medium">Leads Alcançados</h2>
            <div class="p-2 bg-yellow-50 rounded-lg">
                <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                </svg>
            </div>
        </div>
        <p class="text-3xl font-bold text-gray-800 tracking-tight"><?= number_format($leads_alcancados ?? 0, 0, ',', '.') ?></p>
    </div>

</div>