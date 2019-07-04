<?php
	namespace at\together\_2006\xpil1;
		
	class EventAudits extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.together.at/2006/XPIL1.0";
		const ROOT = "EventAudits";
		const PREF = NULL;
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\EventAudit[]
		 */
		protected $StateEventAudit = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\EventAudit[]
		 */
		protected $DataEventAudit = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\EventAudit[]
		 */
		protected $AssignmentEventAudit = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\EventAudit[]
		 */
		protected $CreateProcessEventAudit = [];
		/**
		 * @maxOccurs 1 
		 * @var at\together\_2006\xpil1\InstanceExtendedAttributes
		 */
		protected $InstanceExtendedAttributes = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["StateEventAudit"] = array(
				"prop"=>"StateEventAudit",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->StateEventAudit
			);
			$this->_properties["DataEventAudit"] = array(
				"prop"=>"DataEventAudit",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->DataEventAudit
			);
			$this->_properties["AssignmentEventAudit"] = array(
				"prop"=>"AssignmentEventAudit",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->AssignmentEventAudit
			);
			$this->_properties["CreateProcessEventAudit"] = array(
				"prop"=>"CreateProcessEventAudit",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->CreateProcessEventAudit
			);
			$this->_properties["InstanceExtendedAttributes"] = array(
				"prop"=>"InstanceExtendedAttributes",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->InstanceExtendedAttributes
			);
		}
		/**
		 * @param at\together\_2006\xpil1\EventAudit $val
		 */
		public function setStateEventAudit ( \at\together\_2006\xpil1\EventAudit $val ) {
			$this->StateEventAudit[] = $val;
			$this->_properties["StateEventAudit"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\EventAudit[]
		 */
		public function setStateEventAuditArray ( array $vals ) {
			$this->StateEventAudit = $vals;
			$this->_properties["StateEventAudit"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\EventAudit $val
		 */
		public function setDataEventAudit ( \at\together\_2006\xpil1\EventAudit $val ) {
			$this->DataEventAudit[] = $val;
			$this->_properties["DataEventAudit"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\EventAudit[]
		 */
		public function setDataEventAuditArray ( array $vals ) {
			$this->DataEventAudit = $vals;
			$this->_properties["DataEventAudit"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\EventAudit $val
		 */
		public function setAssignmentEventAudit ( \at\together\_2006\xpil1\EventAudit $val ) {
			$this->AssignmentEventAudit[] = $val;
			$this->_properties["AssignmentEventAudit"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\EventAudit[]
		 */
		public function setAssignmentEventAuditArray ( array $vals ) {
			$this->AssignmentEventAudit = $vals;
			$this->_properties["AssignmentEventAudit"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\EventAudit $val
		 */
		public function setCreateProcessEventAudit ( \at\together\_2006\xpil1\EventAudit $val ) {
			$this->CreateProcessEventAudit[] = $val;
			$this->_properties["CreateProcessEventAudit"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\EventAudit[]
		 */
		public function setCreateProcessEventAuditArray ( array $vals ) {
			$this->CreateProcessEventAudit = $vals;
			$this->_properties["CreateProcessEventAudit"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\InstanceExtendedAttributes $val
		 */
		public function setInstanceExtendedAttributes ( \at\together\_2006\xpil1\InstanceExtendedAttributes $val ) {
			$this->InstanceExtendedAttributes = $val;
			$this->_properties["InstanceExtendedAttributes"]["text"] = $val;
		}
		/**
		 * @return at\together\_2006\xpil1\EventAudit | []
		 */
		public function getStateEventAudit($index = null) {
			if( $index !== null ) {
				$res = isset($this->StateEventAudit[$index]) ? $this->StateEventAudit[$index] : null;
			} else {
				$res = $this->StateEventAudit;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\EventAudit | []
		 */
		public function getDataEventAudit($index = null) {
			if( $index !== null ) {
				$res = isset($this->DataEventAudit[$index]) ? $this->DataEventAudit[$index] : null;
			} else {
				$res = $this->DataEventAudit;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\EventAudit | []
		 */
		public function getAssignmentEventAudit($index = null) {
			if( $index !== null ) {
				$res = isset($this->AssignmentEventAudit[$index]) ? $this->AssignmentEventAudit[$index] : null;
			} else {
				$res = $this->AssignmentEventAudit;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\EventAudit | []
		 */
		public function getCreateProcessEventAudit($index = null) {
			if( $index !== null ) {
				$res = isset($this->CreateProcessEventAudit[$index]) ? $this->CreateProcessEventAudit[$index] : null;
			} else {
				$res = $this->CreateProcessEventAudit;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\InstanceExtendedAttributes
		 */
		public function getInstanceExtendedAttributes() {
			return $this->InstanceExtendedAttributes;
		}
		
		public function toXmlStr( $xmlns=self::NS, $xmlname=self::ROOT ) {
			return parent::toXmlStr($xmlns,$xmlname);
		}

		/**
		* Вывод в XMLWriter
		* @codegen true
		* @param XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		* @param int $mode
		*/
		public function toXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS, $mode = \Adaptor_XML::ELEMENT ) {
			if( $mode & \Adaptor_XML::STARTELEMENT ) $xw->startElementNS( NULL, $xmlname, $xmlns );
			$this->attributesToXmlWriter( $xw, $xmlname, $xmlns );
			$this->elementsToXmlWriter( $xw, $xmlname, $xmlns );
			if( $mode & \Adaptor_XML::ENDELEMENT ) $xw->endElement();
		}
				
		/**
		* Вывод атрибутов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function attributesToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::attributesToXmlWriter( $xw, $xmlname, $xmlns );
		}
		/**
		* Вывод элементов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function elementsToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::elementsToXmlWriter( $xw, $xmlname, $xmlns );
			if( $props = $this->getStateEventAudit() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getDataEventAudit() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getAssignmentEventAudit() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getCreateProcessEventAudit() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( ($prop = $this->getInstanceExtendedAttributes()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
		}

		/**
		 * Чтение атрибутов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function attributesFromXmlReader ( \XMLReader &$xr ) {
			parent::attributesFromXmlReader( $xr );	
		}
				
		/**
		 * Чтение элементов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function elementsFromXmlReader ( \XMLReader &$xr ) {
			switch ( $xr->localName ) {
				case "StateEventAudit":
					$StateEventAudit = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\StateEventAudit");
					$this->setStateEventAudit( $StateEventAudit->fromXmlReader( $xr ) );
					break;
				case "DataEventAudit":
					$DataEventAudit = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DataEventAudit");
					$this->setDataEventAudit( $DataEventAudit->fromXmlReader( $xr ) );
					break;
				case "AssignmentEventAudit":
					$AssignmentEventAudit = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\AssignmentEventAudit");
					$this->setAssignmentEventAudit( $AssignmentEventAudit->fromXmlReader( $xr ) );
					break;
				case "CreateProcessEventAudit":
					$CreateProcessEventAudit = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\CreateProcessEventAudit");
					$this->setCreateProcessEventAudit( $CreateProcessEventAudit->fromXmlReader( $xr ) );
					break;
				case "InstanceExtendedAttributes":
					$InstanceExtendedAttributes = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\InstanceExtendedAttributes");
					$this->setInstanceExtendedAttributes( $InstanceExtendedAttributes->fromXmlReader( $xr ) );
					break;
				default:
					parent::elementsFromXmlReader( $xr );
			}
		}
		/**
		 * Чтение данных JSON объекта, результата работы json_decode,
		 * в объект
		 * @param mixed array | stdObject
		 *
		 */
		public function fromJSON( $arg ) {
			parent::fromJSON( $arg );
			$props = [];
			if( is_array( $arg ) ) {
				$props = $arg;
			} elseif( is_object( $arg ) ) {
				foreach( $arg as $k=>$v ) {
					$props[$k] = $v;
				}
			}
			if(isset($props["StateEventAudit"])) {
				if( is_array($props["StateEventAudit"]) ) {
					foreach($props["StateEventAudit"] as $k=>$v) {
						$StateEventAudit = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\StateEventAudit");
						$StateEventAudit->fromJSON($v);
						$this->setStateEventAudit($StateEventAudit);
					}
				}
			}
			if(isset($props["DataEventAudit"])) {
				if( is_array($props["DataEventAudit"]) ) {
					foreach($props["DataEventAudit"] as $k=>$v) {
						$DataEventAudit = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DataEventAudit");
						$DataEventAudit->fromJSON($v);
						$this->setDataEventAudit($DataEventAudit);
					}
				}
			}
			if(isset($props["AssignmentEventAudit"])) {
				if( is_array($props["AssignmentEventAudit"]) ) {
					foreach($props["AssignmentEventAudit"] as $k=>$v) {
						$AssignmentEventAudit = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\AssignmentEventAudit");
						$AssignmentEventAudit->fromJSON($v);
						$this->setAssignmentEventAudit($AssignmentEventAudit);
					}
				}
			}
			if(isset($props["CreateProcessEventAudit"])) {
				if( is_array($props["CreateProcessEventAudit"]) ) {
					foreach($props["CreateProcessEventAudit"] as $k=>$v) {
						$CreateProcessEventAudit = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\CreateProcessEventAudit");
						$CreateProcessEventAudit->fromJSON($v);
						$this->setCreateProcessEventAudit($CreateProcessEventAudit);
					}
				}
			}
			if(isset($props["InstanceExtendedAttributes"])) {
				$InstanceExtendedAttributes = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\InstanceExtendedAttributes");
				$InstanceExtendedAttributes->fromJSON($props["InstanceExtendedAttributes"]);
				$this->setInstanceExtendedAttributes($InstanceExtendedAttributes);
			}
		}
		
	}
		

