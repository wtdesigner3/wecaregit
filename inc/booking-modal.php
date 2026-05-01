<div id="bookingModal">
    <div class="modal-box">
        <div class="modal-header">
            <div class="modal-header-text">
                <h3>Book
                    <?= isset($pdetailrec['heading']) ? $pdetailrec['heading'] : (isset($blog['b_title']) ? $blog['b_title'] : 'an Appointment') ?>
                </h3>
                <p>WeCare Dental Clinic, Jamshedpur</p>
            </div>
            <button class="modal-close-btn" onclick="closeModal()">×</button>
        </div>
        <div class="modal-body">
            <form method="POST" action="<?= BASE_URL; ?>mail/contactMail">
                <input type="text" name="name" class="form-control" placeholder="Your Name *" required>
                <input type="tel" name="phone" class="form-control" placeholder="Phone Number *" required>
                <input type="text" name="location" class="form-control" placeholder="Your Location *" required>
                <input type="text" name="app_date" class="form-control" placeholder="Appointment Date *" required
                    onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" min="<?= date('Y-m-d') ?>">
                <input type="hidden" name="service" value="<?= isset($pdetailrec['heading']) ? $pdetailrec['heading'] : (isset($blog['b_title']) ? $blog['b_title'] : 'General Appointment') ?>">
                <div class="mb-3">
                    <div class="g-recaptcha" data-sitekey="<?= RECAPTCHA_SITE_KEY ?>"></div>
                </div>
                <button type="submit" class="btn-modal-submit">Schedule Now</button>
            </form>
        </div>
    </div>
</div>