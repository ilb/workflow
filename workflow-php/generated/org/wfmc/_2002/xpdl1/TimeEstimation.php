<?php
	namespace org\wfmc\_2002\xpdl1;
		
	class TimeEstimation extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.wfmc.org/2002/XPDL1.0";
		const ROOT = "TimeEstimation";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $WaitingTime = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $WorkingTime = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Duration = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["WaitingTime"] = array(
				"prop"=>"WaitingTime",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->WaitingTime
			);
			$this->_properties["WorkingTime"] = array(
				"prop"=>"WorkingTime",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->WorkingTime
			);
			$this->_properties["Duration"] = array(
				"prop"=>"Duration",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Duration
			);
		}
		/**
		 * @param \String $val
		 */
		public function setWaitingTime (  $val ) {
			$this->WaitingTime = $val;
			$this->_properties["WaitingTime"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setWorkingTime (  $val ) {
			$this->WorkingTime = $val;
			$this->_properties["WorkingTime"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setDuration (  $val ) {
			$this->Duration = $val;
			$this->_properties["Duration"]["text"] = $val;
		}
		/**
		 * @return \String
		 */
		public function getWaitingTime() {
			return $this->WaitingTime;
		}
		/**
		 * @return \String
		 */
		public function getWorkingTime() {
			return $this->WorkingTime;
		}
		/**
		 * @return \String
		 */
		public function getDuration() {
			return $this->Duration;
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
			if( ($prop = $this->getWaitingTime()) !== NULL ) {
				$xw->writeElementNS( NULL, 'WaitingTime', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
			}
			if( ($prop = $this->getWorkingTime()) !== NULL ) {
				$xw->writeElementNS( NULL, 'WorkingTime', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
			}
			if( ($prop = $this->getDuration()) !== NULL ) {
				$xw->writeElementNS( NULL, 'Duration', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
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
				case "WaitingTime":
					$this->setWaitingTime( $xr->readString() );
					break;
				case "WorkingTime":
					$this->setWorkingTime( $xr->readString() );
					break;
				case "Duration":
					$this->setDuration( $xr->readString() );
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
			if(isset($props["WaitingTime"])) {
				$this->setWaitingTime($props["WaitingTime"]);
			}
			if(isset($props["WorkingTime"])) {
				$this->setWorkingTime($props["WorkingTime"]);
			}
			if(isset($props["Duration"])) {
				$this->setDuration($props["Duration"]);
			}
		}
		
	}
		

