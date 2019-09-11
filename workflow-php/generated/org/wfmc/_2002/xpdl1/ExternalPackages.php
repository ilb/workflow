<?php

namespace org\wfmc\_2002\xpdl1;

class ExternalPackages extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "http://www.wfmc.org/2002/XPDL1.0";
    const ROOT = "ExternalPackages";
    const PREF = NULL;

    /**
     * @maxOccurs unbounded
     * @var org\wfmc\_2002\xpdl1\ExternalPackage[]
     */
    protected $ExternalPackage = [];

    public function __construct() {
        parent::__construct();

        $this->_properties["ExternalPackage"] = array(
            "prop" => "ExternalPackage",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->ExternalPackage
        );
    }

    /**
     * @param org\wfmc\_2002\xpdl1\ExternalPackage $val
     */
    public function setExternalPackage(\org\wfmc\_2002\xpdl1\ExternalPackage $val) {
        $this->ExternalPackage[] = $val;
        $this->_properties["ExternalPackage"]["text"][] = $val;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\ExternalPackage[]
     */
    public function setExternalPackageArray(array $vals) {
        $this->ExternalPackage = $vals;
        $this->_properties["ExternalPackage"]["text"] = $vals;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\ExternalPackage | []
     */
    public function getExternalPackage($index = null) {
        if ($index !== null) {
            $res = isset($this->ExternalPackage[$index]) ? $this->ExternalPackage[$index] : null;
        } else {
            $res = $this->ExternalPackage;
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
        if ($props = $this->getExternalPackage()) {
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
            case "ExternalPackage":
                $ExternalPackage = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ExternalPackage");
                $this->setExternalPackage($ExternalPackage->fromXmlReader($xr));
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
        if (isset($props["ExternalPackage"])) {
            if (is_array($props["ExternalPackage"])) {
                foreach ($props["ExternalPackage"] as $k => $v) {
                    $ExternalPackage = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ExternalPackage");
                    $ExternalPackage->fromJSON($v);
                    $this->setExternalPackage($ExternalPackage);
                }
            }
        } elseif (array_keys($props) == array_keys(array_keys($props))) {
            foreach ($props as $v) {
                $ExternalPackage = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ExternalPackage");
                $ExternalPackage->fromJSON($v);
                $this->setExternalPackage($ExternalPackage);
            }
        }
    }

}
