<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Tutorial website</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <link rel="preconnect" href="https://font.googleapis.com">
    <link rel="preconnect" href="https://font.gstatic.com" crossorigin>
    <link href="https://font.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-------Swiperjs.com-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
     <style>
        *{
    margin: 0;
    padding: 0;
    border: 0;
    outline: 0;
    text-decoration: none;
    list-style: none;
    box-sizing: border-box;
}

:root{
    --color-primary: #6c63ff;
    --color-success: #00bf8e;
    --color-warning: #f7c94b;
    --color-danger: #f75842;
    --color-danger-variant: rgba(247, 88, 66, 0.4);
    --color-white: #fff;
    --color-light: rgba(255, 255, 255, 0.7);
    --color-black: #000;
    --color-bg: #1f2641;
    --color-bg1: #2e3267;
    --color-bg2: #424890;

    --container-width-lg: 76%;
    --container-width-md: 90%;
    --container-width-sm: 94%;

    --transition: all 400ms ease;
}

body {
    font-family: "Montserrat", sans-serif;
    line-height: 1.7;
    color: var(--color-white);
    background: linear-gradient(135deg, #ffafbd, #ffc3a0);
}

.container{
    width: var(--container-width-lg);
    margin: 0 auto;
}

section{
    padding: 6rem 0;
}

section h2{
    text-align: center;
    margin-bottom: 4rem;
}

h1, h2, h3, h4, h5{
    line-height: 1.2;
}

h1{
    font-size: 2.4rem;
}

h2{
    font-size: 2rem;
}

h3{
    font-size: 1.6rem;
}

h4{
    font-size: 1.3rem;
}

a{
    color: var(--color-white);
}

img{
    width: 100%;
    display: block;
    object-fit: cover;
   
}

.btn{
    display: inline-block;
    background: var(--color-black);
    color: var(--color-white);
    padding: 1rem 2rem;
    font-weight: 500;
    transition: var(--color-white);
    border: none;
    border-radius: 5px;
}
.btn-primary{
    background: black;
    color: var(--color-white);
    border: none;
    border-radius: 5px;
}
.btn-primay{
    background: white;
    color: black;
    border: none;
    border-radius: 5px;
}

nav{
    width: 100vw;
    height: 6rem;
    position: fixed;
    top: 0;
    z-index: 11;
    background: #000;
    box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.2);
   
}

.nav__container{
    height: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-right:50px;
}

nav button{
    display: none;
}

.nav__menu{
    display: flex;
    align-items: center;
    gap: 3rem;
}

.nav__menu a{
    font-size: 0.9rem;
    transition: var(--transition);
}

.nav__menu a:hover{
    color: white;
}

header{
    position: relative;
    top: 5rem;
    overflow: hidden;
    height: 70vh;
    margin-bottom: 5rem;
}

.header__container{
    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: center;
    gap: 5rem;
    height: 100%;
    margin: 180px;
}

.header__left p{
    margin: 1rem 0 2.4rem;
}

.categories{
    background: linear-gradient(135deg, #ffafbd, #ffc3a0);
    height: 32rem;
}

.categories h1{
    line-height: 1;
    margin-bottom: 3rem;
}

.categories__container{
    display: grid;
    grid-template-columns: 40% 60%;
    gap: 4rem;
}

.categories__left p{
    margin: 1rem 0 3rem;
}

.categories__right{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.2rem;
}

.category{
    background: #000;
    padding: 2rem;
    border-radius: 2rem;
    transition: var(--transition);
}


.category:nth-child(2) .category__icon{
    background: linear-gradient(135deg, #ffafbd, #ffc3a0);
}

.category:nth-child(3) .category__icon{
    background: var(--color-success);
}

.category:nth-child(1) .category__icon{
    background: var(--color-warning);
}

.category__icon{
    background: var(--color-primary);
    padding: 0.7rem;
    border-radius: 0.9rem;
}

.category h5{
    margin: 2rem 0 1rem;
}

.category p{
    font-size: 0.85rem;
}

/*-------------Popular Corses----------*/

.courses__container{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
}

.course{
    background: black;
    text-align: center;
    border: 1px solid transparent;
    transition: var(--transition);
}

.course:hover{
    border-color: black;
}

.course__info{
    padding: 1rem; 
}

.course__info p{
    margin: 1.2rem 0 2rem;
    font-size: 0.9rem;
}


.faqs{
    background: linear-gradient(135deg, #ffafbd, #ffc3a0)
    box-shadow: inset 0 0 3rem rgba(0, 0, 0, 0.5);
}

.faqs__container{
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}

.faq{
    padding: 2rem;
    display: flex;
    align-items: center;
    gap: 1.4rem;
    height: fit-content;
    background: black;
    cursor: pointer;
}

.faq h4{
    font-size: 1rem;
    line-height: 2.2;
}

.faq__icon{
    align-self: flex-start;
    font-size: 1.2rem;
}

.faq p{
    margin-top: 0.8rem;
    display: none;
}

.faq.open p{
    display: block;
}

/*---------------Members-----------*/

.testimonials__container{
    overflow: hidden;
    position: relative;
    margin-bottom: 5rem;
}

.testimonial{
    padding: 5rem;
}

.avatar{
    width: 8rem;
    height: 8rem;
    border-radius: 50%;
    overflow: hidden;
    margin: 0 auto 1rem;
    border: 1rem solid var(--color-black);
}

.testimonial__info{
    text-align: center;
}

.testimonial__body{
    background: black;
    padding: 2rem;
    margin-top: 3rem;
    position: relative;
}

.testimonial__body::before{
    content: "";
    display: block;
    background: linear-gradient(135deg, #ffafbd, #ffc3a0);
    width: 3rem;
    height: 3rem;
    position: absolute;
    left: 42%;
    top: -1.5rem;
    transform: rotate(45deg);
}

footer{
    background: black;
    padding-top: 5rem;
    font-size: 0.9rem;
}

.footer__container{
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 5rem;
}

.footer__container > div h4{
    margin-bottom: 1.2rem;
}

.footer__1 p{
    margin: 0 0 2rem;
}

footer ul li{
    margin-bottom: 0.7rem;
}

footer ul li a:hover{
    text-decoration: underline;
}

.footer__socials{
    display: flex;
    gap: 1rem;
    font-size: 1.2rem;
    margin-top: 2rem;
}

.footer__copyright{
    text-align: center;
    margin-top: 4rem;
    padding: 1.2rem 0;
    border-top: 1px solid var(--color-bg2);
}

@media screen and (max-width: 1024px) {
    .container{
        width: var(--container-width-md);
    }

    h1{
        font-size: 2.2rem;
    }
    
    h2{
        font-size: 1.7rem;
    }

    h3{
        font: 1.4rem;
    }

    h4{
        font-size: 1.2rem;
    }

    nav button{
        display: inline-block;
        background: transparent;
        font-size: 1.8rem;
        color: var(--color-white);
        cursor: pointer;
    }

    .nav__menu{
        position: fixed;
        top: 5rem;
        right: 5%;
        height: fit-content;
        width: 18rem;
        flex-direction: column;
        gap: 0;
        display: none;
    }

    .nav__menu li{
        width: 100%;
        height: 5.8rem;
    }

    .nav__menu li a{
        background: var(--color-primary);
        box-shadow: -4rem 6rem 10rem rgba(0, 0, 0, 0.6);
        width: 100%;
        height: 100%;
        display: grid;
        place-items: center;
    }

    .nav__menu li a:hover{
        background: var(--color-bg2);
        color: var(--color-white);
    }

    header{
        height: 52vh;
        margin: 4rem;
    }

    .header__container{
        gap: 0;
        padding-bottom: 3rem;
    }

    .categories{
        height: auto;
    }

    .categories__container{
        grid-template-columns: 1fr;
        gap: 3rem;
    }

    .categories__left{
        margin-right: 0;
    }
    
}
.imag{
    width: 240px;
    height:220px;
    margin-left:-290px;
}
     </style>
</head>
<body>
<nav>
        <div class="container nav__container">
            <img src="logo/logo2.png" alt="logo" class="imag">
            <ul class="nav__menu">
                <li><a href="home.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="about.html"><i class="fas fa-info-circle"></i> About</a></li>
                <li><a href="Course.php"><i class="fas fa-book"></i> Courses</a></li>
                <li><a href="contact.html"><i class="fas fa-envelope"></i> Contact</a></li>
                <li><a href="Account.php"><i class="fas fa-user"></i> Account</a></li>
            </ul>
            <button id="open-menu-btn"><i class="fas fa-bars"></i></button>
            <button id="close-menu-btn"><i class="fas fa-times"></i></button>
        </div>
    </nav>
    <div class="container header__container">
        <div class="header__left">
            <h1>Grow your skill to andvance your career path</h1>
            <p>On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks.</p>
            <a href="Course.php" class="btn btn-primary">Get Started</a>
        </div>
        <div class="header__right">
            <div class="header__right-image">
                <img src="./images/header.png">
            </div>
        </div>
    </div>
</header>
<section class="categories">
    <div class="container categories__container">
        <div class="categories__left">
            <h1>Tutorial Wale</h1>
            <p>Most Interesting Online Learning Research Titles.<br>Continuing Education and Online Learning Effectiveness.<br>Difference Between Classroom.</p>
            <a href="#" class="btn">Learn More</a>
        </div>
        <div class="categories__right">
            <article class="category">
                <span class="category__icon"><i class="uil uil-bitcoin-circle"></i></span>
                <h5>HTML</h5>
                <p>HTML is the standard markup language for creating web pages. It's the basic building block of the web, defining the structure and meaning of web content.</p>
            </article>

            <article class="category">
                <span class="category__icon"><i class="uil uil-palette"></i></span>
                <h5>CSS</h5>
                <p>Cascading Style Sheets, and it's a computer language used to style and structure web pages written in HTML or XML.</p>
            </article>

            <article class="category">
                <span class="category__icon"><i class="uil uil-usd-circle"></i></span>
                <h5>JavaScript</h5>
                <p>a programming language that developers use to make websites and applications interactive.</p>
            </article>

        </div>
    </div>
</section>

<section class="courses">
    <h2>Our Popular Courses</h2>
    <div class="container courses__container">
        <artical class="course">
            <div class="course__image">
                <img src="./images/pic 1.jpg" width="200" height="200">
            </div>
            <div class="course__info">
                <h4>Front-end & Back-end</h4>
            <p>Helping people and children learn in ways that are easier, faster, more accurate, or less expensive can be traced back to the emergence of very early tools, such as paintings on cave walls.</p>
            <a href="course.php" class="btn btn-primay">Learn More</a>
            </div>
        </artical>

        <artical class="course">
            <div class="course__image">
                <img src="./images/pic 2.jpg" width="200" height="200">
            </div>
            <div class="course__info">
                <h4>Web Designing</h4>
            <p>Helping people and children learn in ways that are easier, faster, more accurate, or less expensive can be traced back to the emergence of very early tools, such as paintings on cave walls.</p>
            <a href="course.php" class="btn btn-primay">Learn More</a>
            </div>
        </artical>

        <artical class="course">
            <div class="course__image">
                <img src="./images/pic 3.jpg" width="200" height="200">
            </div>
            <div class="course__info">
                <h4>Web development</h4>
            <p>Helping people and children learn in ways that are easier, faster, more accurate, or less expensive can be traced back to the emergence of very early tools, such as paintings on cave walls.</p>
            <a href="course.php" class="btn btn-primay">Learn More</a>
            </div>
        </artical>

    </div>
</section>


    <section class="faqs">
        <h2>Frequently Asked Questions</h2>
        <div class="container faqs__container">
            <article class="faq">
                <div class="faq__icon"><i class="uil uil-plus"></i></div>
                <div class="qutions__answer">
                    <h4>How do i khow the right courses for me?</h4>
                    <p>Dice Academy offers you an industry-ready web designing course in Delhi. It has been designed to equip you with the right knowledge and skills to make web designing your playground.</p>
                </div>
            </article>

            <article class="faq">
                <div class="faq__icon"><i class="uil uil-plus"></i></div>
                <div class="qutions__answer">
                    <h4>How do i khow the right courses for me?</h4>
                    <p>Dice Academy offers you an industry-ready web designing course in Delhi. It has been designed to equip you with the right knowledge and skills to make web designing your playground.</p>
                </div>
            </article>

            <article class="faq">
                <div class="faq__icon"><i class="uil uil-plus"></i></div>
                <div class="qutions__answer">
                    <h4>How do i khow the right courses for me?</h4>
                    <p>Dice Academy offers you an industry-ready web designing course in Delhi. It has been designed to equip you with the right knowledge and skills to make web designing your playground.</p>
                </div>
            </article>

            <article class="faq">
                <div class="faq__icon"><i class="uil uil-plus"></i></div>
                <div class="qutions__answer">
                    <h4>How do i khow the right courses for me?</h4>
                    <p>Dice Academy offers you an industry-ready web designing course in Delhi. It has been designed to equip you with the right knowledge and skills to make web designing your playground.</p>
                </div>
            </article>
            
            <article class="faq">
                <div class="faq__icon"><i class="uil uil-plus"></i></div>
                <div class="qutions__answer">
                    <h4>How do i khow the right courses for me?</h4>
                    <p>Dice Academy offers you an industry-ready web designing course in Delhi. It has been designed to equip you with the right knowledge and skills to make web designing your playground.</p>
                </div>
            </article>
            
            <article class="faq">
                <div class="faq__icon"><i class="uil uil-plus"></i></div>
                <div class="qutions__answer">
                    <h4>How do i khow the right courses for me?</h4>
                    <p>Dice Academy offers you an industry-ready web designing course in Delhi. It has been designed to equip you with the right knowledge and skills to make web designing your playground.</p>
                </div>
            </article>
        </div>
    </section>


    <section class="container testionials__container mySwiper">
        <h2>Crew Members</h2>
        <div class="swiper-wrapper">
            <artical class="testimonial swiper-slide">
                <div class="avatar">
                    <img src="images/shashank.jpeg">
                </div>
                <div class="testimonial__info">
                    <h5>Shashank</h5>
                    <small>Head member</small>
                </div>
                <div class="testimonial__body">
                    <p>Dice Academy offers you an industry-ready web designing course in Delhi. It has been designed to equip you with the right knowledge and skills to make web designing your playground.</p>
                </div>
            </artical>

            <artical class="testimonial swiper-slide">
                <div class="avatar">
                    <img src="images/shashank.jpeg">
                </div>
                <div class="testimonial__info">
                    <h5>Timothy</h5>
                    <small>Head member</small>
                </div>
                <div class="testimonial__body">
                    <p>Dice Academy offers you an industry-ready web designing course in Delhi. It has been designed to equip you with the right knowledge and skills to make web designing your playground.</p>
                </div>
            </artical>

        
    </section>


    <footer class="footer">
        <div class="container footer__container">
            <div class="footer__1">
                <a href="index.html" class="footer__logo">
                    <h4>ClassPro</h4>
                </a>
                <p>Dice Academy offers you an industry-ready web designing course in Delhi. It has been designed to equip you with the right knowledge and skills to make web designing your playground.</p>
            </div>

            <div class="footer__2">
                <h4>Permalinks</h4>
                <ul class="permalinks">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="course.php">Courses</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>

            <div class="footer__3">
                <h4>Privacy</h4>
                <ul class="privacy">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Tearms and Conditions</a></li>
                    <li><a href="#">Refund Policy</a></li>
                </ul>
            </div>

            <div class="footer__4">
                <h4>Contact Us</h4>
                <div>
                    <p>+91 123 456 7890</p>
                    <p>timothymasih@gmail.com</p>
            </div>

            <ul class="footer__socials">
                <li><a href="https://www.facebook.com/yourpage" target="_blank"><i class="uil uil-facebook-f"></i></a></li>
                <li><a href="https://www.instagram.com" target="_blank"><i class="uil uil-instagram-alt"></i></a></li>
                <li><a href="https://x.com/" target="_blank"><i class="uil uil-twitter"></i></a></li>
                <li><a href="https://www.linkedin.com/" target="_blank"><i class="uil uil-linkedin"></i></a></li>
            </ul>
            </div>
            
            </div>
            <div class="footer__copyright">
                <small>Copyright &copy; All right reserved</small>
            </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // change navbar style on scroll

window.addEventListener('scroll', () => {
    document.querySelector('nav').classList.toggle
    ('window-scroll', window.scrollY > 0)
})

const faqs = document.querySelectorAll('.faq');

faqs.forEach(faq => {
    faq.addEventListener('click', () => {
        faq.classList.toggle('open');

        //change icon
        const icon = faq.querySelector('.faq__icon i');
        if (icon.className === 'uil uil-plus') {
            icon.className = 'uil uil-minus';
        } else {
            icon.className = 'uil uil-plus';
        }
    })
})

//nav menu
const menu = document.querySelector(".nav__menu");
const menuBtn = document.querySelector("#open-menu-btn");
const closeBtn = document.querySelector("#close-menu-btn");


menuBtn.addEventListener('click', () => {
    menu.style.display = "flex";
    closeBtn.style.display = "inline-block";
    menuBtn.style.display = "none";
})

//close
const closeNav = () => {
    menu.style.display = "none";
    closeBtn.style.display = "none";
    menuBtn.style.display = "inline-block"
}

closeBtn.addEventListener('click', closeNav)
    </script>
    
    <script>
        var swiper = new Swiper(".mySwiper", {
          slidesPerView: 1,
          spaceBetween: 30,
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
          breakpoints: {
            600:{
                slidesPerView: 2
            }
          }
        });
      </script>
</body>
</html>
