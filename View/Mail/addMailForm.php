<h3 class="text-center">Formulaire d'ajout des mails </h3>
<br>

<form class="form-horizontal" enctype="multipart/form-data" action="index.php" method="post">
    <input type="hidden" name="formAddMail" value="true">
    <div class="form-group">
        <label for="libeleMail" class="col-sm-2 control-label"><strong>Nom du mail</strong></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="libeleMail" placeholder="Nom du mail">
        </div>
    </div>
    <div class="form-group">
        <label for="objetMail" class="col-sm-2 control-label"><strong>Objet</strong></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="objetMail" placeholder="Objet du mail">
        </div>
    </div>
    <div class="form-group">
        <label for="corpsMail" class="col-sm-2 control-label"><strong>Corps</strong></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="corpsMail" placeholder="Corps du mail">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn success">Ajouter</button>
        </div>
    </div>
</form>