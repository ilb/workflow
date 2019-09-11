<?php

namespace org\wfmc\_2002\xpdl1;

class ExtendedAttribute extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "http://www.wfmc.org/2002/XPDL1.0";
    const ROOT = "ExtendedAttribute";
    const PREF = NULL;

    /**
     * @maxOccurs 1
     * @var \NMTOKEN
     */
    protected $Name = null;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $Value = null;

    public function __construct() {
        parent::__construct();

        $this->_properties["Name"] = array(
            "prop" => "Name",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Name
        );
        $this->_properties["Value"] = array(
            "prop" => "Value",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Value
        );
    }

    /**
     * @param \NMTOKEN $val
     */
    public function setName($val) {
        $this->Name = $val;
        $this->_properties["Name"]["text"] = $val;
    }

    /**
     * @param \String $val
     */
    public function setValue($val) {
        $this->Value = $val;
        $this->_properties["Value"]["text"] = $val;
    }

    /**
     * @return \NMTOKEN
     */
    public function getName() {
        return $this->Name;
    }

    /**
     * @return \String
     */
    public function getValue() {
        return $this->Value;
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
        if ($prop = $this->getName())
            $xw->writeAttribute('Name', $prop);
        if ($prop = $this->getValue())
            $xw->writeAttribute('Value', $prop);
    }

    /**
     * Вывод элементов в \XMLWriter
     * @param \XMLWriter $xw
     * @param string $xmlname Имя корневого узла
     * @param string $xmlns Пространство имен
     */
    protected function elementsToXmlWriter(\XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS) {
        parent::elementsToXmlWriter($xw, $xmlname, $xmlns);
    }

    /**
     * Чтение атрибутов из \XMLReader
     * @param \XMLReader $xr
     */
    public function attributesFromXmlReader(\XMLReader &$xr) {
        if ($attr = $xr->getAttribute('Name')) {
            $this->_attributes['Name']['prop'] = 'Name';
            $this->setName($attr);
        }
        if ($attr = $xr->getAttribute('Value')) {
            $this->_attributes['Value']['prop'] = 'Value';
            $this->setValue($attr);
        }
        parent::attributesFromXmlReader($xr);
    }

    /**
     * Чтение элементов из \XMLReader
     * @param \XMLReader $xr
     */
    public function elementsFromXmlReader(\XMLReader &$xr) {
        switch ($xr->localName) {
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
        if (isset($props["Name"])) {
            $this->setName($props["Name"]);
        }
        if (isset($props["Value"])) {
            $this->setValue($props["Value"]);
        }
    }

}
