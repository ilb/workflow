<?php

namespace org\wfmc\_2002\xpdl1;

class Application extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "http://www.wfmc.org/2002/XPDL1.0";
    const ROOT = "Application";
    const PREF = NULL;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $Description = null;

    /**
     * @maxOccurs 1
     * @var org\wfmc\_2002\xpdl1\FormalParameters
     */
    protected $FormalParameters = null;

    /**
     * @maxOccurs 1
     * @var org\wfmc\_2002\xpdl1\ExternalReference
     */
    protected $ExternalReference = null;

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
        $this->_properties["FormalParameters"] = array(
            "prop" => "FormalParameters",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->FormalParameters
        );
        $this->_properties["ExternalReference"] = array(
            "prop" => "ExternalReference",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->ExternalReference
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
     * @param org\wfmc\_2002\xpdl1\FormalParameters $val
     */
    public function setFormalParameters(\org\wfmc\_2002\xpdl1\FormalParameters $val) {
        $this->FormalParameters = $val;
        $this->_properties["FormalParameters"]["text"] = $val;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\ExternalReference $val
     */
    public function setExternalReference(\org\wfmc\_2002\xpdl1\ExternalReference $val) {
        $this->ExternalReference = $val;
        $this->_properties["ExternalReference"]["text"] = $val;
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
     * @return org\wfmc\_2002\xpdl1\FormalParameters
     */
    public function getFormalParameters() {
        return $this->FormalParameters;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\ExternalReference
     */
    public function getExternalReference() {
        return $this->ExternalReference;
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
        if (($prop = $this->getFormalParameters()) !== NULL) {
            $prop->toXmlWriter($xw);
        }
        if (($prop = $this->getExternalReference()) !== NULL) {
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
            case "FormalParameters":
                $FormalParameters = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\FormalParameters");
                $this->setFormalParameters($FormalParameters->fromXmlReader($xr));
                break;
            case "ExternalReference":
                $ExternalReference = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ExternalReference");
                $this->setExternalReference($ExternalReference->fromXmlReader($xr));
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
        if (isset($props["FormalParameters"])) {
            $FormalParameters = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\FormalParameters");
            $FormalParameters->fromJSON($props["FormalParameters"]);
            $this->setFormalParameters($FormalParameters);
        }
        if (isset($props["ExternalReference"])) {
            $ExternalReference = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ExternalReference");
            $ExternalReference->fromJSON($props["ExternalReference"]);
            $this->setExternalReference($ExternalReference);
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
