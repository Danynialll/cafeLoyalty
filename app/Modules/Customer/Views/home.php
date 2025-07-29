<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RewardZone - Loyalty App</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
            overflow-x: hidden;
        }

        .container {
            max-width: 414px;
            margin: 0 auto;
            background: white;
            min-height: 100vh;
            position: relative;
        }

        /* Tablet/Desktop Layout */
        @media (min-width: 768px) {
            .container {
                max-width: 100%;
                display: grid;
                grid-template-columns: 1fr 2fr;
                grid-template-rows: auto 1fr;
                height: 100vh;
                margin: 0;
            }
            
            .header {
                grid-column: 1;
                grid-row: 1 / -1;
                padding: 40px 30px;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                min-height: 100vh;
            }
            
            .points-card {
                margin-top: 40px;
                margin-bottom: auto;
            }
            
            .content {
                grid-column: 2;
                grid-row: 1 / -1;
                padding: 40px 30px;
                background: #f8fafc;
                overflow-y: auto;
            }
            
            .deals-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 20px;
            }
            
            .nav-bottom {
                display: none;
            }
            
            .floating-btn {
                display: none;
            }
            
            .welcome h1 {
                font-size: 32px;
            }
            
            .points-value {
                font-size: 48px;
            }
            
            .section-title {
                font-size: 28px;
                margin-bottom: 30px;
            }
        }

        /* Large Desktop Layout */
        @media (min-width: 1200px) {
            .deals-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .header {
                padding: 60px 40px;
            }
            
            .content {
                padding: 60px 40px;
            }
            
            .points-card {
                padding: 35px;
            }
            
            .deal-card {
                max-width: 400px;
            }
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 50px 20px 30px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        /* Mobile-specific header adjustments */
        @media (max-width: 767px) {
            .header {
                padding-top: 50px;
            }
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .header::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            animation: float 8s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .welcome {
            position: relative;
            z-index: 2;
            margin-bottom: 20px;
        }

        .welcome h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
            animation: slideInLeft 0.8s ease-out;
        }

        .welcome p {
            font-size: 16px;
            opacity: 0.9;
            animation: slideInLeft 0.8s ease-out 0.2s both;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .points-card {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 25px;
            position: relative;
            z-index: 2;
            border: 1px solid rgba(255, 255, 255, 0.3);
            animation: slideInUp 0.8s ease-out 0.4s both;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .points-display {
            text-align: center;
            margin-bottom: 15px;
        }

        .points-label {
            font-size: 14px;
            opacity: 0.8;
            margin-bottom: 5px;
        }

        .points-value {
            font-size: 36px;
            font-weight: 800;
            color: #FFD700;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .points-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .btn-primary {
            background: white;
            color: #667eea;
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        .content {
            padding: 30px 20px;
        }

        /* Mobile-specific content padding */
        @media (max-width: 767px) {
            .content {
                padding-bottom: 100px; /* Account for bottom navigation */
            }
        }

        .section-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #2d3748;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .fire-icon {
            font-size: 28px;
            animation: flicker 1.5s ease-in-out infinite alternate;
        }

        @keyframes flicker {
            0% { transform: scale(1) rotate(-2deg); }
            100% { transform: scale(1.1) rotate(2deg); }
        }

        .deals-grid {
            display: grid;
            gap: 15px;
        }

        .deal-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            border: 1px solid #f0f0f0;
            animation: fadeInUp 0.6s ease-out;
        }

        .deal-card:nth-child(2) { animation-delay: 0.1s; }
        .deal-card:nth-child(3) { animation-delay: 0.2s; }
        .deal-card:nth-child(4) { animation-delay: 0.3s; }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .deal-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .deal-header {
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            color: white;
            padding: 15px;
            position: relative;
            overflow: hidden;
        }

        .deal-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20px;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .deal-discount {
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 2px;
        }

        .deal-subtitle {
            font-size: 12px;
            opacity: 0.9;
        }

        .deal-body {
            padding: 20px 15px;
        }

        .deal-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #2d3748;
        }

        .deal-description {
            font-size: 14px;
            color: #718096;
            margin-bottom: 15px;
            line-height: 1.4;
        }

        .deal-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .deal-points {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
        }

        .deal-timer {
            font-size: 12px;
            color: #e53e3e;
            font-weight: 600;
        }

        .nav-bottom {
            position: fixed;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            max-width: 414px;
            background: white;
            border-top: 1px solid #e2e8f0;
            padding: 15px 20px 25px;
            display: flex;
            justify-content: space-around;
        }

        /* Hide bottom navigation on tablet/desktop */
        @media (min-width: 768px) {
            .nav-bottom {
                display: none;
            }
        }

        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            color: #a0aec0;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .nav-item.active {
            color: #667eea;
        }

        .nav-item:hover {
            color: #667eea;
            transform: translateY(-2px);
        }

        .nav-icon {
            font-size: 20px;
        }

        .nav-label {
            font-size: 11px;
            font-weight: 500;
        }

        .floating-btn {
            position: fixed;
            bottom: 100px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            box-shadow: 0 4px 20px rgba(238, 90, 36, 0.4);
            cursor: pointer;
            transition: all 0.3s ease;
            animation: bounce 2s infinite;
        }

        /* Only show floating button on mobile */
        @media (min-width: 768px) {
            .floating-btn {
                display: none;
            }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        .floating-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 25px rgba(238, 90, 36, 0.6);
        }

        .deal-card.featured {
            background: linear-gradient(135deg, #ffeaa7, #fdcb6e);
            border: 2px solid #fdcb6e;
        }

        .deal-card.featured .deal-body {
            color: #2d3748;
        }

        .deal-card.featured .deal-header {
            background: linear-gradient(135deg, #e17055, #d63031);
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Desktop Navigation -->
        <div class="desktop-nav">
            <div class="desktop-nav-item active">Home</div>
            <div class="desktop-nav-item">Rewards</div>
            <div class="desktop-nav-item">Stores</div>
            <div class="desktop-nav-item">Profile</div>
        </div>

        <div class="header">
            <div class="welcome">
                <h1>Welcome back, Alex! 👋</h1>
                <p>Ready to unlock amazing rewards?</p>
            </div>
            
            <div class="points-card">
                <div class="points-display">
                    <div class="points-label">Your Reward Points</div>
                    <div class="points-value" id="pointsValue">2,847</div>
                </div>
                <div class="points-actions">
                    <button class="btn btn-primary" onclick="earnPoints()">Earn More</button>
                    <button class="btn btn-secondary" onclick="viewHistory()">History</button>
                </div>
            </div>
            
            <!-- Additional sidebar actions for desktop -->
            <div class="sidebar-actions">
                <button class="sidebar-btn sidebar-btn-primary" onclick="scanQR()">📱 Scan QR Code</button>
                <button class="sidebar-btn sidebar-btn-secondary" onclick="findStores()">🏪 Find Stores</button>
                <button class="sidebar-btn sidebar-btn-secondary" onclick="referFriend()">👥 Refer Friends</button>
            </div>
        </div>

        <div class="content">
            <h2 class="section-title">
                <span class="fire-icon">🔥</span>
                Hot Deals
            </h2>
            
            <div class="deals-grid">
                <div class="deal-card featured">
                    <div class="deal-header">
                        <div class="deal-discount">50% OFF</div>
                        <div class="deal-subtitle">Limited Time</div>
                    </div>
                    <div class="deal-body">
                        <div class="deal-title">Premium Coffee Bundle</div>
                        <div class="deal-description">Get your favorite blend with exclusive premium beans from around the world.</div>
                        <div class="deal-footer">
                            <div class="deal-points">500 pts</div>
                            <div class="deal-timer">⏰ 2h 15m left</div>
                        </div>
                    </div>
                </div>

                <div class="deal-card">
                    <div class="deal-header">
                        <div class="deal-discount">30% OFF</div>
                        <div class="deal-subtitle">Popular</div>
                    </div>
                    <div class="deal-body">
                        <div class="deal-title">Wireless Headphones</div>
                        <div class="deal-description">High-quality sound with noise cancellation technology.</div>
                        <div class="deal-footer">
                            <div class="deal-points">800 pts</div>
                            <div class="deal-timer">⏰ 5h 30m left</div>
                        </div>
                    </div>
                </div>

                <div class="deal-card">
                    <div class="deal-header">
                        <div class="deal-discount">Free Gift</div>
                        <div class="deal-subtitle">New Member</div>
                    </div>
                    <div class="deal-body">
                        <div class="deal-title">Welcome Package</div>
                        <div class="deal-description">Starter kit with branded merchandise and discount vouchers.</div>
                        <div class="deal-footer">
                            <div class="deal-points">200 pts</div>
                            <div class="deal-timer">⏰ Always Available</div>
                        </div>
                    </div>
                </div>

                <div class="deal-card">
                    <div class="deal-header">
                        <div class="deal-discount">25% OFF</div>
                        <div class="deal-subtitle">Trending</div>
                    </div>
                    <div class="deal-body">
                        <div class="deal-title">Fitness Tracker</div>
                        <div class="deal-description">Monitor your health with advanced tracking features.</div>
                        <div class="deal-footer">
                            <div class="deal-points">650 pts</div>
                            <div class="deal-timer">⏰ 1 day left</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="floating-btn" onclick="scanQR()" title="Scan QR Code">
            📱
        </div>

        <div class="nav-bottom">
            <div class="nav-item active">
                <div class="nav-icon">🏠</div>
                <div class="nav-label">Home</div>
            </div>
            <div class="nav-item">
                <div class="nav-icon">🎁</div>
                <div class="nav-label">Rewards</div>
            </div>
            <div class="nav-item">
                <div class="nav-icon">🏪</div>
                <div class="nav-label">Stores</div>
            </div>
            <div class="nav-item">
                <div class="nav-icon">👤</div>
                <div class="nav-label">Profile</div>
            </div>
        </div>
    </div>

    <script>
        // Animate points counter on load
        function animatePoints() {
            const pointsElement = document.getElementById('pointsValue');
            const finalValue = 2847;
            let currentValue = 0;
            const increment = finalValue / 50;
            
            const counter = setInterval(() => {
                currentValue += increment;
                if (currentValue >= finalValue) {
                    currentValue = finalValue;
                    clearInterval(counter);
                }
                pointsElement.textContent = Math.floor(currentValue).toLocaleString();
            }, 30);
        }

        // Button interactions
        function earnPoints() {
            alert('🎉 Great! Check out our partner stores to earn more points!');
        }

        function viewHistory() {
            alert('📊 Your points history will be displayed here!');
        }

        function scanQR() {
            alert('📱 QR Scanner activated! Point your camera at a QR code to earn points.');
        }

        function findStores() {
            alert('🏪 Finding partner stores near you!');
        }

        function referFriend() {
            alert('👥 Share your referral link with friends to earn bonus points!');
        }

        // Desktop navigation interactions
        document.querySelectorAll('.desktop-nav-item').forEach(item => {
            item.addEventListener('click', function() {
                document.querySelectorAll('.desktop-nav-item').forEach(nav => nav.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Navigation interactions
        document.querySelectorAll('.nav-item').forEach(item => {
            item.addEventListener('click', function() {
                document.querySelectorAll('.nav-item').forEach(nav => nav.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Deal card interactions
        document.querySelectorAll('.deal-card').forEach(card => {
            card.addEventListener('click', function() {
                const title = this.querySelector('.deal-title').textContent;
                alert(`🛍️ Redeeming: ${title}\n\nThis would normally open the redemption flow!`);
            });
        });

        // Initialize animations
        window.addEventListener('load', () => {
            setTimeout(animatePoints, 500);
        });

        // Add some interactive effects
        document.querySelectorAll('.deal-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    </script>
</body>
</html>