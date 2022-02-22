<?php
require __DIR__ . '/Classes/CRUD.php';

CRUD::Create('Laroche', 'Alexis', 26);

echo "<pre>";
print_r(CRUD::Read());
echo "</pre>";

CRUD::Update('Lenon', 'Jhon', 34, 2);

CRUD::Delete(3);