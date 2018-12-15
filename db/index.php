<!DOCTYPE html>
<?php
require_once 'autoload_custom.php';
require_once 'functions.php';


var_dump($_POST);
?>

<html>
<head>
    <title>Search form</title>
    <style>
        table {
            width: 100%;
            height: 800px;
            background: lightgoldenrodyellow;
            color: #333333;
            border-spacing: 0px;
            border-color: lightcyan;
        }
        td, th {
            background: white;
            padding: 10px;
        }
    </style>
</head>
<body>

<table border=1>
    <tr height=5%>
        <td width=300 rowspan=3 valign=top>
            <b>FILTERS</b><br><br>
            SEARCH USERS<br>
            <form method="POST" action="">
            <input type="checkbox" name="options" value="country">
            <b>Country:</b><br>
                <select name = "countries">
                    <option value = "at"> Austria </option>
                    <option value = "br"> Brazil </option>
                    <option value = "it"> Italy </option>
                    <option value = "no"> Norway </option>
                    <option value = "it"> Italy </option>
                    <option value = "jp"> Japan </option>
                    <option value = "pl"> Poland </option>
                    <option value = "po"> Portugal </option>
                    <option value = "ua" selected> Ukraine </option>
                    <option value = "uk"> United Kingdom </option>
                </select>
                <br>
<!--                <input type="checkbox" name="options2" value="">-->
<!--            <b>City:</b><br>-->
<!--                <select name = "cities">-->
<!--                    <option value = "Kiev"> Kiev </option>-->
<!--                    <option value = "Odessa" selected> Odessa </option>-->
<!--                    <option value = "Osaka"> Osaka </option>-->
<!--                    <option value = "Tokyo"> Tokyo </option>-->
<!--                    <option value = "Barcelona"> Barcelona </option>-->
<!--                    <option value = "Warszawa"> Warszawa </option>-->
<!--                    <option value = "Milan"> Milan </option>-->
<!--                    <option value = "Lviv"> Lviv </option>-->
<!--                    <option value = "London"> London </option>-->
<!--                    <option value = "Liverpool"> Liverpool </option>-->
<!--                </select>-->
                <br>
                <input type = "submit" name = "submit"><br>
            </form>
        </td>
        <td width=150 align=center style=background:lavender><a href = city.php style=color:darkslategray><b>CITY</b> </a></td>
        <td width=150 align=center style=background:lavender><a href = profile.php style=color:darkslategray><b>PROFILE</b></a></td>
        <td width=150 align=center style=background:lavender><a href = user.php style=color:darkslategray><b>USER</b></a></td>
        <td width=150 align=center style=background:lavender><a href = country.php style=color:darkslategray><b>COUNTRY</b></a></td>
        <td width=150 align=center style=background:lavender><a href = "" style=color:darkslategray><b>PHONE</b></a></td>
    </tr>

<!--    <tr height=15%>-->
<!--        <td colspan=5>-->
<!--            </td>-->
<!--    </tr>-->

    <tr height=95% >
        <td colspan=5 valign=top>
            <?php
            if (!empty($_POST))
            {
                showSearchResults();
            }

            ?>
        </td>
    </tr>

</table>

</body>

</html>
