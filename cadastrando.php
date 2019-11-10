<?php
$nome=$_POST['nome'];
$email=$_POST['email'];
$telefone=$_POST['telefone'];
$datnasc=$_POST['datnasc'];
$cargo=$_POST['cargo'];
$salario=$_POST['salario'];
$foto=$_POST['foto'];

try {
    $result = 0;
    $link = mysqli_connect("localhost", "root", "", "system_test");
    $sql = mysqli_query($link, "INSERT INTO users(nome, email, telefone, datnasc, cargo, salario, foto)
VALUES('$nome','$email','$telefone','$datnasc','$cargo','$salario','$foto')", $result);
} catch (\Exception $e) {
    echo "Error!: " . $e->getMessage();
    die;
}

$user = "root";
$pass = "";
$host = "localhost";
$db   = "system_test";

$connection = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
$users = $connection->query('SELECT * from users');
$users->setFetchMode(PDO::FETCH_INTO, new stdClass);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
</head>
<body>

<table>
    <thead>
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Telefone</th>
    <th>Data de Nascimento</th>
    <th>Cargo</th>
    <th>Salario</th>
    <th>Foto</th>
    </thead>
    <tbody>
    <?php foreach($users as $user): ?>
        <tr>
            <td><?php echo $user->id; ?></td>
            <td><?php echo $user->nome; ?></td>
            <td><?php echo $user->email; ?></td>
            <td><?php echo $user->telefone; ?></td>
            <td><?php echo $user->datnasc; ?></td>
            <td><?php echo $user->cargo; ?></td>
            <td><?php echo $user->salario; ?></td>
            <td><?php echo $user->foto; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
