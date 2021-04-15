<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Zen</title>   
    <!-- feuilles de style -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="app\public\front\css\style.css">
</head>

<body>
    <header class="header-container">        
        <div class="logo-block">
            <h1><a href="/">Code Zen</a></h1>        
        </div>
        <div class="right-block">
            <div class="search-container">
                <form class="search-form" action="index.php?action=searchArticle" method="POST">
                    <input type="search" name="q" placeholder="Rechercher">
                    <button><i class="fas fa-search"></i></button>
                </form>       
            </div>
            <div class="log-container">                              
                <a class="space-member" href="index.php?action=logIn">Espace membre</a>
                <a class="power-off" title="Déconnexion" href="index.php?action=disconnection"><i class="fas fa-power-off"></i></a>

            <div class="nav-container">
                <div id="burger"> <!------------menu burger---------->
                    <i class="fas fa-bars"></i>
                </div>
                <nav id="header-menu">
                    <ul id="list-menu">
                        <li><a href="/">Accueil</a></li>
                        <li><a href="index.php?action=blog">Blog</a></li>
                        <li><a href="">Tutoriels</a></li>                
                    </ul>
                </nav>                    
            </div>
        </div>       
    </header>

    <main class="main-content">        
        <?= $content ?>
    </main>

    <footer>
        <div>Copyright Aurélia - Kercode - 2021</div>
    </footer>
    
    <!-- <script src="app/public/front/js/jquery-1.9.0.min.js"></script>     -->
    <script src="app/public/front/js/burger.js"></script>
    <script src="app/public/front/js/passwordMask.js"></script>
    <script src="app/public/front/js/connectButton.js"></script>
</body>
</html>