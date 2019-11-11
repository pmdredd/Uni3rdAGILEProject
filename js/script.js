/*

    Team 4   
    GA30003: Assignment 1 (Student Records System)
    November 2019

    Page name:  script.js

*/

/*The following function validates new student registration details for sending on to server
This function applies to the page 'registerStudent.html' */

function registerStudent() {

    var student_id = document.getElementById("student_id").value;
    var name = document.getElementById("name").value;
  
    //Check for null entries
    if (student_id === "" || name === "") {
        alert("All details are required!");
        return;
        }
    
    //Check for min. and max length entries
    if (student_id.length < 1 || student_id.length > 15) {
        alert("Student ID must be minimum 1 character, maximum 15");
        return;
        }
    if (name.length < 2 || name.length > 50) {
        alert("Student Name must be minimum 2 characters, maximum 50");
        return;
        }

    //Jump to a bogus success page if data gathered = valid  *location will need changing*
    //window.location.assign("registeredSuccess.html")
    //return;
}