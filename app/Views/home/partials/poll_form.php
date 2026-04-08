<div class="bg-white rounded-lg shadow-md border overflow-hidden mb-12">
    <div class="bg-indigo-600 px-6 py-4">
        <h2 class="text-2xl font-bold text-white flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>
            Disparar Nova Enquete
        </h2>
    </div>

    <form action="/?action=send_poll" method="POST" class="p-6">
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">Nome de Controle (Interno)</label>
            <input type="text" name="nome_campanha" placeholder="Ex: Pesquisa Coleção Inverno" required class="shadow-sm appearance-none border rounded w-full py-3 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <p class="text-xs text-gray-500 mt-1">Este nome não vai para o cliente, serve apenas para você identificar a enquete aqui no painel.</p>
        </div>

        <div class="mb-8">
            <label class="block text-gray-700 text-sm font-bold mb-2">Qual a pergunta da Enquete?</label>
            <input type="text" name="pergunta" placeholder="Ex: Qual o seu modelo favorito?" required class="shadow-sm appearance-none border rounded w-full py-3 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-lg font-semibold">
        </div>

        <div class="mb-6 bg-gray-50 p-4 rounded border border-gray-200">
            <label class="block text-gray-700 text-sm font-bold mb-4">Opções de Resposta</label>
            
            <div id="lista-opcoes" class="space-y-3">
                <div class="flex items-center space-x-2">
                    <span class="text-gray-400 font-bold">1.</span>
                    <input type="text" name="opcoes[]" placeholder="Opção 1" required class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div class="flex items-center space-x-2">
                    <span class="text-gray-400 font-bold">2.</span>
                    <input type="text" name="opcoes[]" placeholder="Opção 2" required class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>

            <button type="button" onclick="adicionarOpcao()" class="mt-4 text-indigo-600 hover:text-indigo-800 font-bold text-sm flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                Adicionar mais uma opção
            </button>
        </div>

        <div class="flex items-center justify-end pt-4 border-t mt-4">
            <a href="/" class="text-gray-600 hover:text-gray-800 font-semibold py-2 px-4 mr-2">Voltar ao Início</a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded shadow-lg transition-colors flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" /></svg>
                Disparar Enquete
            </button>
        </div>
    </form>
</div>