<?php
$petMap = new PetMap();
$pet = $petMap->findById($id);
?>
<div class="form-group">
    <label>Имя</label>
    <input type="text" class="form-control" name="name" required="required" value="<?=$pet->name;?>">
</div>
<div class="form-group">
    <label>Дата рождения</label>
    <input type="date" class="form-control" name="birthday" value="<?=$pet->birthday;?>">
</div>
<div class="form-group">
    <label>Пол</label>
    <select class="form-control" name="gender_id">
    <?=Helper::printSelectOptions($pet->gender_id, $petMap->arrGenders());?>
    </select>
</div>
<div class="form-group">
    <label>Диета</label>
    <select class="form-control" name="diet_id">
    <?=Helper::printSelectOptions($pet->diet_id, $petMap->arrDiets());?>
    </select>
</div>
<div class="form-group">
    <label>Место обитания</label>
    <select class="form-control" name="habitat_id">
    <?=Helper::printSelectOptions($pet->habitat_id, $petMap->arrHabitats());?>
    </select>
</div>
<div class="form-group">
    <label>Смотритель</label>
    <select class="form-control" name="keeper_id">
    <?=Helper::printSelectOptions($pet->keeper_id, $petMap->arrKeepers());?>
    </select>
</div>
<div class="form-group">
    <label>Ветеринар</label>
    <select class="form-control" name="vet_id">
    <?=Helper::printSelectOptions($pet->vet_id, $petMap->arrVet());?>
    </select>
</div>
<input type="hidden" name="pet_id" value="<?=$id;?>"/>