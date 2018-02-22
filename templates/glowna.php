<?php
    if(isset($_POST['pokaz_diete'])){
        if(isset($_POST['dieta'])){
            header('Location: ?wyswietl_diete='.$_POST['dieta']);
        }else{
            echo '<div class="alert alert-danger">
                  <strong>Wybierz jakąś dietę !</strong>
              </div>';
        }
    }
?>

<script type="text/javascript">
    function fetch_select2(val){
        $.ajax({
            type: 'post',
            url: 'fetch_data.php',
            data: {
                get_option2:val
            },
            success: function (response) {
                document.getElementById("dieta").innerHTML=response;
            }
        });
    }
</script>

<div class="row" style="margin-bottom: 30px;">
    <div class="col-md-6 col-md-offset-3"><h2>Znajdź odpowiednią dla siebie dietę</h2></div>
</div>

<form action="" method="POST">
    <div class="row" style="margin-bottom: 15px;">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <select name="choroba" class="form-control" onchange="fetch_select2(this.value);">
                <option disabled selected>Choroba</option>
                <?php $main->print_choroba_option(); ?>
            </select>
        </div>
        <div class="col-md-4">
            <select name="dieta" id="dieta" class="form-control">

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