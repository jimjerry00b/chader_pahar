<div class="footer">
        <div class="footer_section_one container py-5">
            <div class="row">
                <div class="col-12 text-center py-3">
                    <h1 class="text-secondary">আজই চাঁদের পাহাড়ের সদস্য হও</h1>
                    <p>মোবাইল : ০১৯১১-৪০১৩৪৩ , ইমেইল : contact@chanderpahar.com </p>
                    <button id="registration-btn" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#registrationModal">রেজিস্ট্রেশন</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Registration Modal -->
    <div class="modal fade" id="registrationModal" style="z-index: 9999;" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationModalLabel">নিবন্ধন</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="registrationForm" novalidate>
                        <div class="mb-3">
                            <label for="userName" class="form-label">নাম <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="userName" name="userName" required>
                            <div class="invalid-feedback">
                                নাম লিখুন।
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="userEmail" class="form-label">ইমেইল <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="userEmail" name="userEmail" required>
                            <div class="invalid-feedback">
                                ইমেইল লিখুন।
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="userPhone" class="form-label">ফোন <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="userPhone" name="userPhone" required>
                            <div class="invalid-feedback">
                                ফোন নম্বর লিখুন।
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">বাতিল</button>
                    <button type="button" class="btn btn-primary" id="saveRegistration">সংরক্ষণ</button>
                </div>
            </div>
        </div>
    </div>

    <!-- OTP Verification Modal -->
    <div class="modal fade" id="otpModal" style="z-index: 10000;" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="otpModalLabel">ইমেইল যাচাই করুন</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-3">আপনার ইমেইলে একটি OTP পাঠানো হয়েছে: <strong id="otpEmailDisplay"></strong></p>
                    <form id="otpForm" novalidate>
                        <div class="mb-3">
                            <label for="otpCode" class="form-label">OTP কোড লিখুন <span class="text-danger">*</span></label>
                            <input type="text" class="form-control text-center" id="otpCode" name="otpCode" maxlength="6" pattern="\d{6}" required placeholder="6 সংখ্যার কোড">
                            <div class="invalid-feedback">
                                সঠিক 6 সংখ্যার OTP কোড লিখুন।
                            </div>
                            <div class="valid-feedback">
                                সঠিক!
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-link text-decoration-none" id="resendOtp">OTP পুনরায় পাঠান</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">বাতিল</button>
                    <button type="button" class="btn btn-primary" id="verifyOtp">যাচাই করুন</button>
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
                    চাঁদের পাহাড় 
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
                <p class="copyright m-0 pt-1 pb-2">&copy; ২০২৫ চাঁদের পাহাড়। সর্বস্বত্ব সংরক্ষিত।</p>
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

    <script>
        // Get the button
        const scrollBtn = document.getElementById("scrollTopBtn");

        // Show button when user scrolls down 200px
        window.onscroll = function() {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            scrollBtn.style.display = "block";
        } else {
            scrollBtn.style.display = "none";
        }
        };

        // Scroll to top smoothly when clicked
        scrollBtn.onclick = function() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
        };
    </script>

    <script>
        window.addEventListener("scroll", function() {
        const header = document.querySelector("nav"); // target <nav>
        const headerOffset = header.offsetTop;

        if (window.scrollY > headerOffset) {
            header.classList.add("fixed-header");
        } else {
            header.classList.remove("fixed-header");
        }
        });

    </script>

    <script>
        // Store registration data temporarily
        let registrationData = {};
        let generatedOtp = '';

        // Stub function for OTP email sending
        // Actual OTP sending is handled by the XHR request to the backend
        function sendOtpToEmail(email, otp) {
            console.log('OTP sending handled by backend API');
        }

        // Registration Form Validation
        document.getElementById('saveRegistration').addEventListener('click', function() {
            const form = document.getElementById('registrationForm');
            const userName = document.getElementById('userName');
            const userEmail = document.getElementById('userEmail');
            const userPhone = document.getElementById('userPhone');
            
            // Reset validation states
            form.classList.remove('was-validated');
            
            // Validate name
            if (userName.value.trim() === '') {
                userName.classList.add('is-invalid');
            } else {
                userName.classList.remove('is-invalid');
                userName.classList.add('is-valid');
            }
            
            // Validate email
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (userEmail.value.trim() === '' || !emailPattern.test(userEmail.value)) {
                userEmail.classList.add('is-invalid');
            } else {
                userEmail.classList.remove('is-invalid');
                userEmail.classList.add('is-valid');
            }
            
            // Validate phone
            if (userPhone.value.trim() === '') {
                userPhone.classList.add('is-invalid');
            } else {
                userPhone.classList.remove('is-invalid');
                userPhone.classList.add('is-valid');
            }
            
            // Check if form is valid
            if (form.checkValidity() && 
                userName.value.trim() !== '' && 
                emailPattern.test(userEmail.value) && 
                userPhone.value.trim() !== '') {
                
                // Store form data
                registrationData = {
                    name: userName.value,
                    email: userEmail.value,
                    phone: userPhone.value
                };
                
                // Show loading state
                const saveBtn = document.getElementById('saveRegistration');
                const originalBtnText = saveBtn.textContent;
                saveBtn.disabled = true;
                saveBtn.textContent = 'পাঠানো হচ্ছে...';
                
                // Send OTP via AJAX
                fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        action: 'send_otp',
                        name: userName.value,
                        email: userEmail.value,
                        phone: userPhone.value
                    })
                })
                .then(response => response.json())
                .then(result => {
                    // Reset button state
                    saveBtn.disabled = false;
                    saveBtn.textContent = originalBtnText;
                    
                    if (result.success) {
                        console.log('OTP sent successfully:', result);
                        
                        // Store the generated OTP from server
                        if (result.data && result.data.otp) {
                            generatedOtp = result.data.otp;
                        }
                        
                        // Display email in OTP modal
                        document.getElementById('otpEmailDisplay').textContent = userEmail.value;
                        
                        // Close registration modal
                        const regModal = bootstrap.Modal.getInstance(document.getElementById('registrationModal'));
                        regModal.hide();
                        
                        // Open OTP modal
                        setTimeout(() => {
                            const otpModal = new bootstrap.Modal(document.getElementById('otpModal'));
                            otpModal.show();
                        }, 300);
                    } else {
                        const errorMsg = result.data && result.data.message ? result.data.message : 'OTP পাঠানো যায়নি।';
                        alert('ত্রুটি: ' + errorMsg);
                    }
                })
                .catch(error => {
                    // Reset button state
                    saveBtn.disabled = false;
                    saveBtn.textContent = originalBtnText;
                    
                    console.error('Error:', error);
                    alert('একটি ত্রুটি ঘটেছে। আবার চেষ্টা করুন।');
                });
            }
        });
        
        // Clear validation on input
        ['userName', 'userEmail', 'userPhone'].forEach(id => {
            document.getElementById(id).addEventListener('input', function() {
                this.classList.remove('is-invalid', 'is-valid');
            });
        });
        
        // Reset form when modal is closed
        document.getElementById('registrationModal').addEventListener('hidden.bs.modal', function() {
            const form = document.getElementById('registrationForm');
            form.reset();
            form.querySelectorAll('.is-invalid, .is-valid').forEach(el => {
                el.classList.remove('is-invalid', 'is-valid');
            });
        });

        // OTP Verification
        document.getElementById('verifyOtp').addEventListener('click', function() {
            const otpInput = document.getElementById('otpCode');
            const enteredOtp = otpInput.value.trim();
            const verifyBtn = this;
            
            // Validate OTP format (6 digits)
            if (enteredOtp === '' || !/^\d{6}$/.test(enteredOtp)) {
                otpInput.classList.add('is-invalid');
                otpInput.classList.remove('is-valid');
                return;
            }
            
            // Show loading state
            const originalBtnText = verifyBtn.textContent;
            verifyBtn.disabled = true;
            verifyBtn.textContent = 'যাচাই করা হচ্ছে...';
            
            // Verify OTP via AJAX from database
            fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    action: 'verify_otp',
                    email: registrationData.email,
                    otp: enteredOtp
                })
            })
            .then(response => response.json())
            .then(result => {
                // Reset button state
                verifyBtn.disabled = false;
                verifyBtn.textContent = originalBtnText;
                
                if (result.success) {
                    // OTP is valid and has been removed from database
                    otpInput.classList.remove('is-invalid');
                    otpInput.classList.add('is-valid');
                    
                    // Save member registration data to database
                    fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: new URLSearchParams({
                            action: 'save_member',
                            name: registrationData.name,
                            email: registrationData.email,
                            phone: registrationData.phone
                        })
                    })
                    .then(response => response.json())
                    .then(saveResult => {
                        if (saveResult.success) {
                            console.log('Member saved successfully:', saveResult);
                            
                            // Show success message
                            alert('রেজিস্ট্রেশন সফল হয়েছে!');
                            
                            // Close OTP modal
                            const otpModal = bootstrap.Modal.getInstance(document.getElementById('otpModal'));
                            otpModal.hide();
                            
                            // Reset registration form
                            document.getElementById('registrationForm').reset();
                            registrationData = {};
                            generatedOtp = '';
                        } else {
                            const errorMsg = saveResult.data && saveResult.data.message ? saveResult.data.message : 'রেজিস্ট্রেশন সংরক্ষণ ব্যর্থ হয়েছে।';
                            alert('ত্রুটি: ' + errorMsg);
                        }
                    })
                    .catch(error => {
                        console.error('Error saving member:', error);
                        alert('রেজিস্ট্রেশন সংরক্ষণে ত্রুটি ঘটেছে।');
                    });
                } else {
                    // OTP is incorrect or expired
                    otpInput.classList.add('is-invalid');
                    otpInput.classList.remove('is-valid');
                    
                    const errorMsg = result.data && result.data.message ? result.data.message : 'ভুল OTP কোড';
                    alert(errorMsg);
                }
            })
            .catch(error => {
                // Reset button state
                verifyBtn.disabled = false;
                verifyBtn.textContent = originalBtnText;
                
                console.error('Error:', error);
                alert('একটি ত্রুটি ঘটেছে। আবার চেষ্টা করুন।');
            });
        });

        // Resend OTP
        document.getElementById('resendOtp').addEventListener('click', function() {
            const resendBtn = this;
            const originalBtnText = resendBtn.textContent;
            
            // Disable button and show loading state
            resendBtn.disabled = true;
            resendBtn.textContent = 'পাঠানো হচ্ছে...';
            
            // Send OTP via AJAX
            fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    action: 'send_otp',
                    name: registrationData.name,
                    email: registrationData.email,
                    phone: registrationData.phone
                })
            })
            .then(response => response.json())
            .then(result => {
                // Reset button state
                resendBtn.disabled = false;
                resendBtn.textContent = originalBtnText;
                
                if (result.success) {
                    console.log('OTP resent successfully:', result);
                    
                    // Store the new OTP from server
                    if (result.data && result.data.otp) {
                        generatedOtp = result.data.otp;
                    }
                    
                    alert('নতুন OTP পাঠানো হয়েছে!');
                    
                    // Clear OTP input
                    document.getElementById('otpCode').value = '';
                    document.getElementById('otpCode').classList.remove('is-invalid', 'is-valid');
                } else {
                    const errorMsg = result.data && result.data.message ? result.data.message : 'OTP পাঠানো যায়নি।';
                    alert('ত্রুটি: ' + errorMsg);
                }
            })
            .catch(error => {
                // Reset button state
                resendBtn.disabled = false;
                resendBtn.textContent = originalBtnText;
                
                console.error('Error:', error);
                alert('একটি ত্রুটি ঘটেছে। আবার চেষ্টা করুন।');
            });
        });

        // Clear OTP validation on input
        document.getElementById('otpCode').addEventListener('input', function() {
            this.classList.remove('is-invalid', 'is-valid');
            // Only allow digits
            this.value = this.value.replace(/\D/g, '');
        });

        // Reset OTP form when modal is closed
        document.getElementById('otpModal').addEventListener('hidden.bs.modal', function() {
            document.getElementById('otpForm').reset();
            document.getElementById('otpCode').classList.remove('is-invalid', 'is-valid');
        });
    </script>
    <?php wp_footer(); ?>
  </body>
</html>