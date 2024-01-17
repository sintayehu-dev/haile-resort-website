<?php 
@include 'config.php';

if(isset($_POST['submit'])){
    $fullname =mysqli_real_escape_string($conn,$_POST['fullname']);
    $email =mysqli_real_escape_string($conn,$_POST['email']);
    $phone =$_POST['phone'];
    $roomt =$_POST['roomtype'];
    $chi =date("chi");
    $cho =date("cho");

$select = "SELECT * FROM double_room where email ='$email' && fullname ='$fullname' ";
$result = mysqli_query($conn , $select);

if(mysqli_num_rows($result)>0) {
    $error []='user already exist!';
} else {
     
        $insert="insert into double_room (fullname,email,phone,roomtype,chi,cho)
         values ('$fullname','$email','$phone','$roomt','$chi','$cho')";

          mysqli_query($conn, $insert);

        header('location:order.html');
    
}
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>book now</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="stylesfile.css">
</head>
<body>
<a href="room_page.html" title="back to room page" style="z-index: 2; position:fixed;top:10;left:10">
        <img src="images/back.jfif" width="50" height="50" alt="" >
    </a>

    <div class="form_container" style="background-image:url(images/room8.jpg);" >
        <form action="" method="post" style="text-transform: uppercase; background-color:azure">
            <h3>BOOK NOW</h3>
            <?php 
            if(isset($error)){
                foreach($error as $error) {
                    echo'<span class="error-msg">'.$error.'</span>';

                }
            };
            ?>
            
            <input type="text" name="fullname" style="border-radius:10px; border:1px solid;"  required placeholder="ENTER FULL NAME">
            <input type="email" name="email" style="border-radius:10px;border:1px solid"  required placeholder="ENTER YOUR EMAIL ADDRESS">
            <input type="text" name="phone" style="border-radius:10px;border:1px solid" required placeholder="ENTER YOUR PHONE NUMBER">
            <select name="roomtype" style="width: 558px; height:40px ;border :1px solid black; border-radius:10px;">
                <option value="" disabled >ROOM TYPE</option>
                <option value="SINGLE ROOM" disabled>SINGLE ROOM</option>
                <option value="DOUBLE ROOM" selected="selected" >DOUBLE ROOM</option>
                <option value="SUIT ROOM"disabled >SUIT ROOM</option>
                <option value="FAMILY ROOM" disabled >FAMILY ROOM</option>
                <option value="EXCLUSIVE ROOM" disabled >EXCLUSIVE ROOM</option>
            </select>
            <input type="text" name="chi"  style="border-radius:10px;border:1px solid"   placeholder=" CHECK IN DATE" onfocus="(this.type='date')" >
            <input type="text" name="cho"   style="border-radius:10px;border:1px solid" placeholder=" CHECK OUT DATE" onfocus="(this.type='date')" >
            
            <input type="submit" name="submit" value="book now" style="border-radius:10px;border:1px solid" class="form-btn">
            <input type="reset" name="clear" value="reset" style="border-radius:10px;border:1px solid" class="form-btn">
           
        </form>
       

    </div>
</body>
</html>