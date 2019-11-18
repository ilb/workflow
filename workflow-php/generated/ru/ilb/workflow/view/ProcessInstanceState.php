<?php

namespace ru\ilb\workflow\view;

/**
 * Process instance state
 * .
 */
class ProcessInstanceState extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "urn:ru:ilb:workflow:view";
    const ROOT = "processInstanceState";
    const PREF = NULL;

    /**
     * @maxOccurs 1 .
     * @var \NMTOKEN
     */
    protected $Code = null;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $Name = null;

    /**
     * @maxOccurs 1 .
     * @var \Boolean
     */
    protected $Open = null;

    public function __construct() {
        parent::__construct();
        $this->_properties["code"] = array(
            "prop" => "Code",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Code
        );
        $this->_properties["name"] = array(
            "prop" => "Name",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Name
        );
        $this->_properties["open"] = array(
            "prop" => "Open",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Open
        );
    }

    /**
     * @param \NMTOKEN $val
     */
    public function setCode($val) {
        $this->Code = $val;
        $this->_properties["code"]["text"] = $val;
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
     * @param \Boolean $val
     */
    public function setOpen($val) {
        $this->Open = $val;
        $this->_properties["open"]["text"] = $val;
        return $this;
    }

    /**
     * @return \NMTOKEN
     */
    public function getCode() {
        return $this->Code;
    }

    /**
     * @return \String
     */
    public function getName() {
        return $this->Name;
    }

    /**
     * @return \Boolean
     */
    public function getOpen() {
        return $this->Open;
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
        $prop = $this->getCode();
        if ($prop !== NULL) {
            $xw->writeElement('code', $prop);
        }
        $prop = $this->getName();
        if ($prop !== NULL) {
            $xw->writeElement('name', $prop);
        }
        $prop = $this->getOpen();
        if ($prop !== NULL) {
            $xw->writeElement('open', $prop);
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
            case "code":
                $this->setCode($xr->readString());
                break;
            case "name":
                $this->setName($xr->readString());
                break;
            case "open":
                $this->setOpen($xr->readString());
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
        if (isset($props["code"])) {
            $this->setCode($props["code"]);
        }
        if (isset($props["name"])) {
            $this->setName($props["name"]);
        }
        if (isset($props["open"])) {
            $this->setOpen($props["open"]);
        }
    }

    /**
     * Чтение данных массива
     * в объект
     * @param Array $row
     *
     */
    public function fromArray($row) {
        if (isset($row["code"])) {
            $this->setCode($row["code"]);
        }
        if (isset($row["name"])) {
            $this->setName($row["name"]);
        }
        if (isset($row["open"])) {
            $this->setOpen($row["open"]);
        }
    }

}
