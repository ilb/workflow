<?php

namespace org\wfmc\_2002\xpdl1;

class TransitionRestriction extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "http://www.wfmc.org/2002/XPDL1.0";
    const ROOT = "TransitionRestriction";
    const PREF = NULL;

    /**
     * @maxOccurs 1
     * @var org\wfmc\_2002\xpdl1\Join
     */
    protected $Join = null;

    /**
     * @maxOccurs 1
     * @var org\wfmc\_2002\xpdl1\Split
     */
    protected $Split = null;

    public function __construct() {
        parent::__construct();

        $this->_properties["Join"] = array(
            "prop" => "Join",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Join
        );
        $this->_properties["Split"] = array(
            "prop" => "Split",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Split
        );
    }

    /**
     * @param org\wfmc\_2002\xpdl1\Join $val
     */
    public function setJoin(\org\wfmc\_2002\xpdl1\Join $val) {
        $this->Join = $val;
        $this->_properties["Join"]["text"] = $val;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\Split $val
     */
    public function setSplit(\org\wfmc\_2002\xpdl1\Split $val) {
        $this->Split = $val;
        $this->_properties["Split"]["text"] = $val;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\Join
     */
    public function getJoin() {
        return $this->Join;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\Split
     */
    public function getSplit() {
        return $this->Split;
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
        if (($prop = $this->getJoin()) !== NULL) {
            $prop->toXmlWriter($xw);
        }
        if (($prop = $this->getSplit()) !== NULL) {
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
            case "Join":
                $Join = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Join");
                $this->setJoin($Join->fromXmlReader($xr));
                break;
            case "Split":
                $Split = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Split");
                $this->setSplit($Split->fromXmlReader($xr));
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
        if (isset($props["Join"])) {
            $Join = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Join");
            $Join->fromJSON($props["Join"]);
            $this->setJoin($Join);
        }
        if (isset($props["Split"])) {
            $Split = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Split");
            $Split->fromJSON($props["Split"]);
            $this->setSplit($Split);
        }
    }

}
