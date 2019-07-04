<?php
	namespace at\together\_2006\xpil1;
		
	class ExecutionInstance extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.together.at/2006/XPIL1.0";
		const ROOT = "ExecutionInstance";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $InstanceDescription = null;
		/**
		 * @maxOccurs 1 
		 * @var \DateTime
		 */
		protected $InstanceLimit = null;
		/**
		 * @maxOccurs 1 
		 * @var \Int
		 */
		protected $InstancePriority = null;
		/**
		 * @maxOccurs 1 
		 * @var at\together\_2006\xpil1\DataInstances
		 */
		protected $DataInstances = null;
		/**
		 * @maxOccurs 1 
		 * @var at\together\_2006\xpil1\EventAudits
		 */
		protected $EventAudits = null;
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
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $DefinitionId = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Name = null;
		/**
		 * @maxOccurs 1 
		 * @var \NMTOKEN
		 */
		protected $State = null;
		/**
		 * @maxOccurs 1 
		 * @var \DateTime
		 */
		protected $Created = null;
		/**
		 * @maxOccurs 1 
		 * @var \DateTime
		 */
		protected $Started = null;
		/**
		 * @maxOccurs 1 
		 * @var \DateTime
		 */
		protected $Finished = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["InstanceDescription"] = array(
				"prop"=>"InstanceDescription",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->InstanceDescription
			);
			$this->_properties["InstanceLimit"] = array(
				"prop"=>"InstanceLimit",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->InstanceLimit
			);
			$this->_properties["InstancePriority"] = array(
				"prop"=>"InstancePriority",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->InstancePriority
			);
			$this->_properties["DataInstances"] = array(
				"prop"=>"DataInstances",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->DataInstances
			);
			$this->_properties["EventAudits"] = array(
				"prop"=>"EventAudits",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->EventAudits
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
			$this->_properties["DefinitionId"] = array(
				"prop"=>"DefinitionId",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->DefinitionId
			);
			$this->_properties["Name"] = array(
				"prop"=>"Name",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Name
			);
			$this->_properties["State"] = array(
				"prop"=>"State",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->State
			);
			$this->_properties["Created"] = array(
				"prop"=>"Created",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Created
			);
			$this->_properties["Started"] = array(
				"prop"=>"Started",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Started
			);
			$this->_properties["Finished"] = array(
				"prop"=>"Finished",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Finished
			);
		}
		/**
		 * @param \String $val
		 */
		public function setInstanceDescription (  $val ) {
			$this->InstanceDescription = $val;
			$this->_properties["InstanceDescription"]["text"] = $val;
		}
		/**
		 * @param \DateTime $val
		 */
		public function setInstanceLimit (  $val ) {
			$this->InstanceLimit = $val;
			$this->_properties["InstanceLimit"]["text"] = $val;
		}
		/**
		 * @param \Int $val
		 */
		public function setInstancePriority (  $val ) {
			$this->InstancePriority = $val;
			$this->_properties["InstancePriority"]["text"] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstances $val
		 */
		public function setDataInstances ( \at\together\_2006\xpil1\DataInstances $val ) {
			$this->DataInstances = $val;
			$this->_properties["DataInstances"]["text"] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\EventAudits $val
		 */
		public function setEventAudits ( \at\together\_2006\xpil1\EventAudits $val ) {
			$this->EventAudits = $val;
			$this->_properties["EventAudits"]["text"] = $val;
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
		 * @param \String $val
		 */
		public function setDefinitionId (  $val ) {
			$this->DefinitionId = $val;
			$this->_properties["DefinitionId"]["text"] = $val;
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
		public function setState (  $val ) {
			$this->State = $val;
			$this->_properties["State"]["text"] = $val;
		}
		/**
		 * @param \DateTime $val
		 */
		public function setCreated (  $val ) {
			$this->Created = $val;
			$this->_properties["Created"]["text"] = $val;
		}
		/**
		 * @param \DateTime $val
		 */
		public function setStarted (  $val ) {
			$this->Started = $val;
			$this->_properties["Started"]["text"] = $val;
		}
		/**
		 * @param \DateTime $val
		 */
		public function setFinished (  $val ) {
			$this->Finished = $val;
			$this->_properties["Finished"]["text"] = $val;
		}
		/**
		 * @return \String
		 */
		public function getInstanceDescription() {
			return $this->InstanceDescription;
		}
		/**
		 * @return \DateTime
		 */
		public function getInstanceLimit() {
			return $this->InstanceLimit;
		}
		/**
		 * @return \Int
		 */
		public function getInstancePriority() {
			return $this->InstancePriority;
		}
		/**
		 * @return at\together\_2006\xpil1\DataInstances
		 */
		public function getDataInstances() {
			return $this->DataInstances;
		}
		/**
		 * @return at\together\_2006\xpil1\EventAudits
		 */
		public function getEventAudits() {
			return $this->EventAudits;
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
		/**
		 * @return \String
		 */
		public function getDefinitionId() {
			return $this->DefinitionId;
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
		public function getState() {
			return $this->State;
		}
		/**
		 * @return \DateTime
		 */
		public function getCreated() {
			return $this->Created;
		}
		/**
		 * @return \DateTime
		 */
		public function getStarted() {
			return $this->Started;
		}
		/**
		 * @return \DateTime
		 */
		public function getFinished() {
			return $this->Finished;
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
			if( $prop = $this->getDefinitionId() ) $xw->writeAttribute( 'DefinitionId', $prop );
			if( $prop = $this->getName() ) $xw->writeAttribute( 'Name', $prop );
			if( $prop = $this->getState() ) $xw->writeAttribute( 'State', $prop );
			if( $prop = $this->getCreated() ) $xw->writeAttribute( 'Created', $prop );
			if( $prop = $this->getStarted() ) $xw->writeAttribute( 'Started', $prop );
			if( $prop = $this->getFinished() ) $xw->writeAttribute( 'Finished', $prop );
		}
		/**
		* Вывод элементов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function elementsToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::elementsToXmlWriter( $xw, $xmlname, $xmlns );
			if( ($prop = $this->getInstanceDescription()) !== NULL ) {
				$xw->writeElementNS( NULL, 'InstanceDescription', 'http://www.together.at/2006/XPIL1.0', $prop );
			}
			if( ($prop = $this->getInstanceLimit()) !== NULL ) {
				$xw->writeElementNS( NULL, 'InstanceLimit', 'http://www.together.at/2006/XPIL1.0', $prop );
			}
			if( ($prop = $this->getInstancePriority()) !== NULL ) {
				$xw->writeElementNS( NULL, 'InstancePriority', 'http://www.together.at/2006/XPIL1.0', $prop );
			}
			if( ($prop = $this->getDataInstances()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getEventAudits()) !== NULL ) {
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
			if( $attr = $xr->getAttribute( 'DefinitionId') ) {
			$this->_attributes['DefinitionId']['prop'] = 'DefinitionId';
			$this->setDefinitionId( $attr ); 
		}
			if( $attr = $xr->getAttribute( 'Name') ) {
			$this->_attributes['Name']['prop'] = 'Name';
			$this->setName( $attr ); 
		}
			if( $attr = $xr->getAttribute( 'State') ) {
			$this->_attributes['State']['prop'] = 'State';
			$this->setState( $attr ); 
		}
			if( $attr = $xr->getAttribute( 'Created') ) {
			$this->_attributes['Created']['prop'] = 'Created';
			$this->setCreated( $attr ); 
		}
			if( $attr = $xr->getAttribute( 'Started') ) {
			$this->_attributes['Started']['prop'] = 'Started';
			$this->setStarted( $attr ); 
		}
			if( $attr = $xr->getAttribute( 'Finished') ) {
			$this->_attributes['Finished']['prop'] = 'Finished';
			$this->setFinished( $attr ); 
		}
			parent::attributesFromXmlReader( $xr );	
		}
				
		/**
		 * Чтение элементов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function elementsFromXmlReader ( \XMLReader &$xr ) {
			switch ( $xr->localName ) {
				case "InstanceDescription":
					$this->setInstanceDescription( $xr->readString() );
					break;
				case "InstanceLimit":
					$this->setInstanceLimit( $xr->readString() );
					break;
				case "InstancePriority":
					$this->setInstancePriority( $xr->readString() );
					break;
				case "DataInstances":
					$DataInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DataInstances");
					$this->setDataInstances( $DataInstances->fromXmlReader( $xr ) );
					break;
				case "EventAudits":
					$EventAudits = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\EventAudits");
					$this->setEventAudits( $EventAudits->fromXmlReader( $xr ) );
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
			if(isset($props["InstanceDescription"])) {
				$this->setInstanceDescription($props["InstanceDescription"]);
			}
			if(isset($props["InstanceLimit"])) {
				$this->setInstanceLimit($props["InstanceLimit"]);
			}
			if(isset($props["InstancePriority"])) {
				$this->setInstancePriority($props["InstancePriority"]);
			}
			if(isset($props["DataInstances"])) {
				$DataInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DataInstances");
				$DataInstances->fromJSON($props["DataInstances"]);
				$this->setDataInstances($DataInstances);
			}
			if(isset($props["EventAudits"])) {
				$EventAudits = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\EventAudits");
				$EventAudits->fromJSON($props["EventAudits"]);
				$this->setEventAudits($EventAudits);
			}
			if(isset($props["InstanceExtendedAttributes"])) {
				$InstanceExtendedAttributes = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\InstanceExtendedAttributes");
				$InstanceExtendedAttributes->fromJSON($props["InstanceExtendedAttributes"]);
				$this->setInstanceExtendedAttributes($InstanceExtendedAttributes);
			}
			if(isset($props["Id"])) {
				$this->setId($props["Id"]);
			}
			if(isset($props["DefinitionId"])) {
				$this->setDefinitionId($props["DefinitionId"]);
			}
			if(isset($props["Name"])) {
				$this->setName($props["Name"]);
			}
			if(isset($props["State"])) {
				$this->setState($props["State"]);
			}
			if(isset($props["Created"])) {
				$this->setCreated($props["Created"]);
			}
			if(isset($props["Started"])) {
				$this->setStarted($props["Started"]);
			}
			if(isset($props["Finished"])) {
				$this->setFinished($props["Finished"]);
			}
		}
		
	}
		

