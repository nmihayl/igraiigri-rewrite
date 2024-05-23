<?php
$connection = new SQLite3('site.db');
$results = $connection->query('SELECT * FROM html_data');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Game List</title>
    <meta charset="utf-8">

</head>

<body>
    <header>
    </header>
    <main>
        <div>
            <?php
            while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
                echo '
                <td>' . $row['title'] . '</td>
                <td>';
                if (!empty($row['id'])) {
                    echo '<a href="https://playground.helliolab.giize.com/gameview.php?id=' . $row['id'] . '" target="_blank">' . $row['id'] . '</a><br><br>';
                }
                echo '</td></tr>';
            }
            echo '</table>';
            ?>

        </div>
    </main>
    <footer>
        <br>
    </footer>
</body>

</html>