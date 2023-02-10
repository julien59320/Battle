<?php require('./actions/loginAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <form method="POST">

        <?php if(isset($errorMsg)){ echo '<p>' . $errorMsg . '</p>';} ?>

        <div class="mb-3">
            <label for="email">email</label>
            <input type="email" name="email">
        </div>

        <div class="mb-3">
            <label for="password">Mot de passe</label>
            <input type="password" name="password">
        </div>

        <button type="submit" name="submit">Se connecter</button>
    
        <a href="signup.php"><p>Je n'est pas de compte, je m'inscrit</p></a>
    </form>
</body>
</html>