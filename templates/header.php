<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Baza wiedzy</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/bootstrap.css?<?php echo time();?>">
    <link rel="stylesheet" href="assets/css/style.css?<?php echo time();?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">LOGOHERE</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="<?php if(empty($_GET)){echo 'active';}?>"><a href="/">Strona główna</a></li>
                    <li class="dropdown <?php if(isset($_GET['produkty']) || isset($_GET['choroby']) || isset($_GET['diety'])){echo 'active';}?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Panel administracyjny<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="?produkty">Produkty</a></li>
                            <li><a href="?choroby">Choroby</a></li>
                            <li><a href="?diety">Diety</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <form class="navbar-form navbar-left" action="" method="GET">
                        <label for="search">Słowo klucz:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Szukaj: choroba, dieta, produkt" name="search" id="search" style="width: 350px;">
                        </div>
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </form>
                </ul>
            </div>
        </div>
    </nav>