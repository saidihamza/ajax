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
// var_dump($_GET);
$First_name = $_GET['name'];
$number = $_GET['number']; //si on declare les variables en hut on a pas besoin de de la concatunation 

// echo "SELECT firstName,employeeNumber FROM employees 
// WHERE firstName= '$First_name' AND employeeNumber='$number'";
$query = $bdd->prepare("SELECT firstName,employeeNumber FROM employees 
WHERE firstName= '$First_name' AND employeeNumber='$number'"); //le valeur en voyer par get 
$query->execute();
$Ident = $query->fetch(PDO::FETCH_ASSOC); // elle affiche un seul colonne pour cela on utilise fetch
//var_dump($Ident);
?>
<?php
if (!empty($number)&&strlen($First_name)) {
//pour vider le resultat obtenue
if (empty($Ident)) :
    echo ' error';

// $_GET['firstName'] =null;
// $_GET['fnumber'] =null;

else : ?>
<table>
    <tr>
        <th>name</th>
        <th>nombre</th>

    </tr>

    <tr>
        <td><?= $Ident['firstName'] ?>
        </td>
        <td><?= $Ident['employeeNumber'] ?></td>
    </tr>
</table>


<?php endif;
} 
?>