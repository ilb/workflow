<?php
	namespace org\wfmc\_2002\xpdl1;
		
	class Deadline extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.wfmc.org/2002/XPDL1.0";
		const ROOT = "Deadline";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var \AnySimpleType
		 */
		protected $DeadlineCondition = null;
		/**
		 * @maxOccurs 1 
		 * @var \AnySimpleType
		 */
		protected $ExceptionName = null;
		/**
		 * @maxOccurs 1 
		 * @var \NMTOKEN
		 */
		protected $Execution = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["DeadlineCondition"] = array(
				"prop"=>"DeadlineCondition",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->DeadlineCondition
			);
			$this->_properties["ExceptionName"] = array(
				"prop"=>"ExceptionName",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->ExceptionName
			);
			$this->_properties["Execution"] = array(
				"prop"=>"Execution",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Execution
			);
		}
		/**
		 * @param \AnySimpleType $val
		 */
		public function setDeadlineCondition (  $val ) {
			$this->DeadlineCondition = $val;
			$this->_properties["DeadlineCondition"]["text"] = $val;
		}
		/**
		 * @param \AnySimpleType $val
		 */
		public function setExceptionName (  $val ) {
			$this->ExceptionName = $val;
			$this->_properties["ExceptionName"]["text"] = $val;
		}
		/**
		 * @param \NMTOKEN $val
		 */
		public function setExecution (  $val ) {
			$this->Execution = $val;
			$this->_properties["Execution"]["text"] = $val;
		}
		/**
		 * @return \AnySimpleType
		 */
		public function getDeadlineCondition() {
			return $this->DeadlineCondition;
		}
		/**
		 * @return \AnySimpleType
		 */
		public function getExceptionName() {
			return $this->ExceptionName;
		}
		/**
		 * @return \NMTOKEN
		 */
		public function getExecution() {
			return $this->Execution;
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
			if( $prop = $this->getExecution() ) $xw->writeAttribute( 'Execution', $prop );
		}
		/**
		* Вывод элементов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function elementsToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::elementsToXmlWriter( $xw, $xmlname, $xmlns );
			if( ($prop = $this->getDeadlineCondition()) !== NULL ) {
				$xw->writeElementNS( NULL, 'DeadlineCondition', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
			}
			if( ($prop = $this->getExceptionName()) !== NULL ) {
				$xw->writeElementNS( NULL, 'ExceptionName', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
			}
		}

		/**
		 * Чтение атрибутов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function attributesFromXmlReader ( \XMLReader &$xr ) {
			if( $attr = $xr->getAttribute( 'Execution') ) {
			$this->_attributes['Execution']['prop'] = 'Execution';
			$this->setExecution( $attr ); 
		}
			parent::attributesFromXmlReader( $xr );	
		}
				
		/**
		 * Чтение элементов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function elementsFromXmlReader ( \XMLReader &$xr ) {
			switch ( $xr->localName ) {
				case "DeadlineCondition":
					$this->setDeadlineCondition( $xr->readString() );
					break;
				case "ExceptionName":
					$this->setExceptionName( $xr->readString() );
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
			if(isset($props["DeadlineCondition"])) {
				$this->setDeadlineCondition($props["DeadlineCondition"]);
			}
			if(isset($props["ExceptionName"])) {
				$this->setExceptionName($props["ExceptionName"]);
			}
			if(isset($props["Execution"])) {
				$this->setExecution($props["Execution"]);
			}
		}
		
	}
		

