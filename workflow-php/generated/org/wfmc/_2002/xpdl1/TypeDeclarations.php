<?php
	namespace org\wfmc\_2002\xpdl1;
		
	class TypeDeclarations extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.wfmc.org/2002/XPDL1.0";
		const ROOT = "TypeDeclarations";
		const PREF = NULL;
		/**
		 * @maxOccurs unbounded 
		 * @var org\wfmc\_2002\xpdl1\TypeDeclaration[]
		 */
		protected $TypeDeclaration = [];
		public function __construct() {
			parent::__construct();
			
			$this->_properties["TypeDeclaration"] = array(
				"prop"=>"TypeDeclaration",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->TypeDeclaration
			);
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\TypeDeclaration $val
		 */
		public function setTypeDeclaration ( \org\wfmc\_2002\xpdl1\TypeDeclaration $val ) {
			$this->TypeDeclaration[] = $val;
			$this->_properties["TypeDeclaration"]["text"][] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\TypeDeclaration[]
		 */
		public function setTypeDeclarationArray ( array $vals ) {
			$this->TypeDeclaration = $vals;
			$this->_properties["TypeDeclaration"]["text"] = $vals;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\TypeDeclaration | []
		 */
		public function getTypeDeclaration($index = null) {
			if( $index !== null ) {
				$res = isset($this->TypeDeclaration[$index]) ? $this->TypeDeclaration[$index] : null;
			} else {
				$res = $this->TypeDeclaration;
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
			if( $props = $this->getTypeDeclaration() ) {
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
				case "TypeDeclaration":
					$TypeDeclaration = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\TypeDeclaration");
					$this->setTypeDeclaration( $TypeDeclaration->fromXmlReader( $xr ) );
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
			if(isset($props["TypeDeclaration"])) {
				if( is_array($props["TypeDeclaration"]) ) {
					foreach($props["TypeDeclaration"] as $k=>$v) {
						$TypeDeclaration = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\TypeDeclaration");
						$TypeDeclaration->fromJSON($v);
						$this->setTypeDeclaration($TypeDeclaration);
					}
				}
			} elseif(array_keys($props) == array_keys(array_keys($props))) {
				foreach($props as $v) {
					$TypeDeclaration = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\TypeDeclaration");
					$TypeDeclaration->fromJSON($v);
					$this->setTypeDeclaration($TypeDeclaration);
				}
			}
		}
		
	}
		

