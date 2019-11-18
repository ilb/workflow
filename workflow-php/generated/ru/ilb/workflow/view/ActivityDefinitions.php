<?php

namespace ru\ilb\workflow\view;

class ActivityDefinitions extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "urn:ru:ilb:workflow:view";
    const ROOT = "activityDefinitions";
    const PREF = NULL;

    /**
     * @maxOccurs unbounded Activity definition.
     * @var ru\ilb\workflow\view\ActivityDefinition[]
     */
    protected $ActivityDefinition = [];

    public function __construct() {
        parent::__construct();
        $this->_properties["activityDefinition"] = array(
            "prop" => "ActivityDefinition",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->ActivityDefinition
        );
    }

    /**
     * @param ru\ilb\workflow\view\ActivityDefinition $val
     */
    public function setActivityDefinition(\ru\ilb\workflow\view\ActivityDefinition $val) {
        $this->ActivityDefinition[] = $val;
        $this->_properties["activityDefinition"]["text"][] = $val;
        return $this;
    }

    /**
     * @param ru\ilb\workflow\view\ActivityDefinition[]
     */
    public function setActivityDefinitionArray(array $vals) {
        $this->ActivityDefinition = $vals;
        $this->_properties["activityDefinition"]["text"] = $vals;
    }

    /**
     * @return ru\ilb\workflow\view\ActivityDefinition | []
     */
    public function getActivityDefinition($index = null) {
        if ($index !== null) {
            $res = isset($this->ActivityDefinition[$index]) ? $this->ActivityDefinition[$index] : null;
        } else {
            $res = $this->ActivityDefinition;
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
        $props = $this->getActivityDefinition();
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
            case "activityDefinition":
                $ActivityDefinition = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityDefinition");
                $this->setActivityDefinition($ActivityDefinition->fromXmlReader($xr));
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
        if (isset($props["activityDefinition"])) {
            if (is_array($props["activityDefinition"])) {
                foreach ($props["activityDefinition"] as $k => $v) {
                    $ActivityDefinition = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityDefinition");
                    $ActivityDefinition->fromJSON($v);
                    $this->setActivityDefinition($ActivityDefinition);
                }
            }
        } elseif (array_keys($props) == array_keys(array_keys($props))) {
            foreach ($props as $v) {
                $ActivityDefinition = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityDefinition");
                $ActivityDefinition->fromJSON($v);
                $this->setActivityDefinition($ActivityDefinition);
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
        if (isset($row["activityDefinition"])) {
            if (is_array($row["activityDefinition"])) {
                foreach ($row["activityDefinition"] as $k => $v) {
                    $ActivityDefinition = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityDefinition");
                    $ActivityDefinition->fromArray($v);
                    $this->setActivityDefinition($ActivityDefinition);
                }
            }
        } elseif (array_keys($row) == array_keys(array_keys($row))) {
            foreach ($row as $v) {
                $ActivityDefinition = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityDefinition");
                $ActivityDefinition->fromArray($v);
                $this->setActivityDefinition($ActivityDefinition);
            }
        }
    }

}
