<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SQL</title>
    </head>

    <body>
    
    <?php
function connect_to_database()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "BaseTest01";

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "connected successfully";

        return $pdo;
    } catch (PDOException $e) {
        echo "connection failed: ". $e->getMessage();
    }
}




$pdo = connect_to_database();

$query = $pdo->query("SELECT * FROM produit");
$user = $query->fetch();
var_dump($user);


$users = $pdo->query("SELECT * FROM produit WHERE nom IS NOT NULL")->fetchAll();
var_dump($users);
    
$pdo->query("INSERT INTO produit (id, nom, description, prix, quantité) VALUES
    (8, 'T-shirt noir', 'T-shirt coton de couleur noir', 15.5, 10)");


    echo "<ul>";
 
foreach ($users as $user) 
  
{
    echo "<li>" . $user["nom"];"<li/>";
   
}
    echo "<ul/>";
?>

</body>

</html>