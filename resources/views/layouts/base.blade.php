<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'App')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        nav { background: #333; padding: 10px; }
        nav a { color: white; margin-right: 15px; text-decoration: none; }
        .container { padding: 20px; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('categories.index') }}">Categorias</a>
        <a href="{{ route('products.index') }}">Produtos</a>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
