<?php
	namespace org\wfmc\_2002\xpdl1;
		
	class Split extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.wfmc.org/2002/XPDL1.0";
		const ROOT = "Split";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\TransitionRefs
		 */
		protected $TransitionRefs = null;
		/**
		 * @maxOccurs 1 
		 * @var \NMTOKEN
		 */
		protected $Type = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["TransitionRefs"] = array(
				"prop"=>"TransitionRefs",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->TransitionRefs
			);
			$this->_properties["Type"] = array(
				"prop"=>"Type",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Type
			);
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\TransitionRefs $val
		 */
		public function setTransitionRefs ( \org\wfmc\_2002\xpdl1\TransitionRefs $val ) {
			$this->TransitionRefs = $val;
			$this->_properties["TransitionRefs"]["text"] = $val;
		}
		/**
		 * @param \NMTOKEN $val
		 */
		public function setType (  $val ) {
			$this->Type = $val;
			$this->_properties["Type"]["text"] = $val;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\TransitionRefs
		 */
		public function getTransitionRefs() {
			return $this->TransitionRefs;
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
			if( ($prop = $this->getTransitionRefs()) !== NULL ) {
					$prop->toXmlWriter( $xw );
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
				case "TransitionRefs":
					$TransitionRefs = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\TransitionRefs");
					$this->setTransitionRefs( $TransitionRefs->fromXmlReader( $xr ) );
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
			if(isset($props["TransitionRefs"])) {
				$TransitionRefs = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\TransitionRefs");
				$TransitionRefs->fromJSON($props["TransitionRefs"]);
				$this->setTransitionRefs($TransitionRefs);
			}
			if(isset($props["Type"])) {
				$this->setType($props["Type"]);
			}
		}
		
	}
		

