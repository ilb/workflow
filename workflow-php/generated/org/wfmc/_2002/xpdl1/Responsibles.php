<?php
	namespace org\wfmc\_2002\xpdl1;
		
	class Responsibles extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.wfmc.org/2002/XPDL1.0";
		const ROOT = "Responsibles";
		const PREF = NULL;
		/**
		 * @maxOccurs unbounded 
		 * @var \String[]
		 */
		protected $Responsible = [];
		public function __construct() {
			parent::__construct();
			
			$this->_properties["Responsible"] = array(
				"prop"=>"Responsible",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Responsible
			);
		}
		/**
		 * @param \String $val
		 */
		public function setResponsible (  $val ) {
			$this->Responsible[] = $val;
			$this->_properties["Responsible"]["text"][] = $val;
		}
		/**
		 * @param \String[]
		 */
		public function setResponsibleArray ( array $vals ) {
			$this->Responsible = $vals;
			$this->_properties["Responsible"]["text"] = $vals;
		}
		/**
		 * @return \String | []
		 */
		public function getResponsible($index = null) {
			if( $index !== null ) {
				$res = isset($this->Responsible[$index]) ? $this->Responsible[$index] : null;
			} else {
				$res = $this->Responsible;
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
			if( $props = $this->getResponsible() ) {
				foreach( $props as $prop ) {
				$xw->writeElementNS( NULL, 'Responsible', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
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
				case "Responsible":
					$this->setResponsible( $xr->readString() );
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
			if(isset($props["Responsible"])) {
				if( is_array($props["Responsible"]) ) {
					$this->setResponsibleArray($props["Responsible"]);
				}
			} elseif(array_keys($prop) == array_keys(array_keys($prop))) {
				$this->setResponsibleArray($props);
			}
		}
		
	}
		

