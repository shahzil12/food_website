<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Food Delivery</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        /* 1. Body & Background Setup */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            /* Same Food Background for consistency */
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                        url('https://images.unsplash.com/photo-1561758033-d89a9ad46330?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            min-height: 100vh; /* changed to min-height for scrolling if needed */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* 2. The Main Card */
        .register-card {
            background-color: white;
            width: 100%;
            max-width: 400px;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            text-align: center;
            margin: 20px; /* Add margin for small screens */
        }

        /* 3. Logo & Titles */
        .brand-logo {
            font-size: 28px;
            font-weight: bold;
            color: #ff4757;
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
            box-sizing: border-box;
            font-family: inherit;
        }

        input:focus {
            outline: none;
            border-color: #ff4757;
        }

        /* 5. Buttons */
        .btn-register {
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

        .btn-register:hover {
            background-color: #ff6b81;
        }

        /* 6. Footer Links */
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

    <div class="register-card">
        <div class="brand-logo">🍔 TastyBytes</div>
        
        <div>
            <h2>Join the Club</h2>
            <p>Create your account today</p>
        </div>
        
        <div>
            <form action="{{ url('/register-post') }}" method="POST">
                @csrf
                <div class="input-group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" placeholder="John Doe" required>
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="example@mail.com" required>
                </div>
                
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Create a strong password" required>
                </div>

                <div>
                    <button type="submit" class="btn-register">Register Now</button>
                </div>
            </form>

            <div class="footer-link">
                <p>Already have an account? <a href="{{ url('/login') }}">Login here</a></p>
            </div>
        </div>
    </div>

</body>
</html>