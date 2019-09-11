<?php

namespace org\wfmc\_2002\xpdl1;

class DataField extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "http://www.wfmc.org/2002/XPDL1.0";
    const ROOT = "DataField";
    const PREF = NULL;

    /**
     * @maxOccurs 1
     * @var org\wfmc\_2002\xpdl1\DataType
     */
    protected $DataType = null;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $InitialValue = null;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $Length = null;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $Description = null;

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

    /**
     * @maxOccurs 1
     * @var \NMTOKEN
     */
    protected $IsArray = "FALSE";

    public function __construct() {
        parent::__construct();

        $this->_properties["DataType"] = array(
            "prop" => "DataType",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->DataType
        );
        $this->_properties["InitialValue"] = array(
            "prop" => "InitialValue",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->InitialValue
        );
        $this->_properties["Length"] = array(
            "prop" => "Length",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Length
        );
        $this->_properties["Description"] = array(
            "prop" => "Description",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Description
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
        $this->_properties["IsArray"] = array(
            "prop" => "IsArray",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->IsArray
        );
    }

    /**
     * @param org\wfmc\_2002\xpdl1\DataType $val
     */
    public function setDataType(\org\wfmc\_2002\xpdl1\DataType $val) {
        $this->DataType = $val;
        $this->_properties["DataType"]["text"] = $val;
    }

    /**
     * @param \String $val
     */
    public function setInitialValue($val) {
        $this->InitialValue = $val;
        $this->_properties["InitialValue"]["text"] = $val;
    }

    /**
     * @param \String $val
     */
    public function setLength($val) {
        $this->Length = $val;
        $this->_properties["Length"]["text"] = $val;
    }

    /**
     * @param \String $val
     */
    public function setDescription($val) {
        $this->Description = $val;
        $this->_properties["Description"]["text"] = $val;
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
     * @param \NMTOKEN $val
     */
    public function setIsArray($val) {
        $this->IsArray = $val;
        $this->_properties["IsArray"]["text"] = $val;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\DataType
     */
    public function getDataType() {
        return $this->DataType;
    }

    /**
     * @return \String
     */
    public function getInitialValue() {
        return $this->InitialValue;
    }

    /**
     * @return \String
     */
    public function getLength() {
        return $this->Length;
    }

    /**
     * @return \String
     */
    public function getDescription() {
        return $this->Description;
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

    /**
     * @return \NMTOKEN
     */
    public function getIsArray() {
        return $this->IsArray;
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
        if ($prop = $this->getIsArray())
            $xw->writeAttribute('IsArray', $prop);
    }

    /**
     * Вывод элементов в \XMLWriter
     * @param \XMLWriter $xw
     * @param string $xmlname Имя корневого узла
     * @param string $xmlns Пространство имен
     */
    protected function elementsToXmlWriter(\XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS) {
        parent::elementsToXmlWriter($xw, $xmlname, $xmlns);
        if (($prop = $this->getDataType()) !== NULL) {
            $prop->toXmlWriter($xw);
        }
        if (($prop = $this->getInitialValue()) !== NULL) {
            $xw->writeElementNS(NULL, 'InitialValue', 'http://www.wfmc.org/2002/XPDL1.0', $prop);
        }
        if (($prop = $this->getLength()) !== NULL) {
            $xw->writeElementNS(NULL, 'Length', 'http://www.wfmc.org/2002/XPDL1.0', $prop);
        }
        if (($prop = $this->getDescription()) !== NULL) {
            $xw->writeElementNS(NULL, 'Description', 'http://www.wfmc.org/2002/XPDL1.0', $prop);
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
        if ($attr = $xr->getAttribute('IsArray')) {
            $this->_attributes['IsArray']['prop'] = 'IsArray';
            $this->setIsArray($attr);
        }
        parent::attributesFromXmlReader($xr);
    }

    /**
     * Чтение элементов из \XMLReader
     * @param \XMLReader $xr
     */
    public function elementsFromXmlReader(\XMLReader &$xr) {
        switch ($xr->localName) {
            case "DataType":
                $DataType = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\DataType");
                $this->setDataType($DataType->fromXmlReader($xr));
                break;
            case "InitialValue":
                $this->setInitialValue($xr->readString());
                break;
            case "Length":
                $this->setLength($xr->readString());
                break;
            case "Description":
                $this->setDescription($xr->readString());
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
        if (isset($props["DataType"])) {
            $DataType = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\DataType");
            $DataType->fromJSON($props["DataType"]);
            $this->setDataType($DataType);
        }
        if (isset($props["InitialValue"])) {
            $this->setInitialValue($props["InitialValue"]);
        }
        if (isset($props["Length"])) {
            $this->setLength($props["Length"]);
        }
        if (isset($props["Description"])) {
            $this->setDescription($props["Description"]);
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
        if (isset($props["IsArray"])) {
            $this->setIsArray($props["IsArray"]);
        }
    }

}
