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
    <meta property="og:url" content="http://www.igraiigri.com/igrai/Online+%D0%98%D0%B3%D1%80%D0%B8" />
    <meta property="og:image" content="http://www.igraiigri.com/screenshots/90_4536.jpg" />
    <meta property="og:description"
        content="Тук ще намериш всички други онлайн игри, които не са подходящи за другите категории. " />
    <meta property="fb:admins" content="520971108" />
    <meta property="fb:app_id" content="130678773638421" />


    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    <link rel="stylesheet" media="only screen and (min-width: 1260px)" href="../css/big.css" />



    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
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
                        <input type="image" id="searchButton" src="../images/search.png" width="32" height="32"
                            border="0" ALT="Търси!">
                    </form>
                </div>
                <div id="dropdown">
                    <ul>
                        <li><a class="masterDropdown" href="../index.html">Igri</a>
                            <ul>
                                <li><a href="Адвенчър+Игри.html">Адвенчър Игри</a></li>
                                <li><a href="Летящи+игри.html">Летящи игри</a></li>
                                <li><a href="Забавни+игри.html">Забавни Игри</a></li>
                                <li><a href="Игри+в+мултиплеар.html">Игри в мултиплеар</a></li>
                                <li><a href="Логически+игри.html">Логически Игри</a></li>
                                <li><a href="Състезателни+игри.html">Състезателни Игри</a></li>
                                <li><a href="Трудни+игри.html">Трудни Игри</a></li>
                                <li><a href="Спортни+игри.html">Спортни Игри</a></li>
                                <li><a href="Платформени+игри.html">Платформени Игри</a></li>
                                <li><a href="Момичешки+игри.html">Момичешки Игри</a></li>
                                <li><a href="Телевизия+&amp;+Филми.html">Телевизия & Филми</a></li>
                                <li><a href="+Игри+на+даска+и+Карти.html"> Игри на даска и Карти</a></li>
                                <li><a href="Екшън+Игри.html">Екшън Игри</a></li>
                                <li><a href="Детски+игри.html">Детски Игри</a></li>
                                <li><a href="Online+Игри.html">Online Игри</a></li>
                                <li><a href="Класически+игри.html">Класически игри</a></li>
                                <li><a href="Симулации.html">Симулации</a></li>
                            </ul>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="wrapper">
            <div id="content">


                <?php
                $connection = new SQLite3('site.db');
                $results = $connection->query('SELECT * FROM html_data WHERE cat = "' . $_GET['cat'] . '" AND subcat = "' . $_GET['subcat'] . '"');

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