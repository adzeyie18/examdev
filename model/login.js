// This is a placeholder for the login model, which can later be expanded
class LoginModel {
  constructor(username, password) {
    this.username = username;
    this.password = password;
  }

  // Placeholder method for validating user
  validateUser() {
    // Hardcoded credentials for demonstration
    return this.username === "admin" && this.password === "123";
  }
}
