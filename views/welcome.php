<!-- <script>
        window.onload = function(){ height("wrapper") };
        window.onresize = function(){ height("wrapper") };
</script> -->



<!--                JAVASCRIPT SNOW                     -->

<script type="text/javascript">
/////////////////////////////////////////////////////////
// Javascript made by http://peters1.dk/tools/snow.php //
/////////////////////////////////////////////////////////
// N´OUBLIEZ PAS: De changez le chemin vers  l´image snow.png
snow_img = "views/images/snow.gif";
// BONUS: Vous pouvez facilement regler le nombre de flocons que vous voulez sur chaque page...
snow_no = 15;
if (typeof(window.pageYOffset) == "number")
{
  snow_browser_width = window.innerWidth;
  snow_browser_height = window.innerHeight;
}
else if (document.body && (document.body.scrollLeft || document.body.scrollTop))
{
  snow_browser_width = document.body.offsetWidth;
  snow_browser_height = document.body.offsetHeight;
}
else if (document.documentElement && (document.documentElement.scrollLeft || document.documentElement.scrollTop))
{
  snow_browser_width = document.documentElement.offsetWidth;
  snow_browser_height = document.documentElement.offsetHeight;
}
else
{
  snow_browser_width = 500;
  snow_browser_height = 500;
}

snow_dx = [];
snow_xp = [];
snow_yp = [];
snow_am = [];
snow_stx = [];
snow_sty = [];

for (i = 0; i < snow_no; i++)
{
  snow_dx[i] = 0;
  snow_xp[i] = Math.random()*(snow_browser_width-50);
  snow_yp[i] = Math.random()*snow_browser_height;
  snow_am[i] = Math.random()*20;
  snow_stx[i] = 0.02 + Math.random()/10;
  snow_sty[i] = 0.7 + Math.random();
  if (i > 0) document.write("<\div id=\"snow_flake"+ i +"\" style=\"position:absolute;z-index:"+i+"\"><\img src=\""+snow_img+"\" border=\"0\"><\/div>"); else document.write("<\div id=\"snow_flake0\" style=\"position:absolute;z-index:0\"><a href=\"http://peters1.dk/tools/snow.php\" target=\"_blank\"><\img src=\""+snow_img+"\" border=\"0\"></a><\/div>");
}

function SnowStart()
{
  for (i = 0; i < snow_no; i++)
  {
    snow_yp[i] += snow_sty[i];
    if (snow_yp[i] > snow_browser_height-50)
    {
      snow_xp[i] = Math.random()*(snow_browser_width-snow_am[i]-30);
      snow_yp[i] = 0;
      snow_stx[i] = 0.02 + Math.random()/10;
      snow_sty[i] = 0.7 + Math.random();
    }
    snow_dx[i] += snow_stx[i];
    document.getElementById("snow_flake"+i).style.top=snow_yp[i]+"px";
    document.getElementById("snow_flake"+i).style.left=snow_xp[i] + snow_am[i]*Math.sin(snow_dx[i])+"px";
  }
  snow_time = setTimeout("SnowStart()", 10);
}
SnowStart();
</script>
<!--             END OF JAVASCRIPT SNOW              -->


  <div id="wrapper">
    <header>
      <a class="logo" href="index.php"><img src="images/logo.png" alt="logo" title="logo" /></a>


      <p id="specialinfo-blue">
        <u><i>Informations au 5 Décembre 2016 : </i></u>
        <br>Le site de démonstration est disponible à l'adresse  <a href="https://demo.gozpeak.com"><i> https://demo.gozpeak.com </i></a>
        <br>L'ouverture du site est prévue pour le 1er Janvier 2017 !!!  (notez que le site ne sera pas supporté sur les mobiles).

        <br> <h2 style="margin-top:3%;">En attendant, Gozpeak Rennes vous souhaite de bonnes fêtes </h2> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <img style="width:17%;padding-top:2%;" src="views/images/pere_noel_gozpeak.jpg" alt="[Img pere noel gozpeak]" title="Père Noel Gozpeak" />
        <img src="views/images/sapin_gozpeak.png" alt="[Img sapin gozpeak]" title="Sapin Gozpeak" />
        <br>

      </p>
      <br>
      <br>
    </header>

    <div id="book">

      <div id="ribbon" class="contact">click me to reveal the contact form</div>
      <div class="top-page"></div>

      <div class="content-page">
        <div class="top-spiral"></div>
        <div class="bottom-spiral"></div>

        <div id="cform">
          <div class="row"></div>
          <h3>Restez en contact avec nous :</h3>
          <div class="form-wrapper in-touch">
            <div id="message"></div>
            <form method="post" action="php/contact.php" name="contactform" id="contactform">
              <input type="text" name="name" placeholder="Nom" id="name" />
              <input type="text" name="email" placeholder="Email" id="email" />
              <!-- <input type="text" name="phone" placeholder="Téléphone" id="phone" /> -->
              <input type="text" name="subject" placeholder="Objet" id="subject" />
              <textarea placeholder="Message" name="comments" id="comments"></textarea>
              <div id="captcha">
                <span>3+1=</span>
                <input type="text" name="verify" id="verify" />
              </div><!--end verify-->

<!-- You can stylize the submit button by changing its color. To do this, replace the 'orange' from class="orange" with: yellow, red, purple, green, blue, darkblue, white and black.-->
              <input type="submit" name="send" value="ENVOYER" id="submit" class="orange" />
            </form>
          </div><!--end form-wrapper-->
        </div><!--end cform-->

        <div id="home">
          <div class="row"></div>
          <!--<h2>We're currently under construction!</h2>-->
          <h2>Nous sommes actuellement en construction !</h2>
          <div class="row"></div>
          <div class="row"></div>
          <!--<h3>We`re working hard and believe we`ll launch the website in:</h3>-->
          <h3>Nous vous donnons rendez-vous pour le lancement du site dans :</h3>
          <!--<div id="countdown"></div>-->
          <div id="countdown-blog"></div>
          <script type="text/javascript" src="countdown.js"></script>
          <div class="clear"></div>
          <div class="row"></div>
          <div class="form-wrapper email-list">
            <div id="mesaj"></div>
            <form id="subscribe" method="post" action="php/subscribe.php" name="subscribe">
              <!--<input type="text" id="semail" name="YourEmail" placeholder="Subscribe to our email list" />-->
              <input type="text" id="semail" name="YourEmail" placeholder="Envoyez-nous votre email" />

<!-- You can stylize the submit button by changing its color. To do this, replace the 'orange' from class="orange" with: yellow, red, purple, green, blue, darkblue, white and black.-->
              <input type="submit" id="ssubmit" name="subscribe" value="SOUSCRIRE" class="orange" />
            </form>
          </div><!--end form-wrapper-->
        </div><!--end home-->

      </div><!--end content-page-->

      <div class="bottom-page">
        <ul class="social" id="socialbutton">
        <!-- Change the # with the link to your social page. -->
          <li><a class="facebook tooltip" target="_blank" href="https://www.facebook.com/gozpeak" title="Facebook"></a></li>
          <!--<li><a class="twitter tooltip" href="#" title="Twitter"></a></li>
          <li><a class="youtube tooltip" href="#" title="YouTube"></a></li>
          <li><a class="skype tooltip" href="#" title="Skype"></a></li>
          <li><a class="dribbble tooltip" href="#" title="Dribbble"></a></li>-->

<!-- You can add to social list buttons for digg, delicious, vimeo and dropbox. Just delete the brackets from below -->
      <!--	<li><a class="digg tooltip" href="#" title="Digg"></a></li>
          <li><a class="delicious tooltip" href="#" title="Delicious"></a></li>
          <li><a class="vimeo tooltip" href="#" title="Vimeo"></a></li>
          <li><a class="dropbox tooltip" href="#" title="DropBox"></a></li>
      -->
        </ul>
      </div><!--end bottom-page-->
    <!-- </div>end book-->

    <p class="copyright">Copyright &copy; Gozpeak - All Rights Reserved</p>

  </div><!--end wrapper-->
<script type="text/javascript" src="js/jquery.placeholder.js"></script>	<!-- placeholder html5 tag support for IE and Old Browsers -->
