<?php
	namespace at\together\_2006\xpil1;
		
	class StringArrayDataInstance extends \at\together\_2006\xpil1\DataInstance {
			
		const NS = "http://www.together.at/2006/XPIL1.0";
		const ROOT = "StringArrayDataInstance";
		const PREF = NULL;
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\StringValue[]
		 */
		protected $StringValue = [];
		public function __construct() {
			parent::__construct();
			
			$this->_properties["StringValue"] = array(
				"prop"=>"StringValue",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->StringValue
			);
		}
		/**
		 * @param at\together\_2006\xpil1\StringValue $val
		 */
		public function setStringValue ( \at\together\_2006\xpil1\StringValue $val ) {
			$this->StringValue[] = $val;
			$this->_properties["StringValue"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\StringValue[]
		 */
		public function setStringValueArray ( array $vals ) {
			$this->StringValue = $vals;
			$this->_properties["StringValue"]["text"] = $vals;
		}
		/**
		 * @return at\together\_2006\xpil1\StringValue | []
		 */
		public function getStringValue($index = null) {
			if( $index !== null ) {
				$res = isset($this->StringValue[$index]) ? $this->StringValue[$index] : null;
			} else {
				$res = $this->StringValue;
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
			if( $props = $this->getStringValue() ) {
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
				case "StringValue":
					$StringValue = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\StringValue");
					$this->setStringValue( $StringValue->fromXmlReader( $xr ) );
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
			if(isset($props["StringValue"])) {
				if( is_array($props["StringValue"]) ) {
					foreach($props["StringValue"] as $k=>$v) {
						$StringValue = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\StringValue");
						$StringValue->fromJSON($v);
						$this->setStringValue($StringValue);
					}
				}
			} elseif(array_keys($props) == array_keys(array_keys($props))) {
				foreach($props as $v) {
					$StringValue = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\StringValue");
					$StringValue->fromJSON($v);
					$this->setStringValue($StringValue);
				}
			}
		}
		
	}
		

