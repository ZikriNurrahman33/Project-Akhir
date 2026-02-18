<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <form method="post" action="login.php">
        <table border="1">
            <tr>
                <td colspan="2" align="center">
                    LOGIN ADMIN
                </td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type=text name=user></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type=password name=pass></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                <input type="submit" name="login" value="LOGIN">
                <input type="reset" name="cancel" value="CANCEL">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>