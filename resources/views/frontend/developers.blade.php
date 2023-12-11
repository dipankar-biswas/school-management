<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Developers | Enrich IT Solutions</title>
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.css')}}"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/developers.css') }}">
</head>
<body>
    <div id="apps">
        <div class="developers">
            @php
            $ran = array("half-round","round", "look");
            $rand_design = $ran[array_rand($ran, 1)];
            @endphp
            <div class="items {{ $rand_design }}">
                <div class="item">
                    @php
                        $color_code = substr(rand(1000000000,900000000), 1, 6);
                    @endphp
                    <style>
                        .developers .items.round .item:nth-child(1)::before {
                            background-color: #{{ $color_code }};
                        }
                        .developers .items.look .item:nth-child(1)::before {
                            background-color: #{{ $color_code }};
                        }
                    </style>
                    <div class="bgc" style="background: linear-gradient(106.32deg, #{{ $color_code }} 14.23%, rgba(255, 25, 25, 0) 139.97%)"></div>
                    <div class="content">
                        <div class="image">
                            <img src="{{ asset('frontend/images/developers/ziaur.jpg') }}" alt="Developer">
                        </div>
                        <div class="info">
                            <h1 class="name">Shak Ziaur <span>Rahman</span> Tito</h1>
                            <h5 class="designation">Senior PHP Programmer</h5>
                            <div class="step">
                                <p>Enrich IT</p>
                                <p>Head of IT Department</p>
                                <p>sobkisubazar.com</p>
                                <p>BSC in CSE southeast University</p>
                            </div>
                            <a class="phone" href="tel:+8801798659666"><i class="fa fa-phone" aria-hidden="true"></i> +8801798659666</a>
                            <a class="mail" href="mailto:shakziaurrahmantito@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> shakziaurrahmantito@gmail.com</a>
                            <p class="address"><i class="fa fa-map-marker" aria-hidden="true"></i> 107 Bir Uttam C R Dutta Road, 4th Floor, F Haque Tower, Dhaka-1205</p>
                        </div>
                        <div class="socials">
                            <ul class="lists">
                                <li class="list">
                                    <a href="https://www.facebook.com/shakziaurrahmantito.info/" class="link facebook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li class="list">
                                    <a href="https://twitter.com/shakziaurrahman" class="link twitter" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                                <li class="list">
                                    <a href="https://www.linkedin.com/in/ziaur-rahman-132863145/" class="link linkedin" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </li>
                                <li class="list">
                                    <a href="https://github.com/shakziaurrahmantito" class="link github" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>
                                </li>
                                <li class="list">
                                    <a href="https://www.youtube.com/@rubel721" class="link youtube" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                </li>
                                <li class="list">
                                    <a href="https://join.skype.com/invite/vXMh28ehpuMe" class="link skype" target="_blank"><i class="fa fa-skype" aria-hidden="true"></i></a>
                                </li>
                                <li class="list">
                                    <a href="https://shakziaurrahmantito.com" class="link website" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="actions">
                            <a href="https://shakziaurrahmantito.com" class="btn action" target="_blank" style="background: #{{ $color_code }};">About Me</a>
                            <a href="#" class="btn action" style="background: #{{ $color_code }};">Hire Me</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    @php
                        $color_code = substr(rand(1100000000,990000000), 1, 6);
                    @endphp
                    <style>
                        .developers .items.round .item:nth-child(2)::before {
                            background-color: #{{ $color_code }};
                        }
                        .developers .items.look .item:nth-child(2)::before {
                            background-color: #{{ $color_code }};
                        }
                    </style>
                    <div class="bgc" style="background: linear-gradient(106.32deg, #{{ $color_code }} 14.23%, rgba(255, 25, 25, 0) 139.97%)"></div>
                    <div class="content">
                        <div class="image">
                            <img src="{{ asset('frontend/images/developers/dipankar.jpeg') }}" alt="Developer">
                        </div>
                        <div class="info">
                            <h1 class="name">Dipankar <span>Biswas</span></h1>
                            <h5 class="designation">Sr. Developer</h5>
                            <div class="step">
                                <p>Enrich IT</p>
                                <p>IT Department</p>
                                <p>sobkisubazar.com</p>
                                <p>BSC in CSE Green University</p>
                            </div>
                            <a class="phone" href="tel:+8801741571104"><i class="fa fa-phone" aria-hidden="true"></i> +8801741571104</a>
                            <a class="mail" href="mailto:dipankarbiswas.officials@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> dipankarbiswas.officials@gmail.com</a>
                            <p class="address"><i class="fa fa-map-marker" aria-hidden="true"></i> 271-Outer Circler road moghbazar, Dhaka-1217, BD</p>
                        </div>
                        <div class="socials">
                            <ul class="lists">
                                <li class="list">
                                    <a href="https://www.facebook.com/dip.an.kar.bis.was.0174" class="link facebook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li class="list">
                                    <a href="#" class="link twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                                <li class="list">
                                    <a href="https://www.linkedin.com/in/dipankar-chandra-biswas-790715134/" class="link linkedin" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </li>
                                <li class="list">
                                    <a href="https://github.com/dipankar-biswas" class="link github" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>
                                </li>
                                <li class="list">
                                    <a href="https://www.youtube.com/@dipankarbiswas729" class="link youtube" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                </li>
                                <li class="list">
                                    <a href="https://join.skype.com/invite/ue7H4TfJuIgK" class="link skype" target="_blank"><i class="fa fa-skype" aria-hidden="true"></i></a>
                                </li>
                                <li class="list">
                                    <a href="http://dipankarbiswas.infinityfreeapp.com/" class="link website" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="actions">
                            <a href="http://dipankarbiswas.infinityfreeapp.com/" class="btn action" target="_blank" style="background: #{{ $color_code }};">About Me</a>
                            <a href="#" class="btn action" style="background: #{{ $color_code }};">Hire Me</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    @php
                        $color_code = substr(rand(1110000000,999000000), 1, 6);
                    @endphp
                    <style>
                        .developers .items.round .item:nth-child(3)::before {
                            background-color: #{{ $color_code }};
                        }
                        .developers .items.look .item:nth-child(3)::before {
                            background-color: #{{ $color_code }};
                        }
                    </style>
                    <div class="bgc" style="background: linear-gradient(106.32deg, #{{ $color_code }} 14.23%, rgba(255, 25, 25, 0) 139.97%)"></div>
                    <div class="content">
                        <div class="image">
                            <img src="{{ asset('frontend/images/developers/sourave.jpeg') }}" alt="Developer">
                        </div>
                        <div class="info">
                            <h1 class="name">Sourave</h1>
                            <h5 class="designation">UX Designer</h5>
                            <div class="step">
                                <p>Enrich IT</p>
                                <p>IT Department</p>
                                <p>sobkisubazar.com</p>
                            </div>
                            <a class="phone" href="tel:+8801939398830"><i class="fa fa-phone" aria-hidden="true"></i> +8801939398830</a>
                            <a class="mail" href="mailto:souraveshahriar@yahoo.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> souraveshahriar@yahoo.com</a>
                            <p class="address"><i class="fa fa-map-marker" aria-hidden="true"></i> Narayanganj, Dhaka, Bangladesh</p>
                        </div>
                        <div class="socials">
                            <ul class="lists">
                                <li class="list">
                                    <a href="https://www.facebook.com/md.lisebo" class="link facebook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li class="list">
                                    <a href="#" class="link twitter" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                                <li class="list">
                                    <a href="https://www.linkedin.com/in/md-shahriar-jahan-sourave-22977710b/" class="link linkedin" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </li>
                                <li class="list">
                                    <a href="#" class="link github" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>
                                </li>
                                <li class="list">
                                    <a href="#" class="link youtube" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                </li>
                                <li class="list">
                                    <a href="#" class="link skype" target="_blank"><i class="fa fa-skype" aria-hidden="true"></i></a>
                                </li>
                                <li class="list">
                                    <a href="#" class="link website" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="actions">
                            <a href="https://www.facebook.com/md.lisebo" class="btn action" target="_blank" style="background: #{{ $color_code }};">About Me</a>
                            <a href="#" class="btn action" style="background: #{{ $color_code }};">Hire Me</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>