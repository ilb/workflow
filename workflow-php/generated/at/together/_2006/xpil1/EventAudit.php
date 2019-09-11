<?php

namespace at\together\_2006\xpil1;

class EventAudit extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "http://www.together.at/2006/XPIL1.0";
    const ROOT = "EventAudit";
    const PREF = NULL;

    /**
     * @maxOccurs 1
     * @var at\together\_2006\xpil1\InstanceExtendedAttributes
     */
    protected $InstanceExtendedAttributes = null;

    /**
     * @maxOccurs 1
     * @var \DateTime
     */
    protected $Created = null;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $Type = null;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $WorkflowProcessFactoryId = null;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $WorkflowProcessFactoryVersion = null;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $WorkflowProcessInstanceId = null;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $WorkflowProcessInstanceName = null;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $ActivityInstanceId = null;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $ActivityInstanceName = null;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $PackageId = null;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $ProcessDefinitionId = null;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $ActivityDefinitionId = null;

    public function __construct() {
        parent::__construct();

        $this->_properties["InstanceExtendedAttributes"] = array(
            "prop" => "InstanceExtendedAttributes",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->InstanceExtendedAttributes
        );
        $this->_properties["Created"] = array(
            "prop" => "Created",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Created
        );
        $this->_properties["Type"] = array(
            "prop" => "Type",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Type
        );
        $this->_properties["WorkflowProcessFactoryId"] = array(
            "prop" => "WorkflowProcessFactoryId",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->WorkflowProcessFactoryId
        );
        $this->_properties["WorkflowProcessFactoryVersion"] = array(
            "prop" => "WorkflowProcessFactoryVersion",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->WorkflowProcessFactoryVersion
        );
        $this->_properties["WorkflowProcessInstanceId"] = array(
            "prop" => "WorkflowProcessInstanceId",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->WorkflowProcessInstanceId
        );
        $this->_properties["WorkflowProcessInstanceName"] = array(
            "prop" => "WorkflowProcessInstanceName",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->WorkflowProcessInstanceName
        );
        $this->_properties["ActivityInstanceId"] = array(
            "prop" => "ActivityInstanceId",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->ActivityInstanceId
        );
        $this->_properties["ActivityInstanceName"] = array(
            "prop" => "ActivityInstanceName",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->ActivityInstanceName
        );
        $this->_properties["PackageId"] = array(
            "prop" => "PackageId",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->PackageId
        );
        $this->_properties["ProcessDefinitionId"] = array(
            "prop" => "ProcessDefinitionId",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->ProcessDefinitionId
        );
        $this->_properties["ActivityDefinitionId"] = array(
            "prop" => "ActivityDefinitionId",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->ActivityDefinitionId
        );
    }

    /**
     * @param at\together\_2006\xpil1\InstanceExtendedAttributes $val
     */
    public function setInstanceExtendedAttributes(\at\together\_2006\xpil1\InstanceExtendedAttributes $val) {
        $this->InstanceExtendedAttributes = $val;
        $this->_properties["InstanceExtendedAttributes"]["text"] = $val;
    }

    /**
     * @param \DateTime $val
     */
    public function setCreated($val) {
        $this->Created = $val;
        $this->_properties["Created"]["text"] = $val;
    }

    /**
     * @param \String $val
     */
    public function setType($val) {
        $this->Type = $val;
        $this->_properties["Type"]["text"] = $val;
    }

    /**
     * @param \String $val
     */
    public function setWorkflowProcessFactoryId($val) {
        $this->WorkflowProcessFactoryId = $val;
        $this->_properties["WorkflowProcessFactoryId"]["text"] = $val;
    }

    /**
     * @param \String $val
     */
    public function setWorkflowProcessFactoryVersion($val) {
        $this->WorkflowProcessFactoryVersion = $val;
        $this->_properties["WorkflowProcessFactoryVersion"]["text"] = $val;
    }

    /**
     * @param \String $val
     */
    public function setWorkflowProcessInstanceId($val) {
        $this->WorkflowProcessInstanceId = $val;
        $this->_properties["WorkflowProcessInstanceId"]["text"] = $val;
    }

    /**
     * @param \String $val
     */
    public function setWorkflowProcessInstanceName($val) {
        $this->WorkflowProcessInstanceName = $val;
        $this->_properties["WorkflowProcessInstanceName"]["text"] = $val;
    }

    /**
     * @param \String $val
     */
    public function setActivityInstanceId($val) {
        $this->ActivityInstanceId = $val;
        $this->_properties["ActivityInstanceId"]["text"] = $val;
    }

    /**
     * @param \String $val
     */
    public function setActivityInstanceName($val) {
        $this->ActivityInstanceName = $val;
        $this->_properties["ActivityInstanceName"]["text"] = $val;
    }

    /**
     * @param \String $val
     */
    public function setPackageId($val) {
        $this->PackageId = $val;
        $this->_properties["PackageId"]["text"] = $val;
    }

    /**
     * @param \String $val
     */
    public function setProcessDefinitionId($val) {
        $this->ProcessDefinitionId = $val;
        $this->_properties["ProcessDefinitionId"]["text"] = $val;
    }

    /**
     * @param \String $val
     */
    public function setActivityDefinitionId($val) {
        $this->ActivityDefinitionId = $val;
        $this->_properties["ActivityDefinitionId"]["text"] = $val;
    }

    /**
     * @return at\together\_2006\xpil1\InstanceExtendedAttributes
     */
    public function getInstanceExtendedAttributes() {
        return $this->InstanceExtendedAttributes;
    }

    /**
     * @return \DateTime
     */
    public function getCreated() {
        return $this->Created;
    }

    /**
     * @return \String
     */
    public function getType() {
        return $this->Type;
    }

    /**
     * @return \String
     */
    public function getWorkflowProcessFactoryId() {
        return $this->WorkflowProcessFactoryId;
    }

    /**
     * @return \String
     */
    public function getWorkflowProcessFactoryVersion() {
        return $this->WorkflowProcessFactoryVersion;
    }

    /**
     * @return \String
     */
    public function getWorkflowProcessInstanceId() {
        return $this->WorkflowProcessInstanceId;
    }

    /**
     * @return \String
     */
    public function getWorkflowProcessInstanceName() {
        return $this->WorkflowProcessInstanceName;
    }

    /**
     * @return \String
     */
    public function getActivityInstanceId() {
        return $this->ActivityInstanceId;
    }

    /**
     * @return \String
     */
    public function getActivityInstanceName() {
        return $this->ActivityInstanceName;
    }

    /**
     * @return \String
     */
    public function getPackageId() {
        return $this->PackageId;
    }

    /**
     * @return \String
     */
    public function getProcessDefinitionId() {
        return $this->ProcessDefinitionId;
    }

    /**
     * @return \String
     */
    public function getActivityDefinitionId() {
        return $this->ActivityDefinitionId;
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
        if ($prop = $this->getCreated())
            $xw->writeAttribute('Created', $prop);
        if ($prop = $this->getType())
            $xw->writeAttribute('Type', $prop);
        if ($prop = $this->getWorkflowProcessFactoryId())
            $xw->writeAttribute('WorkflowProcessFactoryId', $prop);
        if ($prop = $this->getWorkflowProcessFactoryVersion())
            $xw->writeAttribute('WorkflowProcessFactoryVersion', $prop);
        if ($prop = $this->getWorkflowProcessInstanceId())
            $xw->writeAttribute('WorkflowProcessInstanceId', $prop);
        if ($prop = $this->getWorkflowProcessInstanceName())
            $xw->writeAttribute('WorkflowProcessInstanceName', $prop);
        if ($prop = $this->getActivityInstanceId())
            $xw->writeAttribute('ActivityInstanceId', $prop);
        if ($prop = $this->getActivityInstanceName())
            $xw->writeAttribute('ActivityInstanceName', $prop);
        if ($prop = $this->getPackageId())
            $xw->writeAttribute('PackageId', $prop);
        if ($prop = $this->getProcessDefinitionId())
            $xw->writeAttribute('ProcessDefinitionId', $prop);
        if ($prop = $this->getActivityDefinitionId())
            $xw->writeAttribute('ActivityDefinitionId', $prop);
    }

    /**
     * Вывод элементов в \XMLWriter
     * @param \XMLWriter $xw
     * @param string $xmlname Имя корневого узла
     * @param string $xmlns Пространство имен
     */
    protected function elementsToXmlWriter(\XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS) {
        parent::elementsToXmlWriter($xw, $xmlname, $xmlns);
        if (($prop = $this->getInstanceExtendedAttributes()) !== NULL) {
            $prop->toXmlWriter($xw);
        }
    }

    /**
     * Чтение атрибутов из \XMLReader
     * @param \XMLReader $xr
     */
    public function attributesFromXmlReader(\XMLReader &$xr) {
        if ($attr = $xr->getAttribute('Created')) {
            $this->_attributes['Created']['prop'] = 'Created';
            $this->setCreated($attr);
        }
        if ($attr = $xr->getAttribute('Type')) {
            $this->_attributes['Type']['prop'] = 'Type';
            $this->setType($attr);
        }
        if ($attr = $xr->getAttribute('WorkflowProcessFactoryId')) {
            $this->_attributes['WorkflowProcessFactoryId']['prop'] = 'WorkflowProcessFactoryId';
            $this->setWorkflowProcessFactoryId($attr);
        }
        if ($attr = $xr->getAttribute('WorkflowProcessFactoryVersion')) {
            $this->_attributes['WorkflowProcessFactoryVersion']['prop'] = 'WorkflowProcessFactoryVersion';
            $this->setWorkflowProcessFactoryVersion($attr);
        }
        if ($attr = $xr->getAttribute('WorkflowProcessInstanceId')) {
            $this->_attributes['WorkflowProcessInstanceId']['prop'] = 'WorkflowProcessInstanceId';
            $this->setWorkflowProcessInstanceId($attr);
        }
        if ($attr = $xr->getAttribute('WorkflowProcessInstanceName')) {
            $this->_attributes['WorkflowProcessInstanceName']['prop'] = 'WorkflowProcessInstanceName';
            $this->setWorkflowProcessInstanceName($attr);
        }
        if ($attr = $xr->getAttribute('ActivityInstanceId')) {
            $this->_attributes['ActivityInstanceId']['prop'] = 'ActivityInstanceId';
            $this->setActivityInstanceId($attr);
        }
        if ($attr = $xr->getAttribute('ActivityInstanceName')) {
            $this->_attributes['ActivityInstanceName']['prop'] = 'ActivityInstanceName';
            $this->setActivityInstanceName($attr);
        }
        if ($attr = $xr->getAttribute('PackageId')) {
            $this->_attributes['PackageId']['prop'] = 'PackageId';
            $this->setPackageId($attr);
        }
        if ($attr = $xr->getAttribute('ProcessDefinitionId')) {
            $this->_attributes['ProcessDefinitionId']['prop'] = 'ProcessDefinitionId';
            $this->setProcessDefinitionId($attr);
        }
        if ($attr = $xr->getAttribute('ActivityDefinitionId')) {
            $this->_attributes['ActivityDefinitionId']['prop'] = 'ActivityDefinitionId';
            $this->setActivityDefinitionId($attr);
        }
        parent::attributesFromXmlReader($xr);
    }

    /**
     * Чтение элементов из \XMLReader
     * @param \XMLReader $xr
     */
    public function elementsFromXmlReader(\XMLReader &$xr) {
        switch ($xr->localName) {
            case "InstanceExtendedAttributes":
                $InstanceExtendedAttributes = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\InstanceExtendedAttributes");
                $this->setInstanceExtendedAttributes($InstanceExtendedAttributes->fromXmlReader($xr));
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
        if (isset($props["InstanceExtendedAttributes"])) {
            $InstanceExtendedAttributes = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\InstanceExtendedAttributes");
            $InstanceExtendedAttributes->fromJSON($props["InstanceExtendedAttributes"]);
            $this->setInstanceExtendedAttributes($InstanceExtendedAttributes);
        }
        if (isset($props["Created"])) {
            $this->setCreated($props["Created"]);
        }
        if (isset($props["Type"])) {
            $this->setType($props["Type"]);
        }
        if (isset($props["WorkflowProcessFactoryId"])) {
            $this->setWorkflowProcessFactoryId($props["WorkflowProcessFactoryId"]);
        }
        if (isset($props["WorkflowProcessFactoryVersion"])) {
            $this->setWorkflowProcessFactoryVersion($props["WorkflowProcessFactoryVersion"]);
        }
        if (isset($props["WorkflowProcessInstanceId"])) {
            $this->setWorkflowProcessInstanceId($props["WorkflowProcessInstanceId"]);
        }
        if (isset($props["WorkflowProcessInstanceName"])) {
            $this->setWorkflowProcessInstanceName($props["WorkflowProcessInstanceName"]);
        }
        if (isset($props["ActivityInstanceId"])) {
            $this->setActivityInstanceId($props["ActivityInstanceId"]);
        }
        if (isset($props["ActivityInstanceName"])) {
            $this->setActivityInstanceName($props["ActivityInstanceName"]);
        }
        if (isset($props["PackageId"])) {
            $this->setPackageId($props["PackageId"]);
        }
        if (isset($props["ProcessDefinitionId"])) {
            $this->setProcessDefinitionId($props["ProcessDefinitionId"]);
        }
        if (isset($props["ActivityDefinitionId"])) {
            $this->setActivityDefinitionId($props["ActivityDefinitionId"]);
        }
    }

}
