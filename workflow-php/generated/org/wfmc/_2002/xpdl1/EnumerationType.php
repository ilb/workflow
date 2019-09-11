<?php

namespace org\wfmc\_2002\xpdl1;

class EnumerationType extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "http://www.wfmc.org/2002/XPDL1.0";
    const ROOT = "EnumerationType";
    const PREF = NULL;

    /**
     * @maxOccurs unbounded
     * @var org\wfmc\_2002\xpdl1\EnumerationValue[]
     */
    protected $EnumerationValue = [];

    public function __construct() {
        parent::__construct();

        $this->_properties["EnumerationValue"] = array(
            "prop" => "EnumerationValue",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->EnumerationValue
        );
    }

    /**
     * @param org\wfmc\_2002\xpdl1\EnumerationValue $val
     */
    public function setEnumerationValue(\org\wfmc\_2002\xpdl1\EnumerationValue $val) {
        $this->EnumerationValue[] = $val;
        $this->_properties["EnumerationValue"]["text"][] = $val;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\EnumerationValue[]
     */
    public function setEnumerationValueArray(array $vals) {
        $this->EnumerationValue = $vals;
        $this->_properties["EnumerationValue"]["text"] = $vals;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\EnumerationValue | []
     */
    public function getEnumerationValue($index = null) {
        if ($index !== null) {
            $res = isset($this->EnumerationValue[$index]) ? $this->EnumerationValue[$index] : null;
        } else {
            $res = $this->EnumerationValue;
        }
        return $res;
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
    }

    /**
     * Вывод элементов в \XMLWriter
     * @param \XMLWriter $xw
     * @param string $xmlname Имя корневого узла
     * @param string $xmlns Пространство имен
     */
    protected function elementsToXmlWriter(\XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS) {
        parent::elementsToXmlWriter($xw, $xmlname, $xmlns);
        if ($props = $this->getEnumerationValue()) {
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
            case "EnumerationValue":
                $EnumerationValue = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\EnumerationValue");
                $this->setEnumerationValue($EnumerationValue->fromXmlReader($xr));
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
        if (isset($props["EnumerationValue"])) {
            if (is_array($props["EnumerationValue"])) {
                foreach ($props["EnumerationValue"] as $k => $v) {
                    $EnumerationValue = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\EnumerationValue");
                    $EnumerationValue->fromJSON($v);
                    $this->setEnumerationValue($EnumerationValue);
                }
            }
        } elseif (array_keys($props) == array_keys(array_keys($props))) {
            foreach ($props as $v) {
                $EnumerationValue = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\EnumerationValue");
                $EnumerationValue->fromJSON($v);
                $this->setEnumerationValue($EnumerationValue);
            }
        }
    }

}
