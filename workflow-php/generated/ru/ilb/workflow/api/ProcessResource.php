<?php

/**
 * Description of processResource
 *
 * @author korchak
 */

namespace ru\ilb\workflow\api;

interface ProcessResource {

    /**
     * @param string $processId
     * @param array $xpilprop
     * @return at\together\_2006\xpil1\MainWorkflowProcessInstance
     */
    public function getProcessDetails($processId, $xpilprop);

    /**
     * @param string $processId
     * @param string $activityId
     * @param array $xpilprop
     * @return at\together\_2006\xpil1\MainWorkflowProcessInstance
     */
    public function getActivity($processId, $activityId, $xpilprop, $x_remote_user, $accept);

    /**
     * @param string $processId
     * @param string $activityId
     * @param at\together\_2006\xpil1\ActivityInstance $activityInstance
     * @return string
     */
    public function editActivity($processId, $activityId, $activityInstance);

    /**
     * @param array $xpilprop
     * @param string $filter
     * @return at\together\_2006\xpil1\WorkflowProcessInstances
     */
    public function getWorkList($xpilprop, $filter);

    /**
     * @param array $xpilprop
     * @param string $filter
     * @return at\together\_2006\xpil1\WorkflowProcessInstances
     */
    public function getProcessInstanceList($xpilprop, $filter);

    /**
     * @param array $xpilprop
     * @param string $filter
     * @return at\together\_2006\xpil1\WorkflowProcessInstances
     */
    public function getWorkListEmbedded($xpilprop, $filter);

    /**
     * @param string $processId
     * @return string
     */
    public function getProcessGraph($processId);

    /**
     * @param string $processId
     * @return at\together\_2006\xpil1\MainWorkflowProcessInstance
     */
    public function getProcessComments($processId);

    /**
     * @param string $processId
     * @param at\together\_2006\xpil1\StringValue $stringValue
     * @return string
     */
    public function addProcessComment($processId, $stringValue);

    /**
     * @param at\together\_2006\xpil1\MainWorkflowProcessInstance $mainWorkflowProcessInstance
     * @return string
     */
    public function createProcessInstance($mainWorkflowProcessInstance);

    /**
     * @param array $xpilprop
     * @param at\together\_2006\xpil1\MainWorkflowProcessInstance $mainWorkflowProcessInstance
     * @return at\together\_2006\xpil1\MainWorkflowProcessInstance
     */
    public function createProcessInstanceXml($xpilprop, $mainWorkflowProcessInstance);

    /**
     * @param string $filter
     * @return string
     */
    public function terminateProcessInstanceList($filter);

    /**
     * @param string $processId
     * @param string $activityId
     * @return string
     */
    public function completeProcess($processId, $activityId);
}
