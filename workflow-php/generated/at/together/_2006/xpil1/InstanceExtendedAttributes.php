<?php

namespace at\together\_2006\xpil1;

class InstanceExtendedAttributes extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "http://www.together.at/2006/XPIL1.0";
    const ROOT = "InstanceExtendedAttributes";
    const PREF = NULL;

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\InstanceExtendedAttribute[]
     */
    protected $InstanceExtendedAttribute = [];

    public function __construct() {
        parent::__construct();

        $this->_properties["InstanceExtendedAttribute"] = array(
            "prop" => "InstanceExtendedAttribute",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->InstanceExtendedAttribute
        );
    }

    /**
     * @param at\together\_2006\xpil1\InstanceExtendedAttribute $val
     */
    public function setInstanceExtendedAttribute(\at\together\_2006\xpil1\InstanceExtendedAttribute $val) {
        $this->InstanceExtendedAttribute[] = $val;
        $this->_properties["InstanceExtendedAttribute"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\InstanceExtendedAttribute[]
     */
    public function setInstanceExtendedAttributeArray(array $vals) {
        $this->InstanceExtendedAttribute = $vals;
        $this->_properties["InstanceExtendedAttribute"]["text"] = $vals;
    }

    /**
     * @return at\together\_2006\xpil1\InstanceExtendedAttribute | []
     */
    public function getInstanceExtendedAttribute($index = null) {
        if ($index !== null) {
            $res = isset($this->InstanceExtendedAttribute[$index]) ? $this->InstanceExtendedAttribute[$index] : null;
        } else {
            $res = $this->InstanceExtendedAttribute;
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
        if ($props = $this->getInstanceExtendedAttribute()) {
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
            case "InstanceExtendedAttribute":
                $InstanceExtendedAttribute = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\InstanceExtendedAttribute");
                $this->setInstanceExtendedAttribute($InstanceExtendedAttribute->fromXmlReader($xr));
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
        if (isset($props["InstanceExtendedAttribute"])) {
            if (is_array($props["InstanceExtendedAttribute"])) {
                foreach ($props["InstanceExtendedAttribute"] as $k => $v) {
                    $InstanceExtendedAttribute = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\InstanceExtendedAttribute");
                    $InstanceExtendedAttribute->fromJSON($v);
                    $this->setInstanceExtendedAttribute($InstanceExtendedAttribute);
                }
            }
        } elseif (array_keys($props) == array_keys(array_keys($props))) {
            foreach ($props as $v) {
                $InstanceExtendedAttribute = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\InstanceExtendedAttribute");
                $InstanceExtendedAttribute->fromJSON($v);
                $this->setInstanceExtendedAttribute($InstanceExtendedAttribute);
            }
        }
    }

}
