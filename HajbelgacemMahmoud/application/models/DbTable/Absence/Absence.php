<?php
/**
 * Ce fichier contient la classe Absence.
 *
 * @copyright  2008 Gabriel Malkas
 * @license    "New" BSD License
*/

/**
 * @see Zend_Db_Table_Abstract
 */
require_once 'Zend/Db/Table/Abstract.php';

/**
 * Classe ORM qui représente la table 'absence'.
 *
 * @copyright  2008 Gabriel Malkas
 * @license    "New" BSD License
 */
class Model_DbTable_Absence_Absence extends Zend_Db_Table_Abstract
{
    
    /*
     * Nom de la table.
     */
    protected $_name = 'absence';
    
    /*
     * Clé primaire de la table.
     */
    protected $_primary = 'id_abs';
    
    /**
     * Recherche une entrée Absence avec la clé primaire spécifiée
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
        $db->update('absence', $data, 'absence.id_abs = ' . $id);
    }
    
    /**
     * Recherche une entrée Absence avec la clé primaire spécifiée
     * et supprime cette entrée.
     *
     * @param integer $id
     *
     * @return void
     */
    public static function remove($id)
    {
        $db = Zend_Registry::get('dbAdapter');
        $db->delete('absence', 'absence.id_abs = ' . $id);
    }
    
    /**
     * Récupère toutes les entrées Absence avec certains critères
     * de tri, intervalles
     */
    public static function get($order=null, $limit=0, $from=0)
    {
        $db = Zend_Registry::get('dbAdapter');
        
        $query = $db->select()
                    ->from( array("%ftable%" => "absence") );
                    
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
     * Recherche une entrée Absence avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param int $id_abs
     */
    public static function findById_abs($id_abs)
    {
        $db = Zend_Registry::get('dbAdapter');

        $query = $db->select()
                    ->from( array("a" => "absence") )                           
                    ->where( "a.id_abs = " . $id_abs );

        return $db->fetchRow($query); 
    }
    /*
     * Recherche une entrée Absence avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param int $id_etud
     */
    public static function findById_etud($id_etud)
    {
        $db = Zend_Registry::get('dbAdapter');

        $query = $db->select()
                    ->from( array("a" => "absence") )                           
                    ->where( "a.id_etud = " . $id_etud );

        return $db->fetchRow($query); 
    }
    /*
     * Recherche une entrée Absence avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param int $nbr_abs
     */
    public static function findByNbr_abs($nbr_abs)
    {
        $db = Zend_Registry::get('dbAdapter');

        $query = $db->select()
                    ->from( array("a" => "absence") )                           
                    ->where( "a.nbr_abs = " . $nbr_abs );

        return $db->fetchRow($query); 
    }
    
   public  function ajout_absence($date,$nom_absent){
	try {
		//$db = Zend_Registry::get('dbAdapter');
		
		$resultat= $this->prepare("INSERT INTO absence (id_etud, nbr_abs) VALUES (?,?)");
		$resultat->bindValue(1, $id_etud, PDO::PARAM_INT);    
		$resultat->bindValue(2, $nbr_abs, PDO::PARAM_STR);    
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
