<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact Us <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-0 bread">Contact Us</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section bg-light">
      <div class="container">
          <div class="row justify-content-center">
                  <div class="col-md-12">
                      <div class="wrapper">
                          <div class="row no-gutters">
                              <div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
                                  <div class="contact-wrap w-100 p-md-5 p-4">
                                      <h3 class="mb-4">Get in touch</h3>
                                      <div id="form-message-warning" class="mb-4"></div>
                                <div id="form-message-success" class="mb-4">
                              Your message was sent, thank you!
                                </div>
                                      <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label class="label" for="name">Full Name</label>
                                                      <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label class="label" for="email">Email Address</label>
                                                      <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                                  </div>
                                              </div>
                                              <div class="col-md-12">
                                                  <div class="form-group">
                                                      <label class="label" for="subject">Subject</label>
                                                      <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                                  </div>
                                              </div>
                                              <div class="col-md-12">
                                                  <div class="form-group">
                                                      <label class="label" for="#">Message</label>
                                                      <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
                                                  </div>
                                              </div>
                                              <div class="col-md-12">
                                                  <div class="form-group">
                                                      <input type="submit" value="Send Message" class="btn btn-primary">
                                                      <div class="submitting"></div>
                                                  </div>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                              <div class="col-lg-4 col-md-5 d-flex align-items-stretch">
                                  <div class="info-wrap bg-primary w-100 p-md-5 p-4">
                                      <h3>Let's get in touch</h3>
                                      <p class="mb-4">We're open for any suggestion or just to have a chat</p>
                              <div class="dbox w-100 d-flex align-items-start">
                                  <div class="icon d-flex align-items-center justify-content-center">
                                      <span class="fa fa-map-marker"></span>
                                  </div>
                                  <div class="text pl-3">
                                  <p><span>Address:</span> Uttara Sector 10 , Uttara ,Dhaka</p>
                                </div>
                            </div>
                              <div class="dbox w-100 d-flex align-items-center">
                                  <div class="icon d-flex align-items-center justify-content-center">
                                      <span class="fa fa-phone"></span>
                                  </div>
                                  <div class="text pl-3">
                                  <p><span>Phone:</span> <a href="tel://1234567920">+8801776718178</a></p>
                                </div>
                            </div>
                              <div class="dbox w-100 d-flex align-items-center">
                                  <div class="icon d-flex align-items-center justify-content-center">
                                      <span class="fa fa-paper-plane"></span>
                                  </div>
                                  <div class="text pl-3">
                                  <p><span>Email:</span> <a href="mailto:info@yoursite.com">zidankhan718@gmail.com</a></p>
                                </div>
                            </div>
                              <div class="dbox w-100 d-flex align-items-center">
                                  <div class="icon d-flex align-items-center justify-content-center">
                                      <span class="fa fa-globe"></span>
                                  </div>
                                  <div class="text pl-3">
                                  <p><span>Website</span> <a href="#">Accounting.com</a></p>
                                </div>
                            </div>
                        </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
      </div><br><br><br>
  </section>

        <script>
        let contactForm = document.getElementById('contactForm')
        contactForm.addEventListener('submit',async(event)=>{
            event.preventDefault();

            let name=document.getElementById('name').value;
            let email = document.getElementById('email').value;
            let subject = document.getElementById('subject').value;
            let message = document.getElementById('message').value;

            if(name.length === 0){
                alert('Name feild is required');
            }else if(email.length === 0){
            alert('Email feild is required')
            }else if(subject.length === 0){
                alert('Subject feild is required')
            }else if (message.length === 0){
                alert('Please write something as message')
            }else{

                let formData ={
                    name:name,
                    email:email,
                    subject:subject,
                    message:message
                }
                let URL = "/contactStore";
                let result = await axios.post(URL,formData);
                contactForm.reset()
                successToast('Message sent succesfully')
            }
        })
        </script>




