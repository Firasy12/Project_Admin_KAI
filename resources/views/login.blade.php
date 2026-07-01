<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Magang KAI</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #0055A4 0%, #003d7a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-wrapper {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            overflow: hidden;
        }

        .login-header {
            background: #0055A4;
            color: white;
            padding: 30px 24px;
            text-align: center;
        }

        .login-header img {
            max-height: 80px;
            margin-bottom: 12px;
        }

        .login-header h3 {
            font-weight: 600;
            margin: 0;
            font-size: 20px;
        }

        .login-header p {
            margin: 8px 0 0;
            opacity: 0.9;
            font-size: 14px;
        }

        .login-body {
            padding: 32px 24px 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s;
            background: #fafafa;
        }

        .form-control:focus {
            outline: none;
            border-color: #0055A4;
            background: white;
            box-shadow: 0 0 0 3px rgba(0,85,164,0.1);
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            background: #0055A4;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-login:hover {
            background: #003d7a;
        }

        .alert-custom {
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
            border-left: 4px solid;
        }

        .alert-error {
            background: #ffebee;
            border-left-color: #dc3545;
            color: #c62828;
        }

        .brand-text {
            font-size: 12px;
            text-align: center;
            margin-top: 24px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-header">
                <img src="{{ asset('images/logo-kai.png') }}" alt="Logo KAI">
                <h3>E-Magang</h3>
                <p>PT Kereta Api Indonesia</p>
            </div>
            <div class="login-body">
                @if(session('error'))
                    <div class="alert-custom alert-error">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="nama@example.com" required autofocus>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    </div>
                    <button type="submit" class="btn-login">Masuk</button>
                </form>

                <div class="brand-text">
                    &copy; 2026 E-Magang KAI
                </div>
            </div>
        </div>
    </div>
</body>
</html>