<?php
	namespace at\together\_2006\xpil1;
		
	class DeadlineInstance extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.together.at/2006/XPIL1.0";
		const ROOT = "DeadlineInstance";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var at\together\_2006\xpil1\InstanceExtendedAttributes
		 */
		protected $InstanceExtendedAttributes = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\Deadline
		 */
		protected $Deadline = null;
		/**
		 * @maxOccurs 1 
		 * @var \Boolean
		 */
		protected $IsExecuted = null;
		/**
		 * @maxOccurs 1 
		 * @var \Boolean
		 */
		protected $IsSynchronous = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $ExceptionName = null;
		/**
		 * @maxOccurs 1 
		 * @var \DateTime
		 */
		protected $TimeLimit = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["InstanceExtendedAttributes"] = array(
				"prop"=>"InstanceExtendedAttributes",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->InstanceExtendedAttributes
			);
			$this->_properties["Deadline"] = array(
				"prop"=>"Deadline",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Deadline
			);
			$this->_properties["IsExecuted"] = array(
				"prop"=>"IsExecuted",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->IsExecuted
			);
			$this->_properties["IsSynchronous"] = array(
				"prop"=>"IsSynchronous",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->IsSynchronous
			);
			$this->_properties["ExceptionName"] = array(
				"prop"=>"ExceptionName",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->ExceptionName
			);
			$this->_properties["TimeLimit"] = array(
				"prop"=>"TimeLimit",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->TimeLimit
			);
		}
		/**
		 * @param at\together\_2006\xpil1\InstanceExtendedAttributes $val
		 */
		public function setInstanceExtendedAttributes ( \at\together\_2006\xpil1\InstanceExtendedAttributes $val ) {
			$this->InstanceExtendedAttributes = $val;
			$this->_properties["InstanceExtendedAttributes"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\Deadline $val
		 */
		public function setDeadline ( \org\wfmc\_2002\xpdl1\Deadline $val ) {
			$this->Deadline = $val;
			$this->_properties["Deadline"]["text"] = $val;
		}
		/**
		 * @param \Boolean $val
		 */
		public function setIsExecuted (  $val ) {
			$this->IsExecuted = $val;
			$this->_properties["IsExecuted"]["text"] = $val;
		}
		/**
		 * @param \Boolean $val
		 */
		public function setIsSynchronous (  $val ) {
			$this->IsSynchronous = $val;
			$this->_properties["IsSynchronous"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setExceptionName (  $val ) {
			$this->ExceptionName = $val;
			$this->_properties["ExceptionName"]["text"] = $val;
		}
		/**
		 * @param \DateTime $val
		 */
		public function setTimeLimit (  $val ) {
			$this->TimeLimit = $val;
			$this->_properties["TimeLimit"]["text"] = $val;
		}
		/**
		 * @return at\together\_2006\xpil1\InstanceExtendedAttributes
		 */
		public function getInstanceExtendedAttributes() {
			return $this->InstanceExtendedAttributes;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\Deadline
		 */
		public function getDeadline() {
			return $this->Deadline;
		}
		/**
		 * @return \Boolean
		 */
		public function getIsExecuted() {
			return $this->IsExecuted;
		}
		/**
		 * @return \Boolean
		 */
		public function getIsSynchronous() {
			return $this->IsSynchronous;
		}
		/**
		 * @return \String
		 */
		public function getExceptionName() {
			return $this->ExceptionName;
		}
		/**
		 * @return \DateTime
		 */
		public function getTimeLimit() {
			return $this->TimeLimit;
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
			if( $prop = $this->getIsExecuted() ) $xw->writeAttribute( 'IsExecuted', $prop );
			if( $prop = $this->getIsSynchronous() ) $xw->writeAttribute( 'IsSynchronous', $prop );
			if( $prop = $this->getExceptionName() ) $xw->writeAttribute( 'ExceptionName', $prop );
			if( $prop = $this->getTimeLimit() ) $xw->writeAttribute( 'TimeLimit', $prop );
		}
		/**
		* Вывод элементов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function elementsToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::elementsToXmlWriter( $xw, $xmlname, $xmlns );
			if( ($prop = $this->getInstanceExtendedAttributes()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getDeadline()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
		}

		/**
		 * Чтение атрибутов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function attributesFromXmlReader ( \XMLReader &$xr ) {
			if( $attr = $xr->getAttribute( 'IsExecuted') ) {
			$this->_attributes['IsExecuted']['prop'] = 'IsExecuted';
			$this->setIsExecuted( $attr ); 
		}
			if( $attr = $xr->getAttribute( 'IsSynchronous') ) {
			$this->_attributes['IsSynchronous']['prop'] = 'IsSynchronous';
			$this->setIsSynchronous( $attr ); 
		}
			if( $attr = $xr->getAttribute( 'ExceptionName') ) {
			$this->_attributes['ExceptionName']['prop'] = 'ExceptionName';
			$this->setExceptionName( $attr ); 
		}
			if( $attr = $xr->getAttribute( 'TimeLimit') ) {
			$this->_attributes['TimeLimit']['prop'] = 'TimeLimit';
			$this->setTimeLimit( $attr ); 
		}
			parent::attributesFromXmlReader( $xr );	
		}
				
		/**
		 * Чтение элементов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function elementsFromXmlReader ( \XMLReader &$xr ) {
			switch ( $xr->localName ) {
				case "InstanceExtendedAttributes":
					$InstanceExtendedAttributes = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\InstanceExtendedAttributes");
					$this->setInstanceExtendedAttributes( $InstanceExtendedAttributes->fromXmlReader( $xr ) );
					break;
				case "Deadline":
					$Deadline = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Deadline");
					$this->setDeadline( $Deadline->fromXmlReader( $xr ) );
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
			if(isset($props["InstanceExtendedAttributes"])) {
				$InstanceExtendedAttributes = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\InstanceExtendedAttributes");
				$InstanceExtendedAttributes->fromJSON($props["InstanceExtendedAttributes"]);
				$this->setInstanceExtendedAttributes($InstanceExtendedAttributes);
			}
			if(isset($props["Deadline"])) {
				$Deadline = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\Deadline");
				$Deadline->fromJSON($props["Deadline"]);
				$this->setDeadline($Deadline);
			}
			if(isset($props["IsExecuted"])) {
				$this->setIsExecuted($props["IsExecuted"]);
			}
			if(isset($props["IsSynchronous"])) {
				$this->setIsSynchronous($props["IsSynchronous"]);
			}
			if(isset($props["ExceptionName"])) {
				$this->setExceptionName($props["ExceptionName"]);
			}
			if(isset($props["TimeLimit"])) {
				$this->setTimeLimit($props["TimeLimit"]);
			}
		}
		
	}
		

