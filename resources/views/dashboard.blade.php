<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TastyBytes - Order Food Online</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* 1. Global Reset */
        * { box-sizing: border-box; }
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #121212; /* Black Background */
            padding-top: 80px; 
            color: #f5f6fa; /* Light Text */
        }

        /* 2. Top Navigation Bar */
        .navbar {
            background-color: #1f1f1f; /* Dark Card Grey */
            height: 70px;
            width: 100%;
            position: fixed; /* Sticks to top */
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
        }

        .nav-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Logo */
        .brand-logo {
            font-size: 24px;
            font-weight: 700;
            color: #f1c40f; /* Yellow */
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        /* Right Side Controls */
        .nav-controls {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-greeting {
            color: #dfe6e9;
            font-size: 14px;
            display: none; /* Hidden on very small screens */
        }
        @media(min-width: 768px) { .user-greeting { display: block; } }

        /* Buttons Style */
        .btn-nav {
            background-color: #f1c40f;
            color: #2f3640; /* Dark text for contrast */
            text-decoration: none;
            padding: 8px 20px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 500;
            transition: 0.3s;
            display: flex;
            align-items: center;
            gap: 5px;
            border: 1px solid #f1c40f;
        }
        .btn-nav:hover { background-color: #f39c12; transform: translateY(-2px); }

        .btn-outline {
            background-color: transparent;
            border: 1px solid white;
            color: #f5f6fa;
        }
        .btn-outline:hover { background-color: #f1c40f; color: #2f3640; border-color: #f1c40f; }

        /* Logout Button */
        .btn-logout {
            background-color: transparent;
            border: 2px solid rgba(255,255,255,0.2);
            color: white;
            padding: 6px 15px;
            border-radius: 30px;
            cursor: pointer;
            font-size: 13px;
            font-family: inherit;
            transition: 0.3s;
        }
        .btn-logout:hover { border-color: #f1c40f; color: #f1c40f; }

        /* Navigation Links */
        .nav-links {
            display: none;
            gap: 25px;
            margin-right: 30px;
        }
        .nav-links a {
            color: #dcdde1;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            transition: 0.3s;
        }
        .nav-links a:hover {
            color: #f1c40f;
        }
        @media(min-width: 992px) { .nav-links { display: flex; } }

        /* 3. Hero Section */
        .hero {
            background: linear-gradient(135deg, #f1c40f 0%, #f39c12 100%);
            color: #2f3640; /* Dark Text */
            text-align: center;
            padding: 60px 20px;
            margin: 20px auto;
            max-width: 1200px;
            border-radius: 15px;
            width: 90%;
        }
        .hero h1 { margin: 0; font-size: 2.5rem; }
        .hero p { margin-top: 10px; opacity: 0.9; }

        /* 4. Menu Grid */
        .section-title {
            text-align: center;
            color: #f5f6fa;
            margin: 40px 0 20px;
            font-size: 2rem;
        }

        .menu-container {
            max-width: 1200px;
            margin: 0 auto 50px;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        /* Food Card */
        .food-card {
            background: #1f1f1f;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: 0.3s;
            position: relative;
        }
        .food-card:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(0,0,0,0.1); }

        .badge-popular {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: #f1c40f;
            color: #2f3640;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .food-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body { padding: 20px; }
        
        .food-title { margin: 0 0 10px; font-size: 18px; color: #f5f6fa; }
        
        .food-desc { 
            color: #dcdde1; 
            font-size: 13px; 
            margin-bottom: 15px; 
            height: 40px; 
            overflow: hidden; 
        }

        .food-price { font-size: 24px; font-weight: 700; color: #f1c40f; margin-bottom: 15px; }

        /* Add to Cart Form */
        .cart-form {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }
        
        .qty-input {
            width: 50px;
            padding: 8px;
            border: 2px solid #333;
            border-radius: 8px;
            text-align: center;
            background-color: #121212;
            color: #f5f6fa;
        }

        .btn-add {
            flex-grow: 1;
            background-color: #f1c40f;
            color: #2f3640;
            border: none;
            padding: 10px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.3s;
        }
        .btn-add:hover { background-color: #f39c12; }

    </style>
</head>
<body>

    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ url('/') }}" class="brand-logo">🍔 TastyBytes</a>
            
            <div style="display: flex; align-items: center;">
                <div class="nav-links">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ url('/categories') }}">Categories</a>
                    <a href="{{ url('/about') }}">About Us</a>
                    <a href="{{ url('/contact') }}">Contact Us</a>
                </div>

                <div class="nav-controls">
                
                @if(Route::has('login'))
                    @auth
                        <span class="user-greeting">
                            Hi, <strong>{{ Auth::user()->name }}</strong>
                        </span>
                        
                        <a href="{{ url('/show_cart') }}" class="btn-nav">
                            🛒 Cart
                        </a>

                        <form action="{{ url('/logout') }}" method="POST" style="margin: 0;">
                            @csrf
                            <button type="submit" class="btn-logout">
                                Logout
                            </button>
                        </form>

                    @else
                        <a href="{{ route('login') }}" class="btn-nav btn-outline">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-nav">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif

            </div>
            </div>
        </div>
    </nav>
    <div>
        <div class="hero">
            <h1>Delicious Food, Delivered Fast</h1>
            <p>Order from our menu and enjoy fresh meals at your doorstep</p>
        </div>

        @if(session('success'))
            <div style="background:#d4edda; color:#155724; padding:15px; text-align:center; margin:10px auto; max-width: 600px; border-radius: 8px;">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="section-title">Our Menu</h2>
        
        <div class="menu-container">
            @foreach($data as $food)
            <div class="food-card">
                <span class="badge-popular">Popular</span>
                <img src="{{ asset('foodimage/' . $food->image) }}" class="food-img" alt="{{ $food->title }}">
                
                <div class="card-body">
                    <h3 class="food-title">{{ $food->title }}</h3>
                    <p class="food-desc">{{ $food->description }}</p>
                    <div class="food-price">${{ $food->price }}</div>

                    <form action="{{ url('add_cart') }}" method="POST" class="cart-form">
                        @csrf
                        
                        <input type="hidden" name="id" value="{{ $food->id }}">

                        <div style="display:flex; align-items:center; gap:5px;">
                            <span style="font-size:12px; font-weight:600; color:#dcdde1;">Qty:</span>
                            <input type="number" name="quantity" value="1" min="1" class="qty-input">
                        </div>
                        
                        <button type="submit" class="btn-add">
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Expanded Footer -->
    <style>
        .footer {
            background-color: #1a1a1a;
            color: #a4b0be;
            padding: 60px 0 20px;
            margin-top: 80px;
            border-top: 1px solid #333;
            font-size: 14px;
        }
        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
        }
        .footer-col h3 {
            color: #f1c40f;
            font-size: 18px;
            margin-top: 0;
            margin-bottom: 20px;
        }
        .footer-col p {
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .footer-brand {
            font-size: 24px;
            font-weight: 700;
            color: #f1c40f;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 15px;
        }
        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .footer-links li {
            margin-bottom: 10px;
        }
        .footer-links a {
            color: #dcdde1;
            text-decoration: none;
            transition: 0.3s;
            display: inline-block;
        }
        .footer-links a:hover {
            color: #f1c40f;
            transform: translateX(5px);
        }
        .social-icons {
            display: flex;
            gap: 15px;
        }
        .social-btn {
            width: 35px;
            height: 35px;
            background: #2f3640;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #f1c40f;
            text-decoration: none;
            transition: 0.3s;
        }
        .social-btn:hover {
            background: #f1c40f;
            color: #2f3640;
        }
        .copyright {
            text-align: center;
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid #333;
            color: #747d8c;
        }
    </style>
    <footer class="footer">
        <div class="footer-container">
            <!-- Brand Column -->
            <div class="footer-col">
                <a href="{{ url('/') }}" class="footer-brand">🍔 TastyBytes</a>
                <p>Taste the difference with our premium ingredients and lightning-fast delivery. Quality food, right at your doorstep.</p>
                <div class="social-icons">
                    <a href="#" class="social-btn">F</a>
                    <a href="#" class="social-btn">T</a>
                    <a href="#" class="social-btn">I</a>
                </div>
            </div>

            <!-- Links Column -->
            <div class="footer-col">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/categories') }}">Browse Menu</a></li>
                    <li><a href="{{ url('/about') }}">Our Story</a></li>
                    <li><a href="{{ url('/contact') }}">Get in Touch</a></li>
                </ul>
            </div>

            <!-- Contact Column -->
            <div class="footer-col">
                <h3>Contact Us</h3>
                <ul class="footer-links">
                    <li>📍 123 Food Street, Tasty City</li>
                    <li>📞 +1 234 567 890</li>
                    <li>✉️ hello@tastybytes.com</li>
                    <li>🕒 Mon - Sun: 10am - 11pm</li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            &copy; 2025 TastyBytes. All rights reserved.
        </div>
    </footer>

</body>
</html>