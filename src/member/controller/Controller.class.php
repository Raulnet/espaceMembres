<?php

namespace member\controller;


use member\model\Member;
use member\model\MemberManager;
use member\model\dao\Cache;


require_once "simple_html_dom.php";


class Controller
{

    public function __construct()
    {
        $this->exec();
    }

    private function exec()
    {
        $sPage = 'home';
        if (array_key_exists('page', $_GET)) {
            $sPage = $_GET['page'];
        }

        require ROOT . 'inc/site.doctype.inc.php';


        $sFunction = 'handle' . ucfirst($sPage);
        // check if function exists in the current class :
        if (method_exists($this, $sFunction)) {
            // call the function
            $this->$sFunction();
        } else {
            $this->header();
            $this->handleHome();
        }
        require ROOT . 'inc/site.footer.inc.php';
    }

    private function header() // apelle la bonne navbar
    {
        if (array_key_exists('member', $_SESSION) && $_SESSION['member'] != NULL) {

            require ROOT . 'src/member/view/nav.php';
        } else {
            require ROOT . 'inc/menu.inc.php';
        }
    }

    private function handleHome()
    {
        $this->header();
        require ROOT . 'src/member/view/home.php';
    }

    private function handleConnect() // renvoie ver la page de connection
    {
        $this->header();
        if (array_key_exists('connect', $_POST)) {
            $aData = MemberManager::getByEmail($_POST['email']);
            if (sha1($_POST['password']) === $aData['password']) { // si les deux mot de pass sont bon, charge la session et renvoie ver la view Place Member
                $_SESSION['member'] = new Member($aData);
                $this->handlePlaceMember();
            } else {

                require ROOT . 'src/member/view/connect.php';
                echo 'mot de passe erroner !!!!';
            }
        } else {
            require ROOT . 'src/member/view/connect.php';
        }
    }

    private function handleSuscrib() // renvoie ver la page d'inscription
    {
        if(array_key_exists('gen', $_GET)){ // function populate !!!!
            for($iPos = 1; $iPos < 500; $iPos ++){
                $aMember = array();
                $aMember['civil'] = rand(1, 3);
                $aMember['name'] = 'doe';
                if($aMember['civil'] < 2){
                    $aMember['surname'] = 'john-' . $iPos;
                }else{
                    $aMember['surname'] = 'jane-' . $iPos;
                }
                if($aMember['civil'] < 2){
                    $aMember['email'] = 'john-doe.' . $iPos . '@gmail.com';
                }else{
                    $aMember['email'] = 'jane-doe.' . $iPos . '@gmail.com';
                }
                $aMember['password'] = sha1($iPos);
                $aMember['id_title'] = rand(1, 5);
                $aMember['icon'] = rand(1, 13);
                $aMember['activity'] = 'off-line';
                $oMember = new Member($aMember);

                MemberManager::setMember($oMember);
            }
        }

        $this->header();
        require ROOT . 'src/member/view/suscrib.php';


    }

    private function handleDisconnect() // si on appelle la deconexion cela renvoie ver la page home
    {
        if (array_key_exists('member', $_SESSION)) { // test la presence d'un membre
            MemberManager::setActivity($_SESSION['member']->getEmail(), 'off-line'); // si présent Vide la session et le met off-line
            $_SESSION = array();
        }
        $this->handleHome();
    }

    private function handleNewMember()
    {
        if (array_key_exists('submit', $_POST)) {

            if ($this->TestDataNewMember() != false) {

                $this->handleConnect();
            } else {
                $this->handleSuscrib();
            }
        }
    }

    private function cache()
    {
        $ilifeTime = time() - filemtime('tmp/cache.html'); // recupére la date de dernière mise ajour du fichier en sc

        if ($ilifeTime > 30) { // si la durée est inferieur a 30sc cela réécrit le fichier.
            $sPage = file_get_html('http://localhost/projects/espace_membre/src/member/view/tableMember.php');
            file_put_contents('tmp/cache.html', $sPage);
        }
        return file_get_contents('tmp/cache.html');
    }

    private function handlePlaceMember() // renvoie ver la page d'inscription
    {

        if (array_key_exists('connect', $_POST)) {
            $aData = MemberManager::getByEmail($_POST['email']);
            if (sha1($_POST['password']) === $aData['password']) { // si les deux mot de pass sont bon, charge la session et renvoie ver la view Place Member
                MemberManager::setActivity($_POST['email'], 'online');
                $aListMember = MemberManager::getLastMember();
                $_SESSION['member'] = new Member($aData);
                $this->header();
                $aLinked = MemberManager::getLinked($_SESSION['member']->getId());
                foreach ($aLinked as $oMember) {
                    $_SESSION['memberLinked'][] = $oMember->getId(); // charge les ID des membre lier
                }
                require ROOT . 'src/member/view/placeMember.php';
            } else {
                $this->handleConnect();

            }
        } elseif (array_key_exists('member', $_SESSION)) {
            $this->cache();
            $this->header();
            $aListMember = MemberManager::getLastMember();
            $aLinked = MemberManager::getLinked($_SESSION['member']->getId());
            require ROOT . 'src/member/view/placeMember.php';

            {
            }
        } else { // sinon renvoie a l'accueil
            $this->handleHome();
        }
    }

    private function handleMember()
    {

        if (array_key_exists('add', $_GET)) { // si add exist rajoute le membre a la liste d'amis
            $_SESSION['memberLinked'][]=$_GET['id'];
            MemberManager::setAddLink($_SESSION['member']->getId(), $_GET['id']);
        }

        if (array_key_exists('remove', $_GET)) { // si remove exist efface le membre a la liste d'amis
            $iKey = array_search($_GET['id'], $_SESSION['memberLinked']);
            unset($_SESSION['memberLinked'][$iKey]);
            MemberManager::setRemoveLink($_SESSION['member']->getId(), $_GET['id']);

        }

        if (array_key_exists('id', $_GET)) { // Si id exsite envoie vers la page perso
            $this->header();
            $aMember = MemberManager::getById($_GET['id']); // recupére les Datas du membre
            if (array_key_exists('memberLinked', $_SESSION)) {
                if (in_array($_GET['id'], $_SESSION['memberLinked'])) {
                    require ROOT . 'src/member/view/memberLinked.php';
                } else {
                    require ROOT . 'src/member/view/member.php';
                }
            } else {
                require ROOT . 'src/member/view/member.php';
            }
        } else {
            $this->handleHome();
        }

    }

    private function TestDataNewMember() // Test LEs donner envoyer pour les nouveau membre
    {
        if (array_key_exists('submit', $_POST)) { // si l'envoie exist
            if ($_POST['pass1'] === $_POST['pass2']) { // si les deux mots de pass sont identique
                if (('' != $_POST['civil']) && ('' != $_POST['name']) && ('' != $_POST['surname']) && ('' != $_POST['email']) && ('' != $_POST['pass1']) && ('' != $_POST['pass2']) && ('' != $_POST['title'])) { // si tout les envoie sont différent de null
                    $aMember = array();
                    $aMember['civil'] = addslashes($_POST['civil']);
                    $aMember['name'] = addslashes($_POST['name']);
                    $aMember['surname'] = addslashes($_POST['surname']);
                    $aMember['email'] = addslashes($_POST['email']);
                    $aMember['password'] = sha1($_POST['pass1']);
                    $aMember['id_title'] = addslashes($_POST['title']);
                    $aMember['icon'] = rand(1, 13);
                    $aMember['activity'] = 'off-line';

                    $oMember = new Member($aMember);

                    MemberManager::setMember($oMember);

                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


} // fin de la class controleur


/*Populate
use member\model\Member;
use member\model\MemberManager;


for($iPos = 0; $iPos < 200; $iPos ++){

    $aMember = array();
    $aMember['civil'] = '1';
    $aMember['name'] = 'doe';
    $aMember['surname'] = 'john-' . $iPos;
    $aMember['email'] = 'john-doe.' . $iPos . '@gmail.com';
    $aMember['password'] = sha1($iPos);
    $aMember['id_title'] = rand(1, 5);
    $aMember['icon'] = rand(1, 13);
    $aMember['activity'] = 'off-line';
    $oMember = new Member($aMember);

    MemberManager::setMember($oMember);
}

*/