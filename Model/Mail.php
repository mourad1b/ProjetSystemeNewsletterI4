<?php
/**
 * Created by PhpStorm.
 * User: Mourad
 * Date: 08/01/2016
 * Time: 16:39
 */

/**
 * Groupe.php
 */

namespace Newsletter\Model;


/**
 * Class Groupe
 * @package Newsletter\Model
 */
class Mail
{
    /**
     * @var
     */
    private $id_mail;

    /**
     * @var
     */
    private $libelle;
    private $objet;

    /**
     * @return mixed
     */
    public function getIdMail()
    {
        return $this->id_mail;
    }

    /**
     * @param mixed $id_mail
     */
    public function setIdMail($id_mail)
    {
        $this->id_mail = $id_mail;
    }
    private $body;

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * @param mixed $objet
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;
    }

    /**
     * @param $id_groupe
     * @param $libelle
     */
    function __construct($id_mail, $libelle, $objet, $body)
    {
        $this->id_mail = $id_mail;
        $this->libelle = $libelle;
        $this->body = $body;
        $this->objet = $objet;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id_mail;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id_mail = $id;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $nom
     */
    public function setLibelle($libelle)
    {
        if (preg_match('#<script(.*?)>(.*?)</script>#is', $libelle)) {
            exit('Hack de la validation du formulaire côté client : Injection JS');
        }
        $this->libelle = strip_tags($libelle);
    }

}