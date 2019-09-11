<?php

namespace org\wfmc\_2002\xpdl1;

class Activity extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "http://www.wfmc.org/2002/XPDL1.0";
    const ROOT = "Activity";
    const PREF = NULL;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $Description = null;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $Limit = null;

    /**
     * @maxOccurs 1
     * @var org\wfmc\_2002\xpdl1\Route
     */
    protected $Route = null;

    /**
     * @maxOccurs 1
     * @var org\wfmc\_2002\xpdl1\Implementation
     */
    protected $Implementation = null;

    /**
     * @maxOccurs 1
     * @var org\wfmc\_2002\xpdl1\BlockActivity
     */
    protected $BlockActivity = null;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $Performer = null;

    /**
     * @maxOccurs 1
     * @var org\wfmc\_2002\xpdl1\StartMode
     */
    protected $StartMode = null;

    /**
     * @maxOccurs 1
     * @var org\wfmc\_2002\xpdl1\FinishMode
     */
    protected $FinishMode = null;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $Priority = null;

    /**
     * @maxOccurs unbounded
     * @var org\wfmc\_2002\xpdl1\Deadline[]
     */
    protected $Deadline = [];

    /**
     * @maxOccurs 1
     * @var org\wfmc\_2002\xpdl1\SimulationInformation
     */
    protected $SimulationInformation = null;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $Icon = null;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $Documentation = null;

    /**
     * @maxOccurs 1
     * @var org\wfmc\_2002\xpdl1\TransitionRestrictions
     */
    protected $TransitionRestrictions = null;

    /**
     * @maxOccurs 1
     * @var org\wfmc\_2002\xpdl1\ExtendedAttributes
     */
    protected $ExtendedAttributes = null;

    /**
     * @maxOccurs 1
     * @var \NMTOKEN
     */
    protected $Id = null;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $Name = null;

    public function __construct() {
        parent::__construct();

        $this->_properties["Description"] = array(
            "prop" => "Description",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Description
        );
        $this->_properties["Limit"] = array(
            "prop" => "Limit",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Limit
        );
        $this->_properties["Route"] = array(
            "prop" => "Route",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Route
        );
        $this->_properties["Implementation"] = array(
            "prop" => "Implementation",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Implementation
        );
        $this->_properties["BlockActivity"] = array(
            "prop" => "BlockActivity",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->BlockActivity
        );
        $this->_properties["Performer"] = array(
            "prop" => "Performer",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Performer
        );
        $this->_properties["StartMode"] = array(
            "prop" => "StartMode",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->StartMode
        );
        $this->_properties["FinishMode"] = array(
            "prop" => "FinishMode",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->FinishMode
        );
        $this->_properties["Priority"] = array(
            "prop" => "Priority",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Priority
        );
        $this->_properties["Deadline"] = array(
            "prop" => "Deadline",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Deadline
        );
        $this->_properties["SimulationInformation"] = array(
            "prop" => "SimulationInformation",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->SimulationInformation
        );
        $this->_properties["Icon"] = array(
            "prop" => "Icon",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Icon
        );
        $this->_properties["Documentation"] = array(
            "prop" => "Documentation",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Documentation
        );
        $this->_properties["TransitionRestrictions"] = array(
            "prop" => "TransitionRestrictions",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->TransitionRestrictions
        );
        $this->_properties["ExtendedAttributes"] = array(
            "prop" => "ExtendedAttributes",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->ExtendedAttributes
        );
        $this->_properties["Id"] = array(
            "prop" => "Id",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Id
        );
        $this->_properties["Name"] = array(
            "prop" => "Name",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Name
        );
    }

    /**
     * @param \String $val
     */
    public function setDescription($val) {
        $this->Description = $val;
        $this->_properties["Description"]["text"] = $val;
    }

    /**
     * @param \String $val
     */
    public function setLimit($val) {
        $this->Limit = $val;
        $this->_properties["Limit"]["text"] = $val;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\Route $val
     */
    public function setRoute(\org\wfmc\_2002\xpdl1\Route $val) {
        $this->Route = $val;
        $this->_properties["Route"]["text"] = $val;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\Implementation $val
     */
    public function setImplementation(\org\wfmc\_2002\xpdl1\Implementation $val) {
        $this->Implementation = $val;
        $this->_properties["Implementation"]["text"] = $val;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\BlockActivity $val
     */
    public function setBlockActivity(\org\wfmc\_2002\xpdl1\BlockActivity $val) {
        $this->BlockActivity = $val;
        $this->_properties["BlockActivity"]["text"] = $val;
    }

    /**
     * @param \String $val
     */
    public function setPerformer($val) {
        $this->Performer = $val;
        $this->_properties["Performer"]["text"] = $val;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\StartMode $val
     */
    public function setStartMode(\org\wfmc\_2002\xpdl1\StartMode $val) {
        $this->StartMode = $val;
        $this->_properties["StartMode"]["text"] = $val;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\FinishMode $val
     */
    public function setFinishMode(\org\wfmc\_2002\xpdl1\FinishMode $val) {
        $this->FinishMode = $val;
        $this->_properties["FinishMode"]["text"] = $val;
    }

    /**
     * @param \String $val
     */
    public function setPriority($val) {
        $this->Priority = $val;
        $this->_properties["Priority"]["text"] = $val;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\Deadline $val
     */
    public function setDeadline(\org\wfmc\_2002\xpdl1\Deadline $val) {
        $this->Deadline[] = $val;
        $this->_properties["Deadline"]["text"][] = $val;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\Deadline[]
     */
    public function setDeadlineArray(array $vals) {
        $this->Deadline = $vals;
        $this->_properties["Deadline"]["text"] = $vals;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\SimulationInformation $val
     */
    public function setSimulationInformation(\org\wfmc\_2002\xpdl1\SimulationInformation $val) {
        $this->SimulationInformation = $val;
        $this->_properties["SimulationInformation"]["text"] = $val;
    }

    /**
     * @param \String $val
     */
    public function setIcon($val) {
        $this->Icon = $val;
        $this->_properties["Icon"]["text"] = $val;
    }

    /**
     * @param \String $val
     */
    public function setDocumentation($val) {
        $this->Documentation = $val;
        $this->_properties["Documentation"]["text"] = $val;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\TransitionRestrictions $val
     */
    public function setTransitionRestrictions(\org\wfmc\_2002\xpdl1\TransitionRestrictions $val) {
        $this->TransitionRestrictions = $val;
        $this->_properties["TransitionRestrictions"]["text"] = $val;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\ExtendedAttributes $val
     */
    public function setExtendedAttributes(\org\wfmc\_2002\xpdl1\ExtendedAttributes $val) {
        $this->ExtendedAttributes = $val;
        $this->_properties["ExtendedAttributes"]["text"] = $val;
    }

    /**
     * @param \NMTOKEN $val
     */
    public function setId($val) {
        $this->Id = $val;
        $this->_properties["Id"]["text"] = $val;
    }

    /**
     * @param \String $val
     */
    public function setName($val) {
        $this->Name = $val;
        $this->_properties["Name"]["text"] = $val;
    }

    /**
     * @return \String
     */
    public function getDescription() {
        return $this->Description;
    }

    /**
     * @return \String
     */
    public function getLimit() {
        return $this->Limit;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\Route
     */
    public function getRoute() {
        return $this->Route;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\Implementation
     */
    public function getImplementation() {
        return $this->Implementation;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\BlockActivity
     */
    public function getBlockActivity() {
        return $this->BlockActivity;
    }

    /**
     * @return \String
     */
    public function getPerformer() {
        return $this->Performer;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\StartMode
     */
    public function getStartMode() {
        return $this->StartMode;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\FinishMode
     */
    public function getFinishMode() {
        return $this->FinishMode;
    }

    /**
     * @return \String
     */
    public function getPriority() {
        return $this->Priority;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\Deadline | []
     */
    public function getDeadline($index = null) {
        if ($index !== null) {
            $res = isset($this->Deadline[$index]) ? $this->Deadline[$index] : null;
        } else {
            $res = $this->Deadline;
        }
        return $res;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\SimulationInformation
     */
    public function getSimulationInformation() {
        return $this->SimulationInformation;
    }

    /**
     * @return \String
     */
    public function getIcon() {
        return $this->Icon;
    }

    /**
     * @return \String
     */
    public function getDocumentation() {
        return $this->Documentation;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\TransitionRestrictions
     */
    public function getTransitionRestrictions() {
        return $this->TransitionRestrictions;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\ExtendedAttributes
     */
    public function getExtendedAttributes() {
        return $this->ExtendedAttributes;
    }

    /**
     * @return \NMTOKEN
     */
    public function getId() {
        return $this->Id;
    }

    /**
     * @return \String
     */
    public function getName() {
        return $this->Name;
    }

    public function toXmlStr($xmlns = self::NS, $xmlname = self::ROOT) {
        return parent::toXmlStr($xmlns, $xmlname);
    }

    /**
     * Вывод в XMLWriter
     * @codegen true
     * @param XMLWriter $xw
     * @param string $xmlname Имя корневого узла
     * @param string $xmlns Пространство имен
     * @param int $mode
     */
    public function toXmlWriter(\XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS, $mode = \Adaptor_XML::ELEMENT) {
        if ($mode & \Adaptor_XML::STARTELEMENT)
            $xw->startElementNS(NULL, $xmlname, $xmlns);
        $this->attributesToXmlWriter($xw, $xmlname, $xmlns);
        $this->elementsToXmlWriter($xw, $xmlname, $xmlns);
        if ($mode & \Adaptor_XML::ENDELEMENT)
            $xw->endElement();
    }

    /**
     * Вывод атрибутов в \XMLWriter
     * @param \XMLWriter $xw
     * @param string $xmlname Имя корневого узла
     * @param string $xmlns Пространство имен
     */
    protected function attributesToXmlWriter(\XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS) {
        parent::attributesToXmlWriter($xw, $xmlname, $xmlns);
        if ($prop = $this->getId())
            $xw->writeAttribute('Id', $prop);
        if ($prop = $this->getName())
            $xw->writeAttribute('Name', $prop);
    }

    /**
     * Вывод элементов в \XMLWriter
     * @param \XMLWriter $xw
     * @param string $xmlname Имя корневого узла
     * @param string $xmlns Пространство имен
     */
    protected function elementsToXmlWriter(\XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS) {
        parent::elementsToXmlWriter($xw, $xmlname, $xmlns);
        if (($prop = $this->getDescription()) !== NULL) {
            $xw->writeElementNS(NULL, 'Description', 'http://www.wfmc.org/2002/XPDL1.0', $prop);
        }
        if (($prop = $this->getLimit()) !== NULL) {
            $xw->writeElementNS(NULL, 'Limit', 'http://www.wfmc.org/2002/XPDL1.0', $prop);
        }
        if (($prop = $this->getRoute()) !== NULL) {
            $prop->toXmlWriter($xw);
        }
        if (($prop = $this->getImplementation()) !== NULL) {
            $prop->toXmlWriter($xw);
        }
        if (($prop = $this->getBlockActivity()) !== NULL) {
            $prop->toXmlWriter($xw);
        }
        if (($prop = $this->getPerformer()) !== NULL) {
            $xw->writeElementNS(NULL, 'Performer', 'http://www.wfmc.org/2002/XPDL1.0', $prop);
        }
        if (($prop = $this->getStartMode()) !== NULL) {
            $prop->toXmlWriter($xw);
        }
        if (($prop = $this->getFinishMode()) !== NULL) {
            $prop->toXmlWriter($xw);
        }
        if (($prop = $this->getPriority()) !== NULL) {
            $xw->writeElementNS(NULL, 'Priority', 'http://www.wfmc.org/2002/XPDL1.0', $prop);
        }
        if ($props = $this->getDeadline()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if (($prop = $this->getSimulationInformation()) !== NULL) {
            $prop->toXmlWriter($xw);
        }
        if (($prop = $this->getIcon()) !== NULL) {
            $xw->writeElementNS(NULL, 'Icon', 'http://www.wfmc.org/2002/XPDL1.0', $prop);
        }
        if (($prop = $this->getDocumentation()) !== NULL) {
            $xw->writeElementNS(NULL, 'Documentation', 'http://www.wfmc.org/2002/XPDL1.0', $prop);
        }
        if (($prop = $this->getTransitionRestrictions()) !== NULL) {
            $prop->toXmlWriter($xw);
        }
        if (($prop = $this->getExtendedAttributes()) !== NULL) {
            $prop->toXmlWriter($xw);
        }
    }

    /**
     * Чтение атрибутов из \XMLReader
     * @param \XMLReader $xr
     */
    public function attributesFromXmlReader(\XMLReader &$xr) {
        if ($attr = $xr->getAttribute('Id')) {
            $this->_attributes['Id']['prop'] = 'Id';
            $this->setId($attr);
        }
        if ($attr = $xr->getAttribute('Name')) {
            $this->_attributes['Name']['prop'] = 'Name';
            $this->setName($attr);
        }
        parent::attributesFromXmlReader($xr);
    }

    /**
     * Чтение элементов из \XMLReader
     * @param \XMLReader $xr
     */
    public function elementsFromXmlReader(\XMLReader &$xr) {
        switch ($xr->localName) {
            case "Description":
                $this->setDescription($xr->readString());
                break;
            case "Limit":
                $this->setLimit($xr->readString());
                break;
            case "Route":
                $Route = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Route");
                $this->setRoute($Route->fromXmlReader($xr));
                break;
            case "Implementation":
                $Implementation = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Implementation");
                $this->setImplementation($Implementation->fromXmlReader($xr));
                break;
            case "BlockActivity":
                $BlockActivity = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\BlockActivity");
                $this->setBlockActivity($BlockActivity->fromXmlReader($xr));
                break;
            case "Performer":
                $this->setPerformer($xr->readString());
                break;
            case "StartMode":
                $StartMode = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\StartMode");
                $this->setStartMode($StartMode->fromXmlReader($xr));
                break;
            case "FinishMode":
                $FinishMode = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\FinishMode");
                $this->setFinishMode($FinishMode->fromXmlReader($xr));
                break;
            case "Priority":
                $this->setPriority($xr->readString());
                break;
            case "Deadline":
                $Deadline = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Deadline");
                $this->setDeadline($Deadline->fromXmlReader($xr));
                break;
            case "SimulationInformation":
                $SimulationInformation = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\SimulationInformation");
                $this->setSimulationInformation($SimulationInformation->fromXmlReader($xr));
                break;
            case "Icon":
                $this->setIcon($xr->readString());
                break;
            case "Documentation":
                $this->setDocumentation($xr->readString());
                break;
            case "TransitionRestrictions":
                $TransitionRestrictions = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\TransitionRestrictions");
                $this->setTransitionRestrictions($TransitionRestrictions->fromXmlReader($xr));
                break;
            case "ExtendedAttributes":
                $ExtendedAttributes = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ExtendedAttributes");
                $this->setExtendedAttributes($ExtendedAttributes->fromXmlReader($xr));
                break;
            default:
                parent::elementsFromXmlReader($xr);
        }
    }

    /**
     * Чтение данных JSON объекта, результата работы json_decode,
     * в объект
     * @param mixed array | stdObject
     *
     */
    public function fromJSON($arg) {
        parent::fromJSON($arg);
        $props = [];
        if (is_array($arg)) {
            $props = $arg;
        } elseif (is_object($arg)) {
            foreach ($arg as $k => $v) {
                $props[$k] = $v;
            }
        }
        if (isset($props["Description"])) {
            $this->setDescription($props["Description"]);
        }
        if (isset($props["Limit"])) {
            $this->setLimit($props["Limit"]);
        }
        if (isset($props["Route"])) {
            $Route = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Route");
            $Route->fromJSON($props["Route"]);
            $this->setRoute($Route);
        }
        if (isset($props["Implementation"])) {
            $Implementation = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Implementation");
            $Implementation->fromJSON($props["Implementation"]);
            $this->setImplementation($Implementation);
        }
        if (isset($props["BlockActivity"])) {
            $BlockActivity = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\BlockActivity");
            $BlockActivity->fromJSON($props["BlockActivity"]);
            $this->setBlockActivity($BlockActivity);
        }
        if (isset($props["Performer"])) {
            $this->setPerformer($props["Performer"]);
        }
        if (isset($props["StartMode"])) {
            $StartMode = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\StartMode");
            $StartMode->fromJSON($props["StartMode"]);
            $this->setStartMode($StartMode);
        }
        if (isset($props["FinishMode"])) {
            $FinishMode = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\FinishMode");
            $FinishMode->fromJSON($props["FinishMode"]);
            $this->setFinishMode($FinishMode);
        }
        if (isset($props["Priority"])) {
            $this->setPriority($props["Priority"]);
        }
        if (isset($props["Deadline"])) {
            if (is_array($props["Deadline"])) {
                foreach ($props["Deadline"] as $k => $v) {
                    $Deadline = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Deadline");
                    $Deadline->fromJSON($v);
                    $this->setDeadline($Deadline);
                }
            }
        }
        if (isset($props["SimulationInformation"])) {
            $SimulationInformation = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\SimulationInformation");
            $SimulationInformation->fromJSON($props["SimulationInformation"]);
            $this->setSimulationInformation($SimulationInformation);
        }
        if (isset($props["Icon"])) {
            $this->setIcon($props["Icon"]);
        }
        if (isset($props["Documentation"])) {
            $this->setDocumentation($props["Documentation"]);
        }
        if (isset($props["TransitionRestrictions"])) {
            $TransitionRestrictions = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\TransitionRestrictions");
            $TransitionRestrictions->fromJSON($props["TransitionRestrictions"]);
            $this->setTransitionRestrictions($TransitionRestrictions);
        }
        if (isset($props["ExtendedAttributes"])) {
            $ExtendedAttributes = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ExtendedAttributes");
            $ExtendedAttributes->fromJSON($props["ExtendedAttributes"]);
            $this->setExtendedAttributes($ExtendedAttributes);
        }
        if (isset($props["Id"])) {
            $this->setId($props["Id"]);
        }
        if (isset($props["Name"])) {
            $this->setName($props["Name"]);
        }
    }

}
