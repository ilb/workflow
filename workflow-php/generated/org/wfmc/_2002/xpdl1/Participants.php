<?php

namespace org\wfmc\_2002\xpdl1;

class Participants extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {

    const NS = "http://www.wfmc.org/2002/XPDL1.0";
    const ROOT = "Participants";
    const PREF = NULL;

    /**
     * @maxOccurs unbounded
     * @var org\wfmc\_2002\xpdl1\Participant[]
     */
    protected $Participant = [];

    public function __construct() {
        parent::__construct();

        $this->_properties["Participant"] = array(
            "prop" => "Participant",
            "ns" => "",
            "minOccurs" => 0,
            "text" => $this->Participant
        );
    }

    /**
     * @param org\wfmc\_2002\xpdl1\Participant $val
     */
    public function setParticipant(\org\wfmc\_2002\xpdl1\Participant $val) {
        $this->Participant[] = $val;
        $this->_properties["Participant"]["text"][] = $val;
    }

    /**
     * @param org\wfmc\_2002\xpdl1\Participant[]
     */
    public function setParticipantArray(array $vals) {
        $this->Participant = $vals;
        $this->_properties["Participant"]["text"] = $vals;
    }

    /**
     * @return org\wfmc\_2002\xpdl1\Participant | []
     */
    public function getParticipant($index = null) {
        if ($index !== null) {
            $res = isset($this->Participant[$index]) ? $this->Participant[$index] : null;
        } else {
            $res = $this->Participant;
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
        if ($props = $this->getParticipant()) {
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
            case "Participant":
                $Participant = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Participant");
                $this->setParticipant($Participant->fromXmlReader($xr));
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
        if (isset($props["Participant"])) {
            if (is_array($props["Participant"])) {
                foreach ($props["Participant"] as $k => $v) {
                    $Participant = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Participant");
                    $Participant->fromJSON($v);
                    $this->setParticipant($Participant);
                }
            }
        } elseif (array_keys($props) == array_keys(array_keys($props))) {
            foreach ($props as $v) {
                $Participant = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Participant");
                $Participant->fromJSON($v);
                $this->setParticipant($Participant);
            }
        }
    }

}
