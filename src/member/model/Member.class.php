<?php
/**
 * Created by PhpStorm.
 * User: XVI
 * Date: 19/07/14
 * Time: 22:07
 */

namespace member\model;


class Member
{
    private $aCivil = ['Mr', 'Mme', 'Ms'];
    private $iId;
    private $sEmail;
    private $sCivil;
    private $sName;
    private $sSurname;
    private $sPassword;
    private $iIcon;
    private $sSuscrib_date;
    private $iId_title;
    private $sActivity;
    private $sName_title;

    public function  __construct($aData)
    {
        if(array_key_exists('id', $aData)){
            $this->iId = $aData['id'];
        }
        if(array_key_exists('activity', $aData)){
            $this->sActivity = $aData['activity'];
        }
        if(array_key_exists('suscrib_date', $aData)){
            $this->sSuscrib_date = $aData['suscrib_date'];
        }
        if(array_key_exists('name_title', $aData)){
            $this->sName_title = $aData['name_title'];
        }
        if(array_key_exists('email', $aData)){
            $this->sEmail = $aData['email'];
        }
        if(array_key_exists('civil', $aData)){
            $this->sCivil = $aData['civil'];
        }
        if(array_key_exists('password', $aData)){
            $this->sPassword = $aData['password'];
        }
        if(array_key_exists('id_title', $aData)){
            $this->iId_title = $aData['id_title'];
        }


        $this->sName = $aData['name'];
        $this->sSurname = $aData['surname'];
        $this->iIcon = $aData['icon'];

    }

    /**
     * @param mixed $iId
     */
    public function setId($iId)
    {
        $this->iId = $iId;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->iId;
    }

    /**
     * @param mixed $sName_title
     */


    public function setNameTitle($sName_title)
    {
        $this->sName_title = $sName_title;
    }

    /**
     * @return mixed
     */
    public function getNameTitle()
    {
        return $this->sName_title;
    }

    /**
     * @param mixed $iCivil
     */
    public function setCivil($iCivil)
    {
        $this->sCivil = $iCivil;
    }

    /**
     * @return mixed
     */
    public function getCivil()
    {
        return $this->sCivil;
    }

    /**
     * @param mixed $iIcon
     */
    public function setIcon($iIcon)
    {
        $this->iIcon = $iIcon;
    }

    /**
     * @return mixed
     */
    public function getIcon()
    {
        return $this->iIcon;
    }

    /**
     * @param mixed $iId_title
     */
    public function setIdTitle($iId_title)
    {
        $this->iId_title = $iId_title;
    }

    /**
     * @return mixed
     */
    public function getIdTitle()
    {
        return $this->iId_title;
    }

    /**
     * @param mixed $sActivity
     */
    public function setActivity($sActivity)
    {
        $this->sActivity = $sActivity;
    }

    /**
     * @return mixed
     */
    public function getActivity()
    {
        return $this->sActivity;
    }

    /**
     * @param mixed $sEmail
     */
    public function setEmail($sEmail)
    {
        $this->sEmail = $sEmail;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->sEmail;
    }

    /**
     * @param mixed $sName
     */
    public function setName($sName)
    {
        $this->sName = $sName;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->sName;
    }

    /**
     * @param mixed $sPassword
     */
    public function setPassword($sPassword)
    {
        $this->sPassword = $sPassword;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->sPassword;
    }

    /**
     * @param mixed $sSurname
     */
    public function setSurname($sSurname)
    {
        $this->sSurname = $sSurname;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->sSurname;
    }

    /**
     * @param mixed $sSuscrib_date
     */
    public function setSuscribDate($sSuscrib_date)
    {
        $this->sSuscrib_date = $sSuscrib_date;
    }

    /**
     * @return mixed
     */
    public function getSuscribDate()
    {
        return $this->sSuscrib_date;
    }





} // fin de la class