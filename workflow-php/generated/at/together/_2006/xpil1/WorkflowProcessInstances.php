<?php
	namespace at\together\_2006\xpil1;
		
	class WorkflowProcessInstances extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.together.at/2006/XPIL1.0";
		const ROOT = "WorkflowProcessInstances";
		const PREF = NULL;
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\WorkflowProcessInstance[]
		 */
		protected $MainWorkflowProcessInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\WorkflowProcessInstance[]
		 */
		protected $SubWorkflowProcessInstance = [];
		/**
		 * @maxOccurs 1 
		 * @var at\together\_2006\xpil1\InstanceExtendedAttributes
		 */
		protected $InstanceExtendedAttributes = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["MainWorkflowProcessInstance"] = array(
				"prop"=>"MainWorkflowProcessInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->MainWorkflowProcessInstance
			);
			$this->_properties["SubWorkflowProcessInstance"] = array(
				"prop"=>"SubWorkflowProcessInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->SubWorkflowProcessInstance
			);
			$this->_properties["InstanceExtendedAttributes"] = array(
				"prop"=>"InstanceExtendedAttributes",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->InstanceExtendedAttributes
			);
		}
		/**
		 * @param at\together\_2006\xpil1\WorkflowProcessInstance $val
		 */
		public function setMainWorkflowProcessInstance ( \at\together\_2006\xpil1\WorkflowProcessInstance $val ) {
			$this->MainWorkflowProcessInstance[] = $val;
			$this->_properties["MainWorkflowProcessInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\WorkflowProcessInstance[]
		 */
		public function setMainWorkflowProcessInstanceArray ( array $vals ) {
			$this->MainWorkflowProcessInstance = $vals;
			$this->_properties["MainWorkflowProcessInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\WorkflowProcessInstance $val
		 */
		public function setSubWorkflowProcessInstance ( \at\together\_2006\xpil1\WorkflowProcessInstance $val ) {
			$this->SubWorkflowProcessInstance[] = $val;
			$this->_properties["SubWorkflowProcessInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\WorkflowProcessInstance[]
		 */
		public function setSubWorkflowProcessInstanceArray ( array $vals ) {
			$this->SubWorkflowProcessInstance = $vals;
			$this->_properties["SubWorkflowProcessInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\InstanceExtendedAttributes $val
		 */
		public function setInstanceExtendedAttributes ( \at\together\_2006\xpil1\InstanceExtendedAttributes $val ) {
			$this->InstanceExtendedAttributes = $val;
			$this->_properties["InstanceExtendedAttributes"]["text"] = $val;
		}
		/**
		 * @return at\together\_2006\xpil1\WorkflowProcessInstance | []
		 */
		public function getMainWorkflowProcessInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->MainWorkflowProcessInstance[$index]) ? $this->MainWorkflowProcessInstance[$index] : null;
			} else {
				$res = $this->MainWorkflowProcessInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\WorkflowProcessInstance | []
		 */
		public function getSubWorkflowProcessInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->SubWorkflowProcessInstance[$index]) ? $this->SubWorkflowProcessInstance[$index] : null;
			} else {
				$res = $this->SubWorkflowProcessInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\InstanceExtendedAttributes
		 */
		public function getInstanceExtendedAttributes() {
			return $this->InstanceExtendedAttributes;
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
			if( $props = $this->getMainWorkflowProcessInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getSubWorkflowProcessInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
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
			parent::attributesFromXmlReader( $xr );	
		}
				
		/**
		 * Чтение элементов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function elementsFromXmlReader ( \XMLReader &$xr ) {
			switch ( $xr->localName ) {
				case "MainWorkflowProcessInstance":
					$MainWorkflowProcessInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\MainWorkflowProcessInstance");
					$this->setMainWorkflowProcessInstance( $MainWorkflowProcessInstance->fromXmlReader( $xr ) );
					break;
				case "SubWorkflowProcessInstance":
					$SubWorkflowProcessInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\SubWorkflowProcessInstance");
					$this->setSubWorkflowProcessInstance( $SubWorkflowProcessInstance->fromXmlReader( $xr ) );
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
			if(isset($props["MainWorkflowProcessInstance"])) {
				if( is_array($props["MainWorkflowProcessInstance"]) ) {
					foreach($props["MainWorkflowProcessInstance"] as $k=>$v) {
						$MainWorkflowProcessInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\MainWorkflowProcessInstance");
						$MainWorkflowProcessInstance->fromJSON($v);
						$this->setMainWorkflowProcessInstance($MainWorkflowProcessInstance);
					}
				}
			}
			if(isset($props["SubWorkflowProcessInstance"])) {
				if( is_array($props["SubWorkflowProcessInstance"]) ) {
					foreach($props["SubWorkflowProcessInstance"] as $k=>$v) {
						$SubWorkflowProcessInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\SubWorkflowProcessInstance");
						$SubWorkflowProcessInstance->fromJSON($v);
						$this->setSubWorkflowProcessInstance($SubWorkflowProcessInstance);
					}
				}
			}
			if(isset($props["InstanceExtendedAttributes"])) {
				$InstanceExtendedAttributes = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\InstanceExtendedAttributes");
				$InstanceExtendedAttributes->fromJSON($props["InstanceExtendedAttributes"]);
				$this->setInstanceExtendedAttributes($InstanceExtendedAttributes);
			}
		}
		
	}
		

