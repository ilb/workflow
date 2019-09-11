<?php

namespace at\together\_2006\xpil1;

class AssignmentInstances extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "http://www.together.at/2006/XPIL1.0";
    const ROOT = "AssignmentInstances";
    const PREF = NULL;

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\AssignmentInstance[]
     */
    protected $AssignmentInstance = [];

    /**
     * @maxOccurs 1
     * @var at\together\_2006\xpil1\InstanceExtendedAttributes
     */
    protected $InstanceExtendedAttributes = null;

    public function __construct() {
        parent::__construct();

        $this->_properties["AssignmentInstance"] = array(
            "prop" => "AssignmentInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->AssignmentInstance
        );
        $this->_properties["InstanceExtendedAttributes"] = array(
            "prop" => "InstanceExtendedAttributes",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->InstanceExtendedAttributes
        );
    }

    /**
     * @param at\together\_2006\xpil1\AssignmentInstance $val
     */
    public function setAssignmentInstance(\at\together\_2006\xpil1\AssignmentInstance $val) {
        $this->AssignmentInstance[] = $val;
        $this->_properties["AssignmentInstance"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\AssignmentInstance[]
     */
    public function setAssignmentInstanceArray(array $vals) {
        $this->AssignmentInstance = $vals;
        $this->_properties["AssignmentInstance"]["text"] = $vals;
    }

    /**
     * @param at\together\_2006\xpil1\InstanceExtendedAttributes $val
     */
    public function setInstanceExtendedAttributes(\at\together\_2006\xpil1\InstanceExtendedAttributes $val) {
        $this->InstanceExtendedAttributes = $val;
        $this->_properties["InstanceExtendedAttributes"]["text"] = $val;
    }

    /**
     * @return at\together\_2006\xpil1\AssignmentInstance | []
     */
    public function getAssignmentInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->AssignmentInstance[$index]) ? $this->AssignmentInstance[$index] : null;
        } else {
            $res = $this->AssignmentInstance;
        }
        return $res;
    }

    /**
     * @return at\together\_2006\xpil1\InstanceExtendedAttributes
     */
    public function getInstanceExtendedAttributes() {
        return $this->InstanceExtendedAttributes;
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
        if ($props = $this->getAssignmentInstance()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if (($prop = $this->getInstanceExtendedAttributes()) !== NULL) {
            $prop->toXmlWriter($xw);
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
            case "AssignmentInstance":
                $AssignmentInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\AssignmentInstance");
                $this->setAssignmentInstance($AssignmentInstance->fromXmlReader($xr));
                break;
            case "InstanceExtendedAttributes":
                $InstanceExtendedAttributes = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\InstanceExtendedAttributes");
                $this->setInstanceExtendedAttributes($InstanceExtendedAttributes->fromXmlReader($xr));
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
        if (isset($props["AssignmentInstance"])) {
            if (is_array($props["AssignmentInstance"])) {
                foreach ($props["AssignmentInstance"] as $k => $v) {
                    $AssignmentInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\AssignmentInstance");
                    $AssignmentInstance->fromJSON($v);
                    $this->setAssignmentInstance($AssignmentInstance);
                }
            }
        }
        if (isset($props["InstanceExtendedAttributes"])) {
            $InstanceExtendedAttributes = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\InstanceExtendedAttributes");
            $InstanceExtendedAttributes->fromJSON($props["InstanceExtendedAttributes"]);
            $this->setInstanceExtendedAttributes($InstanceExtendedAttributes);
        }
    }

}
