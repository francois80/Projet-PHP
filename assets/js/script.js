// 1. Create button
var button = document.createElement('button');
button.innerHTML = 'Envoi';

// 2. Include it in the document
var body = document.getElementsByTagName('form')[0];
body.appendChild(button);
// Add Bootstrap class to it
$('button').addClass('btn btn-dark mt-2 col-12');
$('button').attr('type', 'submit');
// Remove the default action attribute from the form and replace it with a custom one redirecting to the same page
$('form').removeAttr('action');
$('form').attr('action', '#');
// 3. Display an alert when the button is pressed
button.addEventListener ('click', function() {
  alert('Merci de votre intérêt, nous mettons tout en oeuvre pour vous recontacter au plus vite.');
});
