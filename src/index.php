<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<h1>$_SERVER</h1>

<p> <strong>REMOTE_ADDR</strong>: <?php echo $_SERVER['REMOTE_ADDR']; ?> </p>
<p> <strong>SERVER_NAME</strong>: <?php echo $_SERVER['SERVER_NAME']; ?> </p>

<?php if(!empty($_GET['uri'])) { ?>
    <p style="color: red">Está tentando acessar a uri <strong>[<?php echo $_GET['uri']; ?>]</strong>?</p>
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

<?php echo "\$_SERVER['APACHE_FIXED_ENV_VAR']: {$_SERVER['APACHE_FIXED_ENV_VAR']}";  ?>

<h2>Dinâmico no vhost.conf</h2>

<p>Esta variável está sendo repassada pelo vhost.conf, mas foi definida no docker-compose.yml:</p>

<?php echo "\$_SERVER['APACHE_FROM_DOCKER_ENV_VAR']: {$_SERVER['APACHE_FROM_DOCKER_ENV_VAR']}";  ?>

<h2>docker-compose.yml</h2>

<p>
    <?php 
        $dbName=getenv('DB_HOST');
        echo "getenv('DB_HOST'): {$dbName}";
    ?>
</p>

<p>
    <?php 
        $dbName=getenv('DB_NAME');
        echo "getenv('DB_NAME'): {$dbName}";
    ?>
</p>

<p>
    <?php 
        $mysqlPassword=getenv('DB_USER');
        echo "getenv('DB_USER'): {$mysqlPassword}";
    ?>
</p>

<p>
    <?php 
        $dbPass=getenv('DB_PASS');
        echo "getenv('DB_PASS'): {$dbPass}";
    ?>
</p>

<p>
    <?php 
        $apacheFromDockerEnvVar=getenv('APACHE_FROM_DOCKER_ENV_VAR');
        echo "getenv('APACHE_FROM_DOCKER_ENV_VAR'): {$apacheFromDockerEnvVar}";
    ?>
</p>

<h1>Users from database: </h1>

<?php $users = require './model.users.php'; ?>

<?php if($users['success']) { ?>
    <table cellpadding="6">
        <thread>
            <tr>
                <th>Name</th>
                <th>E-mail</th>
                <th>Password</th>
            </tr>
        </thread>
        <tbody>
            <?php foreach($users['data'] as $user) { ?>
                <tr>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['password']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>

</body>
</html>