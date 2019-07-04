<?php
	namespace org\wfmc\_2002\xpdl1;
		
	class Condition extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.wfmc.org/2002/XPDL1.0";
		const ROOT = "Condition";
		const PREF = NULL;
		/**
		 * @maxOccurs unbounded 
		 * @var org\wfmc\_2002\xpdl1\Xpression[]
		 */
		protected $Xpression = [];
		/**
		 * @maxOccurs 1 
		 * @var \NMTOKEN
		 */
		protected $Type = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["Xpression"] = array(
				"prop"=>"Xpression",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Xpression
			);
			$this->_properties["Type"] = array(
				"prop"=>"Type",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Type
			);
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\Xpression $val
		 */
		public function setXpression ( \org\wfmc\_2002\xpdl1\Xpression $val ) {
			$this->Xpression[] = $val;
			$this->_properties["Xpression"]["text"][] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\Xpression[]
		 */
		public function setXpressionArray ( array $vals ) {
			$this->Xpression = $vals;
			$this->_properties["Xpression"]["text"] = $vals;
		}
		/**
		 * @param \NMTOKEN $val
		 */
		public function setType (  $val ) {
			$this->Type = $val;
			$this->_properties["Type"]["text"] = $val;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\Xpression | []
		 */
		public function getXpression($index = null) {
			if( $index !== null ) {
				$res = isset($this->Xpression[$index]) ? $this->Xpression[$index] : null;
			} else {
				$res = $this->Xpression;
			}
			return $res;
		}
		/**
		 * @return \NMTOKEN
		 */
		public function getType() {
			return $this->Type;
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
			if( $prop = $this->getType() ) $xw->writeAttribute( 'Type', $prop );
		}
		/**
		* Вывод элементов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function elementsToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::elementsToXmlWriter( $xw, $xmlname, $xmlns );
			if( $props = $this->getXpression() ) {
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
			if( $attr = $xr->getAttribute( 'Type') ) {
			$this->_attributes['Type']['prop'] = 'Type';
			$this->setType( $attr ); 
		}
			parent::attributesFromXmlReader( $xr );	
		}
				
		/**
		 * Чтение элементов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function elementsFromXmlReader ( \XMLReader &$xr ) {
			switch ( $xr->localName ) {
				case "Xpression":
					$Xpression = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Xpression");
					$this->setXpression( $Xpression->fromXmlReader( $xr ) );
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
			if(isset($props["Xpression"])) {
				if( is_array($props["Xpression"]) ) {
					foreach($props["Xpression"] as $k=>$v) {
						$Xpression = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Xpression");
						$Xpression->fromJSON($v);
						$this->setXpression($Xpression);
					}
				}
			}
			if(isset($props["Type"])) {
				$this->setType($props["Type"]);
			}
		}
		
	}
		

