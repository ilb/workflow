<?php

namespace ru\ilb\workflow\view;

class ProcessSteps extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "urn:ru:ilb:workflow:view";
    const ROOT = "processSteps";
    const PREF = NULL;

    /**
     * @maxOccurs unbounded Process step.
     * @var ru\ilb\workflow\view\ProcessStep[]
     */
    protected $ProcessStep = [];

    public function __construct() {
        parent::__construct();
        $this->_properties["processStep"] = array(
            "prop" => "ProcessStep",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->ProcessStep
        );
    }

    /**
     * @param ru\ilb\workflow\view\ProcessStep $val
     */
    public function setProcessStep(\ru\ilb\workflow\view\ProcessStep $val) {
        $this->ProcessStep[] = $val;
        $this->_properties["processStep"]["text"][] = $val;
        return $this;
    }

    /**
     * @param ru\ilb\workflow\view\ProcessStep[]
     */
    public function setProcessStepArray(array $vals) {
        $this->ProcessStep = $vals;
        $this->_properties["processStep"]["text"] = $vals;
    }

    /**
     * @return ru\ilb\workflow\view\ProcessStep | []
     */
    public function getProcessStep($index = null) {
        if ($index !== null) {
            $res = isset($this->ProcessStep[$index]) ? $this->ProcessStep[$index] : null;
        } else {
            $res = $this->ProcessStep;
        }
        return $res;
    }

    public function toXmlStr($xmlns = self::NS, $xmlname = self::ROOT) {
        return parent::toXmlStr($xmlns, $xmlname);
    }

    /**
     * Вывод в XMLWriter
     * @param XMLWriter $xw
     * @param string $xmlname Имя корневого узла
     * @param string $xmlns Пространство имен
     * @param int $mode
     */
    public function toXmlWriter(\XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS, $mode = \Adaptor_XML::ELEMENT) {
        if ($mode & \Adaptor_XML::STARTELEMENT) {
            $xw->startElementNS(NULL, $xmlname, $xmlns);
        }
        $this->attributesToXmlWriter($xw, $xmlname, $xmlns);
        $this->elementsToXmlWriter($xw, $xmlname, $xmlns);
        if ($mode & \Adaptor_XML::ENDELEMENT) {
            $xw->endElement();
        }
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
        $props = $this->getProcessStep();
        if ($props !== NULL) {
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
            case "processStep":
                $ProcessStep = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ProcessStep");
                $this->setProcessStep($ProcessStep->fromXmlReader($xr));
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
        if (isset($props["processStep"])) {
            if (is_array($props["processStep"])) {
                foreach ($props["processStep"] as $k => $v) {
                    $ProcessStep = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ProcessStep");
                    $ProcessStep->fromJSON($v);
                    $this->setProcessStep($ProcessStep);
                }
            }
        } elseif (array_keys($props) == array_keys(array_keys($props))) {
            foreach ($props as $v) {
                $ProcessStep = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ProcessStep");
                $ProcessStep->fromJSON($v);
                $this->setProcessStep($ProcessStep);
            }
        }
    }

    /**
     * Чтение данных массива
     * в объект
     * @param Array $row
     *
     */
    public function fromArray($row) {
        if (isset($row["processStep"])) {
            if (is_array($row["processStep"])) {
                foreach ($row["processStep"] as $k => $v) {
                    $ProcessStep = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ProcessStep");
                    $ProcessStep->fromArray($v);
                    $this->setProcessStep($ProcessStep);
                }
            }
        } elseif (array_keys($row) == array_keys(array_keys($row))) {
            foreach ($row as $v) {
                $ProcessStep = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ProcessStep");
                $ProcessStep->fromArray($v);
                $this->setProcessStep($ProcessStep);
            }
        }
    }

}
