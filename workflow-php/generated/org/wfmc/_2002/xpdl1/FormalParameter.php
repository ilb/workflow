<?php
	namespace org\wfmc\_2002\xpdl1;
		
	class FormalParameter extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.wfmc.org/2002/XPDL1.0";
		const ROOT = "FormalParameter";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\DataType
		 */
		protected $DataType = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Description = null;
		/**
		 * @maxOccurs 1 
		 * @var \NMTOKEN
		 */
		protected $Id = null;
		/**
		 * @maxOccurs 1 
		 * @var \NMTOKEN
		 */
		protected $Index = null;
		/**
		 * @maxOccurs 1 
		 * @var \NMTOKEN
		 */
		protected $Mode = "IN";
		public function __construct() {
			parent::__construct();
			
			$this->_properties["DataType"] = array(
				"prop"=>"DataType",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->DataType
			);
			$this->_properties["Description"] = array(
				"prop"=>"Description",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Description
			);
			$this->_properties["Id"] = array(
				"prop"=>"Id",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Id
			);
			$this->_properties["Index"] = array(
				"prop"=>"Index",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Index
			);
			$this->_properties["Mode"] = array(
				"prop"=>"Mode",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Mode
			);
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\DataType $val
		 */
		public function setDataType ( \org\wfmc\_2002\xpdl1\DataType $val ) {
			$this->DataType = $val;
			$this->_properties["DataType"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setDescription (  $val ) {
			$this->Description = $val;
			$this->_properties["Description"]["text"] = $val;
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
		public function setIndex (  $val ) {
			$this->Index = $val;
			$this->_properties["Index"]["text"] = $val;
		}
		/**
		 * @param \NMTOKEN $val
		 */
		public function setMode (  $val ) {
			$this->Mode = $val;
			$this->_properties["Mode"]["text"] = $val;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\DataType
		 */
		public function getDataType() {
			return $this->DataType;
		}
		/**
		 * @return \String
		 */
		public function getDescription() {
			return $this->Description;
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
		public function getIndex() {
			return $this->Index;
		}
		/**
		 * @return \NMTOKEN
		 */
		public function getMode() {
			return $this->Mode;
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
			if( $prop = $this->getIndex() ) $xw->writeAttribute( 'Index', $prop );
			if( $prop = $this->getMode() ) $xw->writeAttribute( 'Mode', $prop );
		}
		/**
		* Вывод элементов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function elementsToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::elementsToXmlWriter( $xw, $xmlname, $xmlns );
			if( ($prop = $this->getDataType()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getDescription()) !== NULL ) {
				$xw->writeElementNS( NULL, 'Description', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
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
			if( $attr = $xr->getAttribute( 'Index') ) {
			$this->_attributes['Index']['prop'] = 'Index';
			$this->setIndex( $attr ); 
		}
			if( $attr = $xr->getAttribute( 'Mode') ) {
			$this->_attributes['Mode']['prop'] = 'Mode';
			$this->setMode( $attr ); 
		}
			parent::attributesFromXmlReader( $xr );	
		}
				
		/**
		 * Чтение элементов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function elementsFromXmlReader ( \XMLReader &$xr ) {
			switch ( $xr->localName ) {
				case "DataType":
					$DataType = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\DataType");
					$this->setDataType( $DataType->fromXmlReader( $xr ) );
					break;
				case "Description":
					$this->setDescription( $xr->readString() );
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
			if(isset($props["DataType"])) {
				$DataType = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\DataType");
				$DataType->fromJSON($props["DataType"]);
				$this->setDataType($DataType);
			}
			if(isset($props["Description"])) {
				$this->setDescription($props["Description"]);
			}
			if(isset($props["Id"])) {
				$this->setId($props["Id"]);
			}
			if(isset($props["Index"])) {
				$this->setIndex($props["Index"]);
			}
			if(isset($props["Mode"])) {
				$this->setMode($props["Mode"]);
			}
		}
		
	}
		

