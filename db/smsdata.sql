create database sms;
use sms;
create table parent(
    parent_id int PRIMARY KEY,
    name varchar(45),
    email varchar(50),
    phone varchar(25)
);
create table student(
    student_id int PRIMARY KEY,
    name varchar(45),
    email varchar(50),
    password varchar(45),
    dob date,
    sex varchar(6),
    Address varchar(45),
    phone varchar(25),
    date_of_join varchar(20),
    parent_id int,
    FOREIGN KEY (parent_id) REFERENCES parent(parent_id)
    
);

create table exam(
	exam_id int PRIMARY KEY,
    date date,
    name varchar(50),
    type varchar(50)
);
create table grade(
    grade_id int PRIMARY KEY,
    name varchar(45) not null,
    description varchar(45)
);
create table teacher(
	teacher_id int PRIMARY KEY,
    email varchar(45),
    name varchar(45) not null,
    phone varchar(45)
);
create table subject(
	subject_id int PRIMARY KEY,
    name varchar(50),
    grade_id int,
    description varchar(200),
    teacher_id int,
    FOREIGN KEY (grade_id) REFERENCES grade(grade_id),
    FOREIGN KEY (teacher_id) REFERENCES teacher(teacher_id) 
);
create table result(
    exam_id int,
    student_id int not null,
    subject_id int not null,
    marks int,
    FOREIGN KEY (subject_id) REFERENCES subject(subject_id),
    FOREIGN KEY (student_id) REFERENCES student(student_id),
    FOREIGN KEY (exam_id) REFERENCES exam(exam_id)
);

create table classroom(
	classroom_id int PRIMARY KEY,
    grade_id int NOT null,
    section varchar(2),
    status boolean,
    FOREIGN KEY (grade_id) REFERENCES grade(grade_id)

);

create table classroom_student(
	classroom_id int not null,
    student_id int not null,
    FOREIGN KEY (classroom_id) REFERENCES classroom(classroom_id),
    FOREIGN KEY (student_id) REFERENCES student(student_id) 
);

CREATE TABLE attendence(
	date date PRIMARY KEY,
    student_id int not null,
    status varchar(3) not null,
    FOREIGN KEY (student_id) REFERENCES student(student_id)
);