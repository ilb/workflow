<?php
	namespace org\wfmc\_2002\xpdl1;
		
	class ExternalReference extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.wfmc.org/2002/XPDL1.0";
		const ROOT = "ExternalReference";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var \NMTOKEN
		 */
		protected $Xref = null;
		/**
		 * @maxOccurs 1 
		 * @var \AnyURI
		 */
		protected $Location = null;
		/**
		 * @maxOccurs 1 
		 * @var \AnyURI
		 */
		protected $xNamespace = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["xref"] = array(
				"prop"=>"Xref",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Xref
			);
			$this->_properties["location"] = array(
				"prop"=>"Location",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Location
			);
			$this->_properties["namespace"] = array(
				"prop"=>"xNamespace",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->xNamespace
			);
		}
		/**
		 * @param \NMTOKEN $val
		 */
		public function setXref (  $val ) {
			$this->Xref = $val;
			$this->_properties["xref"]["text"] = $val;
		}
		/**
		 * @param \AnyURI $val
		 */
		public function setLocation (  $val ) {
			$this->Location = $val;
			$this->_properties["location"]["text"] = $val;
		}
		/**
		 * @param \AnyURI $val
		 */
		public function setxNamespace (  $val ) {
			$this->xNamespace = $val;
			$this->_properties["namespace"]["text"] = $val;
		}
		/**
		 * @return \NMTOKEN
		 */
		public function getXref() {
			return $this->Xref;
		}
		/**
		 * @return \AnyURI
		 */
		public function getLocation() {
			return $this->Location;
		}
		/**
		 * @return \AnyURI
		 */
		public function getxNamespace() {
			return $this->xNamespace;
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
			if( $prop = $this->getXref() ) $xw->writeAttribute( 'xref', $prop );
			if( $prop = $this->getLocation() ) $xw->writeAttribute( 'location', $prop );
			if( $prop = $this->getxNamespace() ) $xw->writeAttribute( 'namespace', $prop );
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
			if( $attr = $xr->getAttribute( 'xref') ) {
			$this->_attributes['xref']['prop'] = 'Xref';
			$this->setXref( $attr ); 
		}
			if( $attr = $xr->getAttribute( 'location') ) {
			$this->_attributes['location']['prop'] = 'Location';
			$this->setLocation( $attr ); 
		}
			if( $attr = $xr->getAttribute( 'namespace') ) {
			$this->_attributes['namespace']['prop'] = 'xNamespace';
			$this->setxNamespace( $attr ); 
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
			if(isset($props["xref"])) {
				$this->setXref($props["xref"]);
			}
			if(isset($props["location"])) {
				$this->setLocation($props["location"]);
			}
			if(isset($props["namespace"])) {
				$this->setxNamespace($props["namespace"]);
			}
		}
		
	}
		

