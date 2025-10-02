<div class="footer">
        <div class="footer_section_one container py-5">
            <div class="row">
                <div class="col-12 text-center py-3">
                    <h1 class="text-secondary">আজই চাঁদের পাহাড়ের সদস্য হও</h1>
                    <p>মোবাইল : ০১৯১১-৪০১৩৪৩ , ইমেইল : contact@chanderpahar.com </p>
                    <button class="btn btn-primary mb-3">রেজিস্ট্রেশন</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="p-0">
        <div class="container py-5">
        <div class="row">
            <div class="col-12 col-md-5 mb-4 mb-md-0 d-grid align-items-center justify-content-center justify-content-lg-start">
                <div class="">
                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Chader Pahar Logo" class="img-fluid mb-3" style="max-width: 150px;"></a>
                </div>
            </div>

            <div class="col-12 col-md-2 mb-4">
                <div class="">
                    <h3>ঠিকানা:</h3>
                    চাঁদের পাহাড় 
                    মোলাশীকান্দা , বান্দুরা ,
                    নবাবগঞ্জ, ঢাকা ১৩২১
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="">
                    <p>মোবাইল : ০১৯১১-৪০১৩৪৩</p>
                    <p>ইমেইল : contact@chanderpahar.com</p>
                    <div class="social-links">
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="youtube"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="tiktok"><i class="bi bi-tiktok"></i></a>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="container-fluid copyright-section">
            <div class="row">
                <div class="col-12 text-center">
                <p class="copyright m-0 pt-1 pb-2">&copy; ২০২৫ চাঁদের পাহাড়। সর্বস্বত্ব সংরক্ষিত।</p>
                </div>
            </div>
        </div>
  </footer>


    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.bundle.min.js"></script>

    <script>
        document.querySelectorAll('.dynamic-color').forEach(p => {
            const text = p.textContent;
            const firstSpace = text.indexOf(' ');
            
            if (firstSpace === -1) {
                // Only one word
                p.innerHTML = `<span class="first-word">${text}</span>`;
            } else {
                const firstWord = text.slice(0, firstSpace);
                const rest = text.slice(firstSpace);
                p.innerHTML = `<span class="first-word">${firstWord}</span>${rest}`;
            }
        });
    </script>
    <?php wp_footer(); ?>
  </body>
</html>