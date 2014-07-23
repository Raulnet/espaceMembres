<?php
/**
 * Created by PhpStorm.
 * User: XVI
 * Date: 21/07/14
 * Time: 22:44
 */

namespace member\model;

use member\model\dao\DBOperation;
use member\model\Member;


class MemberManager
{

    public static function setMember($oMember)
    {
        $sQuery = "INSERT INTO member (email,civil,name,surname,password,icon,id_title,activity) VALUES ('{$oMember->getEmail()}','{$oMember->getCivil()}','{$oMember->getName()}','{$oMember->getSurname()}','{$oMember->getPassword()}','{$oMember->getIcon()}','{$oMember->getIdTitle()}','{$oMember->getActivity()}')";

        DBOperation::exec($sQuery);
    }

    public static function getMember()
    {
        return DBOperation::getAll("SELECT * FROM member");
    }

    public static function getByEmail($sMemberMail)
    {
        return DBOperation::getOne("SELECT * FROM member WHERE email='$sMemberMail'");
    }

    public static function getById($iId)
    {
        return DBOperation::getOne("SELECT m.id, m.name, m.surname, m.icon, m.suscrib_date, m.activity, m.email, tm.name_title FROM member m INNER JOIN title_member tm ON m.id_title = tm.id_title WHERE m.id='$iId'");
    }


    public static function getPass($sMemberMail)
    {
        return DBOperation::getOne("SELECT password FROM member WHERE email='$sMemberMail'");
    }

    public static function getLastMember()
    { // renvoie une table d'objet membre par ordre d'inscription descroissant

        $aData = DBOperation::getAll("SELECT m.id, m.name, m.surname, m.icon, m.suscrib_date, m.activity, tm.name_title FROM member m INNER JOIN title_member tm ON m.id_title = tm.id_title ORDER BY suscrib_date DESC");

        $aTable = array();

        foreach ($aData as $aMember) {
            $aTable[] = new Member($aMember);
        }
        return $aTable;
    }
    public static function setActivity($sEmail, $sActivity){

        $sQuery = "UPDATE member SET activity = '$sActivity' WHERE email = '$sEmail' ";

        DBOperation::exec($sQuery);
    }

    public static function setAddLink($iId, $iIdlinked){

        $sQuery = "INSERT INTO `place_member`.`link_member` (`member_id`, `member_linked`) VALUES ('$iId', '$iIdlinked')";

        DBOperation::exec($sQuery);

    }

    public static function setRemoveLink($iId, $iIdlinked){

        $sQuery = "DELETE FROM place_member.link_member WHERE member_id='$iId' AND member_linked='$iIdlinked'";

        DBOperation::exec($sQuery);

    }

    public static function getLinked($iId){
        $aMemberLinked = array();
        $sQuery = "SELECT m.id, m.name, m.surname, m.icon, m.suscrib_date, m.activity FROM member m INNER JOIN link_member lm ON m.id = lm.member_linked WHERE lm.member_id = '$iId'";
        $aMembers = DBOperation::getAll($sQuery);
        foreach ($aMembers as $aMember) {
            $aMemberLinked[] = new Member($aMember);
        }
        return $aMemberLinked;
    }


}