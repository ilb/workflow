<?php

namespace at\together\_2006\xpil1;

class ActivityInstances extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "http://www.together.at/2006/XPIL1.0";
    const ROOT = "ActivityInstances";
    const PREF = NULL;

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\ActivityInstance[]
     */
    protected $ManualActivityInstance = [];

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\ActivityInstance[]
     */
    protected $ToolActivityInstance = [];

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\ActivityInstance[]
     */
    protected $BlockActivityInstance = [];

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\ActivityInstance[]
     */
    protected $RouteActivityInstance = [];

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\ActivityInstance[]
     */
    protected $SubFlowActivityInstance = [];

    /**
     * @maxOccurs 1
     * @var at\together\_2006\xpil1\InstanceExtendedAttributes
     */
    protected $InstanceExtendedAttributes = null;

    public function __construct() {
        parent::__construct();

        $this->_properties["ManualActivityInstance"] = array(
            "prop" => "ManualActivityInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->ManualActivityInstance
        );
        $this->_properties["ToolActivityInstance"] = array(
            "prop" => "ToolActivityInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->ToolActivityInstance
        );
        $this->_properties["BlockActivityInstance"] = array(
            "prop" => "BlockActivityInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->BlockActivityInstance
        );
        $this->_properties["RouteActivityInstance"] = array(
            "prop" => "RouteActivityInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->RouteActivityInstance
        );
        $this->_properties["SubFlowActivityInstance"] = array(
            "prop" => "SubFlowActivityInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->SubFlowActivityInstance
        );
        $this->_properties["InstanceExtendedAttributes"] = array(
            "prop" => "InstanceExtendedAttributes",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->InstanceExtendedAttributes
        );
    }

    /**
     * @param at\together\_2006\xpil1\ActivityInstance $val
     */
    public function setManualActivityInstance(\at\together\_2006\xpil1\ActivityInstance $val) {
        $this->ManualActivityInstance[] = $val;
        $this->_properties["ManualActivityInstance"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\ActivityInstance[]
     */
    public function setManualActivityInstanceArray(array $vals) {
        $this->ManualActivityInstance = $vals;
        $this->_properties["ManualActivityInstance"]["text"] = $vals;
    }

    /**
     * @param at\together\_2006\xpil1\ActivityInstance $val
     */
    public function setToolActivityInstance(\at\together\_2006\xpil1\ActivityInstance $val) {
        $this->ToolActivityInstance[] = $val;
        $this->_properties["ToolActivityInstance"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\ActivityInstance[]
     */
    public function setToolActivityInstanceArray(array $vals) {
        $this->ToolActivityInstance = $vals;
        $this->_properties["ToolActivityInstance"]["text"] = $vals;
    }

    /**
     * @param at\together\_2006\xpil1\ActivityInstance $val
     */
    public function setBlockActivityInstance(\at\together\_2006\xpil1\ActivityInstance $val) {
        $this->BlockActivityInstance[] = $val;
        $this->_properties["BlockActivityInstance"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\ActivityInstance[]
     */
    public function setBlockActivityInstanceArray(array $vals) {
        $this->BlockActivityInstance = $vals;
        $this->_properties["BlockActivityInstance"]["text"] = $vals;
    }

    /**
     * @param at\together\_2006\xpil1\ActivityInstance $val
     */
    public function setRouteActivityInstance(\at\together\_2006\xpil1\ActivityInstance $val) {
        $this->RouteActivityInstance[] = $val;
        $this->_properties["RouteActivityInstance"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\ActivityInstance[]
     */
    public function setRouteActivityInstanceArray(array $vals) {
        $this->RouteActivityInstance = $vals;
        $this->_properties["RouteActivityInstance"]["text"] = $vals;
    }

    /**
     * @param at\together\_2006\xpil1\ActivityInstance $val
     */
    public function setSubFlowActivityInstance(\at\together\_2006\xpil1\ActivityInstance $val) {
        $this->SubFlowActivityInstance[] = $val;
        $this->_properties["SubFlowActivityInstance"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\ActivityInstance[]
     */
    public function setSubFlowActivityInstanceArray(array $vals) {
        $this->SubFlowActivityInstance = $vals;
        $this->_properties["SubFlowActivityInstance"]["text"] = $vals;
    }

    /**
     * @param at\together\_2006\xpil1\InstanceExtendedAttributes $val
     */
    public function setInstanceExtendedAttributes(\at\together\_2006\xpil1\InstanceExtendedAttributes $val) {
        $this->InstanceExtendedAttributes = $val;
        $this->_properties["InstanceExtendedAttributes"]["text"] = $val;
    }

    /**
     * @return at\together\_2006\xpil1\ActivityInstance | []
     */
    public function getManualActivityInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->ManualActivityInstance[$index]) ? $this->ManualActivityInstance[$index] : null;
        } else {
            $res = $this->ManualActivityInstance;
        }
        return $res;
    }

    /**
     * @return at\together\_2006\xpil1\ActivityInstance | []
     */
    public function getToolActivityInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->ToolActivityInstance[$index]) ? $this->ToolActivityInstance[$index] : null;
        } else {
            $res = $this->ToolActivityInstance;
        }
        return $res;
    }

    /**
     * @return at\together\_2006\xpil1\ActivityInstance | []
     */
    public function getBlockActivityInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->BlockActivityInstance[$index]) ? $this->BlockActivityInstance[$index] : null;
        } else {
            $res = $this->BlockActivityInstance;
        }
        return $res;
    }

    /**
     * @return at\together\_2006\xpil1\ActivityInstance | []
     */
    public function getRouteActivityInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->RouteActivityInstance[$index]) ? $this->RouteActivityInstance[$index] : null;
        } else {
            $res = $this->RouteActivityInstance;
        }
        return $res;
    }

    /**
     * @return at\together\_2006\xpil1\ActivityInstance | []
     */
    public function getSubFlowActivityInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->SubFlowActivityInstance[$index]) ? $this->SubFlowActivityInstance[$index] : null;
        } else {
            $res = $this->SubFlowActivityInstance;
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
        if ($props = $this->getManualActivityInstance()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if ($props = $this->getToolActivityInstance()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if ($props = $this->getBlockActivityInstance()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if ($props = $this->getRouteActivityInstance()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if ($props = $this->getSubFlowActivityInstance()) {
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
            case "ManualActivityInstance":
                $ManualActivityInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\ManualActivityInstance");
                $this->setManualActivityInstance($ManualActivityInstance->fromXmlReader($xr));
                break;
            case "ToolActivityInstance":
                $ToolActivityInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\ToolActivityInstance");
                $this->setToolActivityInstance($ToolActivityInstance->fromXmlReader($xr));
                break;
            case "BlockActivityInstance":
                $BlockActivityInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\BlockActivityInstance");
                $this->setBlockActivityInstance($BlockActivityInstance->fromXmlReader($xr));
                break;
            case "RouteActivityInstance":
                $RouteActivityInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\RouteActivityInstance");
                $this->setRouteActivityInstance($RouteActivityInstance->fromXmlReader($xr));
                break;
            case "SubFlowActivityInstance":
                $SubFlowActivityInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\SubFlowActivityInstance");
                $this->setSubFlowActivityInstance($SubFlowActivityInstance->fromXmlReader($xr));
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
        if (isset($props["ManualActivityInstance"])) {
            if (is_array($props["ManualActivityInstance"])) {
                foreach ($props["ManualActivityInstance"] as $k => $v) {
                    $ManualActivityInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\ManualActivityInstance");
                    $ManualActivityInstance->fromJSON($v);
                    $this->setManualActivityInstance($ManualActivityInstance);
                }
            }
        }
        if (isset($props["ToolActivityInstance"])) {
            if (is_array($props["ToolActivityInstance"])) {
                foreach ($props["ToolActivityInstance"] as $k => $v) {
                    $ToolActivityInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\ToolActivityInstance");
                    $ToolActivityInstance->fromJSON($v);
                    $this->setToolActivityInstance($ToolActivityInstance);
                }
            }
        }
        if (isset($props["BlockActivityInstance"])) {
            if (is_array($props["BlockActivityInstance"])) {
                foreach ($props["BlockActivityInstance"] as $k => $v) {
                    $BlockActivityInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\BlockActivityInstance");
                    $BlockActivityInstance->fromJSON($v);
                    $this->setBlockActivityInstance($BlockActivityInstance);
                }
            }
        }
        if (isset($props["RouteActivityInstance"])) {
            if (is_array($props["RouteActivityInstance"])) {
                foreach ($props["RouteActivityInstance"] as $k => $v) {
                    $RouteActivityInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\RouteActivityInstance");
                    $RouteActivityInstance->fromJSON($v);
                    $this->setRouteActivityInstance($RouteActivityInstance);
                }
            }
        }
        if (isset($props["SubFlowActivityInstance"])) {
            if (is_array($props["SubFlowActivityInstance"])) {
                foreach ($props["SubFlowActivityInstance"] as $k => $v) {
                    $SubFlowActivityInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\SubFlowActivityInstance");
                    $SubFlowActivityInstance->fromJSON($v);
                    $this->setSubFlowActivityInstance($SubFlowActivityInstance);
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
