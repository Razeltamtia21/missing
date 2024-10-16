<!-- reset_password.php -->

<style>

body {
    background: #f0f2f5;
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

form {
    background: #fff;
    width: 100%;
    max-width: 400px;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.input-box {
    margin-bottom: 20px;
    position: relative;
}

.input-box input {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    outline: none;
    transition: border-color 0.3s;
}

.input-box input:focus {
    border-color: #007bff;
}

.button input[type="submit"] {
    background: #007bff;
    color: #fff;
    border: none;
    padding: 12px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s;
    width: 100%;
}

.button input[type="submit"]:hover {
    background: #0056b3;
}

.button a {
    display: inline-block;
    margin-top: 15px;
    color: #007bff;
    text-decoration: none;
    font-size: 14px;
    transition: color 0.3s;
}

.button a:hover {
    color: #0056b3;
}

form .input-box:first-child {
    margin-top: 0;
}

.input-box input::placeholder {
    color: #888;
}

</style>

<form method="POST" action="reset_password.php">
    <div class="input-box">
        <input type="email" name="email" placeholder="Enter your email" required>
    </div>
    <div class="input-box">
        <input type="password" name="password" placeholder="Enter new password" required>
    </div>
    <div class="input-box">
        <input type="password" name="confirm_password" placeholder="Confirm new password" required>
    </div>
    <div class="button input-box">
        <input type="submit" value="Reset Password" name="submit-reset">
        <a href="http://localhost/code/index.html">Back</a>
    </div>
</form>
