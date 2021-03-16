 <!-- ======= Footer ======= -->
 <footer id="footer">
     <div class="footer-top">
         <div class="container">
             <div class="row">

                 <div class="col-lg-3 col-md-6">
                     <div class="footer-info">
                         <h3>Poblano</h3>
                         <p>
                             69 1/4 Western Highway <br>
                             SAN IGNACIO, CAYO DISTRICT, <br>
                             BELIZE CENTRAL AMERICA<br><br>
                             <strong>Phone:</strong> +1 5589 55488 55<br>
                             <strong>Email:</strong> info@poblano.bz<br>
                         </p>
                         <div class="social-links mt-3">
                             <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                             <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                             <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                             <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                             <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-2 col-md-6 footer-links">
                     <h4>Useful Links</h4>
                     <ul>
                         <li><i class="bx bx-chevron-right "></i> <a href="{{ route('home') }}">Home</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="#about" class="scrollto">About us</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="#menu" class="scrollto">Menu</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="#gallery" class="scrollto">Gallery</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="#specials" class="scrollto">Specials</a></li>
                     </ul>
                 </div>

                 <div class="col-lg-3 col-md-6 footer-links">
                     <h4>Our Services</h4>
                     <ul>
                         <li><i class="bx bx-chevron-right"></i> <a href="#contact" class="scrollto"
                                 onclick="addTxt('Catering','subject')">Catering</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="#contact" class="scrollto"
                                 onclick="addTxt('Event','subject')">Events</a></li>
                         <li><i class=" bx bx-chevron-right"></i> <a href="#contact" class="scrollto"
                                 onclick="addTxt('Dining In','subject')">Dining In</a>
                         </li>
                         <li><i class="bx bx-chevron-right"></i> <a href="#contact" class="scrollto"
                                 onclick="addTxt('Delivery','subject')">Delivery</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="#contact" class="scrollto"
                                 onclick="addTxt('Breakfast','subject')">Breakfast</a></li>
                     </ul>
                 </div>

                 <script>
                     function addTxt(txt, field) {
                         const myTxt = txt;
                         const id = field;

                         document.getElementById(id).value = myTxt;
                     }

                 </script>

                 {{-- <div class="col-lg-4 col-md-6 footer-newsletter">
                     <h4>Our Newsletter</h4>
                     <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                     <form action="" method="post">
                         <input type="email" name="email"><input type="submit" value="Subscribe">
                     </form>

                 </div> --}}

             </div>
         </div>
     </div>

     <div class="container">
         <div class="copyright">
             &copy; Copyright <strong><span>Poblano</span></strong>. All Rights Reserved. Credit Dwain Wagner
         </div>

     </div>
 </footer><!-- End Footer -->
