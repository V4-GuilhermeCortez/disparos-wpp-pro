<div class="mt-12">
    <div class="border-b-2 border-gray-200 pb-2 mb-6 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
        <h2 class="text-2xl font-bold text-gray-800">Engajamento em Enquetes</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php if(isset($enquetes) && !empty($enquetes)): ?>
            <?php foreach($enquetes as $enq): ?>
                
                <div class="border border-gray-200 rounded-lg p-5 bg-gray-50 relative break-inside-avoid shadow-sm">
                    <span class="text-xs text-gray-500 absolute top-4 right-4 bg-white px-2 py-1 border rounded shadow-sm">
                        <?= date('d/m/Y', strtotime($enq['data_disparo'])) ?>
                    </span>
                    
                    <h4 class="font-bold text-indigo-700 uppercase text-xs mb-2 tracking-wide"><?= htmlspecialchars($enq['nome_campanha']) ?></h4>
                    <p class="text-gray-900 font-semibold text-lg mb-5 leading-tight"><?= htmlspecialchars($enq['pergunta']) ?></p>
                    
                    <div class="space-y-4">
                        <?php 
                        // Calcula o total de votos
                        $totalVotos = array_sum($enq['votos'] ?? []);
                        
                        foreach($enq['opcoes'] as $op): 
                            $votos = $enq['votos'][$op] ?? 0;
                            // Porcentagem para a barra
                            $porcentagem = $totalVotos > 0 ? round(($votos / $totalVotos) * 100) : 0;
                        ?>
                            
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="text-gray-700 font-medium truncate pr-2"><?= htmlspecialchars($op) ?></span>
                                    <span class="font-bold text-gray-900 whitespace-nowrap"><?= $votos ?> votos (<?= $porcentagem ?>%)</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-indigo-600 h-2 rounded-full" style="width: <?= $porcentagem ?>%"></div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                    
                    <div class="mt-5 pt-3 border-t border-gray-200 flex justify-between items-center text-sm text-gray-500 bg-white -mx-5 -mb-5 p-4 rounded-b-lg">
                        <span>Total de interações:</span>
                        <span class="font-bold text-indigo-700 text-base"><?= $totalVotos ?></span>
                    </div>
                </div>

            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-span-1 md:col-span-2 bg-gray-50 border border-dashed border-gray-300 rounded-lg p-8 text-center">
                <p class="text-gray-500 font-medium">Ainda não há dados de enquetes para exibir no relatório.</p>
            </div>
        <?php endif; ?>
    </div>
</div>