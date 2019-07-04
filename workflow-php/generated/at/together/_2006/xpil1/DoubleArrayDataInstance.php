<?php
	namespace at\together\_2006\xpil1;
		
	class DoubleArrayDataInstance extends \at\together\_2006\xpil1\DataInstance {
			
		const NS = "http://www.together.at/2006/XPIL1.0";
		const ROOT = "DoubleArrayDataInstance";
		const PREF = NULL;
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DoubleValue[]
		 */
		protected $DoubleValue = [];
		public function __construct() {
			parent::__construct();
			
			$this->_properties["DoubleValue"] = array(
				"prop"=>"DoubleValue",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->DoubleValue
			);
		}
		/**
		 * @param at\together\_2006\xpil1\DoubleValue $val
		 */
		public function setDoubleValue ( \at\together\_2006\xpil1\DoubleValue $val ) {
			$this->DoubleValue[] = $val;
			$this->_properties["DoubleValue"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DoubleValue[]
		 */
		public function setDoubleValueArray ( array $vals ) {
			$this->DoubleValue = $vals;
			$this->_properties["DoubleValue"]["text"] = $vals;
		}
		/**
		 * @return at\together\_2006\xpil1\DoubleValue | []
		 */
		public function getDoubleValue($index = null) {
			if( $index !== null ) {
				$res = isset($this->DoubleValue[$index]) ? $this->DoubleValue[$index] : null;
			} else {
				$res = $this->DoubleValue;
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
			if( $props = $this->getDoubleValue() ) {
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
				case "DoubleValue":
					$DoubleValue = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DoubleValue");
					$this->setDoubleValue( $DoubleValue->fromXmlReader( $xr ) );
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
			if(isset($props["DoubleValue"])) {
				if( is_array($props["DoubleValue"]) ) {
					foreach($props["DoubleValue"] as $k=>$v) {
						$DoubleValue = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DoubleValue");
						$DoubleValue->fromJSON($v);
						$this->setDoubleValue($DoubleValue);
					}
				}
			} elseif(array_keys($props) == array_keys(array_keys($props))) {
				foreach($props as $v) {
					$DoubleValue = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DoubleValue");
					$DoubleValue->fromJSON($v);
					$this->setDoubleValue($DoubleValue);
				}
			}
		}
		
	}
		

