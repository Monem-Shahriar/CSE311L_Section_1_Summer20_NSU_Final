<?php

$link = mysqli_connect('localhost', 'root', '', 'Final_Su');

if ($link == false) {
    die ("Error: Could not connect. " .mysqli_connect_error());
}

$sql_student = "create table student(
    snum numeric(9,0) primary key NOT NULL,
    sname varchar(30),
    major varchar(25),
    level varchar(2),
    age numeric(3,0)
    )";

if (mysqli_query($link, $sql_student)) {
    echo "student table created.\n";
} else {
    echo "Error: could not able to create student table " .mysqli_error($link);
}



$sql_Department = "create table Department(
    fid numeric(9,0) primary key NOT NULL,
    fname varchar(30),
    deptid numeric(2,0)
    )";

if (mysqli_query($link, $sql_Department)) {
    echo "Department table created.\n";
} else {
    echo "Error: could not able to create Department table " .mysqli_error($link);
}


$sql_class= "create table class(
    name varchar(40) primary key NOT NULL,
    meets_at varchar(20),
    room varchar(10),
    fid numeric(9,0),
    foreign key (fid) references Department(fid)
    )";

if (mysqli_query($link, $sql_class)) {
    echo "class table created.\n";
} else {
    echo "Error: could not able to create class table.\n " .mysqli_error($link);
}

$sql_Course= "create table Course(
    snum numeric(9,0),
    cname varchar(40),
    primary key(snum,cname),
    foreign key (snum) references student(snum),
    foreign key (cname) references class(name)
    )";

if (mysqli_query($link, $sql_Course)) {
    echo "Course table created.\n";
} else {
    echo "Error: could not able to create Course table.\n " .mysqli_error($link);
}


$sql_Providers= "create table Providers(
	sid int(9) primary key,
	sname varchar(30),
	address varchar(40)
    )";

if (mysqli_query($link, $sql_Providers)) {
    echo "Providers table created.\n";
} else {
    echo "Error: could not able to create Providers table.\n " .mysqli_error($link);
}

$sql_Goodies= "create table Goodies(
	pid int(9) primary key,
	pname varchar(40),
	color varchar(15) 
    )";

if (mysqli_query($link, $sql_Goodies)) {
    echo "Goodies table created.\n";
} else {
    echo "Error: could not able to create Goodies table.\n " .mysqli_error($link);
}

$sql_Stock= "create table Stock(
	sid int(9),
	pid int(9),
	cost int(10),
	primary key(sid,pid),
	foreign key(sid) references Providers(sid),
	foreign key(pid) references Goodies(pid)
    )";

if (mysqli_query($link, $sql_Stock)) {
    echo "Stock table created.\n";
} else {
    echo "Error: could not able to create Stock table.\n " .mysqli_error($link);
}



mysqli_close($link)

?>
