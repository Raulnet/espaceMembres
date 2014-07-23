<h1>bonjour <?= $_SESSION['member']->getCivil() . ' ' . $_SESSION['member']->getSurname(); ?></h1>

<div class="row">
    <div class="col-xs-6 ">
        <div class="panel panel-default">
            <div class="panel-heading">Liste des membres</div>
            <div class="tableLastSuscrib">
                <table class="table table-bordered ">

                    <tr>
                        <th></th>
                        <th>Nom</th>
                        <th>Poste</th>
                        <th>Date d'inscription</th>
                        <th>Statut</th>

                    </tr>


                    <?php require_once "tmp/Cache.html" ?>

                </table>
            </div>
        </div>
    </div>
    <div class="col-xs-6 ">
        <div class="panel panel-default">
            <div class="panel-heading">Liste de vos amis</div>
            <div class="tableLastSuscrib">
                <table class="table table-bordered ">
                    <tr>
                        <th></th>
                        <th>Nom</th>
                        <th>Poste</th>
                        <th>Date d'inscription</th>
                        <th>Statut</th>

                    </tr>

                    <?php require_once "tableMemberlinked.php" ?>


                </table>
            </div>
        </div>
    </div>
</div>