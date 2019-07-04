<?php
	namespace at\together\_2006\xpil1;
		
	class DataSignature extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.together.at/2006/XPIL1.0";
		const ROOT = "DataSignature";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\DataField
		 */
		protected $DataField = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\FormalParameter
		 */
		protected $FormalParameter = null;
		/**
		 * @maxOccurs 1 
		 * @var at\together\_2006\xpil1\LanguageMappings
		 */
		protected $LanguageMappings = null;
		/**
		 * @maxOccurs 1 
		 * @var at\together\_2006\xpil1\InstanceExtendedAttributes
		 */
		protected $InstanceExtendedAttributes = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Id = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["DataField"] = array(
				"prop"=>"DataField",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->DataField
			);
			$this->_properties["FormalParameter"] = array(
				"prop"=>"FormalParameter",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->FormalParameter
			);
			$this->_properties["LanguageMappings"] = array(
				"prop"=>"LanguageMappings",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->LanguageMappings
			);
			$this->_properties["InstanceExtendedAttributes"] = array(
				"prop"=>"InstanceExtendedAttributes",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->InstanceExtendedAttributes
			);
			$this->_properties["Id"] = array(
				"prop"=>"Id",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Id
			);
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\DataField $val
		 */
		public function setDataField ( \org\wfmc\_2002\xpdl1\DataField $val ) {
			$this->DataField = $val;
			$this->_properties["DataField"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\FormalParameter $val
		 */
		public function setFormalParameter ( \org\wfmc\_2002\xpdl1\FormalParameter $val ) {
			$this->FormalParameter = $val;
			$this->_properties["FormalParameter"]["text"] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\LanguageMappings $val
		 */
		public function setLanguageMappings ( \at\together\_2006\xpil1\LanguageMappings $val ) {
			$this->LanguageMappings = $val;
			$this->_properties["LanguageMappings"]["text"] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\InstanceExtendedAttributes $val
		 */
		public function setInstanceExtendedAttributes ( \at\together\_2006\xpil1\InstanceExtendedAttributes $val ) {
			$this->InstanceExtendedAttributes = $val;
			$this->_properties["InstanceExtendedAttributes"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setId (  $val ) {
			$this->Id = $val;
			$this->_properties["Id"]["text"] = $val;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\DataField
		 */
		public function getDataField() {
			return $this->DataField;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\FormalParameter
		 */
		public function getFormalParameter() {
			return $this->FormalParameter;
		}
		/**
		 * @return at\together\_2006\xpil1\LanguageMappings
		 */
		public function getLanguageMappings() {
			return $this->LanguageMappings;
		}
		/**
		 * @return at\together\_2006\xpil1\InstanceExtendedAttributes
		 */
		public function getInstanceExtendedAttributes() {
			return $this->InstanceExtendedAttributes;
		}
		/**
		 * @return \String
		 */
		public function getId() {
			return $this->Id;
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
			if( $prop = $this->getId() ) $xw->writeAttribute( 'Id', $prop );
		}
		/**
		* Вывод элементов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function elementsToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::elementsToXmlWriter( $xw, $xmlname, $xmlns );
			if( ($prop = $this->getDataField()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getFormalParameter()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getLanguageMappings()) !== NULL ) {
					$prop->toXmlWriter( $xw );
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
			if( $attr = $xr->getAttribute( 'Id') ) {
			$this->_attributes['Id']['prop'] = 'Id';
			$this->setId( $attr ); 
		}
			parent::attributesFromXmlReader( $xr );	
		}
				
		/**
		 * Чтение элементов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function elementsFromXmlReader ( \XMLReader &$xr ) {
			switch ( $xr->localName ) {
				case "DataField":
					$DataField = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\DataField");
					$this->setDataField( $DataField->fromXmlReader( $xr ) );
					break;
				case "FormalParameter":
					$FormalParameter = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\FormalParameter");
					$this->setFormalParameter( $FormalParameter->fromXmlReader( $xr ) );
					break;
				case "LanguageMappings":
					$LanguageMappings = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\LanguageMappings");
					$this->setLanguageMappings( $LanguageMappings->fromXmlReader( $xr ) );
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
			if(isset($props["DataField"])) {
				$DataField = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\DataField");
				$DataField->fromJSON($props["DataField"]);
				$this->setDataField($DataField);
			}
			if(isset($props["FormalParameter"])) {
				$FormalParameter = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\FormalParameter");
				$FormalParameter->fromJSON($props["FormalParameter"]);
				$this->setFormalParameter($FormalParameter);
			}
			if(isset($props["LanguageMappings"])) {
				$LanguageMappings = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\LanguageMappings");
				$LanguageMappings->fromJSON($props["LanguageMappings"]);
				$this->setLanguageMappings($LanguageMappings);
			}
			if(isset($props["InstanceExtendedAttributes"])) {
				$InstanceExtendedAttributes = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\InstanceExtendedAttributes");
				$InstanceExtendedAttributes->fromJSON($props["InstanceExtendedAttributes"]);
				$this->setInstanceExtendedAttributes($InstanceExtendedAttributes);
			}
			if(isset($props["Id"])) {
				$this->setId($props["Id"]);
			}
		}
		
	}
		

