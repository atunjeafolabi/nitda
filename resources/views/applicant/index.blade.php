@extends("layouts.app")

@section("content")
    <!--Home Page Banner-->
    <section class="job-form-section job-form-section--image">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="job-form-box">
              <h2 class="heading text-shadow"><span class="accent">APPLICATION</span> PORTAL</h2>
              <h4>NATIONAL INFORMATION TECHNOLOGY DEVELOPMENT AGENCY</h4>
              <h5 class='center'>Search Jobs</h5>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container">
        <h3 class="heading">AVAILABLE <span class="accent">JOBS</span></h3>
        <div class="job-listing job-listing--featured ">
          <div class="row">
            <div class="col-md-12 col-lg-6">
              <div class="row">
                <div class="col-2"><img src="{{asset("assets/vendor/img/company-1.png")}}" alt="LoremIpsum " class="img-fluid"></div>
                <div class="col-10">
                  <h4 class="job__title"><a href="detail.html">Webdesigner</a></h4>
                  <p class="job__company">

                    LoremIpsum
                  </p>
                </div>
              </div>
            </div>
            <div class="col-10 col-md-3 col-lg-2 ml-auto"><i class="fa fa-map-marker job__location"></i>San Francisco</div>
            <div class="col-10 col-md-3 col-lg-3 ml-auto">
              <p>Posted 5 days ago</p>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-1">
              <div class="job__star"><a href="#" data-toggle="tooltip" data-placement="top" title="Save to favourites" class="job__star__link"><i class="fa fa-star"></i></a></div>
            </div>
          </div>
        </div>
        <div class="job-listing  ">
          <div class="row">
            <div class="col-md-12 col-lg-6">
              <div class="row">
                <div class="col-2"><img src="../../../d19m59y37dris4.cloudfront.net/jobs/2-0-1/img/company-3.png" alt="Bootstrapious " class="img-fluid"></div>
                <div class="col-10">
                  <h4 class="job__title"><a href="detail.html">Front End developer</a></h4>
                  <p class="job__company">

                    Bootstrapious
                  </p>
                </div>
              </div>
            </div>
            <div class="col-10 col-md-3 col-lg-2 ml-auto"><i class="fa fa-map-marker job__location"></i>Palo Alto</div>
            <div class="col-10 col-md-3 col-lg-3 ml-auto">
              <p>Posted 10 days ago</p>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-1">
              <div class="job__star"><a href="#" data-toggle="tooltip" data-placement="top" title="Save to favourites" class="job__star__link"><i class="fa fa-star"></i></a></div>
            </div>
          </div>
        </div>
        <div class="job-listing  job-listing--last">
          <div class="row">
            <div class="col-md-12 col-lg-6">
              <div class="row">
                <div class="col-2"><img src="../../../d19m59y37dris4.cloudfront.net/jobs/2-0-1/img/company-4.png" alt="ShareBoardd " class="img-fluid"></div>
                <div class="col-10">
                  <h4 class="job__title"><a href="detail.html">Team Leader</a></h4>
                  <p class="job__company">

                    ShareBoardd
                  </p>
                </div>
              </div>
            </div>
            <div class="col-10 col-md-3 col-lg-2 ml-auto"><i class="fa fa-map-marker job__location"></i>Palo Alto</div>
            <div class="col-10 col-md-3 col-lg-3 ml-auto">
              <p>Posted 10 days ago</p>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-1">
              <div class="job__star"><a href="#" data-toggle="tooltip" data-placement="top" title="Save to favourites" class="job__star__link"><i class="fa fa-star"></i></a></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="bg-light-gray">
      <div class="container">
        <h3 class="heading">JOB CATEGORIES</h3>
        <div class="row featured align-items-stretch">
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="box-image-text bg-visible full-height">
              <div class="top"><a href="detail.html">
                  <div class="image"><img src="../../../d19m59y37dris4.cloudfront.net/jobs/2-0-1/img/featured1.jpg" alt="" class="img-fluid"></div>
                  <div class="bg"></div>
                  <div class="logo"><img src="../../../d19m59y37dris4.cloudfront.net/jobs/2-0-1/img/company-1.png" alt="" style="max-width: 80px;"></div></a></div>
              <div class="content">
                <h5><a href="detail.html">Graduate Trainee</a></h5>
                <p class="featured__details"><span class="badge featured-badge badge-success">0-2 Years Work Experience</span></p>
                <p>
                    0-2 Years Work Experience
                    University Graduate(B.Sc, M.Sc)
                    NYSC must have been completed
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="box-image-text bg-visible full-height">
              <div class="top"><a href="detail.html">
                  <div class="image"><img src="../../../d19m59y37dris4.cloudfront.net/jobs/2-0-1/img/featured2.jpg" alt="" class="img-fluid"></div>
                  <div class="bg"></div>
                  <div class="logo"><img src="../../../d19m59y37dris4.cloudfront.net/jobs/2-0-1/img/company-3.png" alt="" style="max-width: 80px;"></div></a></div>
              <div class="content">
                <h5><a href="detail.html">Experienced Hire</a></h5>
                <p class="featured__details"><span class="badge featured-badge badge-success">4-6 Years Work Experience</span></p>
                <p>
                    4-6 Years Work Experience
                    University Graduate(B.Sc, M.Sc)
                    NYSC must have been completed
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="box-image-text bg-visible full-height">
              <div class="top"><a href="detail.html">
                  <div class="image"><img src="../../../d19m59y37dris4.cloudfront.net/jobs/2-0-1/img/featured3.jpg" alt="" class="img-fluid"></div>
                  <div class="bg"></div>
                  <div class="logo"><img src="../../../d19m59y37dris4.cloudfront.net/jobs/2-0-1/img/company-2.png" alt="" style="max-width: 80px;"></div></a></div>
              <div class="content">
                <h5><a href="detail.html">Other Job Openings</a></h5>
                <p class="featured__details"><span class="badge featured-badge badge-dark">Others</span></p>
                <p>
                    Search and apply for other available job openings in NITDA
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection