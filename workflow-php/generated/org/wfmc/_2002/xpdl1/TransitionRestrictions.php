<?php

namespace org\wfmc\_2002\xpdl1;

class TransitionRestrictions extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "http://www.wfmc.org/2002/XPDL1.0";
    const ROOT = "TransitionRestrictions";
    const PREF = NULL;

    /**
     * @maxOccurs unbounded
     * @var org\wfmc\_2002\xpdl1\TransitionRestriction[]
     */
    protected $TransitionRestriction = [];

    public function __construct() {
        parent::__construct();

        $this->_properties["TransitionRestriction"] = array(
            "prop" => "TransitionRestriction",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->TransitionRestriction
        );
    }

    /**
     * @param org\wfmc\_2002\xpdl1\TransitionRestriction $val
     */
    public function setTransitionRestriction(\org\wfmc\_2002\xpdl1\TransitionRestriction $val) {
        $this->TransitionRestriction[] = $val;
        $this->_properties["TransitionRestriction"]["text"][] = $val;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\TransitionRestriction[]
     */
    public function setTransitionRestrictionArray(array $vals) {
        $this->TransitionRestriction = $vals;
        $this->_properties["TransitionRestriction"]["text"] = $vals;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\TransitionRestriction | []
     */
    public function getTransitionRestriction($index = null) {
        if ($index !== null) {
            $res = isset($this->TransitionRestriction[$index]) ? $this->TransitionRestriction[$index] : null;
        } else {
            $res = $this->TransitionRestriction;
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
        if ($props = $this->getTransitionRestriction()) {
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
            case "TransitionRestriction":
                $TransitionRestriction = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\TransitionRestriction");
                $this->setTransitionRestriction($TransitionRestriction->fromXmlReader($xr));
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
        if (isset($props["TransitionRestriction"])) {
            if (is_array($props["TransitionRestriction"])) {
                foreach ($props["TransitionRestriction"] as $k => $v) {
                    $TransitionRestriction = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\TransitionRestriction");
                    $TransitionRestriction->fromJSON($v);
                    $this->setTransitionRestriction($TransitionRestriction);
                }
            }
        } elseif (array_keys($props) == array_keys(array_keys($props))) {
            foreach ($props as $v) {
                $TransitionRestriction = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\TransitionRestriction");
                $TransitionRestriction->fromJSON($v);
                $this->setTransitionRestriction($TransitionRestriction);
            }
        }
    }

}
