<!DOCTYPE html>
<html>
<head>
    <title>Search form</title>
</head>
<body>
    <a href = city.php>     City    </a><br>
    <a href = profile.php>  Profile </a><br>
    <a href = user.php>     User    </a><br>
    <a href = country.php>  Country </a><br>
    <a href = phone.php>    Phone   </a><br>


    <br><b>Отобрать пользователей по стране:</b>
    <form method="POST" action="country.php">
            <select name = "countries">
                <option value = "jp"> Japan </option>
                <option value = "pl"> Poland </option>
                <option value = "ua"> Ukraine </option>
                <option value = "uk"> United Kingdom </option>
		    </select>
    <br>
    <input type = "submit" name = "submit"><br>
    </form>
</body>
</html>
