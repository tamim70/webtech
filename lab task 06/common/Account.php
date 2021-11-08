<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <style>
    .left {
        margin-left: 1rem;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        font-size: 18px;
    }

    nav {

        margin-top: 1rem;
        min-height: 10vh;
        width: 30rem;

        margin: auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0px;
    

    </style>
</head>

<body>
    <div class="account">
        <nav>
            <fieldset>
                <h1>Profile</h1>
                <hr>
                <div class="left">

                    <?php
                    //using list in html is not perfect. it wont work. so using php is best. and active.
                    echo  
                        "<a href='viewprofile.php'>>View Profile</a> <br><br>
                        <a href='Editprofile.php'>>Edit Profile</a> <br><br>
                        <a href='profilepicture.php'>>Change profile picture</a> <br><br>
                        <a href='changepassword.php'>>Change password</a> <br><br>
                         <a href='search.php'>>search</a> <br><br>
                          <a href='payment.php'>>Payment</a> <br><br>
                        <a href='logout.php'>>Logout</a>"
                        //in html href then "".. but php only ''...
                    ?>
                </div>
            </fieldset>
        </nav>

    </div>

</body>


</html>