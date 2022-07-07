<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=user', 'root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT * FROM data');
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>  
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="data">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <?php foreach ($users as $i=> $user) { ?>

            <tr>
                <td><?php echo $i+1 ?> </td>
                <td><?php echo $user['Name']?> </td>
                <td><?php echo $user['LastName']?> </td>
                <td><?php echo $user['Email']?> </td>
                <td>
               <form action="delete.php" method="post" class="delete">
                <input type="hidden" name="id" value="<?php echo $user['id'] ?>"/>
                <button type="submit" class="btn-red">Delete</a>
                </form>
             </td>
            </tr>

        <?php } ?>
    
    </table>
    </div>


</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/less@4" ></script>
</body>
</html>