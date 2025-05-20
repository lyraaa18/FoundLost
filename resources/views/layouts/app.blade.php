<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Barang Hilang & Ditemukan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4e73df;
            --primary-dark: #2e59d9;
            --secondary-color: #858796;
            --success-color: #1cc88a;
            --info-color: #36b9cc;
            --warning-color: #f6c23e;
            --danger-color: #e74a3b;
            --light-color: #f8f9fc;
            --dark-color: #5a5c69;
        }
        
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fc;
        }
        
        /* Navbar Styling */
        .navbar {
            padding: 1rem 0;
            background: white !important;
            box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15) !important;
        }
        
        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color);
            font-size: 1.5rem;
        }
        
        .navbar-brand:hover {
            color: var(--primary-dark);
        }
        
        .nav-link {
            font-weight: 500;
            padding: 0.5rem 1rem;
            color: var(--secondary-color);
            border-radius: 0.35rem;
            margin: 0 0.25rem;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--primary-color);
            background-color: rgba(78, 115, 223, 0.1);
        }
        
        .nav-link.active {
            color: var(--primary-color);
            background-color: rgba(78, 115, 223, 0.1);
            font-weight: 600;
        }
        
        /* Content Styling */
        .content {
            flex: 1;
            padding: 2rem 0;
        }
        
        /* Card Styling */
        .card {
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.1);
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }
        
        .card:hover {
            box-shadow: 0 .5rem 2rem 0 rgba(58,59,69,.15);
        }
        
        .card-header {
            border-bottom: 1px solid #e3e6f0;
            background-color: var(--primary-color);
            color: white;
            border-top-left-radius: 0.5rem !important;
            border-top-right-radius: 0.5rem !important;
            padding: 1rem 1.5rem;
        }
        
        .card-header h4 {
            margin-bottom: 0;
            font-weight: 700;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        /* Button Styling */
        .btn {
            font-weight: 600;
            padding: 0.5rem 1.25rem;
            font-size: 0.85rem;
            border-radius: 0.35rem;
            transition: all 0.2s;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }
        
        .btn-secondary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .btn-success {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }
        
        .btn-danger {
            background-color: var(--danger-color);
            border-color: var(--danger-color);
        }
        
        /* Form Control Styling */
        .form-control, .input-group-text {
            border-radius: 0.35rem;
            border: 1px solid #d1d3e2;
            font-size: 0.9rem;
            padding: 0.75rem 1rem;
        }
        
        .form-control:focus {
            border-color: #bac8f3;
            box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark-color);
        }
        
        /* Footer Styling */
        .footer {
            background-color: white;
            padding: 1.5rem 0;
            border-top: 1px solid #e3e6f0;
        }
        
        .footer p {
            font-size: 0.85rem;
            color: var(--secondary-color);
        }
        
        /* Action Buttons */
        .action-buttons .btn {
            margin-left: 0.5rem;
            padding: 0.375rem 0.75rem;
        }
        
        /* Badge Styling */
        .badge {
            font-weight: 600;
            padding: 0.35rem 0.65rem;
            border-radius: 0.35rem;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .navbar {
                padding: 0.75rem 0;
            }
            
            .navbar-brand {
                font-size: 1.25rem;
            }
            
            .content {
                padding: 1rem 0;
            }
            
            .card-header {
                padding: 0.75rem 1rem;
            }
            
            .card-body {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar with improved styling -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <!-- <i class="fas fa-search me-2 text-primary"></i> -->
                <span>Lost Line</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="/">
                            <i class="fas fa-home me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('barang.hilang.*') ? 'active' : '' }}" href="{{ route('barang.hilang.index') }}">
                            <i class="fas fa-search-minus me-1"></i> Barang Hilang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('barang.ditemukan.*') ? 'active' : '' }}" href="{{ route('barang.ditemukan.index') }}">
                            <i class="fas fa-search-plus me-1"></i> Barang Ditemukan
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content area -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Footer with enhanced styling -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">&copy; {{ date('Y') }} Sistem Barang Hilang & Ditemukan. All rights reserved.</p>
                </div>
                <div class="col-md-6">
                    <ul class="list-inline mb-0 text-end">
                        <li class="list-inline-item">
                            <a href="#" class="text-secondary">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-secondary">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-secondary">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-secondary">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Additional JavaScript -->
    <script>
        // Enable tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
        
        // Enable popovers
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
</body>
</html>