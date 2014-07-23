
<div class="col-xs-1 ">
    <div class="Avatar<?=$aMember['icon']; ?> thumbnail"></div>
</div>
<div class="col-xs-5">
<h3><?=$aMember['surname'] . ' ' . $aMember['name']; ?></h3>
    <ul class="list-group">
        <li class="list-group-item"><?=$aMember['email']; ?></li>
        <li class="list-group-item"><?=$aMember['name_title']; ?></li>
        <li class="list-group-item"><?=$aMember['activity']; ?></li>
    </ul>
    <a class="btn btn-danger" href="index.php?page=Member&id=<?= $aMember['id'] ?>&remove">retirer de la liste d'amis</a>
</div>

    <div class="col-xs-6 tableLastSuscrib">
        <table class="table table-bordered ">
            <caption>d'amis</caption>
            <tr>
                <th></th>
                <th>Nom</th>
                <th>Poste</th>
                <th>Date d'inscription</th>
                <th>Statut</th>

            </tr>

            <?php require_once"tableMemberlinked.php"?>


        </table>
    </div>

