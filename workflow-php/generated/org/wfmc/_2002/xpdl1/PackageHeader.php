<?php
	namespace org\wfmc\_2002\xpdl1;
		
	class PackageHeader extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.wfmc.org/2002/XPDL1.0";
		const ROOT = "PackageHeader";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $XPDLVersion = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Vendor = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Created = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Description = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Documentation = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $PriorityUnit = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $CostUnit = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["XPDLVersion"] = array(
				"prop"=>"XPDLVersion",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->XPDLVersion
			);
			$this->_properties["Vendor"] = array(
				"prop"=>"Vendor",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Vendor
			);
			$this->_properties["Created"] = array(
				"prop"=>"Created",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Created
			);
			$this->_properties["Description"] = array(
				"prop"=>"Description",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Description
			);
			$this->_properties["Documentation"] = array(
				"prop"=>"Documentation",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Documentation
			);
			$this->_properties["PriorityUnit"] = array(
				"prop"=>"PriorityUnit",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->PriorityUnit
			);
			$this->_properties["CostUnit"] = array(
				"prop"=>"CostUnit",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->CostUnit
			);
		}
		/**
		 * @param \String $val
		 */
		public function setXPDLVersion (  $val ) {
			$this->XPDLVersion = $val;
			$this->_properties["XPDLVersion"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setVendor (  $val ) {
			$this->Vendor = $val;
			$this->_properties["Vendor"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setCreated (  $val ) {
			$this->Created = $val;
			$this->_properties["Created"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setDescription (  $val ) {
			$this->Description = $val;
			$this->_properties["Description"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setDocumentation (  $val ) {
			$this->Documentation = $val;
			$this->_properties["Documentation"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setPriorityUnit (  $val ) {
			$this->PriorityUnit = $val;
			$this->_properties["PriorityUnit"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setCostUnit (  $val ) {
			$this->CostUnit = $val;
			$this->_properties["CostUnit"]["text"] = $val;
		}
		/**
		 * @return \String
		 */
		public function getXPDLVersion() {
			return $this->XPDLVersion;
		}
		/**
		 * @return \String
		 */
		public function getVendor() {
			return $this->Vendor;
		}
		/**
		 * @return \String
		 */
		public function getCreated() {
			return $this->Created;
		}
		/**
		 * @return \String
		 */
		public function getDescription() {
			return $this->Description;
		}
		/**
		 * @return \String
		 */
		public function getDocumentation() {
			return $this->Documentation;
		}
		/**
		 * @return \String
		 */
		public function getPriorityUnit() {
			return $this->PriorityUnit;
		}
		/**
		 * @return \String
		 */
		public function getCostUnit() {
			return $this->CostUnit;
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
			if( ($prop = $this->getXPDLVersion()) !== NULL ) {
				$xw->writeElementNS( NULL, 'XPDLVersion', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
			}
			if( ($prop = $this->getVendor()) !== NULL ) {
				$xw->writeElementNS( NULL, 'Vendor', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
			}
			if( ($prop = $this->getCreated()) !== NULL ) {
				$xw->writeElementNS( NULL, 'Created', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
			}
			if( ($prop = $this->getDescription()) !== NULL ) {
				$xw->writeElementNS( NULL, 'Description', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
			}
			if( ($prop = $this->getDocumentation()) !== NULL ) {
				$xw->writeElementNS( NULL, 'Documentation', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
			}
			if( ($prop = $this->getPriorityUnit()) !== NULL ) {
				$xw->writeElementNS( NULL, 'PriorityUnit', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
			}
			if( ($prop = $this->getCostUnit()) !== NULL ) {
				$xw->writeElementNS( NULL, 'CostUnit', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
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
				case "XPDLVersion":
					$this->setXPDLVersion( $xr->readString() );
					break;
				case "Vendor":
					$this->setVendor( $xr->readString() );
					break;
				case "Created":
					$this->setCreated( $xr->readString() );
					break;
				case "Description":
					$this->setDescription( $xr->readString() );
					break;
				case "Documentation":
					$this->setDocumentation( $xr->readString() );
					break;
				case "PriorityUnit":
					$this->setPriorityUnit( $xr->readString() );
					break;
				case "CostUnit":
					$this->setCostUnit( $xr->readString() );
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
			if(isset($props["XPDLVersion"])) {
				$this->setXPDLVersion($props["XPDLVersion"]);
			}
			if(isset($props["Vendor"])) {
				$this->setVendor($props["Vendor"]);
			}
			if(isset($props["Created"])) {
				$this->setCreated($props["Created"]);
			}
			if(isset($props["Description"])) {
				$this->setDescription($props["Description"]);
			}
			if(isset($props["Documentation"])) {
				$this->setDocumentation($props["Documentation"]);
			}
			if(isset($props["PriorityUnit"])) {
				$this->setPriorityUnit($props["PriorityUnit"]);
			}
			if(isset($props["CostUnit"])) {
				$this->setCostUnit($props["CostUnit"]);
			}
		}
		
	}
		

