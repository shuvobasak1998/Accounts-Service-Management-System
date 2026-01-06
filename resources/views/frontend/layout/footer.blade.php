    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <ul class="social">
                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="copyright">
                        Copyright &copy; <span id="year"></span> Softy Pinko Company - Design: TemplateMo
                    </p>
                </div>
            </div>
            
            <!-- jQuery CDN -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            
            <script>
                $(document).ready(function() {
                    if ($("#year").length) { 
                        $("#year").text(new Date().getFullYear());
                    }
                });
            </script>
            
            
        </div>
    </footer>
    <!-- ***** Footer End ***** -->
    