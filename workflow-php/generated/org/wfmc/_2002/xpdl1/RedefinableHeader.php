<?php
	namespace org\wfmc\_2002\xpdl1;
		
	class RedefinableHeader extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.wfmc.org/2002/XPDL1.0";
		const ROOT = "RedefinableHeader";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Author = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Version = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Codepage = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Countrykey = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\Responsibles
		 */
		protected $Responsibles = null;
		/**
		 * @maxOccurs 1 
		 * @var \NMTOKEN
		 */
		protected $PublicationStatus = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["Author"] = array(
				"prop"=>"Author",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Author
			);
			$this->_properties["Version"] = array(
				"prop"=>"Version",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Version
			);
			$this->_properties["Codepage"] = array(
				"prop"=>"Codepage",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Codepage
			);
			$this->_properties["Countrykey"] = array(
				"prop"=>"Countrykey",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Countrykey
			);
			$this->_properties["Responsibles"] = array(
				"prop"=>"Responsibles",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Responsibles
			);
			$this->_properties["PublicationStatus"] = array(
				"prop"=>"PublicationStatus",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->PublicationStatus
			);
		}
		/**
		 * @param \String $val
		 */
		public function setAuthor (  $val ) {
			$this->Author = $val;
			$this->_properties["Author"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setVersion (  $val ) {
			$this->Version = $val;
			$this->_properties["Version"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setCodepage (  $val ) {
			$this->Codepage = $val;
			$this->_properties["Codepage"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setCountrykey (  $val ) {
			$this->Countrykey = $val;
			$this->_properties["Countrykey"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\Responsibles $val
		 */
		public function setResponsibles ( \org\wfmc\_2002\xpdl1\Responsibles $val ) {
			$this->Responsibles = $val;
			$this->_properties["Responsibles"]["text"] = $val;
		}
		/**
		 * @param \NMTOKEN $val
		 */
		public function setPublicationStatus (  $val ) {
			$this->PublicationStatus = $val;
			$this->_properties["PublicationStatus"]["text"] = $val;
		}
		/**
		 * @return \String
		 */
		public function getAuthor() {
			return $this->Author;
		}
		/**
		 * @return \String
		 */
		public function getVersion() {
			return $this->Version;
		}
		/**
		 * @return \String
		 */
		public function getCodepage() {
			return $this->Codepage;
		}
		/**
		 * @return \String
		 */
		public function getCountrykey() {
			return $this->Countrykey;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\Responsibles
		 */
		public function getResponsibles() {
			return $this->Responsibles;
		}
		/**
		 * @return \NMTOKEN
		 */
		public function getPublicationStatus() {
			return $this->PublicationStatus;
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
			if( $prop = $this->getPublicationStatus() ) $xw->writeAttribute( 'PublicationStatus', $prop );
		}
		/**
		* Вывод элементов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function elementsToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::elementsToXmlWriter( $xw, $xmlname, $xmlns );
			if( ($prop = $this->getAuthor()) !== NULL ) {
				$xw->writeElementNS( NULL, 'Author', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
			}
			if( ($prop = $this->getVersion()) !== NULL ) {
				$xw->writeElementNS( NULL, 'Version', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
			}
			if( ($prop = $this->getCodepage()) !== NULL ) {
				$xw->writeElementNS( NULL, 'Codepage', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
			}
			if( ($prop = $this->getCountrykey()) !== NULL ) {
				$xw->writeElementNS( NULL, 'Countrykey', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
			}
			if( ($prop = $this->getResponsibles()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
		}

		/**
		 * Чтение атрибутов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function attributesFromXmlReader ( \XMLReader &$xr ) {
			if( $attr = $xr->getAttribute( 'PublicationStatus') ) {
			$this->_attributes['PublicationStatus']['prop'] = 'PublicationStatus';
			$this->setPublicationStatus( $attr ); 
		}
			parent::attributesFromXmlReader( $xr );	
		}
				
		/**
		 * Чтение элементов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function elementsFromXmlReader ( \XMLReader &$xr ) {
			switch ( $xr->localName ) {
				case "Author":
					$this->setAuthor( $xr->readString() );
					break;
				case "Version":
					$this->setVersion( $xr->readString() );
					break;
				case "Codepage":
					$this->setCodepage( $xr->readString() );
					break;
				case "Countrykey":
					$this->setCountrykey( $xr->readString() );
					break;
				case "Responsibles":
					$Responsibles = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Responsibles");
					$this->setResponsibles( $Responsibles->fromXmlReader( $xr ) );
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
			if(isset($props["Author"])) {
				$this->setAuthor($props["Author"]);
			}
			if(isset($props["Version"])) {
				$this->setVersion($props["Version"]);
			}
			if(isset($props["Codepage"])) {
				$this->setCodepage($props["Codepage"]);
			}
			if(isset($props["Countrykey"])) {
				$this->setCountrykey($props["Countrykey"]);
			}
			if(isset($props["Responsibles"])) {
				$Responsibles = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Responsibles");
				$Responsibles->fromJSON($props["Responsibles"]);
				$this->setResponsibles($Responsibles);
			}
			if(isset($props["PublicationStatus"])) {
				$this->setPublicationStatus($props["PublicationStatus"]);
			}
		}
		
	}
		

