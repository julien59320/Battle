<?php require('./actions/signupAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <form method="POST">

        <?php if(isset($errorMsg)){ echo '<p>' . $errorMsg . '</p>';} ?>

        <div class="mb-3">
            <label for="name">Nom</label>
            <input type="text" name="name">
        </div>
        <div class="mb-3">
            <label for="lastname">Prenom</label>
            <input type="text" name="lastname">
        </div>
        <div class="mb-3">
            <label for="email">email</label>
            <input type="email" name="email">
        </div>
        <div class="mb-3">
            <label for="password">Mot de passe</label>
            <input type="password" name="password">
        </div>
        <button type="submit" name="submit">S'inscrire</button>

        <a href="login.php"><p>J'ai déja un compte, je me connecte</p></a>
    </form>
</body>
</html>