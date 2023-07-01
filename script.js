// Add event listener to the form submission
document.getElementById("myForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission
  
    // Get form values
    var name = document.getElementById("name").value;
    var age = document.getElementById("age").value;
    var weight = document.getElementById("weight").value;
    var email = document.getElementById("email").value;
    var healthReport = document.getElementById("health-report").value;
  
    // Display form data
    console.log("Name:", name);
    console.log("Age:", age);
    console.log("Weight:", weight);
    console.log("Email ID:", email);
    console.log("Health Report:", healthReport);
  
    // Manually submit the form
    document.getElementById("myForm").__proto__.submit.call(document.getElementById("myForm"));
  });
  