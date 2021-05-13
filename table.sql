create table poll (
sno int not null auto increment,
pollQues varchar(2000),
pollId int,
pollOption varchar(2000),
cnt int,
primary key (sno)
);