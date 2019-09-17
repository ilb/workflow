#!/bin/bash
set -e
VERSION=6.3-4
JARS=`find $HOME/.m2/repository/org/enhydra -name *.jar  |grep -v sources`
JARS="$JARS $HOME/.m2/repository/org/jdesktop/xmlhttprequest/1.2/xmlhttprequest-1.2.jar"
REPOSITORYPATH=../sharkrepo
mkdir -p $REPOSITORYPATH

for FILE in $JARS; do
    GROUPID=`dirname $FILE`
    VERSION=`basename $GROUPID`
    GROUPID=`dirname $GROUPID`
    GROUPID=${GROUPID#"$HOME/.m2/repository/"}
    ARTIFACTID=`basename $GROUPID`
    GROUPID=`dirname $GROUPID`
    GROUPID=${GROUPID//\//.}
    SRCARTIFACT=""
    SRCFILE=${FILE/.jar/-sources.jar}
    if [ -f $SRCFILE ]; then
        SRCARTIFACT="-Dsources=$SRCFILE"
    fi
    #echo GROUPID=$GROUPID ARTIFACTID=$ARTIFACTID VERSION=$VERSION
    mvn org.apache.maven.plugins:maven-install-plugin:2.3.1:install-file \
                         -Dfile=$FILE -DgroupId=$GROUPID \
                         -DartifactId=$ARTIFACTID -Dversion=$VERSION \
                         -Dpackaging=jar -DlocalRepositoryPath=$REPOSITORYPATH -DgeneratePom=true $SRCARTIFACT
done

