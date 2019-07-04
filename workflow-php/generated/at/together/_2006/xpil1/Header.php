<?php
	namespace at\together\_2006\xpil1;
		
	class Header extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.together.at/2006/XPIL1.0";
		const ROOT = "Header";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $SharkVersion = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $SharkRelease = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $SharkBuildId = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $XPILVersion = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $XPILVendor = null;
		/**
		 * @maxOccurs 1 
		 * @var \DateTime
		 */
		protected $CreationTime = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $XPILRequester = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $InstanceDescription = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["SharkVersion"] = array(
				"prop"=>"SharkVersion",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->SharkVersion
			);
			$this->_properties["SharkRelease"] = array(
				"prop"=>"SharkRelease",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->SharkRelease
			);
			$this->_properties["SharkBuildId"] = array(
				"prop"=>"SharkBuildId",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->SharkBuildId
			);
			$this->_properties["XPILVersion"] = array(
				"prop"=>"XPILVersion",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->XPILVersion
			);
			$this->_properties["XPILVendor"] = array(
				"prop"=>"XPILVendor",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->XPILVendor
			);
			$this->_properties["CreationTime"] = array(
				"prop"=>"CreationTime",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->CreationTime
			);
			$this->_properties["XPILRequester"] = array(
				"prop"=>"XPILRequester",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->XPILRequester
			);
			$this->_properties["InstanceDescription"] = array(
				"prop"=>"InstanceDescription",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->InstanceDescription
			);
		}
		/**
		 * @param \String $val
		 */
		public function setSharkVersion (  $val ) {
			$this->SharkVersion = $val;
			$this->_properties["SharkVersion"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setSharkRelease (  $val ) {
			$this->SharkRelease = $val;
			$this->_properties["SharkRelease"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setSharkBuildId (  $val ) {
			$this->SharkBuildId = $val;
			$this->_properties["SharkBuildId"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setXPILVersion (  $val ) {
			$this->XPILVersion = $val;
			$this->_properties["XPILVersion"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setXPILVendor (  $val ) {
			$this->XPILVendor = $val;
			$this->_properties["XPILVendor"]["text"] = $val;
		}
		/**
		 * @param \DateTime $val
		 */
		public function setCreationTime (  $val ) {
			$this->CreationTime = $val;
			$this->_properties["CreationTime"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setXPILRequester (  $val ) {
			$this->XPILRequester = $val;
			$this->_properties["XPILRequester"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setInstanceDescription (  $val ) {
			$this->InstanceDescription = $val;
			$this->_properties["InstanceDescription"]["text"] = $val;
		}
		/**
		 * @return \String
		 */
		public function getSharkVersion() {
			return $this->SharkVersion;
		}
		/**
		 * @return \String
		 */
		public function getSharkRelease() {
			return $this->SharkRelease;
		}
		/**
		 * @return \String
		 */
		public function getSharkBuildId() {
			return $this->SharkBuildId;
		}
		/**
		 * @return \String
		 */
		public function getXPILVersion() {
			return $this->XPILVersion;
		}
		/**
		 * @return \String
		 */
		public function getXPILVendor() {
			return $this->XPILVendor;
		}
		/**
		 * @return \DateTime
		 */
		public function getCreationTime() {
			return $this->CreationTime;
		}
		/**
		 * @return \String
		 */
		public function getXPILRequester() {
			return $this->XPILRequester;
		}
		/**
		 * @return \String
		 */
		public function getInstanceDescription() {
			return $this->InstanceDescription;
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
			if( ($prop = $this->getSharkVersion()) !== NULL ) {
				$xw->writeElementNS( NULL, 'SharkVersion', 'http://www.together.at/2006/XPIL1.0', $prop );
			}
			if( ($prop = $this->getSharkRelease()) !== NULL ) {
				$xw->writeElementNS( NULL, 'SharkRelease', 'http://www.together.at/2006/XPIL1.0', $prop );
			}
			if( ($prop = $this->getSharkBuildId()) !== NULL ) {
				$xw->writeElementNS( NULL, 'SharkBuildId', 'http://www.together.at/2006/XPIL1.0', $prop );
			}
			if( ($prop = $this->getXPILVersion()) !== NULL ) {
				$xw->writeElementNS( NULL, 'XPILVersion', 'http://www.together.at/2006/XPIL1.0', $prop );
			}
			if( ($prop = $this->getXPILVendor()) !== NULL ) {
				$xw->writeElementNS( NULL, 'XPILVendor', 'http://www.together.at/2006/XPIL1.0', $prop );
			}
			if( ($prop = $this->getCreationTime()) !== NULL ) {
				$xw->writeElementNS( NULL, 'CreationTime', 'http://www.together.at/2006/XPIL1.0', $prop );
			}
			if( ($prop = $this->getXPILRequester()) !== NULL ) {
				$xw->writeElementNS( NULL, 'XPILRequester', 'http://www.together.at/2006/XPIL1.0', $prop );
			}
			if( ($prop = $this->getInstanceDescription()) !== NULL ) {
				$xw->writeElementNS( NULL, 'InstanceDescription', 'http://www.together.at/2006/XPIL1.0', $prop );
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
				case "SharkVersion":
					$this->setSharkVersion( $xr->readString() );
					break;
				case "SharkRelease":
					$this->setSharkRelease( $xr->readString() );
					break;
				case "SharkBuildId":
					$this->setSharkBuildId( $xr->readString() );
					break;
				case "XPILVersion":
					$this->setXPILVersion( $xr->readString() );
					break;
				case "XPILVendor":
					$this->setXPILVendor( $xr->readString() );
					break;
				case "CreationTime":
					$this->setCreationTime( $xr->readString() );
					break;
				case "XPILRequester":
					$this->setXPILRequester( $xr->readString() );
					break;
				case "InstanceDescription":
					$this->setInstanceDescription( $xr->readString() );
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
			if(isset($props["SharkVersion"])) {
				$this->setSharkVersion($props["SharkVersion"]);
			}
			if(isset($props["SharkRelease"])) {
				$this->setSharkRelease($props["SharkRelease"]);
			}
			if(isset($props["SharkBuildId"])) {
				$this->setSharkBuildId($props["SharkBuildId"]);
			}
			if(isset($props["XPILVersion"])) {
				$this->setXPILVersion($props["XPILVersion"]);
			}
			if(isset($props["XPILVendor"])) {
				$this->setXPILVendor($props["XPILVendor"]);
			}
			if(isset($props["CreationTime"])) {
				$this->setCreationTime($props["CreationTime"]);
			}
			if(isset($props["XPILRequester"])) {
				$this->setXPILRequester($props["XPILRequester"]);
			}
			if(isset($props["InstanceDescription"])) {
				$this->setInstanceDescription($props["InstanceDescription"]);
			}
		}
		
	}
		

