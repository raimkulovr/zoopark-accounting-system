<?php
$pet = (new PetMap())->findPetProfileById($id);
$keeper = (new PetMap())->findKeeperById($pet->keeper_id);
$vet = (new PetMap())->findVetById($pet->vet_id);
if ($pet) {
?>
<tr>
    <th>Имя</th>
    <td><?=$pet->name;?></td>
</tr>
<tr>
    <th>Пол</th>
    <td><?=$pet->gender;?></td>
</tr>
<tr>
    <th>Дата рождения</th>
    <td><?=date("d.m.Y", strtotime($pet->birthday));?></td>
</tr>
<tr>
    <th>Диета</th>
    <td><?=$pet->diet;?></td>
</tr>
<tr>
    <th>Место обитания</th>
    <td><?=$pet->habitat;?></td>
</tr>
<tr>
    <th>Смотритель</th>
    <td><?=$keeper->keeperName;?></td>
</tr>
<tr>
    <th>Ветеринар</th>
    <td><?=$vet->vetName;?></td>
</tr>
<?php } ?>
