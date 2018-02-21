<?php

    if(isset($_POST['dodaj_diete_do_choroby'])){
        $main->dodaj_diete_do_choroby($_GET['edytuj_chorobe'], $_POST);
        echo '<div class="alert alert-success">
                  <strong>Dodano dietę do choroby !</strong>
              </div>';
    }

    if(isset($_GET['delete_dieta_z_choroby'])){
        $main->usun_diete_z_choroby($_GET['delete_dieta_z_choroby']);
        echo '<div class="alert alert-success">
                  <strong>Usunięto dietę z choroby !</strong>
              </div>';
    }

    $row = $main->informacje_o_chorobie($_GET['edytuj_chorobe']);
?>
<div class="row" style="margin-bottom: 30px;">
    <div class="col-md-7 col-md-offset-5"><h2><?php echo $row[0]->values()[0]->value('nazwa'); ?></h2></div>
</div>
<div class="row" style="margin-bottom: 30px;">
    <form action="" method="POST">
        <div class="col-md-5 col-md-offset-3">
            <select name="diety" class="form-control">
                <?php
                $main->print_diety_select();
                ?>
            </select>
        </div>
        <div class="col-md-1">
            <input type="submit" value="DODAJ" name="dodaj_diete_do_choroby" class="btn btn-info">
        </div>
    </form>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Lp</th>
            <th scope="col">Nazwa</th>
            <th>Akcja</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i=1;
        $rows = $main->print_diety_dla_choroby($_GET['edytuj_chorobe']);
        foreach ($rows as $row){
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$row->values()[0]->value('nazwa').'</td>';
            echo '<td><a href="?edytuj_chorobe='.$_GET['edytuj_chorobe'].'&delete_dieta_z_choroby='.$row->values()[1].'"><button class="btn btn-info">USUŃ</button></a></td>';
            echo '</tr>';
            $i++;
        }
        ?>
        </tbody>
    </table>
</div>