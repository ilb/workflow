# -*- coding: utf-8 -*-
"""
workflow processes tests
"""

import unittest
import base64
import os
from workflow import ApiClient as WorkflowApiClient
from workflow.configuration import Configuration as WorkflowConfiguration
from workflow.api.process_instances_api import ProcessInstancesApi
from filedossier import ApiClient as FiledossierApiClient
from filedossier.configuration import Configuration as FiledossierConfiguration
from filedossier.api.dossiers_api import DossiersApi


class TestProcessInstances(unittest.TestCase):

    def setUp(self):
        self.workflowUrl="http://127.0.0.1:8080/workflow-web/web/v2"
        self.setUpWorkflow()
        self.setUpFiledossier()
    def setUpWorkflow(self):
        configuration = WorkflowConfiguration()
        configuration.host=self.workflowUrl
        configuration.username =  os.environ.get('USER')
        configuration.password = "123"
        configuration.debug=True
        auth_header='Basic ' + base64.b64encode(bytes(configuration.username+':'+configuration.password, 'utf-8')).decode("utf-8")
        self.process_api = ProcessInstancesApi(WorkflowApiClient(configuration=configuration,header_name="Authorization",header_value=auth_header))
    def setUpFiledossier(self):
        configuration = FiledossierConfiguration()
        configuration.host=self.workflowUrl
        configuration.username =  os.environ.get('USER')
        configuration.password = "123"
        configuration.debug=True
        auth_header='Basic ' + base64.b64encode(bytes(configuration.username+':'+configuration.password, 'utf-8')).decode("utf-8")
        self.filedossier_api = DossiersApi(FiledossierApiClient(configuration=configuration,header_name="Authorization",header_value=auth_header))
    def test_createProcessInstanceAndNext(self):
        self.nextActivity = self.process_api.create_process_instance_ctx(process_definition_id="simpletest",call_id="process123",callback_url="http://localhost",context_url="http://localhost",_preload_content=False)
        print('nextActivity', self.nextActivity.headers)
        processInstanceId = self.nextActivity.process_instance_id #.processInstance.id
        print('processInstanceId',processInstanceId)
        body={'x':2}
        self.nextActivity=self.process_api.complete_and_next(self.nextActivity.id,self.nextActivity.process_instance_id,body=body)
        print('nextActivity', self.nextActivity)
        self.activityForm=self.process_api.get_activity_form1(self.nextActivity.id,self.nextActivity.process_instance_id)
        print('activityForm!!!', self.activityForm)
        body={}
        #self.nextActivity=self.process_api.complete_and_next(self.nextActivity.id,self.nextActivity.process_instance_id,body=body)
        self.nextActivity=self.process_api.complete_and_next_with_http_info(self.nextActivity.id,self.nextActivity.process_instance_id,body=body,_preload_content=False)
        print('nextActivityDAta', self.nextActivity[0].data)
        processInstance = self.process_api.get_process_instance(processInstanceId)
        print('processInstance',processInstance)
        self.assertEqual('closed.completed',processInstance.state.code)
        print('done')
if __name__ == '__main__':
    unittest.main()
