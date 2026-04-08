<?php if(isset($reset_sucesso) && $reset_sucesso): ?>
<div class="max-w-5xl mx-auto bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-6 rounded shadow-sm flex justify-between items-center" role="alert">
    <div>
        <p class="font-bold">Estatísticas Zeradas!</p>
        <p>Os contadores de Disparos e Contatos foram reiniciados com sucesso.</p>
    </div>
    <a href="/?action=report" class="text-yellow-700 font-bold hover:text-yellow-900">&times; Fechar</a>
</div>
<?php endif; ?>