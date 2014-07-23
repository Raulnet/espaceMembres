
<div class="col-xs-2 ">
    <div class="Avatar<?=$aMember['icon']; ?> thumbnail"></div>
</div>
<div class="col-xs-5">
<h3><?=$aMember['surname'] . ' ' . $aMember['name']; ?></h3>
<p><?=$aMember['name_title']; ?><br />
    <?=$aMember['activity']; ?><br />
</p>
    <a class="btn btn-default" href="index.php?page=Member&id=<?= $aMember['id'] ?>&add">Ajouter à ma liste d'amis</a>
</div>
