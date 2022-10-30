<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0"> 
    <title>To do List | w ramach studiuje IT</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="header-img">
            <img src=".\images\logo.jpg" alt="">
        </div>
        <nav class="nav">
            <ul>
                <li><a class="link <?php if($this->action=="indx") echo 'active' ?>" href="/">Start</a></li>
                <li><a class="link <?php if($this->action=="list") echo 'active' ?>" href="/?action=list">Wyświetl listę</a></li>
                <li><a class="link <?php if($this->action=="add") echo 'active' ?>" href="/?action=add">Dodaj zadanie</a></li>                
            </ul>
        </nav>
    </header>
    <?php 
        require_once APP_DIR .'/../views/'.$tmplt.'.php';
    ?>
    
    <footer>Ucze się gita, utrwalam HTML5, CSS i PHP i musze to wykonać bo robie ścieżkę na Studiuje.IT</footer>
    <script src="script.js"></script>
</body>
</html>