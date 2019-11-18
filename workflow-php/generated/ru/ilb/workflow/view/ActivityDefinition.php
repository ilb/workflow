<?php

namespace ru\ilb\workflow\view;

/**
 * Activity definition
 * .
 */
class ActivityDefinition extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "urn:ru:ilb:workflow:view";
    const ROOT = "activityDefinition";
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
    protected $Type = null;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $Description = null;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $Icon = null;

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
        $this->_properties["type"] = array(
            "prop" => "Type",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Type
        );
        $this->_properties["description"] = array(
            "prop" => "Description",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Description
        );
        $this->_properties["icon"] = array(
            "prop" => "Icon",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Icon
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
    public function setType($val) {
        $this->Type = $val;
        $this->_properties["type"]["text"] = $val;
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
    public function setIcon($val) {
        $this->Icon = $val;
        $this->_properties["icon"]["text"] = $val;
        return $this;
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
    public function getType() {
        return $this->Type;
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
    public function getIcon() {
        return $this->Icon;
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
        $prop = $this->getType();
        if ($prop !== NULL) {
            $xw->writeElement('type', $prop);
        }
        $prop = $this->getDescription();
        if ($prop !== NULL) {
            $xw->writeElement('description', $prop);
        }
        $prop = $this->getIcon();
        if ($prop !== NULL) {
            $xw->writeElement('icon', $prop);
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
            case "type":
                $this->setType($xr->readString());
                break;
            case "description":
                $this->setDescription($xr->readString());
                break;
            case "icon":
                $this->setIcon($xr->readString());
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
        if (isset($props["type"])) {
            $this->setType($props["type"]);
        }
        if (isset($props["description"])) {
            $this->setDescription($props["description"]);
        }
        if (isset($props["icon"])) {
            $this->setIcon($props["icon"]);
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
        if (isset($row["type"])) {
            $this->setType($row["type"]);
        }
        if (isset($row["description"])) {
            $this->setDescription($row["description"]);
        }
        if (isset($row["icon"])) {
            $this->setIcon($row["icon"]);
        }
    }

}
