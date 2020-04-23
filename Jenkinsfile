pipeline {
    agent any
    stages {
        stage ('Build') {
            steps {
                sh 'mvn install deploy'
                sh 'sudo /opt/bin/tomcatmavendeploy /var/lib/tomcat-8/shark/webapps/workflow.mavendeploy'
            }
        }
    }
    post {
        always {
            deleteDir()
        }
    }
}
