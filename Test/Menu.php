<?php
/*
 * @author Anakeen
 * @license http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License
 * @package FDL
*/
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 08/09/14
 * Time: 15:12
 */

namespace Dcp\Freeevent\Test;

class Menu extends \Dcp\Family\Document
{
    use \Dcp\Freeevent\EventProduct;
    
    public function __construct($dbaccess = '', $id = '', $res = '', $dbid = 0)
    {
        parent::__construct($dbaccess, $id, $res, $dbid);
        
        $this->eventAttBeginDate = "DAYM_BEGDATE";
        $this->eventAttEndDate = "DAYM_ENDDATE";
        $this->eventAttDesc = "DAYM_DESC";
        $this->eventFamily = "DAYEVENT";
        $this->eventRessources = array(
            "DAYM_USER"
        );
    }
    
    function getEventEndDate()
    {
        return substr($this->getRawValue($this->eventAttEndDate) , 0, 10) . " 23:59:59";
    }
    /**
     * Use for derived event by the producer to set added attributes
     * @param \Dcp\Freeevent\Event $e event object
     */
    function setEventSpec(&$e)
    { //mise à jour attribut de répétabilité
        $e->setValue("DEVT_DAY", $this->getRawValue("DAYM_DAY"));
    }
    
    function postStore()
    {
        
        $this->setEvent();
    }
}
