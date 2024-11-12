
<nav>

    <div class="logo"></div>
    <ul class="nav-links" style='text-align:right;'>
        <li><a href="index.php">Home</a></li>
        <li><a href="login.html">Stationary</a></li>
        <li><a href="login3.html">Admin</a></li>
        <li><a href="about.html">About</a></li>

        <li><a href="login.html">Sign In</a></li>
        <li><a href="signup1.html">Sign Up</a></li>
    </ul>
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
</nav>
<style>
    nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 80px;
    background: #333;
    color: white;
    padding: 0 20px;
}
.logout-btn {
    background-color: #dc3545;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
    display: inline-block;
    margin-left: auto;
}

.logout-btn:hover {
    background-color: #c82333;
}

.logo {
    font-size: 24px;
    font-weight: bold;
}

.nav-links {
    list-style: none;
    display: flex;
}

.nav-links li {
    padding: 0 20px;
}

.nav-links a {
    color: white;
    text-decoration: none;
    font-size: 18px;
    transition: color 0.3s ease;
}

.nav-links a:hover {
    color: #ff6347;
}

.burger {
    display: none;
    cursor: pointer;
}

.burger div {
    width: 25px;
    height: 3px;
    background-color: white;
    margin: 5px;
    transition: all 0.3s ease;
}

@media screen and (max-width: 768px) {
    .nav-links {
        position: absolute;
        right: 0px;
        height: 100vh;
        top: 80px;
        background: #333;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 50%;
        transform: translateX(100%);
        transition: transform 0.5s ease-in;
    }

    .nav-links li {
        opacity: 0;
    }

    .burger {
        display: block;
    }
}

.nav-active {
    transform: translateX(0%);
}

@media screen and (max-width: 768px) {
    .nav-links li {
        opacity: 1;
        transition: opacity 0.5s ease-in-out;
    }
}

</style>