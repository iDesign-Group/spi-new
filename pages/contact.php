<?php
/**
 * Shree Plastic Industries - Contact Page
 * Contact form with CAPTCHA validation
 */

require_once '../includes/config.php';

$page_title = 'Contact Us';
$page_description = 'Get in touch with Shree Plastic Industries. We are here to assist you with your plastic packaging needs.';

// Start session for CAPTCHA
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Generate math CAPTCHA if not exists
if (!isset($_SESSION['captcha_answer'])) {
    $num1 = rand(1, 10);
    $num2 = rand(1, 10);
    $_SESSION['captcha_num1'] = $num1;
    $_SESSION['captcha_num2'] = $num2;
    $_SESSION['captcha_answer'] = $num1 + $num2;
}

// Form submission handling
$formSubmitted = false;
$formSuccess = false;
$formErrors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_contact'])) {
    $formSubmitted = true;
    
    // Validate form fields
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $captcha = trim($_POST['captcha'] ?? '');
    
    // Validation
    if (empty($name)) {
        $formErrors[] = 'Name is required';
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $formErrors[] = 'Valid email is required';
    }
    
    if (empty($phone)) {
        $formErrors[] = 'Phone number is required';
    }
    
    if (empty($subject)) {
        $formErrors[] = 'Subject is required';
    }
    
    if (empty($message)) {
        $formErrors[] = 'Message is required';
    }
    
    // CAPTCHA validation
    if (empty($captcha)) {
        $formErrors[] = 'CAPTCHA is required';
    } elseif (!isset($_SESSION['captcha_answer']) || intval($captcha) !== intval($_SESSION['captcha_answer'])) {
        $formErrors[] = 'CAPTCHA answer is incorrect';
    }
    
    // If no errors, process the form
    if (empty($formErrors)) {
        // Here you would typically send an email or save to database
        // For now, we'll just mark it as successful
        
        // Example email code (uncomment and configure):
        /*
        $to = CONTACT_EMAIL;
        $email_subject = "Contact Form: " . $subject;
        $email_body = "Name: $name\n";
        $email_body .= "Email: $email\n";
        $email_body .= "Phone: $phone\n\n";
        $email_body .= "Message:\n$message";
        $headers = "From: $email";
        
        if (mail($to, $email_subject, $email_body, $headers)) {
            $formSuccess = true;
        }
        */
        
        $formSuccess = true;
        
        // Clear form data
        $name = $email = $phone = $subject = $message = '';
    }
    
    // Generate new CAPTCHA after submission
    unset($_SESSION['captcha_num1']);
    unset($_SESSION['captcha_num2']);
    unset($_SESSION['captcha_answer']);
    
    $num1 = rand(1, 10);
    $num2 = rand(1, 10);
    $_SESSION['captcha_num1'] = $num1;
    $_SESSION['captcha_num2'] = $num2;
    $_SESSION['captcha_answer'] = $num1 + $num2;
}

include '../includes/header.php';
?>

<!-- Hero Section -->
<section class="hero">
        <div class="hero-bg" style="background-image: url('../assets/images/heroes/contact-hero.jpg');"></div>    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="hero-title">Contact Us</h1>
        <p class="hero-tagline">We'd love to hear from you. Get in touch with us today.</p>
    </div>
</section>

<!-- Contact Section -->
<section class="section">
    <div class="container">
        <div class="contact-wrapper">
            <!-- Contact Information -->
            <div class="contact-info-section animate-on-scroll">
                <h2 class="section-title">Get in Touch</h2>
                <p class="section-text">
                    Have questions about our products or services? Our team is ready to assist you.
                </p>
                
                <div class="contact-details">
                    <div class="contact-detail-item">
                        <div class="contact-detail-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <div class="contact-detail-content">
                            <h3>Address</h3>
                            <p><?php echo SITE_LOCATION; ?></p>
                        </div>
                    </div>
                    
                    <div class="contact-detail-item">
                        <div class="contact-detail-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </div>
                        <div class="contact-detail-content">
                            <h3>Phone</h3>
                            <p><a href="tel:<?php echo str_replace(['-', ' '], '', CONTACT_PHONE); ?>"><?php echo CONTACT_PHONE; ?></a></p>
                        </div>
                    </div>
                    
                    <div class="contact-detail-item">
                        <div class="contact-detail-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </div>
                        <div class="contact-detail-content">
                            <h3>Email</h3>
                            <p><a href="mailto:<?php echo CONTACT_EMAIL; ?>"><?php echo CONTACT_EMAIL; ?></a></p>
                        </div>
                    </div>
                    
                    <div class="contact-detail-item">
                        <div class="contact-detail-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>
                        <div class="contact-detail-content">
                            <h3>Business Hours</h3>
                            <p>Monday - Saturday: 9:00 AM - 6:00 PM</p>
                            <p>Sunday: Closed</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="contact-form-section animate-on-scroll">
                <div class="contact-form-container">
                    <h2 class="form-title">Send us a Message</h2>
                    
                    <?php if ($formSubmitted && $formSuccess): ?>
                    <div class="alert alert-success">
                        <svg class="alert-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        <span>Thank you! Your message has been sent successfully. We'll get back to you soon.</span>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($formSubmitted && !empty($formErrors)): ?>
                    <div class="alert alert-error">
                        <svg class="alert-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                        <div>
                            <?php foreach ($formErrors as $error): ?>
                                <p><?php echo htmlspecialchars($error); ?></p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <form method="POST" action="" class="contact-form" id="contactForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Full Name *</label>
                                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name ?? ''); ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email Address *</label>
                                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone">Phone Number *</label>
                                <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($phone ?? ''); ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="subject">Subject *</label>
                                <input type="text" id="subject" name="subject" value="<?php echo htmlspecialchars($subject ?? ''); ?>" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" rows="5" required><?php echo htmlspecialchars($message ?? ''); ?></textarea>
                        </div>
                        
                        <!-- Math CAPTCHA -->
                        <div class="form-group captcha-group">
                            <label for="captcha">Security Question: What is <?php echo $_SESSION['captcha_num1']; ?> + <?php echo $_SESSION['captcha_num2']; ?>? *</label>
                            <div class="math-captcha">
                                <div class="captcha-question">
                                    <span class="captcha-number"><?php echo $_SESSION['captcha_num1']; ?></span>
                                    <span class="captcha-operator">+</span>
                                    <span class="captcha-number"><?php echo $_SESSION['captcha_num2']; ?></span>
                                    <span class="captcha-equals">=</span>
                                    <span class="captcha-question-mark">?</span>
                                </div>
                            </div>
                            <input type="number" id="captcha" name="captcha" placeholder="Enter your answer" required autocomplete="off" style="max-width: 150px;">
                            <p class="captcha-hint" style="font-size: 13px; color: #666; margin-top: 5px;">Please solve the math problem above</p>
                        </div>
                        
                        <button type="submit" name="submit_contact" class="btn btn-primary btn-submit">
                            Send Message
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="22" y1="2" x2="11" y2="13"></line>
                                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.contact-wrapper {
    display: grid;
    grid-template-columns: 1fr 1.5fr;
    gap: 60px;
    margin-top: 40px;
}

.contact-info-section {
    padding-right: 20px;
}

.contact-details {
    margin-top: 40px;
}

.contact-detail-item {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 8px;
    transition: transform 0.3s ease;
}

.contact-detail-item:hover {
    transform: translateX(5px);
}

.contact-detail-icon {
    flex-shrink: 0;
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #2E5090, #4CAF50);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.contact-detail-icon svg {
    width: 24px;
    height: 24px;
    stroke: white;
}

.contact-detail-content h3 {
    margin: 0 0 8px 0;
    font-size: 16px;
    font-weight: 600;
    color: #1A1A1A;
}

.contact-detail-content p {
    margin: 0;
    color: #666;
    line-height: 1.6;
}

.contact-detail-content a {
    color: #2E5090;
    text-decoration: none;
}

.contact-detail-content a:hover {
    text-decoration: underline;
}

.contact-form-container {
    background: white;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.form-title {
    margin: 0 0 30px 0;
    font-size: 28px;
    color: #1A1A1A;
}

.contact-form .form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #333;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 15px;
    transition: border-color 0.3s ease;
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #2E5090;
}

.captcha-group {
    margin-top: 30px;
}

.math-captcha {
    margin-bottom: 15px;
    padding: 20px;
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    border-radius: 8px;
    border: 2px solid #2E5090;
}

.captcha-question {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
    font-size: 32px;
    font-weight: 700;
    color: #1A1A1A;
}

.captcha-number {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 60px;
    height: 60px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    color: #2E5090;
}

.captcha-operator,
.captcha-equals {
    color: #2E5090;
    font-size: 36px;
}

.captcha-question-mark {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 60px;
    height: 60px;
    background: #2E5090;
    color: white;
    border-radius: 8px;
    animation: pulse 1.5s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
}

.btn-submit {
    width: 100%;
    padding: 15px;
    font-size: 16px;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-top: 30px;
}

.btn-submit svg {
    width: 20px;
    height: 20px;
}

.alert {
    padding: 15px 20px;
    border-radius: 8px;
    margin-bottom: 25px;
    display: flex;
    align-items: flex-start;
    gap: 12px;
}

.alert-success {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.alert-error {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.alert-icon {
    flex-shrink: 0;
    width: 24px;
    height: 24px;
}

@media (max-width: 991px) {
    .contact-wrapper {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .contact-form .form-row {
        grid-template-columns: 1fr;
    }
    
    .contact-form-container {
        padding: 30px 20px;
    }
    
    .captcha-question {
        font-size: 24px;
        gap: 10px;
    }
    
    .captcha-number,
    .captcha-question-mark {
        min-width: 50px;
        height: 50px;
        font-size: 24px;
    }
}
</style>

<?php include '../includes/footer.php'; ?>
