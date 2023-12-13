<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | Personal Portfolio</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @auth
        <link rel="stylesheet" href="{{ asset('css/auth-home.css') }}">
    @endauth
</head>
<body>
    @if (session('success'))
    <div class="success" id="successMessage">
        <p>{{session('success')}}</p>
    </div>
    @endif
    <nav>
        <div class="logo">
            <div class="circle">
                <img src="{{ asset('img/logo.png') }}">
            </div>
            <p>Franz Peter</p>
        </div>

        <div class="second-nav">
            <ul>
                <li onclick="window.location.href='#header'">home</li>
                <li onclick="window.location.href='#aboutMe'">About Me</li>
                <li onclick="window.location.href='#biography'">Biography</li>
                <li onclick="window.location.href='#education'">Education</li>
                <li onclick="window.location.href='#skills'">Skills</li>
                <li onclick="window.location.href='#contact'">Contact</li>
            </ul>
            <p style="margin-left: 20px">|</p>
            @auth
            <button onclick="window.location.href='{{ route('logout') }}'">Logout</button>
            @else
            <button onclick="window.location.href='{{ route('login') }}'">Login</button>
            @endauth
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
<header id="header">
    <figure>
        <img src="{{ $user->profile_picture }}" alt="">
        @auth
            <div class="edit-button">
                <button onclick="window.location.href='{{ route('portfolio.edit', ['portfolio' => 1]) }}'">Edit Image</button>
            </div>
        @endauth
    </figure>
    <div class="content-txt">
        <div class="inner">
            <span id="welcome">Welcome to my world</span>
            <p>Hi, I'm <span id="name">Franz Peter Diaz</span></p>
            <p>a <span id="typing-effect">Programmer.</span></p>
            <div class="d">
                <p id="description">
                    As a driven full-stack web developer, I blend creativity with technology to craft immersive digital experiences. 
                    My passion lies in innovating practical solutions, shaping code into seamless and user-centric journeys.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="socials">
                <p>Find me at</p>
                <div class="card-container">
                    <div class="card" onclick="window.open('https://www.facebook.com/FranzPeterDiaz012/', '_blank')">
                        <img id="facebook" src="{{ asset('img/facebook-logo.png') }}" >
                    </div>
                    <div class="card" onclick="window.open('https://www.instagram.com/onlyfranzeeeee/', '_blank')">
                        <img id="instagram" src="{{ asset('img/instagram-logo.png') }}" alt="">
                    </div>
                    <div class="card" onclick="window.open('https://www.linkedin.com/in/franz-peter-419108260/', '_blank')">
                        <img id="linkedin" src="{{ asset('img/linkedin-logo.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="best-skill">
                <p>Best skills</p>
                <div class="card-container">
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
    </div>
</header>
<section>
    <div class="aboutMe" id="aboutMe">
        <h1>About Me</h1>
        <div class="section-content">
            <figure>
                <img src="{{ $user->profile_picture }}" alt="">
            </figure>
            <div class="content-text">
                <p> {{ $intro->content }} </p>
                <div class="edit-button">
                    <button onclick="window.location.href='{{ route('intro', [$intro]) }}'">Edit Text</button>
                </div>
            </div>
        </div>
    </div>
    <div class="biography" id="biography">
        <h1>Biography</h1>
        <div class="biography-container">

            <h2>Personal Information</h2>

           <div class="content-container">
            <div class="edit-button">
                <button onclick="window.location.href='{{ route('personal_info') }}'">Edit Personal Info</button>
            </div>
            <div class="biography-content">
                <p>Complete Name: </p>
                <p>{{ $personalInfo['name'] }}</p>
            </div>
            <div class="biography-content">
                <p>Date and Place of Birth: </p>
                <p>{{ $personalInfo['date_and_place'] }}</p>
            </div>
            <div class="biography-content">
                <p>Gender: </p>
                <p>{{ $personalInfo['gender'] }}</p>
            </div>
            <div class="biography-content">
                <p>Nationality: </p>
                <p>{{ $personalInfo['nationality'] }}</p>
            </div>
            <div class="biography-content">
                <p>Ethnicity: </p>
                <p>{{ $personalInfo['ethnicity'] }}</p>
            </div>
            <div class="biography-content">
                <p>Marital Status: </p>
                <p>{{ $personalInfo['marital_status'] }}</p>
            </div>
           </div>
           <h2>Likes and Dislikes</h2>
           <div class="content-container">
                <div class="edit-button">
                    <button onclick="window.location.href='{{ route('likes-dislikes') }}'">Manage Likes and Dislikes</button>
                </div>
                <div class="biography-content likes-dislikes">
                    <p id="headText"><strong>Likes</strong></p>
                    <p id="headText"><strong>Dislikes</strong></p>
                </div>
                <div class="biography-content">
                    <p id="likes">{{ $likes->content }}</p>
                    <p>{{ $dislikes->content }}</p>
                </div>
           </div>
            <h2>Hobbies</h2>
                <div class="content-container">
                <ul class="hobbies-list">
                    <div class="edit-button">
                        <button onclick="window.location.href='{{ route('hobbies') }}'">Manage Hobbies</button>
                    </div>
                    @foreach ($hobbies as $hobby)
                        <li>{{ $hobby }}</li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
    <div class="education" id="education">
        <h1>Education</h1>
        <div class="education-container">
            @auth
            <div class="edit-button">
                <button onclick="window.location.href='{{ route('education') }}'">Manage Education Content</button>
            </div>
            @endauth
            <div class="education-card">
                <h3>{{$college->title}}</h3>
                <p id="date">{{$college->year}}</p>
                <h2>{{ $college->content }}</h2>
            </div>

            <div class="education-card">
                <h3>{{ $senior_high->title }}</h3>
                <p id="date">{{ $senior_high->year }}</p>
                <h2>{{ $senior_high->content }}</h2>
            </div>

            <div class="education-card">
                <h3>{{ $junior_high->title }}</h3>
                <p id="date">{{ $junior_high->year }}</p>
                <h2>{{ $junior_high->content }}</h2>
            </div>

            
            <div class="education-card">
                <h3>{{ $elementary->title }}</h3>
                <p id="date">{{ $elementary->year }}</p>
                <h2>{{ $elementary->content }}</h2>
            </div>

        </div>
    </div>
    <div class="aboutMe" id="skills">
        <h1>Skills</h1>
        <div class="skill-container">

           @foreach ($skills as $skill)
           <div class="skill-card">
                <img src="{{ $skill->image }}">
                <p>{{ $skill->skill }}</p>
                @auth
                <div class="remove-button" onclick="window.location.href='{{ route('skill.delete', ['id' => $skill->id]) }}'">
                <p class="close">+</p>
                <p>Delete</p>
            </div>
                @endauth
            </div>
           @endforeach
           @auth
                <div class="skill-card" onclick="window.location.href='{{ route('skill') }}'">
                    <button>+</button>
                </div>
            @endauth
           

        </div>
    </div>
    <div class="aboutMe" id="contact">
        <h1>Contact</h1>
        <div class="contact-container">
            <div class="socialLinks">
                    <p>Find me at</p>
                    <div class="card-container">
                        <div class="card" onclick="window.open('https://www.facebook.com/FranzPeterDiaz012/', '_blank')">
                            <img id="facebook" src="{{ asset('img/facebook-logo.png') }}" alt="">
                        </div>
                        <div class="card" onclick="window.open('https://www.instagram.com/onlyfranzeeeee/', '_blank')">
                            <img id="instagram" src="{{ asset('img/instagram-logo.png') }}" alt="">
                        </div>
                        <div class="card" onclick="window.open('https://www.linkedin.com/in/franz-peter-419108260/', '_blank')">
                            <img id="linkedin" src="{{ asset('img/linkedin-logo.png') }}" alt="">
                        </div>
                    </div>
                    <div class="contact">
                        <div class="content">
                            <img src="{{ asset('img/phone.png') }}" alt="">
                            <p>09154042215</p>
                        </div>
                    </div>
                    <div class="contact">
                        <div class="content">
                            <img src="{{ asset('img/icons8-mail-100.png') }}" alt="">
                            <p id="email">diazfranzpeter@gmail.com</p>
                        </div>
                    </div>
                    <div class="contact">
                        <div class="content">
                            <img src="{{ asset('img/location.png') }}" alt="">
                            <p>Brgy. Tibak, Sta.Fe, Leyte</p>
                        </div>
                    </div>
            </div>
            <div class="email">
                <form action="">
                    <legend>Send Feedback</legend>
                    <div class="group-control">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="ex. email@email.com" autocomplete="off" required>
                    </div>
                    <div class="group-control">
                        <label for="email">Content</label>
                        <textarea name="content" id="" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script defer src="{{ asset('js/home.js') }}"></script>
</body>
</html>