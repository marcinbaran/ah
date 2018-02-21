<?php
    if(isset($_POST['dodaj_diete'])){
        $main->dodaj_diete($_POST);
        echo '<div class="alert alert-success">
                  <strong>Dodano nową dietę !</strong>
              </div>';
    }

    if(isset($_GET['usun_diete'])){
        $main->usun_diete($_GET['usun_diete']);
        echo '<div class="alert alert-success">
                  <strong>Usunięto dietę !</strong>
              </div>';
    }


    $total = $main->liczba_diet();
    $limit = 10;
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
<div class="row" style="margin-bottom: 30px;">
    <div class="col-md-2 col-md-offset-5"><h2>Diety</h2></div>
</div>
<div class="row" style="margin-bottom: 50px;">
    <form action="" method="POST">
        <div class="col-md-5 col-md-offset-3">
            <input type="text" name="nazwa_diety" class="form-control" placeholder="Nazwa...">
        </div>
        <div class="col-md-1">
            <input type="submit" value="DODAJ" name="dodaj_diete" class="btn btn-info">
        </div>
    </form>
</div>


<div class="table-responsive" style="margin-bottom: 30px;">
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
        $i = $start;
        $rows = $main->wszystkie_diety($limit, $skip);
        foreach($rows as $row){
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$row->values()[0]->value('nazwa').'</td>';
            echo '<td>';
            echo '<a href="?edytuj_diete='.$row->values()[1].'"><button class="btn btn-info">EDYTUJ</button></a> ';
            echo '<a href="?diety&usun_diete='.$row->values()[1].'"><button class="btn btn-info">USUŃ</button></a>';
            echo '</td>';
            echo '</tr>';
            $i++;
        }
        ?>
        </tbody>
    </table>
</div>

<div class="paginator">
    <ul class="pagination">
        <?php
        for($i=1; $i<=$pages; $i++){
            if(empty($_GET['page']) && $i==1){
                echo '<li class="active"><a href="?diety&page='.$i.'">'.$i.'</a></li>';
            }
            elseif(isset($_GET['page']) && $_GET['page'] == $i){
                echo '<li class="active"><a href="?diety&page='.$i.'">'.$i.'</a></li>';
            }else{
                echo '<li class=""><a href="?diety&page='.$i.'">'.$i.'</a></li>';
            }
        }
        ?>
    </ul>
</div>