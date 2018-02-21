<?php

    if(isset($_POST['dodaj_produkt'])){
        $main->dodaj_produkt_do_diety($_GET['edytuj_diete'], $_POST);
        echo '<div class="alert alert-success">
                  <strong>Dodano produktu do diety !</strong>
              </div>';
    }

    if(isset($_GET['usun_produkt_z_diety'])){
        $main->usun_produkt_z_diety($_GET['usun_produkt_z_diety']);
        echo '<div class="alert alert-success">
                  <strong>Usunięto produkt z diety !</strong>
              </div>';
    }

    if(isset($_POST['dodajopis'])){
        $main->dodaj_opis_diecie($_GET['edytuj_diete'], $_POST);
        echo '<div class="alert alert-success">
                  <strong>Zaktualizowano opis diety !</strong>
              </div>';
    }


    $row = $main->informacje_o_diecie($_GET['edytuj_diete']);
    if(isset($row[0]->values()[0]->values()['opis'])){
        $opis_diety = $row[0]->values()[0]->values()['opis'];
    }else{
        $opis_diety = '';
    }
?>

<script type="text/javascript">
    function fetch_select(val){
        $.ajax({
            type: 'post',
            url: 'fetch_data.php',
            data: {
                get_option:val
            },
            success: function (response) {
                document.getElementById("produkt").innerHTML=response;
            }
        });
    }
</script>

<div class="row" style="margin-bottom: 30px;">
    <div class="col-md-7 col-md-offset-5"><h2><?php echo $row[0]->values()[0]->value('nazwa'); ?></h2></div>
</div>

<div class="row" style="margin-bottom: 50px;">
    <form action="" method="POST">
        <div class="col-md-3">
            <select name="kategoria" class="form-control" onchange="fetch_select(this.value);">
                <option>Kategoria</option>
                <?php $main->print_kategorie_select(); ?>
            </select>
        </div>
        <div class="col-md-3">
            <select name="produkt" class="form-control" id="produkt">

            </select>
        </div>
        <div class="col-md-3">
            <select name="zalecenia" class="form-control">
                <option>Zalecany</option>
                <option>Niewskazany</option>
                <option>Dozwolony w umiarkowanych ilościach</option>
            </select>
        </div>
        <div class="col-md-3">
            <input type="submit" name="dodaj_produkt" value="DODAJ" class="btn btn-info">
        </div>
    </form>
</div>
<div class="row" style="margin-bottom: 50px;">
    <form action="" method="POST">
        <div class="col-md-2" style="text-align: right">Opis:</div>
        <div class="col-md-7"><textarea class="form-control" name="opis" rows="8"><?php echo $opis_diety; ?></textarea></div>
        <div class="col-md-1"><input type="submit" name="dodajopis" value="ZAPISZ" class="btn btn-info"></div>
        <div class="col-md-2"></div>
    </form>
</div>

<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Lp</th>
            <th scope="col">Kategoria</th>
            <th>Produkt</th>
            <th>Zalecenie zywieniowe</th>
            <th>Akcja</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i=1;
        $rows = $main->print_produkty_w_diecie($_GET['edytuj_diete']);
        foreach($rows as $row){
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$main->print_kategoria_produktu($row->values()[0]->value('nazwa')).'</td>';
            echo '<td>'.$row->values()[0]->value('nazwa').'</td>';
            echo '<td>';
                if($row->values()[1]->type() == 'Dozwolony_w_umiarkowanych_ilościach'){echo 'Dozwolony w umiarkowanych ilościach';}else{echo $row->values()[1]->type();}
            echo '</td>';
            echo '<td><a href="?edytuj_diete='.$_GET['edytuj_diete'].'&usun_produkt_z_diety='.$row->values()[2].'"><button class="btn btn-info">USUŃ</button></a> </td>';
            echo '</tr>';
            $i++;
        }
        ?>
        </tbody>
    </table>
</div>
