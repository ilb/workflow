<?php
	namespace at\together\_2006\xpil1;
		
	class CreateProcessEventAudit extends \at\together\_2006\xpil1\EventAudit {
			
		const NS = "http://www.together.at/2006/XPIL1.0";
		const ROOT = "CreateProcessEventAudit";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $PWorkflowProcessFactoryId = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $PWorkflowProcessFactoryVersion = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $PWorkflowProcessInstanceId = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $PWorkflowProcessInstanceName = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $PActivityInstanceId = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $PPackageId = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $PProcessDefinitionId = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $PActivityDefinitionId = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["PWorkflowProcessFactoryId"] = array(
				"prop"=>"PWorkflowProcessFactoryId",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->PWorkflowProcessFactoryId
			);
			$this->_properties["PWorkflowProcessFactoryVersion"] = array(
				"prop"=>"PWorkflowProcessFactoryVersion",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->PWorkflowProcessFactoryVersion
			);
			$this->_properties["PWorkflowProcessInstanceId"] = array(
				"prop"=>"PWorkflowProcessInstanceId",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->PWorkflowProcessInstanceId
			);
			$this->_properties["PWorkflowProcessInstanceName"] = array(
				"prop"=>"PWorkflowProcessInstanceName",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->PWorkflowProcessInstanceName
			);
			$this->_properties["PActivityInstanceId"] = array(
				"prop"=>"PActivityInstanceId",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->PActivityInstanceId
			);
			$this->_properties["PPackageId"] = array(
				"prop"=>"PPackageId",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->PPackageId
			);
			$this->_properties["PProcessDefinitionId"] = array(
				"prop"=>"PProcessDefinitionId",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->PProcessDefinitionId
			);
			$this->_properties["PActivityDefinitionId"] = array(
				"prop"=>"PActivityDefinitionId",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->PActivityDefinitionId
			);
		}
		/**
		 * @param \String $val
		 */
		public function setPWorkflowProcessFactoryId (  $val ) {
			$this->PWorkflowProcessFactoryId = $val;
			$this->_properties["PWorkflowProcessFactoryId"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setPWorkflowProcessFactoryVersion (  $val ) {
			$this->PWorkflowProcessFactoryVersion = $val;
			$this->_properties["PWorkflowProcessFactoryVersion"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setPWorkflowProcessInstanceId (  $val ) {
			$this->PWorkflowProcessInstanceId = $val;
			$this->_properties["PWorkflowProcessInstanceId"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setPWorkflowProcessInstanceName (  $val ) {
			$this->PWorkflowProcessInstanceName = $val;
			$this->_properties["PWorkflowProcessInstanceName"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setPActivityInstanceId (  $val ) {
			$this->PActivityInstanceId = $val;
			$this->_properties["PActivityInstanceId"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setPPackageId (  $val ) {
			$this->PPackageId = $val;
			$this->_properties["PPackageId"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setPProcessDefinitionId (  $val ) {
			$this->PProcessDefinitionId = $val;
			$this->_properties["PProcessDefinitionId"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setPActivityDefinitionId (  $val ) {
			$this->PActivityDefinitionId = $val;
			$this->_properties["PActivityDefinitionId"]["text"] = $val;
		}
		/**
		 * @return \String
		 */
		public function getPWorkflowProcessFactoryId() {
			return $this->PWorkflowProcessFactoryId;
		}
		/**
		 * @return \String
		 */
		public function getPWorkflowProcessFactoryVersion() {
			return $this->PWorkflowProcessFactoryVersion;
		}
		/**
		 * @return \String
		 */
		public function getPWorkflowProcessInstanceId() {
			return $this->PWorkflowProcessInstanceId;
		}
		/**
		 * @return \String
		 */
		public function getPWorkflowProcessInstanceName() {
			return $this->PWorkflowProcessInstanceName;
		}
		/**
		 * @return \String
		 */
		public function getPActivityInstanceId() {
			return $this->PActivityInstanceId;
		}
		/**
		 * @return \String
		 */
		public function getPPackageId() {
			return $this->PPackageId;
		}
		/**
		 * @return \String
		 */
		public function getPProcessDefinitionId() {
			return $this->PProcessDefinitionId;
		}
		/**
		 * @return \String
		 */
		public function getPActivityDefinitionId() {
			return $this->PActivityDefinitionId;
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
			if( $prop = $this->getPWorkflowProcessFactoryId() ) $xw->writeAttribute( 'PWorkflowProcessFactoryId', $prop );
			if( $prop = $this->getPWorkflowProcessFactoryVersion() ) $xw->writeAttribute( 'PWorkflowProcessFactoryVersion', $prop );
			if( $prop = $this->getPWorkflowProcessInstanceId() ) $xw->writeAttribute( 'PWorkflowProcessInstanceId', $prop );
			if( $prop = $this->getPWorkflowProcessInstanceName() ) $xw->writeAttribute( 'PWorkflowProcessInstanceName', $prop );
			if( $prop = $this->getPActivityInstanceId() ) $xw->writeAttribute( 'PActivityInstanceId', $prop );
			if( $prop = $this->getPPackageId() ) $xw->writeAttribute( 'PPackageId', $prop );
			if( $prop = $this->getPProcessDefinitionId() ) $xw->writeAttribute( 'PProcessDefinitionId', $prop );
			if( $prop = $this->getPActivityDefinitionId() ) $xw->writeAttribute( 'PActivityDefinitionId', $prop );
		}
		/**
		* Вывод элементов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function elementsToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::elementsToXmlWriter( $xw, $xmlname, $xmlns );
		}

		/**
		 * Чтение атрибутов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function attributesFromXmlReader ( \XMLReader &$xr ) {
			if( $attr = $xr->getAttribute( 'PWorkflowProcessFactoryId') ) {
			$this->_attributes['PWorkflowProcessFactoryId']['prop'] = 'PWorkflowProcessFactoryId';
			$this->setPWorkflowProcessFactoryId( $attr ); 
		}
			if( $attr = $xr->getAttribute( 'PWorkflowProcessFactoryVersion') ) {
			$this->_attributes['PWorkflowProcessFactoryVersion']['prop'] = 'PWorkflowProcessFactoryVersion';
			$this->setPWorkflowProcessFactoryVersion( $attr ); 
		}
			if( $attr = $xr->getAttribute( 'PWorkflowProcessInstanceId') ) {
			$this->_attributes['PWorkflowProcessInstanceId']['prop'] = 'PWorkflowProcessInstanceId';
			$this->setPWorkflowProcessInstanceId( $attr ); 
		}
			if( $attr = $xr->getAttribute( 'PWorkflowProcessInstanceName') ) {
			$this->_attributes['PWorkflowProcessInstanceName']['prop'] = 'PWorkflowProcessInstanceName';
			$this->setPWorkflowProcessInstanceName( $attr ); 
		}
			if( $attr = $xr->getAttribute( 'PActivityInstanceId') ) {
			$this->_attributes['PActivityInstanceId']['prop'] = 'PActivityInstanceId';
			$this->setPActivityInstanceId( $attr ); 
		}
			if( $attr = $xr->getAttribute( 'PPackageId') ) {
			$this->_attributes['PPackageId']['prop'] = 'PPackageId';
			$this->setPPackageId( $attr ); 
		}
			if( $attr = $xr->getAttribute( 'PProcessDefinitionId') ) {
			$this->_attributes['PProcessDefinitionId']['prop'] = 'PProcessDefinitionId';
			$this->setPProcessDefinitionId( $attr ); 
		}
			if( $attr = $xr->getAttribute( 'PActivityDefinitionId') ) {
			$this->_attributes['PActivityDefinitionId']['prop'] = 'PActivityDefinitionId';
			$this->setPActivityDefinitionId( $attr ); 
		}
			parent::attributesFromXmlReader( $xr );	
		}
				
		/**
		 * Чтение элементов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function elementsFromXmlReader ( \XMLReader &$xr ) {
			switch ( $xr->localName ) {
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
			if(isset($props["PWorkflowProcessFactoryId"])) {
				$this->setPWorkflowProcessFactoryId($props["PWorkflowProcessFactoryId"]);
			}
			if(isset($props["PWorkflowProcessFactoryVersion"])) {
				$this->setPWorkflowProcessFactoryVersion($props["PWorkflowProcessFactoryVersion"]);
			}
			if(isset($props["PWorkflowProcessInstanceId"])) {
				$this->setPWorkflowProcessInstanceId($props["PWorkflowProcessInstanceId"]);
			}
			if(isset($props["PWorkflowProcessInstanceName"])) {
				$this->setPWorkflowProcessInstanceName($props["PWorkflowProcessInstanceName"]);
			}
			if(isset($props["PActivityInstanceId"])) {
				$this->setPActivityInstanceId($props["PActivityInstanceId"]);
			}
			if(isset($props["PPackageId"])) {
				$this->setPPackageId($props["PPackageId"]);
			}
			if(isset($props["PProcessDefinitionId"])) {
				$this->setPProcessDefinitionId($props["PProcessDefinitionId"]);
			}
			if(isset($props["PActivityDefinitionId"])) {
				$this->setPActivityDefinitionId($props["PActivityDefinitionId"]);
			}
		}
		
	}
		

