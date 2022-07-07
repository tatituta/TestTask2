<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=user', 'root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];

    $errorEmpty = false;
    $errorEmail = false;

    if (empty($fname) || empty($email) || empty($lname)){
        echo "<span class='form-error'> Fill in all fields</span>";
        $errorEmpty = true;
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<span class='form-error'>Write a valid e-mail address</span>";
        $errorEmail = true;
    } else {
        echo "<span class='form-success'>All fields were filled!</span>";
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];

        $statement = $pdo->prepare("INSERT INTO data(Name,LastName,Email) VALUES(:fname,:lname,:email)");
        $statement->bindValue(':fname',$fname);
        $statement->bindValue(':lname',$lname);
        $statement->bindValue(':email',$email);

        $statement->execute(); 
        
        header('Location: index.php');
    }
    
}
else {
    echo "There was an error";
}

?>

<script>
   $("#fname","#lname","#email").removeClass("input-error")

    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";

    if(errorEmpty == true) {
        $("#fname","#lname","#email").addClass("input-error");
    }
    if(errorEmail == true) {
        $("#email").addClass("input-error");

    }
    if(errorEmpty == false && errorEmail == false) {
        $("#fname","#lname","#email").val("");
        
    }
</script>