<?php

namespace at\together\_2006\xpil1;

class DataInstances extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "http://www.together.at/2006/XPIL1.0";
    const ROOT = "DataInstances";
    const PREF = NULL;

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\DataInstance[]
     */
    protected $StringDataInstance = [];

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\DataInstance[]
     */
    protected $StringArrayDataInstance = [];

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\DataInstance[]
     */
    protected $BooleanDataInstance = [];

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\DataInstance[]
     */
    protected $BooleanArrayDataInstance = [];

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\DataInstance[]
     */
    protected $DateDataInstance = [];

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\DataInstance[]
     */
    protected $DateArrayDataInstance = [];

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\DataInstance[]
     */
    protected $DateTimeDataInstance = [];

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\DataInstance[]
     */
    protected $DateTimeArrayDataInstance = [];

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\DataInstance[]
     */
    protected $TimeDataInstance = [];

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\DataInstance[]
     */
    protected $TimeArrayDataInstance = [];

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\DataInstance[]
     */
    protected $LongDataInstance = [];

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\DataInstance[]
     */
    protected $LongArrayDataInstance = [];

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\DataInstance[]
     */
    protected $DoubleDataInstance = [];

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\DataInstance[]
     */
    protected $DoubleArrayDataInstance = [];

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\DataInstance[]
     */
    protected $ByteArrayDataInstance = [];

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\DataInstance[]
     */
    protected $AnyDataInstance = [];

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\DataInstance[]
     */
    protected $ComplexDataInstance = [];

    /**
     * @maxOccurs unbounded
     * @var at\together\_2006\xpil1\DataInstance[]
     */
    protected $SchemaDataInstance = [];

    /**
     * @maxOccurs 1
     * @var at\together\_2006\xpil1\InstanceExtendedAttributes
     */
    protected $InstanceExtendedAttributes = null;

    public function __construct() {
        parent::__construct();

        $this->_properties["StringDataInstance"] = array(
            "prop" => "StringDataInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->StringDataInstance
        );
        $this->_properties["StringArrayDataInstance"] = array(
            "prop" => "StringArrayDataInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->StringArrayDataInstance
        );
        $this->_properties["BooleanDataInstance"] = array(
            "prop" => "BooleanDataInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->BooleanDataInstance
        );
        $this->_properties["BooleanArrayDataInstance"] = array(
            "prop" => "BooleanArrayDataInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->BooleanArrayDataInstance
        );
        $this->_properties["DateDataInstance"] = array(
            "prop" => "DateDataInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->DateDataInstance
        );
        $this->_properties["DateArrayDataInstance"] = array(
            "prop" => "DateArrayDataInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->DateArrayDataInstance
        );
        $this->_properties["DateTimeDataInstance"] = array(
            "prop" => "DateTimeDataInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->DateTimeDataInstance
        );
        $this->_properties["DateTimeArrayDataInstance"] = array(
            "prop" => "DateTimeArrayDataInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->DateTimeArrayDataInstance
        );
        $this->_properties["TimeDataInstance"] = array(
            "prop" => "TimeDataInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->TimeDataInstance
        );
        $this->_properties["TimeArrayDataInstance"] = array(
            "prop" => "TimeArrayDataInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->TimeArrayDataInstance
        );
        $this->_properties["LongDataInstance"] = array(
            "prop" => "LongDataInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->LongDataInstance
        );
        $this->_properties["LongArrayDataInstance"] = array(
            "prop" => "LongArrayDataInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->LongArrayDataInstance
        );
        $this->_properties["DoubleDataInstance"] = array(
            "prop" => "DoubleDataInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->DoubleDataInstance
        );
        $this->_properties["DoubleArrayDataInstance"] = array(
            "prop" => "DoubleArrayDataInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->DoubleArrayDataInstance
        );
        $this->_properties["ByteArrayDataInstance"] = array(
            "prop" => "ByteArrayDataInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->ByteArrayDataInstance
        );
        $this->_properties["AnyDataInstance"] = array(
            "prop" => "AnyDataInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->AnyDataInstance
        );
        $this->_properties["ComplexDataInstance"] = array(
            "prop" => "ComplexDataInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->ComplexDataInstance
        );
        $this->_properties["SchemaDataInstance"] = array(
            "prop" => "SchemaDataInstance",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->SchemaDataInstance
        );
        $this->_properties["InstanceExtendedAttributes"] = array(
            "prop" => "InstanceExtendedAttributes",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->InstanceExtendedAttributes
        );
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance $val
     */
    public function setStringDataInstance(\at\together\_2006\xpil1\DataInstance $val) {
        $this->StringDataInstance[] = $val;
        $this->_properties["StringDataInstance"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance[]
     */
    public function setStringDataInstanceArray(array $vals) {
        $this->StringDataInstance = $vals;
        $this->_properties["StringDataInstance"]["text"] = $vals;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance $val
     */
    public function setStringArrayDataInstance(\at\together\_2006\xpil1\DataInstance $val) {
        $this->StringArrayDataInstance[] = $val;
        $this->_properties["StringArrayDataInstance"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance[]
     */
    public function setStringArrayDataInstanceArray(array $vals) {
        $this->StringArrayDataInstance = $vals;
        $this->_properties["StringArrayDataInstance"]["text"] = $vals;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance $val
     */
    public function setBooleanDataInstance(\at\together\_2006\xpil1\DataInstance $val) {
        $this->BooleanDataInstance[] = $val;
        $this->_properties["BooleanDataInstance"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance[]
     */
    public function setBooleanDataInstanceArray(array $vals) {
        $this->BooleanDataInstance = $vals;
        $this->_properties["BooleanDataInstance"]["text"] = $vals;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance $val
     */
    public function setBooleanArrayDataInstance(\at\together\_2006\xpil1\DataInstance $val) {
        $this->BooleanArrayDataInstance[] = $val;
        $this->_properties["BooleanArrayDataInstance"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance[]
     */
    public function setBooleanArrayDataInstanceArray(array $vals) {
        $this->BooleanArrayDataInstance = $vals;
        $this->_properties["BooleanArrayDataInstance"]["text"] = $vals;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance $val
     */
    public function setDateDataInstance(\at\together\_2006\xpil1\DataInstance $val) {
        $this->DateDataInstance[] = $val;
        $this->_properties["DateDataInstance"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance[]
     */
    public function setDateDataInstanceArray(array $vals) {
        $this->DateDataInstance = $vals;
        $this->_properties["DateDataInstance"]["text"] = $vals;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance $val
     */
    public function setDateArrayDataInstance(\at\together\_2006\xpil1\DataInstance $val) {
        $this->DateArrayDataInstance[] = $val;
        $this->_properties["DateArrayDataInstance"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance[]
     */
    public function setDateArrayDataInstanceArray(array $vals) {
        $this->DateArrayDataInstance = $vals;
        $this->_properties["DateArrayDataInstance"]["text"] = $vals;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance $val
     */
    public function setDateTimeDataInstance(\at\together\_2006\xpil1\DataInstance $val) {
        $this->DateTimeDataInstance[] = $val;
        $this->_properties["DateTimeDataInstance"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance[]
     */
    public function setDateTimeDataInstanceArray(array $vals) {
        $this->DateTimeDataInstance = $vals;
        $this->_properties["DateTimeDataInstance"]["text"] = $vals;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance $val
     */
    public function setDateTimeArrayDataInstance(\at\together\_2006\xpil1\DataInstance $val) {
        $this->DateTimeArrayDataInstance[] = $val;
        $this->_properties["DateTimeArrayDataInstance"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance[]
     */
    public function setDateTimeArrayDataInstanceArray(array $vals) {
        $this->DateTimeArrayDataInstance = $vals;
        $this->_properties["DateTimeArrayDataInstance"]["text"] = $vals;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance $val
     */
    public function setTimeDataInstance(\at\together\_2006\xpil1\DataInstance $val) {
        $this->TimeDataInstance[] = $val;
        $this->_properties["TimeDataInstance"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance[]
     */
    public function setTimeDataInstanceArray(array $vals) {
        $this->TimeDataInstance = $vals;
        $this->_properties["TimeDataInstance"]["text"] = $vals;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance $val
     */
    public function setTimeArrayDataInstance(\at\together\_2006\xpil1\DataInstance $val) {
        $this->TimeArrayDataInstance[] = $val;
        $this->_properties["TimeArrayDataInstance"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance[]
     */
    public function setTimeArrayDataInstanceArray(array $vals) {
        $this->TimeArrayDataInstance = $vals;
        $this->_properties["TimeArrayDataInstance"]["text"] = $vals;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance $val
     */
    public function setLongDataInstance(\at\together\_2006\xpil1\DataInstance $val) {
        $this->LongDataInstance[] = $val;
        $this->_properties["LongDataInstance"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance[]
     */
    public function setLongDataInstanceArray(array $vals) {
        $this->LongDataInstance = $vals;
        $this->_properties["LongDataInstance"]["text"] = $vals;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance $val
     */
    public function setLongArrayDataInstance(\at\together\_2006\xpil1\DataInstance $val) {
        $this->LongArrayDataInstance[] = $val;
        $this->_properties["LongArrayDataInstance"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance[]
     */
    public function setLongArrayDataInstanceArray(array $vals) {
        $this->LongArrayDataInstance = $vals;
        $this->_properties["LongArrayDataInstance"]["text"] = $vals;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance $val
     */
    public function setDoubleDataInstance(\at\together\_2006\xpil1\DataInstance $val) {
        $this->DoubleDataInstance[] = $val;
        $this->_properties["DoubleDataInstance"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance[]
     */
    public function setDoubleDataInstanceArray(array $vals) {
        $this->DoubleDataInstance = $vals;
        $this->_properties["DoubleDataInstance"]["text"] = $vals;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance $val
     */
    public function setDoubleArrayDataInstance(\at\together\_2006\xpil1\DataInstance $val) {
        $this->DoubleArrayDataInstance[] = $val;
        $this->_properties["DoubleArrayDataInstance"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance[]
     */
    public function setDoubleArrayDataInstanceArray(array $vals) {
        $this->DoubleArrayDataInstance = $vals;
        $this->_properties["DoubleArrayDataInstance"]["text"] = $vals;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance $val
     */
    public function setByteArrayDataInstance(\at\together\_2006\xpil1\DataInstance $val) {
        $this->ByteArrayDataInstance[] = $val;
        $this->_properties["ByteArrayDataInstance"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance[]
     */
    public function setByteArrayDataInstanceArray(array $vals) {
        $this->ByteArrayDataInstance = $vals;
        $this->_properties["ByteArrayDataInstance"]["text"] = $vals;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance $val
     */
    public function setAnyDataInstance(\at\together\_2006\xpil1\DataInstance $val) {
        $this->AnyDataInstance[] = $val;
        $this->_properties["AnyDataInstance"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance[]
     */
    public function setAnyDataInstanceArray(array $vals) {
        $this->AnyDataInstance = $vals;
        $this->_properties["AnyDataInstance"]["text"] = $vals;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance $val
     */
    public function setComplexDataInstance(\at\together\_2006\xpil1\DataInstance $val) {
        $this->ComplexDataInstance[] = $val;
        $this->_properties["ComplexDataInstance"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance[]
     */
    public function setComplexDataInstanceArray(array $vals) {
        $this->ComplexDataInstance = $vals;
        $this->_properties["ComplexDataInstance"]["text"] = $vals;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance $val
     */
    public function setSchemaDataInstance(\at\together\_2006\xpil1\DataInstance $val) {
        $this->SchemaDataInstance[] = $val;
        $this->_properties["SchemaDataInstance"]["text"][] = $val;
    }

    /**
     * @param at\together\_2006\xpil1\DataInstance[]
     */
    public function setSchemaDataInstanceArray(array $vals) {
        $this->SchemaDataInstance = $vals;
        $this->_properties["SchemaDataInstance"]["text"] = $vals;
    }

    /**
     * @param at\together\_2006\xpil1\InstanceExtendedAttributes $val
     */
    public function setInstanceExtendedAttributes(\at\together\_2006\xpil1\InstanceExtendedAttributes $val) {
        $this->InstanceExtendedAttributes = $val;
        $this->_properties["InstanceExtendedAttributes"]["text"] = $val;
    }

    /**
     * @return at\together\_2006\xpil1\DataInstance | []
     */
    public function getStringDataInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->StringDataInstance[$index]) ? $this->StringDataInstance[$index] : null;
        } else {
            $res = $this->StringDataInstance;
        }
        return $res;
    }

    /**
     * @return at\together\_2006\xpil1\DataInstance | []
     */
    public function getStringArrayDataInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->StringArrayDataInstance[$index]) ? $this->StringArrayDataInstance[$index] : null;
        } else {
            $res = $this->StringArrayDataInstance;
        }
        return $res;
    }

    /**
     * @return at\together\_2006\xpil1\DataInstance | []
     */
    public function getBooleanDataInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->BooleanDataInstance[$index]) ? $this->BooleanDataInstance[$index] : null;
        } else {
            $res = $this->BooleanDataInstance;
        }
        return $res;
    }

    /**
     * @return at\together\_2006\xpil1\DataInstance | []
     */
    public function getBooleanArrayDataInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->BooleanArrayDataInstance[$index]) ? $this->BooleanArrayDataInstance[$index] : null;
        } else {
            $res = $this->BooleanArrayDataInstance;
        }
        return $res;
    }

    /**
     * @return at\together\_2006\xpil1\DataInstance | []
     */
    public function getDateDataInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->DateDataInstance[$index]) ? $this->DateDataInstance[$index] : null;
        } else {
            $res = $this->DateDataInstance;
        }
        return $res;
    }

    /**
     * @return at\together\_2006\xpil1\DataInstance | []
     */
    public function getDateArrayDataInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->DateArrayDataInstance[$index]) ? $this->DateArrayDataInstance[$index] : null;
        } else {
            $res = $this->DateArrayDataInstance;
        }
        return $res;
    }

    /**
     * @return at\together\_2006\xpil1\DataInstance | []
     */
    public function getDateTimeDataInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->DateTimeDataInstance[$index]) ? $this->DateTimeDataInstance[$index] : null;
        } else {
            $res = $this->DateTimeDataInstance;
        }
        return $res;
    }

    /**
     * @return at\together\_2006\xpil1\DataInstance | []
     */
    public function getDateTimeArrayDataInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->DateTimeArrayDataInstance[$index]) ? $this->DateTimeArrayDataInstance[$index] : null;
        } else {
            $res = $this->DateTimeArrayDataInstance;
        }
        return $res;
    }

    /**
     * @return at\together\_2006\xpil1\DataInstance | []
     */
    public function getTimeDataInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->TimeDataInstance[$index]) ? $this->TimeDataInstance[$index] : null;
        } else {
            $res = $this->TimeDataInstance;
        }
        return $res;
    }

    /**
     * @return at\together\_2006\xpil1\DataInstance | []
     */
    public function getTimeArrayDataInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->TimeArrayDataInstance[$index]) ? $this->TimeArrayDataInstance[$index] : null;
        } else {
            $res = $this->TimeArrayDataInstance;
        }
        return $res;
    }

    /**
     * @return at\together\_2006\xpil1\DataInstance | []
     */
    public function getLongDataInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->LongDataInstance[$index]) ? $this->LongDataInstance[$index] : null;
        } else {
            $res = $this->LongDataInstance;
        }
        return $res;
    }

    /**
     * @return at\together\_2006\xpil1\DataInstance | []
     */
    public function getLongArrayDataInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->LongArrayDataInstance[$index]) ? $this->LongArrayDataInstance[$index] : null;
        } else {
            $res = $this->LongArrayDataInstance;
        }
        return $res;
    }

    /**
     * @return at\together\_2006\xpil1\DataInstance | []
     */
    public function getDoubleDataInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->DoubleDataInstance[$index]) ? $this->DoubleDataInstance[$index] : null;
        } else {
            $res = $this->DoubleDataInstance;
        }
        return $res;
    }

    /**
     * @return at\together\_2006\xpil1\DataInstance | []
     */
    public function getDoubleArrayDataInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->DoubleArrayDataInstance[$index]) ? $this->DoubleArrayDataInstance[$index] : null;
        } else {
            $res = $this->DoubleArrayDataInstance;
        }
        return $res;
    }

    /**
     * @return at\together\_2006\xpil1\DataInstance | []
     */
    public function getByteArrayDataInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->ByteArrayDataInstance[$index]) ? $this->ByteArrayDataInstance[$index] : null;
        } else {
            $res = $this->ByteArrayDataInstance;
        }
        return $res;
    }

    /**
     * @return at\together\_2006\xpil1\DataInstance | []
     */
    public function getAnyDataInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->AnyDataInstance[$index]) ? $this->AnyDataInstance[$index] : null;
        } else {
            $res = $this->AnyDataInstance;
        }
        return $res;
    }

    /**
     * @return at\together\_2006\xpil1\DataInstance | []
     */
    public function getComplexDataInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->ComplexDataInstance[$index]) ? $this->ComplexDataInstance[$index] : null;
        } else {
            $res = $this->ComplexDataInstance;
        }
        return $res;
    }

    /**
     * @return at\together\_2006\xpil1\DataInstance | []
     */
    public function getSchemaDataInstance($index = null) {
        if ($index !== null) {
            $res = isset($this->SchemaDataInstance[$index]) ? $this->SchemaDataInstance[$index] : null;
        } else {
            $res = $this->SchemaDataInstance;
        }
        return $res;
    }

    /**
     * @return at\together\_2006\xpil1\InstanceExtendedAttributes
     */
    public function getInstanceExtendedAttributes() {
        return $this->InstanceExtendedAttributes;
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
        if ($props = $this->getStringDataInstance()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if ($props = $this->getStringArrayDataInstance()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if ($props = $this->getBooleanDataInstance()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if ($props = $this->getBooleanArrayDataInstance()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if ($props = $this->getDateDataInstance()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if ($props = $this->getDateArrayDataInstance()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if ($props = $this->getDateTimeDataInstance()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if ($props = $this->getDateTimeArrayDataInstance()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if ($props = $this->getTimeDataInstance()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if ($props = $this->getTimeArrayDataInstance()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if ($props = $this->getLongDataInstance()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if ($props = $this->getLongArrayDataInstance()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if ($props = $this->getDoubleDataInstance()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if ($props = $this->getDoubleArrayDataInstance()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if ($props = $this->getByteArrayDataInstance()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if ($props = $this->getAnyDataInstance()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if ($props = $this->getComplexDataInstance()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if ($props = $this->getSchemaDataInstance()) {
            foreach ($props as $prop) {
                $prop->toXmlWriter($xw);
            }
        }
        if (($prop = $this->getInstanceExtendedAttributes()) !== NULL) {
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
            case "StringDataInstance":
                $StringDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\StringDataInstance");
                $this->setStringDataInstance($StringDataInstance->fromXmlReader($xr));
                break;
            case "StringArrayDataInstance":
                $StringArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\StringArrayDataInstance");
                $this->setStringArrayDataInstance($StringArrayDataInstance->fromXmlReader($xr));
                break;
            case "BooleanDataInstance":
                $BooleanDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\BooleanDataInstance");
                $this->setBooleanDataInstance($BooleanDataInstance->fromXmlReader($xr));
                break;
            case "BooleanArrayDataInstance":
                $BooleanArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\BooleanArrayDataInstance");
                $this->setBooleanArrayDataInstance($BooleanArrayDataInstance->fromXmlReader($xr));
                break;
            case "DateDataInstance":
                $DateDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DateDataInstance");
                $this->setDateDataInstance($DateDataInstance->fromXmlReader($xr));
                break;
            case "DateArrayDataInstance":
                $DateArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DateArrayDataInstance");
                $this->setDateArrayDataInstance($DateArrayDataInstance->fromXmlReader($xr));
                break;
            case "DateTimeDataInstance":
                $DateTimeDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DateTimeDataInstance");
                $this->setDateTimeDataInstance($DateTimeDataInstance->fromXmlReader($xr));
                break;
            case "DateTimeArrayDataInstance":
                $DateTimeArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DateTimeArrayDataInstance");
                $this->setDateTimeArrayDataInstance($DateTimeArrayDataInstance->fromXmlReader($xr));
                break;
            case "TimeDataInstance":
                $TimeDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\TimeDataInstance");
                $this->setTimeDataInstance($TimeDataInstance->fromXmlReader($xr));
                break;
            case "TimeArrayDataInstance":
                $TimeArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\TimeArrayDataInstance");
                $this->setTimeArrayDataInstance($TimeArrayDataInstance->fromXmlReader($xr));
                break;
            case "LongDataInstance":
                $LongDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\LongDataInstance");
                $this->setLongDataInstance($LongDataInstance->fromXmlReader($xr));
                break;
            case "LongArrayDataInstance":
                $LongArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\LongArrayDataInstance");
                $this->setLongArrayDataInstance($LongArrayDataInstance->fromXmlReader($xr));
                break;
            case "DoubleDataInstance":
                $DoubleDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DoubleDataInstance");
                $this->setDoubleDataInstance($DoubleDataInstance->fromXmlReader($xr));
                break;
            case "DoubleArrayDataInstance":
                $DoubleArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DoubleArrayDataInstance");
                $this->setDoubleArrayDataInstance($DoubleArrayDataInstance->fromXmlReader($xr));
                break;
            case "ByteArrayDataInstance":
                $ByteArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\ByteArrayDataInstance");
                $this->setByteArrayDataInstance($ByteArrayDataInstance->fromXmlReader($xr));
                break;
            case "AnyDataInstance":
                $AnyDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\AnyDataInstance");
                $this->setAnyDataInstance($AnyDataInstance->fromXmlReader($xr));
                break;
            case "ComplexDataInstance":
                $ComplexDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\ComplexDataInstance");
                $this->setComplexDataInstance($ComplexDataInstance->fromXmlReader($xr));
                break;
            case "SchemaDataInstance":
                $SchemaDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\SchemaDataInstance");
                $this->setSchemaDataInstance($SchemaDataInstance->fromXmlReader($xr));
                break;
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
        if (isset($props["StringDataInstance"])) {
            if (is_array($props["StringDataInstance"])) {
                foreach ($props["StringDataInstance"] as $k => $v) {
                    $StringDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\StringDataInstance");
                    $StringDataInstance->fromJSON($v);
                    $this->setStringDataInstance($StringDataInstance);
                }
            }
        }
        if (isset($props["StringArrayDataInstance"])) {
            if (is_array($props["StringArrayDataInstance"])) {
                foreach ($props["StringArrayDataInstance"] as $k => $v) {
                    $StringArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\StringArrayDataInstance");
                    $StringArrayDataInstance->fromJSON($v);
                    $this->setStringArrayDataInstance($StringArrayDataInstance);
                }
            }
        }
        if (isset($props["BooleanDataInstance"])) {
            if (is_array($props["BooleanDataInstance"])) {
                foreach ($props["BooleanDataInstance"] as $k => $v) {
                    $BooleanDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\BooleanDataInstance");
                    $BooleanDataInstance->fromJSON($v);
                    $this->setBooleanDataInstance($BooleanDataInstance);
                }
            }
        }
        if (isset($props["BooleanArrayDataInstance"])) {
            if (is_array($props["BooleanArrayDataInstance"])) {
                foreach ($props["BooleanArrayDataInstance"] as $k => $v) {
                    $BooleanArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\BooleanArrayDataInstance");
                    $BooleanArrayDataInstance->fromJSON($v);
                    $this->setBooleanArrayDataInstance($BooleanArrayDataInstance);
                }
            }
        }
        if (isset($props["DateDataInstance"])) {
            if (is_array($props["DateDataInstance"])) {
                foreach ($props["DateDataInstance"] as $k => $v) {
                    $DateDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DateDataInstance");
                    $DateDataInstance->fromJSON($v);
                    $this->setDateDataInstance($DateDataInstance);
                }
            }
        }
        if (isset($props["DateArrayDataInstance"])) {
            if (is_array($props["DateArrayDataInstance"])) {
                foreach ($props["DateArrayDataInstance"] as $k => $v) {
                    $DateArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DateArrayDataInstance");
                    $DateArrayDataInstance->fromJSON($v);
                    $this->setDateArrayDataInstance($DateArrayDataInstance);
                }
            }
        }
        if (isset($props["DateTimeDataInstance"])) {
            if (is_array($props["DateTimeDataInstance"])) {
                foreach ($props["DateTimeDataInstance"] as $k => $v) {
                    $DateTimeDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DateTimeDataInstance");
                    $DateTimeDataInstance->fromJSON($v);
                    $this->setDateTimeDataInstance($DateTimeDataInstance);
                }
            }
        }
        if (isset($props["DateTimeArrayDataInstance"])) {
            if (is_array($props["DateTimeArrayDataInstance"])) {
                foreach ($props["DateTimeArrayDataInstance"] as $k => $v) {
                    $DateTimeArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DateTimeArrayDataInstance");
                    $DateTimeArrayDataInstance->fromJSON($v);
                    $this->setDateTimeArrayDataInstance($DateTimeArrayDataInstance);
                }
            }
        }
        if (isset($props["TimeDataInstance"])) {
            if (is_array($props["TimeDataInstance"])) {
                foreach ($props["TimeDataInstance"] as $k => $v) {
                    $TimeDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\TimeDataInstance");
                    $TimeDataInstance->fromJSON($v);
                    $this->setTimeDataInstance($TimeDataInstance);
                }
            }
        }
        if (isset($props["TimeArrayDataInstance"])) {
            if (is_array($props["TimeArrayDataInstance"])) {
                foreach ($props["TimeArrayDataInstance"] as $k => $v) {
                    $TimeArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\TimeArrayDataInstance");
                    $TimeArrayDataInstance->fromJSON($v);
                    $this->setTimeArrayDataInstance($TimeArrayDataInstance);
                }
            }
        }
        if (isset($props["LongDataInstance"])) {
            if (is_array($props["LongDataInstance"])) {
                foreach ($props["LongDataInstance"] as $k => $v) {
                    $LongDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\LongDataInstance");
                    $LongDataInstance->fromJSON($v);
                    $this->setLongDataInstance($LongDataInstance);
                }
            }
        }
        if (isset($props["LongArrayDataInstance"])) {
            if (is_array($props["LongArrayDataInstance"])) {
                foreach ($props["LongArrayDataInstance"] as $k => $v) {
                    $LongArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\LongArrayDataInstance");
                    $LongArrayDataInstance->fromJSON($v);
                    $this->setLongArrayDataInstance($LongArrayDataInstance);
                }
            }
        }
        if (isset($props["DoubleDataInstance"])) {
            if (is_array($props["DoubleDataInstance"])) {
                foreach ($props["DoubleDataInstance"] as $k => $v) {
                    $DoubleDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DoubleDataInstance");
                    $DoubleDataInstance->fromJSON($v);
                    $this->setDoubleDataInstance($DoubleDataInstance);
                }
            }
        }
        if (isset($props["DoubleArrayDataInstance"])) {
            if (is_array($props["DoubleArrayDataInstance"])) {
                foreach ($props["DoubleArrayDataInstance"] as $k => $v) {
                    $DoubleArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DoubleArrayDataInstance");
                    $DoubleArrayDataInstance->fromJSON($v);
                    $this->setDoubleArrayDataInstance($DoubleArrayDataInstance);
                }
            }
        }
        if (isset($props["ByteArrayDataInstance"])) {
            if (is_array($props["ByteArrayDataInstance"])) {
                foreach ($props["ByteArrayDataInstance"] as $k => $v) {
                    $ByteArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\ByteArrayDataInstance");
                    $ByteArrayDataInstance->fromJSON($v);
                    $this->setByteArrayDataInstance($ByteArrayDataInstance);
                }
            }
        }
        if (isset($props["AnyDataInstance"])) {
            if (is_array($props["AnyDataInstance"])) {
                foreach ($props["AnyDataInstance"] as $k => $v) {
                    $AnyDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\AnyDataInstance");
                    $AnyDataInstance->fromJSON($v);
                    $this->setAnyDataInstance($AnyDataInstance);
                }
            }
        }
        if (isset($props["ComplexDataInstance"])) {
            if (is_array($props["ComplexDataInstance"])) {
                foreach ($props["ComplexDataInstance"] as $k => $v) {
                    $ComplexDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\ComplexDataInstance");
                    $ComplexDataInstance->fromJSON($v);
                    $this->setComplexDataInstance($ComplexDataInstance);
                }
            }
        }
        if (isset($props["SchemaDataInstance"])) {
            if (is_array($props["SchemaDataInstance"])) {
                foreach ($props["SchemaDataInstance"] as $k => $v) {
                    $SchemaDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\SchemaDataInstance");
                    $SchemaDataInstance->fromJSON($v);
                    $this->setSchemaDataInstance($SchemaDataInstance);
                }
            }
        }
        if (isset($props["InstanceExtendedAttributes"])) {
            $InstanceExtendedAttributes = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\InstanceExtendedAttributes");
            $InstanceExtendedAttributes->fromJSON($props["InstanceExtendedAttributes"]);
            $this->setInstanceExtendedAttributes($InstanceExtendedAttributes);
        }
    }

}
