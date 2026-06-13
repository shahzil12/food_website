<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Food Delivery</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        /* 1. Body & Background Setup */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            /* Food Background Image */
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                        url('https://images.unsplash.com/photo-1561758033-d89a9ad46330?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* 2. The Main Card */
        .login-card {
            background-color: white;
            width: 100%;
            max-width: 400px; /* Mobile friendly */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            text-align: center;
        }

        /* 3. Logo & Titles */
        .brand-logo {
            font-size: 28px;
            font-weight: bold;
            color: #ff4757; /* Fast Food Red */
            margin-bottom: 10px;
        }

        h2 {
            margin: 0;
            color: #333;
        }

        p {
            color: #666;
            margin-top: 5px;
            margin-bottom: 25px;
        }

        /* 4. Form Inputs */
        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 2px solid #eee;
            border-radius: 8px;
            box-sizing: border-box; /* Ensures padding doesn't break layout */
            font-family: inherit;
        }

        input:focus {
            outline: none;
            border-color: #ff4757; /* Red border on click */
        }

        /* 5. Buttons */
        .btn-login {
            width: 100%;
            padding: 12px;
            background-color: #ff4757;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 10px;
        }

        .btn-login:hover {
            background-color: #ff6b81; /* Lighter red on hover */
        }

        /* 6. Alerts (Success/Error) */
        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            font-size: 14px;
            text-align: left;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* 7. Footer Links */
        .footer-link {
            margin-top: 20px;
            font-size: 14px;
        }
        a {
            color: #ff4757;
            text-decoration: none;
            font-weight: 600;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="brand-logo">🍔 TastyBytes</div>
        
        <div>
            <h2>Welcome Back!</h2>
            <p>Login to satisfy your cravings</p>
        </div>
        
        <div>
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-error" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ url('/login-post') }}" method="POST">
                @csrf
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required>
                </div>
                
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required>
                </div>

                <div>
                    <button type="submit" class="btn-login">Login Now</button>
                </div>
            </form>

            <div class="footer-link">
                <p>No account yet? <a href="{{ url('/register') }}">Sign Up Here</a></p>
            </div>
        </div>
    </div>

</body>
</html>