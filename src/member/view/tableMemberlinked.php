<?php

if(isset($aLinked)) {

if($aLinked !== NULL) {

    foreach ($aLinked as $oMember){ ?>
    <tr>
        <td><div class="Icon<?= $oMember->getIcon(); ?>"></div></td>
        <td><a href="index.php?page=Member&id=<?= $oMember->getId() ?>"> <?= $oMember->getSurname() . ' ' . $oMember->getName(); ?></a></td>
        <td><?= $oMember->getNameTitle(); ?></td>
        <td><?= $oMember->getSusCribDate(); ?></td>
        <td class="<?= $oMember->getActivity(); ?>"><?= $oMember->getActivity(); ?></td>
    </tr>
<?php }}}

 ?>