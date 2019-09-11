<?php

namespace at\together\_2006\xpil1;

class PackageInstance extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "http://www.together.at/2006/XPIL1.0";
    const ROOT = "PackageInstance";
    const PREF = NULL;

    /**
     * @maxOccurs 1
     * @var at\together\_2006\xpil1\WorkflowProcessFactoryInstances
     */
    protected $WorkflowProcessFactoryInstances = null;

    /**
     * @maxOccurs 1
     * @var at\together\_2006\xpil1\InstanceExtendedAttributes
     */
    protected $InstanceExtendedAttributes = null;

    /**
     * @maxOccurs 1
     * @var org\wfmc\_2002\xpdl1\Package
     */
    protected $Package = null;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $Id = null;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $Version = null;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $InternalVersion = null;

    /**
     * @maxOccurs 1
     * @var \DateTime
     */
    protected $Created = null;

    public function __construct() {
        parent::__construct();

        $this->_properties["WorkflowProcessFactoryInstances"] = array(
            "prop" => "WorkflowProcessFactoryInstances",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->WorkflowProcessFactoryInstances
        );
        $this->_properties["InstanceExtendedAttributes"] = array(
            "prop" => "InstanceExtendedAttributes",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->InstanceExtendedAttributes
        );
        $this->_properties["Package"] = array(
            "prop" => "Package",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Package
        );
        $this->_properties["Id"] = array(
            "prop" => "Id",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Id
        );
        $this->_properties["Version"] = array(
            "prop" => "Version",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Version
        );
        $this->_properties["InternalVersion"] = array(
            "prop" => "InternalVersion",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->InternalVersion
        );
        $this->_properties["Created"] = array(
            "prop" => "Created",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Created
        );
    }

    /**
     * @param at\together\_2006\xpil1\WorkflowProcessFactoryInstances $val
     */
    public function setWorkflowProcessFactoryInstances(\at\together\_2006\xpil1\WorkflowProcessFactoryInstances $val) {
        $this->WorkflowProcessFactoryInstances = $val;
        $this->_properties["WorkflowProcessFactoryInstances"]["text"] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\InstanceExtendedAttributes $val
     */
    public function setInstanceExtendedAttributes(\at\together\_2006\xpil1\InstanceExtendedAttributes $val) {
        $this->InstanceExtendedAttributes = $val;
        $this->_properties["InstanceExtendedAttributes"]["text"] = $val;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\Package $val
     */
    public function setPackage(\org\wfmc\_2002\xpdl1\Package $val) {
        $this->Package = $val;
        $this->_properties["Package"]["text"] = $val;
    }

    /**
     * @param \String $val
     */
    public function setId($val) {
        $this->Id = $val;
        $this->_properties["Id"]["text"] = $val;
    }

    /**
     * @param \String $val
     */
    public function setVersion($val) {
        $this->Version = $val;
        $this->_properties["Version"]["text"] = $val;
    }

    /**
     * @param \String $val
     */
    public function setInternalVersion($val) {
        $this->InternalVersion = $val;
        $this->_properties["InternalVersion"]["text"] = $val;
    }

    /**
     * @param \DateTime $val
     */
    public function setCreated($val) {
        $this->Created = $val;
        $this->_properties["Created"]["text"] = $val;
    }

    /**
     * @return at\together\_2006\xpil1\WorkflowProcessFactoryInstances
     */
    public function getWorkflowProcessFactoryInstances() {
        return $this->WorkflowProcessFactoryInstances;
    }

    /**
     * @return at\together\_2006\xpil1\InstanceExtendedAttributes
     */
    public function getInstanceExtendedAttributes() {
        return $this->InstanceExtendedAttributes;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\Package
     */
    public function getPackage() {
        return $this->Package;
    }

    /**
     * @return \String
     */
    public function getId() {
        return $this->Id;
    }

    /**
     * @return \String
     */
    public function getVersion() {
        return $this->Version;
    }

    /**
     * @return \String
     */
    public function getInternalVersion() {
        return $this->InternalVersion;
    }

    /**
     * @return \DateTime
     */
    public function getCreated() {
        return $this->Created;
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
        if ($prop = $this->getId())
            $xw->writeAttribute('Id', $prop);
        if ($prop = $this->getVersion())
            $xw->writeAttribute('Version', $prop);
        if ($prop = $this->getInternalVersion())
            $xw->writeAttribute('InternalVersion', $prop);
        if ($prop = $this->getCreated())
            $xw->writeAttribute('Created', $prop);
    }

    /**
     * Вывод элементов в \XMLWriter
     * @param \XMLWriter $xw
     * @param string $xmlname Имя корневого узла
     * @param string $xmlns Пространство имен
     */
    protected function elementsToXmlWriter(\XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS) {
        parent::elementsToXmlWriter($xw, $xmlname, $xmlns);
        if (($prop = $this->getWorkflowProcessFactoryInstances()) !== NULL) {
            $prop->toXmlWriter($xw);
        }
        if (($prop = $this->getInstanceExtendedAttributes()) !== NULL) {
            $prop->toXmlWriter($xw);
        }
        if (($prop = $this->getPackage()) !== NULL) {
            $prop->toXmlWriter($xw);
        }
    }

    /**
     * Чтение атрибутов из \XMLReader
     * @param \XMLReader $xr
     */
    public function attributesFromXmlReader(\XMLReader &$xr) {
        if ($attr = $xr->getAttribute('Id')) {
            $this->_attributes['Id']['prop'] = 'Id';
            $this->setId($attr);
        }
        if ($attr = $xr->getAttribute('Version')) {
            $this->_attributes['Version']['prop'] = 'Version';
            $this->setVersion($attr);
        }
        if ($attr = $xr->getAttribute('InternalVersion')) {
            $this->_attributes['InternalVersion']['prop'] = 'InternalVersion';
            $this->setInternalVersion($attr);
        }
        if ($attr = $xr->getAttribute('Created')) {
            $this->_attributes['Created']['prop'] = 'Created';
            $this->setCreated($attr);
        }
        parent::attributesFromXmlReader($xr);
    }

    /**
     * Чтение элементов из \XMLReader
     * @param \XMLReader $xr
     */
    public function elementsFromXmlReader(\XMLReader &$xr) {
        switch ($xr->localName) {
            case "WorkflowProcessFactoryInstances":
                $WorkflowProcessFactoryInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\WorkflowProcessFactoryInstances");
                $this->setWorkflowProcessFactoryInstances($WorkflowProcessFactoryInstances->fromXmlReader($xr));
                break;
            case "InstanceExtendedAttributes":
                $InstanceExtendedAttributes = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\InstanceExtendedAttributes");
                $this->setInstanceExtendedAttributes($InstanceExtendedAttributes->fromXmlReader($xr));
                break;
            case "Package":
                $Package = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Package");
                $this->setPackage($Package->fromXmlReader($xr));
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
        if (isset($props["WorkflowProcessFactoryInstances"])) {
            $WorkflowProcessFactoryInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\WorkflowProcessFactoryInstances");
            $WorkflowProcessFactoryInstances->fromJSON($props["WorkflowProcessFactoryInstances"]);
            $this->setWorkflowProcessFactoryInstances($WorkflowProcessFactoryInstances);
        }
        if (isset($props["InstanceExtendedAttributes"])) {
            $InstanceExtendedAttributes = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\InstanceExtendedAttributes");
            $InstanceExtendedAttributes->fromJSON($props["InstanceExtendedAttributes"]);
            $this->setInstanceExtendedAttributes($InstanceExtendedAttributes);
        }
        if (isset($props["Package"])) {
            $Package = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Package");
            $Package->fromJSON($props["Package"]);
            $this->setPackage($Package);
        }
        if (isset($props["Id"])) {
            $this->setId($props["Id"]);
        }
        if (isset($props["Version"])) {
            $this->setVersion($props["Version"]);
        }
        if (isset($props["InternalVersion"])) {
            $this->setInternalVersion($props["InternalVersion"]);
        }
        if (isset($props["Created"])) {
            $this->setCreated($props["Created"]);
        }
    }

}
