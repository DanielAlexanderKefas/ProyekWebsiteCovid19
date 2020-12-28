<div class="w3-top">
    <div class="w3-bar w3-white w3-padding w3-card">
        <a href="#home" class="w3-bar-item w3-button w3-hover-white"><img src="view/img/logo.png" class="logo"></a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="home" class="w3-bar-item w3-button w3-blue">HOME</a>
        </div>
    </div>
</div>

<div class="flex-container">
    <form class="login-form" method="post" action="verify-adm" style="width: 40%">
        <div style="display: flex; justify-content: center; width: 100%;">
            <h2 style="margin: 0px; font-weight: bold;">Admin Log In<h2>
        </div>
        <p></p>
        <div style="font-weight: bold;">Username</div>
        <input class="txtbox" type="text" placeholder="Type your username here" name="userAdmin" style="width: 100%; padding: 5px;">
        <p></p>
        <div style="font-weight: bold;">Password</div>
        <input class="txtbox" type="password" placeholder="Type your password here" name="passAdmin" style="width: 100%; padding: 5px;">
        <p></p>
        <div style="display: flex; justify-content: center; width: 100%; margin-top: 8%;">
            <button class="w3-button w3-blue custom-login-btn">Log In</button>
        </div>
    </form>
</div>