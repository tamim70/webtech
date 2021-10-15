<!DOCTYPE html>
<html>

<head>
    <style>
    .uploadpic img {
        height: 200px;
    }
    .uploadpic {
        width: 100px;
    }
    </style>
    <title>Profile Picture</title>
</head>

<body>
    <div class="profilepic">
        <form action="profile.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend><B>PROFILE PICTURE</B></legend> <br>
                <div class="uploadpic">
                    <img src="uploadpic.jpg"><br><br>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
                <br>
                <hr>
                <input type="submit" name="submit">
        </form>
        </fieldset>
    </div>
</body>
</html>