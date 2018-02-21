<?php
    if(isset($_GET['delete_product'])){
        $main->delete_product($_GET['delete_product']);
        echo '<div class="alert alert-success">
                  <strong>Produkt został usunięty!</strong>
              </div>';
    }

    if(isset($_POST['dodaj_produkt'])){
        $main->dodaj_produkt($_POST);
        echo '<div class="alert alert-success">
                  <strong>Dodano nowy produkt!</strong>
              </div>';
    }



    $total = $main->liczba_produktow();
    $limit = 30;
    $pages = ceil($total / $limit);
    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
        'options' => array(
            'default'   => 1,
            'min_range' => 1,
        ),
    )));
    $skip = ($page - 1) * $limit;
    $start = $skip + 1;
?>
<div class="row">
    <div class="col-md-2 col-md-offset-5"><h2>Produkty</h2></div>
</div>
<br>
<div class="row" style="margin-bottom: 50px;">
    <form action="" method="POST">
        <div class="col-md-3 col-md-offset-3">
                <select class="form-control" name="grupa_produktow">
                    <?php $main->print_kategorie_select(); ?>
                </select>
        </div>
        <div class="col-md-3">
            <input type="text" name="produkt" class="form-control" placeholder="Nazwa...">
        </div>
        <div class="col-md-3">
            <input type="submit" name="dodaj_produkt" value="DODAJ" class="btn btn-info">
        </div>
    </form>
</div>

<div class="table-responsive" style="margin-bottom: 30px;">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">L.p.</th>
            <th scope="col">Kategoria</th>
            <th scope="col">Nazwa</th>
            <th>Akcja</th>
        </tr>
        </thead>
        <?php
        $i = $start;
        $rows = $main->wszystkie_produkty($limit, $skip);
        foreach ($rows as $row) {
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            $grupa = $main->get_kategoria($row->values()[0]->value('nazwa'));
            if(isset($grupa[0])){
                echo '<td>'.$grupa[0]->values()[0].'</td>';
            }else{
                $podgrupa = $main->get_podkategoria($row->values()[0]->value('nazwa'));
                if(isset($podgrupa[0])){
                    echo '<td>'.$podgrupa[0]->values()[0].'</td>';
                }else{
                    echo '<td>-</td>';
                }
            }
            //print_r($row);
            echo '<td>'.$row->values()[0]->value('nazwa').'</td>';
            echo '<td><a href="?produkty&delete_product='.$row->values()[1].'"><button class="btn btn-danger">USUŃ</button></a></td>';
            echo '</tr>';
            $i++;
        }
        ?>
        <tbody>
        </tbody>
    </table>
</div>
<div class="paginator">
    <ul class="pagination">
        <?php
        for($i=1; $i<=$pages; $i++){
            if(empty($_GET['page']) && $i==1){
                echo '<li class="active"><a href="?produkty&page='.$i.'">'.$i.'</a></li>';
            }
            elseif(isset($_GET['page']) && $_GET['page'] == $i){
                echo '<li class="active"><a href="?produkty&page='.$i.'">'.$i.'</a></li>';
            }else{
                echo '<li class=""><a href="?produkty&page='.$i.'">'.$i.'</a></li>';
            }
        }
        ?>
    </ul>
</div>
