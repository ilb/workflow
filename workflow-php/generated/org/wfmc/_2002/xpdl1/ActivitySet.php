<?php

namespace org\wfmc\_2002\xpdl1;

class ActivitySet extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "http://www.wfmc.org/2002/XPDL1.0";
    const ROOT = "ActivitySet";
    const PREF = NULL;

    /**
     * @maxOccurs 1
     * @var org\wfmc\_2002\xpdl1\Activities
     */
    protected $Activities = null;

    /**
     * @maxOccurs 1
     * @var org\wfmc\_2002\xpdl1\Transitions
     */
    protected $Transitions = null;

    /**
     * @maxOccurs 1
     * @var \NMTOKEN
     */
    protected $Id = null;

    public function __construct() {
        parent::__construct();

        $this->_properties["Activities"] = array(
            "prop" => "Activities",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Activities
        );
        $this->_properties["Transitions"] = array(
            "prop" => "Transitions",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Transitions
        );
        $this->_properties["Id"] = array(
            "prop" => "Id",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Id
        );
    }

    /**
     * @param org\wfmc\_2002\xpdl1\Activities $val
     */
    public function setActivities(\org\wfmc\_2002\xpdl1\Activities $val) {
        $this->Activities = $val;
        $this->_properties["Activities"]["text"] = $val;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\Transitions $val
     */
    public function setTransitions(\org\wfmc\_2002\xpdl1\Transitions $val) {
        $this->Transitions = $val;
        $this->_properties["Transitions"]["text"] = $val;
    }

    /**
     * @param \NMTOKEN $val
     */
    public function setId($val) {
        $this->Id = $val;
        $this->_properties["Id"]["text"] = $val;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\Activities
     */
    public function getActivities() {
        return $this->Activities;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\Transitions
     */
    public function getTransitions() {
        return $this->Transitions;
    }

    /**
     * @return \NMTOKEN
     */
    public function getId() {
        return $this->Id;
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
        if ($prop = $this->getId())
            $xw->writeAttribute('Id', $prop);
    }

    /**
     * Вывод элементов в \XMLWriter
     * @param \XMLWriter $xw
     * @param string $xmlname Имя корневого узла
     * @param string $xmlns Пространство имен
     */
    protected function elementsToXmlWriter(\XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS) {
        parent::elementsToXmlWriter($xw, $xmlname, $xmlns);
        if (($prop = $this->getActivities()) !== NULL) {
            $prop->toXmlWriter($xw);
        }
        if (($prop = $this->getTransitions()) !== NULL) {
            $prop->toXmlWriter($xw);
        }
    }

    /**
     * Чтение атрибутов из \XMLReader
     * @param \XMLReader $xr
     */
    public function attributesFromXmlReader(\XMLReader &$xr) {
        if ($attr = $xr->getAttribute('Id')) {
            $this->_attributes['Id']['prop'] = 'Id';
            $this->setId($attr);
        }
        parent::attributesFromXmlReader($xr);
    }

    /**
     * Чтение элементов из \XMLReader
     * @param \XMLReader $xr
     */
    public function elementsFromXmlReader(\XMLReader &$xr) {
        switch ($xr->localName) {
            case "Activities":
                $Activities = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Activities");
                $this->setActivities($Activities->fromXmlReader($xr));
                break;
            case "Transitions":
                $Transitions = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Transitions");
                $this->setTransitions($Transitions->fromXmlReader($xr));
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
        if (isset($props["Activities"])) {
            $Activities = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Activities");
            $Activities->fromJSON($props["Activities"]);
            $this->setActivities($Activities);
        }
        if (isset($props["Transitions"])) {
            $Transitions = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Transitions");
            $Transitions->fromJSON($props["Transitions"]);
            $this->setTransitions($Transitions);
        }
        if (isset($props["Id"])) {
            $this->setId($props["Id"]);
        }
    }

}
