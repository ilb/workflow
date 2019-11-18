<?php

namespace ru\ilb\workflow\view;

/**
 * Process step
 * .
 */
class ProcessStep extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "urn:ru:ilb:workflow:view";
    const ROOT = "processStep";
    const PREF = NULL;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $Key = null;

    /**
     * @maxOccurs 1 .
     * @var \Boolean
     */
    protected $Active = null;

    /**
     * @maxOccurs 1 .
     * @var \Boolean
     */
    protected $Disabled = null;

    /**
     * @maxOccurs 1 .
     * @var \Boolean
     */
    protected $Completed = null;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $Icon = null;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $Title = null;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $Description = null;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $ActivityId = null;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $Href = null;

    public function __construct() {
        parent::__construct();
        $this->_properties["key"] = array(
            "prop" => "Key",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Key
        );
        $this->_properties["active"] = array(
            "prop" => "Active",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Active
        );
        $this->_properties["disabled"] = array(
            "prop" => "Disabled",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Disabled
        );
        $this->_properties["completed"] = array(
            "prop" => "Completed",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Completed
        );
        $this->_properties["icon"] = array(
            "prop" => "Icon",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Icon
        );
        $this->_properties["title"] = array(
            "prop" => "Title",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Title
        );
        $this->_properties["description"] = array(
            "prop" => "Description",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Description
        );
        $this->_properties["activityId"] = array(
            "prop" => "ActivityId",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->ActivityId
        );
        $this->_properties["href"] = array(
            "prop" => "Href",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Href
        );
    }

    /**
     * @param \String $val
     */
    public function setKey($val) {
        $this->Key = $val;
        $this->_properties["key"]["text"] = $val;
        return $this;
    }

    /**
     * @param \Boolean $val
     */
    public function setActive($val) {
        $this->Active = $val;
        $this->_properties["active"]["text"] = $val;
        return $this;
    }

    /**
     * @param \Boolean $val
     */
    public function setDisabled($val) {
        $this->Disabled = $val;
        $this->_properties["disabled"]["text"] = $val;
        return $this;
    }

    /**
     * @param \Boolean $val
     */
    public function setCompleted($val) {
        $this->Completed = $val;
        $this->_properties["completed"]["text"] = $val;
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
     * @param \String $val
     */
    public function setTitle($val) {
        $this->Title = $val;
        $this->_properties["title"]["text"] = $val;
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
    public function setActivityId($val) {
        $this->ActivityId = $val;
        $this->_properties["activityId"]["text"] = $val;
        return $this;
    }

    /**
     * @param \String $val
     */
    public function setHref($val) {
        $this->Href = $val;
        $this->_properties["href"]["text"] = $val;
        return $this;
    }

    /**
     * @return \String
     */
    public function getKey() {
        return $this->Key;
    }

    /**
     * @return \Boolean
     */
    public function getActive() {
        return $this->Active;
    }

    /**
     * @return \Boolean
     */
    public function getDisabled() {
        return $this->Disabled;
    }

    /**
     * @return \Boolean
     */
    public function getCompleted() {
        return $this->Completed;
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
    public function getTitle() {
        return $this->Title;
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
    public function getActivityId() {
        return $this->ActivityId;
    }

    /**
     * @return \String
     */
    public function getHref() {
        return $this->Href;
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
        $prop = $this->getKey();
        if ($prop !== NULL) {
            $xw->writeElement('key', $prop);
        }
        $prop = $this->getActive();
        if ($prop !== NULL) {
            $xw->writeElement('active', $prop);
        }
        $prop = $this->getDisabled();
        if ($prop !== NULL) {
            $xw->writeElement('disabled', $prop);
        }
        $prop = $this->getCompleted();
        if ($prop !== NULL) {
            $xw->writeElement('completed', $prop);
        }
        $prop = $this->getIcon();
        if ($prop !== NULL) {
            $xw->writeElement('icon', $prop);
        }
        $prop = $this->getTitle();
        if ($prop !== NULL) {
            $xw->writeElement('title', $prop);
        }
        $prop = $this->getDescription();
        if ($prop !== NULL) {
            $xw->writeElement('description', $prop);
        }
        $prop = $this->getActivityId();
        if ($prop !== NULL) {
            $xw->writeElement('activityId', $prop);
        }
        $prop = $this->getHref();
        if ($prop !== NULL) {
            $xw->writeElement('href', $prop);
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
            case "key":
                $this->setKey($xr->readString());
                break;
            case "active":
                $this->setActive($xr->readString());
                break;
            case "disabled":
                $this->setDisabled($xr->readString());
                break;
            case "completed":
                $this->setCompleted($xr->readString());
                break;
            case "icon":
                $this->setIcon($xr->readString());
                break;
            case "title":
                $this->setTitle($xr->readString());
                break;
            case "description":
                $this->setDescription($xr->readString());
                break;
            case "activityId":
                $this->setActivityId($xr->readString());
                break;
            case "href":
                $this->setHref($xr->readString());
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
        if (isset($props["key"])) {
            $this->setKey($props["key"]);
        }
        if (isset($props["active"])) {
            $this->setActive($props["active"]);
        }
        if (isset($props["disabled"])) {
            $this->setDisabled($props["disabled"]);
        }
        if (isset($props["completed"])) {
            $this->setCompleted($props["completed"]);
        }
        if (isset($props["icon"])) {
            $this->setIcon($props["icon"]);
        }
        if (isset($props["title"])) {
            $this->setTitle($props["title"]);
        }
        if (isset($props["description"])) {
            $this->setDescription($props["description"]);
        }
        if (isset($props["activityId"])) {
            $this->setActivityId($props["activityId"]);
        }
        if (isset($props["href"])) {
            $this->setHref($props["href"]);
        }
    }

    /**
     * Чтение данных массива
     * в объект
     * @param Array $row
     *
     */
    public function fromArray($row) {
        if (isset($row["key"])) {
            $this->setKey($row["key"]);
        }
        if (isset($row["active"])) {
            $this->setActive($row["active"]);
        }
        if (isset($row["disabled"])) {
            $this->setDisabled($row["disabled"]);
        }
        if (isset($row["completed"])) {
            $this->setCompleted($row["completed"]);
        }
        if (isset($row["icon"])) {
            $this->setIcon($row["icon"]);
        }
        if (isset($row["title"])) {
            $this->setTitle($row["title"]);
        }
        if (isset($row["description"])) {
            $this->setDescription($row["description"]);
        }
        if (isset($row["activityId"])) {
            $this->setActivityId($row["activityId"]);
        }
        if (isset($row["href"])) {
            $this->setHref($row["href"]);
        }
    }

}
