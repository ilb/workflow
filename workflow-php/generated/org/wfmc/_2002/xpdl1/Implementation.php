<?php

namespace org\wfmc\_2002\xpdl1;

class Implementation extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "http://www.wfmc.org/2002/XPDL1.0";
    const ROOT = "Implementation";
    const PREF = NULL;

    /**
     * @maxOccurs 1
     * @var org\wfmc\_2002\xpdl1\No
     */
    protected $No = null;

    /**
     * @maxOccurs unbounded
     * @var org\wfmc\_2002\xpdl1\Tool[]
     */
    protected $Tool = [];

    /**
     * @maxOccurs 1
     * @var org\wfmc\_2002\xpdl1\SubFlow
     */
    protected $SubFlow = null;

    public function __construct() {
        parent::__construct();

        $this->_properties["No"] = array(
            "prop" => "No",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->No
        );
        $this->_properties["Tool"] = array(
            "prop" => "Tool",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Tool
        );
        $this->_properties["SubFlow"] = array(
            "prop" => "SubFlow",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->SubFlow
        );
    }

    /**
     * @param org\wfmc\_2002\xpdl1\No $val
     */
    public function setNo(\org\wfmc\_2002\xpdl1\No $val) {
        $this->No = $val;
        $this->_properties["No"]["text"] = $val;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\Tool $val
     */
    public function setTool(\org\wfmc\_2002\xpdl1\Tool $val) {
        $this->Tool[] = $val;
        $this->_properties["Tool"]["text"][] = $val;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\Tool[]
     */
    public function setToolArray(array $vals) {
        $this->Tool = $vals;
        $this->_properties["Tool"]["text"] = $vals;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\SubFlow $val
     */
    public function setSubFlow(\org\wfmc\_2002\xpdl1\SubFlow $val) {
        $this->SubFlow = $val;
        $this->_properties["SubFlow"]["text"] = $val;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\No
     */
    public function getNo() {
        return $this->No;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\Tool | []
     */
    public function getTool($index = null) {
        if ($index !== null) {
            $res = isset($this->Tool[$index]) ? $this->Tool[$index] : null;
        } else {
            $res = $this->Tool;
        }
        return $res;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\SubFlow
     */
    public function getSubFlow() {
        return $this->SubFlow;
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
        if (($prop = $this->getNo()) !== NULL) {
            $prop->toXmlWriter($xw);
        }
        if ($props = $this->getTool()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if (($prop = $this->getSubFlow()) !== NULL) {
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
            case "No":
                $No = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\No");
                $this->setNo($No->fromXmlReader($xr));
                break;
            case "Tool":
                $Tool = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Tool");
                $this->setTool($Tool->fromXmlReader($xr));
                break;
            case "SubFlow":
                $SubFlow = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\SubFlow");
                $this->setSubFlow($SubFlow->fromXmlReader($xr));
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
        if (isset($props["No"])) {
            $No = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\No");
            $No->fromJSON($props["No"]);
            $this->setNo($No);
        }
        if (isset($props["Tool"])) {
            if (is_array($props["Tool"])) {
                foreach ($props["Tool"] as $k => $v) {
                    $Tool = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Tool");
                    $Tool->fromJSON($v);
                    $this->setTool($Tool);
                }
            }
        }
        if (isset($props["SubFlow"])) {
            $SubFlow = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\SubFlow");
            $SubFlow->fromJSON($props["SubFlow"]);
            $this->setSubFlow($SubFlow);
        }
    }

}
