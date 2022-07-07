
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit</title>
    <link rel="stylesheet" href="style.css">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
 $(document).ready(function(){
            $("form").submit(function(event){
                event.preventDefault();
                var fname = $("#fname").val();
                var lname = $("#lname").val();
                var email = $("#email").val();
                $(".show").load("validate.php",{
                    fname: fname,
                    lname: lname,
                    email: email
                });
            });
        });
    </script>

</head>
<body>
<div>
    <form action="validate.php" method="POST" class="frm">
        <label>First Name</label>
        <input id="fname" type="text" name="fname" value="" placeholder="Enter your name"  class="">
        <label>Last Name</label>
        <input id="lname" type="text" name="lname"  value="" placeholder="Enter your Last name"  class="">
        <label>Email</label>
        <input id="email" type="text" name="email" value="" placeholder="Enter Email"   class="">
        <div class="btn">
        <button id="submit" type="submit" name="save" class="submit" value="Submit">Submit</button>
        </div>
    </div>
        <div class="show"></div>
      </form>
</div>
</body>
</html>