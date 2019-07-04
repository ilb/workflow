<?php
	namespace org\wfmc\_2002\xpdl1;
		
	class TransitionRefs extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.wfmc.org/2002/XPDL1.0";
		const ROOT = "TransitionRefs";
		const PREF = NULL;
		/**
		 * @maxOccurs unbounded 
		 * @var org\wfmc\_2002\xpdl1\TransitionRef[]
		 */
		protected $TransitionRef = [];
		public function __construct() {
			parent::__construct();
			
			$this->_properties["TransitionRef"] = array(
				"prop"=>"TransitionRef",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->TransitionRef
			);
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\TransitionRef $val
		 */
		public function setTransitionRef ( \org\wfmc\_2002\xpdl1\TransitionRef $val ) {
			$this->TransitionRef[] = $val;
			$this->_properties["TransitionRef"]["text"][] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\TransitionRef[]
		 */
		public function setTransitionRefArray ( array $vals ) {
			$this->TransitionRef = $vals;
			$this->_properties["TransitionRef"]["text"] = $vals;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\TransitionRef | []
		 */
		public function getTransitionRef($index = null) {
			if( $index !== null ) {
				$res = isset($this->TransitionRef[$index]) ? $this->TransitionRef[$index] : null;
			} else {
				$res = $this->TransitionRef;
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
			if( $props = $this->getTransitionRef() ) {
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
				case "TransitionRef":
					$TransitionRef = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\TransitionRef");
					$this->setTransitionRef( $TransitionRef->fromXmlReader( $xr ) );
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
			if(isset($props["TransitionRef"])) {
				if( is_array($props["TransitionRef"]) ) {
					foreach($props["TransitionRef"] as $k=>$v) {
						$TransitionRef = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\TransitionRef");
						$TransitionRef->fromJSON($v);
						$this->setTransitionRef($TransitionRef);
					}
				}
			} elseif(array_keys($props) == array_keys(array_keys($props))) {
				foreach($props as $v) {
					$TransitionRef = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\TransitionRef");
					$TransitionRef->fromJSON($v);
					$this->setTransitionRef($TransitionRef);
				}
			}
		}
		
	}
		

