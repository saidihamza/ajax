<?php
try {
    $bdd = new PDO(
        'mysql:host=localhost;dbname=classicmodels;charset=utf8',
        'root',
        ''
    );
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$ville = $_GET['test'];
echo "SELECT * FROM offices WHERE city LIKE '%" . $ville . "%'";
$query = $bdd->prepare("SELECT * FROM offices WHERE city LIKE '%" . $ville . "%'"); //le valeur en voyer par get 
$query->execute();
$Tab_villes = $query->fetchAll(PDO::FETCH_ASSOC);
// echo count($Tab_villes);
// var_dump($Tab_villes);
?>
<?php
if (count($Tab_villes) == "0") {
    echo '<h1 style="color:red">le valeur saisie est incorrect!!!</h1>';
}
if (!empty($ville)) {

?><table> <tr>
            <th style="border: 1px solid black">nom</th>
            <th style="border: 1px solid black">phone</th>
            <th style="border: 1px solid black">country</th>
        </tr>
<?php foreach ($Tab_villes as $key) { ?>
    
       
        <tr style="color: blue ;border: 1px solid black;">
            <td style="color: blue ;border: 1px solid black;">nom:<?= $key['city'] ?></td>
            <td style="color: blue ;border: 1px solid black;">phone:<?= $key['phone'] ?></td>
            <td style="color: blue ;border: 1px solid black;">country:<?= $key['country'] ?></td>
        </tr>


    

<?php }
}?></table>