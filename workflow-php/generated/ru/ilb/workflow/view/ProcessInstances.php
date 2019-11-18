<?php

namespace ru\ilb\workflow\view;

class ProcessInstances extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "urn:ru:ilb:workflow:view";
    const ROOT = "processInstances";
    const PREF = NULL;

    /**
     * @maxOccurs unbounded Process instance.
     * @var ru\ilb\workflow\view\ProcessInstance[]
     */
    protected $ProcessInstance = [];

    public function __construct() {
        parent::__construct();
        $this->_properties["processInstance"] = array(
            "prop" => "ProcessInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->ProcessInstance
        );
    }

    /**
     * @param ru\ilb\workflow\view\ProcessInstance $val
     */
    public function setProcessInstance(\ru\ilb\workflow\view\ProcessInstance $val) {
        $this->ProcessInstance[] = $val;
        $this->_properties["processInstance"]["text"][] = $val;
        return $this;
    }

    /**
     * @param ru\ilb\workflow\view\ProcessInstance[]
     */
    public function setProcessInstanceArray(array $vals) {
        $this->ProcessInstance = $vals;
        $this->_properties["processInstance"]["text"] = $vals;
    }

    /**
     * @return ru\ilb\workflow\view\ProcessInstance | []
     */
    public function getProcessInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->ProcessInstance[$index]) ? $this->ProcessInstance[$index] : null;
        } else {
            $res = $this->ProcessInstance;
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
        $props = $this->getProcessInstance();
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
            case "processInstance":
                $ProcessInstance = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ProcessInstance");
                $this->setProcessInstance($ProcessInstance->fromXmlReader($xr));
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
        if (isset($props["processInstance"])) {
            if (is_array($props["processInstance"])) {
                foreach ($props["processInstance"] as $k => $v) {
                    $ProcessInstance = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ProcessInstance");
                    $ProcessInstance->fromJSON($v);
                    $this->setProcessInstance($ProcessInstance);
                }
            }
        } elseif (array_keys($props) == array_keys(array_keys($props))) {
            foreach ($props as $v) {
                $ProcessInstance = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ProcessInstance");
                $ProcessInstance->fromJSON($v);
                $this->setProcessInstance($ProcessInstance);
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
        if (isset($row["processInstance"])) {
            if (is_array($row["processInstance"])) {
                foreach ($row["processInstance"] as $k => $v) {
                    $ProcessInstance = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ProcessInstance");
                    $ProcessInstance->fromArray($v);
                    $this->setProcessInstance($ProcessInstance);
                }
            }
        } elseif (array_keys($row) == array_keys(array_keys($row))) {
            foreach ($row as $v) {
                $ProcessInstance = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ProcessInstance");
                $ProcessInstance->fromArray($v);
                $this->setProcessInstance($ProcessInstance);
            }
        }
    }

}
