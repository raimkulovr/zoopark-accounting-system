<?php
require_once 'autoload.php';
if (isset($_POST['pet_id'])) {
    $pet = new Pet();
    $pet->pet_id= Helper::clearInt($_POST['pet_id']);
    $pet->name = Helper::clearString($_POST['name']);
    $pet->birthday = Helper::clearString($_POST['birthday']);
    $pet->gender_id = Helper::clearInt($_POST['gender_id']);
    $pet->habitat_id = Helper::clearInt($_POST['habitat_id']);
    $pet->keeper_id = Helper::clearInt($_POST['keeper_id']);
    $pet->vet_id = Helper::clearInt($_POST['vet_id']);
    $pet->diet_id = Helper::clearInt($_POST['diet_id']);
    
    if (isset($_POST['saveBird'])) {
        $bird = new Bird();
        $bird->country_id = Helper::clearInt($_POST['country_id']);
        $bird->date_out = Helper::clearString($_POST['date_out']);
        $bird->date_in = Helper::clearString($_POST['date_in']);
        $bird->bird_id = $pet->pet_id;
        $bird->pet_id = $pet->pet_id;
        if ((new BirdMap())->save($pet, $bird)) {
            header('Location: profile-bird.php?id='.$bird->pet_id);
        } else {
            if ($bird->pet_id) {
                header('Location: add-bird.php?id='.$bird->pet_id);
            } else {
                header('Location: add-bird.php');
            }
        }
        exit();
    }
}