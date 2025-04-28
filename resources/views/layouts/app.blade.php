<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Study Center</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        #sidebar {
            background-color: #ffffff;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            padding: 30px;
            width: 300px;
        }
        .nav-link {
            color: #333;
            padding: 12px 20px;
            transition: all 0.3s ease;
            font-weight: 500;
            border-radius: 5px;
            margin-bottom: 5px;
        }
        .nav-link:hover {
            background-color: #e9ecef;
            color: #198754;
            transform: translateX(5px);
        }
        .main-content {
            margin-left: 300px;
            padding: 40px;
        }
        @media (max-width: 768px) {
            #sidebar {
                position: static;
                min-height: auto;
                width: 100%;
            }
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
        }
        .border-success {
            border-color: #198754 !important;
        }
        .bg-success {
            background-color: #198754 !important;
        }
        .btn-success {
            background-color: #198754;
            border-color: #198754;
        }
        .btn-success:hover {
            background-color: #146c43;
            border-color: #146c43;
        }
        section {
            margin-bottom: 50px;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
        }
        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            max-width: 100%;
            margin-bottom: 30px;
        }
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        h3, h4, h5, h6 {
            color: #333;
            margin-bottom: 20px;
        }
        .testimony-item {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }
        .testimony-item:hover {
            transform: translateY(-5px);
        }
        .form-control {
            border-radius: 5px;
            padding: 12px;
        }
        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.25);
        }
    </style>
</head>
<body>
    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
