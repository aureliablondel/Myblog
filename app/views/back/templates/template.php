<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>

    <link rel="stylesheet" href="app\public\back\css\style.css">
    
</head>

<body>

<header>
    <div class="headercontainer">
        <div class="logo">
            <h1>Code Zen </h1>        
        </div>

        <div class="navadmin">
            <nav>
                <ul>
                    <li><a href="indexAdmin.php?action=tbAdmin">Tableau de bord</a></li>
                    <li><a href="">Déconnexion</a></li>
                    <li><a href="/">Accès au site</a></li>
                </ul>
            </nav>       
        </div>
    </div>
</header>

<main>
    <div class="maincontainer">
        <?= $content ?>
    </div>
</main>
   
</body>

</html>