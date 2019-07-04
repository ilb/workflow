<?php
	namespace at\together\_2006\xpil1;
		
	class DateArrayDataInstance extends \at\together\_2006\xpil1\DataInstance {
			
		const NS = "http://www.together.at/2006/XPIL1.0";
		const ROOT = "DateArrayDataInstance";
		const PREF = NULL;
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DateValue[]
		 */
		protected $DateValue = [];
		public function __construct() {
			parent::__construct();
			
			$this->_properties["DateValue"] = array(
				"prop"=>"DateValue",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->DateValue
			);
		}
		/**
		 * @param at\together\_2006\xpil1\DateValue $val
		 */
		public function setDateValue ( \at\together\_2006\xpil1\DateValue $val ) {
			$this->DateValue[] = $val;
			$this->_properties["DateValue"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DateValue[]
		 */
		public function setDateValueArray ( array $vals ) {
			$this->DateValue = $vals;
			$this->_properties["DateValue"]["text"] = $vals;
		}
		/**
		 * @return at\together\_2006\xpil1\DateValue | []
		 */
		public function getDateValue($index = null) {
			if( $index !== null ) {
				$res = isset($this->DateValue[$index]) ? $this->DateValue[$index] : null;
			} else {
				$res = $this->DateValue;
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
			if( $props = $this->getDateValue() ) {
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
				case "DateValue":
					$DateValue = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DateValue");
					$this->setDateValue( $DateValue->fromXmlReader( $xr ) );
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
			if(isset($props["DateValue"])) {
				if( is_array($props["DateValue"]) ) {
					foreach($props["DateValue"] as $k=>$v) {
						$DateValue = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DateValue");
						$DateValue->fromJSON($v);
						$this->setDateValue($DateValue);
					}
				}
			} elseif(array_keys($props) == array_keys(array_keys($props))) {
				foreach($props as $v) {
					$DateValue = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DateValue");
					$DateValue->fromJSON($v);
					$this->setDateValue($DateValue);
				}
			}
		}
		
	}
		

