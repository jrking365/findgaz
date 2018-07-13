
<div class="wrapper wrapper-content">
    <br><br class="m-b-lg"><br><br>
    <div class="row m-b-sm m-t-xxs m-l-lg">
        <div class="col-md-3">

            <div class="profile-image">
                <img src="<?= base_url(); ?>style/img/profile.png" class="img-circle circle-border m-b-md" alt="profile">
            </div>
            <div class="profile-info">
                <div class="">
                    <div>
                        <h2 class="no-margins">
                            <?= $utilisateur->nom . ' ' . $utilisateur->prenom; ?>
                        </h2>
                        <h4><?= $utilisateur->getTypeUtilisateur->libelle ?></h4>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <table class="table small m-b-xs">
                <tbody>
                    <tr>
                        <td>
                            <h3> Informations de connexion </h3>
                        </td>
                        <td>
                            <h3> Action </h3>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <strong>Login </strong> ****
                        </td>
                        <td>
                            <button id="modifLog" class="btn btn-success"> modifier </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Mot de passe </strong> ***** 
                        </td>
                        <td>
                            <button id="modifPass" class="btn btn-success"> modifier </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <?php
    if (isset($erreur)) {
        echo '<div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <a class="alert-link" href="#">' . $erreur . '</a>.
                </div>';
    }
    if (isset($succes)) {
        echo '<div class="alert alert-succes alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <a class="alert-link" href="#">' . $succes . '</a>.
                </div>';
    }
    ?>
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
?>
    <div class="row col-md-8">
        <form class="form-horizontal" method="post" action="">
            <p>Modification des informations du compte </p>
            <div class="form-group"><label class="col-lg-2 control-label">Nom</label>
                <div class="col-lg-10"><input name="nom" value="<?= set_value('nom', $nom); ?>" type="text" placeholder="Nom " class="form-control">
                    <span class="alert-danger help-block m-b-none"><?= form_error('nom'); ?></span></div>
            </div>
            <div class="form-group"><label class="col-lg-2 control-label">Prenom</label>
                <div class="col-lg-10"><input name="prenom" value="<?= set_value('prenom', $prenom); ?>" type="text" placeholder="Prenom " class="form-control">
                    <span class="alert-danger help-block m-b-none"><?= form_error('prenom'); ?></span></div>
            </div>
            <div class="form-group"><label class="col-lg-2 control-label">Contact(Téléphone)</label>
                <div class="col-lg-10"><input name="contact" value="<?= set_value('contact', $contact); ?>" type="number" placeholder="Contact " class="form-control">
                    <span class="alert-danger help-block m-b-none"><?= form_error('contact'); ?></span></div>
            </div>
            <div class="form-group"><label class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10"><input name="email" value="<?= set_value('email', $email); ?>" type="email" placeholder="Email " class="form-control">
                    <span class="alert-danger help-block m-b-none"><?= form_error('email'); ?></span></div>
            </div>
            <div class="form-group"><label class="col-lg-2 control-label">Numéro CNI</label>
                <div class="col-lg-10"><input name="numerocni" type="text" value="<?= set_value('numerocni', $numerocni); ?>" placeholder="Numéro de télèphone " class="form-control">
                    <span class="alert-danger help-block m-b-none"><?= form_error('numerocni'); ?></span></div>
            </div>
            <div class="form-group"><label class="col-lg-2 control-label">Genre</label>
                <div class="col-lg-10"><select name="genre"  class="form-control m-b">
                        <option><?= set_value('genre', $genre); ?></option>
                        <option value="Masculin">Masculin</option>
                        <option value="Feminin">Feminin</option>
                    </select>
                    <span class="alert-danger help-block m-b-none"><?= form_error('genre'); ?></span></div>
            </div>
           <div class="form-group"><label class="col-lg-2 control-label">Statut matrimonial</label>
                <div class="col-lg-10"><select name="statutmatrimonial"  class="form-control m-b">
                        <option><?= set_value('statutmatrimonial', $statutmatrimonial); ?></option>
                        <option value="Célibataire">Célibataire</option>
                        <option value="Marié">Marié</option>
                    </select>
                    <span class="alert-danger help-block m-b-none"><?= form_error('statutmatrimonial'); ?></span></div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-sm btn-info" type="submit">Enregistrer</button>
                </div>

            </div>
        </form>
    </div>

</div>

