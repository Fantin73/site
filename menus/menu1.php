<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu1.css">
    <title>Home T1</title>
</head>
<body>
<!-- Start Nav Section -->
<nav id="navbar" class="navbar">
  <ul class="nav-menu">
    <li>
      <a data-scroll="home" href="index.php" class="dot active">
        <span>Home</span>
      </a>
    </li>
    <li>
      <a data-scroll="about" href="#about" class="dot">
        <span>Sobre nós</span>
      </a>
    </li>
    <li>
      <a data-scroll="services" href="https://instagram.com/senac_emed.t1?igshid=MzMyNGUyNmU2YQ==" class="dot">
        <span>Instagram</span>
      </a>
    </li>
    <li>
      <a data-scroll="test" href="#test" class="dot">
        <span>Login</span>
      </a>
    </li>
 
  </ul>
</nav>
   
<div class="tt1">
    <h1 class="tt10">Terceirão<br>Turma 1</h1>
</div>
    <main>
                    <div id="carousel">
                        <div class="slideImg hideLeft">
                            <img src="imagens\t101.jpg">
                        </div>
                        <div class="slideImg prevLeftSecond">
                            <img src="imagens\t104.jpg">
                        </div>
                        <div class="slideImg prev">
                            <img src="imagens\t102.jpg">
                        </div>
                        <div class="slideImg selected">
                            <img src="imagens\t103.jpg">
                        </div>
                        <div class="slideImg next">
                            <img src="imagens\t105.jpg">
                        </div>
                        <div class="slideImg nextRightSecond">
                            <img src="imagens\t106.jpg">
                        </div>
                        <div class="slideImg hideRight">
                            <img src="imagens\t107.jpg">
                        </div>
                    </div>
                    <div class="positionBtn">
                        <button id="prev"><span>PREV</span></button>
                        <button id="next"><span>NEXT</span></button>
                    </div>
                </main>
                <script>const slide = {
                    main : null,
                    elementImg : null,
                    imgSelected : 0,
                    nextSlide: function (){
                        if (this.imgSelected != null)
                        {
                            if (this.imgSelected < (this.elementImg.length - 1))
                            {
                                this.imgSelected++;
                                this.normalizeSlide();
                            }
                        }
                    },
                    prevSlide: function (){
                        if (this.imgSelected != null)
                        {
                            if (this.imgSelected > 0)
                            {
                                this.imgSelected--;
                                this.normalizeSlide();
                            }
                        }
                    },
                    normalizeSlide: function (){

                        for (num = 0; num < this.elementImg.length; num++)
                        {
                            this.elementImg[num].classList.remove("hideLeft","prevLeftSecond","prev","selected","next","nextRightSecond","hideRight");
                        }

                        this.elementImg[this.imgSelected].classList.add("selected");

                        if (this.imgSelected > 2)
                        {
                            this.elementImg[this.imgSelected-2].classList.add("hideLeft");
                            this.elementImg[this.imgSelected-2].classList.add("prevLeftSecond");
                            this.elementImg[this.imgSelected-1].classList.add("prev");
                        }
                        else if (this.imgSelected > 1)
                        {
                            this.elementImg[this.imgSelected-2].classList.add("prevLeftSecond");
                            this.elementImg[this.imgSelected-1].classList.add("prev");
                        }
                        else if (this.imgSelected > 0)
                        {
                            this.elementImg[this.imgSelected-1].classList.add("prev");
                        }

                        if ((this.imgSelected + 3) < this.elementImg.length)
                        {
                            this.elementImg[this.imgSelected+3].classList.add("hideRight");
                            this.elementImg[this.imgSelected+2].classList.add("nextRightSecond");
                            this.elementImg[this.imgSelected+1].classList.add("next");
                        }
                        else if ((this.imgSelected + 2) < this.elementImg.length)
                        {
                            this.elementImg[this.imgSelected+2].classList.add("nextRightSecond");
                            this.elementImg[this.imgSelected+1].classList.add("next");
                        }
                        else if((this.imgSelected + 1) < this.elementImg.length)
                        {
                            this.elementImg[this.imgSelected+1].classList.add("next");
                        }
                    }
                }

                window.onload = () => {

                    slide.main = document.getElementById("carousel");
                    slide.elementImg = slide.main.getElementsByClassName("slideImg");

                    for (num = 0; num < slide.elementImg.length; num++)
                    {
                        slide.elementImg[num].setAttribute("img-number", num);
                        
                        slide.elementImg[num].addEventListener("click", (event) => {
                            slide.imgSelected = parseInt(event.target.parentElement.getAttribute("img-number"));
                            slide.normalizeSlide();
                        });

                        if (slide.elementImg[num].classList.contains("selected"))
                        {
                            slide.imgSelected = num;
                        }
                    }

                    document.getElementById("prev").addEventListener("click", () => {slide.prevSlide()});
                    document.getElementById("next").addEventListener("click", () => {slide.nextSlide()});

                }
                </script>
<script> 
$(function() {
  
  var link = $('#navbar a.dot');
  
  // Move to specific section when click on menu link
  link.on('click', function(e) {
    var target = $($(this).attr('href'));
    $('html, body').animate({
      scrollTop: target.offset().top
    }, 600);
    $(this).addClass('active');
    e.preventDefault();
  });
  
  // Run the scrNav when scroll
  $(window).on('scroll', function(){
    scrNav();
  });
  
  // scrNav function 
  // Change active dot according to the active section in the window
  function scrNav() {
    var sTop = $(window).scrollTop();
    $('section').each(function() {
      var id = $(this).attr('id'),
          offset = $(this).offset().top-1,
          height = $(this).height();
      if(sTop >= offset && sTop < offset + height) {
        link.removeClass('active');
        $('#navbar').find('[data-scroll="' + id + '"]').addClass('active');
      }
    });
  }
  scrNav();
});
</script>
</body>
</html>
