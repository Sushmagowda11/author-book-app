<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Authors and Books Portal')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        body {
            background-color: #f5f7fa;
            font-family: 'Segoe UI', sans-serif;
        }
        .navbar {
            background-color: #4CAF50;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand,
        .navbar-nav .nav-link {
            color: #fff !important;
            font-weight: 500;
        }
        .navbar-nav .nav-link:hover {
            color: #ffd700 !important;
        }

        .page-header {
            background-color: #ffffff;
            padding: 20px 25px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }
        .page-header h1 {
            color: #333;
            font-size: 1.75rem;
            margin: 0;
        }

        .chatbot-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #4CAF50;
            color: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            z-index: 999;
            transition: background-color 0.3s ease;
        }

        .chatbot-icon:hover {
            background-color: #45a049;
        }

        .chatbot-icon a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Authors & Books</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('authors.index') }}">Authors</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('books.index') }}">Books</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="page-header">
            <h1>@yield('header', 'Welcome to the Authors and Books Portal')</h1>
        </div>
        @yield('content')
    </div>

    <!-- Chatbot Icon -->
    <div class="chatbot-icon">
        <a href="{{ url('/chatbot') }}" title="Chat with us">
            <i class="fas fa-comments"></i>
        </a>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @stack('scripts')
</body>
</html>
