<?php
    if(isset($_POST['dodaj_chorobe'])){
        $main->dodaj_chorobe($_POST);
        echo '<div class="alert alert-success">
                  <strong>Dodano chorobę!</strong>
              </div>';
    }

    if(isset($_GET['usun_chorobe'])){
        $main->usun_chorobe($_GET['usun_chorobe']);
        echo '<div class="alert alert-success">
                  <strong>Choroba została usunięta !</strong>
              </div>';
    }

    $total = $main->liczba_chorob();
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
    <div class="col-md-2 col-md-offset-5"><h2>Choroby</h2></div>
</div>
<div class="row" style="margin-bottom: 50px;">
    <form action="" method="POST">
        <div class="col-md-5 col-md-offset-3">
            <input type="text" name="nazwa_choroby" class="form-control" placeholder="Nazwa...">
        </div>
        <div class="col-md-1">
            <input type="submit" value="DODAJ" name="dodaj_chorobe" class="btn btn-info">
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
            $rows = $main->wszystkie_choroby($limit, $skip);
            foreach ($rows as $row) {
                echo '<tr>';
                echo '<td>'.$i.'</td>';
                echo '<td>'.$row->values()[0]->value('nazwa').'</td>';
                echo '<td>
                            <a href="?edytuj_chorobe='.$row->values()[1].'"><button class="btn btn-info">EDYTUJ</button></a> 
                            <a href="?choroby&usun_chorobe='.$row->values()[1].'"><button class="btn btn-info">USUŃ</button>
                      </td>';
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
                echo '<li class="active"><a href="?choroby&page='.$i.'">'.$i.'</a></li>';
            }
            elseif(isset($_GET['page']) && $_GET['page'] == $i){
                echo '<li class="active"><a href="?choroby&page='.$i.'">'.$i.'</a></li>';
            }else{
                echo '<li class=""><a href="?choroby&page='.$i.'">'.$i.'</a></li>';
            }
        }
        ?>
    </ul>
</div>
