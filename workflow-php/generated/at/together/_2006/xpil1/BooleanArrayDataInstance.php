<?php

namespace at\together\_2006\xpil1;

class BooleanArrayDataInstance extends \at\together\_2006\xpil1\DataInstance {

    const NS = "http://www.together.at/2006/XPIL1.0";
    const ROOT = "BooleanArrayDataInstance";
    const PREF = NULL;

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\BooleanValue[]
     */
    protected $BooleanValue = [];

    public function __construct() {
        parent::__construct();

        $this->_properties["BooleanValue"] = array(
            "prop" => "BooleanValue",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->BooleanValue
        );
    }

    /**
     * @param at\together\_2006\xpil1\BooleanValue $val
     */
    public function setBooleanValue(\at\together\_2006\xpil1\BooleanValue $val) {
        $this->BooleanValue[] = $val;
        $this->_properties["BooleanValue"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\BooleanValue[]
     */
    public function setBooleanValueArray(array $vals) {
        $this->BooleanValue = $vals;
        $this->_properties["BooleanValue"]["text"] = $vals;
    }

    /**
     * @return at\together\_2006\xpil1\BooleanValue | []
     */
    public function getBooleanValue($index = null) {
        if ($index !== null) {
            $res = isset($this->BooleanValue[$index]) ? $this->BooleanValue[$index] : null;
        } else {
            $res = $this->BooleanValue;
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
        if ($props = $this->getBooleanValue()) {
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
            case "BooleanValue":
                $BooleanValue = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\BooleanValue");
                $this->setBooleanValue($BooleanValue->fromXmlReader($xr));
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
        if (isset($props["BooleanValue"])) {
            if (is_array($props["BooleanValue"])) {
                foreach ($props["BooleanValue"] as $k => $v) {
                    $BooleanValue = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\BooleanValue");
                    $BooleanValue->fromJSON($v);
                    $this->setBooleanValue($BooleanValue);
                }
            }
        } elseif (array_keys($props) == array_keys(array_keys($props))) {
            foreach ($props as $v) {
                $BooleanValue = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\BooleanValue");
                $BooleanValue->fromJSON($v);
                $this->setBooleanValue($BooleanValue);
            }
        }
    }

}
