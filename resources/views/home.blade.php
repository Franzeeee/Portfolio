<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | Personal Portfolio</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <nav>
        <div class="logo">
            <div class="circle">
                <img src="{{ asset('img/profile-dummy.png') }}">
            </div>
            <p>Franz</p>
        </div>
        <div class="burger-menu">
            <div class="burger-line">

            </div>
        </div>
        <div class="side-nav close">
            <div class="sideNav-container close">
                <div class="nav-header">

                    <div class="profile-img">
                        <img src="{{ asset('img/profile-dummy.png') }}">
                    </div>

                    <div class="description">
                        <p>This is Franz Peter's Personal Portolio. You're welcome to view anytime.</p>
                    </div>

                    <div class="close">
                        <div class="line"></div>
                    </div>

                </div>

                <ul>
                    <li>home</li>
                    <li>About Me</li>
                    <li>Biography</li>
                    <li>Education</li>
                    <li>Skills</li>
                    <li>Works</li>
                    <li>Hobbies</li>
                    <li>Likes and Dislikes</li>
                    <li>Contact</li>
                </ul>

                <div class="socials">
                    <p>Find me at</p>
                    <div class="social-cards">
                        <div class="card facebook">
                            <img src="{{ asset('img/facebook-logo.png') }}">
                        </div>
                        <div class="card instagram">
                            <img src="{{ asset('img/instagram-logo.png') }}">
                        </div>
                        <div class="card linkedin">
                            <img src="{{ asset('img/linkedin-logo.png') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="close-outside close">
            </div>
        </div>
    </nav>
<header>
    <figure>
        <img src="{{ asset('img/profile-formal.png') }}" alt="">
    </figure>
    <div class="content-txt">
        <div class="inner">
            <span id="welcome">Welcome to my world</span>
            <p>Hi, I'm <span id="name">Franz Peter Diaz</span></p>
            <p>a <span id="typing-effect">Programmer.</span></p>
            <p id="description">
                As a driven full-stack web developer, I blend creativity with technology to craft immersive digital experiences. 
                My passion lies in innovating practical solutions, shaping code into seamless and user-centric journeys.
            </p>
        </div>
        <div class="row">
            <p>Find me at</p>
            <div class="socials">
                <div class="card">
                    <img id="facebook" src="{{ asset('img/facebook-logo.png') }}" alt="">
                </div>
                <div class="card">
                    <img id="instagram" src="{{ asset('img/instagram-logo.png') }}" alt="">
                </div>
                <div class="card">
                    <img id="linkedin" src="{{ asset('img/linkedin-logo.png') }}" alt="">
                </div>
            </div>
            <p>Best skills</p>
            <div class="best-skill">
                <div class="card">
                    <img id="php" src="{{ asset('img/php.png') }}" alt="">
                </div>
                <div class="card">
                    <img src="{{ asset('img/laravel.248x256.png') }}">
                </div>
                <div class="card">
                    <img src="{{ asset('img/java.png') }}">
                </div>
            </div>
        </div>
    </div>
</header>
    <script defer src="{{ asset('js/home.js') }}"></script>
</body>
</html>