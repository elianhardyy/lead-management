<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lead Management System</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                height: 100%;
                font-family: 'Nunito', sans-serif;
            }
            body {
                background: linear-gradient(to right, #6a11cb, #2575fc);
                color: #fff;
            }
            .content {
                min-height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
            }
            .card {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                border-radius: 10px;
                padding: 30px;
                color: #fff;
                box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
                border: 1px solid rgba(255, 255, 255, 0.18);
            }
            .btn-custom {
                background: #fff;
                color: #6a11cb;
                font-weight: bold;
                border: none;
                margin: 5px;
                transition: all 0.3s ease;
            }
            .btn-custom:hover {
                background: rgba(255, 255, 255, 0.8);
                transform: translateY(-3px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            }
        </style>
    </head>
    <body>
        <div class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <h1>Lead Management System</h1>
                            <p class="mt-4">Sistem untuk mengelola data leads penjualan properti dengan mudah dan efisien.</p>
                            
                            <div class="mt-5">
                                @if (Route::has('login'))
                                    <div>
                                        @auth
                                            <a href="{{ url('/home') }}" class="btn btn-custom btn-lg px-4">Dashboard</a>
                                        @else
                                            <a href="{{ route('login') }}" class="btn btn-custom btn-lg px-4">Login</a>

                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}" class="btn btn-custom btn-lg px-4">Register</a>
                                            @endif
                                        @endauth
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap JS Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>