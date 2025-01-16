<!DOCTYPE html>
<head>
 
  <style>
body {
  margin: 0;
  padding: 0;
}

header {
  position: relative;
  display: flex;
  padding: 0;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  z-index: 9999; 
}

.left-section {
  margin-left: 10px;
  display: flex;
  align-items: center;
}

.right-section {
  margin-right: 10px;
  display: flex;
  align-items: center;
  gap: 15px;
}

button {
  height: 40px;
  width: 100px;
}

.postad-button {
  background-color: rgb(163, 67, 67);
  border: none;
  border-radius: 5px;
  cursor: pointer;
  color: white;
}

.alladd-button {
  background-color: rgb(42, 165, 79);
  border: none;
  border-radius: 5px;
  cursor: pointer;
  color: white;
}

.account-menu-container {
  position: relative;
  display: inline-block;
}

.account-menu-checkbox {
  display: none;
}

.account-icon {
  cursor: pointer;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}

.dropdown-menu {
    position: fixed; 
    top: 90px;
    right: 10px;
    background-color: white;
    border: 1px solid #ccc;
    border-radius: 5px;
    display: none;
    flex-direction: column;
    width: 150px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 2; 
 
}

.dropdown-menu a {
  padding: 10px;
  text-decoration: none;
  color: black;
  display: block;
 
}

.dropdown-menu a:hover {
  background-color: #f0f0f0;
}

.account-menu-checkbox:checked + label + .dropdown-menu {
  display: flex; 

  </style>
</head>
<body>
<header>
  <div class="left-section">
    <a href="index.php" target="_top">
      <img src="recources/logo.png" alt="logo" height="130px">
    </a>
    <h1>RENTITALL<h1 style="color:red;">.whf.bz</h1></h1>
  </div>

  <div class="right-section">
    <a href="browse.php" target="_top">
      <button class="alladd-button">All ads</button>
    </a>
    <a href="postad.php" target="_top">
      <button class="postad-button" type="button">Post your ad</button>
    </a>
    <div class="account-menu-container">
      <input type="checkbox" id="account-menu-checkbox" class="account-menu-checkbox">
      <label for="account-menu-checkbox">
        <img src="recources/account.png" alt="account" class="account-icon">
      </label>
      <div class="dropdown-menu">
        <a href="myitems.php" target="_top">My Items</a>
        <a href="SignUp.php" target="_top">Sign Up</a>
        <a href="SignIn.php" target="_top">Sign In</a>
        <a href="logout.php"target="_top">Log out</a>
        
      </div>
    </div>
  </div>
</header>
</body>
</html>
