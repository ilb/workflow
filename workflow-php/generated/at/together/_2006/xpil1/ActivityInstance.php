<?php
	namespace at\together\_2006\xpil1;
		
	class ActivityInstance extends \at\together\_2006\xpil1\ExecutionInstance {
			
		const NS = "http://www.together.at/2006/XPIL1.0";
		const ROOT = "ActivityInstance";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var at\together\_2006\xpil1\DeadlineInstances
		 */
		protected $DeadlineInstances = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\Activity
		 */
		protected $Activity = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["DeadlineInstances"] = array(
				"prop"=>"DeadlineInstances",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->DeadlineInstances
			);
			$this->_properties["Activity"] = array(
				"prop"=>"Activity",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Activity
			);
		}
		/**
		 * @param at\together\_2006\xpil1\DeadlineInstances $val
		 */
		public function setDeadlineInstances ( \at\together\_2006\xpil1\DeadlineInstances $val ) {
			$this->DeadlineInstances = $val;
			$this->_properties["DeadlineInstances"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\Activity $val
		 */
		public function setActivity ( \org\wfmc\_2002\xpdl1\Activity $val ) {
			$this->Activity = $val;
			$this->_properties["Activity"]["text"] = $val;
		}
		/**
		 * @return at\together\_2006\xpil1\DeadlineInstances
		 */
		public function getDeadlineInstances() {
			return $this->DeadlineInstances;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\Activity
		 */
		public function getActivity() {
			return $this->Activity;
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
			if( ($prop = $this->getDeadlineInstances()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getActivity()) !== NULL ) {
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
				case "DeadlineInstances":
					$DeadlineInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DeadlineInstances");
					$this->setDeadlineInstances( $DeadlineInstances->fromXmlReader( $xr ) );
					break;
				case "Activity":
					$Activity = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Activity");
					$this->setActivity( $Activity->fromXmlReader( $xr ) );
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
			if(isset($props["DeadlineInstances"])) {
				$DeadlineInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DeadlineInstances");
				$DeadlineInstances->fromJSON($props["DeadlineInstances"]);
				$this->setDeadlineInstances($DeadlineInstances);
			}
			if(isset($props["Activity"])) {
				$Activity = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Activity");
				$Activity->fromJSON($props["Activity"]);
				$this->setActivity($Activity);
			}
		}
		
	}
		

