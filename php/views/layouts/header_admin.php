<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>Туристическое агентство ARTour</title>
        <meta charset="utf-8">
        <link rel="icon" href="../img/favicon/favicon.png" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content-type: "image/png">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

        <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css" type=“text/css”>
        <link rel="stylesheet" href="../css/animate.css">
    
        <link rel="stylesheet" href="../css/owl.carousel.min.css">
        <link rel="stylesheet" href="../css/owl.theme.default.min.css">
        <link rel="stylesheet" href="../css/magnific-popup.css">

        <link rel="stylesheet" href="../css/aos.css">

        <link rel="stylesheet" href="../css/ionicons.min.css">

        <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="../css/jquery.timepicker.css">
    
        <script src="../../../js/jquery-3.2.1.min.js"></script>

        <link rel="stylesheet" href="../css/flaticon.css">
        <link rel="stylesheet" href="../css/icomoon.css">
        <!-- <link rel="stylesheet" href=?php echo ROOT . '/css/style.css';?>> -->
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body class="bg-adm">
        
        <nav class="navbar navbar-expand-lg ftco_navbar" id="ftco-navbar">
	        <div class="container">
	            <a class="navbar-brand" href="/about"><img src="../img/logo/logo_tour.png" alt=""></a>
	            <div class="navbar-collapse" id="ftco-nav">
	                <ul class="navbar-nav ml-auto" id="adm-nav">
                        <?php if (isset($_SESSION['user_adm'])): ?>
	                        <li class="nav-item"><a href="order" class="nav-link">Открытые заявки</a></li>
	                        <li class="nav-item"><a href="tabs" class="nav-link">Туры</a></li>
	                        <li class="nav-item"><a href="users" class="nav-link">Пользователи</a></li>
	                        <li class="nav-item"><a href="profile" class="nav-link">Профиль</a></li>
	                        <li class="nav-item"><a href="logout" class="nav-link">Выход</a></li>
                        <?php else: ?>
	                        <li class="nav-item"><a href="admin/login" class="nav-link">Вход</a></li>
                        <?php endif; ?>
                    </ul>
	            </div>
	        </div>
	    </nav>

       
    <!-- END nav -->
