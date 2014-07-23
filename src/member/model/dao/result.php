<?php
/**
 * Created by PhpStorm.
 * User: XVI
 * Date: 21/07/14
 * Time: 22:31
 * */
$oDataBase = new PDO('mysql:host=localhost;dbname=place_member', 'root', '');
$oDataBase->exec("SET CHARACTER SET utf8");
$oDataBase->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);


if (array_key_exists('keyWord', $_GET)) {


    $sKeyWord = '%' . addslashes($_GET['keyWord']) . '%';

    try {
        $aAll = array();
        foreach ($oDataBase->query("SELECT id,name,surname FROM member WHERE name LIKE '$sKeyWord' OR surname LIKE '$sKeyWord' ORDER BY id LIMIT 0, 10 ") as $aRow) {
            $aAll[] = $aRow;
        }
    } catch (\PDOException $oPdoException) {
        echo 'PDO Exception : ' . $oPdoException->getMessage();
    }

    if ($oDataBase != false) {

     foreach($aAll as $sMember){
         echo '<li><a href="index.php?page=Member&id=' . $sMember['id'] . '">' . $sMember['surname'] . ' ' . $sMember['name'] . '</a></li>';

        }


    } else {
        echo 'aucun resultat';
    }


}

?>

