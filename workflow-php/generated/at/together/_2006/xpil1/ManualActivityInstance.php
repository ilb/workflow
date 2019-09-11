<?php

namespace at\together\_2006\xpil1;

class ManualActivityInstance extends \at\together\_2006\xpil1\ActivityInstance {

    const NS = "http://www.together.at/2006/XPIL1.0";
    const ROOT = "ManualActivityInstance";
    const PREF = NULL;

    /**
     * @maxOccurs 1
     * @var at\together\_2006\xpil1\AssignmentInstances
     */
    protected $AssignmentInstances = null;

    /**
     * @maxOccurs 1
     * @var at\together\_2006\xpil1\PreviousActivityInstance
     */
    protected $PreviousActivityInstance = null;

    /**
     * @maxOccurs 1
     * @var at\together\_2006\xpil1\NextInfo
     */
    protected $NextInfo = null;

    public function __construct() {
        parent::__construct();

        $this->_properties["AssignmentInstances"] = array(
            "prop" => "AssignmentInstances",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->AssignmentInstances
        );
        $this->_properties["PreviousActivityInstance"] = array(
            "prop" => "PreviousActivityInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->PreviousActivityInstance
        );
        $this->_properties["NextInfo"] = array(
            "prop" => "NextInfo",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->NextInfo
        );
    }

    /**
     * @param at\together\_2006\xpil1\AssignmentInstances $val
     */
    public function setAssignmentInstances(\at\together\_2006\xpil1\AssignmentInstances $val) {
        $this->AssignmentInstances = $val;
        $this->_properties["AssignmentInstances"]["text"] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\PreviousActivityInstance $val
     */
    public function setPreviousActivityInstance(\at\together\_2006\xpil1\PreviousActivityInstance $val) {
        $this->PreviousActivityInstance = $val;
        $this->_properties["PreviousActivityInstance"]["text"] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\NextInfo $val
     */
    public function setNextInfo(\at\together\_2006\xpil1\NextInfo $val) {
        $this->NextInfo = $val;
        $this->_properties["NextInfo"]["text"] = $val;
    }

    /**
     * @return at\together\_2006\xpil1\AssignmentInstances
     */
    public function getAssignmentInstances() {
        return $this->AssignmentInstances;
    }

    /**
     * @return at\together\_2006\xpil1\PreviousActivityInstance
     */
    public function getPreviousActivityInstance() {
        return $this->PreviousActivityInstance;
    }

    /**
     * @return at\together\_2006\xpil1\NextInfo
     */
    public function getNextInfo() {
        return $this->NextInfo;
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
        if (($prop = $this->getAssignmentInstances()) !== NULL) {
            $prop->toXmlWriter($xw);
        }
        if (($prop = $this->getPreviousActivityInstance()) !== NULL) {
            $prop->toXmlWriter($xw);
        }
        if (($prop = $this->getNextInfo()) !== NULL) {
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
            case "AssignmentInstances":
                $AssignmentInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\AssignmentInstances");
                $this->setAssignmentInstances($AssignmentInstances->fromXmlReader($xr));
                break;
            case "PreviousActivityInstance":
                $PreviousActivityInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\PreviousActivityInstance");
                $this->setPreviousActivityInstance($PreviousActivityInstance->fromXmlReader($xr));
                break;
            case "NextInfo":
                $NextInfo = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\NextInfo");
                $this->setNextInfo($NextInfo->fromXmlReader($xr));
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
        if (isset($props["AssignmentInstances"])) {
            $AssignmentInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\AssignmentInstances");
            $AssignmentInstances->fromJSON($props["AssignmentInstances"]);
            $this->setAssignmentInstances($AssignmentInstances);
        }
        if (isset($props["PreviousActivityInstance"])) {
            $PreviousActivityInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\PreviousActivityInstance");
            $PreviousActivityInstance->fromJSON($props["PreviousActivityInstance"]);
            $this->setPreviousActivityInstance($PreviousActivityInstance);
        }
        if (isset($props["NextInfo"])) {
            $NextInfo = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\NextInfo");
            $NextInfo->fromJSON($props["NextInfo"]);
            $this->setNextInfo($NextInfo);
        }
    }

}
