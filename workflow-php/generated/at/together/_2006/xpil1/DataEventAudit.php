<?php
	namespace at\together\_2006\xpil1;
		
	class DataEventAudit extends \at\together\_2006\xpil1\EventAudit {
			
		const NS = "http://www.together.at/2006/XPIL1.0";
		const ROOT = "DataEventAudit";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var at\together\_2006\xpil1\OldEventData
		 */
		protected $OldEventData = null;
		/**
		 * @maxOccurs 1 
		 * @var at\together\_2006\xpil1\NewEventData
		 */
		protected $NewEventData = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["OldEventData"] = array(
				"prop"=>"OldEventData",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->OldEventData
			);
			$this->_properties["NewEventData"] = array(
				"prop"=>"NewEventData",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->NewEventData
			);
		}
		/**
		 * @param at\together\_2006\xpil1\OldEventData $val
		 */
		public function setOldEventData ( \at\together\_2006\xpil1\OldEventData $val ) {
			$this->OldEventData = $val;
			$this->_properties["OldEventData"]["text"] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\NewEventData $val
		 */
		public function setNewEventData ( \at\together\_2006\xpil1\NewEventData $val ) {
			$this->NewEventData = $val;
			$this->_properties["NewEventData"]["text"] = $val;
		}
		/**
		 * @return at\together\_2006\xpil1\OldEventData
		 */
		public function getOldEventData() {
			return $this->OldEventData;
		}
		/**
		 * @return at\together\_2006\xpil1\NewEventData
		 */
		public function getNewEventData() {
			return $this->NewEventData;
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
			if( ($prop = $this->getOldEventData()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getNewEventData()) !== NULL ) {
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
				case "OldEventData":
					$OldEventData = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\OldEventData");
					$this->setOldEventData( $OldEventData->fromXmlReader( $xr ) );
					break;
				case "NewEventData":
					$NewEventData = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\NewEventData");
					$this->setNewEventData( $NewEventData->fromXmlReader( $xr ) );
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
			if(isset($props["OldEventData"])) {
				$OldEventData = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\OldEventData");
				$OldEventData->fromJSON($props["OldEventData"]);
				$this->setOldEventData($OldEventData);
			}
			if(isset($props["NewEventData"])) {
				$NewEventData = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\NewEventData");
				$NewEventData->fromJSON($props["NewEventData"]);
				$this->setNewEventData($NewEventData);
			}
		}
		
	}
		

