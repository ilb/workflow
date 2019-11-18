<?php

namespace ru\ilb\workflow\view;

/**
 * Activity dossier
 * .
 */
class ActivityDossier extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "urn:ru:ilb:workflow:view";
    const ROOT = "activityDossier";
    const PREF = NULL;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $DossierKey = null;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $DossierPackage = null;

    /**
     * @maxOccurs 1 .
     * @var \String
     */
    protected $DossierCode = null;

    public function __construct() {
        parent::__construct();
        $this->_properties["dossierKey"] = array(
            "prop" => "DossierKey",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->DossierKey
        );
        $this->_properties["dossierPackage"] = array(
            "prop" => "DossierPackage",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->DossierPackage
        );
        $this->_properties["dossierCode"] = array(
            "prop" => "DossierCode",
            "ns" => "",
            "minOccurs" => 1,
            "text" => $this->DossierCode
        );
    }

    /**
     * @param \String $val
     */
    public function setDossierKey($val) {
        $this->DossierKey = $val;
        $this->_properties["dossierKey"]["text"] = $val;
        return $this;
    }

    /**
     * @param \String $val
     */
    public function setDossierPackage($val) {
        $this->DossierPackage = $val;
        $this->_properties["dossierPackage"]["text"] = $val;
        return $this;
    }

    /**
     * @param \String $val
     */
    public function setDossierCode($val) {
        $this->DossierCode = $val;
        $this->_properties["dossierCode"]["text"] = $val;
        return $this;
    }

    /**
     * @return \String
     */
    public function getDossierKey() {
        return $this->DossierKey;
    }

    /**
     * @return \String
     */
    public function getDossierPackage() {
        return $this->DossierPackage;
    }

    /**
     * @return \String
     */
    public function getDossierCode() {
        return $this->DossierCode;
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
        $prop = $this->getDossierKey();
        if ($prop !== NULL) {
            $xw->writeElement('dossierKey', $prop);
        }
        $prop = $this->getDossierPackage();
        if ($prop !== NULL) {
            $xw->writeElement('dossierPackage', $prop);
        }
        $prop = $this->getDossierCode();
        if ($prop !== NULL) {
            $xw->writeElement('dossierCode', $prop);
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
            case "dossierKey":
                $this->setDossierKey($xr->readString());
                break;
            case "dossierPackage":
                $this->setDossierPackage($xr->readString());
                break;
            case "dossierCode":
                $this->setDossierCode($xr->readString());
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
        if (isset($props["dossierKey"])) {
            $this->setDossierKey($props["dossierKey"]);
        }
        if (isset($props["dossierPackage"])) {
            $this->setDossierPackage($props["dossierPackage"]);
        }
        if (isset($props["dossierCode"])) {
            $this->setDossierCode($props["dossierCode"]);
        }
    }

    /**
     * Чтение данных массива
     * в объект
     * @param Array $row
     *
     */
    public function fromArray($row) {
        if (isset($row["dossierKey"])) {
            $this->setDossierKey($row["dossierKey"]);
        }
        if (isset($row["dossierPackage"])) {
            $this->setDossierPackage($row["dossierPackage"]);
        }
        if (isset($row["dossierCode"])) {
            $this->setDossierCode($row["dossierCode"]);
        }
    }

}
