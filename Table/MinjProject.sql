--Employee (พนักงาน)
CREATE TABLE Employee(
EmployeeID INT IDENTITY(1000000,1) PRIMARY KEY NOT NULL,
FirstName VARCHAR(20) NOT NULL,
LastName VARCHAR(20) NOT NULL,
TellNumber VARCHAR(10),
Department VARCHAR(20) NOT NULL,
Position VARCHAR(20) NOT NULL,
Status VARCHAR(10) NOT NULL -- Active or Locked
);

--Accounts (ชื่อผู้ใช้งานของพนักงาน)
CREATE TABLE Accounts(
EmployeeID INT NOT NULL,
Username VARCHAR(20) PRIMARY KEY NOT NULL,
Password VARCHAR(20),
CountLock VARCHAR(3),
CONSTRAINT FK_AccountsEmployee FOREIGN KEY (EmployeeID) REFERENCES EMPLOYEE(EmployeeID)
);

--LoginSession (ประวัติการล็อกอิน)
CREATE TABLE LoginSession(
EmployeeID INT NOT NULL,
TimeLogin DATETIME ,
CONSTRAINT FK_LoginSessionEmployee FOREIGN KEY (EmployeeID) REFERENCES EMPLOYEE(EmployeeID)
);

--LogoutSession (ประวัติการล็อกเอาท์)
CREATE TABLE LogoutSession(
EmployeeID INT NOT NULL,
Username VARCHAR(20),
Password VARCHAR(20),
CountLock VARCHAR(3),
CONSTRAINT FK_AccountsEmployee FOREIGN KEY (EmployeeID) REFERENCES EMPLOYEE(EmployeeID)
);

--Department (แผนก)
CREATE TABLE DEPARTMENT(
DepartmentID INT PRIMARY KEY NOT NULL,
DepartmentName VARCHAR(20) NOT NULL,
);


--Position (ตำแหน่ง)
CREATE TABLE POSITION(
PositionID INT PRIMARY KEY NOT NULL,
PositionName VARCHAR(20) NOT NULL
);

--Room (ห้องประชุม)
CREATE TABLE ROOM(
RoomID INT PRIMARY KEY NOT NULL,
RoomName VARCHAR(20) NOT NULL,
Building VARCHAR(20) NOT NULL,
Floor INT  NOT NULL,
Capacity INT NOT NULL,
Status VARCHAR(10) NOT NULL -- Available or Unavalible
);

--Reservation (การจอง)
CREATE TABLE RESERVATION(
ReservationID INT NOT NULL,
EmployeeID INT NOT NULL ,
RoomID INT NOT NULL,
StartTime INT NOT NULL,
EndTime INT NOT NULL,
Status INT NOT NULL , -- Pending or Approved or Rejected
Qrcode VARCHAR(3) NOT NULL,
PRIMARY KEY (ReservationID),
CONSTRAINT FK_EmpReservation FOREIGN KEY (EmployeeID) REFERENCES EMPLOYEE(EmployeeID),
CONSTRAINT FK_RoomIDReservation FOREIGN KEY (RoomID) REFERENCES ROOM(RoomID)
);

--AccessRight (สิทธิ์เข้าถึงหน้าจอ)
CREATE TABLE ACCESSRIGHT(
AcessRightID INT PRIMARY KEY NOT NULL,
PositionID INT NOT NULL,
ScreenName VARCHAR(20),
CanView CHAR(3),
CanEdit CHAR(3),
CanDelete CHAR(3),
CONSTRAINT FK_PositionAcessRight FOREIGN KEY (PositionID) REFERENCES POSITION(PositionID)
);





SELECT FirstName FROM EMPLOYEE WHERE EmployeeID = 1000000;

UPDATE Employee SET Status = 110 WHERE EmployeeID = 1000000;
UPDATE Employee SET Status = 111 WHERE EmployeeID = 1000000;