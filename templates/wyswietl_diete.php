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
                <?php
                $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Grzyby');
                if(!empty($tablica['zalecane']) || !empty($tablica['dozwolony_w_umiarkowanych_ilościach']) || !empty($tablica['niewskazany'])){?>
                <tr>
                    <td>Grzyby</td>
                    <td><?php echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <?php } ?>
                <?php
                $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Mięso i wędliny');
                if(!empty($tablica['zalecane']) || !empty($tablica['dozwolony_w_umiarkowanych_ilościach']) || !empty($tablica['niewskazany'])){
                ?>
                <tr>
                    <td>Mięso i wędliny</td>
                    <td><?php $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Mięso i wędliny'); echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <?php }  ?>
                <?php
                $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Nabiał');
                if(!empty($tablica['zalecane']) || !empty($tablica['dozwolony_w_umiarkowanych_ilościach']) || !empty($tablica['niewskazany'])){
                ?>
                <tr>
                    <td>Nabiał</td>
                    <td><?php echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <?php } ?>
                <?php
                $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Napoje');
                if(!empty($tablica['zalecane']) || !empty($tablica['dozwolony_w_umiarkowanych_ilościach']) || !empty($tablica['niewskazany'])){
                ?>
                <tr>
                    <td>Napoje</td>
                    <td><?php echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <?php } ?>
                <?php
                $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Orzechy, nasiona i bakalie');
                if(!empty($tablica['zalecane']) || !empty($tablica['dozwolony_w_umiarkowanych_ilościach']) || !empty($tablica['niewskazany'])){
                ?>
                <tr>
                    <td>Orzechy, nasiona i bakalie</td>
                    <td><?php echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <?php } ?>
                <?php
                $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Owoce');
                if(!empty($tablica['zalecane']) || !empty($tablica['dozwolony_w_umiarkowanych_ilościach']) || !empty($tablica['niewskazany'])){
                ?>
                <tr>
                    <td>Owoce</td>
                    <td><?php echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <?php } ?>
                <?php
                $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Potrawy');
                if(!empty($tablica['zalecane']) || !empty($tablica['dozwolony_w_umiarkowanych_ilościach']) || !empty($tablica['niewskazany'])){
                ?>
                <tr>
                    <td>Potrawy</td>
                    <td><?php echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <?php } ?>
                <?php
                $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Przekąski');
                if(!empty($tablica['zalecane']) || !empty($tablica['dozwolony_w_umiarkowanych_ilościach']) || !empty($tablica['niewskazany'])){
                ?>
                <tr>
                    <td>Przekąski</td>
                    <td><?php echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <?php } ?>
                <?php
                $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Przetwory');
                if(!empty($tablica['zalecane']) || !empty($tablica['dozwolony_w_umiarkowanych_ilościach']) || !empty($tablica['niewskazany'])){
                ?>
                <tr>
                    <td>Przetwory</td>
                    <td><?php echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <?php } ?>
                <?php
                $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Ryby i owoce morza');
                if(!empty($tablica['zalecane']) || !empty($tablica['dozwolony_w_umiarkowanych_ilościach']) || !empty($tablica['niewskazany'])){
                ?>
                <tr>
                    <td>Ryby i owoce morza</td>
                    <td><?php echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <?php } ?>
                <?php
                $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Słodycze, ciasta i desery');
                if(!empty($tablica['zalecane']) || !empty($tablica['dozwolony_w_umiarkowanych_ilościach']) || !empty($tablica['niewskazany'])){
                ?>
                <tr>
                    <td>Słodycze, ciasta i desery</td>
                    <td><?php echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <?php } ?>
                <?php
                $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Tłuszcze');
                if(!empty($tablica['zalecane']) || !empty($tablica['dozwolony_w_umiarkowanych_ilościach']) || !empty($tablica['niewskazany'])){
                ?>
                <tr>
                    <td>Tłuszcze</td>
                    <td><?php echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <?php } ?>
                <?php
                $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Warzywa');
                if(!empty($tablica['zalecane']) || !empty($tablica['dozwolony_w_umiarkowanych_ilościach']) || !empty($tablica['niewskazany'])){
                ?>
                <tr>
                    <td>Warzywa</td>
                    <td><?php echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <?php } ?>
                <?php
                $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Zboża');
                if(!empty($tablica['zalecane']) || !empty($tablica['dozwolony_w_umiarkowanych_ilościach']) || !empty($tablica['niewskazany'])){
                ?>
                <tr>
                    <td>Zboża</td>
                    <td><?php echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <?php } ?>
                <?php
                $tablica = $main->print_produkty($_GET['wyswietl_diete'], 'Zioła i przyprawy');
                if(!empty($tablica['zalecane']) || !empty($tablica['dozwolony_w_umiarkowanych_ilościach']) || !empty($tablica['niewskazany'])){
                ?>
                <tr>
                    <td>Zioła i przyprawy</td>
                    <td><?php echo $tablica['zalecane'];?></td>
                    <td><?php echo $tablica['dozwolony_w_umiarkowanych_ilościach'];?></td>
                    <td><?php echo $tablica['niewskazany'];?></td>
                </tr>
                <?php } ?>
        </tbody>
    </table>
</div>