<?php
	namespace org\wfmc\_2002\xpdl1;
		
	class ProcessHeader extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.wfmc.org/2002/XPDL1.0";
		const ROOT = "ProcessHeader";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Created = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Description = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Priority = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Limit = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $ValidFrom = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $ValidTo = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\TimeEstimation
		 */
		protected $TimeEstimation = null;
		/**
		 * @maxOccurs 1 
		 * @var \NMTOKEN
		 */
		protected $DurationUnit = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["Created"] = array(
				"prop"=>"Created",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Created
			);
			$this->_properties["Description"] = array(
				"prop"=>"Description",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Description
			);
			$this->_properties["Priority"] = array(
				"prop"=>"Priority",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Priority
			);
			$this->_properties["Limit"] = array(
				"prop"=>"Limit",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Limit
			);
			$this->_properties["ValidFrom"] = array(
				"prop"=>"ValidFrom",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->ValidFrom
			);
			$this->_properties["ValidTo"] = array(
				"prop"=>"ValidTo",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->ValidTo
			);
			$this->_properties["TimeEstimation"] = array(
				"prop"=>"TimeEstimation",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->TimeEstimation
			);
			$this->_properties["DurationUnit"] = array(
				"prop"=>"DurationUnit",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->DurationUnit
			);
		}
		/**
		 * @param \String $val
		 */
		public function setCreated (  $val ) {
			$this->Created = $val;
			$this->_properties["Created"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setDescription (  $val ) {
			$this->Description = $val;
			$this->_properties["Description"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setPriority (  $val ) {
			$this->Priority = $val;
			$this->_properties["Priority"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setLimit (  $val ) {
			$this->Limit = $val;
			$this->_properties["Limit"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setValidFrom (  $val ) {
			$this->ValidFrom = $val;
			$this->_properties["ValidFrom"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setValidTo (  $val ) {
			$this->ValidTo = $val;
			$this->_properties["ValidTo"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\TimeEstimation $val
		 */
		public function setTimeEstimation ( \org\wfmc\_2002\xpdl1\TimeEstimation $val ) {
			$this->TimeEstimation = $val;
			$this->_properties["TimeEstimation"]["text"] = $val;
		}
		/**
		 * @param \NMTOKEN $val
		 */
		public function setDurationUnit (  $val ) {
			$this->DurationUnit = $val;
			$this->_properties["DurationUnit"]["text"] = $val;
		}
		/**
		 * @return \String
		 */
		public function getCreated() {
			return $this->Created;
		}
		/**
		 * @return \String
		 */
		public function getDescription() {
			return $this->Description;
		}
		/**
		 * @return \String
		 */
		public function getPriority() {
			return $this->Priority;
		}
		/**
		 * @return \String
		 */
		public function getLimit() {
			return $this->Limit;
		}
		/**
		 * @return \String
		 */
		public function getValidFrom() {
			return $this->ValidFrom;
		}
		/**
		 * @return \String
		 */
		public function getValidTo() {
			return $this->ValidTo;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\TimeEstimation
		 */
		public function getTimeEstimation() {
			return $this->TimeEstimation;
		}
		/**
		 * @return \NMTOKEN
		 */
		public function getDurationUnit() {
			return $this->DurationUnit;
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
			if( $prop = $this->getDurationUnit() ) $xw->writeAttribute( 'DurationUnit', $prop );
		}
		/**
		* Вывод элементов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function elementsToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::elementsToXmlWriter( $xw, $xmlname, $xmlns );
			if( ($prop = $this->getCreated()) !== NULL ) {
				$xw->writeElementNS( NULL, 'Created', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
			}
			if( ($prop = $this->getDescription()) !== NULL ) {
				$xw->writeElementNS( NULL, 'Description', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
			}
			if( ($prop = $this->getPriority()) !== NULL ) {
				$xw->writeElementNS( NULL, 'Priority', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
			}
			if( ($prop = $this->getLimit()) !== NULL ) {
				$xw->writeElementNS( NULL, 'Limit', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
			}
			if( ($prop = $this->getValidFrom()) !== NULL ) {
				$xw->writeElementNS( NULL, 'ValidFrom', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
			}
			if( ($prop = $this->getValidTo()) !== NULL ) {
				$xw->writeElementNS( NULL, 'ValidTo', 'http://www.wfmc.org/2002/XPDL1.0', $prop );
			}
			if( ($prop = $this->getTimeEstimation()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
		}

		/**
		 * Чтение атрибутов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function attributesFromXmlReader ( \XMLReader &$xr ) {
			if( $attr = $xr->getAttribute( 'DurationUnit') ) {
			$this->_attributes['DurationUnit']['prop'] = 'DurationUnit';
			$this->setDurationUnit( $attr ); 
		}
			parent::attributesFromXmlReader( $xr );	
		}
				
		/**
		 * Чтение элементов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function elementsFromXmlReader ( \XMLReader &$xr ) {
			switch ( $xr->localName ) {
				case "Created":
					$this->setCreated( $xr->readString() );
					break;
				case "Description":
					$this->setDescription( $xr->readString() );
					break;
				case "Priority":
					$this->setPriority( $xr->readString() );
					break;
				case "Limit":
					$this->setLimit( $xr->readString() );
					break;
				case "ValidFrom":
					$this->setValidFrom( $xr->readString() );
					break;
				case "ValidTo":
					$this->setValidTo( $xr->readString() );
					break;
				case "TimeEstimation":
					$TimeEstimation = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\TimeEstimation");
					$this->setTimeEstimation( $TimeEstimation->fromXmlReader( $xr ) );
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
			if(isset($props["Created"])) {
				$this->setCreated($props["Created"]);
			}
			if(isset($props["Description"])) {
				$this->setDescription($props["Description"]);
			}
			if(isset($props["Priority"])) {
				$this->setPriority($props["Priority"]);
			}
			if(isset($props["Limit"])) {
				$this->setLimit($props["Limit"]);
			}
			if(isset($props["ValidFrom"])) {
				$this->setValidFrom($props["ValidFrom"]);
			}
			if(isset($props["ValidTo"])) {
				$this->setValidTo($props["ValidTo"]);
			}
			if(isset($props["TimeEstimation"])) {
				$TimeEstimation = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\TimeEstimation");
				$TimeEstimation->fromJSON($props["TimeEstimation"]);
				$this->setTimeEstimation($TimeEstimation);
			}
			if(isset($props["DurationUnit"])) {
				$this->setDurationUnit($props["DurationUnit"]);
			}
		}
		
	}
		

