<?php
	namespace at\together\_2006\xpil1;
		
	class ContextSignature extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.together.at/2006/XPIL1.0";
		const ROOT = "ContextSignature";
		const PREF = NULL;
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DataSignature[]
		 */
		protected $DataSignature = [];
		/**
		 * @maxOccurs 1 
		 * @var at\together\_2006\xpil1\InstanceExtendedAttributes
		 */
		protected $InstanceExtendedAttributes = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["DataSignature"] = array(
				"prop"=>"DataSignature",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->DataSignature
			);
			$this->_properties["InstanceExtendedAttributes"] = array(
				"prop"=>"InstanceExtendedAttributes",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->InstanceExtendedAttributes
			);
		}
		/**
		 * @param at\together\_2006\xpil1\DataSignature $val
		 */
		public function setDataSignature ( \at\together\_2006\xpil1\DataSignature $val ) {
			$this->DataSignature[] = $val;
			$this->_properties["DataSignature"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DataSignature[]
		 */
		public function setDataSignatureArray ( array $vals ) {
			$this->DataSignature = $vals;
			$this->_properties["DataSignature"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\InstanceExtendedAttributes $val
		 */
		public function setInstanceExtendedAttributes ( \at\together\_2006\xpil1\InstanceExtendedAttributes $val ) {
			$this->InstanceExtendedAttributes = $val;
			$this->_properties["InstanceExtendedAttributes"]["text"] = $val;
		}
		/**
		 * @return at\together\_2006\xpil1\DataSignature | []
		 */
		public function getDataSignature($index = null) {
			if( $index !== null ) {
				$res = isset($this->DataSignature[$index]) ? $this->DataSignature[$index] : null;
			} else {
				$res = $this->DataSignature;
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
			if( $props = $this->getDataSignature() ) {
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
				case "DataSignature":
					$DataSignature = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DataSignature");
					$this->setDataSignature( $DataSignature->fromXmlReader( $xr ) );
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
			if(isset($props["DataSignature"])) {
				if( is_array($props["DataSignature"]) ) {
					foreach($props["DataSignature"] as $k=>$v) {
						$DataSignature = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DataSignature");
						$DataSignature->fromJSON($v);
						$this->setDataSignature($DataSignature);
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
		

