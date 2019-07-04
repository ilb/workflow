<?php
	namespace org\wfmc\_2002\xpdl1;
		
	class ExternalPackage extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.wfmc.org/2002/XPDL1.0";
		const ROOT = "ExternalPackage";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\ExtendedAttributes
		 */
		protected $ExtendedAttributes = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Href = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["ExtendedAttributes"] = array(
				"prop"=>"ExtendedAttributes",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->ExtendedAttributes
			);
			$this->_properties["href"] = array(
				"prop"=>"Href",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Href
			);
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\ExtendedAttributes $val
		 */
		public function setExtendedAttributes ( \org\wfmc\_2002\xpdl1\ExtendedAttributes $val ) {
			$this->ExtendedAttributes = $val;
			$this->_properties["ExtendedAttributes"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setHref (  $val ) {
			$this->Href = $val;
			$this->_properties["href"]["text"] = $val;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\ExtendedAttributes
		 */
		public function getExtendedAttributes() {
			return $this->ExtendedAttributes;
		}
		/**
		 * @return \String
		 */
		public function getHref() {
			return $this->Href;
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
			if( $prop = $this->getHref() ) $xw->writeAttribute( 'href', $prop );
		}
		/**
		* Вывод элементов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function elementsToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::elementsToXmlWriter( $xw, $xmlname, $xmlns );
			if( ($prop = $this->getExtendedAttributes()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
		}

		/**
		 * Чтение атрибутов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function attributesFromXmlReader ( \XMLReader &$xr ) {
			if( $attr = $xr->getAttribute( 'href') ) {
			$this->_attributes['href']['prop'] = 'Href';
			$this->setHref( $attr ); 
		}
			parent::attributesFromXmlReader( $xr );	
		}
				
		/**
		 * Чтение элементов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function elementsFromXmlReader ( \XMLReader &$xr ) {
			switch ( $xr->localName ) {
				case "ExtendedAttributes":
					$ExtendedAttributes = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ExtendedAttributes");
					$this->setExtendedAttributes( $ExtendedAttributes->fromXmlReader( $xr ) );
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
			if(isset($props["ExtendedAttributes"])) {
				$ExtendedAttributes = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ExtendedAttributes");
				$ExtendedAttributes->fromJSON($props["ExtendedAttributes"]);
				$this->setExtendedAttributes($ExtendedAttributes);
			}
			if(isset($props["href"])) {
				$this->setHref($props["href"]);
			}
		}
		
	}
		

