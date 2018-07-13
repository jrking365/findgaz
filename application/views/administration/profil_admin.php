<?php
//var_dump($utilisateur);
$nom = $utilisateur->nom;
$prenom = $utilisateur->prenom;
$contact = $utilisateur->contact;
$email = $utilisateur->email;
$numerocni = $utilisateur->numerocni;
$genre = $utilisateur->genre;
$profession = $utilisateur->profession;
$statutmatrimonial = $utilisateur->statutmatrimonial;
$login = $utilisateur->login;
$motpasse = $utilisateur->motpasse;
?>

<div class="wrapper wrapper-content animated fadeInRight">


    <div class="row m-b-lg m-t-lg">
        <div class="col-md-6">

            <div class="profile-image">
                <img src="<?php echo base_url(); ?>style/img/a4.jpg" class="img-circle circle-border m-b-md" alt="profile">
            </div>
            <div class="profile-info">
                <div class="">
                    <div>
                        <h2 class="no-margins">
                            <?php echo $utilisateur->nom . ' ' . $utilisateur->prenom; ?>
                        </h2>
                        <h4> <?php echo $utilisateur->getTypeUtilisateur->libelle; ?></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <table class="table small m-b-xs">
                <tbody>
                    <tr>
                        <td>
                            <strong>142</strong> Projects
                        </td>
                        <td>
                            <strong>22</strong> Followers
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <strong>61</strong> Comments
                        </td>
                        <td>
                            <strong>54</strong> Articles
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>154</strong> Tags
                        </td>
                        <td>
                            <strong>32</strong> Friends
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
   
    <div class="row">
         <?php
                if (isset($erreur)) {
                    echo '<div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <a class="alert-link" href="#">' . $erreur . '</a>.
                </div>';
                }
                ?>
        <div class="col-lg-5">
            
            <div class="social-feed-box">

                <div class="pull-right social-action dropdown">
                    <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                        <i class="fa fa-angle-down"></i>
                    </button>
                </div>

                <div class="social-body">

                    <form class="form-horizontal" method="post" action="">
                        <p>Attention si vous faites la mise à jour vous allez être redirigé vers la page de connexion.</p>
                        <div class="form-group"><label class="col-lg-2 control-label">Nom</label>
                            <div class="col-lg-10"><input name="nom" value="<?php echo set_value('nom', $nom); ?>" type="text" placeholder="Nom " class="form-control">
                                <span class="alert-danger help-block m-b-none"><?php echo form_error('nom'); ?></span></div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">Prenom</label>
                            <div class="col-lg-10"><input name="prenom" value="<?php echo set_value('prenom', $prenom); ?>" type="text" placeholder="Prenom " class="form-control">
                                <span class="alert-danger help-block m-b-none"><?php echo form_error('prenom'); ?></span></div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">Contact(Téléphone)</label>
                            <div class="col-lg-10"><input name="contact" value="<?php echo set_value('contact', $contact); ?>" type="number" placeholder="Contact " class="form-control">
                                <span class="alert-danger help-block m-b-none"><?php echo form_error('contact'); ?></span></div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10"><input name="email" value="<?php echo set_value('email', $email); ?>" type="email" placeholder="Email " class="form-control">
                                <span class="alert-danger help-block m-b-none"><?php echo form_error('email'); ?></span></div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">Numéro CNI</label>
                            <div class="col-lg-10"><input name="numerocni" type="text" value="<?php echo set_value('numerocni', $numerocni); ?>" placeholder="Numéro de télèphone " class="form-control">
                                <span class="alert-danger help-block m-b-none"><?php echo form_error('numerocni'); ?></span></div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">Genre</label>
                            <div class="col-lg-10"><select name="genre"  class="form-control m-b">
                                    <option><?php echo set_value('genre', $genre); ?></option>
                                    <option value="Masculin">Masculin</option>
                                    <option value="Feminin">Feminin</option>
                                </select>
                                <span class="alert-danger help-block m-b-none"><?php echo form_error('genre'); ?></span></div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">Profession</label>
                            <div class="col-lg-10"><input name="profession" type="text" value="<?php echo set_value('profession', $profession); ?>" placeholder="Numéro de télèphone " class="form-control">
                                <span class="alert-danger help-block m-b-none"><?php echo form_error('profession'); ?></span></div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">Statut matrimonial</label>
                            <div class="col-lg-10"><select name="statutmatrimonial"  class="form-control m-b">
                                    <option><?php echo set_value('statutmatrimonial', $statutmatrimonial); ?></option>
                                    <option value="Célibataire">Célibataire</option>
                                    <option value="Marié">Marié</option>
                                </select>
                                <span class="alert-danger help-block m-b-none"><?php echo form_error('statutmatrimonial'); ?></span></div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">Login </label>
                            <div class="col-lg-10"><input name="login" type="text" value="<?php echo set_value('login', $login); ?>" placeholder="Login" class="form-control">
                                <span class="alert-danger help-block m-b-none"><?php echo form_error('login'); ?></span></div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-sm btn-info" type="submit">Metre à jour le profil</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>




        </div>
        <div class="col-lg-4 m-b-lg">
            <div id="vertical-timeline" class="vertical-container light-timeline no-margins">
                <div class="vertical-timeline-block">
                    <div class="vertical-timeline-icon navy-bg">
                        <i class="fa fa-briefcase"></i>
                    </div>

                    <div class="vertical-timeline-content">
                        <h2>Mon compte </h2>
                        <p>
                            La mise à jour du profil de votre compte et des informations.
                        </p>
                        <a href="#" class="btn btn-sm btn-primary"> Plus </a>
                        
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>