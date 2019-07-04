<?php
	namespace at\together\_2006\xpil1;
		
	class WorkflowProcessInstance extends \at\together\_2006\xpil1\ExecutionInstance {
			
		const NS = "http://www.together.at/2006/XPIL1.0";
		const ROOT = "WorkflowProcessInstance";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var at\together\_2006\xpil1\ActivityInstances
		 */
		protected $ActivityInstances = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\WorkflowProcess
		 */
		protected $WorkflowProcess = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $RequesterUsername = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $FactoryId = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["ActivityInstances"] = array(
				"prop"=>"ActivityInstances",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->ActivityInstances
			);
			$this->_properties["WorkflowProcess"] = array(
				"prop"=>"WorkflowProcess",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->WorkflowProcess
			);
			$this->_properties["RequesterUsername"] = array(
				"prop"=>"RequesterUsername",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->RequesterUsername
			);
			$this->_properties["FactoryId"] = array(
				"prop"=>"FactoryId",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->FactoryId
			);
		}
		/**
		 * @param at\together\_2006\xpil1\ActivityInstances $val
		 */
		public function setActivityInstances ( \at\together\_2006\xpil1\ActivityInstances $val ) {
			$this->ActivityInstances = $val;
			$this->_properties["ActivityInstances"]["text"] = $val;
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
		public function setRequesterUsername (  $val ) {
			$this->RequesterUsername = $val;
			$this->_properties["RequesterUsername"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setFactoryId (  $val ) {
			$this->FactoryId = $val;
			$this->_properties["FactoryId"]["text"] = $val;
		}
		/**
		 * @return at\together\_2006\xpil1\ActivityInstances
		 */
		public function getActivityInstances() {
			return $this->ActivityInstances;
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
		public function getRequesterUsername() {
			return $this->RequesterUsername;
		}
		/**
		 * @return \String
		 */
		public function getFactoryId() {
			return $this->FactoryId;
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
			if( $prop = $this->getRequesterUsername() ) $xw->writeAttribute( 'RequesterUsername', $prop );
			if( $prop = $this->getFactoryId() ) $xw->writeAttribute( 'FactoryId', $prop );
		}
		/**
		* Вывод элементов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function elementsToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::elementsToXmlWriter( $xw, $xmlname, $xmlns );
			if( ($prop = $this->getActivityInstances()) !== NULL ) {
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
			if( $attr = $xr->getAttribute( 'RequesterUsername') ) {
			$this->_attributes['RequesterUsername']['prop'] = 'RequesterUsername';
			$this->setRequesterUsername( $attr ); 
		}
			if( $attr = $xr->getAttribute( 'FactoryId') ) {
			$this->_attributes['FactoryId']['prop'] = 'FactoryId';
			$this->setFactoryId( $attr ); 
		}
			parent::attributesFromXmlReader( $xr );	
		}
				
		/**
		 * Чтение элементов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function elementsFromXmlReader ( \XMLReader &$xr ) {
			switch ( $xr->localName ) {
				case "ActivityInstances":
					$ActivityInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\ActivityInstances");
					$this->setActivityInstances( $ActivityInstances->fromXmlReader( $xr ) );
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
			if(isset($props["ActivityInstances"])) {
				$ActivityInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\ActivityInstances");
				$ActivityInstances->fromJSON($props["ActivityInstances"]);
				$this->setActivityInstances($ActivityInstances);
			}
			if(isset($props["WorkflowProcess"])) {
				$WorkflowProcess = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\WorkflowProcess");
				$WorkflowProcess->fromJSON($props["WorkflowProcess"]);
				$this->setWorkflowProcess($WorkflowProcess);
			}
			if(isset($props["RequesterUsername"])) {
				$this->setRequesterUsername($props["RequesterUsername"]);
			}
			if(isset($props["FactoryId"])) {
				$this->setFactoryId($props["FactoryId"]);
			}
		}
		
	}
		

