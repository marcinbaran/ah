<div class="container content">
    <?php
        if(empty($_GET)){
            require_once('glowna.php');
        }
        if(isset($_GET['search'])){
            require_once('search.php');
        }
        if(isset($_GET['produkty'])){
            require_once('produkty.php');
        }
        if(isset($_GET['choroby'])){
            require_once('choroby.php');
        }
        if(isset($_GET['diety'])){
            require_once('diety.php');
        }
        if(isset($_GET['edytuj_chorobe'])){
            require_once('edytuj_chorobe.php');
        }
        if(isset($_GET['edytuj_diete'])){
            require_once('edytuj_diete.php');
        }

    ?>
</div>