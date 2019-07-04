<?php
	namespace org\wfmc\_2002\xpdl1;
		
	class ActivitySets extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.wfmc.org/2002/XPDL1.0";
		const ROOT = "ActivitySets";
		const PREF = NULL;
		/**
		 * @maxOccurs unbounded 
		 * @var org\wfmc\_2002\xpdl1\ActivitySet[]
		 */
		protected $ActivitySet = [];
		public function __construct() {
			parent::__construct();
			
			$this->_properties["ActivitySet"] = array(
				"prop"=>"ActivitySet",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->ActivitySet
			);
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\ActivitySet $val
		 */
		public function setActivitySet ( \org\wfmc\_2002\xpdl1\ActivitySet $val ) {
			$this->ActivitySet[] = $val;
			$this->_properties["ActivitySet"]["text"][] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\ActivitySet[]
		 */
		public function setActivitySetArray ( array $vals ) {
			$this->ActivitySet = $vals;
			$this->_properties["ActivitySet"]["text"] = $vals;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\ActivitySet | []
		 */
		public function getActivitySet($index = null) {
			if( $index !== null ) {
				$res = isset($this->ActivitySet[$index]) ? $this->ActivitySet[$index] : null;
			} else {
				$res = $this->ActivitySet;
			}
			return $res;
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
			if( $props = $this->getActivitySet() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
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
				case "ActivitySet":
					$ActivitySet = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ActivitySet");
					$this->setActivitySet( $ActivitySet->fromXmlReader( $xr ) );
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
			if(isset($props["ActivitySet"])) {
				if( is_array($props["ActivitySet"]) ) {
					foreach($props["ActivitySet"] as $k=>$v) {
						$ActivitySet = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ActivitySet");
						$ActivitySet->fromJSON($v);
						$this->setActivitySet($ActivitySet);
					}
				}
			} elseif(array_keys($props) == array_keys(array_keys($props))) {
				foreach($props as $v) {
					$ActivitySet = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ActivitySet");
					$ActivitySet->fromJSON($v);
					$this->setActivitySet($ActivitySet);
				}
			}
		}
		
	}
		

