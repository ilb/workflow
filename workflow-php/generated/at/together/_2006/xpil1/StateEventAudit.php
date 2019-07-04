<?php
	namespace at\together\_2006\xpil1;
		
	class StateEventAudit extends \at\together\_2006\xpil1\EventAudit {
			
		const NS = "http://www.together.at/2006/XPIL1.0";
		const ROOT = "StateEventAudit";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $OldState = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $NewState = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["OldState"] = array(
				"prop"=>"OldState",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->OldState
			);
			$this->_properties["NewState"] = array(
				"prop"=>"NewState",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->NewState
			);
		}
		/**
		 * @param \String $val
		 */
		public function setOldState (  $val ) {
			$this->OldState = $val;
			$this->_properties["OldState"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setNewState (  $val ) {
			$this->NewState = $val;
			$this->_properties["NewState"]["text"] = $val;
		}
		/**
		 * @return \String
		 */
		public function getOldState() {
			return $this->OldState;
		}
		/**
		 * @return \String
		 */
		public function getNewState() {
			return $this->NewState;
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
			if( $prop = $this->getOldState() ) $xw->writeAttribute( 'OldState', $prop );
			if( $prop = $this->getNewState() ) $xw->writeAttribute( 'NewState', $prop );
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
			if( $attr = $xr->getAttribute( 'OldState') ) {
			$this->_attributes['OldState']['prop'] = 'OldState';
			$this->setOldState( $attr ); 
		}
			if( $attr = $xr->getAttribute( 'NewState') ) {
			$this->_attributes['NewState']['prop'] = 'NewState';
			$this->setNewState( $attr ); 
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
			if(isset($props["OldState"])) {
				$this->setOldState($props["OldState"]);
			}
			if(isset($props["NewState"])) {
				$this->setNewState($props["NewState"]);
			}
		}
		
	}
		

