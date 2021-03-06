<?php
/**
 * Ce fichier contient la classe Spip_forms_champs_choix.
 *
 * @copyright  2008 Gabriel Malkas
 * @copyright  2010 Samuel Szoniecky
 * @license    "New" BSD License
*/


/**
 * Classe ORM qui représente la table 'spip_forms_champs_choix'.
 *
 * @copyright  2014 Samuel Szoniecky
 * @license    "New" BSD License
 */
//ATTENTION le "s" de Models est nécessaire pour une compatibilité entre application et serveur
class Models_DbTable_Spip_forms_champs_choix extends Zend_Db_Table_Abstract
{
    
    /*
     * Nom de la table.
     */
    protected $_name = 'spip_forms_champs_choix';
    
    /*
     * Clef primaire de la table.
     */
    protected $_primary = 'id_form';
	
    
    /**
     * Vérifie si une entrée Spip_forms_champs_choix existe.
     *
     * @param array $data
     *
     * @return integer
     */
    public function existe($data)
    {
		$select = $this->select();
		$select->from($this, array('id_form'));
		foreach($data as $k=>$v){
			$select->where($k.' = ?', $v);
		}
	    $rows = $this->fetchAll($select);        
	    if($rows->count()>0)$id=$rows[0]->id_form; else $id=false;
        return $id;
    } 
        
    /**
     * Ajoute une entrée Spip_forms_champs_choix.
     *
     * @param array $data
     * @param boolean $existe
     *  
     * @return integer
     */
    public function ajouter($data, $existe=true)
    {
    	
    	$id=false;
    	if($existe)$id = $this->existe($data);
    	if(!$id){
    	 	$id = $this->insert($data);
    	}
    	return $id;
    } 
           
    /**
     * Recherche une entrée Spip_forms_champs_choix avec la clef primaire spécifiée
     * et modifie cette entrée avec les nouvelles données.
     *
     * @param integer $id
     * @param array $data
     *
     * @return void
     */
    public function edit($id, $data)
    {        
   	
    	$this->update($data, 'spip_forms_champs_choix.id_form = ' . $id);
    }
    
    /**
     * Recherche une entrée Spip_forms_champs_choix avec la clef primaire spécifiée
     * et supprime cette entrée.
     *
     * @param integer $id
     *
     * @return void
     */
    public function remove($id)
    {
    	$this->delete('spip_forms_champs_choix.id_form = ' . $id);
    }
    
    /**
     * Récupère toutes les entrées Spip_forms_champs_choix avec certains critères
     * de tri, intervalles
     */
    public function getAll($order=null, $limit=0, $from=0)
    {
   	
    	$query = $this->select()
                    ->from( array("spip_forms_champs_choix" => "spip_forms_champs_choix") );
                    
        if($order != null)
        {
            $query->order($order);
        }

        if($limit != 0)
        {
            $query->limit($limit, $from);
        }

        return $this->fetchAll($query)->toArray();
    }

    
    	/**
     * Recherche une entrée Spip_forms_champs_choix avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param bigint $id_form
     *
     * @return array
     */
    public function findById_form($id_form)
    {
        $query = $this->select()
                    ->from( array("s" => "spip_forms_champs_choix") )                           
                    ->where( "s.id_form = ?", $id_form );

        return $this->fetchAll($query)->toArray(); 
    }
    	/**
     * Recherche une entrée Spip_forms_champs_choix avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param varchar $champ
     *
     * @return array
     */
    public function findByChamp($champ)
    {
        $query = $this->select()
                    ->from( array("s" => "spip_forms_champs_choix") )                           
                    ->where( "s.champ = ?", $champ );

        return $this->fetchAll($query)->toArray(); 
    }
    	/**
     * Recherche une entrée Spip_forms_champs_choix avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param varchar $choix
     *
     * @return array
     */
    public function findByChoix($choix)
    {
        $query = $this->select()
                    ->from( array("s" => "spip_forms_champs_choix") )                           
                    ->where( "s.choix = ?", $choix );

        return $this->fetchAll($query)->toArray(); 
    }
    	/**
     * Recherche une entrée Spip_forms_champs_choix avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param mediumtext $titre
     *
     * @return array
     */
    public function findByTitre($titre)
    {
        $query = $this->select()
                    ->from( array("s" => "spip_forms_champs_choix") )                           
                    ->where( "s.titre = ?", $titre );

        return $this->fetchAll($query)->toArray(); 
    }
    	/**
     * Recherche une entrée Spip_forms_champs_choix avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param bigint $rang
     *
     * @return array
     */
    public function findByRang($rang)
    {
        $query = $this->select()
                    ->from( array("s" => "spip_forms_champs_choix") )                           
                    ->where( "s.rang = ?", $rang );

        return $this->fetchAll($query)->toArray(); 
    }
    
    
}
