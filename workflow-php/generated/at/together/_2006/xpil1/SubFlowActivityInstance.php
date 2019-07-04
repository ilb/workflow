<?php
	namespace at\together\_2006\xpil1;
		
	class SubFlowActivityInstance extends \at\together\_2006\xpil1\ActivityInstance {
			
		const NS = "http://www.together.at/2006/XPIL1.0";
		const ROOT = "SubFlowActivityInstance";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var at\together\_2006\xpil1\WorkflowProcessInstance
		 */
		protected $SubWorkflowProcessInstance = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["SubWorkflowProcessInstance"] = array(
				"prop"=>"SubWorkflowProcessInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->SubWorkflowProcessInstance
			);
		}
		/**
		 * @param at\together\_2006\xpil1\WorkflowProcessInstance $val
		 */
		public function setSubWorkflowProcessInstance ( \at\together\_2006\xpil1\WorkflowProcessInstance $val ) {
			$this->SubWorkflowProcessInstance = $val;
			$this->_properties["SubWorkflowProcessInstance"]["text"] = $val;
		}
		/**
		 * @return at\together\_2006\xpil1\WorkflowProcessInstance
		 */
		public function getSubWorkflowProcessInstance() {
			return $this->SubWorkflowProcessInstance;
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
			if( ($prop = $this->getSubWorkflowProcessInstance()) !== NULL ) {
					$prop->toXmlWriter( $xw );
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
				case "SubWorkflowProcessInstance":
					$SubWorkflowProcessInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\SubWorkflowProcessInstance");
					$this->setSubWorkflowProcessInstance( $SubWorkflowProcessInstance->fromXmlReader( $xr ) );
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
			if(isset($props["SubWorkflowProcessInstance"])) {
				$SubWorkflowProcessInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\SubWorkflowProcessInstance");
				$SubWorkflowProcessInstance->fromJSON($props["SubWorkflowProcessInstance"]);
				$this->setSubWorkflowProcessInstance($SubWorkflowProcessInstance);
			}
		}
		
	}
		

