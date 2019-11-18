<?php

namespace ru\ilb\workflow\view;

/**
 * Activity form data
 * .
 */
class ActivityForm extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "urn:ru:ilb:workflow:view";
    const ROOT = "activityForm";
    const PREF = NULL;

    /**
     * @maxOccurs 1 Process instance.
     * @var ru\ilb\workflow\view\ProcessInstance
     */
    protected $ProcessInstance = null;

    /**
     * @maxOccurs 1 Activity instance.
     * @var ru\ilb\workflow\view\ActivityInstance
     */
    protected $ActivityInstance = null;

    /**
     * @maxOccurs unbounded .
     * @var ru\ilb\workflow\view\ActivityAction[]
     */
    protected $ActivityAction = [];

    /**
     * @maxOccurs 1 Activity dossier.
     * @var ru\ilb\workflow\view\ActivityDossier
     */
    protected $ActivityDossier = null;

    /**
     * @maxOccurs unbounded Process step.
     * @var ru\ilb\workflow\view\ProcessStep[]
     */
    protected $ProcessStep = [];

    public function __construct() {
        parent::__construct();
        $this->_properties["processInstance"] = array(
            "prop" => "ProcessInstance",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->ProcessInstance
        );
        $this->_properties["activityInstance"] = array(
            "prop" => "ActivityInstance",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->ActivityInstance
        );
        $this->_properties["activityAction"] = array(
            "prop" => "ActivityAction",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->ActivityAction
        );
        $this->_properties["activityDossier"] = array(
            "prop" => "ActivityDossier",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->ActivityDossier
        );
        $this->_properties["processStep"] = array(
            "prop" => "ProcessStep",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->ProcessStep
        );
    }

    /**
     * @param ru\ilb\workflow\view\ProcessInstance $val
     */
    public function setProcessInstance(\ru\ilb\workflow\view\ProcessInstance $val) {
        $this->ProcessInstance = $val;
        $this->_properties["processInstance"]["text"] = $val;
        return $this;
    }

    /**
     * @param ru\ilb\workflow\view\ActivityInstance $val
     */
    public function setActivityInstance(\ru\ilb\workflow\view\ActivityInstance $val) {
        $this->ActivityInstance = $val;
        $this->_properties["activityInstance"]["text"] = $val;
        return $this;
    }

    /**
     * @param ru\ilb\workflow\view\ActivityAction $val
     */
    public function setActivityAction(\ru\ilb\workflow\view\ActivityAction $val) {
        $this->ActivityAction[] = $val;
        $this->_properties["activityAction"]["text"][] = $val;
        return $this;
    }

    /**
     * @param ru\ilb\workflow\view\ActivityAction[]
     */
    public function setActivityActionArray(array $vals) {
        $this->ActivityAction = $vals;
        $this->_properties["activityAction"]["text"] = $vals;
    }

    /**
     * @param ru\ilb\workflow\view\ActivityDossier $val
     */
    public function setActivityDossier(\ru\ilb\workflow\view\ActivityDossier $val) {
        $this->ActivityDossier = $val;
        $this->_properties["activityDossier"]["text"] = $val;
        return $this;
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
     * @return ru\ilb\workflow\view\ProcessInstance
     */
    public function getProcessInstance() {
        return $this->ProcessInstance;
    }

    /**
     * @return ru\ilb\workflow\view\ActivityInstance
     */
    public function getActivityInstance() {
        return $this->ActivityInstance;
    }

    /**
     * @return ru\ilb\workflow\view\ActivityAction | []
     */
    public function getActivityAction($index = null) {
        if ($index !== null) {
            $res = isset($this->ActivityAction[$index]) ? $this->ActivityAction[$index] : null;
        } else {
            $res = $this->ActivityAction;
        }
        return $res;
    }

    /**
     * @return ru\ilb\workflow\view\ActivityDossier
     */
    public function getActivityDossier() {
        return $this->ActivityDossier;
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
        $prop = $this->getProcessInstance();
        if ($prop !== NULL) {
            $prop->toXmlWriter($xw);
        }
        $prop = $this->getActivityInstance();
        if ($prop !== NULL) {
            $prop->toXmlWriter($xw);
        }
        $props = $this->getActivityAction();
        if ($props !== NULL) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        $prop = $this->getActivityDossier();
        if ($prop !== NULL) {
            $prop->toXmlWriter($xw);
        }
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
            case "processInstance":
                $ProcessInstance = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ProcessInstance");
                $this->setProcessInstance($ProcessInstance->fromXmlReader($xr));
                break;
            case "activityInstance":
                $ActivityInstance = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityInstance");
                $this->setActivityInstance($ActivityInstance->fromXmlReader($xr));
                break;
            case "activityAction":
                $ActivityAction = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityAction");
                $this->setActivityAction($ActivityAction->fromXmlReader($xr));
                break;
            case "activityDossier":
                $ActivityDossier = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityDossier");
                $this->setActivityDossier($ActivityDossier->fromXmlReader($xr));
                break;
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
        if (isset($props["processInstance"])) {
            $ProcessInstance = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ProcessInstance");
            $ProcessInstance->fromJSON($props["processInstance"]);
            $this->setProcessInstance($ProcessInstance);
        }
        if (isset($props["activityInstance"])) {
            $ActivityInstance = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityInstance");
            $ActivityInstance->fromJSON($props["activityInstance"]);
            $this->setActivityInstance($ActivityInstance);
        }
        if (isset($props["activityAction"])) {
            if (is_array($props["activityAction"])) {
                foreach ($props["activityAction"] as $k => $v) {
                    $ActivityAction = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityAction");
                    $ActivityAction->fromJSON($v);
                    $this->setActivityAction($ActivityAction);
                }
            }
        }
        if (isset($props["activityDossier"])) {
            $ActivityDossier = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityDossier");
            $ActivityDossier->fromJSON($props["activityDossier"]);
            $this->setActivityDossier($ActivityDossier);
        }
        if (isset($props["processStep"])) {
            if (is_array($props["processStep"])) {
                foreach ($props["processStep"] as $k => $v) {
                    $ProcessStep = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ProcessStep");
                    $ProcessStep->fromJSON($v);
                    $this->setProcessStep($ProcessStep);
                }
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
            $ProcessInstance = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ProcessInstance");
            $ProcessInstance->fromArray($row["processInstance"]);
            $this->setProcessInstance($ProcessInstance);
        }
        if (isset($row["activityInstance"])) {
            $ActivityInstance = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityInstance");
            $ActivityInstance->fromArray($row["activityInstance"]);
            $this->setActivityInstance($ActivityInstance);
        }
        if (isset($row["activityAction"])) {
            if (is_array($row["activityAction"])) {
                foreach ($row["activityAction"] as $k => $v) {
                    $ActivityAction = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityAction");
                    $ActivityAction->fromArray($v);
                    $this->setActivityAction($ActivityAction);
                }
            }
        }
        if (isset($row["activityDossier"])) {
            $ActivityDossier = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ActivityDossier");
            $ActivityDossier->fromArray($row["activityDossier"]);
            $this->setActivityDossier($ActivityDossier);
        }
        if (isset($row["processStep"])) {
            if (is_array($row["processStep"])) {
                foreach ($row["processStep"] as $k => $v) {
                    $ProcessStep = \Adaptor_Bindings::create("\\ru\\ilb\\workflow\\view\\ProcessStep");
                    $ProcessStep->fromArray($v);
                    $this->setProcessStep($ProcessStep);
                }
            }
        }
    }

}
