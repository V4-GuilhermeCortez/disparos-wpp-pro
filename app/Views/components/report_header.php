<div class="border-b-4 border-green-600 pb-4 mb-8 flex justify-between items-end" id="cabecalho-relatorio">
    <div>
        <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight">Relatório de Campanhas</h1>
        <p class="text-gray-500 mt-1 font-medium">Disparos WPP Pro - Gerado em <?= date('d/m/Y \à\s H:i') ?></p>
    </div>
    
    <div class="text-right flex items-center justify-end space-x-4">
        
        <a href="/?action=reset_stats" id="btn-zerar-stats" onclick="return confirm('ATENÇÃO: Tem certeza que deseja ZERAR os contadores de Disparos e Contatos?')" class="bg-red-50 text-red-500 hover:bg-red-500 hover:text-white p-2.5 rounded-full transition-colors shadow-sm border border-red-100" title="Zerar Estatísticas">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
        </a>

        <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">Status: Ativo</span>
    </div>
</div>