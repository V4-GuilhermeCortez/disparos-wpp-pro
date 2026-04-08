<script>
        // Modal de Criação (EXISTENTE)
        function abrirModalCriacao() { document.getElementById('modalNovaCampanha').classList.remove('hidden'); }
        function fecharModalCriacao() { document.getElementById('modalNovaCampanha').classList.add('hidden'); }

        // NOVO: Modal de EDIÇÃO (Injeta os dados existentes no form)
        function abrirModalEdicao(event, campanhaJson) {
            event.stopPropagation(); // Impede de abrir o pop-up de detalhes
            const campanha = JSON.parse(decodeURIComponent(campanhaJson));

            // Preenche os inputs com o que já tem salvo
            document.getElementById('edit_id').value = campanha.id;
            document.getElementById('edit_nome_campanha').value = campanha.nome_campanha;
            document.getElementById('edit_nome').value = campanha.nome;
            document.getElementById('edit_quantidade').value = campanha.quantidade;
            document.getElementById('edit_valor').value = campanha.valor;
            document.getElementById('edit_descricao').value = campanha.descricao;

            document.getElementById('modalEdicaoCampanha').classList.remove('hidden');
        }
        function fecharModalEdicao() { document.getElementById('modalEdicaoCampanha').classList.add('hidden'); }

        // Modal de Detalhes (EXISTENTE - AGORA COM ESTOQUE!)
        function abrirModalDetalhes(campanhaJson) {
            const campanha = JSON.parse(decodeURIComponent(campanhaJson));
            document.getElementById('detalheCampanha').textContent = campanha.nome_campanha || 'Sem Campanha';
            document.getElementById('detalheNome').textContent = campanha.nome;
            document.getElementById('detalheDescricao').textContent = campanha.descricao;
            document.getElementById('detalheValor').textContent = 'R$ ' + parseFloat(campanha.valor).toLocaleString('pt-BR', {minimumFractionDigits: 2});
            
            // 👇 A LINHA QUE FALTAVA PARA O ESTOQUE APARECER 👇
            document.getElementById('detalheEstoque').textContent = campanha.quantidade;

            const imgEl = document.getElementById('detalheFoto');
            if (campanha.foto) { imgEl.src = campanha.foto; imgEl.classList.remove('hidden'); } else { imgEl.classList.add('hidden'); }
            document.getElementById('modalDetalhesCampanha').classList.remove('hidden');
        }
        function fecharModalDetalhes() { document.getElementById('modalDetalhesCampanha').classList.add('hidden'); }

        // Ações (EXISTENTES)
        function confirmarExclusao(event, id) {
            event.stopPropagation();
            if (confirm('Tem certeza que deseja excluir esta campanha?')) window.location.href = '?action=delete&id=' + id;
        }
        function confirmarReenvio(event, id) {
            event.stopPropagation();
            if (confirm('Deseja reenviar esta campanha para o WhatsApp?')) window.location.href = '?action=resend&id=' + id;
        }
    </script>
</body>
</html>