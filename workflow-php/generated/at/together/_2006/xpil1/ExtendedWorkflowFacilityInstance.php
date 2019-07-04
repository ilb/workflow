<?php
	namespace at\together\_2006\xpil1;
		
	class ExtendedWorkflowFacilityInstance extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "http://www.together.at/2006/XPIL1.0";
		const ROOT = "ExtendedWorkflowFacilityInstance";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var at\together\_2006\xpil1\Header
		 */
		protected $Header = null;
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\User[]
		 */
		protected $User = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\Users[]
		 */
		protected $Users = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\PackageInstance[]
		 */
		protected $PackageInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\PackageInstances[]
		 */
		protected $PackageInstances = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\WorkflowProcessFactoryInstance[]
		 */
		protected $WorkflowProcessFactoryInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\WorkflowProcessFactoryInstances[]
		 */
		protected $WorkflowProcessFactoryInstances = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\WorkflowProcessInstance[]
		 */
		protected $MainWorkflowProcessInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\WorkflowProcessInstance[]
		 */
		protected $SubWorkflowProcessInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\WorkflowProcessInstances[]
		 */
		protected $WorkflowProcessInstances = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\ActivityInstance[]
		 */
		protected $ManualActivityInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\ActivityInstance[]
		 */
		protected $ToolActivityInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\ActivityInstance[]
		 */
		protected $BlockActivityInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\ActivityInstance[]
		 */
		protected $RouteActivityInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\ActivityInstance[]
		 */
		protected $SubFlowActivityInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\ActivityInstances[]
		 */
		protected $ActivityInstances = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\AssignmentInstance[]
		 */
		protected $AssignmentInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\AssignmentInstances[]
		 */
		protected $AssignmentInstances = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DataInstance[]
		 */
		protected $StringDataInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DataInstance[]
		 */
		protected $StringArrayDataInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DataInstance[]
		 */
		protected $BooleanDataInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DataInstance[]
		 */
		protected $BooleanArrayDataInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DataInstance[]
		 */
		protected $DateDataInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DataInstance[]
		 */
		protected $DateArrayDataInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DataInstance[]
		 */
		protected $DateTimeDataInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DataInstance[]
		 */
		protected $DateTimeArrayDataInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DataInstance[]
		 */
		protected $TimeDataInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DataInstance[]
		 */
		protected $TimeArrayDataInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DataInstance[]
		 */
		protected $LongDataInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DataInstance[]
		 */
		protected $LongArrayDataInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DataInstance[]
		 */
		protected $DoubleDataInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DataInstance[]
		 */
		protected $DoubleArrayDataInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DataInstance[]
		 */
		protected $ByteArrayDataInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DataInstance[]
		 */
		protected $AnyDataInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DataInstance[]
		 */
		protected $ComplexDataInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DataInstance[]
		 */
		protected $SchemaDataInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DataInstances[]
		 */
		protected $DataInstances = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DeadlineInstance[]
		 */
		protected $DeadlineInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DeadlineInstances[]
		 */
		protected $DeadlineInstances = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\InstanceExtendedAttribute[]
		 */
		protected $InstanceExtendedAttribute = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\InstanceExtendedAttributes[]
		 */
		protected $InstanceExtendedAttributes = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\DataSignature[]
		 */
		protected $DataSignature = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\ContextSignature[]
		 */
		protected $ContextSignature = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\LanguageMapping[]
		 */
		protected $LanguageMapping = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\LanguageMappings[]
		 */
		protected $LanguageMappings = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\NextInfoElement[]
		 */
		protected $NextInfoElement = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\NextInfo[]
		 */
		protected $NextInfo = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\PreviousActivityInstance[]
		 */
		protected $PreviousActivityInstance = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\EventAudits[]
		 */
		protected $EventAudits = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\EventAudit[]
		 */
		protected $StateEventAudit = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\EventAudit[]
		 */
		protected $DataEventAudit = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\EventAudit[]
		 */
		protected $AssignmentEventAudit = [];
		/**
		 * @maxOccurs unbounded 
		 * @var at\together\_2006\xpil1\EventAudit[]
		 */
		protected $CreateProcessEventAudit = [];
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Id = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Name = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["Header"] = array(
				"prop"=>"Header",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Header
			);
			$this->_properties["User"] = array(
				"prop"=>"User",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->User
			);
			$this->_properties["Users"] = array(
				"prop"=>"Users",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Users
			);
			$this->_properties["PackageInstance"] = array(
				"prop"=>"PackageInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->PackageInstance
			);
			$this->_properties["PackageInstances"] = array(
				"prop"=>"PackageInstances",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->PackageInstances
			);
			$this->_properties["WorkflowProcessFactoryInstance"] = array(
				"prop"=>"WorkflowProcessFactoryInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->WorkflowProcessFactoryInstance
			);
			$this->_properties["WorkflowProcessFactoryInstances"] = array(
				"prop"=>"WorkflowProcessFactoryInstances",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->WorkflowProcessFactoryInstances
			);
			$this->_properties["MainWorkflowProcessInstance"] = array(
				"prop"=>"MainWorkflowProcessInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->MainWorkflowProcessInstance
			);
			$this->_properties["SubWorkflowProcessInstance"] = array(
				"prop"=>"SubWorkflowProcessInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->SubWorkflowProcessInstance
			);
			$this->_properties["WorkflowProcessInstances"] = array(
				"prop"=>"WorkflowProcessInstances",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->WorkflowProcessInstances
			);
			$this->_properties["ManualActivityInstance"] = array(
				"prop"=>"ManualActivityInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->ManualActivityInstance
			);
			$this->_properties["ToolActivityInstance"] = array(
				"prop"=>"ToolActivityInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->ToolActivityInstance
			);
			$this->_properties["BlockActivityInstance"] = array(
				"prop"=>"BlockActivityInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->BlockActivityInstance
			);
			$this->_properties["RouteActivityInstance"] = array(
				"prop"=>"RouteActivityInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->RouteActivityInstance
			);
			$this->_properties["SubFlowActivityInstance"] = array(
				"prop"=>"SubFlowActivityInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->SubFlowActivityInstance
			);
			$this->_properties["ActivityInstances"] = array(
				"prop"=>"ActivityInstances",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->ActivityInstances
			);
			$this->_properties["AssignmentInstance"] = array(
				"prop"=>"AssignmentInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->AssignmentInstance
			);
			$this->_properties["AssignmentInstances"] = array(
				"prop"=>"AssignmentInstances",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->AssignmentInstances
			);
			$this->_properties["StringDataInstance"] = array(
				"prop"=>"StringDataInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->StringDataInstance
			);
			$this->_properties["StringArrayDataInstance"] = array(
				"prop"=>"StringArrayDataInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->StringArrayDataInstance
			);
			$this->_properties["BooleanDataInstance"] = array(
				"prop"=>"BooleanDataInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->BooleanDataInstance
			);
			$this->_properties["BooleanArrayDataInstance"] = array(
				"prop"=>"BooleanArrayDataInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->BooleanArrayDataInstance
			);
			$this->_properties["DateDataInstance"] = array(
				"prop"=>"DateDataInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->DateDataInstance
			);
			$this->_properties["DateArrayDataInstance"] = array(
				"prop"=>"DateArrayDataInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->DateArrayDataInstance
			);
			$this->_properties["DateTimeDataInstance"] = array(
				"prop"=>"DateTimeDataInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->DateTimeDataInstance
			);
			$this->_properties["DateTimeArrayDataInstance"] = array(
				"prop"=>"DateTimeArrayDataInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->DateTimeArrayDataInstance
			);
			$this->_properties["TimeDataInstance"] = array(
				"prop"=>"TimeDataInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->TimeDataInstance
			);
			$this->_properties["TimeArrayDataInstance"] = array(
				"prop"=>"TimeArrayDataInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->TimeArrayDataInstance
			);
			$this->_properties["LongDataInstance"] = array(
				"prop"=>"LongDataInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->LongDataInstance
			);
			$this->_properties["LongArrayDataInstance"] = array(
				"prop"=>"LongArrayDataInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->LongArrayDataInstance
			);
			$this->_properties["DoubleDataInstance"] = array(
				"prop"=>"DoubleDataInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->DoubleDataInstance
			);
			$this->_properties["DoubleArrayDataInstance"] = array(
				"prop"=>"DoubleArrayDataInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->DoubleArrayDataInstance
			);
			$this->_properties["ByteArrayDataInstance"] = array(
				"prop"=>"ByteArrayDataInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->ByteArrayDataInstance
			);
			$this->_properties["AnyDataInstance"] = array(
				"prop"=>"AnyDataInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->AnyDataInstance
			);
			$this->_properties["ComplexDataInstance"] = array(
				"prop"=>"ComplexDataInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->ComplexDataInstance
			);
			$this->_properties["SchemaDataInstance"] = array(
				"prop"=>"SchemaDataInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->SchemaDataInstance
			);
			$this->_properties["DataInstances"] = array(
				"prop"=>"DataInstances",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->DataInstances
			);
			$this->_properties["DeadlineInstance"] = array(
				"prop"=>"DeadlineInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->DeadlineInstance
			);
			$this->_properties["DeadlineInstances"] = array(
				"prop"=>"DeadlineInstances",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->DeadlineInstances
			);
			$this->_properties["InstanceExtendedAttribute"] = array(
				"prop"=>"InstanceExtendedAttribute",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->InstanceExtendedAttribute
			);
			$this->_properties["InstanceExtendedAttributes"] = array(
				"prop"=>"InstanceExtendedAttributes",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->InstanceExtendedAttributes
			);
			$this->_properties["DataSignature"] = array(
				"prop"=>"DataSignature",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->DataSignature
			);
			$this->_properties["ContextSignature"] = array(
				"prop"=>"ContextSignature",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->ContextSignature
			);
			$this->_properties["LanguageMapping"] = array(
				"prop"=>"LanguageMapping",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->LanguageMapping
			);
			$this->_properties["LanguageMappings"] = array(
				"prop"=>"LanguageMappings",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->LanguageMappings
			);
			$this->_properties["NextInfoElement"] = array(
				"prop"=>"NextInfoElement",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->NextInfoElement
			);
			$this->_properties["NextInfo"] = array(
				"prop"=>"NextInfo",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->NextInfo
			);
			$this->_properties["PreviousActivityInstance"] = array(
				"prop"=>"PreviousActivityInstance",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->PreviousActivityInstance
			);
			$this->_properties["EventAudits"] = array(
				"prop"=>"EventAudits",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->EventAudits
			);
			$this->_properties["StateEventAudit"] = array(
				"prop"=>"StateEventAudit",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->StateEventAudit
			);
			$this->_properties["DataEventAudit"] = array(
				"prop"=>"DataEventAudit",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->DataEventAudit
			);
			$this->_properties["AssignmentEventAudit"] = array(
				"prop"=>"AssignmentEventAudit",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->AssignmentEventAudit
			);
			$this->_properties["CreateProcessEventAudit"] = array(
				"prop"=>"CreateProcessEventAudit",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->CreateProcessEventAudit
			);
			$this->_properties["Id"] = array(
				"prop"=>"Id",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Id
			);
			$this->_properties["Name"] = array(
				"prop"=>"Name",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Name
			);
		}
		/**
		 * @param at\together\_2006\xpil1\Header $val
		 */
		public function setHeader ( \at\together\_2006\xpil1\Header $val ) {
			$this->Header = $val;
			$this->_properties["Header"]["text"] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\User $val
		 */
		public function setUser ( \at\together\_2006\xpil1\User $val ) {
			$this->User[] = $val;
			$this->_properties["User"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\User[]
		 */
		public function setUserArray ( array $vals ) {
			$this->User = $vals;
			$this->_properties["User"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\Users $val
		 */
		public function setUsers ( \at\together\_2006\xpil1\Users $val ) {
			$this->Users[] = $val;
			$this->_properties["Users"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\Users[]
		 */
		public function setUsersArray ( array $vals ) {
			$this->Users = $vals;
			$this->_properties["Users"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\PackageInstance $val
		 */
		public function setPackageInstance ( \at\together\_2006\xpil1\PackageInstance $val ) {
			$this->PackageInstance[] = $val;
			$this->_properties["PackageInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\PackageInstance[]
		 */
		public function setPackageInstanceArray ( array $vals ) {
			$this->PackageInstance = $vals;
			$this->_properties["PackageInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\PackageInstances $val
		 */
		public function setPackageInstances ( \at\together\_2006\xpil1\PackageInstances $val ) {
			$this->PackageInstances[] = $val;
			$this->_properties["PackageInstances"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\PackageInstances[]
		 */
		public function setPackageInstancesArray ( array $vals ) {
			$this->PackageInstances = $vals;
			$this->_properties["PackageInstances"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\WorkflowProcessFactoryInstance $val
		 */
		public function setWorkflowProcessFactoryInstance ( \at\together\_2006\xpil1\WorkflowProcessFactoryInstance $val ) {
			$this->WorkflowProcessFactoryInstance[] = $val;
			$this->_properties["WorkflowProcessFactoryInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\WorkflowProcessFactoryInstance[]
		 */
		public function setWorkflowProcessFactoryInstanceArray ( array $vals ) {
			$this->WorkflowProcessFactoryInstance = $vals;
			$this->_properties["WorkflowProcessFactoryInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\WorkflowProcessFactoryInstances $val
		 */
		public function setWorkflowProcessFactoryInstances ( \at\together\_2006\xpil1\WorkflowProcessFactoryInstances $val ) {
			$this->WorkflowProcessFactoryInstances[] = $val;
			$this->_properties["WorkflowProcessFactoryInstances"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\WorkflowProcessFactoryInstances[]
		 */
		public function setWorkflowProcessFactoryInstancesArray ( array $vals ) {
			$this->WorkflowProcessFactoryInstances = $vals;
			$this->_properties["WorkflowProcessFactoryInstances"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\WorkflowProcessInstance $val
		 */
		public function setMainWorkflowProcessInstance ( \at\together\_2006\xpil1\WorkflowProcessInstance $val ) {
			$this->MainWorkflowProcessInstance[] = $val;
			$this->_properties["MainWorkflowProcessInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\WorkflowProcessInstance[]
		 */
		public function setMainWorkflowProcessInstanceArray ( array $vals ) {
			$this->MainWorkflowProcessInstance = $vals;
			$this->_properties["MainWorkflowProcessInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\WorkflowProcessInstance $val
		 */
		public function setSubWorkflowProcessInstance ( \at\together\_2006\xpil1\WorkflowProcessInstance $val ) {
			$this->SubWorkflowProcessInstance[] = $val;
			$this->_properties["SubWorkflowProcessInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\WorkflowProcessInstance[]
		 */
		public function setSubWorkflowProcessInstanceArray ( array $vals ) {
			$this->SubWorkflowProcessInstance = $vals;
			$this->_properties["SubWorkflowProcessInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\WorkflowProcessInstances $val
		 */
		public function setWorkflowProcessInstances ( \at\together\_2006\xpil1\WorkflowProcessInstances $val ) {
			$this->WorkflowProcessInstances[] = $val;
			$this->_properties["WorkflowProcessInstances"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\WorkflowProcessInstances[]
		 */
		public function setWorkflowProcessInstancesArray ( array $vals ) {
			$this->WorkflowProcessInstances = $vals;
			$this->_properties["WorkflowProcessInstances"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\ActivityInstance $val
		 */
		public function setManualActivityInstance ( \at\together\_2006\xpil1\ActivityInstance $val ) {
			$this->ManualActivityInstance[] = $val;
			$this->_properties["ManualActivityInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\ActivityInstance[]
		 */
		public function setManualActivityInstanceArray ( array $vals ) {
			$this->ManualActivityInstance = $vals;
			$this->_properties["ManualActivityInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\ActivityInstance $val
		 */
		public function setToolActivityInstance ( \at\together\_2006\xpil1\ActivityInstance $val ) {
			$this->ToolActivityInstance[] = $val;
			$this->_properties["ToolActivityInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\ActivityInstance[]
		 */
		public function setToolActivityInstanceArray ( array $vals ) {
			$this->ToolActivityInstance = $vals;
			$this->_properties["ToolActivityInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\ActivityInstance $val
		 */
		public function setBlockActivityInstance ( \at\together\_2006\xpil1\ActivityInstance $val ) {
			$this->BlockActivityInstance[] = $val;
			$this->_properties["BlockActivityInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\ActivityInstance[]
		 */
		public function setBlockActivityInstanceArray ( array $vals ) {
			$this->BlockActivityInstance = $vals;
			$this->_properties["BlockActivityInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\ActivityInstance $val
		 */
		public function setRouteActivityInstance ( \at\together\_2006\xpil1\ActivityInstance $val ) {
			$this->RouteActivityInstance[] = $val;
			$this->_properties["RouteActivityInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\ActivityInstance[]
		 */
		public function setRouteActivityInstanceArray ( array $vals ) {
			$this->RouteActivityInstance = $vals;
			$this->_properties["RouteActivityInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\ActivityInstance $val
		 */
		public function setSubFlowActivityInstance ( \at\together\_2006\xpil1\ActivityInstance $val ) {
			$this->SubFlowActivityInstance[] = $val;
			$this->_properties["SubFlowActivityInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\ActivityInstance[]
		 */
		public function setSubFlowActivityInstanceArray ( array $vals ) {
			$this->SubFlowActivityInstance = $vals;
			$this->_properties["SubFlowActivityInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\ActivityInstances $val
		 */
		public function setActivityInstances ( \at\together\_2006\xpil1\ActivityInstances $val ) {
			$this->ActivityInstances[] = $val;
			$this->_properties["ActivityInstances"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\ActivityInstances[]
		 */
		public function setActivityInstancesArray ( array $vals ) {
			$this->ActivityInstances = $vals;
			$this->_properties["ActivityInstances"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\AssignmentInstance $val
		 */
		public function setAssignmentInstance ( \at\together\_2006\xpil1\AssignmentInstance $val ) {
			$this->AssignmentInstance[] = $val;
			$this->_properties["AssignmentInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\AssignmentInstance[]
		 */
		public function setAssignmentInstanceArray ( array $vals ) {
			$this->AssignmentInstance = $vals;
			$this->_properties["AssignmentInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\AssignmentInstances $val
		 */
		public function setAssignmentInstances ( \at\together\_2006\xpil1\AssignmentInstances $val ) {
			$this->AssignmentInstances[] = $val;
			$this->_properties["AssignmentInstances"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\AssignmentInstances[]
		 */
		public function setAssignmentInstancesArray ( array $vals ) {
			$this->AssignmentInstances = $vals;
			$this->_properties["AssignmentInstances"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance $val
		 */
		public function setStringDataInstance ( \at\together\_2006\xpil1\DataInstance $val ) {
			$this->StringDataInstance[] = $val;
			$this->_properties["StringDataInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance[]
		 */
		public function setStringDataInstanceArray ( array $vals ) {
			$this->StringDataInstance = $vals;
			$this->_properties["StringDataInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance $val
		 */
		public function setStringArrayDataInstance ( \at\together\_2006\xpil1\DataInstance $val ) {
			$this->StringArrayDataInstance[] = $val;
			$this->_properties["StringArrayDataInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance[]
		 */
		public function setStringArrayDataInstanceArray ( array $vals ) {
			$this->StringArrayDataInstance = $vals;
			$this->_properties["StringArrayDataInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance $val
		 */
		public function setBooleanDataInstance ( \at\together\_2006\xpil1\DataInstance $val ) {
			$this->BooleanDataInstance[] = $val;
			$this->_properties["BooleanDataInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance[]
		 */
		public function setBooleanDataInstanceArray ( array $vals ) {
			$this->BooleanDataInstance = $vals;
			$this->_properties["BooleanDataInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance $val
		 */
		public function setBooleanArrayDataInstance ( \at\together\_2006\xpil1\DataInstance $val ) {
			$this->BooleanArrayDataInstance[] = $val;
			$this->_properties["BooleanArrayDataInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance[]
		 */
		public function setBooleanArrayDataInstanceArray ( array $vals ) {
			$this->BooleanArrayDataInstance = $vals;
			$this->_properties["BooleanArrayDataInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance $val
		 */
		public function setDateDataInstance ( \at\together\_2006\xpil1\DataInstance $val ) {
			$this->DateDataInstance[] = $val;
			$this->_properties["DateDataInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance[]
		 */
		public function setDateDataInstanceArray ( array $vals ) {
			$this->DateDataInstance = $vals;
			$this->_properties["DateDataInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance $val
		 */
		public function setDateArrayDataInstance ( \at\together\_2006\xpil1\DataInstance $val ) {
			$this->DateArrayDataInstance[] = $val;
			$this->_properties["DateArrayDataInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance[]
		 */
		public function setDateArrayDataInstanceArray ( array $vals ) {
			$this->DateArrayDataInstance = $vals;
			$this->_properties["DateArrayDataInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance $val
		 */
		public function setDateTimeDataInstance ( \at\together\_2006\xpil1\DataInstance $val ) {
			$this->DateTimeDataInstance[] = $val;
			$this->_properties["DateTimeDataInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance[]
		 */
		public function setDateTimeDataInstanceArray ( array $vals ) {
			$this->DateTimeDataInstance = $vals;
			$this->_properties["DateTimeDataInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance $val
		 */
		public function setDateTimeArrayDataInstance ( \at\together\_2006\xpil1\DataInstance $val ) {
			$this->DateTimeArrayDataInstance[] = $val;
			$this->_properties["DateTimeArrayDataInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance[]
		 */
		public function setDateTimeArrayDataInstanceArray ( array $vals ) {
			$this->DateTimeArrayDataInstance = $vals;
			$this->_properties["DateTimeArrayDataInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance $val
		 */
		public function setTimeDataInstance ( \at\together\_2006\xpil1\DataInstance $val ) {
			$this->TimeDataInstance[] = $val;
			$this->_properties["TimeDataInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance[]
		 */
		public function setTimeDataInstanceArray ( array $vals ) {
			$this->TimeDataInstance = $vals;
			$this->_properties["TimeDataInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance $val
		 */
		public function setTimeArrayDataInstance ( \at\together\_2006\xpil1\DataInstance $val ) {
			$this->TimeArrayDataInstance[] = $val;
			$this->_properties["TimeArrayDataInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance[]
		 */
		public function setTimeArrayDataInstanceArray ( array $vals ) {
			$this->TimeArrayDataInstance = $vals;
			$this->_properties["TimeArrayDataInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance $val
		 */
		public function setLongDataInstance ( \at\together\_2006\xpil1\DataInstance $val ) {
			$this->LongDataInstance[] = $val;
			$this->_properties["LongDataInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance[]
		 */
		public function setLongDataInstanceArray ( array $vals ) {
			$this->LongDataInstance = $vals;
			$this->_properties["LongDataInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance $val
		 */
		public function setLongArrayDataInstance ( \at\together\_2006\xpil1\DataInstance $val ) {
			$this->LongArrayDataInstance[] = $val;
			$this->_properties["LongArrayDataInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance[]
		 */
		public function setLongArrayDataInstanceArray ( array $vals ) {
			$this->LongArrayDataInstance = $vals;
			$this->_properties["LongArrayDataInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance $val
		 */
		public function setDoubleDataInstance ( \at\together\_2006\xpil1\DataInstance $val ) {
			$this->DoubleDataInstance[] = $val;
			$this->_properties["DoubleDataInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance[]
		 */
		public function setDoubleDataInstanceArray ( array $vals ) {
			$this->DoubleDataInstance = $vals;
			$this->_properties["DoubleDataInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance $val
		 */
		public function setDoubleArrayDataInstance ( \at\together\_2006\xpil1\DataInstance $val ) {
			$this->DoubleArrayDataInstance[] = $val;
			$this->_properties["DoubleArrayDataInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance[]
		 */
		public function setDoubleArrayDataInstanceArray ( array $vals ) {
			$this->DoubleArrayDataInstance = $vals;
			$this->_properties["DoubleArrayDataInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance $val
		 */
		public function setByteArrayDataInstance ( \at\together\_2006\xpil1\DataInstance $val ) {
			$this->ByteArrayDataInstance[] = $val;
			$this->_properties["ByteArrayDataInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance[]
		 */
		public function setByteArrayDataInstanceArray ( array $vals ) {
			$this->ByteArrayDataInstance = $vals;
			$this->_properties["ByteArrayDataInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance $val
		 */
		public function setAnyDataInstance ( \at\together\_2006\xpil1\DataInstance $val ) {
			$this->AnyDataInstance[] = $val;
			$this->_properties["AnyDataInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance[]
		 */
		public function setAnyDataInstanceArray ( array $vals ) {
			$this->AnyDataInstance = $vals;
			$this->_properties["AnyDataInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance $val
		 */
		public function setComplexDataInstance ( \at\together\_2006\xpil1\DataInstance $val ) {
			$this->ComplexDataInstance[] = $val;
			$this->_properties["ComplexDataInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance[]
		 */
		public function setComplexDataInstanceArray ( array $vals ) {
			$this->ComplexDataInstance = $vals;
			$this->_properties["ComplexDataInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance $val
		 */
		public function setSchemaDataInstance ( \at\together\_2006\xpil1\DataInstance $val ) {
			$this->SchemaDataInstance[] = $val;
			$this->_properties["SchemaDataInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstance[]
		 */
		public function setSchemaDataInstanceArray ( array $vals ) {
			$this->SchemaDataInstance = $vals;
			$this->_properties["SchemaDataInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstances $val
		 */
		public function setDataInstances ( \at\together\_2006\xpil1\DataInstances $val ) {
			$this->DataInstances[] = $val;
			$this->_properties["DataInstances"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DataInstances[]
		 */
		public function setDataInstancesArray ( array $vals ) {
			$this->DataInstances = $vals;
			$this->_properties["DataInstances"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\DeadlineInstance $val
		 */
		public function setDeadlineInstance ( \at\together\_2006\xpil1\DeadlineInstance $val ) {
			$this->DeadlineInstance[] = $val;
			$this->_properties["DeadlineInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DeadlineInstance[]
		 */
		public function setDeadlineInstanceArray ( array $vals ) {
			$this->DeadlineInstance = $vals;
			$this->_properties["DeadlineInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\DeadlineInstances $val
		 */
		public function setDeadlineInstances ( \at\together\_2006\xpil1\DeadlineInstances $val ) {
			$this->DeadlineInstances[] = $val;
			$this->_properties["DeadlineInstances"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DeadlineInstances[]
		 */
		public function setDeadlineInstancesArray ( array $vals ) {
			$this->DeadlineInstances = $vals;
			$this->_properties["DeadlineInstances"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\InstanceExtendedAttribute $val
		 */
		public function setInstanceExtendedAttribute ( \at\together\_2006\xpil1\InstanceExtendedAttribute $val ) {
			$this->InstanceExtendedAttribute[] = $val;
			$this->_properties["InstanceExtendedAttribute"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\InstanceExtendedAttribute[]
		 */
		public function setInstanceExtendedAttributeArray ( array $vals ) {
			$this->InstanceExtendedAttribute = $vals;
			$this->_properties["InstanceExtendedAttribute"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\InstanceExtendedAttributes $val
		 */
		public function setInstanceExtendedAttributes ( \at\together\_2006\xpil1\InstanceExtendedAttributes $val ) {
			$this->InstanceExtendedAttributes[] = $val;
			$this->_properties["InstanceExtendedAttributes"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\InstanceExtendedAttributes[]
		 */
		public function setInstanceExtendedAttributesArray ( array $vals ) {
			$this->InstanceExtendedAttributes = $vals;
			$this->_properties["InstanceExtendedAttributes"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\DataSignature $val
		 */
		public function setDataSignature ( \at\together\_2006\xpil1\DataSignature $val ) {
			$this->DataSignature[] = $val;
			$this->_properties["DataSignature"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\DataSignature[]
		 */
		public function setDataSignatureArray ( array $vals ) {
			$this->DataSignature = $vals;
			$this->_properties["DataSignature"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\ContextSignature $val
		 */
		public function setContextSignature ( \at\together\_2006\xpil1\ContextSignature $val ) {
			$this->ContextSignature[] = $val;
			$this->_properties["ContextSignature"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\ContextSignature[]
		 */
		public function setContextSignatureArray ( array $vals ) {
			$this->ContextSignature = $vals;
			$this->_properties["ContextSignature"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\LanguageMapping $val
		 */
		public function setLanguageMapping ( \at\together\_2006\xpil1\LanguageMapping $val ) {
			$this->LanguageMapping[] = $val;
			$this->_properties["LanguageMapping"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\LanguageMapping[]
		 */
		public function setLanguageMappingArray ( array $vals ) {
			$this->LanguageMapping = $vals;
			$this->_properties["LanguageMapping"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\LanguageMappings $val
		 */
		public function setLanguageMappings ( \at\together\_2006\xpil1\LanguageMappings $val ) {
			$this->LanguageMappings[] = $val;
			$this->_properties["LanguageMappings"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\LanguageMappings[]
		 */
		public function setLanguageMappingsArray ( array $vals ) {
			$this->LanguageMappings = $vals;
			$this->_properties["LanguageMappings"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\NextInfoElement $val
		 */
		public function setNextInfoElement ( \at\together\_2006\xpil1\NextInfoElement $val ) {
			$this->NextInfoElement[] = $val;
			$this->_properties["NextInfoElement"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\NextInfoElement[]
		 */
		public function setNextInfoElementArray ( array $vals ) {
			$this->NextInfoElement = $vals;
			$this->_properties["NextInfoElement"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\NextInfo $val
		 */
		public function setNextInfo ( \at\together\_2006\xpil1\NextInfo $val ) {
			$this->NextInfo[] = $val;
			$this->_properties["NextInfo"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\NextInfo[]
		 */
		public function setNextInfoArray ( array $vals ) {
			$this->NextInfo = $vals;
			$this->_properties["NextInfo"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\PreviousActivityInstance $val
		 */
		public function setPreviousActivityInstance ( \at\together\_2006\xpil1\PreviousActivityInstance $val ) {
			$this->PreviousActivityInstance[] = $val;
			$this->_properties["PreviousActivityInstance"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\PreviousActivityInstance[]
		 */
		public function setPreviousActivityInstanceArray ( array $vals ) {
			$this->PreviousActivityInstance = $vals;
			$this->_properties["PreviousActivityInstance"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\EventAudits $val
		 */
		public function setEventAudits ( \at\together\_2006\xpil1\EventAudits $val ) {
			$this->EventAudits[] = $val;
			$this->_properties["EventAudits"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\EventAudits[]
		 */
		public function setEventAuditsArray ( array $vals ) {
			$this->EventAudits = $vals;
			$this->_properties["EventAudits"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\EventAudit $val
		 */
		public function setStateEventAudit ( \at\together\_2006\xpil1\EventAudit $val ) {
			$this->StateEventAudit[] = $val;
			$this->_properties["StateEventAudit"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\EventAudit[]
		 */
		public function setStateEventAuditArray ( array $vals ) {
			$this->StateEventAudit = $vals;
			$this->_properties["StateEventAudit"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\EventAudit $val
		 */
		public function setDataEventAudit ( \at\together\_2006\xpil1\EventAudit $val ) {
			$this->DataEventAudit[] = $val;
			$this->_properties["DataEventAudit"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\EventAudit[]
		 */
		public function setDataEventAuditArray ( array $vals ) {
			$this->DataEventAudit = $vals;
			$this->_properties["DataEventAudit"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\EventAudit $val
		 */
		public function setAssignmentEventAudit ( \at\together\_2006\xpil1\EventAudit $val ) {
			$this->AssignmentEventAudit[] = $val;
			$this->_properties["AssignmentEventAudit"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\EventAudit[]
		 */
		public function setAssignmentEventAuditArray ( array $vals ) {
			$this->AssignmentEventAudit = $vals;
			$this->_properties["AssignmentEventAudit"]["text"] = $vals;
		}
		/**
		 * @param at\together\_2006\xpil1\EventAudit $val
		 */
		public function setCreateProcessEventAudit ( \at\together\_2006\xpil1\EventAudit $val ) {
			$this->CreateProcessEventAudit[] = $val;
			$this->_properties["CreateProcessEventAudit"]["text"][] = $val;
		}
		/**
		 * @param at\together\_2006\xpil1\EventAudit[]
		 */
		public function setCreateProcessEventAuditArray ( array $vals ) {
			$this->CreateProcessEventAudit = $vals;
			$this->_properties["CreateProcessEventAudit"]["text"] = $vals;
		}
		/**
		 * @param \String $val
		 */
		public function setId (  $val ) {
			$this->Id = $val;
			$this->_properties["Id"]["text"] = $val;
		}
		/**
		 * @param \String $val
		 */
		public function setName (  $val ) {
			$this->Name = $val;
			$this->_properties["Name"]["text"] = $val;
		}
		/**
		 * @return at\together\_2006\xpil1\Header
		 */
		public function getHeader() {
			return $this->Header;
		}
		/**
		 * @return at\together\_2006\xpil1\User | []
		 */
		public function getUser($index = null) {
			if( $index !== null ) {
				$res = isset($this->User[$index]) ? $this->User[$index] : null;
			} else {
				$res = $this->User;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\Users | []
		 */
		public function getUsers($index = null) {
			if( $index !== null ) {
				$res = isset($this->Users[$index]) ? $this->Users[$index] : null;
			} else {
				$res = $this->Users;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\PackageInstance | []
		 */
		public function getPackageInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->PackageInstance[$index]) ? $this->PackageInstance[$index] : null;
			} else {
				$res = $this->PackageInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\PackageInstances | []
		 */
		public function getPackageInstances($index = null) {
			if( $index !== null ) {
				$res = isset($this->PackageInstances[$index]) ? $this->PackageInstances[$index] : null;
			} else {
				$res = $this->PackageInstances;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\WorkflowProcessFactoryInstance | []
		 */
		public function getWorkflowProcessFactoryInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->WorkflowProcessFactoryInstance[$index]) ? $this->WorkflowProcessFactoryInstance[$index] : null;
			} else {
				$res = $this->WorkflowProcessFactoryInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\WorkflowProcessFactoryInstances | []
		 */
		public function getWorkflowProcessFactoryInstances($index = null) {
			if( $index !== null ) {
				$res = isset($this->WorkflowProcessFactoryInstances[$index]) ? $this->WorkflowProcessFactoryInstances[$index] : null;
			} else {
				$res = $this->WorkflowProcessFactoryInstances;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\WorkflowProcessInstance | []
		 */
		public function getMainWorkflowProcessInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->MainWorkflowProcessInstance[$index]) ? $this->MainWorkflowProcessInstance[$index] : null;
			} else {
				$res = $this->MainWorkflowProcessInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\WorkflowProcessInstance | []
		 */
		public function getSubWorkflowProcessInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->SubWorkflowProcessInstance[$index]) ? $this->SubWorkflowProcessInstance[$index] : null;
			} else {
				$res = $this->SubWorkflowProcessInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\WorkflowProcessInstances | []
		 */
		public function getWorkflowProcessInstances($index = null) {
			if( $index !== null ) {
				$res = isset($this->WorkflowProcessInstances[$index]) ? $this->WorkflowProcessInstances[$index] : null;
			} else {
				$res = $this->WorkflowProcessInstances;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\ActivityInstance | []
		 */
		public function getManualActivityInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->ManualActivityInstance[$index]) ? $this->ManualActivityInstance[$index] : null;
			} else {
				$res = $this->ManualActivityInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\ActivityInstance | []
		 */
		public function getToolActivityInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->ToolActivityInstance[$index]) ? $this->ToolActivityInstance[$index] : null;
			} else {
				$res = $this->ToolActivityInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\ActivityInstance | []
		 */
		public function getBlockActivityInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->BlockActivityInstance[$index]) ? $this->BlockActivityInstance[$index] : null;
			} else {
				$res = $this->BlockActivityInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\ActivityInstance | []
		 */
		public function getRouteActivityInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->RouteActivityInstance[$index]) ? $this->RouteActivityInstance[$index] : null;
			} else {
				$res = $this->RouteActivityInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\ActivityInstance | []
		 */
		public function getSubFlowActivityInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->SubFlowActivityInstance[$index]) ? $this->SubFlowActivityInstance[$index] : null;
			} else {
				$res = $this->SubFlowActivityInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\ActivityInstances | []
		 */
		public function getActivityInstances($index = null) {
			if( $index !== null ) {
				$res = isset($this->ActivityInstances[$index]) ? $this->ActivityInstances[$index] : null;
			} else {
				$res = $this->ActivityInstances;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\AssignmentInstance | []
		 */
		public function getAssignmentInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->AssignmentInstance[$index]) ? $this->AssignmentInstance[$index] : null;
			} else {
				$res = $this->AssignmentInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\AssignmentInstances | []
		 */
		public function getAssignmentInstances($index = null) {
			if( $index !== null ) {
				$res = isset($this->AssignmentInstances[$index]) ? $this->AssignmentInstances[$index] : null;
			} else {
				$res = $this->AssignmentInstances;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\DataInstance | []
		 */
		public function getStringDataInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->StringDataInstance[$index]) ? $this->StringDataInstance[$index] : null;
			} else {
				$res = $this->StringDataInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\DataInstance | []
		 */
		public function getStringArrayDataInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->StringArrayDataInstance[$index]) ? $this->StringArrayDataInstance[$index] : null;
			} else {
				$res = $this->StringArrayDataInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\DataInstance | []
		 */
		public function getBooleanDataInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->BooleanDataInstance[$index]) ? $this->BooleanDataInstance[$index] : null;
			} else {
				$res = $this->BooleanDataInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\DataInstance | []
		 */
		public function getBooleanArrayDataInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->BooleanArrayDataInstance[$index]) ? $this->BooleanArrayDataInstance[$index] : null;
			} else {
				$res = $this->BooleanArrayDataInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\DataInstance | []
		 */
		public function getDateDataInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->DateDataInstance[$index]) ? $this->DateDataInstance[$index] : null;
			} else {
				$res = $this->DateDataInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\DataInstance | []
		 */
		public function getDateArrayDataInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->DateArrayDataInstance[$index]) ? $this->DateArrayDataInstance[$index] : null;
			} else {
				$res = $this->DateArrayDataInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\DataInstance | []
		 */
		public function getDateTimeDataInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->DateTimeDataInstance[$index]) ? $this->DateTimeDataInstance[$index] : null;
			} else {
				$res = $this->DateTimeDataInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\DataInstance | []
		 */
		public function getDateTimeArrayDataInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->DateTimeArrayDataInstance[$index]) ? $this->DateTimeArrayDataInstance[$index] : null;
			} else {
				$res = $this->DateTimeArrayDataInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\DataInstance | []
		 */
		public function getTimeDataInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->TimeDataInstance[$index]) ? $this->TimeDataInstance[$index] : null;
			} else {
				$res = $this->TimeDataInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\DataInstance | []
		 */
		public function getTimeArrayDataInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->TimeArrayDataInstance[$index]) ? $this->TimeArrayDataInstance[$index] : null;
			} else {
				$res = $this->TimeArrayDataInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\DataInstance | []
		 */
		public function getLongDataInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->LongDataInstance[$index]) ? $this->LongDataInstance[$index] : null;
			} else {
				$res = $this->LongDataInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\DataInstance | []
		 */
		public function getLongArrayDataInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->LongArrayDataInstance[$index]) ? $this->LongArrayDataInstance[$index] : null;
			} else {
				$res = $this->LongArrayDataInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\DataInstance | []
		 */
		public function getDoubleDataInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->DoubleDataInstance[$index]) ? $this->DoubleDataInstance[$index] : null;
			} else {
				$res = $this->DoubleDataInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\DataInstance | []
		 */
		public function getDoubleArrayDataInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->DoubleArrayDataInstance[$index]) ? $this->DoubleArrayDataInstance[$index] : null;
			} else {
				$res = $this->DoubleArrayDataInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\DataInstance | []
		 */
		public function getByteArrayDataInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->ByteArrayDataInstance[$index]) ? $this->ByteArrayDataInstance[$index] : null;
			} else {
				$res = $this->ByteArrayDataInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\DataInstance | []
		 */
		public function getAnyDataInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->AnyDataInstance[$index]) ? $this->AnyDataInstance[$index] : null;
			} else {
				$res = $this->AnyDataInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\DataInstance | []
		 */
		public function getComplexDataInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->ComplexDataInstance[$index]) ? $this->ComplexDataInstance[$index] : null;
			} else {
				$res = $this->ComplexDataInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\DataInstance | []
		 */
		public function getSchemaDataInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->SchemaDataInstance[$index]) ? $this->SchemaDataInstance[$index] : null;
			} else {
				$res = $this->SchemaDataInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\DataInstances | []
		 */
		public function getDataInstances($index = null) {
			if( $index !== null ) {
				$res = isset($this->DataInstances[$index]) ? $this->DataInstances[$index] : null;
			} else {
				$res = $this->DataInstances;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\DeadlineInstance | []
		 */
		public function getDeadlineInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->DeadlineInstance[$index]) ? $this->DeadlineInstance[$index] : null;
			} else {
				$res = $this->DeadlineInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\DeadlineInstances | []
		 */
		public function getDeadlineInstances($index = null) {
			if( $index !== null ) {
				$res = isset($this->DeadlineInstances[$index]) ? $this->DeadlineInstances[$index] : null;
			} else {
				$res = $this->DeadlineInstances;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\InstanceExtendedAttribute | []
		 */
		public function getInstanceExtendedAttribute($index = null) {
			if( $index !== null ) {
				$res = isset($this->InstanceExtendedAttribute[$index]) ? $this->InstanceExtendedAttribute[$index] : null;
			} else {
				$res = $this->InstanceExtendedAttribute;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\InstanceExtendedAttributes | []
		 */
		public function getInstanceExtendedAttributes($index = null) {
			if( $index !== null ) {
				$res = isset($this->InstanceExtendedAttributes[$index]) ? $this->InstanceExtendedAttributes[$index] : null;
			} else {
				$res = $this->InstanceExtendedAttributes;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\DataSignature | []
		 */
		public function getDataSignature($index = null) {
			if( $index !== null ) {
				$res = isset($this->DataSignature[$index]) ? $this->DataSignature[$index] : null;
			} else {
				$res = $this->DataSignature;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\ContextSignature | []
		 */
		public function getContextSignature($index = null) {
			if( $index !== null ) {
				$res = isset($this->ContextSignature[$index]) ? $this->ContextSignature[$index] : null;
			} else {
				$res = $this->ContextSignature;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\LanguageMapping | []
		 */
		public function getLanguageMapping($index = null) {
			if( $index !== null ) {
				$res = isset($this->LanguageMapping[$index]) ? $this->LanguageMapping[$index] : null;
			} else {
				$res = $this->LanguageMapping;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\LanguageMappings | []
		 */
		public function getLanguageMappings($index = null) {
			if( $index !== null ) {
				$res = isset($this->LanguageMappings[$index]) ? $this->LanguageMappings[$index] : null;
			} else {
				$res = $this->LanguageMappings;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\NextInfoElement | []
		 */
		public function getNextInfoElement($index = null) {
			if( $index !== null ) {
				$res = isset($this->NextInfoElement[$index]) ? $this->NextInfoElement[$index] : null;
			} else {
				$res = $this->NextInfoElement;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\NextInfo | []
		 */
		public function getNextInfo($index = null) {
			if( $index !== null ) {
				$res = isset($this->NextInfo[$index]) ? $this->NextInfo[$index] : null;
			} else {
				$res = $this->NextInfo;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\PreviousActivityInstance | []
		 */
		public function getPreviousActivityInstance($index = null) {
			if( $index !== null ) {
				$res = isset($this->PreviousActivityInstance[$index]) ? $this->PreviousActivityInstance[$index] : null;
			} else {
				$res = $this->PreviousActivityInstance;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\EventAudits | []
		 */
		public function getEventAudits($index = null) {
			if( $index !== null ) {
				$res = isset($this->EventAudits[$index]) ? $this->EventAudits[$index] : null;
			} else {
				$res = $this->EventAudits;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\EventAudit | []
		 */
		public function getStateEventAudit($index = null) {
			if( $index !== null ) {
				$res = isset($this->StateEventAudit[$index]) ? $this->StateEventAudit[$index] : null;
			} else {
				$res = $this->StateEventAudit;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\EventAudit | []
		 */
		public function getDataEventAudit($index = null) {
			if( $index !== null ) {
				$res = isset($this->DataEventAudit[$index]) ? $this->DataEventAudit[$index] : null;
			} else {
				$res = $this->DataEventAudit;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\EventAudit | []
		 */
		public function getAssignmentEventAudit($index = null) {
			if( $index !== null ) {
				$res = isset($this->AssignmentEventAudit[$index]) ? $this->AssignmentEventAudit[$index] : null;
			} else {
				$res = $this->AssignmentEventAudit;
			}
			return $res;
		}
		/**
		 * @return at\together\_2006\xpil1\EventAudit | []
		 */
		public function getCreateProcessEventAudit($index = null) {
			if( $index !== null ) {
				$res = isset($this->CreateProcessEventAudit[$index]) ? $this->CreateProcessEventAudit[$index] : null;
			} else {
				$res = $this->CreateProcessEventAudit;
			}
			return $res;
		}
		/**
		 * @return \String
		 */
		public function getId() {
			return $this->Id;
		}
		/**
		 * @return \String
		 */
		public function getName() {
			return $this->Name;
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
			if( $prop = $this->getId() ) $xw->writeAttribute( 'Id', $prop );
			if( $prop = $this->getName() ) $xw->writeAttribute( 'Name', $prop );
		}
		/**
		* Вывод элементов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function elementsToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::elementsToXmlWriter( $xw, $xmlname, $xmlns );
			if( ($prop = $this->getHeader()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( $props = $this->getUser() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getUsers() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getPackageInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getPackageInstances() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getWorkflowProcessFactoryInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getWorkflowProcessFactoryInstances() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getMainWorkflowProcessInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getSubWorkflowProcessInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getWorkflowProcessInstances() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getManualActivityInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getToolActivityInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getBlockActivityInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getRouteActivityInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getSubFlowActivityInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getActivityInstances() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getAssignmentInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getAssignmentInstances() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getStringDataInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getStringArrayDataInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getBooleanDataInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getBooleanArrayDataInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getDateDataInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getDateArrayDataInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getDateTimeDataInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getDateTimeArrayDataInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getTimeDataInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getTimeArrayDataInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getLongDataInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getLongArrayDataInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getDoubleDataInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getDoubleArrayDataInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getByteArrayDataInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getAnyDataInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getComplexDataInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getSchemaDataInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getDataInstances() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getDeadlineInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getDeadlineInstances() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getInstanceExtendedAttribute() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getInstanceExtendedAttributes() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getDataSignature() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getContextSignature() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getLanguageMapping() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getLanguageMappings() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getNextInfoElement() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getNextInfo() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getPreviousActivityInstance() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getEventAudits() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getStateEventAudit() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getDataEventAudit() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getAssignmentEventAudit() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getCreateProcessEventAudit() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
		}

		/**
		 * Чтение атрибутов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function attributesFromXmlReader ( \XMLReader &$xr ) {
			if( $attr = $xr->getAttribute( 'Id') ) {
			$this->_attributes['Id']['prop'] = 'Id';
			$this->setId( $attr ); 
		}
			if( $attr = $xr->getAttribute( 'Name') ) {
			$this->_attributes['Name']['prop'] = 'Name';
			$this->setName( $attr ); 
		}
			parent::attributesFromXmlReader( $xr );	
		}
				
		/**
		 * Чтение элементов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function elementsFromXmlReader ( \XMLReader &$xr ) {
			switch ( $xr->localName ) {
				case "Header":
					$Header = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\Header");
					$this->setHeader( $Header->fromXmlReader( $xr ) );
					break;
				case "User":
					$User = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\User");
					$this->setUser( $User->fromXmlReader( $xr ) );
					break;
				case "Users":
					$Users = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\Users");
					$this->setUsers( $Users->fromXmlReader( $xr ) );
					break;
				case "PackageInstance":
					$PackageInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\PackageInstance");
					$this->setPackageInstance( $PackageInstance->fromXmlReader( $xr ) );
					break;
				case "PackageInstances":
					$PackageInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\PackageInstances");
					$this->setPackageInstances( $PackageInstances->fromXmlReader( $xr ) );
					break;
				case "WorkflowProcessFactoryInstance":
					$WorkflowProcessFactoryInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\WorkflowProcessFactoryInstance");
					$this->setWorkflowProcessFactoryInstance( $WorkflowProcessFactoryInstance->fromXmlReader( $xr ) );
					break;
				case "WorkflowProcessFactoryInstances":
					$WorkflowProcessFactoryInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\WorkflowProcessFactoryInstances");
					$this->setWorkflowProcessFactoryInstances( $WorkflowProcessFactoryInstances->fromXmlReader( $xr ) );
					break;
				case "MainWorkflowProcessInstance":
					$MainWorkflowProcessInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\MainWorkflowProcessInstance");
					$this->setMainWorkflowProcessInstance( $MainWorkflowProcessInstance->fromXmlReader( $xr ) );
					break;
				case "SubWorkflowProcessInstance":
					$SubWorkflowProcessInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\SubWorkflowProcessInstance");
					$this->setSubWorkflowProcessInstance( $SubWorkflowProcessInstance->fromXmlReader( $xr ) );
					break;
				case "WorkflowProcessInstances":
					$WorkflowProcessInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\WorkflowProcessInstances");
					$this->setWorkflowProcessInstances( $WorkflowProcessInstances->fromXmlReader( $xr ) );
					break;
				case "ManualActivityInstance":
					$ManualActivityInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\ManualActivityInstance");
					$this->setManualActivityInstance( $ManualActivityInstance->fromXmlReader( $xr ) );
					break;
				case "ToolActivityInstance":
					$ToolActivityInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\ToolActivityInstance");
					$this->setToolActivityInstance( $ToolActivityInstance->fromXmlReader( $xr ) );
					break;
				case "BlockActivityInstance":
					$BlockActivityInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\BlockActivityInstance");
					$this->setBlockActivityInstance( $BlockActivityInstance->fromXmlReader( $xr ) );
					break;
				case "RouteActivityInstance":
					$RouteActivityInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\RouteActivityInstance");
					$this->setRouteActivityInstance( $RouteActivityInstance->fromXmlReader( $xr ) );
					break;
				case "SubFlowActivityInstance":
					$SubFlowActivityInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\SubFlowActivityInstance");
					$this->setSubFlowActivityInstance( $SubFlowActivityInstance->fromXmlReader( $xr ) );
					break;
				case "ActivityInstances":
					$ActivityInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\ActivityInstances");
					$this->setActivityInstances( $ActivityInstances->fromXmlReader( $xr ) );
					break;
				case "AssignmentInstance":
					$AssignmentInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\AssignmentInstance");
					$this->setAssignmentInstance( $AssignmentInstance->fromXmlReader( $xr ) );
					break;
				case "AssignmentInstances":
					$AssignmentInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\AssignmentInstances");
					$this->setAssignmentInstances( $AssignmentInstances->fromXmlReader( $xr ) );
					break;
				case "StringDataInstance":
					$StringDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\StringDataInstance");
					$this->setStringDataInstance( $StringDataInstance->fromXmlReader( $xr ) );
					break;
				case "StringArrayDataInstance":
					$StringArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\StringArrayDataInstance");
					$this->setStringArrayDataInstance( $StringArrayDataInstance->fromXmlReader( $xr ) );
					break;
				case "BooleanDataInstance":
					$BooleanDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\BooleanDataInstance");
					$this->setBooleanDataInstance( $BooleanDataInstance->fromXmlReader( $xr ) );
					break;
				case "BooleanArrayDataInstance":
					$BooleanArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\BooleanArrayDataInstance");
					$this->setBooleanArrayDataInstance( $BooleanArrayDataInstance->fromXmlReader( $xr ) );
					break;
				case "DateDataInstance":
					$DateDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DateDataInstance");
					$this->setDateDataInstance( $DateDataInstance->fromXmlReader( $xr ) );
					break;
				case "DateArrayDataInstance":
					$DateArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DateArrayDataInstance");
					$this->setDateArrayDataInstance( $DateArrayDataInstance->fromXmlReader( $xr ) );
					break;
				case "DateTimeDataInstance":
					$DateTimeDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DateTimeDataInstance");
					$this->setDateTimeDataInstance( $DateTimeDataInstance->fromXmlReader( $xr ) );
					break;
				case "DateTimeArrayDataInstance":
					$DateTimeArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DateTimeArrayDataInstance");
					$this->setDateTimeArrayDataInstance( $DateTimeArrayDataInstance->fromXmlReader( $xr ) );
					break;
				case "TimeDataInstance":
					$TimeDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\TimeDataInstance");
					$this->setTimeDataInstance( $TimeDataInstance->fromXmlReader( $xr ) );
					break;
				case "TimeArrayDataInstance":
					$TimeArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\TimeArrayDataInstance");
					$this->setTimeArrayDataInstance( $TimeArrayDataInstance->fromXmlReader( $xr ) );
					break;
				case "LongDataInstance":
					$LongDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\LongDataInstance");
					$this->setLongDataInstance( $LongDataInstance->fromXmlReader( $xr ) );
					break;
				case "LongArrayDataInstance":
					$LongArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\LongArrayDataInstance");
					$this->setLongArrayDataInstance( $LongArrayDataInstance->fromXmlReader( $xr ) );
					break;
				case "DoubleDataInstance":
					$DoubleDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DoubleDataInstance");
					$this->setDoubleDataInstance( $DoubleDataInstance->fromXmlReader( $xr ) );
					break;
				case "DoubleArrayDataInstance":
					$DoubleArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DoubleArrayDataInstance");
					$this->setDoubleArrayDataInstance( $DoubleArrayDataInstance->fromXmlReader( $xr ) );
					break;
				case "ByteArrayDataInstance":
					$ByteArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\ByteArrayDataInstance");
					$this->setByteArrayDataInstance( $ByteArrayDataInstance->fromXmlReader( $xr ) );
					break;
				case "AnyDataInstance":
					$AnyDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\AnyDataInstance");
					$this->setAnyDataInstance( $AnyDataInstance->fromXmlReader( $xr ) );
					break;
				case "ComplexDataInstance":
					$ComplexDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\ComplexDataInstance");
					$this->setComplexDataInstance( $ComplexDataInstance->fromXmlReader( $xr ) );
					break;
				case "SchemaDataInstance":
					$SchemaDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\SchemaDataInstance");
					$this->setSchemaDataInstance( $SchemaDataInstance->fromXmlReader( $xr ) );
					break;
				case "DataInstances":
					$DataInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DataInstances");
					$this->setDataInstances( $DataInstances->fromXmlReader( $xr ) );
					break;
				case "DeadlineInstance":
					$DeadlineInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DeadlineInstance");
					$this->setDeadlineInstance( $DeadlineInstance->fromXmlReader( $xr ) );
					break;
				case "DeadlineInstances":
					$DeadlineInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DeadlineInstances");
					$this->setDeadlineInstances( $DeadlineInstances->fromXmlReader( $xr ) );
					break;
				case "InstanceExtendedAttribute":
					$InstanceExtendedAttribute = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\InstanceExtendedAttribute");
					$this->setInstanceExtendedAttribute( $InstanceExtendedAttribute->fromXmlReader( $xr ) );
					break;
				case "InstanceExtendedAttributes":
					$InstanceExtendedAttributes = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\InstanceExtendedAttributes");
					$this->setInstanceExtendedAttributes( $InstanceExtendedAttributes->fromXmlReader( $xr ) );
					break;
				case "DataSignature":
					$DataSignature = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DataSignature");
					$this->setDataSignature( $DataSignature->fromXmlReader( $xr ) );
					break;
				case "ContextSignature":
					$ContextSignature = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\ContextSignature");
					$this->setContextSignature( $ContextSignature->fromXmlReader( $xr ) );
					break;
				case "LanguageMapping":
					$LanguageMapping = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\LanguageMapping");
					$this->setLanguageMapping( $LanguageMapping->fromXmlReader( $xr ) );
					break;
				case "LanguageMappings":
					$LanguageMappings = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\LanguageMappings");
					$this->setLanguageMappings( $LanguageMappings->fromXmlReader( $xr ) );
					break;
				case "NextInfoElement":
					$NextInfoElement = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\NextInfoElement");
					$this->setNextInfoElement( $NextInfoElement->fromXmlReader( $xr ) );
					break;
				case "NextInfo":
					$NextInfo = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\NextInfo");
					$this->setNextInfo( $NextInfo->fromXmlReader( $xr ) );
					break;
				case "PreviousActivityInstance":
					$PreviousActivityInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\PreviousActivityInstance");
					$this->setPreviousActivityInstance( $PreviousActivityInstance->fromXmlReader( $xr ) );
					break;
				case "EventAudits":
					$EventAudits = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\EventAudits");
					$this->setEventAudits( $EventAudits->fromXmlReader( $xr ) );
					break;
				case "StateEventAudit":
					$StateEventAudit = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\StateEventAudit");
					$this->setStateEventAudit( $StateEventAudit->fromXmlReader( $xr ) );
					break;
				case "DataEventAudit":
					$DataEventAudit = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DataEventAudit");
					$this->setDataEventAudit( $DataEventAudit->fromXmlReader( $xr ) );
					break;
				case "AssignmentEventAudit":
					$AssignmentEventAudit = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\AssignmentEventAudit");
					$this->setAssignmentEventAudit( $AssignmentEventAudit->fromXmlReader( $xr ) );
					break;
				case "CreateProcessEventAudit":
					$CreateProcessEventAudit = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\CreateProcessEventAudit");
					$this->setCreateProcessEventAudit( $CreateProcessEventAudit->fromXmlReader( $xr ) );
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
			if(isset($props["Header"])) {
				$Header = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\Header");
				$Header->fromJSON($props["Header"]);
				$this->setHeader($Header);
			}
			if(isset($props["User"])) {
				if( is_array($props["User"]) ) {
					foreach($props["User"] as $k=>$v) {
						$User = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\User");
						$User->fromJSON($v);
						$this->setUser($User);
					}
				}
			}
			if(isset($props["Users"])) {
				if( is_array($props["Users"]) ) {
					foreach($props["Users"] as $k=>$v) {
						$Users = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\Users");
						$Users->fromJSON($v);
						$this->setUsers($Users);
					}
				}
			}
			if(isset($props["PackageInstance"])) {
				if( is_array($props["PackageInstance"]) ) {
					foreach($props["PackageInstance"] as $k=>$v) {
						$PackageInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\PackageInstance");
						$PackageInstance->fromJSON($v);
						$this->setPackageInstance($PackageInstance);
					}
				}
			}
			if(isset($props["PackageInstances"])) {
				if( is_array($props["PackageInstances"]) ) {
					foreach($props["PackageInstances"] as $k=>$v) {
						$PackageInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\PackageInstances");
						$PackageInstances->fromJSON($v);
						$this->setPackageInstances($PackageInstances);
					}
				}
			}
			if(isset($props["WorkflowProcessFactoryInstance"])) {
				if( is_array($props["WorkflowProcessFactoryInstance"]) ) {
					foreach($props["WorkflowProcessFactoryInstance"] as $k=>$v) {
						$WorkflowProcessFactoryInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\WorkflowProcessFactoryInstance");
						$WorkflowProcessFactoryInstance->fromJSON($v);
						$this->setWorkflowProcessFactoryInstance($WorkflowProcessFactoryInstance);
					}
				}
			}
			if(isset($props["WorkflowProcessFactoryInstances"])) {
				if( is_array($props["WorkflowProcessFactoryInstances"]) ) {
					foreach($props["WorkflowProcessFactoryInstances"] as $k=>$v) {
						$WorkflowProcessFactoryInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\WorkflowProcessFactoryInstances");
						$WorkflowProcessFactoryInstances->fromJSON($v);
						$this->setWorkflowProcessFactoryInstances($WorkflowProcessFactoryInstances);
					}
				}
			}
			if(isset($props["MainWorkflowProcessInstance"])) {
				if( is_array($props["MainWorkflowProcessInstance"]) ) {
					foreach($props["MainWorkflowProcessInstance"] as $k=>$v) {
						$MainWorkflowProcessInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\MainWorkflowProcessInstance");
						$MainWorkflowProcessInstance->fromJSON($v);
						$this->setMainWorkflowProcessInstance($MainWorkflowProcessInstance);
					}
				}
			}
			if(isset($props["SubWorkflowProcessInstance"])) {
				if( is_array($props["SubWorkflowProcessInstance"]) ) {
					foreach($props["SubWorkflowProcessInstance"] as $k=>$v) {
						$SubWorkflowProcessInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\SubWorkflowProcessInstance");
						$SubWorkflowProcessInstance->fromJSON($v);
						$this->setSubWorkflowProcessInstance($SubWorkflowProcessInstance);
					}
				}
			}
			if(isset($props["WorkflowProcessInstances"])) {
				if( is_array($props["WorkflowProcessInstances"]) ) {
					foreach($props["WorkflowProcessInstances"] as $k=>$v) {
						$WorkflowProcessInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\WorkflowProcessInstances");
						$WorkflowProcessInstances->fromJSON($v);
						$this->setWorkflowProcessInstances($WorkflowProcessInstances);
					}
				}
			}
			if(isset($props["ManualActivityInstance"])) {
				if( is_array($props["ManualActivityInstance"]) ) {
					foreach($props["ManualActivityInstance"] as $k=>$v) {
						$ManualActivityInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\ManualActivityInstance");
						$ManualActivityInstance->fromJSON($v);
						$this->setManualActivityInstance($ManualActivityInstance);
					}
				}
			}
			if(isset($props["ToolActivityInstance"])) {
				if( is_array($props["ToolActivityInstance"]) ) {
					foreach($props["ToolActivityInstance"] as $k=>$v) {
						$ToolActivityInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\ToolActivityInstance");
						$ToolActivityInstance->fromJSON($v);
						$this->setToolActivityInstance($ToolActivityInstance);
					}
				}
			}
			if(isset($props["BlockActivityInstance"])) {
				if( is_array($props["BlockActivityInstance"]) ) {
					foreach($props["BlockActivityInstance"] as $k=>$v) {
						$BlockActivityInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\BlockActivityInstance");
						$BlockActivityInstance->fromJSON($v);
						$this->setBlockActivityInstance($BlockActivityInstance);
					}
				}
			}
			if(isset($props["RouteActivityInstance"])) {
				if( is_array($props["RouteActivityInstance"]) ) {
					foreach($props["RouteActivityInstance"] as $k=>$v) {
						$RouteActivityInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\RouteActivityInstance");
						$RouteActivityInstance->fromJSON($v);
						$this->setRouteActivityInstance($RouteActivityInstance);
					}
				}
			}
			if(isset($props["SubFlowActivityInstance"])) {
				if( is_array($props["SubFlowActivityInstance"]) ) {
					foreach($props["SubFlowActivityInstance"] as $k=>$v) {
						$SubFlowActivityInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\SubFlowActivityInstance");
						$SubFlowActivityInstance->fromJSON($v);
						$this->setSubFlowActivityInstance($SubFlowActivityInstance);
					}
				}
			}
			if(isset($props["ActivityInstances"])) {
				if( is_array($props["ActivityInstances"]) ) {
					foreach($props["ActivityInstances"] as $k=>$v) {
						$ActivityInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\ActivityInstances");
						$ActivityInstances->fromJSON($v);
						$this->setActivityInstances($ActivityInstances);
					}
				}
			}
			if(isset($props["AssignmentInstance"])) {
				if( is_array($props["AssignmentInstance"]) ) {
					foreach($props["AssignmentInstance"] as $k=>$v) {
						$AssignmentInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\AssignmentInstance");
						$AssignmentInstance->fromJSON($v);
						$this->setAssignmentInstance($AssignmentInstance);
					}
				}
			}
			if(isset($props["AssignmentInstances"])) {
				if( is_array($props["AssignmentInstances"]) ) {
					foreach($props["AssignmentInstances"] as $k=>$v) {
						$AssignmentInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\AssignmentInstances");
						$AssignmentInstances->fromJSON($v);
						$this->setAssignmentInstances($AssignmentInstances);
					}
				}
			}
			if(isset($props["StringDataInstance"])) {
				if( is_array($props["StringDataInstance"]) ) {
					foreach($props["StringDataInstance"] as $k=>$v) {
						$StringDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\StringDataInstance");
						$StringDataInstance->fromJSON($v);
						$this->setStringDataInstance($StringDataInstance);
					}
				}
			}
			if(isset($props["StringArrayDataInstance"])) {
				if( is_array($props["StringArrayDataInstance"]) ) {
					foreach($props["StringArrayDataInstance"] as $k=>$v) {
						$StringArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\StringArrayDataInstance");
						$StringArrayDataInstance->fromJSON($v);
						$this->setStringArrayDataInstance($StringArrayDataInstance);
					}
				}
			}
			if(isset($props["BooleanDataInstance"])) {
				if( is_array($props["BooleanDataInstance"]) ) {
					foreach($props["BooleanDataInstance"] as $k=>$v) {
						$BooleanDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\BooleanDataInstance");
						$BooleanDataInstance->fromJSON($v);
						$this->setBooleanDataInstance($BooleanDataInstance);
					}
				}
			}
			if(isset($props["BooleanArrayDataInstance"])) {
				if( is_array($props["BooleanArrayDataInstance"]) ) {
					foreach($props["BooleanArrayDataInstance"] as $k=>$v) {
						$BooleanArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\BooleanArrayDataInstance");
						$BooleanArrayDataInstance->fromJSON($v);
						$this->setBooleanArrayDataInstance($BooleanArrayDataInstance);
					}
				}
			}
			if(isset($props["DateDataInstance"])) {
				if( is_array($props["DateDataInstance"]) ) {
					foreach($props["DateDataInstance"] as $k=>$v) {
						$DateDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DateDataInstance");
						$DateDataInstance->fromJSON($v);
						$this->setDateDataInstance($DateDataInstance);
					}
				}
			}
			if(isset($props["DateArrayDataInstance"])) {
				if( is_array($props["DateArrayDataInstance"]) ) {
					foreach($props["DateArrayDataInstance"] as $k=>$v) {
						$DateArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DateArrayDataInstance");
						$DateArrayDataInstance->fromJSON($v);
						$this->setDateArrayDataInstance($DateArrayDataInstance);
					}
				}
			}
			if(isset($props["DateTimeDataInstance"])) {
				if( is_array($props["DateTimeDataInstance"]) ) {
					foreach($props["DateTimeDataInstance"] as $k=>$v) {
						$DateTimeDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DateTimeDataInstance");
						$DateTimeDataInstance->fromJSON($v);
						$this->setDateTimeDataInstance($DateTimeDataInstance);
					}
				}
			}
			if(isset($props["DateTimeArrayDataInstance"])) {
				if( is_array($props["DateTimeArrayDataInstance"]) ) {
					foreach($props["DateTimeArrayDataInstance"] as $k=>$v) {
						$DateTimeArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DateTimeArrayDataInstance");
						$DateTimeArrayDataInstance->fromJSON($v);
						$this->setDateTimeArrayDataInstance($DateTimeArrayDataInstance);
					}
				}
			}
			if(isset($props["TimeDataInstance"])) {
				if( is_array($props["TimeDataInstance"]) ) {
					foreach($props["TimeDataInstance"] as $k=>$v) {
						$TimeDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\TimeDataInstance");
						$TimeDataInstance->fromJSON($v);
						$this->setTimeDataInstance($TimeDataInstance);
					}
				}
			}
			if(isset($props["TimeArrayDataInstance"])) {
				if( is_array($props["TimeArrayDataInstance"]) ) {
					foreach($props["TimeArrayDataInstance"] as $k=>$v) {
						$TimeArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\TimeArrayDataInstance");
						$TimeArrayDataInstance->fromJSON($v);
						$this->setTimeArrayDataInstance($TimeArrayDataInstance);
					}
				}
			}
			if(isset($props["LongDataInstance"])) {
				if( is_array($props["LongDataInstance"]) ) {
					foreach($props["LongDataInstance"] as $k=>$v) {
						$LongDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\LongDataInstance");
						$LongDataInstance->fromJSON($v);
						$this->setLongDataInstance($LongDataInstance);
					}
				}
			}
			if(isset($props["LongArrayDataInstance"])) {
				if( is_array($props["LongArrayDataInstance"]) ) {
					foreach($props["LongArrayDataInstance"] as $k=>$v) {
						$LongArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\LongArrayDataInstance");
						$LongArrayDataInstance->fromJSON($v);
						$this->setLongArrayDataInstance($LongArrayDataInstance);
					}
				}
			}
			if(isset($props["DoubleDataInstance"])) {
				if( is_array($props["DoubleDataInstance"]) ) {
					foreach($props["DoubleDataInstance"] as $k=>$v) {
						$DoubleDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DoubleDataInstance");
						$DoubleDataInstance->fromJSON($v);
						$this->setDoubleDataInstance($DoubleDataInstance);
					}
				}
			}
			if(isset($props["DoubleArrayDataInstance"])) {
				if( is_array($props["DoubleArrayDataInstance"]) ) {
					foreach($props["DoubleArrayDataInstance"] as $k=>$v) {
						$DoubleArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DoubleArrayDataInstance");
						$DoubleArrayDataInstance->fromJSON($v);
						$this->setDoubleArrayDataInstance($DoubleArrayDataInstance);
					}
				}
			}
			if(isset($props["ByteArrayDataInstance"])) {
				if( is_array($props["ByteArrayDataInstance"]) ) {
					foreach($props["ByteArrayDataInstance"] as $k=>$v) {
						$ByteArrayDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\ByteArrayDataInstance");
						$ByteArrayDataInstance->fromJSON($v);
						$this->setByteArrayDataInstance($ByteArrayDataInstance);
					}
				}
			}
			if(isset($props["AnyDataInstance"])) {
				if( is_array($props["AnyDataInstance"]) ) {
					foreach($props["AnyDataInstance"] as $k=>$v) {
						$AnyDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\AnyDataInstance");
						$AnyDataInstance->fromJSON($v);
						$this->setAnyDataInstance($AnyDataInstance);
					}
				}
			}
			if(isset($props["ComplexDataInstance"])) {
				if( is_array($props["ComplexDataInstance"]) ) {
					foreach($props["ComplexDataInstance"] as $k=>$v) {
						$ComplexDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\ComplexDataInstance");
						$ComplexDataInstance->fromJSON($v);
						$this->setComplexDataInstance($ComplexDataInstance);
					}
				}
			}
			if(isset($props["SchemaDataInstance"])) {
				if( is_array($props["SchemaDataInstance"]) ) {
					foreach($props["SchemaDataInstance"] as $k=>$v) {
						$SchemaDataInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\SchemaDataInstance");
						$SchemaDataInstance->fromJSON($v);
						$this->setSchemaDataInstance($SchemaDataInstance);
					}
				}
			}
			if(isset($props["DataInstances"])) {
				if( is_array($props["DataInstances"]) ) {
					foreach($props["DataInstances"] as $k=>$v) {
						$DataInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DataInstances");
						$DataInstances->fromJSON($v);
						$this->setDataInstances($DataInstances);
					}
				}
			}
			if(isset($props["DeadlineInstance"])) {
				if( is_array($props["DeadlineInstance"]) ) {
					foreach($props["DeadlineInstance"] as $k=>$v) {
						$DeadlineInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DeadlineInstance");
						$DeadlineInstance->fromJSON($v);
						$this->setDeadlineInstance($DeadlineInstance);
					}
				}
			}
			if(isset($props["DeadlineInstances"])) {
				if( is_array($props["DeadlineInstances"]) ) {
					foreach($props["DeadlineInstances"] as $k=>$v) {
						$DeadlineInstances = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DeadlineInstances");
						$DeadlineInstances->fromJSON($v);
						$this->setDeadlineInstances($DeadlineInstances);
					}
				}
			}
			if(isset($props["InstanceExtendedAttribute"])) {
				if( is_array($props["InstanceExtendedAttribute"]) ) {
					foreach($props["InstanceExtendedAttribute"] as $k=>$v) {
						$InstanceExtendedAttribute = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\InstanceExtendedAttribute");
						$InstanceExtendedAttribute->fromJSON($v);
						$this->setInstanceExtendedAttribute($InstanceExtendedAttribute);
					}
				}
			}
			if(isset($props["InstanceExtendedAttributes"])) {
				if( is_array($props["InstanceExtendedAttributes"]) ) {
					foreach($props["InstanceExtendedAttributes"] as $k=>$v) {
						$InstanceExtendedAttributes = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\InstanceExtendedAttributes");
						$InstanceExtendedAttributes->fromJSON($v);
						$this->setInstanceExtendedAttributes($InstanceExtendedAttributes);
					}
				}
			}
			if(isset($props["DataSignature"])) {
				if( is_array($props["DataSignature"]) ) {
					foreach($props["DataSignature"] as $k=>$v) {
						$DataSignature = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DataSignature");
						$DataSignature->fromJSON($v);
						$this->setDataSignature($DataSignature);
					}
				}
			}
			if(isset($props["ContextSignature"])) {
				if( is_array($props["ContextSignature"]) ) {
					foreach($props["ContextSignature"] as $k=>$v) {
						$ContextSignature = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\ContextSignature");
						$ContextSignature->fromJSON($v);
						$this->setContextSignature($ContextSignature);
					}
				}
			}
			if(isset($props["LanguageMapping"])) {
				if( is_array($props["LanguageMapping"]) ) {
					foreach($props["LanguageMapping"] as $k=>$v) {
						$LanguageMapping = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\LanguageMapping");
						$LanguageMapping->fromJSON($v);
						$this->setLanguageMapping($LanguageMapping);
					}
				}
			}
			if(isset($props["LanguageMappings"])) {
				if( is_array($props["LanguageMappings"]) ) {
					foreach($props["LanguageMappings"] as $k=>$v) {
						$LanguageMappings = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\LanguageMappings");
						$LanguageMappings->fromJSON($v);
						$this->setLanguageMappings($LanguageMappings);
					}
				}
			}
			if(isset($props["NextInfoElement"])) {
				if( is_array($props["NextInfoElement"]) ) {
					foreach($props["NextInfoElement"] as $k=>$v) {
						$NextInfoElement = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\NextInfoElement");
						$NextInfoElement->fromJSON($v);
						$this->setNextInfoElement($NextInfoElement);
					}
				}
			}
			if(isset($props["NextInfo"])) {
				if( is_array($props["NextInfo"]) ) {
					foreach($props["NextInfo"] as $k=>$v) {
						$NextInfo = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\NextInfo");
						$NextInfo->fromJSON($v);
						$this->setNextInfo($NextInfo);
					}
				}
			}
			if(isset($props["PreviousActivityInstance"])) {
				if( is_array($props["PreviousActivityInstance"]) ) {
					foreach($props["PreviousActivityInstance"] as $k=>$v) {
						$PreviousActivityInstance = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\PreviousActivityInstance");
						$PreviousActivityInstance->fromJSON($v);
						$this->setPreviousActivityInstance($PreviousActivityInstance);
					}
				}
			}
			if(isset($props["EventAudits"])) {
				if( is_array($props["EventAudits"]) ) {
					foreach($props["EventAudits"] as $k=>$v) {
						$EventAudits = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\EventAudits");
						$EventAudits->fromJSON($v);
						$this->setEventAudits($EventAudits);
					}
				}
			}
			if(isset($props["StateEventAudit"])) {
				if( is_array($props["StateEventAudit"]) ) {
					foreach($props["StateEventAudit"] as $k=>$v) {
						$StateEventAudit = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\StateEventAudit");
						$StateEventAudit->fromJSON($v);
						$this->setStateEventAudit($StateEventAudit);
					}
				}
			}
			if(isset($props["DataEventAudit"])) {
				if( is_array($props["DataEventAudit"]) ) {
					foreach($props["DataEventAudit"] as $k=>$v) {
						$DataEventAudit = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\DataEventAudit");
						$DataEventAudit->fromJSON($v);
						$this->setDataEventAudit($DataEventAudit);
					}
				}
			}
			if(isset($props["AssignmentEventAudit"])) {
				if( is_array($props["AssignmentEventAudit"]) ) {
					foreach($props["AssignmentEventAudit"] as $k=>$v) {
						$AssignmentEventAudit = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\AssignmentEventAudit");
						$AssignmentEventAudit->fromJSON($v);
						$this->setAssignmentEventAudit($AssignmentEventAudit);
					}
				}
			}
			if(isset($props["CreateProcessEventAudit"])) {
				if( is_array($props["CreateProcessEventAudit"]) ) {
					foreach($props["CreateProcessEventAudit"] as $k=>$v) {
						$CreateProcessEventAudit = \Adaptor_Bindings::create("\\at\\together\\_2006\\xpil1\\CreateProcessEventAudit");
						$CreateProcessEventAudit->fromJSON($v);
						$this->setCreateProcessEventAudit($CreateProcessEventAudit);
					}
				}
			}
			if(isset($props["Id"])) {
				$this->setId($props["Id"]);
			}
			if(isset($props["Name"])) {
				$this->setName($props["Name"]);
			}
		}
		
	}
		

