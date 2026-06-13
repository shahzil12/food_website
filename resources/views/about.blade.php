<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - TastyBytes</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* Shared Styles from Dashboard */
        * { box-sizing: border-box; }
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #121212; /* Black */
            padding-top: 80px; 
            color: #f5f6fa; /* Light Text */
        }

        /* Navbar */
        .navbar {
            background-color: #1f1f1f;
            height: 70px;
            width: 100%;
            position: fixed;
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
        .brand-logo {
            font-size: 24px;
            font-weight: 700;
            color: #f1c40f; /* Yellow */
            text-decoration: none;
            display: flex;
            align-items: center;
        }
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
        .nav-links a:hover { color: #f1c40f; }
        @media(min-width: 992px) { .nav-links { display: flex; } }

        .nav-controls {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .btn-nav {
            background-color: #f1c40f;
            color: #2f3640;
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
            border: 1px solid #f1c40f;
            color: #f5f6fa;
        }
        .btn-outline:hover { background-color: #f1c40f; color: #2f3640; }

        /* About Page Specifics */
        .about-section {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .about-header {
            text-align: center;
            margin-bottom: 50px;
        }
        .about-header h1 {
            font-size: 3rem;
            color: #f1c40f;
            margin-bottom: 10px;
        }
        .about-header p {
            color: #dcdde1;
            font-size: 1.1rem;
        }
        .content-card {
            background: #1f1f1f;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            margin-bottom: 40px;
            border: 1px solid #333;
        }
        @media(min-width: 768px) {
            .content-card { flex-direction: row; }
            .content-img { width: 50%; min-height: 400px; }
            .content-text { width: 50%; padding: 60px; display: flex; flex-direction: column; justify-content: center; }
        }
        .content-img {
            background-color: #f1c40f;
            background-image: url("{{ asset('banner.jpg') }}");
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-position: center;
            min-height: 250px;
        }
        .content-text { padding: 30px; }
        .content-text h2 { margin-top: 0; color: #f1c40f; font-size: 2rem; }
        .content-text p { line-height: 1.8; color: #dcdde1; margin-bottom: 20px; }
        
        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }
        .value-card {
            background: #1f1f1f;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: 0.3s;
            border: 1px solid #333;
        }
        .value-card:hover { transform: translateY(-10px); border-color: #f1c40f; }
        .value-icon { font-size: 40px; margin-bottom: 20px; color: #f1c40f; }
        .value-title { font-weight: 600; font-size: 1.2rem; margin-bottom: 15px; color: #f5f6fa; }
        .value-desc { color: #dcdde1; font-size: 0.9rem; line-height: 1.6; }

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
                @auth
                    <a href="{{ url('/show_cart') }}" class="btn-nav">🛒 Cart</a>
                @else
                    <a href="{{ route('login') }}" class="btn-nav btn-outline">Log in</a>
                @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="about-section">
        <div class="about-header">
            <h1>Our Story</h1>
            <p>Passionate about serving the world's best comfort food.</p>
        </div>

        <div class="content-card">
            <div class="content-img"></div>
            <div class="content-text">
                <h2>We Started in 2026</h2>
                <p>Founded by Mohsin Khan and Fassih Shah. TastyBytes began with a simple mission: to deliver hot, fresh, and delicious meals to food lovers everywhere without the wait. What started as a small kitchen has now grown into a favorite among foodies.</p>
                <p>Our chefs use only the freshest ingredients, ensuring that every bite is an explosion of flavor. We believe food is not just fuel, but an experience to be savored.</p>
            </div>
        </div>

        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">🚀</div>
                <div class="value-title">Fast Delivery</div>
                <div class="value-desc">We respect your time. Our fleet ensures your food arrives hot and on time, every time.</div>
            </div>
            <div class="value-card">
                <div class="value-icon">🥗</div>
                <div class="value-title">Fresh Ingredients</div>
                <div class="value-desc">No frozen nasties here. We source local, fresh produce to create our masterpieces.</div>
            </div>
            <div class="value-card">
                <div class="value-icon">❤️</div>
                <div class="value-title">Made with Love</div>
                <div class="value-desc">Every dish is prepared with passion and care by our expert culinary team.</div>
            </div>
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
