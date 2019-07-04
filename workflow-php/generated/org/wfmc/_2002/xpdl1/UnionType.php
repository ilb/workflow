<?php
	namespace org\wfmc\_2002\xpdl1;
		
	class UnionType extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.wfmc.org/2002/XPDL1.0";
		const ROOT = "UnionType";
		const PREF = NULL;
		/**
		 * @maxOccurs unbounded 
		 * @var org\wfmc\_2002\xpdl1\Member[]
		 */
		protected $Member = [];
		public function __construct() {
			parent::__construct();
			
			$this->_properties["Member"] = array(
				"prop"=>"Member",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Member
			);
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\Member $val
		 */
		public function setMember ( \org\wfmc\_2002\xpdl1\Member $val ) {
			$this->Member[] = $val;
			$this->_properties["Member"]["text"][] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\Member[]
		 */
		public function setMemberArray ( array $vals ) {
			$this->Member = $vals;
			$this->_properties["Member"]["text"] = $vals;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\Member | []
		 */
		public function getMember($index = null) {
			if( $index !== null ) {
				$res = isset($this->Member[$index]) ? $this->Member[$index] : null;
			} else {
				$res = $this->Member;
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
			if( $props = $this->getMember() ) {
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
				case "Member":
					$Member = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Member");
					$this->setMember( $Member->fromXmlReader( $xr ) );
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
			if(isset($props["Member"])) {
				if( is_array($props["Member"]) ) {
					foreach($props["Member"] as $k=>$v) {
						$Member = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Member");
						$Member->fromJSON($v);
						$this->setMember($Member);
					}
				}
			} elseif(array_keys($props) == array_keys(array_keys($props))) {
				foreach($props as $v) {
					$Member = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Member");
					$Member->fromJSON($v);
					$this->setMember($Member);
				}
			}
		}
		
	}
		

