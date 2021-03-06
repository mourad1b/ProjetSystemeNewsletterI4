var Newsletter2 = (function() {
    var options = {
        item: '<li class="row"><div class="idNewsletter col-md-1"></div><div class="nom col-md-3"></div>' +
        '<div class="contenu col-md-4"></div><div class="lien col-md-3"></div><div class="col-md-1 text-right">' +
        '<button class="btnUpdateNewsletter btn btn-info btn-xs" data-toggle="modal" data-target="#modal">Modifier</button>' +
        '<button id="btnDeleteNewsletter" class="btnDeleteNewsletter btn btn-info btn-xs">Supprimer</button></div></li>'
    };

    var _newsletters, newsletterList, li, idNewsletter, nom, contenu, lien;
    var _url = "../Web/index.php?page=newsletters";

    var _action;
    var modal = $('#modal');
    var btnSubmitNewsletter = $('.btnSubmitNewsletter');
    var btnUpdateNewsletter = $('.btnUpdateNewsletter');
    var btnNewNewsletter = $('.btnNewNewsletter');
    var btnList = $(".list");

    function _getNewsletters() {
        $.ajax({
                url : _url + "&action=list",
                type: 'POST'
            })
            .done(function(data) {
                //data = [{"id":"2","nom":"BEN","prenom":"Mourad","mail":"mourad_ben@test.com"}, {"id":"3","nom":"Loue","prenom":"Arnauld","mail":"Ar.loue@test.net"},{"id":"5","nom":"toto","prenom":"titi","mail":"toto.titi@test-auth.fr"}];
                _newsletters = jQuery.parseJSON(data);
                //console.log(_users);
                initList();
            });
    };

    function initList() {
        newsletterList = new List('newsletter-list', options, _newsletters);
    };

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    };

    function cleanForm() {
        $('#inputIdNewsletter').val("");
        $('#inputNom').val("");
        $('#inputContenu').val("");
        $('#inputLien').val("");
        $('#modalContent').find(".key").prop('disabled', true);
    };

    function fillForm() {
        li = $('.fillSource');
        $('#inputIdNewsletter').val(li.find('.idNewsletter').text());
        $('#inputNom').val(li.find('.nom').text());
        $('#inputContenu').val(li.find('.contenu').text());
        $('#inputLien').val(li.find('.lien').text());
        $('#modalContent').find(".key").prop('disabled', true);
    };

    function _initEvents() {
        btnNewNewsletter.click(function (e) {
            e.preventDefault();
            cleanForm();
            IHM.validateModal();
            _action = "create";
        });

        btnList.on("click",".btnUpdateNewsletter", function(e) {
            e.preventDefault();
            $("li.fillSource").removeClass('fillSource');
            $(this).closest("li.row").addClass('fillSource');
            fillForm();
            IHM.validateModal();
            _action = "update";
        });

        btnList.on("click",".btnDeleteNewsletter", function(e) {
            e.preventDefault();
            //var contentPanelId = $(e.target)[0].id;
            //console.log(contentPanelId);
            $("li.fillSource").removeClass('fillSource');
            $(this).closest("li.row").addClass('fillSource');
            li = $('.fillSource');
            _action = "delete";
            idNewsletter = li.find('.idNewsletter').text();
            var modal = bootbox.confirm({
                //title: "Suppression du mail "+nomSelectUser,
                message: "Êtes-vous sûr ?",
                callback: function (result) {
                    //Example.show("Hello");
                }
            });

            modal.on('click', '.btn-primary', function () {
                $.ajax({
                    url:  _url + "&action=" + _action + '&idNewsletter=' + idNewsletter,
                    type: 'POST',
                    data : {
                        idNewsletter: idNewsletter
                    }
                    //context: document.body
                })
                .done(function () {
                    bootbox.alert("Suppression ok.");
                    //modal.hide();
                });
            });
        });

        btnSubmitNewsletter.click(function() {
            idNewsletter = $('#inputIdNewsletter').val();
            nom = $('#inputNom').val();
            tinyMCE.triggerSave();
            contenu = $("#inputContenu").val();
            lien = $.trim($('#inputLien').val());

            if(nom == "") {
                bootbox.alert('Nom est obligatoire !');
                //cleanForm();
                IHM.validateModal();
                return "";
            }

            $.ajax({
                    //csrf: true,
                    url : _url + "&action=" + _action +  ((_action === 'update') ? '&idNewsletter=' + idNewsletter : ''),
                    type: 'POST',
                    data : {
                        idNewsletter: idNewsletter,
                        nomNewsletter: nom,
                        contenuNewsletter: contenu,
                        lienNewsletter: lien
                    }
                })
                .done(function(data) {
                    switch(_action) {
                        case "update":
                            var li = $('.fillSource');
                            li.find('.nom').text(nom);
                            li.find('.contenu').text(contenu);
                            li.find('.lien').text(lien);
                            bootbox.alert("Mise à jour ok.");
                            modal.hide();
                            break;
                        case "create":
                            newsletterList.add({"idNewsletter": data.idNewsletter, "nomNewsletter": nom, "contenuNewsletter": contenu, "lienNewsletter":lien});
                            bootbox.alert("Enregistrement ok.");
                            modal.hide();
                            break;
                    }
                });
        });

    };

    return {
        init : function() {
            //initList();
            _getNewsletters();
            _initEvents();
        }
    };
})();
$(document).ready(Newsletter2.init());
