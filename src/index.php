<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php if(!empty($_GET['uri'])) { ?>
    <p>Está tentando acessar a uri [<?php echo $_GET['uri']; ?>]?</p>
<?php } ?>

<ul>
    <li>
        <a href="/">Home</a>
    </li>
    <li>
        <a href="/menu1">Menu 1</a>
    </li>
    <li>
        <a href="/menu2">Menu 2</a>
    </li>
</ul>

<h1>Environment variables</h1>

<h2>Fixo no vhost.conf</h2>

<?php echo "\$_SERVER['MYSQL_USER']: {$_SERVER['MYSQL_USER']}";  ?>

<h2>Dinâmico no vhost.conf</h2>

<p>Esta variável está sendo repassada pelo vhost.conf, mas foi definida no docker-compose.yml:</p>

<?php echo "\$_SERVER['MYSQL_PASSWORD']: {$_SERVER['MYSQL_PASSWORD']}";  ?>

<h2>docker-compose.yml</h2>

<?php 
    $mysqlPassword=getenv('MYSQL_PASSWORD');
    echo "getenv('MYSQL_PASSWORD'): {$mysqlPassword}";
?>

</body>
</html>