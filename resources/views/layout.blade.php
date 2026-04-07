🧠 Ton layout corrigé (complet)
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Splash COLOR</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Accueil</a></li>
                <li><a href="{{ route('about') }}">À propos</a></li>
                <li><a href="{{ route('services') }}">Services</a></li>
                <li><a href="{{ route('portfolio.index') }}">Portfolio</a></li> <!-- ✅ FIX -->
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2026 Splash COLOR</p>
    </footer>
</body>
</html>
