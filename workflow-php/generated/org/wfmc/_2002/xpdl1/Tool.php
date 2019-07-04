<?php
	namespace org\wfmc\_2002\xpdl1;
		
	class Tool extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.wfmc.org/2002/XPDL1.0";
		const ROOT = "Tool";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\ActualParameters
		 */
		protected $ActualParameters = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Description = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\ExtendedAttributes
		 */
		protected $ExtendedAttributes = null;
		/**
		 * @maxOccurs 1 
		 * @var \NMTOKEN
		 */
		protected $Id = null;
		/**
		 * @maxOccurs 1 
		 * @var \NMTOKEN
		 */
		protected $Type = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["ActualParameters"] = array(
				"prop"=>"ActualParameters",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->ActualParameters
			);
			$this->_properties["Description"] = array(
				"prop"=>"Description",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Description
			);
			$this->_properties["ExtendedAttributes"] = array(
				"prop"=>"ExtendedAttributes",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->ExtendedAttributes
			);
			$this->_properties["Id"] = array(
				"prop"=>"Id",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Id
			);
			$this->_properties["Type"] = array(
				"prop"=>"Type",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Type
			);
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\ActualParameters $val
		 */
		public function setActualParameters ( \org\wfmc\_2002\xpdl1\ActualParameters $val ) {
			$this->ActualParameters = $val;
			$this->_properties["ActualParameters"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setDescription (  $val ) {
			$this->Description = $val;
			$this->_properties["Description"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\ExtendedAttributes $val
		 */
		public function setExtendedAttributes ( \org\wfmc\_2002\xpdl1\ExtendedAttributes $val ) {
			$this->ExtendedAttributes = $val;
			$this->_properties["ExtendedAttributes"]["text"] = $val;
		}
		/**
		 * @param \NMTOKEN $val
		 */
		public function setId (  $val ) {
			$this->Id = $val;
			$this->_properties["Id"]["text"] = $val;
		}
		/**
		 * @param \NMTOKEN $val
		 */
		public function setType (  $val ) {
			$this->Type = $val;
			$this->_properties["Type"]["text"] = $val;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\ActualParameters
		 */
		public function getActualParameters() {
			return $this->ActualParameters;
		}
		/**
		 * @return \String
		 */
		public function getDescription() {
			return $this->Description;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\ExtendedAttributes
		 */
		public function getExtendedAttributes() {
			return $this->ExtendedAttributes;
		}
		/**
		 * @return \NMTOKEN
		 */
		public function getId() {
			return $this->Id;
		}
		/**
		 * @return \NMTOKEN
		 */
		public function getType() {
			return $this->Type;
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
			if( $prop = $this->getType() ) $xw->writeAttribute( 'Type', $prop );
		}
		/**
		* Вывод элементов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function elementsToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::elementsToXmlWriter( $xw, $xmlname, $xmlns );
			if( ($prop = $this->getActualParameters()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getDescription()) !== NULL ) {
				$xw->writeElementNS( NULL, 'Description', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
			}
			if( ($prop = $this->getExtendedAttributes()) !== NULL ) {
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
			if( $attr = $xr->getAttribute( 'Type') ) {
			$this->_attributes['Type']['prop'] = 'Type';
			$this->setType( $attr ); 
		}
			parent::attributesFromXmlReader( $xr );	
		}
				
		/**
		 * Чтение элементов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function elementsFromXmlReader ( \XMLReader &$xr ) {
			switch ( $xr->localName ) {
				case "ActualParameters":
					$ActualParameters = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ActualParameters");
					$this->setActualParameters( $ActualParameters->fromXmlReader( $xr ) );
					break;
				case "Description":
					$this->setDescription( $xr->readString() );
					break;
				case "ExtendedAttributes":
					$ExtendedAttributes = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ExtendedAttributes");
					$this->setExtendedAttributes( $ExtendedAttributes->fromXmlReader( $xr ) );
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
			if(isset($props["ActualParameters"])) {
				$ActualParameters = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ActualParameters");
				$ActualParameters->fromJSON($props["ActualParameters"]);
				$this->setActualParameters($ActualParameters);
			}
			if(isset($props["Description"])) {
				$this->setDescription($props["Description"]);
			}
			if(isset($props["ExtendedAttributes"])) {
				$ExtendedAttributes = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ExtendedAttributes");
				$ExtendedAttributes->fromJSON($props["ExtendedAttributes"]);
				$this->setExtendedAttributes($ExtendedAttributes);
			}
			if(isset($props["Id"])) {
				$this->setId($props["Id"]);
			}
			if(isset($props["Type"])) {
				$this->setType($props["Type"]);
			}
		}
		
	}
		

