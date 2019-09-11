<?php

namespace org\wfmc\_2002\xpdl1;

class ExtendedAttributes extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "http://www.wfmc.org/2002/XPDL1.0";
    const ROOT = "ExtendedAttributes";
    const PREF = NULL;

    /**
     * @maxOccurs unbounded
     * @var org\wfmc\_2002\xpdl1\ExtendedAttribute[]
     */
    protected $ExtendedAttribute = [];

    public function __construct() {
        parent::__construct();

        $this->_properties["ExtendedAttribute"] = array(
            "prop" => "ExtendedAttribute",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->ExtendedAttribute
        );
    }

    /**
     * @param org\wfmc\_2002\xpdl1\ExtendedAttribute $val
     */
    public function setExtendedAttribute(\org\wfmc\_2002\xpdl1\ExtendedAttribute $val) {
        $this->ExtendedAttribute[] = $val;
        $this->_properties["ExtendedAttribute"]["text"][] = $val;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\ExtendedAttribute[]
     */
    public function setExtendedAttributeArray(array $vals) {
        $this->ExtendedAttribute = $vals;
        $this->_properties["ExtendedAttribute"]["text"] = $vals;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\ExtendedAttribute | []
     */
    public function getExtendedAttribute($index = null) {
        if ($index !== null) {
            $res = isset($this->ExtendedAttribute[$index]) ? $this->ExtendedAttribute[$index] : null;
        } else {
            $res = $this->ExtendedAttribute;
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
        if ($props = $this->getExtendedAttribute()) {
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
            case "ExtendedAttribute":
                $ExtendedAttribute = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ExtendedAttribute");
                $this->setExtendedAttribute($ExtendedAttribute->fromXmlReader($xr));
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
        if (isset($props["ExtendedAttribute"])) {
            if (is_array($props["ExtendedAttribute"])) {
                foreach ($props["ExtendedAttribute"] as $k => $v) {
                    $ExtendedAttribute = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ExtendedAttribute");
                    $ExtendedAttribute->fromJSON($v);
                    $this->setExtendedAttribute($ExtendedAttribute);
                }
            }
        } elseif (array_keys($props) == array_keys(array_keys($props))) {
            foreach ($props as $v) {
                $ExtendedAttribute = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ExtendedAttribute");
                $ExtendedAttribute->fromJSON($v);
                $this->setExtendedAttribute($ExtendedAttribute);
            }
        }
    }

}
