<?php
	namespace at\together\_2006\xpil1;
		
	class NextInfoElement extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.together.at/2006/XPIL1.0";
		const ROOT = "NextInfoElement";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\Activity
		 */
		protected $Activity = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\Transition
		 */
		protected $Transition = null;
		/**
		 * @maxOccurs 1 
		 * @var at\together\_2006\xpil1\InstanceExtendedAttributes
		 */
		protected $InstanceExtendedAttributes = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["Activity"] = array(
				"prop"=>"Activity",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Activity
			);
			$this->_properties["Transition"] = array(
				"prop"=>"Transition",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Transition
			);
			$this->_properties["InstanceExtendedAttributes"] = array(
				"prop"=>"InstanceExtendedAttributes",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->InstanceExtendedAttributes
			);
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\Activity $val
		 */
		public function setActivity ( \org\wfmc\_2002\xpdl1\Activity $val ) {
			$this->Activity = $val;
			$this->_properties["Activity"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\Transition $val
		 */
		public function setTransition ( \org\wfmc\_2002\xpdl1\Transition $val ) {
			$this->Transition = $val;
			$this->_properties["Transition"]["text"] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\InstanceExtendedAttributes $val
		 */
		public function setInstanceExtendedAttributes ( \at\together\_2006\xpil1\InstanceExtendedAttributes $val ) {
			$this->InstanceExtendedAttributes = $val;
			$this->_properties["InstanceExtendedAttributes"]["text"] = $val;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\Activity
		 */
		public function getActivity() {
			return $this->Activity;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\Transition
		 */
		public function getTransition() {
			return $this->Transition;
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
			if( ($prop = $this->getActivity()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getTransition()) !== NULL ) {
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
			parent::attributesFromXmlReader( $xr );	
		}
				
		/**
		 * Чтение элементов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function elementsFromXmlReader ( \XMLReader &$xr ) {
			switch ( $xr->localName ) {
				case "Activity":
					$Activity = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Activity");
					$this->setActivity( $Activity->fromXmlReader( $xr ) );
					break;
				case "Transition":
					$Transition = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Transition");
					$this->setTransition( $Transition->fromXmlReader( $xr ) );
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
			if(isset($props["Activity"])) {
				$Activity = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Activity");
				$Activity->fromJSON($props["Activity"]);
				$this->setActivity($Activity);
			}
			if(isset($props["Transition"])) {
				$Transition = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Transition");
				$Transition->fromJSON($props["Transition"]);
				$this->setTransition($Transition);
			}
			if(isset($props["InstanceExtendedAttributes"])) {
				$InstanceExtendedAttributes = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\InstanceExtendedAttributes");
				$InstanceExtendedAttributes->fromJSON($props["InstanceExtendedAttributes"]);
				$this->setInstanceExtendedAttributes($InstanceExtendedAttributes);
			}
		}
		
	}
		

