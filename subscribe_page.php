<?php 
@include 'config.php';

if(isset($_POST['submit'])){
  $name1 =mysqli_real_escape_string($conn,$_POST['name']);
  $email1 =mysqli_real_escape_string($conn,$_POST['email']);
 
 
$select = "SELECT * FROM subscribe_form where fullname ='$name1' && email ='$email1' ";
$result = mysqli_query($conn , $select);

if(mysqli_num_rows($result)>0) {
    $error []='user already exist!';
} else {
        $insert="insert into subscribe_form(fullname,email) values ('$name1','$email1')";
        mysqli_query($conn, $insert);
        header('location:subscribe.html');
    
}
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>subscribe_form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="stylesfile.css">
</head>
<body>
<a href="order.html" title="back to home" style="z-index: 2; position:fixed;top:10;left:10">
        <img src="images/back.jfif" width="50" height="50" alt="" >
    </a>
    <div class="form_container" >
        <form action="" method="post" >
            <h3 style="color:rgb(212, 12, 219);">subscribe</h3>
            <?php 
            if(isset($error)){
                foreach($error as $error) {
                    echo'<span class="error-msg">'.$error.'</span>';

                }
            };
            ?>
            
            <input type="text" name="name" style="border-radius:10px;border:1px solid"  required placeholder="ENTER FULL NAME">
            <input type="email" name="email" style="border-radius:10px;border:1px solid"  required placeholder="ENTER YOUR EMAIL ADDRESS">
            <input type="submit" name="submit" style="border-radius:10px;border:1px solid"  value="SUBSCRIBE" class="form-btn">
            <input type="reset" name="clear" style="border-radius:10px;border:1px solid"  value="RESET" class="form-btn">
           

        </form>
       

    </div>
</body>
</html>