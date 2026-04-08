<?php include BASE_PATH . '/app/Views/components/header.php'; ?>
<?php include BASE_PATH . '/app/Views/components/navbar.php'; ?>

<div class="container mx-auto mt-10 p-4 max-w-4xl">
    
    <?php if(isset($sucesso) && $sucesso): ?>
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm flex justify-between items-center" role="alert">
        <div>
            <p class="font-bold">Enviado com Sucesso!</p>
            <p>A sua enquete foi encaminhada para o n8n.</p>
        </div>
        <a href="/?action=poll" class="text-green-700 font-bold hover:text-green-900">&times; Fechar</a>
    </div>
    <?php endif; ?>

    <?php include BASE_PATH . '/app/Views/home/partials/poll_form.php'; ?>

    <?php include BASE_PATH . '/app/Views/home/partials/poll_results.php'; ?>

</div>

<?php include BASE_PATH . '/app/Views/home/partials/poll_scripts.php'; ?>

<?php include BASE_PATH . '/app/Views/components/footer.php'; ?>