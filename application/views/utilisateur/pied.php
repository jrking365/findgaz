
<div class="row">

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Liste de vos produits </h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive text-center">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th># </th>
                                <th>Produit </th>
                                <th>Type de bouteille </th>
                                <th>Format de la bouteille </th>
                                <th>Prix unitaire</th>
                                <th>Disponibilité</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (is_object($maListe)) { ?>
                                <?php $i = 0;
                                foreach ($maListe as $gaz): $i++;
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $gaz->getGaz->getProduit->libelle ?></td>
                                        <td><?= $gaz->getGaz->getProduit->getSociete->nom ?></td>
                                        <td><?= $gaz->getGaz->getFormatProduit->masse . ' ' . $gaz->getGaz->getFormatProduit->unite ?></td>
                                        <td><?= $gaz->getGaz->prix_unitaire . ' Fcfa' ?></td>
                                        <td> 
                                            <div class="switch col-md-offset-4">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" value="<?= $gaz->id ?>" checked="" class="onoffswitch-checkbox" name="dispo" id="example1">
                                                    <label class="onoffswitch-label" for="example1">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
<?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    ComportementFormulaire = $(function () {
        $('div.onoffswitch input[type=checkbox]').click(function () {
            cochee = $(this).is(':checked'); // je regarde si la case est cochée ou non
            id = $(this).attr("value"); // je capture l'attibut name

            if (cochee == true) {
                $(function () {
                    $.ajax({
                        url: "contenu/", // j'utilise le lien pour aller cherche les contenus à rajouter
                        cache: false,
                        success: function (html) {
                            
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            alert(textStatus);
                        },
                    });
                    return false;
                });
            }
        });
    });
</script>