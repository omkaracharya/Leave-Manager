# Leave Manager

## Introduction
This was a group project. A web application was built using `HTML5`, `CSS3`, `PHP`, and `MySQL` to automate the leave management system used by my undergraduate institute. Target user group for this project would be the faculty members from all the departments in the institution. 

## Idea
An individual profile is created for each user. There are two types of users: `Faculty` and `Head of the Department (HOD)`. Faculty can create a leave request from his/her account. Before sending the request to the HOD, the faculty has to take care of his/her lectures/labs during the leave period. There's a facility where he/she can ask other faculty members to take over the corresponding lectures/labs. If all those members are ready to be his/her replacement, then the request is sent to the corresponding HOD for the approval. HOD can then log in to his/her account for all the pending requests. As soon as the request is approved/rejected, then the corresponding faculty member will receive the notification about that.
  
This project consists of two modules:  
* Front-end (done using `HTML5` and `CSS3`)
* Back-end (done using `PHP` and `MySQL`)

## Overview
#### Front-end
Username and Password will authenticate the user to access the profile. Based on the user type, he/she will be redirected to the corresponding profile page. There's a form for the leave application. Next section is to adjust all the lectures/lab missing in that period.

![Home page](/HomePage.png)

#### Back-end
MySQL tables are created for `User`, `Leave` and `HOD`. `phpMyAdmin` is used to handle all the `PHP` and `MySQL` interfacing and for the creation of `MySQL` schema.  
The database looks like:  
![Database](/schema/db1.png)

## Team Members
  
* [Omkar Acharya](https://omkaracharya.github.io/)
* [Parag Ahivale](https://www.linkedin.com/in/parag-ahivale-901b7b91)
* [Nehal Belgamwar](https://www.linkedin.com/in/nehal-belgamwar-a8a61692)
* [Anmol Agarwal](https://www.linkedin.com/in/anmol-agarwal-2614bb87)
