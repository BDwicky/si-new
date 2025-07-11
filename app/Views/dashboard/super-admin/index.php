<head>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0f1419 0%, #1a2332 100%);
            color: #ffffff;
            overflow-x: hidden;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* Charts Section */
        .charts-section {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .chart-container {
            background: linear-gradient(135deg, #1e2a3a 0%, #2d3748 100%);
            padding: 25px;
            border-radius: 12px;
            border: 1px solid #2d3748;
        }

        .chart-title {
            color: #4299e1;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .chart-placeholder {
            height: 200px;
            background: linear-gradient(135deg, #0f1419 0%, #1a2332 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #a0aec0;
            border: 1px dashed #2d3748;
        }

        /* Recent Activity */
        .recent-activity {
            background: linear-gradient(135deg, #1e2a3a 0%, #2d3748 100%);
            padding: 25px;
            border-radius: 12px;
            border: 1px solid #2d3748;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #2d3748;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }

        .activity-content {
            flex: 1;
        }

        .activity-text {
            color: #e2e8f0;
            font-size: 14px;
            margin-bottom: 4px;
        }

        .activity-time {
            color: #a0aec0;
            font-size: 12px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: static;
                height: auto;
            }

            .main-content {
                margin-left: 0;
            }

            .container {
                flex-direction: column;
            }

            .charts-section {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Animations */
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

        .stat-card, .chart-container, .recent-activity {
            animation: fadeInUp 0.6s ease forwards;
        }

        .stat-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-card:nth-child(2) { animation-delay: 0.2s; }
        .stat-card:nth-child(3) { animation-delay: 0.3s; }
        .stat-card:nth-child(4) { animation-delay: 0.4s; }
    </style>
</head>

    <div class="container">
        <!-- Sidebar -->

        <?= $this->include('templates/sidebar-super-admin') ?>   

        <!-- Main Content -->
        <div class="main-content">
           
          <?=  $this->include('templates/dashboard-nav'); ?>

          <!-- UBAH CODE DIBAWAH INI ATAS BIARIN -->

            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-value">2,847</div>
                    <div class="stat-label">Total Pengguna</div>
                    <div class="stat-change">+12% dari bulan lalu</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">1,234</div>
                    <div class="stat-label">Pesanan Hari Ini</div>
                    <div class="stat-change">+5% dari kemarin</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">Rp 45.8M</div>
                    <div class="stat-label">Pendapatan Bulan Ini</div>
                    <div class="stat-change">+18% dari bulan lalu</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">98.5%</div>
                    <div class="stat-label">Tingkat Kepuasan</div>
                    <div class="stat-change">+0.5% dari bulan lalu</div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="charts-section">
                <div class="chart-container">
                    <h3 class="chart-title">Grafik Penjualan</h3>
                    <div class="chart-placeholder">
                        📊 Grafik Penjualan 7 Hari Terakhir
                    </div>
                </div>
                <div class="chart-container">
                    <h3 class="chart-title">Kategori Produk</h3>
                    <div class="chart-placeholder">
                        🥧 Distribusi Kategori Produk
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="recent-activity">
                <h3 class="chart-title">Aktivitas Terbaru</h3>
                <div class="activity-item">
                    <div class="activity-icon">👤</div>
                    <div class="activity-content">
                        <div class="activity-text">Pengguna baru mendaftar: Ahmad Rizki</div>
                        <div class="activity-time">2 menit yang lalu</div>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon">🛒</div>
                    <div class="activity-content">
                        <div class="activity-text">Pesanan baru #ORD-2024-001 telah dibuat</div>
                        <div class="activity-time">5 menit yang lalu</div>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon">💰</div>
                    <div class="activity-content">
                        <div class="activity-text">Pembayaran Rp 350.000 telah dikonfirmasi</div>
                        <div class="activity-time">12 menit yang lalu</div>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon">📦</div>
                    <div class="activity-content">
                        <div class="activity-text">Produk "Laptop Gaming" telah diperbarui</div>
                        <div class="activity-time">1 jam yang lalu</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Animate numbers on load
        function animateNumbers() {
            const numbers = document.querySelectorAll('.stat-value');
            numbers.forEach(number => {
                const finalValue = number.textContent;
                const numericValue = parseInt(finalValue.replace(/[^0-9]/g, ''));
                
                if (!isNaN(numericValue)) {
                    let currentValue = 0;
                    const increment = numericValue / 50;
                    const timer = setInterval(() => {
                        currentValue += increment;
                        if (currentValue >= numericValue) {
                            currentValue = numericValue;
                            clearInterval(timer);
                        }
                        
                        if (finalValue.includes('Rp')) {
                            number.textContent = 'Rp ' + Math.floor(currentValue).toLocaleString('id-ID') + 'M';
                        } else if (finalValue.includes('%')) {
                            number.textContent = currentValue.toFixed(1) + '%';
                        } else {
                            number.textContent = Math.floor(currentValue).toLocaleString('id-ID');
                        }
                    }, 50);
                }
            });
        }

        // Start animation when page loads
        window.addEventListener('load', animateNumbers);

        // Add hover effects to stat cards
        document.querySelectorAll('.stat-card').forEach(card => {
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