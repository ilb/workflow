<?php
	namespace org\wfmc\_2002\xpdl1;
		
	class Package extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.wfmc.org/2002/XPDL1.0";
		const ROOT = "Package";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\PackageHeader
		 */
		protected $PackageHeader = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\RedefinableHeader
		 */
		protected $RedefinableHeader = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\ConformanceClass
		 */
		protected $ConformanceClass = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\Script
		 */
		protected $Script = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\ExternalPackages
		 */
		protected $ExternalPackages = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\TypeDeclarations
		 */
		protected $TypeDeclarations = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\Participants
		 */
		protected $Participants = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\Applications
		 */
		protected $Applications = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\DataFields
		 */
		protected $DataFields = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\WorkflowProcesses
		 */
		protected $WorkflowProcesses = null;
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
		 * @var \String
		 */
		protected $Name = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["PackageHeader"] = array(
				"prop"=>"PackageHeader",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->PackageHeader
			);
			$this->_properties["RedefinableHeader"] = array(
				"prop"=>"RedefinableHeader",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->RedefinableHeader
			);
			$this->_properties["ConformanceClass"] = array(
				"prop"=>"ConformanceClass",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->ConformanceClass
			);
			$this->_properties["Script"] = array(
				"prop"=>"Script",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Script
			);
			$this->_properties["ExternalPackages"] = array(
				"prop"=>"ExternalPackages",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->ExternalPackages
			);
			$this->_properties["TypeDeclarations"] = array(
				"prop"=>"TypeDeclarations",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->TypeDeclarations
			);
			$this->_properties["Participants"] = array(
				"prop"=>"Participants",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Participants
			);
			$this->_properties["Applications"] = array(
				"prop"=>"Applications",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Applications
			);
			$this->_properties["DataFields"] = array(
				"prop"=>"DataFields",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->DataFields
			);
			$this->_properties["WorkflowProcesses"] = array(
				"prop"=>"WorkflowProcesses",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->WorkflowProcesses
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
			$this->_properties["Name"] = array(
				"prop"=>"Name",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Name
			);
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\PackageHeader $val
		 */
		public function setPackageHeader ( \org\wfmc\_2002\xpdl1\PackageHeader $val ) {
			$this->PackageHeader = $val;
			$this->_properties["PackageHeader"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\RedefinableHeader $val
		 */
		public function setRedefinableHeader ( \org\wfmc\_2002\xpdl1\RedefinableHeader $val ) {
			$this->RedefinableHeader = $val;
			$this->_properties["RedefinableHeader"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\ConformanceClass $val
		 */
		public function setConformanceClass ( \org\wfmc\_2002\xpdl1\ConformanceClass $val ) {
			$this->ConformanceClass = $val;
			$this->_properties["ConformanceClass"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\Script $val
		 */
		public function setScript ( \org\wfmc\_2002\xpdl1\Script $val ) {
			$this->Script = $val;
			$this->_properties["Script"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\ExternalPackages $val
		 */
		public function setExternalPackages ( \org\wfmc\_2002\xpdl1\ExternalPackages $val ) {
			$this->ExternalPackages = $val;
			$this->_properties["ExternalPackages"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\TypeDeclarations $val
		 */
		public function setTypeDeclarations ( \org\wfmc\_2002\xpdl1\TypeDeclarations $val ) {
			$this->TypeDeclarations = $val;
			$this->_properties["TypeDeclarations"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\Participants $val
		 */
		public function setParticipants ( \org\wfmc\_2002\xpdl1\Participants $val ) {
			$this->Participants = $val;
			$this->_properties["Participants"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\Applications $val
		 */
		public function setApplications ( \org\wfmc\_2002\xpdl1\Applications $val ) {
			$this->Applications = $val;
			$this->_properties["Applications"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\DataFields $val
		 */
		public function setDataFields ( \org\wfmc\_2002\xpdl1\DataFields $val ) {
			$this->DataFields = $val;
			$this->_properties["DataFields"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\WorkflowProcesses $val
		 */
		public function setWorkflowProcesses ( \org\wfmc\_2002\xpdl1\WorkflowProcesses $val ) {
			$this->WorkflowProcesses = $val;
			$this->_properties["WorkflowProcesses"]["text"] = $val;
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
		 * @param \String $val
		 */
		public function setName (  $val ) {
			$this->Name = $val;
			$this->_properties["Name"]["text"] = $val;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\PackageHeader
		 */
		public function getPackageHeader() {
			return $this->PackageHeader;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\RedefinableHeader
		 */
		public function getRedefinableHeader() {
			return $this->RedefinableHeader;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\ConformanceClass
		 */
		public function getConformanceClass() {
			return $this->ConformanceClass;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\Script
		 */
		public function getScript() {
			return $this->Script;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\ExternalPackages
		 */
		public function getExternalPackages() {
			return $this->ExternalPackages;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\TypeDeclarations
		 */
		public function getTypeDeclarations() {
			return $this->TypeDeclarations;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\Participants
		 */
		public function getParticipants() {
			return $this->Participants;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\Applications
		 */
		public function getApplications() {
			return $this->Applications;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\DataFields
		 */
		public function getDataFields() {
			return $this->DataFields;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\WorkflowProcesses
		 */
		public function getWorkflowProcesses() {
			return $this->WorkflowProcesses;
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
			if( ($prop = $this->getPackageHeader()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getRedefinableHeader()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getConformanceClass()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getScript()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getExternalPackages()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getTypeDeclarations()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getParticipants()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getApplications()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getDataFields()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getWorkflowProcesses()) !== NULL ) {
					$prop->toXmlWriter( $xw );
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
				case "PackageHeader":
					$PackageHeader = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\PackageHeader");
					$this->setPackageHeader( $PackageHeader->fromXmlReader( $xr ) );
					break;
				case "RedefinableHeader":
					$RedefinableHeader = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\RedefinableHeader");
					$this->setRedefinableHeader( $RedefinableHeader->fromXmlReader( $xr ) );
					break;
				case "ConformanceClass":
					$ConformanceClass = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ConformanceClass");
					$this->setConformanceClass( $ConformanceClass->fromXmlReader( $xr ) );
					break;
				case "Script":
					$Script = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Script");
					$this->setScript( $Script->fromXmlReader( $xr ) );
					break;
				case "ExternalPackages":
					$ExternalPackages = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ExternalPackages");
					$this->setExternalPackages( $ExternalPackages->fromXmlReader( $xr ) );
					break;
				case "TypeDeclarations":
					$TypeDeclarations = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\TypeDeclarations");
					$this->setTypeDeclarations( $TypeDeclarations->fromXmlReader( $xr ) );
					break;
				case "Participants":
					$Participants = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Participants");
					$this->setParticipants( $Participants->fromXmlReader( $xr ) );
					break;
				case "Applications":
					$Applications = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Applications");
					$this->setApplications( $Applications->fromXmlReader( $xr ) );
					break;
				case "DataFields":
					$DataFields = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\DataFields");
					$this->setDataFields( $DataFields->fromXmlReader( $xr ) );
					break;
				case "WorkflowProcesses":
					$WorkflowProcesses = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\WorkflowProcesses");
					$this->setWorkflowProcesses( $WorkflowProcesses->fromXmlReader( $xr ) );
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
			if(isset($props["PackageHeader"])) {
				$PackageHeader = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\PackageHeader");
				$PackageHeader->fromJSON($props["PackageHeader"]);
				$this->setPackageHeader($PackageHeader);
			}
			if(isset($props["RedefinableHeader"])) {
				$RedefinableHeader = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\RedefinableHeader");
				$RedefinableHeader->fromJSON($props["RedefinableHeader"]);
				$this->setRedefinableHeader($RedefinableHeader);
			}
			if(isset($props["ConformanceClass"])) {
				$ConformanceClass = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ConformanceClass");
				$ConformanceClass->fromJSON($props["ConformanceClass"]);
				$this->setConformanceClass($ConformanceClass);
			}
			if(isset($props["Script"])) {
				$Script = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Script");
				$Script->fromJSON($props["Script"]);
				$this->setScript($Script);
			}
			if(isset($props["ExternalPackages"])) {
				$ExternalPackages = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ExternalPackages");
				$ExternalPackages->fromJSON($props["ExternalPackages"]);
				$this->setExternalPackages($ExternalPackages);
			}
			if(isset($props["TypeDeclarations"])) {
				$TypeDeclarations = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\TypeDeclarations");
				$TypeDeclarations->fromJSON($props["TypeDeclarations"]);
				$this->setTypeDeclarations($TypeDeclarations);
			}
			if(isset($props["Participants"])) {
				$Participants = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Participants");
				$Participants->fromJSON($props["Participants"]);
				$this->setParticipants($Participants);
			}
			if(isset($props["Applications"])) {
				$Applications = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Applications");
				$Applications->fromJSON($props["Applications"]);
				$this->setApplications($Applications);
			}
			if(isset($props["DataFields"])) {
				$DataFields = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\DataFields");
				$DataFields->fromJSON($props["DataFields"]);
				$this->setDataFields($DataFields);
			}
			if(isset($props["WorkflowProcesses"])) {
				$WorkflowProcesses = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\WorkflowProcesses");
				$WorkflowProcesses->fromJSON($props["WorkflowProcesses"]);
				$this->setWorkflowProcesses($WorkflowProcesses);
			}
			if(isset($props["ExtendedAttributes"])) {
				$ExtendedAttributes = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ExtendedAttributes");
				$ExtendedAttributes->fromJSON($props["ExtendedAttributes"]);
				$this->setExtendedAttributes($ExtendedAttributes);
			}
			if(isset($props["Id"])) {
				$this->setId($props["Id"]);
			}
			if(isset($props["Name"])) {
				$this->setName($props["Name"]);
			}
		}
		
	}
		

