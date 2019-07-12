# -*- coding: utf-8 -*-
"""
workflow processes tests
"""

import unittest
import workflow
from workflow.configuration import Configuration

class TestProcessInstances(unittest.TestCase):

    def setUp(self):
        self.configuration = Configuration()
        self.configuration.host="http://127.0.0.1:8080/workflow-web/web"
        self.configuration.username = "ide"
        self.configuration.password = "123"
        self.configuration.debug=True
        self.workflow_api = workflow.DefaultApi(workflow.ApiClient(configuration=self.configuration,header_name="Authorization",header_value="Basic c2xhdmI6MTIz"))
        
    def test_createProcessInstanceAndNext(self):
        processInstanceId = self.workflow_api.create_process_instance_and_next_with_http_info(process_definition_id="stockvaluation_fairpricecalc",body={})
        print('processInstanceId', processInstanceId)

if __name__ == '__main__':
    unittest.main()
