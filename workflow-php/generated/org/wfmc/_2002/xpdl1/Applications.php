<?php

namespace org\wfmc\_2002\xpdl1;

class Applications extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "http://www.wfmc.org/2002/XPDL1.0";
    const ROOT = "Applications";
    const PREF = NULL;

    /**
     * @maxOccurs unbounded
     * @var org\wfmc\_2002\xpdl1\Application[]
     */
    protected $Application = [];

    public function __construct() {
        parent::__construct();

        $this->_properties["Application"] = array(
            "prop" => "Application",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Application
        );
    }

    /**
     * @param org\wfmc\_2002\xpdl1\Application $val
     */
    public function setApplication(\org\wfmc\_2002\xpdl1\Application $val) {
        $this->Application[] = $val;
        $this->_properties["Application"]["text"][] = $val;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\Application[]
     */
    public function setApplicationArray(array $vals) {
        $this->Application = $vals;
        $this->_properties["Application"]["text"] = $vals;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\Application | []
     */
    public function getApplication($index = null) {
        if ($index !== null) {
            $res = isset($this->Application[$index]) ? $this->Application[$index] : null;
        } else {
            $res = $this->Application;
        }
        return $res;
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
        if ($props = $this->getApplication()) {
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
            case "Application":
                $Application = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Application");
                $this->setApplication($Application->fromXmlReader($xr));
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
        if (isset($props["Application"])) {
            if (is_array($props["Application"])) {
                foreach ($props["Application"] as $k => $v) {
                    $Application = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Application");
                    $Application->fromJSON($v);
                    $this->setApplication($Application);
                }
            }
        } elseif (array_keys($props) == array_keys(array_keys($props))) {
            foreach ($props as $v) {
                $Application = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Application");
                $Application->fromJSON($v);
                $this->setApplication($Application);
            }
        }
    }

}
