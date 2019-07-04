<?php
	namespace at\together\_2006\xpil1;
		
	class WorkflowFacilityInstance extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.together.at/2006/XPIL1.0";
		const ROOT = "WorkflowFacilityInstance";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var at\together\_2006\xpil1\Header
		 */
		protected $Header = null;
		/**
		 * @maxOccurs 1 
		 * @var at\together\_2006\xpil1\Users
		 */
		protected $Users = null;
		/**
		 * @maxOccurs 1 
		 * @var at\together\_2006\xpil1\PackageInstances
		 */
		protected $PackageInstances = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Id = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Name = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["Header"] = array(
				"prop"=>"Header",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Header
			);
			$this->_properties["Users"] = array(
				"prop"=>"Users",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Users
			);
			$this->_properties["PackageInstances"] = array(
				"prop"=>"PackageInstances",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->PackageInstances
			);
			$this->_properties["Id"] = array(
				"prop"=>"Id",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Id
			);
			$this->_properties["Name"] = array(
				"prop"=>"Name",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Name
			);
		}
		/**
		 * @param at\together\_2006\xpil1\Header $val
		 */
		public function setHeader ( \at\together\_2006\xpil1\Header $val ) {
			$this->Header = $val;
			$this->_properties["Header"]["text"] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\Users $val
		 */
		public function setUsers ( \at\together\_2006\xpil1\Users $val ) {
			$this->Users = $val;
			$this->_properties["Users"]["text"] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\PackageInstances $val
		 */
		public function setPackageInstances ( \at\together\_2006\xpil1\PackageInstances $val ) {
			$this->PackageInstances = $val;
			$this->_properties["PackageInstances"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setId (  $val ) {
			$this->Id = $val;
			$this->_properties["Id"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setName (  $val ) {
			$this->Name = $val;
			$this->_properties["Name"]["text"] = $val;
		}
		/**
		 * @return at\together\_2006\xpil1\Header
		 */
		public function getHeader() {
			return $this->Header;
		}
		/**
		 * @return at\together\_2006\xpil1\Users
		 */
		public function getUsers() {
			return $this->Users;
		}
		/**
		 * @return at\together\_2006\xpil1\PackageInstances
		 */
		public function getPackageInstances() {
			return $this->PackageInstances;
		}
		/**
		 * @return \String
		 */
		public function getId() {
			return $this->Id;
		}
		/**
		 * @return \String
		 */
		public function getName() {
			return $this->Name;
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
			if( $prop = $this->getName() ) $xw->writeAttribute( 'Name', $prop );
		}
		/**
		* Вывод элементов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function elementsToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::elementsToXmlWriter( $xw, $xmlname, $xmlns );
			if( ($prop = $this->getHeader()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getUsers()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getPackageInstances()) !== NULL ) {
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
			if( $attr = $xr->getAttribute( 'Name') ) {
			$this->_attributes['Name']['prop'] = 'Name';
			$this->setName( $attr ); 
		}
			parent::attributesFromXmlReader( $xr );	
		}
				
		/**
		 * Чтение элементов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function elementsFromXmlReader ( \XMLReader &$xr ) {
			switch ( $xr->localName ) {
				case "Header":
					$Header = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\Header");
					$this->setHeader( $Header->fromXmlReader( $xr ) );
					break;
				case "Users":
					$Users = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\Users");
					$this->setUsers( $Users->fromXmlReader( $xr ) );
					break;
				case "PackageInstances":
					$PackageInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\PackageInstances");
					$this->setPackageInstances( $PackageInstances->fromXmlReader( $xr ) );
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
			if(isset($props["Header"])) {
				$Header = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\Header");
				$Header->fromJSON($props["Header"]);
				$this->setHeader($Header);
			}
			if(isset($props["Users"])) {
				$Users = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\Users");
				$Users->fromJSON($props["Users"]);
				$this->setUsers($Users);
			}
			if(isset($props["PackageInstances"])) {
				$PackageInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\PackageInstances");
				$PackageInstances->fromJSON($props["PackageInstances"]);
				$this->setPackageInstances($PackageInstances);
			}
			if(isset($props["Id"])) {
				$this->setId($props["Id"]);
			}
			if(isset($props["Name"])) {
				$this->setName($props["Name"]);
			}
		}
		
	}
		

