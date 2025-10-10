<?php get_header(); ?>

<?php
/*
    Template Name: যোগাযোগ
*/
?>

<section class="">
    <div class="container px-0" style="margin: 0 auto; text-align: center;" class="mt-4">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_10.jpg" alt="Chader Pahar" class="img-fluid">
    </div>
    <div class="container contact_text_section contact-us text-center py-4">
        <h1 class="">যোগাযোগ</h1>
        <p class="contact-subtitle">যেকোনো তথ্য বা অনুসন্ধানের জন্য আমাদের সাথে যোগাযোগ করুন</p>
        <p class="contact-subtitle">
            আমাদের ফোন নম্বর : ০১৯১৪০১৩৪৩ , ইমেল : contact@chamderpahar.com<br>
            ঠিকানা : চাঁদের পাহাড়, মোলাশীকান্দা, বান্দুরা, নবাবগঞ্জ, ঢাকা ১৩২১
        </p>
    </div>
</section>

<!-- Contact Form and Map Section -->
<section class="contact-content py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Map Section -->
            <div class="col-12 col-lg-6">
                <div class="map-wrapper">
                    <!-- <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3647.9238445!2d90.7342!3d24.4142!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjTCsDI0JzUxLjEiTiA5MMKwNDQnMDMuMSJF!5e0!3m2!1sen!2sbd!4v1635000000000!5m2!1sen!2sbd" 
                        width="100%" 
                        height="550" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe> -->

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1827.25741865932!2d90.10985111813969!3d23.657539905419245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37558f6d02e15d1f%3A0x54afc823f85d4671!2z4Kaa4Ka-4KaB4Kam4KeH4KawIOCmquCmvuCmueCmvuCnnCDgpqzgp4HgppUg4KaV4KeN4Kav4Ka-4Kar4KeH!5e0!3m2!1sen!2sbd!4v1760031339047!5m2!1sen!2sbd" 
                        width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-12 col-lg-6">
                <div class="contact-form-wrapper">
                    <h3 class="form-title">আমাদের লিখুন</h3>
                    <?php
                        echo do_shortcode('[contact-form-7 id="61115dd" title="Contact form"]');
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Photo Banner Section */
.photo-banner {
    background-color: #fff;
    padding: 20px 0;
}

.banner-images {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    overflow-x: auto;
    padding: 0 20px;
}

.banner-images img {
    height: 120px;
    width: auto;
    object-fit: cover;
    flex-shrink: 0;
}

/* Contact Header Banner */
.contact-header-banner {
    background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
    color: white;
    padding: 40px 0;
    text-align: center;
}

.contact-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 15px;
}

.contact-subtitle {
    font-size: 24px;
}

.contact-details {
    font-size: 1rem;
    line-height: 1.8;
    margin-bottom: 0;
}

.map-wrapper {
    height: 100%;
    min-height: 550px;
}

.map-wrapper iframe {
    border-radius: 8px;
}

.contact-form-wrapper {
    background-color: white;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    height: 100%;
}

.form-title {
    font-size: 1.8rem;
    font-weight: 600;
    margin-bottom: 30px;
    color: #333;
}

.contact-form-wrapper .form-control {
    border: 1px solid #ddd;
    padding: 12px 15px;
    font-size: 1rem;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.contact-form-wrapper .form-control:focus {
    border-color: #f39c12;
    box-shadow: 0 0 0 0.2rem rgba(243, 156, 18, 0.25);
}

.contact-form-wrapper .form-control::placeholder {
    color: #999;
}

.btn-submit {
    background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
    color: white;
    border: none;
    padding: 12px 50px;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-submit:hover {
    background: linear-gradient(135deg, #e67e22 0%, #d35400 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(243, 156, 18, 0.4);
}

.contact_text_section h1{
    color: var(--second-color);
}

.wpcf7-not-valid-tip{
    color: #dc3232;
    font-size: 15px;
    font-weight: normal;
    display: block;
    padding-left: 12px;
    padding-top: 3px;
}

/* Responsive Design */
@media (max-width: 991px) {
    .contact-title {
        font-size: 2rem;
    }
    
    .banner-images img {
        height: 80px;
    }
    
    .contact-form-wrapper {
        padding: 30px 20px;
        margin-top: 30px;
    }
    
    .map-wrapper {
        min-height: 400px;
    }
}

@media (max-width: 576px) {
    .contact-title {
        font-size: 1.5rem;
    }
    
    .contact-subtitle,
    .contact-details {
        font-size: 0.9rem;
    }
    
    .banner-images {
        padding: 0 10px;
    }
    
    .banner-images img {
        height: 60px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Basic validation
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const message = document.getElementById('message').value.trim();
        
        if (!name || !email || !message) {
            alert('অনুগ্রহ করে সকল প্রয়োজনীয় তথ্য পূরণ করুন।');
            return;
        }
        
        // Here you can add AJAX submission or WordPress form handling
        alert('আপনার বার্তা সফলভাবে পাঠানো হয়েছে। ধন্যবাদ!');
        contactForm.reset();
    });
});
</script>

<?php get_footer(); ?>
