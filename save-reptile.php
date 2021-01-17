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
    
    if (isset($_POST['saveReptile'])) {
        $reptile = new Reptile();
        $reptile->temperature = Helper::clearInt($_POST['temperature']);
        $reptile->hibernation_time = Helper::clearInt($_POST['hibernation_time']);

        $reptile->reptile_id = $pet->pet_id;
        $reptile->pet_id = $pet->pet_id;
        if ((new ReptileMap())->save($pet, $reptile)) {
            header('Location: profile-reptile.php?id='.$reptile->pet_id);
        } else {
            if ($reptile->pet_id) {
                header('Location: add-reptile.php?id='.$reptile->pet_id);
            } else {
                header('Location: add-reptile.php');
            }
        }
        exit();
    }
}