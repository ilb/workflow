<?php
/**
 * Description of processResourceProxy
 *
 * @author korchak
 */
namespace ru\ilb\workflow\api;

use ru\ilb\common\rs\JAXRSClientProxyImpl;

class ProcessResourceProxy extends JAXRSClientProxyImpl implements ProcessResource {

	/**
	 * 
	 * @param string $processId
	 * @param array $xpilprop 
	 * @return at\together\_2006\xpil1\MainWorkflowProcessInstance
	 */
	public function getProcessDetails($processId, $xpilprop = NULL) {
		if(!$processId) {
			throw new \Exception('processId не передан');
		}
		$url = $this->baseUrl.'/processes/'.$processId;
		$conn = \HTTP_ConnectionPool::getInstance()->getConnect($url, $this->curlConfig);
		$response = $conn->doGet($url.
			(empty($xpilprop)? '':('?xpilprop='.\implode('&xpilprop=', $xpilprop))));
		$return = new \at\together\_2006\xpil1\MainWorkflowProcessInstance();
		$return->fromXmlStr($response);
		return $return;
	}

	/**
	 * @param string $processId
	 * @param string $activityId
	 * @param array $xpilprop 
	 * @return at\together\_2006\xpil1\MainWorkflowProcessInstance
	 */
	public function getActivity($processId, $activityId, $xpilprop = NULL, $x_remote_user = NULL, $accept=NULL) {
		if(!$processId) {
			throw new \Exception('processId не передан');
		}
		if(!$activityId) {
			throw new \Exception('activityId не передан');
		}
		$url = $this->baseUrl.'/processes/'.$processId.'/activities/'.$activityId;
		$conn = \HTTP_ConnectionPool::getInstance()->getConnect($url, $this->curlConfig);
                $headers = [];
                if (!is_null($x_remote_user)) {
                    $headers[] = "X-Remote-User: ".$x_remote_user;
                }
                $queryparams=array();
                if (!empty($xpilprop)){
                    $queryparams[]='xpilprop='.\implode('&xpilprop=', $xpilprop);
                }
                if($accept!=null){
                    $queryparams[]="accept=".($accept?"true":"false");
                }
                if(!empty($queryparams)){
                    $url=$url."?".implode("&",$queryparams);
                }
		$response = $conn->doGet($url,$headers);
		$return = new \at\together\_2006\xpil1\MainWorkflowProcessInstance();
		$return->fromXmlStr($response);
		return $return;
	}

	/**
	 * @param string $processId
	 * @param string $activityId
	 * @param at\together\_2006\xpil1\ActivityInstance $activityInstance
	 * @return string
	 */
	public function editActivity($processId, $activityId, $activityInstance) {
		if(!$processId) {
			throw new \Exception('processId не передан');
		}
		if(!$activityId) {
			throw new \Exception('activityId не передан');
		}
		if(!$activityInstance) {
			throw new \Exception('activityInstance не передан');
		}
		$url = $this->baseUrl.'/processes/'.$processId.'/activities/'.$activityId;
		$conn = \HTTP_ConnectionPool::getInstance()->getConnect($url, $this->curlConfig);
		return $conn->doPutXML($url, $activityInstance->toXmlStr());
	}

	/**
	 * @param array $xpilprop
	 * @param string $filter
	 * @return at\together\_2006\xpil1\WorkflowProcessInstances
	 */
	public function getWorkList($xpilprop = NULL, $filter = NULL) {
		$url = $this->baseUrl.'/processes/workList';
		$conn = \HTTP_ConnectionPool::getInstance()->getConnect($url, $this->curlConfig);
		$noXpilprop = empty($xpilprop);
		$noFilter = $filter === NULL;
		$response = $conn->doGet($url.
			($noXpilprop && $noFilter? '':
				('?'.($noXpilprop? '':('xpilprop='.\implode('&xpilprop=', $xpilprop))).
					($noXpilprop || $noFilter? '':'&').
					($noFilter? '':('filter='.$filter)))));
		$return = new \at\together\_2006\xpil1\WorkflowProcessInstances();
		$return->fromXmlStr($response);
		return $return;
	}
	
		
	/**
	 * @param array $xpilprop
	 * @param string $filter
	 * @return at\together\_2006\xpil1\WorkflowProcessInstances
	 */
	public function getProcessInstanceList($xpilprop = NULL, $filter = NULL) {
		$url = $this->baseUrl.'/processes';
		$conn = \HTTP_ConnectionPool::getInstance()->getConnect($url, $this->curlConfig);
		$noXpilprop = empty($xpilprop);
		$noFilter = $filter === NULL;
		$response = $conn->doGet($url.
			($noXpilprop && $noFilter? '':
				('?'.($noXpilprop? '':('xpilprop='.\implode('&xpilprop=', $xpilprop))).
					($noXpilprop || $noFilter? '':'&').
					($noFilter? '':('filter='.$filter)))));
		$return = new \at\together\_2006\xpil1\WorkflowProcessInstances();
		$return->fromXmlStr($response);
		return $return;
	}

	/**
	 * @param array $xpilprop
	 * @param string $filter
	 * @return at\together\_2006\xpil1\WorkflowProcessInstances
	 */
	public function getWorkListEmbedded($xpilprop = NULL, $filter = NULL) {
		$url = $this->baseUrl.'/processes/workListEmbedded';
		$conn = \HTTP_ConnectionPool::getInstance()->getConnect($url, $this->curlConfig);
		$noXpilprop = empty($xpilprop);
		$noFilter = $filter === NULL;
		$response = $conn->doGet($url.
			($noXpilprop && $noFilter? '':
				('?'.($noXpilprop? '':('xpilprop='.\implode('&xpilprop=', $xpilprop))).
					($noXpilprop || $noFilter? '':'&').
					($noFilter? '':('filter='.$filter)))));
		$return = new \at\together\_2006\xpil1\WorkflowProcessInstances();
		$return->fromXmlStr($response);
		return $return;
	}

	/**
	 * @param string $processId
	 * @return string
	 */
	public function getProcessGraph($processId) {
		if(!$processId) {
			throw new \Exception('processId не передан');
		}
		$url = $this->baseUrl.'/processes/'.$processId .'/graph';
		$conn = \HTTP_ConnectionPool::getInstance()->getConnect($url, $this->curlConfig);
		$response = $conn->doGet($url);
		return $response;
	}

	/**
	 * @param string $processId
	 * @return at\together\_2006\xpil1\MainWorkflowProcessInstance
	 */
	public function getProcessComments($processId) {
		if(!$processId) {
			throw new \Exception('processId не передан');
		}
		$url = $this->baseUrl.'/processes/'.$processId .'/comments';
		$conn = \HTTP_ConnectionPool::getInstance()->getConnect($url, $this->curlConfig);
		$response = $conn->doGet($url);
		$return = new \at\together\_2006\xpil1\MainWorkflowProcessInstance();
		$return->fromXmlStr($response);
		return $return;
	}

	/**
	 * @param string $processId
	 * @param at\together\_2006\xpil1\StringValue $stringValue
	 * @return string
	 */
	public function addProcessComment($processId, $stringValue) {
		if(!$processId) {
			throw new \Exception('processId не передан');
		}
		if(!$stringValue) {
			throw new \Exception('stringValue не передан');
		}
		$url = $this->baseUrl.'/processes/'.$processId.'/comments';
		$conn = \HTTP_ConnectionPool::getInstance()->getConnect($url, $this->curlConfig);
		return $conn->doPostXML($url, $stringValue->toXmlStr());
	}
	
	/**
	 * @param at\together\_2006\xpil1\MainWorkflowProcessInstance $mainWorkflowProcessInstance
	 * @return string
	 */
	public function createProcessInstance($mainWorkflowProcessInstance) {
		if(!$mainWorkflowProcessInstance) {
			throw new \Exception('mainWorkflowProcessInstance не передан');
		}
		$url = $this->baseUrl.'/processes';
		$conn = \HTTP_ConnectionPool::getInstance()->getConnect($url, $this->curlConfig);
		return $conn->doPostXML($url, $mainWorkflowProcessInstance->toXmlStr());
	}

	/**
	 * @param array $xpilprop
	 * @param at\together\_2006\xpil1\MainWorkflowProcessInstance $mainWorkflowProcessInstance
	 * @return at\together\_2006\xpil1\MainWorkflowProcessInstance
	 */
	public function createProcessInstanceXml($xpilprop, $mainWorkflowProcessInstance) {
		if(!$mainWorkflowProcessInstance) {
			throw new \Exception('mainWorkflowProcessInstance не передан');
		}
		$url = $this->baseUrl.'/processes';
		$conn = \HTTP_ConnectionPool::getInstance()->getConnect($url, $this->curlConfig);
		$response = $conn->doPostXML($url.
			(empty($xpilprop)? '':('?xpilprop='.\implode('&xpilprop=', $xpilprop))),
			$mainWorkflowProcessInstance->toXmlStr());
		$return = new \at\together\_2006\xpil1\MainWorkflowProcessInstance();
		$return->fromXmlStr($response);
		return $return;
	}

	/**
	 * @param string $filter
	 * @return string
	 */
	public function terminateProcessInstanceList($filter) {
		$url = $this->baseUrl.'/processes';
		$conn = \HTTP_ConnectionPool::getInstance()->getConnect($url, $this->curlConfig);
		return $conn->doDelete($url.($filter? ('?filter='.$filter):''));
	}

}

