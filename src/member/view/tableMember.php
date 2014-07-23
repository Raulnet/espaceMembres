<?php

require"../model/MemberManager.class.php";
require"../model/Member.class.php";
require"../model/dao/DBOperation.class.php";

use member\model\Member;
use member\model\MemberManager;



$aListMember = MemberManager::getLastMember();

foreach($aListMember as $oMember){
    $_SESSION['memberLinked'][] = $oMember->getId(); // charge les ID des membre lier
}
?>

<?php foreach ($aListMember as $oMember): ?>
    <tr>
        <td><div class="Icon<?= $oMember->getIcon(); ?>"></div></td>
        <td><a href="index.php?page=Member&id=<?= $oMember->getId() ?>"> <?= $oMember->getSurname() . ' ' . $oMember->getName(); ?></a></td>
        <td><?= $oMember->getNameTitle(); ?></td>
        <td><?= $oMember->getSusCribDate(); ?></td>
        <td class="<?= $oMember->getActivity(); ?>"><?= $oMember->getActivity(); ?></td>
    </tr>
<?php endforeach; ?>