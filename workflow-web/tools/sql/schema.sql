drop schema if exists workflow;
create schema workflow;
grant all privileges on workflow.* to 'workflow'@'localhost' identified by 'shark';
grant all privileges on workflow.* to 'workflow'@'%' identified by 'shark';

