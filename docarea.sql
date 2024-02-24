CREATE DATABASE IF NOT EXISTS docarea;
USE docarea;
CREATE TABLE IF NOT EXISTS Doctors (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    DoctorName VARCHAR(255) NOT NULL,
    DoctorInformation TEXT NOT NULL,
    DoctorImage VARCHAR(255) NOT NULL,
    DoctorArea VARCHAR(255) NOT NULL,
    DoctorCategory VARCHAR(255) NOT NULL
);
INSERT INTO Doctors (DoctorName, DoctorInformation, DoctorImage, DoctorArea, DoctorCategory) 
VALUES 
('sudam', 'Information1', 'image1.jpg', 'Area1', 'dentist'),
('Doctor2', 'Information2', 'image2.jpg', 'Area2', 'Category2'),
('Doctor3', 'Information3', 'image3.jpg', 'Area1', 'Category1');
