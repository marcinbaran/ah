<?php

use GraphAware\Neo4j\Client\ClientBuilder;

class Main{

    private $db;

    function __construct(){
        require_once(__DIR__.'/vendor/autoload.php');
        require_once('config.php');
        /** @var TYPE_NAME $db_user */
        /** @var TYPE_NAME $db_pass */
        /** @var TYPE_NAME $db_host */
        /** @var TYPE_NAME $db_port */
        $this->db = ClientBuilder::create()
            ->addConnection('bolt', 'bolt://'.$db_user.':'.$db_pass.'@'.$db_host.':'.$db_port)
            ->build();
    }


    public function liczba_produktow(){
        $result = $this->db->run('MATCH (n:Produkt) RETURN COUNT(n)');
        return $result->getRecords()[0]->values()[0];
    }

    public function wszystkie_produkty($limit, $skip){
        $result = $this->db->run('MATCH (n:Produkt)
                                         RETURN n, ID(n) ORDER BY n.nazwa
                                         SKIP '.$skip.' LIMIT '.$limit.'
        ');
        return $result->records();
    }

    public function get_kategoria($produkt){
        $result = $this->db->run('MATCH (n:Produkt{nazwa:"'.$produkt.'"})
                                         MATCH (g:Grupa_produktów)-[:Zawiera]-(n)
                                         RETURN g.nazwa
        ');
        return $result->records();
    }

    public function get_podkategoria($produkt){
        $result = $this->db->run('MATCH (n:Produkt{nazwa:"'.$produkt.'"})
                                         MATCH (g:Podgrupa_produktów)-[:Zawiera]-(n)
                                         RETURN g.nazwa
        ');
        return $result->records();
    }

    public function delete_product($id){
        $this->db->run('MATCH (m:Produkt) where ID(m)='.$id.'
						       OPTIONAL MATCH (m)-[r]-()
						       DELETE r,m');
    }

    public function print_kategorie_select(){
        $result = $this->db->run('MATCH (n:Grupa_produktów) RETURN n ORDER BY n.nazwa');
        $rows = $result->records();
        foreach ($rows as $row){
            echo '<option>'.$row->values()[0]->value('nazwa').'</option>';
        }
    }

    public function dodaj_produkt($data){
        $nazwa = ucfirst($data['produkt']);
        $this->db->run('MERGE(n:Produkt {nazwa:"'.$nazwa.'"})
                               MERGE(m:Grupa_produktów{nazwa:"'.$data['grupa_produktow'].'"}) 
                               MERGE(m)-[:Zawiera]-(n)
        ');
    }

    public function liczba_chorob(){
        $result = $this->db->run('MATCH (n:Choroba) RETURN COUNT(n)');
        return $result->getRecords()[0]->values()[0];
    }

    public function wszystkie_choroby($limit, $skip){
        $result = $this->db->run('MATCH (n:Choroba)
                                         RETURN n, ID(n) ORDER BY n.nazwa
                                         SKIP '.$skip.' LIMIT '.$limit.'
        ');
        return $result->records();
    }

    public function dodaj_chorobe($data){
        $nazwa = ucfirst($data['nazwa_choroby']);
        $this->db->run('MERGE (n:Choroba{nazwa:"'.$nazwa.'"})');
    }

    public function usun_chorobe($id){
        $this->db->run('MATCH (m:Choroba) where ID(m)='.$id.'
						       OPTIONAL MATCH (m)-[r]-()
						       DELETE r,m');
    }

    public function informacje_o_chorobie($id){
        $result = $this->db->run('MATCH (n:Choroba) where ID(n)='.$id.' RETURN n');
        return $result->records();
    }

    public function print_diety_select(){
        $result = $this->db->run('MATCH (n:Rodzaj) RETURN n ORDER BY n.nazwa');
        $rows = $result->records();
        foreach ($rows as $row){
            echo '<option>'.$row->values()[0]->value('nazwa').'</option>';
        }
    }

    public function print_diety_dla_choroby($id){
        $result = $this->db->run('MATCH (n:Choroba)
                                        WHERE ID(n)='.$id.'
                                        MATCH(d:Rodzaj)-[r:Zalecana]->(n)
                                        RETURN d, ID(r)                
        ');
        return $result->records();
    }

    public function dodaj_diete_do_choroby($id_choroby, $data){
        $this->db->run('MATCH (n:Choroba)
                               WHERE ID(n)='.$id_choroby.'
                               MATCH (m:Rodzaj{nazwa:"'.$data['diety'].'"})
                               MERGE(m)-[:Zalecana]->(n)
        ');
    }

    public function usun_diete_z_choroby($id){
        $this->db->run('Match ()-[r]-() Where ID(r)='.$id.' Delete r');
    }

    public function liczba_diet(){
        $result = $this->db->run('MATCH (n:Rodzaj) RETURN COUNT(n)');
        return $result->getRecords()[0]->values()[0];
    }

    public function wszystkie_diety($limit, $skip){
        $result = $this->db->run('MATCH (n:Rodzaj)
                                         RETURN n, ID(n) ORDER BY n.nazwa
                                         SKIP '.$skip.' LIMIT '.$limit.'
        ');
        return $result->records();
    }

    public function dodaj_diete($data){
        $nazwa = ucfirst($data['nazwa_diety']);
        $this->db->run('MATCH (m:Dział {nazwa:"Diety"})
                                MERGE (n:Rodzaj{nazwa:"'.$nazwa.'"})
                                MERGE (m)-[:Zawiera]->(n)
        ');
    }

    public function usun_diete($id){
        $this->db->run('MATCH (m:Rodzaj) where ID(m)='.$id.'
						       OPTIONAL MATCH (m)-[r]-()
						       DELETE r,m');
    }

    public function informacje_o_diecie($id){
        $result = $this->db->run('MATCH (n:Rodzaj) where ID(n)='.$id.' RETURN n');
        return $result->records();
    }

    public function dodaj_produkt_do_diety($id_diety, $data){
        if($data['zalecenia'] == 'Zalecany'){
            $zalecenia = 'Zalecany';
        }
        if($data['zalecenia'] == 'Niewskazany'){
            $zalecenia = 'Niewskazany';
        }
        if($data['zalecenia'] == 'Dozwolony w umiarkowanych ilościach'){
            $zalecenia = 'Dozwolony_w_umiarkowanych_ilościach';
        }

        $this->db->run('MATCH(n:Rodzaj)
                               WHERE ID(n)='.$id_diety.'
                               MATCH(p:Produkt{nazwa:"'.$data['produkt'].'"})
                               MERGE (p)-[:'.$zalecenia.']->(n)                    
        ');
    }

    public function print_produkty_w_diecie($id){
        $result = $this->db->run('MATCH(n:Rodzaj) WHERE ID(n)='.$id.'
        MATCH(n)-[r]-(p:Produkt) RETURN p,r, ID(r)');
        return $result->records();
    }

    public function print_kategoria_produktu($nazwa){
        $result = $this->db->run('MATCH (n:Produkt{nazwa:"'.$nazwa.'"})
                                         MATCH (g:Grupa_produktów)-[:Zawiera]->(n)
                                         RETURN g
        ');
        $print = $result->records();
        return $print[0]->values()[0]->value('nazwa');
    }

    public function usun_produkt_z_diety($id){
        $this->db->run('Match ()-[r]-() Where ID(r)='.$id.' Delete r');
    }

    public function dodaj_opis_diecie($id, $data){
        $this->db->run('MATCH(n:Rodzaj) WHERE ID(n)= '.$id.' SET n.opis="'.$data['opis'].'"');
    }








}