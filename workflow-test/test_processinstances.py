# -*- coding: utf-8 -*-
"""
workflow processes tests
"""

import unittest
import workflow
import base64
from workflow.configuration import Configuration

class TestProcessInstances(unittest.TestCase):

    def setUp(self):
        self.configuration = Configuration()
        self.configuration.host="http://127.0.0.1:8080/workflow-web/web/v2"
        self.configuration.username = "slavb"
        self.configuration.password = "123"
        self.configuration.debug=True
        auth_header='Basic ' + base64.b64encode(bytes(self.configuration.username+':'+self.configuration.password, 'utf-8')).decode("utf-8") 
        self.workflow_api = workflow.DefaultApi(workflow.ApiClient(configuration=self.configuration,header_name="Authorization",header_value=auth_header))
        
    def test_createProcessInstanceAndNext(self):
        nextActivity = self.workflow_api.create_process_instance_and_next(process_definition_id="stockvaluation_fairpricecalc",body={})
        print('nextActivity', nextActivity)

if __name__ == '__main__':
    unittest.main()
