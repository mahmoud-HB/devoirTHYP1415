<?php
/**
 * Ce fichier contient la classe Etudiant.
 *
 * @copyright  2008 Gabriel Malkas
 * @license    "New" BSD License
*/

/**
 * @see Zend_Db_Table_Abstract
 */
require_once 'Zend/Db/Table/Abstract.php';

/**
 * Classe ORM qui représente la table 'etudiant'.
 *
 * @copyright  2008 Gabriel Malkas
 * @license    "New" BSD License
 */
class Model_DbTable_Example_Etudiant extends Zend_Db_Table_Abstract
{
    
    /*
     * Nom de la table.
     */
    protected $_name = 'etudiant';
    
    /*
     * Clé primaire de la table.
     */
    protected $_primary = 'id';
    
    /**
     * Recherche une entrée Etudiant avec la clé primaire spécifiée
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
        $db->update('etudiant', $data, 'etudiant.id = ' . $id);
    }
    
    /**
     * Recherche une entrée Etudiant avec la clé primaire spécifiée
     * et supprime cette entrée.
     *
     * @param integer $id
     *
     * @return void
     */
    public static function remove($id)
    {
        $db = Zend_Registry::get('dbAdapter');
        $db->delete('etudiant', 'etudiant.id = ' . $id);
    }
    
    /**
     * Récupère toutes les entrées Etudiant avec certains critères
     * de tri, intervalles
     */
    public static function get($order=null, $limit=0, $from=0)
    {
        $db = Zend_Registry::get('dbAdapter');
        
        $query = $db->select()
                    ->from( array("%ftable%" => "etudiant") );
                    
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
     * Recherche une entrée Etudiant avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param int $id
     */
    public static function findById($id)
    {
        $db = Zend_Registry::get('dbAdapter');

        $query = $db->select()
                    ->from( array("e" => "etudiant") )                           
                    ->where( "e.id = " . $id );

        return $db->fetchRow($query); 
    }
    /*
     * Recherche une entrée Etudiant avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param varchar $nom
     */
    public static function findByNom($nom)
    {
        $db = Zend_Registry::get('dbAdapter');

        $query = $db->select()
                    ->from( array("e" => "etudiant") )                           
                    ->where( "e.nom = " . $nom );

        return $db->fetchRow($query); 
    }
    /*
     * Recherche une entrée Etudiant avec la valeur spécifiée
     * et retourne cette entrée.
     *
     * @param varchar $prenom
     */
    public static function findByPrenom($prenom)
    {
        $db = Zend_Registry::get('dbAdapter');

        $query = $db->select()
                    ->from( array("e" => "etudiant") )                           
                    ->where( "e.prenom = " . $prenom );

        return $db->fetchRow($query); 
    }
    
    
}
