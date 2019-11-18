<?php

namespace ru\ilb\workflow\view;

/**
 * Process definition
 * .
 */
class ProcessDefinition extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "urn:ru:ilb:workflow:view";
    const ROOT = "processDefinition";
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
    protected $DefinitionName = null;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $Version = null;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $PackageId = null;

    /**
     * @maxOccurs 1 .
     * @var \Boolean
     */
    protected $Enabled = null;

    /**
     * @maxOccurs unbounded Activity definition.
     * @var ru\ilb\workflow\view\ActivityDefinition[]
     */
    protected $ActivityDefinition = [];

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
        $this->_properties["definitionName"] = array(
            "prop" => "DefinitionName",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->DefinitionName
        );
        $this->_properties["version"] = array(
            "prop" => "Version",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Version
        );
        $this->_properties["packageId"] = array(
            "prop" => "PackageId",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->PackageId
        );
        $this->_properties["enabled"] = array(
            "prop" => "Enabled",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Enabled
        );
        $this->_properties["activityDefinition"] = array(
            "prop" => "ActivityDefinition",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->ActivityDefinition
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
    public function setDefinitionName($val) {
        $this->DefinitionName = $val;
        $this->_properties["definitionName"]["text"] = $val;
        return $this;
    }

    /**
     * @param \String $val
     */
    public function setVersion($val) {
        $this->Version = $val;
        $this->_properties["version"]["text"] = $val;
        return $this;
    }

    /**
     * @param \String $val
     */
    public function setPackageId($val) {
        $this->PackageId = $val;
        $this->_properties["packageId"]["text"] = $val;
        return $this;
    }

    /**
     * @param \Boolean $val
     */
    public function setEnabled($val) {
        $this->Enabled = $val;
        $this->_properties["enabled"]["text"] = $val;
        return $this;
    }

    /**
     * @param ru\ilb\workflow\view\ActivityDefinition $val
     */
    public function setActivityDefinition(\ru\ilb\workflow\view\ActivityDefinition $val) {
        $this->ActivityDefinition[] = $val;
        $this->_properties["activityDefinition"]["text"][] = $val;
        return $this;
    }

    /**
     * @param ru\ilb\workflow\view\ActivityDefinition[]
     */
    public function setActivityDefinitionArray(array $vals) {
        $this->ActivityDefinition = $vals;
        $this->_properties["activityDefinition"]["text"] = $vals;
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
    public function getDefinitionName() {
        return $this->DefinitionName;
    }

    /**
     * @return \String
     */
    public function getVersion() {
        return $this->Version;
    }

    /**
     * @return \String
     */
    public function getPackageId() {
        return $this->PackageId;
    }

    /**
     * @return \Boolean
     */
    public function getEnabled() {
        return $this->Enabled;
    }

    /**
     * @return ru\ilb\workflow\view\ActivityDefinition | []
     */
    public function getActivityDefinition($index = null) {
        if ($index !== null) {
            $res = isset($this->ActivityDefinition[$index]) ? $this->ActivityDefinition[$index] : null;
        } else {
            $res = $this->ActivityDefinition;
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
        $prop = $this->getDefinitionName();
        if ($prop !== NULL) {
            $xw->writeElement('definitionName', $prop);
        }
        $prop = $this->getVersion();
        if ($prop !== NULL) {
            $xw->writeElement('version', $prop);
        }
        $prop = $this->getPackageId();
        if ($prop !== NULL) {
            $xw->writeElement('packageId', $prop);
        }
        $prop = $this->getEnabled();
        if ($prop !== NULL) {
            $xw->writeElement('enabled', $prop);
        }
        $props = $this->getActivityDefinition();
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
            case "definitionName":
                $this->setDefinitionName($xr->readString());
                break;
            case "version":
                $this->setVersion($xr->readString());
                break;
            case "packageId":
                $this->setPackageId($xr->readString());
                break;
            case "enabled":
                $this->setEnabled($xr->readString());
                break;
            case "activityDefinition":
                $ActivityDefinition = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityDefinition");
                $this->setActivityDefinition($ActivityDefinition->fromXmlReader($xr));
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
        if (isset($props["definitionName"])) {
            $this->setDefinitionName($props["definitionName"]);
        }
        if (isset($props["version"])) {
            $this->setVersion($props["version"]);
        }
        if (isset($props["packageId"])) {
            $this->setPackageId($props["packageId"]);
        }
        if (isset($props["enabled"])) {
            $this->setEnabled($props["enabled"]);
        }
        if (isset($props["activityDefinition"])) {
            if (is_array($props["activityDefinition"])) {
                foreach ($props["activityDefinition"] as $k => $v) {
                    $ActivityDefinition = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityDefinition");
                    $ActivityDefinition->fromJSON($v);
                    $this->setActivityDefinition($ActivityDefinition);
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
        if (isset($row["definitionName"])) {
            $this->setDefinitionName($row["definitionName"]);
        }
        if (isset($row["version"])) {
            $this->setVersion($row["version"]);
        }
        if (isset($row["packageId"])) {
            $this->setPackageId($row["packageId"]);
        }
        if (isset($row["enabled"])) {
            $this->setEnabled($row["enabled"]);
        }
        if (isset($row["activityDefinition"])) {
            if (is_array($row["activityDefinition"])) {
                foreach ($row["activityDefinition"] as $k => $v) {
                    $ActivityDefinition = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityDefinition");
                    $ActivityDefinition->fromArray($v);
                    $this->setActivityDefinition($ActivityDefinition);
                }
            }
        }
    }

}
