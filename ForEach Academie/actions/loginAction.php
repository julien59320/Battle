<?php
require './actions/database.php';
//Validation du formulaire
if(isset($_POST['submit'])){
    //Verifier si user a bien completer tout les champs
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        //donnée de user
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $checkifUserExist = $bdd->prepare('SELECT * FROM lanistes WHERE email = ?');
        $checkifUserExist->execute(array($email));

        if($checkifUserExist->rowCount() > 0){
            $userInfos = $checkifUserExist->fetch();
            if(password_verify($password, $userInfos['password'])){
               
            //authentifier user et recupere ses donnée
            $_SESSION['auth'] = true;;
            $_SESSION['id'] = $userInfos['id'];
            $_SESSION['lastname'] = $usersInfos['lastname'];

            //rediriger user
            header('Location: index.php');

            }else{
            $errorMsg = "Votre mot de passe est incorrect";

        }

        }else{
            $errorMsg = "Votre pseudo est incorrect";

        }
       

    }else {
        $errorMsg = "Veuillez compléter tout les champs";
    }

}