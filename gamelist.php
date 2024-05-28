<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Language" content="bg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Игри - Igri - Igraiigri.com</title>
    <meta property="og:site_name" content="Igrai Igri">
    <meta property="og:title" content="Online Игри">
    <meta property="og:type" content="game">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" media="only screen and (min-width: 1260px)" href="/css/big.css">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <script src="/js/jquery-min.js"></script>
    <script src="/js/overall.js"></script>
</head>
<body id="group" class="light">
<div id="tooltip"></div>
<div id="container">
    <div id="header">
        <a href="index.html" id="logo"><img src="/images/logos/igraiigri.png" alt="Igrai Igri"></a>
        <div id="placeholder">
            <div id="search">
                <form action="https://www.igraiigri.com/search/" method="get">
                    <label for="searchTerm"></label><input type="text" id="searchTerm" name="term">
                    <input type="image" id="searchButton" src="/images/search.png" width="32" height="32" alt="Търси!">
                </form>
            </div>
        </div>
    </div>
    <div id="wrapper">
        <?php
        // Database connection
        $connection = new SQLite3('site.db');
        $cat_id = htmlspecialchars($_GET['cat_id'], ENT_QUOTES, 'UTF-8');

        // Fetching category background
        $stmt = $connection->prepare('SELECT "cat-bg" FROM cat WHERE "cat_id" = :cat_id');
        $stmt->bindValue(':cat_id', $cat_id, SQLITE3_TEXT);
        $result = $stmt->execute()->fetchArray(SQLITE3_ASSOC);
        ?>

        <div id="location">
            <a href="/index.html">Index</a> &raquo;
            <?php if ($result): ?>
                <a href="/gamelist.php?id=<?php echo $cat_id; ?>"><?php echo htmlspecialchars($result['cat-bg'], ENT_QUOTES, 'UTF-8'); ?></a>
            <?php endif; ?>
        </div>

        <?php
        // Fetching game data
        $stmt = $connection->prepare('SELECT * FROM game_data WHERE cat_id = :cat_id ORDER BY title COLLATE NOCASE ASC');
        $stmt->bindValue(':cat_id', $cat_id, SQLITE3_TEXT);
        $results = $stmt->execute();

        echo '<table class="bigThumbnail"><tr>';

        $count = 0;

        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            $gameID = htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');
            $title = htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');
            $imgSrc = htmlspecialchars('../screenshots/90_' . $row['id'] . '.jpg', ENT_QUOTES, 'UTF-8');

            echo '<td>';
            echo '<a class="title" href="gameview.php?id=' . $gameID . '">' . $title . '</a>';
            echo '<a href="gameview.php?id=' . $gameID . '"><img src="' . $imgSrc . '" alt="Image"></a>';
            echo '</td>';

            $count++;
            if ($count % 4 === 0) {
                echo '</tr><tr>';
            }
        }

        echo '</tr></table>';
        ?>
    </div>
</div>
</body>
</html>
