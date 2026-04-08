<script>
    let contadorOpcoes = 2;

    function adicionarOpcao() {
        if(contadorOpcoes >= 12) {
            alert("O WhatsApp permite no máximo 12 opções por enquete!");
            return;
        }
        
        contadorOpcoes++;
        const lista = document.getElementById('lista-opcoes');
        
        const novaDiv = document.createElement('div');
        novaDiv.className = 'flex items-center space-x-2 mt-3';
        
        novaDiv.innerHTML = `
            <span class="text-gray-400 font-bold">${contadorOpcoes}.</span>
            <input type="text" name="opcoes[]" placeholder="Opção ${contadorOpcoes}" required class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <button type="button" onclick="this.parentElement.remove(); recontarOpcoes();" class="text-red-500 hover:text-red-700 font-bold p-2" title="Remover">X</button>
        `;
        
        lista.appendChild(novaDiv);
    }

    function recontarOpcoes() {
        contadorOpcoes--;
        const spans = document.querySelectorAll('#lista-opcoes span');
        spans.forEach((span, index) => {
            span.textContent = (index + 1) + ".";
        });
    }
</script>