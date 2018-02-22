<?php
    $row = $main->informacje_o_diecie2($_GET['wyswietl_diete']);
?>
<div class="row" style="margin-bottom: 30px;">
    <div class="col-md-7 col-md-offset-4"><h2><?php echo $_GET['wyswietl_diete']; ?></h2></div>
</div>

<div class="row" style="margin-bottom: 50px;">
    <div class="col-md-8 col-md-offset-2">
        <?php
        if(isset($row[0]->values()[0]->values()['opis'])){
            echo $row[0]->values()[0]->values()['opis'];
        }
        ?>
    </div>
    <div class="col-md-2"></div>
</div>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>PRODUKTY I POTRAWY</th>
            <th>ZALECANE</th>
            <th>DOZWOLONE W UMIARKOWANYCH ILOŚCIACH</th>
            <th>NIEWSKAZANE</th>
        </tr>
        </thead>
        <tbody>
                <tr>
                    <td>Grzyby</td>
                    <td><?php $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Grzyby'); echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <tr>
                    <td>Mięso i wędliny</td>
                    <td><?php $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Mięso i wędliny'); echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <tr>
                    <td>Nabiał</td>
                    <td><?php $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Nabiał'); echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <tr>
                    <td>Napoje</td>
                    <td><?php $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Napoje'); echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <tr>
                    <td>Orzechy, nasiona i bakalie</td>
                    <td><?php $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Orzechy, nasiona i bakalie'); echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <tr>
                    <td>Owoce</td>
                    <td><?php $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Owoce'); echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <tr>
                    <td>Potrawy</td>
                    <td><?php $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Potrawy'); echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <tr>
                    <td>Przekąski</td>
                    <td><?php $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Przekąski'); echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <tr>
                    <td>Przetwory</td>
                    <td><?php $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Przetwory'); echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <tr>
                    <td>Ryby i owoce morza</td>
                    <td><?php $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Ryby i owoce morza'); echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <tr>
                    <td>Słodycze, ciasta i desery</td>
                    <td><?php $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Słodycze, ciasta i desery'); echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <tr>
                    <td>Tłuszcze</td>
                    <td><?php $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Tłuszcze'); echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <tr>
                    <td>Warzywa</td>
                    <td><?php $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Warzywa'); echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <tr>
                    <td>Zboża</td>
                    <td><?php $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Zboża'); echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <tr>
                    <td>Zioła i przyprawy</td>
                    <td><?php $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Zioła i przyprawy'); echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
        </tbody>
    </table>
</div>