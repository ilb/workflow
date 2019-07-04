<?php
	namespace at\together\_2006\xpil1;
		
	class WorkflowProcessFactoryInstance extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.together.at/2006/XPIL1.0";
		const ROOT = "WorkflowProcessFactoryInstance";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var at\together\_2006\xpil1\ContextSignature
		 */
		protected $ContextSignature = null;
		/**
		 * @maxOccurs 1 
		 * @var at\together\_2006\xpil1\WorkflowProcessInstances
		 */
		protected $WorkflowProcessInstances = null;
		/**
		 * @maxOccurs 1 
		 * @var at\together\_2006\xpil1\InstanceExtendedAttributes
		 */
		protected $InstanceExtendedAttributes = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\WorkflowProcess
		 */
		protected $WorkflowProcess = null;
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
		 * @var \NMTOKEN
		 */
		protected $State = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Version = null;
		/**
		 * @maxOccurs 1 
		 * @var \DateTime
		 */
		protected $Created = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["ContextSignature"] = array(
				"prop"=>"ContextSignature",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->ContextSignature
			);
			$this->_properties["WorkflowProcessInstances"] = array(
				"prop"=>"WorkflowProcessInstances",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->WorkflowProcessInstances
			);
			$this->_properties["InstanceExtendedAttributes"] = array(
				"prop"=>"InstanceExtendedAttributes",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->InstanceExtendedAttributes
			);
			$this->_properties["WorkflowProcess"] = array(
				"prop"=>"WorkflowProcess",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->WorkflowProcess
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
			$this->_properties["State"] = array(
				"prop"=>"State",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->State
			);
			$this->_properties["Version"] = array(
				"prop"=>"Version",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Version
			);
			$this->_properties["Created"] = array(
				"prop"=>"Created",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Created
			);
		}
		/**
		 * @param at\together\_2006\xpil1\ContextSignature $val
		 */
		public function setContextSignature ( \at\together\_2006\xpil1\ContextSignature $val ) {
			$this->ContextSignature = $val;
			$this->_properties["ContextSignature"]["text"] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\WorkflowProcessInstances $val
		 */
		public function setWorkflowProcessInstances ( \at\together\_2006\xpil1\WorkflowProcessInstances $val ) {
			$this->WorkflowProcessInstances = $val;
			$this->_properties["WorkflowProcessInstances"]["text"] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\InstanceExtendedAttributes $val
		 */
		public function setInstanceExtendedAttributes ( \at\together\_2006\xpil1\InstanceExtendedAttributes $val ) {
			$this->InstanceExtendedAttributes = $val;
			$this->_properties["InstanceExtendedAttributes"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\WorkflowProcess $val
		 */
		public function setWorkflowProcess ( \org\wfmc\_2002\xpdl1\WorkflowProcess $val ) {
			$this->WorkflowProcess = $val;
			$this->_properties["WorkflowProcess"]["text"] = $val;
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
		 * @param \NMTOKEN $val
		 */
		public function setState (  $val ) {
			$this->State = $val;
			$this->_properties["State"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setVersion (  $val ) {
			$this->Version = $val;
			$this->_properties["Version"]["text"] = $val;
		}
		/**
		 * @param \DateTime $val
		 */
		public function setCreated (  $val ) {
			$this->Created = $val;
			$this->_properties["Created"]["text"] = $val;
		}
		/**
		 * @return at\together\_2006\xpil1\ContextSignature
		 */
		public function getContextSignature() {
			return $this->ContextSignature;
		}
		/**
		 * @return at\together\_2006\xpil1\WorkflowProcessInstances
		 */
		public function getWorkflowProcessInstances() {
			return $this->WorkflowProcessInstances;
		}
		/**
		 * @return at\together\_2006\xpil1\InstanceExtendedAttributes
		 */
		public function getInstanceExtendedAttributes() {
			return $this->InstanceExtendedAttributes;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\WorkflowProcess
		 */
		public function getWorkflowProcess() {
			return $this->WorkflowProcess;
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
		 * @return \NMTOKEN
		 */
		public function getState() {
			return $this->State;
		}
		/**
		 * @return \String
		 */
		public function getVersion() {
			return $this->Version;
		}
		/**
		 * @return \DateTime
		 */
		public function getCreated() {
			return $this->Created;
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
			if( $prop = $this->getState() ) $xw->writeAttribute( 'State', $prop );
			if( $prop = $this->getVersion() ) $xw->writeAttribute( 'Version', $prop );
			if( $prop = $this->getCreated() ) $xw->writeAttribute( 'Created', $prop );
		}
		/**
		* Вывод элементов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function elementsToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::elementsToXmlWriter( $xw, $xmlname, $xmlns );
			if( ($prop = $this->getContextSignature()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getWorkflowProcessInstances()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getInstanceExtendedAttributes()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getWorkflowProcess()) !== NULL ) {
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
			if( $attr = $xr->getAttribute( 'State') ) {
			$this->_attributes['State']['prop'] = 'State';
			$this->setState( $attr ); 
		}
			if( $attr = $xr->getAttribute( 'Version') ) {
			$this->_attributes['Version']['prop'] = 'Version';
			$this->setVersion( $attr ); 
		}
			if( $attr = $xr->getAttribute( 'Created') ) {
			$this->_attributes['Created']['prop'] = 'Created';
			$this->setCreated( $attr ); 
		}
			parent::attributesFromXmlReader( $xr );	
		}
				
		/**
		 * Чтение элементов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function elementsFromXmlReader ( \XMLReader &$xr ) {
			switch ( $xr->localName ) {
				case "ContextSignature":
					$ContextSignature = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\ContextSignature");
					$this->setContextSignature( $ContextSignature->fromXmlReader( $xr ) );
					break;
				case "WorkflowProcessInstances":
					$WorkflowProcessInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\WorkflowProcessInstances");
					$this->setWorkflowProcessInstances( $WorkflowProcessInstances->fromXmlReader( $xr ) );
					break;
				case "InstanceExtendedAttributes":
					$InstanceExtendedAttributes = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\InstanceExtendedAttributes");
					$this->setInstanceExtendedAttributes( $InstanceExtendedAttributes->fromXmlReader( $xr ) );
					break;
				case "WorkflowProcess":
					$WorkflowProcess = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\WorkflowProcess");
					$this->setWorkflowProcess( $WorkflowProcess->fromXmlReader( $xr ) );
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
			if(isset($props["ContextSignature"])) {
				$ContextSignature = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\ContextSignature");
				$ContextSignature->fromJSON($props["ContextSignature"]);
				$this->setContextSignature($ContextSignature);
			}
			if(isset($props["WorkflowProcessInstances"])) {
				$WorkflowProcessInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\WorkflowProcessInstances");
				$WorkflowProcessInstances->fromJSON($props["WorkflowProcessInstances"]);
				$this->setWorkflowProcessInstances($WorkflowProcessInstances);
			}
			if(isset($props["InstanceExtendedAttributes"])) {
				$InstanceExtendedAttributes = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\InstanceExtendedAttributes");
				$InstanceExtendedAttributes->fromJSON($props["InstanceExtendedAttributes"]);
				$this->setInstanceExtendedAttributes($InstanceExtendedAttributes);
			}
			if(isset($props["WorkflowProcess"])) {
				$WorkflowProcess = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\WorkflowProcess");
				$WorkflowProcess->fromJSON($props["WorkflowProcess"]);
				$this->setWorkflowProcess($WorkflowProcess);
			}
			if(isset($props["Id"])) {
				$this->setId($props["Id"]);
			}
			if(isset($props["DefinitionId"])) {
				$this->setDefinitionId($props["DefinitionId"]);
			}
			if(isset($props["State"])) {
				$this->setState($props["State"]);
			}
			if(isset($props["Version"])) {
				$this->setVersion($props["Version"]);
			}
			if(isset($props["Created"])) {
				$this->setCreated($props["Created"]);
			}
		}
		
	}
		

