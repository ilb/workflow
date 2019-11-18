<?php

namespace ru\ilb\workflow\view;

class ActivityInstances extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "urn:ru:ilb:workflow:view";
    const ROOT = "activityInstances";
    const PREF = NULL;

    /**
     * @maxOccurs unbounded Activity instance.
     * @var ru\ilb\workflow\view\ActivityInstance[]
     */
    protected $ActivityInstance = [];

    public function __construct() {
        parent::__construct();
        $this->_properties["activityInstance"] = array(
            "prop" => "ActivityInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->ActivityInstance
        );
    }

    /**
     * @param ru\ilb\workflow\view\ActivityInstance $val
     */
    public function setActivityInstance(\ru\ilb\workflow\view\ActivityInstance $val) {
        $this->ActivityInstance[] = $val;
        $this->_properties["activityInstance"]["text"][] = $val;
        return $this;
    }

    /**
     * @param ru\ilb\workflow\view\ActivityInstance[]
     */
    public function setActivityInstanceArray(array $vals) {
        $this->ActivityInstance = $vals;
        $this->_properties["activityInstance"]["text"] = $vals;
    }

    /**
     * @return ru\ilb\workflow\view\ActivityInstance | []
     */
    public function getActivityInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->ActivityInstance[$index]) ? $this->ActivityInstance[$index] : null;
        } else {
            $res = $this->ActivityInstance;
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
        $props = $this->getActivityInstance();
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
            case "activityInstance":
                $ActivityInstance = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityInstance");
                $this->setActivityInstance($ActivityInstance->fromXmlReader($xr));
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
        if (isset($props["activityInstance"])) {
            if (is_array($props["activityInstance"])) {
                foreach ($props["activityInstance"] as $k => $v) {
                    $ActivityInstance = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityInstance");
                    $ActivityInstance->fromJSON($v);
                    $this->setActivityInstance($ActivityInstance);
                }
            }
        } elseif (array_keys($props) == array_keys(array_keys($props))) {
            foreach ($props as $v) {
                $ActivityInstance = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityInstance");
                $ActivityInstance->fromJSON($v);
                $this->setActivityInstance($ActivityInstance);
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
        if (isset($row["activityInstance"])) {
            if (is_array($row["activityInstance"])) {
                foreach ($row["activityInstance"] as $k => $v) {
                    $ActivityInstance = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityInstance");
                    $ActivityInstance->fromArray($v);
                    $this->setActivityInstance($ActivityInstance);
                }
            }
        } elseif (array_keys($row) == array_keys(array_keys($row))) {
            foreach ($row as $v) {
                $ActivityInstance = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityInstance");
                $ActivityInstance->fromArray($v);
                $this->setActivityInstance($ActivityInstance);
            }
        }
    }

}
