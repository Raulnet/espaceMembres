<div class="col-xs-4">

    <fieldset>
        <legend>Inscription</legend>
        <form method="post" action="index.php?page=NewMember">

            <div class="form-group">
                <label>Civilité :</label>
                <select class="form-control" name="civil">
                    <option value="Mr">Mr</option>
                    <option value="Mme">Mme</option>
                    <option value="Ms">Ms</option>
                </select>
            </div>
            <div class="form-group">
                <label>Nom :</label><input class="form-control" type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Prénom :</label><input class="form-control" type="text" name="surname" required>
            </div>
            <div class="form-group">
                <label>Email :</label><input class="form-control" type="email" name="email" placeholder="email"
                                             required>
            </div>
            <div class="form-group">
                <label>Password :</label><input class="form-control" type="password" name="pass1"
                                                placeholder="mot de passe"
                                                required>
            </div>
            <div class="form-group">
                <label>Password :</label><input class="form-control" type="password" name="pass2"
                                                placeholder="vérification du mot de passe" required>
            </div>
            <div class="form-group">
                <label>Poste :</label>
                <select class="form-control" name="title">
                    <option value="1">Webmaster</option>
                    <option value="2">Lead developper</option>
                    <option value="3">Designer</option>
                    <option value="4">Commercial</option>
                    <option value="5">Directeur</option>
                </select>
            </div>
            <input class="btn btn-default" type="submit" name="submit" value="envoyer">
            <input class="btn btn-danger" type="reset" value="annuler">

        </form>
    </fieldset>

</div>

<div class="col-xs-2">
</div>

<div class="col-xs-4">
    <a class="btn btn-danger" href="index.php?page=Suscrib&gen">Populate</a>
    <p>Génère automatiquement 500 membres</p><br />
    <ul>
        <li>nom: Doe</li>
        <li>prenom: john ou jane -XX</li>
        <li>mail :john-doe.XX@gmail.com</li>
        <li>pass : XX</li>
    </ul>


</div>


