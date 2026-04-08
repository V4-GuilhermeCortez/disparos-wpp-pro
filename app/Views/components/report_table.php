<h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Detalhamento Operacional</h3>

<table class="min-w-full bg-white border border-gray-200">
    <thead class="bg-gray-100 text-gray-600 text-left text-sm uppercase font-bold">
        <tr>
            <th class="py-3 px-4 border-b">Campanha</th>
            <th class="py-3 px-4 border-b">Peça/Produto</th>
            <th class="py-3 px-4 border-b text-center">Entregas (Est.)</th>
            <th class="py-3 px-4 border-b text-center">Estoque</th>
            <th class="py-3 px-4 border-b text-right">Valor Un.</th>
        </tr>
    </thead>
    <tbody class="text-gray-700 text-sm">
        <?php foreach($campanhas as $c): ?>
        <tr class="hover:bg-gray-50">
            <td class="py-3 px-4 border-b font-medium text-green-700"><?= htmlspecialchars($c['nome_campanha'] ?? 'Padrão') ?></td>
            <td class="py-3 px-4 border-b"><?= htmlspecialchars($c['nome']) ?></td>
            <td class="py-3 px-4 border-b text-center bg-gray-50"><?= $totalContatos ?></td>
            <td class="py-3 px-4 border-b text-center"><?= $c['quantidade'] ?></td>
            <td class="py-3 px-4 border-b text-right font-semibold">R$ <?= number_format($c['valor'], 2, ',', '.') ?></td>
        </tr>
        <?php endforeach; ?>
        
        <?php if(empty($campanhas)): ?>
        <tr>
            <td colspan="5" class="py-6 text-center text-gray-500">Nenhuma campanha registrada no sistema.</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>

<div class="mt-8 text-center text-xs text-gray-400">
    * Entregas (Est.) reflete a base de contatos registrada no momento da geração do relatório.
</div>