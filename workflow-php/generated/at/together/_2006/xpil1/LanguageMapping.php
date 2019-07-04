<?php
	namespace at\together\_2006\xpil1;
		
	class LanguageMapping extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.together.at/2006/XPIL1.0";
		const ROOT = "LanguageMapping";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Language = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Type = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["Language"] = array(
				"prop"=>"Language",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Language
			);
			$this->_properties["Type"] = array(
				"prop"=>"Type",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Type
			);
		}
		/**
		 * @param \String $val
		 */
		public function setLanguage (  $val ) {
			$this->Language = $val;
			$this->_properties["Language"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setType (  $val ) {
			$this->Type = $val;
			$this->_properties["Type"]["text"] = $val;
		}
		/**
		 * @return \String
		 */
		public function getLanguage() {
			return $this->Language;
		}
		/**
		 * @return \String
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
			if( $prop = $this->getLanguage() ) $xw->writeAttribute( 'Language', $prop );
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
		}

		/**
		 * Чтение атрибутов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function attributesFromXmlReader ( \XMLReader &$xr ) {
			if( $attr = $xr->getAttribute( 'Language') ) {
			$this->_attributes['Language']['prop'] = 'Language';
			$this->setLanguage( $attr ); 
		}
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
			if(isset($props["Language"])) {
				$this->setLanguage($props["Language"]);
			}
			if(isset($props["Type"])) {
				$this->setType($props["Type"]);
			}
		}
		
	}
		

