<?php
	namespace org\wfmc\_2002\xpdl1;
		
	class DataType extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.wfmc.org/2002/XPDL1.0";
		const ROOT = "DataType";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\BasicType
		 */
		protected $BasicType = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\DeclaredType
		 */
		protected $DeclaredType = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\SchemaType
		 */
		protected $SchemaType = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\ExternalReference
		 */
		protected $ExternalReference = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\RecordType
		 */
		protected $RecordType = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\UnionType
		 */
		protected $UnionType = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\EnumerationType
		 */
		protected $EnumerationType = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\ArrayType
		 */
		protected $ArrayType = null;
		/**
		 * @maxOccurs 1 
		 * @var org\wfmc\_2002\xpdl1\ListType
		 */
		protected $ListType = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["BasicType"] = array(
				"prop"=>"BasicType",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->BasicType
			);
			$this->_properties["DeclaredType"] = array(
				"prop"=>"DeclaredType",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->DeclaredType
			);
			$this->_properties["SchemaType"] = array(
				"prop"=>"SchemaType",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->SchemaType
			);
			$this->_properties["ExternalReference"] = array(
				"prop"=>"ExternalReference",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->ExternalReference
			);
			$this->_properties["RecordType"] = array(
				"prop"=>"RecordType",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->RecordType
			);
			$this->_properties["UnionType"] = array(
				"prop"=>"UnionType",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->UnionType
			);
			$this->_properties["EnumerationType"] = array(
				"prop"=>"EnumerationType",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->EnumerationType
			);
			$this->_properties["ArrayType"] = array(
				"prop"=>"ArrayType",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->ArrayType
			);
			$this->_properties["ListType"] = array(
				"prop"=>"ListType",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->ListType
			);
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\BasicType $val
		 */
		public function setBasicType ( \org\wfmc\_2002\xpdl1\BasicType $val ) {
			$this->BasicType = $val;
			$this->_properties["BasicType"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\DeclaredType $val
		 */
		public function setDeclaredType ( \org\wfmc\_2002\xpdl1\DeclaredType $val ) {
			$this->DeclaredType = $val;
			$this->_properties["DeclaredType"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\SchemaType $val
		 */
		public function setSchemaType ( \org\wfmc\_2002\xpdl1\SchemaType $val ) {
			$this->SchemaType = $val;
			$this->_properties["SchemaType"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\ExternalReference $val
		 */
		public function setExternalReference ( \org\wfmc\_2002\xpdl1\ExternalReference $val ) {
			$this->ExternalReference = $val;
			$this->_properties["ExternalReference"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\RecordType $val
		 */
		public function setRecordType ( \org\wfmc\_2002\xpdl1\RecordType $val ) {
			$this->RecordType = $val;
			$this->_properties["RecordType"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\UnionType $val
		 */
		public function setUnionType ( \org\wfmc\_2002\xpdl1\UnionType $val ) {
			$this->UnionType = $val;
			$this->_properties["UnionType"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\EnumerationType $val
		 */
		public function setEnumerationType ( \org\wfmc\_2002\xpdl1\EnumerationType $val ) {
			$this->EnumerationType = $val;
			$this->_properties["EnumerationType"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\ArrayType $val
		 */
		public function setArrayType ( \org\wfmc\_2002\xpdl1\ArrayType $val ) {
			$this->ArrayType = $val;
			$this->_properties["ArrayType"]["text"] = $val;
		}
		/**
		 * @param org\wfmc\_2002\xpdl1\ListType $val
		 */
		public function setListType ( \org\wfmc\_2002\xpdl1\ListType $val ) {
			$this->ListType = $val;
			$this->_properties["ListType"]["text"] = $val;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\BasicType
		 */
		public function getBasicType() {
			return $this->BasicType;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\DeclaredType
		 */
		public function getDeclaredType() {
			return $this->DeclaredType;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\SchemaType
		 */
		public function getSchemaType() {
			return $this->SchemaType;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\ExternalReference
		 */
		public function getExternalReference() {
			return $this->ExternalReference;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\RecordType
		 */
		public function getRecordType() {
			return $this->RecordType;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\UnionType
		 */
		public function getUnionType() {
			return $this->UnionType;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\EnumerationType
		 */
		public function getEnumerationType() {
			return $this->EnumerationType;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\ArrayType
		 */
		public function getArrayType() {
			return $this->ArrayType;
		}
		/**
		 * @return org\wfmc\_2002\xpdl1\ListType
		 */
		public function getListType() {
			return $this->ListType;
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
			if( ($prop = $this->getBasicType()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getDeclaredType()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getSchemaType()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getExternalReference()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getRecordType()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getUnionType()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getEnumerationType()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getArrayType()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getListType()) !== NULL ) {
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
				case "BasicType":
					$BasicType = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\BasicType");
					$this->setBasicType( $BasicType->fromXmlReader( $xr ) );
					break;
				case "DeclaredType":
					$DeclaredType = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\DeclaredType");
					$this->setDeclaredType( $DeclaredType->fromXmlReader( $xr ) );
					break;
				case "SchemaType":
					$SchemaType = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\SchemaType");
					$this->setSchemaType( $SchemaType->fromXmlReader( $xr ) );
					break;
				case "ExternalReference":
					$ExternalReference = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ExternalReference");
					$this->setExternalReference( $ExternalReference->fromXmlReader( $xr ) );
					break;
				case "RecordType":
					$RecordType = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\RecordType");
					$this->setRecordType( $RecordType->fromXmlReader( $xr ) );
					break;
				case "UnionType":
					$UnionType = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\UnionType");
					$this->setUnionType( $UnionType->fromXmlReader( $xr ) );
					break;
				case "EnumerationType":
					$EnumerationType = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\EnumerationType");
					$this->setEnumerationType( $EnumerationType->fromXmlReader( $xr ) );
					break;
				case "ArrayType":
					$ArrayType = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ArrayType");
					$this->setArrayType( $ArrayType->fromXmlReader( $xr ) );
					break;
				case "ListType":
					$ListType = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ListType");
					$this->setListType( $ListType->fromXmlReader( $xr ) );
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
			if(isset($props["BasicType"])) {
				$BasicType = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\BasicType");
				$BasicType->fromJSON($props["BasicType"]);
				$this->setBasicType($BasicType);
			}
			if(isset($props["DeclaredType"])) {
				$DeclaredType = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\DeclaredType");
				$DeclaredType->fromJSON($props["DeclaredType"]);
				$this->setDeclaredType($DeclaredType);
			}
			if(isset($props["SchemaType"])) {
				$SchemaType = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\SchemaType");
				$SchemaType->fromJSON($props["SchemaType"]);
				$this->setSchemaType($SchemaType);
			}
			if(isset($props["ExternalReference"])) {
				$ExternalReference = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ExternalReference");
				$ExternalReference->fromJSON($props["ExternalReference"]);
				$this->setExternalReference($ExternalReference);
			}
			if(isset($props["RecordType"])) {
				$RecordType = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\RecordType");
				$RecordType->fromJSON($props["RecordType"]);
				$this->setRecordType($RecordType);
			}
			if(isset($props["UnionType"])) {
				$UnionType = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\UnionType");
				$UnionType->fromJSON($props["UnionType"]);
				$this->setUnionType($UnionType);
			}
			if(isset($props["EnumerationType"])) {
				$EnumerationType = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\EnumerationType");
				$EnumerationType->fromJSON($props["EnumerationType"]);
				$this->setEnumerationType($EnumerationType);
			}
			if(isset($props["ArrayType"])) {
				$ArrayType = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ArrayType");
				$ArrayType->fromJSON($props["ArrayType"]);
				$this->setArrayType($ArrayType);
			}
			if(isset($props["ListType"])) {
				$ListType = \Adaptor_Bindings::create("\\org\\wfmc\\_2002\\xpdl1\\ListType");
				$ListType->fromJSON($props["ListType"]);
				$this->setListType($ListType);
			}
		}
		
	}
		

