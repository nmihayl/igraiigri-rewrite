<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Online Игри - Igri - Igraiigri.com</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="bg" />

    <link rel="image_src" href="../screenshots/90_4536.jpg" />
    <meta property="og:site_name" content="Igrai Igri" />
    <meta property="og:title" content="Online Игри" />
    <meta property="og:type" content="game" />
    <meta property="og:image" content="http://www.igraiigri.com/screenshots/90_4536.jpg" />

    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    <link rel="stylesheet" media="only screen and (min-width: 1260px)" href="../css/big.css" />

    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />

    <script src="js/jquery-min.jsjquery.min.js"></script>
    <script type="text/javascript" src="../js/overall.js"></script>

</head>

<body id="group" class="light">

    <div id="tooltip"></div>
    <div id="container">
        <div id="header">
            <a href="../index.html" id="logo"><img src="../images/logos/igraiigri.png" alt="Igrai Igri" /></a>
            <div id="placeholder">
                <div id="search">
                    <form action="https://www.igraiigri.com/search/" method="get">
                        <input type="text" id="searchTerm" name="term">
                        <input type="image" id="searchButton" src="../images/search.png" width="32" height="32" border="0" ALT="Търси!">
                    </form>
                </div>
            </div>
        </div>
        <div id="wrapper">
            <div id="content">

           <!--  <div id="location"><a href="../index.html">Index</a> &raquo; <a href="../igrai/Класически+игри.html">Класически игри</a> &raquo; <span>Pacman</span>			<div id="addthis">
				<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
					<a class="addthis_button_preferred_1"></a>
					<a class="addthis_button_preferred_2"></a>
					<a class="addthis_button_preferred_3"></a>
					<a class="addthis_button_preferred_4"></a>
					<a class="addthis_button_compact"></a>
					<a class="addthis_counter addthis_bubble_style"></a>
				</div>
				<script type="text/javascript">var addthis_config = {"data_track_addressbar":false, "data_track_clickback":true,services_exclude: 'print'};</script>
				<script type="text/javascript" src="https://s7.addthis.com/js/250/addthis_widget.js#async=1&pubid=ra-51a3f1e74c71e307"></script>
			</div>
			</div> -->

                <?php
                $connection = new SQLite3('site.db');
                $results = $connection->query('SELECT * FROM game_data WHERE cat_id = "' . $_GET['cat_id'] . '" ORDER BY title COLLATE NOCASE ASC
                ');

                echo '<table class="bigThumbnail">';
                echo '<tr>';

                $count = 0;

                while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
                    $gameID = htmlspecialchars($row['id']);

                    echo '<td>';
                    echo '<a class="title" href="gameview.php?id=' . $gameID . '">' . htmlspecialchars($row['title']) . '</a>';
                    echo '<a href="gameview.php?id=' . $gameID . '"><img src="../screenshots/' . htmlspecialchars($row['screenshot_filename'] . '.jpg') . '" alt="Image"></a>';
                    echo '</td>';

                    // table cell row count logic
                    $count++;

                    if ($count % 4 === 0) {
                        echo '</tr>';
                        echo '<tr>';
                    }
                }

                echo '</tr>';
                echo '</table>';
                ?>



            </div>
            <div style="clear: both;"></div>
        </div>


</body>

</html>