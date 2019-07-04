<?php
	namespace at\together\_2006\xpil1;
		
	class TimeArrayDataInstance extends \at\together\_2006\xpil1\DataInstance {
			
		const NS = "http://www.together.at/2006/XPIL1.0";
		const ROOT = "TimeArrayDataInstance";
		const PREF = NULL;
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\TimeValue[]
		 */
		protected $TimeValue = [];
		public function __construct() {
			parent::__construct();
			
			$this->_properties["TimeValue"] = array(
				"prop"=>"TimeValue",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->TimeValue
			);
		}
		/**
		 * @param at\together\_2006\xpil1\TimeValue $val
		 */
		public function setTimeValue ( \at\together\_2006\xpil1\TimeValue $val ) {
			$this->TimeValue[] = $val;
			$this->_properties["TimeValue"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\TimeValue[]
		 */
		public function setTimeValueArray ( array $vals ) {
			$this->TimeValue = $vals;
			$this->_properties["TimeValue"]["text"] = $vals;
		}
		/**
		 * @return at\together\_2006\xpil1\TimeValue | []
		 */
		public function getTimeValue($index = null) {
			if( $index !== null ) {
				$res = isset($this->TimeValue[$index]) ? $this->TimeValue[$index] : null;
			} else {
				$res = $this->TimeValue;
			}
			return $res;
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
			if( $props = $this->getTimeValue() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
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
				case "TimeValue":
					$TimeValue = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\TimeValue");
					$this->setTimeValue( $TimeValue->fromXmlReader( $xr ) );
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
			if(isset($props["TimeValue"])) {
				if( is_array($props["TimeValue"]) ) {
					foreach($props["TimeValue"] as $k=>$v) {
						$TimeValue = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\TimeValue");
						$TimeValue->fromJSON($v);
						$this->setTimeValue($TimeValue);
					}
				}
			} elseif(array_keys($props) == array_keys(array_keys($props))) {
				foreach($props as $v) {
					$TimeValue = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\TimeValue");
					$TimeValue->fromJSON($v);
					$this->setTimeValue($TimeValue);
				}
			}
		}
		
	}
		

