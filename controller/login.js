document.getElementById('loginForm').addEventListener('submit', function(event) {
  event.preventDefault();  // Prevent form submission

  // Get user input
  const username = document.getElementById('username').value;
  const password = document.getElementById('password').value;

  // Create the login model
  const loginModel = new LoginModel(username, password);

  // Check if user credentials are valid
  if (loginModel.validateUser()) {
    alert('Login Successful!');
    window.location.href = '../../exam1/'; // Optionally, redirect to another page or perform further actions
  } else {
    document.getElementById('errorMessage').textContent = 'Invalid username or password!';
  }
});
