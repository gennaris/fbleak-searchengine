<!DOCTYPE html>
<html>
<head>
    <title>Fbleak Search Engine</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/app.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/app.js"></script>
</head>
<body>
    <form class="searchBox" autocomplete="off" onsubmit="ajax_submit();return false;">
    <input type="text" placeholder="Search.." id="search" name="search">
    </form>
    <div id="display">
    </div>
</body>
</html>
