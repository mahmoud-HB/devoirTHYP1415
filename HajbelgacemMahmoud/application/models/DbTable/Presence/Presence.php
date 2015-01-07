<?php
/**
 * Ce fichier contient la classe Presence.
 *
 * @copyright  2008 Gabriel Malkas
 * @license    "New" BSD License
*/

/**
 * @see Zend_Db_Table_Abstract
 */
require_once 'Zend/Db/Table/Abstract.php';

/**
 * Classe ORM qui représente la table 'presence'.
 *
 * @copyright  2008 Gabriel Malkas
 * @license    "New" BSD License
 */
class Model_DbTable_Presence_Presence extends Zend_Db_Table_Abstract
{
    
    /*
     * Nom de la table.
     */
    protected $_name = 'presence';
    
    /*
     * Clé primaire de la table.
     */
    protected $_primary = 'id_pres';
    
    /**
     * Recherche une entrée Presence avec la clé primaire spécifiée
     * et modifie cette entrée avec les nouvelles données.
     *
     * @param integer $id
     * @param array $data
     *
     * @return void
     */
    public static function edit($id, $data)
    {        
        $db = Zend_Registry::get('dbAdapter');
        $db->update('presence', $data, 'presence.id_pres = ' . $id);
    }
    
    /**
     * Recherche une entrée Presence avec la clé primaire spécifiée
     * et supprime cette entrée.
     *
     * @param integer $id
     *
     * @return void
     */
    public static function remove($id)
    {
        $db = Zend_Registry::get('dbAdapter');
        $db->delete('presence', 'presence.id_pres = ' . $id);
    }
    
    /**
     * Récupère toutes les entrées Presence avec certains critères
     * de tri, intervalles
     */
    public static function get($order=null, $limit=0, $from=0)
    {
        $db = Zend_Registry::get('dbAdapter');
        
        $query = $db->select()
                    ->from( array("%ftable%" => "presence") );
                    
        if($order != null)
        {
            $query->order($order);
        }

        if($limit != 0)
        {
            $query->limit($limit, $from);
        }

        return $db->fetchAll($query);
    }
    
    /*
     * Recherche une entrée Presence avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param int $id_pres
     */
    public static function findById_pres($id_pres)
    {
        $db = Zend_Registry::get('dbAdapter');

        $query = $db->select()
                    ->from( array("p" => "presence") )                           
                    ->where( "p.id_pres = " . $id_pres );

        return $db->fetchRow($query); 
    }
    /*
     * Recherche une entrée Presence avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param int $id_etud
     */
    public static function findById_etud($id_etud)
    {
        $db = Zend_Registry::get('dbAdapter');

        $query = $db->select()
                    ->from( array("p" => "presence") )                           
                    ->where( "p.id_etud = " . $id_etud );

        return $db->fetchRow($query); 
    }
    /*
     * Recherche une entrée Presence avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param int $nbr_pres
     */
    public static function findByNbr_pres($nbr_pres)
    {
        $db = Zend_Registry::get('dbAdapter');

        $query = $db->select()
                    ->from( array("p" => "presence") )                           
                    ->where( "p.nbr_pres = " . $nbr_pres );

        return $db->fetchRow($query); 
    }
    
   public  function ajout_presence($date,$nom_absent){
	try {
		//$db = Zend_Registry::get('dbAdapter');
		
		$resultat= $this->prepare("INSERT INTO presence (id_etud, nbr_pres) VALUES (?,?)");
		$resultat->bindValue(1, $id_etud, PDO::PARAM_INT);    
		$resultat->bindValue(2, $nbr_pres, PDO::PARAM_STR);    
		$resultat->execute();
		return true;
	} 
	catch (PDOException $exc) 
	{
		echo $exc->getMessage();
		return false;
	}  
}

  public  function insertion($data,$rs=false){
      
    		if(!isset($data["id_etud"]));
    	 	$id = $this->insert($data);
    	
    	if($rs)
    		return $this->findById($id);
	else
	    	return $id;
  }
  
}
