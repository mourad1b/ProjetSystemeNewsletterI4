<?php
use nsNewsletter\Model\Groupe;
use nsNewsletter\Model\GroupeUserRepository;
require('../View/Groupe/addGroupeForm.php');
?>

<div id="main">
   <div id="pageContent">
        <!--<div id="alertMsg" class="alert-box" style="display: none;">
            <div class="close-box">x</div>
            <span class="type"></span>
            <span class="msg"></span>
        </div>-->
       <div>
           <button id="btnManageGroupe"  class="btn btn-warning btnManageGroupe" data-toggle="modal" data-target="#modal">Gérer les groupes</button>
       </div>

       <div class="file-wrap">
            <div class="commit commit-tease js-details-container"></div>
            <div class="tab">
                <div class="level1">
                    <div class="ligne">
                        <!--<div class="col icon">
                            <span class="glyphicon glyphicon-folder-close"></span>
                            <img alt="" class="loading" height="16"
                                 src="http://officedelamer.com/office/wp-content/plugins/ajax-campaign-monitor-forms/ajax-loading.gif" width="16">
                        </div>-->
                        <div class="col content">
                            <a href="#" title="">Liste des groupes contenant des utilisateurs </a>
                        </div>

                        <div class="col">
                            <span>#Nombre d'utilisateurs / Groupe</span>
                        </div>
                    </div>
                    <?php   /** @var Groupe $groupe */
                    foreach($groupes as $groupe): ?>
                    <div class="level2">
                        <div class="ligne">
                            <div class="col icon">
                                <span class="glyphicon glyphicon-folder-close"></span>
                                <img alt="" class="loading" height="16"
                                     src="http://officedelamer.com/office/wp-content/plugins/ajax-campaign-monitor-forms/ajax-loading.gif" width="16">
                            </div>
                            <div class="col content">
                                <a href="#" title="<?php echo $groupe->getLibelle(); ?>"><?php echo $groupe->getLibelle(); ?></a>
                            </div>

                            <div class="col">
                                <span><?php echo $groupe->getCountUser(); ?></span>
                            </div>
                        </div>
                        <?php /** @var User $user */ foreach($users as $user): ?>
                            <?php


                                $raw =array('id_user' => $user->getId(),'id_groupe' => $groupe->getId());


                            $rep = new GroupeUserRepository();

                            if($rep->findGroupOfUser($raw) == 1): ?>
                            <div class="level3">
                                <div class="ligne">
                                    <div class="col icon">
                                        <span class="glyphicon glyphicon-folder-close"></span>
                                        <img alt="" class="loading" height="16"
                                             src="http://officedelamer.com/office/wp-content/plugins/ajax-campaign-monitor-forms/ajax-loading.gif"
                                             width="16">
                                    </div>
                                    <div class="col content">
                                        <a href="#"
                                           title=""><?php echo $user->getMail(); ?></a>
                                    </div>
                                    <div class="col">
                                                        <span></span>
                                    </div>
                                </div>

                                <div class="last-level" data-userId="">
                                    <div class="ligne">
                                        <table>
                                            <tbody>
                                            <tr class="champTitre">
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Mail</th>
                                                <th>Télephone</th>
                                            </tr>


                                            <tr id="">
                                                <td class="nom"><input type="text" name="nom"
                                                                       value="<?php echo $user->getNom(); ?>" disabled></td>
                                                <td class="prenom"><input type="text" name="prenom"
                                                                      value="<?php echo $user->getPrenom(); ?>" disabled></td>
                                                <td class="mail"><input type="text" name="td"
                                                                      value="<?php echo $user->getMail(); ?>" disabled></td>
                                                <td class="telephone"><input type="text" name="telephone"
                                                                        value="<?php echo $user->getTelephone(); ?>" disabled></td>
                                                <td class="btn_action">
                                                    <a href="#" title="Modifier"
                                                       class='btnModifier'><span
                                                            class="glyphicon glyphicon-pencil"></span></a>
                                                    <a href="#" title="Supprimer"
                                                       class='btnSupprimer'><span
                                                            class="glyphicon glyphicon-trash"></span></a>
                                                    <a href="#" title="Valider"
                                                       class='btnValider'><span
                                                            class="glyphicon glyphicon-ok"></span></a>
                                                </td>
                                            </tr>

                                            </tbody>
                                            <tr>
                                                <td><a href="" class="newUser"><span
                                                            class="glyphicon glyphicon-plus"></span>
                                                        Ajouter un utilisateur</a></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- PageContent -->
    <div id="menu_right">
        <h1>Informations</h1>

        <p>=> sur l'utilisateur ??</p>

        <p> => sur la newsletters ??</p>

        <p></p>
    </div>
</div>
<script src="../Web/scripts/Groupe2.js"></script>