<?php

namespace org\wfmc\_2002\xpdl1;

class Script extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "http://www.wfmc.org/2002/XPDL1.0";
    const ROOT = "Script";
    const PREF = NULL;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $Type = null;

    /**
     * @maxOccurs 1
     * @var \String
     */
    protected $Version = null;

    /**
     * @maxOccurs 1
     * @var \AnyURI
     */
    protected $Grammar = null;

    public function __construct() {
        parent::__construct();

        $this->_properties["Type"] = array(
            "prop" => "Type",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Type
        );
        $this->_properties["Version"] = array(
            "prop" => "Version",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Version
        );
        $this->_properties["Grammar"] = array(
            "prop" => "Grammar",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->Grammar
        );
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
    public function setVersion($val) {
        $this->Version = $val;
        $this->_properties["Version"]["text"] = $val;
    }

    /**
     * @param \AnyURI $val
     */
    public function setGrammar($val) {
        $this->Grammar = $val;
        $this->_properties["Grammar"]["text"] = $val;
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
    public function getVersion() {
        return $this->Version;
    }

    /**
     * @return \AnyURI
     */
    public function getGrammar() {
        return $this->Grammar;
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
        if ($prop = $this->getType())
            $xw->writeAttribute('Type', $prop);
        if ($prop = $this->getVersion())
            $xw->writeAttribute('Version', $prop);
        if ($prop = $this->getGrammar())
            $xw->writeAttribute('Grammar', $prop);
    }

    /**
     * Вывод элементов в \XMLWriter
     * @param \XMLWriter $xw
     * @param string $xmlname Имя корневого узла
     * @param string $xmlns Пространство имен
     */
    protected function elementsToXmlWriter(\XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS) {
        parent::elementsToXmlWriter($xw, $xmlname, $xmlns);
    }

    /**
     * Чтение атрибутов из \XMLReader
     * @param \XMLReader $xr
     */
    public function attributesFromXmlReader(\XMLReader &$xr) {
        if ($attr = $xr->getAttribute('Type')) {
            $this->_attributes['Type']['prop'] = 'Type';
            $this->setType($attr);
        }
        if ($attr = $xr->getAttribute('Version')) {
            $this->_attributes['Version']['prop'] = 'Version';
            $this->setVersion($attr);
        }
        if ($attr = $xr->getAttribute('Grammar')) {
            $this->_attributes['Grammar']['prop'] = 'Grammar';
            $this->setGrammar($attr);
        }
        parent::attributesFromXmlReader($xr);
    }

    /**
     * Чтение элементов из \XMLReader
     * @param \XMLReader $xr
     */
    public function elementsFromXmlReader(\XMLReader &$xr) {
        switch ($xr->localName) {
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
        if (isset($props["Type"])) {
            $this->setType($props["Type"]);
        }
        if (isset($props["Version"])) {
            $this->setVersion($props["Version"]);
        }
        if (isset($props["Grammar"])) {
            $this->setGrammar($props["Grammar"]);
        }
    }

}
