<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-96 border border-gray-200">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-indigo-600">Disparos WPP</h1>
            <p class="text-gray-500 text-sm">Entre com suas credenciais</p>
        </div>

        <?php if(isset($_GET['erro'])): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm font-medium text-center">
                Usuário ou senha inválidos!
            </div>
        <?php endif; ?>

        <form action="/?action=auth" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Usuário</label>
                <input type="text" name="username" required class="w-full border rounded p-2 focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Senha</label>
                <input type="password" name="password" required class="w-full border rounded p-2 focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 rounded transition-colors">
                Entrar no Painel
            </button>
        </form>
    </div>
</body>
</html>