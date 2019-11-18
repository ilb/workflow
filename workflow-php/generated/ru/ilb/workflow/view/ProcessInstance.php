<?php

namespace ru\ilb\workflow\view;

/**
 * Process instance
 * .
 */
class ProcessInstance extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "urn:ru:ilb:workflow:view";
    const ROOT = "processInstance";
    const PREF = NULL;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $Id = null;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $Name = null;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $Description = null;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $ProcessFactoryName = null;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $ProcessDefinitionId = null;

    /**
     * @maxOccurs 1 .
     * @var \Int
     */
    protected $Priority = null;

    /**
     * @maxOccurs 1 .
     * @var \DateTime
     */
    protected $CreationTime = null;

    /**
     * @maxOccurs 1 the time when the process is started.
     * @var \DateTime
     */
    protected $StartTime = null;

    /**
     * @maxOccurs 1 .
     * @var \DateTime
     */
    protected $LastStateTime = null;

    /**
     * @maxOccurs 1 .
     * @var \DateTime
     */
    protected $LimitTime = null;

    /**
     * @maxOccurs 1 .
     * @var ru\ilb\workflow\view\ProcessInstance\State
     */
    protected $State = null;

    /**
     * @maxOccurs unbounded Activity instance.
     * @var ru\ilb\workflow\view\ActivityInstance[]
     */
    protected $ActivityInstance = [];

    public function __construct() {
        parent::__construct();
        $this->_properties["id"] = array(
            "prop" => "Id",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Id
        );
        $this->_properties["name"] = array(
            "prop" => "Name",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Name
        );
        $this->_properties["description"] = array(
            "prop" => "Description",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Description
        );
        $this->_properties["processFactoryName"] = array(
            "prop" => "ProcessFactoryName",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->ProcessFactoryName
        );
        $this->_properties["processDefinitionId"] = array(
            "prop" => "ProcessDefinitionId",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->ProcessDefinitionId
        );
        $this->_properties["priority"] = array(
            "prop" => "Priority",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Priority
        );
        $this->_properties["creationTime"] = array(
            "prop" => "CreationTime",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->CreationTime
        );
        $this->_properties["startTime"] = array(
            "prop" => "StartTime",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->StartTime
        );
        $this->_properties["lastStateTime"] = array(
            "prop" => "LastStateTime",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->LastStateTime
        );
        $this->_properties["limitTime"] = array(
            "prop" => "LimitTime",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->LimitTime
        );
        $this->_properties["state"] = array(
            "prop" => "State",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->State
        );
        $this->_properties["activityInstance"] = array(
            "prop" => "ActivityInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->ActivityInstance
        );
    }

    /**
     * @param \String $val
     */
    public function setId($val) {
        $this->Id = $val;
        $this->_properties["id"]["text"] = $val;
        return $this;
    }

    /**
     * @param \String $val
     */
    public function setName($val) {
        $this->Name = $val;
        $this->_properties["name"]["text"] = $val;
        return $this;
    }

    /**
     * @param \String $val
     */
    public function setDescription($val) {
        $this->Description = $val;
        $this->_properties["description"]["text"] = $val;
        return $this;
    }

    /**
     * @param \String $val
     */
    public function setProcessFactoryName($val) {
        $this->ProcessFactoryName = $val;
        $this->_properties["processFactoryName"]["text"] = $val;
        return $this;
    }

    /**
     * @param \String $val
     */
    public function setProcessDefinitionId($val) {
        $this->ProcessDefinitionId = $val;
        $this->_properties["processDefinitionId"]["text"] = $val;
        return $this;
    }

    /**
     * @param \Int $val
     */
    public function setPriority($val) {
        $this->Priority = $val;
        $this->_properties["priority"]["text"] = $val;
        return $this;
    }

    /**
     * @param \DateTime $val
     */
    public function setCreationTime($val) {
        $this->CreationTime = $val;
        $this->_properties["creationTime"]["text"] = $val;
        return $this;
    }

    /**
     * @param \DateTime $val
     */
    public function setStartTime($val) {
        $this->StartTime = $val;
        $this->_properties["startTime"]["text"] = $val;
        return $this;
    }

    /**
     * @param \DateTime $val
     */
    public function setLastStateTime($val) {
        $this->LastStateTime = $val;
        $this->_properties["lastStateTime"]["text"] = $val;
        return $this;
    }

    /**
     * @param \DateTime $val
     */
    public function setLimitTime($val) {
        $this->LimitTime = $val;
        $this->_properties["limitTime"]["text"] = $val;
        return $this;
    }

    /**
     * @param ru\ilb\workflow\view\ProcessInstance\State $val
     */
    public function setState(\ru\ilb\workflow\view\ProcessInstance\State $val) {
        $this->State = $val;
        $this->_properties["state"]["text"] = $val;
        return $this;
    }

    /**
     * @param ru\ilb\workflow\view\ActivityInstance $val
     */
    public function setActivityInstance(\ru\ilb\workflow\view\ActivityInstance $val) {
        $this->ActivityInstance[] = $val;
        $this->_properties["activityInstance"]["text"][] = $val;
        return $this;
    }

    /**
     * @param ru\ilb\workflow\view\ActivityInstance[]
     */
    public function setActivityInstanceArray(array $vals) {
        $this->ActivityInstance = $vals;
        $this->_properties["activityInstance"]["text"] = $vals;
    }

    /**
     * @return \String
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

    /**
     * @return \String
     */
    public function getDescription() {
        return $this->Description;
    }

    /**
     * @return \String
     */
    public function getProcessFactoryName() {
        return $this->ProcessFactoryName;
    }

    /**
     * @return \String
     */
    public function getProcessDefinitionId() {
        return $this->ProcessDefinitionId;
    }

    /**
     * @return \Int
     */
    public function getPriority() {
        return $this->Priority;
    }

    /**
     * @return \DateTime
     */
    public function getCreationTime() {
        return $this->CreationTime;
    }

    /**
     * @return \DateTime
     */
    public function getStartTime() {
        return $this->StartTime;
    }

    /**
     * @return \DateTime
     */
    public function getLastStateTime() {
        return $this->LastStateTime;
    }

    /**
     * @return \DateTime
     */
    public function getLimitTime() {
        return $this->LimitTime;
    }

    /**
     * @return ru\ilb\workflow\view\ProcessInstance\State
     */
    public function getState() {
        return $this->State;
    }

    /**
     * @return ru\ilb\workflow\view\ActivityInstance | []
     */
    public function getActivityInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->ActivityInstance[$index]) ? $this->ActivityInstance[$index] : null;
        } else {
            $res = $this->ActivityInstance;
        }
        return $res;
    }

    public function toXmlStr($xmlns = self::NS, $xmlname = self::ROOT) {
        return parent::toXmlStr($xmlns, $xmlname);
    }

    /**
     * Вывод в XMLWriter
     * @param XMLWriter $xw
     * @param string $xmlname Имя корневого узла
     * @param string $xmlns Пространство имен
     * @param int $mode
     */
    public function toXmlWriter(\XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS, $mode = \Adaptor_XML::ELEMENT) {
        if ($mode & \Adaptor_XML::STARTELEMENT) {
            $xw->startElementNS(NULL, $xmlname, $xmlns);
        }
        $this->attributesToXmlWriter($xw, $xmlname, $xmlns);
        $this->elementsToXmlWriter($xw, $xmlname, $xmlns);
        if ($mode & \Adaptor_XML::ENDELEMENT) {
            $xw->endElement();
        }
    }

    /**
     * Вывод атрибутов в \XMLWriter
     * @param \XMLWriter $xw
     * @param string $xmlname Имя корневого узла
     * @param string $xmlns Пространство имен
     */
    protected function attributesToXmlWriter(\XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS) {
        parent::attributesToXmlWriter($xw, $xmlname, $xmlns);
    }

    /**
     * Вывод элементов в \XMLWriter
     * @param \XMLWriter $xw
     * @param string $xmlname Имя корневого узла
     * @param string $xmlns Пространство имен
     */
    protected function elementsToXmlWriter(\XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS) {
        parent::elementsToXmlWriter($xw, $xmlname, $xmlns);
        $prop = $this->getId();
        if ($prop !== NULL) {
            $xw->writeElement('id', $prop);
        }
        $prop = $this->getName();
        if ($prop !== NULL) {
            $xw->writeElement('name', $prop);
        }
        $prop = $this->getDescription();
        if ($prop !== NULL) {
            $xw->writeElement('description', $prop);
        }
        $prop = $this->getProcessFactoryName();
        if ($prop !== NULL) {
            $xw->writeElement('processFactoryName', $prop);
        }
        $prop = $this->getProcessDefinitionId();
        if ($prop !== NULL) {
            $xw->writeElement('processDefinitionId', $prop);
        }
        $prop = $this->getPriority();
        if ($prop !== NULL) {
            $xw->writeElement('priority', $prop);
        }
        $prop = $this->getCreationTime();
        if ($prop !== NULL) {
            $xw->writeElement('creationTime', $prop);
        }
        $prop = $this->getStartTime();
        if ($prop !== NULL) {
            $xw->writeElement('startTime', $prop);
        }
        $prop = $this->getLastStateTime();
        if ($prop !== NULL) {
            $xw->writeElement('lastStateTime', $prop);
        }
        $prop = $this->getLimitTime();
        if ($prop !== NULL) {
            $xw->writeElement('limitTime', $prop);
        }
        $prop = $this->getState();
        if ($prop !== NULL) {
            $xw->startElement('state');
            $prop->toXmlWriter($xw, NULL, NULL, \Adaptor_XML::CONTENTS);
            $xw->endElement();
        }
        $props = $this->getActivityInstance();
        if ($props !== NULL) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
    }

    /**
     * Чтение атрибутов из \XMLReader
     * @param \XMLReader $xr
     */
    public function attributesFromXmlReader(\XMLReader &$xr) {
        parent::attributesFromXmlReader($xr);
    }

    /**
     * Чтение элементов из \XMLReader
     * @param \XMLReader $xr
     */
    public function elementsFromXmlReader(\XMLReader &$xr) {
        switch ($xr->localName) {
            case "id":
                $this->setId($xr->readString());
                break;
            case "name":
                $this->setName($xr->readString());
                break;
            case "description":
                $this->setDescription($xr->readString());
                break;
            case "processFactoryName":
                $this->setProcessFactoryName($xr->readString());
                break;
            case "processDefinitionId":
                $this->setProcessDefinitionId($xr->readString());
                break;
            case "priority":
                $this->setPriority($xr->readString());
                break;
            case "creationTime":
                $this->setCreationTime($xr->readString());
                break;
            case "startTime":
                $this->setStartTime($xr->readString());
                break;
            case "lastStateTime":
                $this->setLastStateTime($xr->readString());
                break;
            case "limitTime":
                $this->setLimitTime($xr->readString());
                break;
            case "state":
                $State = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ProcessInstance\\State");
                $this->setState($State->fromXmlReader($xr));
                break;
            case "activityInstance":
                $ActivityInstance = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityInstance");
                $this->setActivityInstance($ActivityInstance->fromXmlReader($xr));
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
        if (isset($props["id"])) {
            $this->setId($props["id"]);
        }
        if (isset($props["name"])) {
            $this->setName($props["name"]);
        }
        if (isset($props["description"])) {
            $this->setDescription($props["description"]);
        }
        if (isset($props["processFactoryName"])) {
            $this->setProcessFactoryName($props["processFactoryName"]);
        }
        if (isset($props["processDefinitionId"])) {
            $this->setProcessDefinitionId($props["processDefinitionId"]);
        }
        if (isset($props["priority"])) {
            $this->setPriority($props["priority"]);
        }
        if (isset($props["creationTime"])) {
            $this->setCreationTime($props["creationTime"]);
        }
        if (isset($props["startTime"])) {
            $this->setStartTime($props["startTime"]);
        }
        if (isset($props["lastStateTime"])) {
            $this->setLastStateTime($props["lastStateTime"]);
        }
        if (isset($props["limitTime"])) {
            $this->setLimitTime($props["limitTime"]);
        }
        if (isset($props["state"])) {
            $State = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ProcessInstance\\State");
            $State->fromJSON($props["state"]);
            $this->setState($State);
        }
        if (isset($props["activityInstance"])) {
            if (is_array($props["activityInstance"])) {
                foreach ($props["activityInstance"] as $k => $v) {
                    $ActivityInstance = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityInstance");
                    $ActivityInstance->fromJSON($v);
                    $this->setActivityInstance($ActivityInstance);
                }
            }
        }
    }

    /**
     * Чтение данных массива
     * в объект
     * @param Array $row
     *
     */
    public function fromArray($row) {
        if (isset($row["id"])) {
            $this->setId($row["id"]);
        }
        if (isset($row["name"])) {
            $this->setName($row["name"]);
        }
        if (isset($row["description"])) {
            $this->setDescription($row["description"]);
        }
        if (isset($row["processFactoryName"])) {
            $this->setProcessFactoryName($row["processFactoryName"]);
        }
        if (isset($row["processDefinitionId"])) {
            $this->setProcessDefinitionId($row["processDefinitionId"]);
        }
        if (isset($row["priority"])) {
            $this->setPriority($row["priority"]);
        }
        if (isset($row["creationTime"])) {
            $this->setCreationTime($row["creationTime"]);
        }
        if (isset($row["startTime"])) {
            $this->setStartTime($row["startTime"]);
        }
        if (isset($row["lastStateTime"])) {
            $this->setLastStateTime($row["lastStateTime"]);
        }
        if (isset($row["limitTime"])) {
            $this->setLimitTime($row["limitTime"]);
        }
        if (isset($row["state"])) {
            $State = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ProcessInstance\\State");
            $State->fromArray($row["state"]);
            $this->setState($State);
        }
        if (isset($row["activityInstance"])) {
            if (is_array($row["activityInstance"])) {
                foreach ($row["activityInstance"] as $k => $v) {
                    $ActivityInstance = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityInstance");
                    $ActivityInstance->fromArray($v);
                    $this->setActivityInstance($ActivityInstance);
                }
            }
        }
    }

}
