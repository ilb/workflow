<?php

namespace org\wfmc\_2002\xpdl1;

class SimulationInformation extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "http://www.wfmc.org/2002/XPDL1.0";
    const ROOT = "SimulationInformation";
    const PREF = NULL;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $Cost = null;

    /**
     * @maxOccurs 1
     * @var org\wfmc\_2002\xpdl1\TimeEstimation
     */
    protected $TimeEstimation = null;

    /**
     * @maxOccurs 1
     * @var \NMTOKEN
     */
    protected $Instantiation = null;

    public function __construct() {
        parent::__construct();

        $this->_properties["Cost"] = array(
            "prop" => "Cost",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Cost
        );
        $this->_properties["TimeEstimation"] = array(
            "prop" => "TimeEstimation",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->TimeEstimation
        );
        $this->_properties["Instantiation"] = array(
            "prop" => "Instantiation",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Instantiation
        );
    }

    /**
     * @param \String $val
     */
    public function setCost($val) {
        $this->Cost = $val;
        $this->_properties["Cost"]["text"] = $val;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\TimeEstimation $val
     */
    public function setTimeEstimation(\org\wfmc\_2002\xpdl1\TimeEstimation $val) {
        $this->TimeEstimation = $val;
        $this->_properties["TimeEstimation"]["text"] = $val;
    }

    /**
     * @param \NMTOKEN $val
     */
    public function setInstantiation($val) {
        $this->Instantiation = $val;
        $this->_properties["Instantiation"]["text"] = $val;
    }

    /**
     * @return \String
     */
    public function getCost() {
        return $this->Cost;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\TimeEstimation
     */
    public function getTimeEstimation() {
        return $this->TimeEstimation;
    }

    /**
     * @return \NMTOKEN
     */
    public function getInstantiation() {
        return $this->Instantiation;
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
        if ($prop = $this->getInstantiation())
            $xw->writeAttribute('Instantiation', $prop);
    }

    /**
     * Вывод элементов в \XMLWriter
     * @param \XMLWriter $xw
     * @param string $xmlname Имя корневого узла
     * @param string $xmlns Пространство имен
     */
    protected function elementsToXmlWriter(\XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS) {
        parent::elementsToXmlWriter($xw, $xmlname, $xmlns);
        if (($prop = $this->getCost()) !== NULL) {
            $xw->writeElementNS(NULL, 'Cost', 'http://www.wfmc.org/2002/XPDL1.0', $prop);
        }
        if (($prop = $this->getTimeEstimation()) !== NULL) {
            $prop->toXmlWriter($xw);
        }
    }

    /**
     * Чтение атрибутов из \XMLReader
     * @param \XMLReader $xr
     */
    public function attributesFromXmlReader(\XMLReader &$xr) {
        if ($attr = $xr->getAttribute('Instantiation')) {
            $this->_attributes['Instantiation']['prop'] = 'Instantiation';
            $this->setInstantiation($attr);
        }
        parent::attributesFromXmlReader($xr);
    }

    /**
     * Чтение элементов из \XMLReader
     * @param \XMLReader $xr
     */
    public function elementsFromXmlReader(\XMLReader &$xr) {
        switch ($xr->localName) {
            case "Cost":
                $this->setCost($xr->readString());
                break;
            case "TimeEstimation":
                $TimeEstimation = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\TimeEstimation");
                $this->setTimeEstimation($TimeEstimation->fromXmlReader($xr));
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
        if (isset($props["Cost"])) {
            $this->setCost($props["Cost"]);
        }
        if (isset($props["TimeEstimation"])) {
            $TimeEstimation = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\TimeEstimation");
            $TimeEstimation->fromJSON($props["TimeEstimation"]);
            $this->setTimeEstimation($TimeEstimation);
        }
        if (isset($props["Instantiation"])) {
            $this->setInstantiation($props["Instantiation"]);
        }
    }

}
