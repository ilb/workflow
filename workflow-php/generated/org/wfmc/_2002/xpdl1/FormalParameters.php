<?php

namespace org\wfmc\_2002\xpdl1;

class FormalParameters extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "http://www.wfmc.org/2002/XPDL1.0";
    const ROOT = "FormalParameters";
    const PREF = NULL;

    /**
     * @maxOccurs unbounded
     * @var org\wfmc\_2002\xpdl1\FormalParameter[]
     */
    protected $FormalParameter = [];

    public function __construct() {
        parent::__construct();

        $this->_properties["FormalParameter"] = array(
            "prop" => "FormalParameter",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->FormalParameter
        );
    }

    /**
     * @param org\wfmc\_2002\xpdl1\FormalParameter $val
     */
    public function setFormalParameter(\org\wfmc\_2002\xpdl1\FormalParameter $val) {
        $this->FormalParameter[] = $val;
        $this->_properties["FormalParameter"]["text"][] = $val;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\FormalParameter[]
     */
    public function setFormalParameterArray(array $vals) {
        $this->FormalParameter = $vals;
        $this->_properties["FormalParameter"]["text"] = $vals;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\FormalParameter | []
     */
    public function getFormalParameter($index = null) {
        if ($index !== null) {
            $res = isset($this->FormalParameter[$index]) ? $this->FormalParameter[$index] : null;
        } else {
            $res = $this->FormalParameter;
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
        if ($props = $this->getFormalParameter()) {
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
            case "FormalParameter":
                $FormalParameter = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\FormalParameter");
                $this->setFormalParameter($FormalParameter->fromXmlReader($xr));
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
        if (isset($props["FormalParameter"])) {
            if (is_array($props["FormalParameter"])) {
                foreach ($props["FormalParameter"] as $k => $v) {
                    $FormalParameter = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\FormalParameter");
                    $FormalParameter->fromJSON($v);
                    $this->setFormalParameter($FormalParameter);
                }
            }
        } elseif (array_keys($props) == array_keys(array_keys($props))) {
            foreach ($props as $v) {
                $FormalParameter = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\FormalParameter");
                $FormalParameter->fromJSON($v);
                $this->setFormalParameter($FormalParameter);
            }
        }
    }

}
