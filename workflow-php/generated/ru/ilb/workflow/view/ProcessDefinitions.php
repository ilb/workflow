<?php

namespace ru\ilb\workflow\view;

class ProcessDefinitions extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "urn:ru:ilb:workflow:view";
    const ROOT = "processDefinitions";
    const PREF = NULL;

    /**
     * @maxOccurs unbounded Process definition.
     * @var ru\ilb\workflow\view\ProcessDefinition[]
     */
    protected $ProcessDefinition = [];

    public function __construct() {
        parent::__construct();
        $this->_properties["processDefinition"] = array(
            "prop" => "ProcessDefinition",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->ProcessDefinition
        );
    }

    /**
     * @param ru\ilb\workflow\view\ProcessDefinition $val
     */
    public function setProcessDefinition(\ru\ilb\workflow\view\ProcessDefinition $val) {
        $this->ProcessDefinition[] = $val;
        $this->_properties["processDefinition"]["text"][] = $val;
        return $this;
    }

    /**
     * @param ru\ilb\workflow\view\ProcessDefinition[]
     */
    public function setProcessDefinitionArray(array $vals) {
        $this->ProcessDefinition = $vals;
        $this->_properties["processDefinition"]["text"] = $vals;
    }

    /**
     * @return ru\ilb\workflow\view\ProcessDefinition | []
     */
    public function getProcessDefinition($index = null) {
        if ($index !== null) {
            $res = isset($this->ProcessDefinition[$index]) ? $this->ProcessDefinition[$index] : null;
        } else {
            $res = $this->ProcessDefinition;
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
        $props = $this->getProcessDefinition();
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
            case "processDefinition":
                $ProcessDefinition = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ProcessDefinition");
                $this->setProcessDefinition($ProcessDefinition->fromXmlReader($xr));
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
        if (isset($props["processDefinition"])) {
            if (is_array($props["processDefinition"])) {
                foreach ($props["processDefinition"] as $k => $v) {
                    $ProcessDefinition = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ProcessDefinition");
                    $ProcessDefinition->fromJSON($v);
                    $this->setProcessDefinition($ProcessDefinition);
                }
            }
        } elseif (array_keys($props) == array_keys(array_keys($props))) {
            foreach ($props as $v) {
                $ProcessDefinition = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ProcessDefinition");
                $ProcessDefinition->fromJSON($v);
                $this->setProcessDefinition($ProcessDefinition);
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
        if (isset($row["processDefinition"])) {
            if (is_array($row["processDefinition"])) {
                foreach ($row["processDefinition"] as $k => $v) {
                    $ProcessDefinition = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ProcessDefinition");
                    $ProcessDefinition->fromArray($v);
                    $this->setProcessDefinition($ProcessDefinition);
                }
            }
        } elseif (array_keys($row) == array_keys(array_keys($row))) {
            foreach ($row as $v) {
                $ProcessDefinition = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ProcessDefinition");
                $ProcessDefinition->fromArray($v);
                $this->setProcessDefinition($ProcessDefinition);
            }
        }
    }

}
