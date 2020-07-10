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
        $pdo->query("UPDATE produit SET quantité=1 WHERE id=4");
        
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
    



    echo "<ul>";
 
foreach ($users as $user) 
  
{
    echo "<li>" . $user["nom"];"<li/>";
   
}
    echo "<ul/>";
?>

</body>

</html>