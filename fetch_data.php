<?php

	use GraphAware\Neo4j\Client\ClientBuilder;
	require_once(__DIR__.'/vendor/autoload.php');
	require_once('config.php');
	$db	 = ClientBuilder::create()
        ->addConnection('bolt', 'bolt://'.$db_user.':'.$db_pass.'@'.$db_host.':'.$db_port)
        ->build();

	if(isset($_POST['get_option'])){
	    $query = 'MATCH (n:Grupa_produktów{nazwa:"'.$_POST['get_option'].'"})-[:Zawiera]->(m) return m';
        $result = $db->run($query);
        $rows = $result->records();
        foreach ($rows as $row) {
            echo '<option>'.$row->values()[0]->value('nazwa').'</option>';
        }

    }

    if(isset($_POST['get_option2'])){
	    $query = 'MATCH (d:Rodzaj)-[:Zalecana]->(n:Choroba{nazwa:"'.$_POST['get_option2'].'"}) RETURN d';
        $result = $db->run($query);
        $rows = $result->records();
        foreach ($rows as $row) {
            echo '<option>'.$row->values()[0]->value('nazwa').'</option>';
        }

    }



