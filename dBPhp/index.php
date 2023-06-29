<?php


$host = '127.0.0.1'; //localhost
$db = 'zuikis';
$user = 'root';
$pass = '';
$charset = 'utf8mb4'; //simboliu sarasas - defoltas visokiu tipu simboliai
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);


// SELECT column1, column2, ...
// FROM table_name;

//paemimas is duomenu bazes
//bektikuose jei nori isskiri pavadinima
$sql = "
     SELECT id, title, height, `type`
     FROM trees
     WHERE type = 1 || type = 2 || type = 3 && height >1
     ORDER BY type, height DESC
";

//perdavimas i querry
$stml = $pdo->query($sql); //DB steitmentas
$trees = $stml->fetchAll(); //Visi medziai

$types = [
    1 => 'Lapuotis',
    2 => 'Spygliuotis',
    3 => 'Palmė'
]

    ?>

<table>
    <tr>
        <th>ID</th>
        <th>Pavadinimas</th>
        <th>Aukstis</th>
        <th>Tipas</th>
    </tr>
    <?php foreach ($trees as $tree): ?>
        <tr>
            <td>
                <?= $tree['id'] ?>
            </td>
            <td>
                <?= $tree['title'] ?>
            </td>
            <td>
                <?= $tree['height'] ?>
            </td>
            <td>
                <?= $types[$tree['type']] ?>
            </td>
        </tr>
    <?php endforeach ?>
</table>