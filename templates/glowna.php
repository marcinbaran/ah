<?php
    if(isset($_POST['pokaz_diete'])){
        if(isset($_POST['choroba']) && isset($_POST['dieta'])){
            echo '<div class="alert alert-danger">
                  <strong>Wybierz albo chorobę albo dietę !</strong>
              </div>';
        }elseif(isset($_POST['dieta'])){
            header('Location: ?wyswietl_diete='.$_POST['dieta']);
        }elseif(isset($_POST['choroba'])){
            header('Location: ?wyswietl_chorobe='.$_POST['choroba']);
        }else{
            echo '<div class="alert alert-danger">
                  <strong>Wybierz jakąś opcję !</strong>
              </div>';
        }
    }
?>
<div class="row" style="margin-bottom: 30px;">
    <div class="col-md-6 col-md-offset-3"><h2>Znajdź odpowiednią dla siebie dietę</h2></div>
</div>

<form action="" method="POST">
    <div class="row" style="margin-bottom: 15px;">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <select name="choroba" class="form-control">
                <option disabled selected>Choroba</option>
                <?php $main->print_choroba_option(); ?>
            </select>
        </div>
        <div class="col-md-4">
            <select name="dieta" class="form-control">
                <option disabled selected>Dieta</option>
                <?php $main->print_dieta_option(); ?>
            </select>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2 col-md-offset-5">
            <input type="submit" value="POKAŻ DIETĘ" name="pokaz_diete" class="btn btn-info" style="margin-left:22px;">
        </div>
    </div>
</form>