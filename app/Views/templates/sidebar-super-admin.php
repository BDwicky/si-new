<style>
          /* Sidebar */
        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, #1e2a3a 0%, #0f1419 100%);
            padding: 20px;
            border-right: 1px solid #2d3748;
            box-shadow: 2px 0 10px rgba(0,0,0,0.3);
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px 0;
            border-bottom: 1px solid #2d3748;
        }

        .logo h1 {
            color: #4299e1;
            font-size: 24px;
            font-weight: 700;
        }

        .nav-item {
            margin-bottom: 8px;
            padding: 12px 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-item:hover {
            background: rgba(66, 153, 225, 0.1);
            transform: translateX(5px);
        }

        .nav-item.active {
            background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
            box-shadow: 0 4px 15px rgba(66, 153, 225, 0.3);
        }

        .nav-icon {
            width: 20px;
            height: 20px;
            background: #4299e1;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 20px;
        }

        /* Header */
        .header {
            background: rgba(30, 42, 58, 0.8);
            backdrop-filter: blur(10px);
            padding: 20px 30px;
            border-radius: 12px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }

        .header h2 {
            color: #4299e1;
            font-size: 28px;
            font-weight: 600;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: linear-gradient(135deg, #1e2a3a 0%, #2d3748 100%);
            padding: 25px;
            border-radius: 12px;
            border: 1px solid #2d3748;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #4299e1, #3182ce);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(66, 153, 225, 0.2);
        }

        .stat-value {
            font-size: 32px;
            font-weight: 700;
            color: #4299e1;
            margin-bottom: 8px;
        }

        .stat-label {
            color: #a0aec0;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .stat-change {
            font-size: 12px;
            color: #68d391;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: static;
                height: auto;
            }   
        }

        .sidebar .nav-item .a{  
            text-decoration: none;
        }

</style>
<div class="sidebar">
            <div class="logo">
                <h1>Admin Panel</h1>
            </div>
            <nav>
            <a href="<?= base_url('dashboard/super-admin/') ?>">
                <div class="nav-item">
                    <div class="nav-icon">📊</div>
                    <span>Dashboard</span>
                </div>
                </a>
                <a href="<?= base_url('dashboard/super-admin/ukm') ?>">
                <div class="nav-item">
                    <div class="nav-icon">📦</div>
                    <span>UKM</span>
                </div>
                </a>
                <a href="<?= base_url('dashboard/super-admin/ukm') ?>">
                <div class="nav-item">
                    <div class="nav-icon">📦</div>
                    <span>Admin Ukm</span>
                </div>
                </a>
            </nav>
        </div>

        <script>
            document.querySelectorAll('.nav-item').forEach(item => {
            item.addEventListener('click', function() {
                document.querySelectorAll('.nav-item').forEach(nav => nav.classList.remove('active'));
                this.classList.add('active');
            });
        });
        </script>