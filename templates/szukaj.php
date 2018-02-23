<div class="row" style="margin-top: 20px; margin-bottom: 50px;">
    <form action="" method="POST">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <select name="choroba" class="form-control">
                <option disabled selected>Wybierz chorobe</option>
                <?php $main->print_choroba_option(); ?>
            </select>
        </div>
        <div class="col-md-3">
            <input type="text" name="produkt" placeholder="Nazwa produktu ..." class="form-control" required>
        </div>
        <div class="col-md-3">
            <input type="submit" value="SZUKAJ" name="szukaj" class="btn btn-info">
        </div>
    </form>
</div>

<?php
if(isset($_POST['szukaj'])){
    //print_r($main->print_szukaj($_POST));
    $row = $main->print_szukaj($_POST);
    if(!empty($row)){
        echo 'Produkt: '.$_POST['produkt'],' jest '.$row[0]->values()[1]->type().' w chorobie: '.$_POST['choroba'];
    }else{
        echo 'Brak informacji o podanym produkcie dla wybranej choroby';
    }

}
?>