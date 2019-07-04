<?php
	namespace org\wfmc\_2002\xpdl1;
		
	class WorkflowProcess extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.wfmc.org/2002/XPDL1.0";
		const ROOT = "WorkflowProcess";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\ProcessHeader
		 */
		protected $ProcessHeader = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\RedefinableHeader
		 */
		protected $RedefinableHeader = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\FormalParameters
		 */
		protected $FormalParameters = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\DataFields
		 */
		protected $DataFields = null;
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
		 * @var org\wfmc\_2002\xpdl1\ActivitySets
		 */
		protected $ActivitySets = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\Activities
		 */
		protected $Activities = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\Transitions
		 */
		protected $Transitions = null;
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
		/**
		 * @maxOccurs 1 
		 * @var \NMTOKEN
		 */
		protected $AccessLevel = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["ProcessHeader"] = array(
				"prop"=>"ProcessHeader",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->ProcessHeader
			);
			$this->_properties["RedefinableHeader"] = array(
				"prop"=>"RedefinableHeader",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->RedefinableHeader
			);
			$this->_properties["FormalParameters"] = array(
				"prop"=>"FormalParameters",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->FormalParameters
			);
			$this->_properties["DataFields"] = array(
				"prop"=>"DataFields",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->DataFields
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
			$this->_properties["ActivitySets"] = array(
				"prop"=>"ActivitySets",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->ActivitySets
			);
			$this->_properties["Activities"] = array(
				"prop"=>"Activities",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Activities
			);
			$this->_properties["Transitions"] = array(
				"prop"=>"Transitions",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Transitions
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
			$this->_properties["AccessLevel"] = array(
				"prop"=>"AccessLevel",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->AccessLevel
			);
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\ProcessHeader $val
		 */
		public function setProcessHeader ( \org\wfmc\_2002\xpdl1\ProcessHeader $val ) {
			$this->ProcessHeader = $val;
			$this->_properties["ProcessHeader"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\RedefinableHeader $val
		 */
		public function setRedefinableHeader ( \org\wfmc\_2002\xpdl1\RedefinableHeader $val ) {
			$this->RedefinableHeader = $val;
			$this->_properties["RedefinableHeader"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\FormalParameters $val
		 */
		public function setFormalParameters ( \org\wfmc\_2002\xpdl1\FormalParameters $val ) {
			$this->FormalParameters = $val;
			$this->_properties["FormalParameters"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\DataFields $val
		 */
		public function setDataFields ( \org\wfmc\_2002\xpdl1\DataFields $val ) {
			$this->DataFields = $val;
			$this->_properties["DataFields"]["text"] = $val;
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
		 * @param org\wfmc\_2002\xpdl1\ActivitySets $val
		 */
		public function setActivitySets ( \org\wfmc\_2002\xpdl1\ActivitySets $val ) {
			$this->ActivitySets = $val;
			$this->_properties["ActivitySets"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\Activities $val
		 */
		public function setActivities ( \org\wfmc\_2002\xpdl1\Activities $val ) {
			$this->Activities = $val;
			$this->_properties["Activities"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\Transitions $val
		 */
		public function setTransitions ( \org\wfmc\_2002\xpdl1\Transitions $val ) {
			$this->Transitions = $val;
			$this->_properties["Transitions"]["text"] = $val;
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
		 * @param \NMTOKEN $val
		 */
		public function setAccessLevel (  $val ) {
			$this->AccessLevel = $val;
			$this->_properties["AccessLevel"]["text"] = $val;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\ProcessHeader
		 */
		public function getProcessHeader() {
			return $this->ProcessHeader;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\RedefinableHeader
		 */
		public function getRedefinableHeader() {
			return $this->RedefinableHeader;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\FormalParameters
		 */
		public function getFormalParameters() {
			return $this->FormalParameters;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\DataFields
		 */
		public function getDataFields() {
			return $this->DataFields;
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
		 * @return org\wfmc\_2002\xpdl1\ActivitySets
		 */
		public function getActivitySets() {
			return $this->ActivitySets;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\Activities
		 */
		public function getActivities() {
			return $this->Activities;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\Transitions
		 */
		public function getTransitions() {
			return $this->Transitions;
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
		/**
		 * @return \NMTOKEN
		 */
		public function getAccessLevel() {
			return $this->AccessLevel;
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
			if( $prop = $this->getAccessLevel() ) $xw->writeAttribute( 'AccessLevel', $prop );
		}
		/**
		* Вывод элементов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function elementsToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::elementsToXmlWriter( $xw, $xmlname, $xmlns );
			if( ($prop = $this->getProcessHeader()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getRedefinableHeader()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getFormalParameters()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getDataFields()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getParticipants()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getApplications()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getActivitySets()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getActivities()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getTransitions()) !== NULL ) {
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
			if( $attr = $xr->getAttribute( 'AccessLevel') ) {
			$this->_attributes['AccessLevel']['prop'] = 'AccessLevel';
			$this->setAccessLevel( $attr ); 
		}
			parent::attributesFromXmlReader( $xr );	
		}
				
		/**
		 * Чтение элементов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function elementsFromXmlReader ( \XMLReader &$xr ) {
			switch ( $xr->localName ) {
				case "ProcessHeader":
					$ProcessHeader = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ProcessHeader");
					$this->setProcessHeader( $ProcessHeader->fromXmlReader( $xr ) );
					break;
				case "RedefinableHeader":
					$RedefinableHeader = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\RedefinableHeader");
					$this->setRedefinableHeader( $RedefinableHeader->fromXmlReader( $xr ) );
					break;
				case "FormalParameters":
					$FormalParameters = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\FormalParameters");
					$this->setFormalParameters( $FormalParameters->fromXmlReader( $xr ) );
					break;
				case "DataFields":
					$DataFields = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\DataFields");
					$this->setDataFields( $DataFields->fromXmlReader( $xr ) );
					break;
				case "Participants":
					$Participants = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Participants");
					$this->setParticipants( $Participants->fromXmlReader( $xr ) );
					break;
				case "Applications":
					$Applications = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Applications");
					$this->setApplications( $Applications->fromXmlReader( $xr ) );
					break;
				case "ActivitySets":
					$ActivitySets = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ActivitySets");
					$this->setActivitySets( $ActivitySets->fromXmlReader( $xr ) );
					break;
				case "Activities":
					$Activities = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Activities");
					$this->setActivities( $Activities->fromXmlReader( $xr ) );
					break;
				case "Transitions":
					$Transitions = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Transitions");
					$this->setTransitions( $Transitions->fromXmlReader( $xr ) );
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
			if(isset($props["ProcessHeader"])) {
				$ProcessHeader = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ProcessHeader");
				$ProcessHeader->fromJSON($props["ProcessHeader"]);
				$this->setProcessHeader($ProcessHeader);
			}
			if(isset($props["RedefinableHeader"])) {
				$RedefinableHeader = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\RedefinableHeader");
				$RedefinableHeader->fromJSON($props["RedefinableHeader"]);
				$this->setRedefinableHeader($RedefinableHeader);
			}
			if(isset($props["FormalParameters"])) {
				$FormalParameters = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\FormalParameters");
				$FormalParameters->fromJSON($props["FormalParameters"]);
				$this->setFormalParameters($FormalParameters);
			}
			if(isset($props["DataFields"])) {
				$DataFields = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\DataFields");
				$DataFields->fromJSON($props["DataFields"]);
				$this->setDataFields($DataFields);
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
			if(isset($props["ActivitySets"])) {
				$ActivitySets = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ActivitySets");
				$ActivitySets->fromJSON($props["ActivitySets"]);
				$this->setActivitySets($ActivitySets);
			}
			if(isset($props["Activities"])) {
				$Activities = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Activities");
				$Activities->fromJSON($props["Activities"]);
				$this->setActivities($Activities);
			}
			if(isset($props["Transitions"])) {
				$Transitions = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Transitions");
				$Transitions->fromJSON($props["Transitions"]);
				$this->setTransitions($Transitions);
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
			if(isset($props["AccessLevel"])) {
				$this->setAccessLevel($props["AccessLevel"]);
			}
		}
		
	}
		

