<!-- 
    *************************************************
    *Author:Haotian Zhang
    *Date: Feb 06 2019
    *Purpose: show link page
    *
    *************************************************
 -->
<!DOCTYPE html>
<html>

<head>
    <?php include_once 'head.php';?>
</head>

<body>
    <?php
        require_once "header.php";
        require_once "menu.php";
    ?>
    <header>
        <h1>Links Page</h1>
    </header>
    <?php
        require_once "variable.php";
        echo "<table id='linkTable'>";
        $i = 1;
        foreach ($variableArray as $label => $url) {
            echo "<tr>";
            echo "<td>" . $i++ . "</td>";
            echo "<td><a href='$url' target='_blank'>$label</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
<?php
    include_once "footer.php";
?>
</body>

</html>