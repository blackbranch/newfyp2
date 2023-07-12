 $username = $_POST['username'];
   $password = $_POST['password'];
   $query = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";

2. Cross-Site Scripting (XSS):
   ```php
   $input = $_GET['input'];
   echo "Welcome, " . $input;
   ```

3. Cross-Site Request Forgery (CSRF):
   ```php
   $csrfToken = $_GET['csrfToken'];
   if ($csrfToken === $_SESSION['csrfToken']) {
     // Perform authorized action
   }
   ```

4. Command Injection:
   ```php
   $filename = $_GET['filename'];
   exec("ls " . $filename);
   ```

5. Insecure Direct Object References (IDOR):
   ```php
   $userId = $_GET['userId'];
   $query = "SELECT * FROM users WHERE id = {$userId}";
   ```

6. Security Misconfiguration:
   ```php
   // Leaving debug mode enabled
   ini_set('display_errors', 1);

   // Using weak encryption algorithm
   $hashedPassword = md5($password);
   ```

7. Unvalidated Redirects and Forwards:
   ```php
   $url = $_GET['url'];
   header("Location: " . $url);
   ```
