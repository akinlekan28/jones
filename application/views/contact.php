<style>
    .contact-enlarge{
        font-size: 15px;
    }
</style>
<script src="<?php echo base_url();?>assets/js/jquery-min.js"></script>
<script src="<?php echo base_url();?>adminassets/js/notify.min.js"></script>

<?php if(isset($response)):?>
    <?php if($response == TRUE):?>
        <script type="text/javascript">
            $(document).ready(function(){
                $.notify("Message Sent Successfully", "success");
            });
        </script>
    <?php elseif($response == FALSE):?>
        <script>
            $(document).ready(function(){
                $.notify("Error Sending Message", "error");
            });
        </script>
    <?php endif?>
<?php endif?>
<section class="contact2-section section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 wow bounceInLeft" data-wow-delay="0.3s">
            <h1 class="section-title">CONTACT US</h1>
            <p class="section-subcontent mb-30">You need quick quotation, help, support or have any form of inquiry then don't hesitate to use the contact us form and
             you would get a swift reply from our support personnel.</p>
            <form method="post" role="form" class="mt-30 shake" id="contactForm" name="contact-form" data-toggle="validator">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" placeholder="Your Name" class="form-control contact-control" name="name" required data-error="Please enter your name">
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" placeholder="Your Email" class="form-control contact-control" name="email" required data-error="Please enter your Email">
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                      <label for="email" class="sr-only">Subject</label>
                      <input type="text" placeholder="Subject" class="form-control contact-control" name="subject" required data-error="Please enter Email Subject">
                      <div class="help-block with-errors"></div>
                  </div>

              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="message" class="sr-only">Message</label>
                  <textarea placeholder="Your Message" rows="7" class="form-control" name="message" required data-error="Write your message"></textarea>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
            </div>
            <div class="form-group col-xs-12">
              <button class="btn btn-common btn-lg btn-block" name="submit" type="submit"><i class="fa fa-envelope"></i> Submit</button>
            </div>
          </form>
          </div>

          <div class="col-md-4 clearfix wow bounceInRight" data-wow-delay="0.4s">
            <div id="google-map-contact2"></div>
            <div class="contact-info2 mt-30">
              <h1 class="small-title">Contact Info</h1>
              <ul class="contact-info2">
                <li>
                  <p class="contact-enlarge"><strong><i class="fa fa-map-marker"></i></strong> 206, Igbosere Street, Obalende Lagos Nigeria.</p>
                </li>
                <li>
                  <p class="contact-enlarge"><strong><i class="fa fa-envelope"></i> Mail us:</strong> <a href="#">support@edtel.com.ng</a></p>
                </li>
                <li>
                  <p class="contact-enlarge"><strong><i class="fa fa-phone"></i> Phone:</strong> +234 703 506 5479</p>
                </li>
<!--                <li>-->
<!--                  <p><strong><i class="fa fa-print"></i> Fax:</strong> +313-555-4015</p>-->
<!--                </li>-->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>