
<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>EasyGaz | Connexion</title>

        <link href="<?php echo base_url(); ?>style/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/font-awesome/css/font-awesome.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>style/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>style/css/style.css" rel="stylesheet">

    </head>

    <body class="gray-bg">

        <div class="middle-box text-center loginscreen animated fadeInDown">
            <div>
                <div>

                    <h1 class="logo-name">EG</h1>

                </div>
                <h3>Bienvenue sur EasyGaz</h3>
                <p>Plateforme de localisation des zones de disponibilité du gaz et commande des produits.

                </p>

                <p>Connectez-vous. Un monde nouveau s'offre à vous.</p>
                <?php
                    if(isset($erreur)){
                        echo '<div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <a class="alert-link" href="#">'.$erreur.'</a>.
                </div>';
                    }
                ?>
                

                <form method="post" action="" class="">
                    <div class="form-group">
                        <input type="text" name="login" class="form-control" placeholder="Nom d'utilisateur : login " required="">
                    </div>
                    <div class="form-group">
                        <input type="password" name="motpasse" class="form-control" placeholder="Votre mot de passe " required="">
                    </div> 
                    <button type="submit" class="btn btn-primary block full-width m-b">Connexion</button>

                    <a href="#"><small>Mot de passe oublié ?</small></a>

                </form>
                <p class="m-t"> <small>EasyGaz est une plateforme développé par des ingénieurs de la <b>TS-Tech</b> &copy; 2016</small> </p>
            </div>
        </div>

        <!-- Mainly scripts -->
        <script src="<?php echo base_url(); ?>style/js/jquery-2.1.1.js"></script>
        <script src="<?php echo base_url(); ?>style/js/bootstrap.min.js"></script>

    </body>
</html>
