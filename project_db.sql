CREATE TABLE IF NOT EXISTS Patients (
patient_id int (30) AUTO_INCREMENT primary key,
ashesiForm varchar (50) NOT NULL

);


CREATE TABLE IF NOT EXISTS Nurse (
  nurse_id int(20) NOT NULL primary key Auto_Increment,
  username varchar(50) NOT NULL,
  firstname varchar(50) NOT NULL,
  lastname varchar(50) NOT NULL,
  phone_number int(20) NOT NULL,
  working_hours time NOT NULL,
  email varchar(50) NOT NULL,
  password varchar(36) NOT NULL,
  specificPatient_id int (30) NOT NULL references Patients(patient_id)
  );
  
CREATE TABLE IF NOT EXISTS Faculty (
faculty_id int(20) NOT NULL primary key AUTO_INCREMENT,
username varchar(50) NOT NULL,
firstname varchar (50) NOT NULL,
lastname varchar (50) NOT NULL,
gender varchar(30) NOT NULL,
dateOfBirth date NOT NULL,
department varchar (30) NOT NULL,
phone_number int(30) NOT NULL,
insuranceType varchar (50) NOT NULL,
nationality varchar (50) NOT NULL,
email varchar (30) NOT NULL,
facultyPatient_id int (30) NOT NULL references Patients (patient_id)

);  


CREATE TABLE IF NOT EXISTS Students (
student_id int (20) NOT NULL primary key AUTO_INCREMENT,
username varchar (50) NOT NULL,
firstname varchar (50) NOT NULL,
lastname varchar (50) NOT NULL,
gender varchar (30) NOT NULL,
insuranceType varchar (50) NOT NULL,
dateOfBirth varchar (50) NOT NULL,
phone_number int (30) NOT NULL,
nationality varchar (50) NOT NULL,
class int (10) NOT NULL,
email varchar (50) NOT NULL,
studentPatient_id int (30) NOT NULL references Patients(patient_id)

);

CREATE TABLE IF NOT EXISTS Staff (
staff_id int (20) NOT NULL primary key AUTO_INCREMENT,
username varchar (50) NOT NULL,
firstname varchar (50) NOT NULL,
lastname varchar (50) NOT NULL,
gender varchar (30) NOT NULL,
insuranceType varchar (50) NOT NULL,
dateOfBirth varchar (50) NOT NULL,
phone_number int (30) NOT NULL,
nationality varchar (50) NOT NULL,
email varchar (50) NOT NULL,
specialization varchar (200) NOT NULL,
staffPatient_id int (30) NOT NULL references Patients(patient_id)

);

CREATE TABLE IF NOT EXISTS Diagnosis (
diagnosis_id int (20) NOT NULL primary key AUTO_INCREMENT,
date timestamp NOT NULL,
temp int (20) NOT NULL,
sp02 varchar (20) NOT NULL,
pulse int (20) NOT NULL,
bloodPressure int (20) NOT NULL,
complaints varchar (255) NOT NULL, 
treatment varchar (255) NOT NULL,
remark varchar (255) NOT NULL,
specificPatient_id int (30) NOT NULL references Patients(patient_id)
);

