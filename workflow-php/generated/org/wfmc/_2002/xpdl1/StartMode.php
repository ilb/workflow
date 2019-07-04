<?php
	namespace org\wfmc\_2002\xpdl1;
		
	class StartMode extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.wfmc.org/2002/XPDL1.0";
		const ROOT = "StartMode";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\Automatic
		 */
		protected $Automatic = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\Manual
		 */
		protected $Manual = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["Automatic"] = array(
				"prop"=>"Automatic",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Automatic
			);
			$this->_properties["Manual"] = array(
				"prop"=>"Manual",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Manual
			);
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\Automatic $val
		 */
		public function setAutomatic ( \org\wfmc\_2002\xpdl1\Automatic $val ) {
			$this->Automatic = $val;
			$this->_properties["Automatic"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\Manual $val
		 */
		public function setManual ( \org\wfmc\_2002\xpdl1\Manual $val ) {
			$this->Manual = $val;
			$this->_properties["Manual"]["text"] = $val;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\Automatic
		 */
		public function getAutomatic() {
			return $this->Automatic;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\Manual
		 */
		public function getManual() {
			return $this->Manual;
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
			if( ($prop = $this->getAutomatic()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getManual()) !== NULL ) {
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
				case "Automatic":
					$Automatic = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Automatic");
					$this->setAutomatic( $Automatic->fromXmlReader( $xr ) );
					break;
				case "Manual":
					$Manual = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Manual");
					$this->setManual( $Manual->fromXmlReader( $xr ) );
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
			if(isset($props["Automatic"])) {
				$Automatic = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Automatic");
				$Automatic->fromJSON($props["Automatic"]);
				$this->setAutomatic($Automatic);
			}
			if(isset($props["Manual"])) {
				$Manual = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Manual");
				$Manual->fromJSON($props["Manual"]);
				$this->setManual($Manual);
			}
		}
		
	}
		

