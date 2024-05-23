<?php
$connection = new SQLite3('site.db');
$results = $connection->query('SELECT * FROM html_data');
$gameID = htmlspecialchars($_GET['id']);

$titleResult = $connection->query("SELECT title FROM html_data WHERE id = $gameID");
$row = $titleResult->fetchArray(SQLITE3_ASSOC);
$gameTitle = $row['title'];

$imageResult = $connection->query("SELECT screenshot_filename FROM html_data WHERE id = $gameID");
$row = $imageResult->fetchArray(SQLITE3_ASSOC);
$imageResult = $row['screenshot_filename'];
?>

<!DOCTYPE html>

<head>
    <title><?php echo $gameTitle; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="bg" />
    <link rel="image_src" href="<?php echo $imageResult . '.jpg'; ?>" />
    <meta property="og:site_name" content="Igrai Igri" />
    <meta property="og:title" content="<?php echo $gameTitle; ?>" />
    <meta property="og:type" content="game" />
    <meta property="og:url" content="https://playground.helliolab.giize.com" />
    <meta property="og:image" content="<?php echo $imageResult . '.jpg'; ?>" />
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    <link rel="stylesheet" media="only screen and (min-width: 1260px)" href="../css/big.css" />
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />
    <script type="text/javascript" src="../js/jquery-min.js"></script>
    <script type="text/javascript" src="../js/overall.js"></script>
    <script type="text/javascript" src="../js/swfobject.js"></script>
</head>

<body id="game" class="light" onload="finishPreroll();">
    <div id="tooltip"></div>
    <div id="container">
        <div id="header">
            <a href="../index.html" id="logo"><img src="../images/logos/igraiigri.png" alt="Igrai Igri" /></a>
        </div>
        <div id="wrapper">
            <div id="content">
                <script type="text/javascript">
                    var gameStartWidth = 500;
                    var gameStartHeight = 400;
                    var resizeable = 'yes';
                    var timer;
                    var prerollTimer = 0;
                    var prerollLength = 1500;
                    var prerollSkippable = 200;
                    var prerollStart = +new Date;
                    var prerollPassed = 0;
                    var loadingText = 'Играта започва след %gameTimer% секунди...';
                    var leaderboardDistance = '120';
                    var voteUrl = '/?p=vote&id=6798&time=1711811420&hash=4c8a8075c5cf52b8a1ab21f84343ff18';
                </script>
                <div id="gameBlock">
                    <div></div>
                    <div id="gameHolder" style="margin-bottom:90px;">
                        <div id="gameTitle">
                            <span><?php echo $gameTitle; ?></span>
                            <a href="javascript: fullScreen();" id="fullscreen">Scale</a>
                            <button onclick="location.href='https://playground.helliolab.giize.com/gameview.php?id=<?php
                                                                                                                    $connection = new SQLite3('site.db');
                                                                                                                    $maxIdResult = $connection->query('SELECT max(rowid) FROM html_data');
                                                                                                                    $maxId = $maxIdResult->fetchArray(SQLITE3_ASSOC)['max(rowid)'];
                                                                                                                    $randomId = rand(1, $maxId);
                                                                                                                    echo $randomId;
                                                                                                                    ?>'">Play Random Game</button>

                        </div>
                        <div id="gameWrapper">
                            <div id="gamePreroll">
                                <script type="text/javascript">
                                    $(function() {
                                        finishPreroll();
                                    });
                                </script>
                            </div>

                            <div id="gameContent" style="width: 300px; height: 300px;">
                                <div id="gameSWF">Game is loading... </div>
                                <script type="text/javascript">
                                    flashvars = {}
                                    params = {
                                        allowScriptAccess: 'never',
                                        base: '/assets',
                                        quality: 'high',
                                        wmode: 'opaque'
                                    };
                                    attributes = {};
                                    <?php echo 'swfobject.embedSWF("/flash/' . $gameID . '.swf", "gameSWF", "100%", "100%", "9.0.0", false, flashvars, params, attributes)'; ?>
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="clear: both;"></div>
            </div>
</body>

</html>
</body>

</html>