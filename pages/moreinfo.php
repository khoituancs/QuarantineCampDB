<p class="text-start" style="white-space: pre;">
DATABASE SYSTEMS - ASSIGNMENT 2
Notes
❑ Students should read everything presented below carefully.
❑ This assignment is worth 15% of the overall grade.
❑ Appropriate softwares can be used to support your implementation
❑ Assignment 2 is team work.
Submission
You should submit your coursework on BKeL with one zip file (all source code)
as announced on BKeL.
The file name will be <class code>_<team number>_<submiter name>.zip
(e.g., CC02_1_NguyenVanA.zip). The zip file may contain resources as follows:
• Team member list
• Source code
• Report
• Other supporting files (if any)
Note: Do not forget to press “Submit” button on BkeL.
Requirements
In the assignment 2, you are expected to implement and query the database
from your assignment 1, using a DBMS of your choice:
(i) Designing the database at the physical level.
(ii) Implementing the above physical database.
(iii) Performing database operations, such as SELECT, INSERT, UPDATE,
DELETE...
(iv) Building a desktop or web application to connect to the database.Assignment 2
Part 1: Physical Database Design (2.5 marks)
A- Implementing the database (2 marks)
You have to implement your database, based on your assigned topic, into the physical
database.
• Giving the full explanation of your choices of data types, data length, and
constraints in your database.
B- Insert data (0.5 mark)
• Insert data for all tables in the database.
• Requirements: The data in the tables must be meaningful, and each table has at
least 4 rows.
Part 2: Store Procedure / Function / SQL (3 marks)
2.1 Hospital Database
a. Increase Inpatient Fee to 10% for all the current inpatients who are admitted to
hospital from 01/09/2020. (0.5 mark)
b. Select all the patients (outpatient & inpatient) of the doctor named ‘Nguyen Van
A’. (0.5 mark)
c. Write a function to calculate the total medication price a patient has to pay for
each treatment or examination (1 mark).
Input: Patient ID
Output: A list of payment of each treatment or examination
d. Write a procedure to sort the doctor in increasing number of patients he/she
takes care in a period of time (1 mark).
Input: Start date, End date
Output: A list of sorting doctors.
2.2 Fabric Agency Database
a. Increase Silk selling price to 10% of those provided by all suppliers from
01/09/2020. (0.5 mark)
b. Select all orders containing bolt from the supplier named ‘Silk Agency’. (0.5
mark)
c. Write a function to calculate the total purchase price the agency has to pay for
each supplier (1 mark).
Input: Supplier ID
Output: A list of payment
d. Write a procedure to sort the suppliers in increasing number of categories they
provide in a period of time (1 mark).
Input: Start date, End date
Output: A list of sorting suppliers.
2.1 Quarantine Camp Database
a. Update patient PCR test to positive with null cycle threshold value for all
patients whose admission date is from 01/09/2020. (0.5 mark)
b. Select all the patient information whose name is ‘Nguyen Van A’. (0.5 mark)
c. Write a function to calculate the testing for each patient (1 mark).
Input: Patient ID
Output: A list of testingd. Write a procedure to sort the nurses in decreasing number of patients he/she
takes care in a period of time (1 mark).
Input: Start date, End date
Output: A list of sorting nurses.
PART 3: BUILDING APPLICATIONS (2.5 marks)
Build an application with the following requirements:
- Programming environment: optional (desktop, web, or mobile application).
- Programming language: optional.
- The application connects to the database created in Part 1 and Part 2.
- Display the data on the form and perform the requirements below.
- Students need to prepare data and scripts for demonstration at the reporting session.
I. Create user
Log in to the database with DBA privileges such as SYS / SYSTEM ...., create a user
named “Manager” and assign all access rights to this user.
II. Requirement functions (2.5 marks)
• Log in, log out (enter the user name/password for Manager account to log
in/out). (0.5 mark)
• Log in to the user manager and do the followings (2 marks):
o Hospital Database
1. Search patient information: Search results include the name, phone
number and information about the treatment and visit of the patient.
(0.5 mark)
2. Add information for a new patient. (0.5 mark)
3. List details of all patients which are treated by a doctor. (0.5 mark)
4. Make a report that provides full information about the payment for
each treatment or examination of a patient (0.5 mark).
o Fabric Agency Database
1. Search material purchasing information: Search results include the
name, phone number of the suppliers and information about the
supply. (0.5 mark)
2. Add information for a new supplier. (0.5 mark)
3. List details of all categories which are provided by a supplier. (0.5
mark)
4. Make a report that provides full information about the order for each
category of a customer. (0.5 mark)
o Quarantine Camp Database
1. Search patient information: Search results include the name, phone
number and information about his/her comorbidities. (0.5 mark)
2. Add information for a new patient. (0.5 mark)
3. List details of all testing which belong to a patient. (0.5 mark)
4. Make a report that provides full information about the patient
including demographic information, comorbidities, symptoms,
testing, and treatment. (0.5 mark)
PART 4: DATABASE MANAGEMENT (2 marks)
A- Proving one use-case of indexing efficiency in your scenarios (1 mark)
B- Solving one use-case of database security in your scenarios (1 mark)
---------------------------- HAPPY IMPLEMENTATION! ---------------------------------
</p>