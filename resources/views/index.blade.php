@extends("layouts.app")

@section("content")
    <!--Home Page Banner-->
    <section class="job-form-section job-form-section--image">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="job-form-box">
              <h2 class="heading"><span class="accent">APPLICATION</span> PORTAL</h2>
              <h3>NATIONAL INFORMATION TECHNOLOGY DEVELOPMENT AGENCY</h3>
              <h5 class='center'>Search Jobs</h5>
              <form id="job-main-form" method="get" action="#" class="job-main-form">
                <div class="controls">
                  <div class="row align-items-center">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label for="profession">Profession</label>
                        <input type="text" id="profession" name="profession" placeholder="Profession you are looking for" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" id="location" name="location" placeholder="Any particular location?" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <button type="submit" name="submit" class="btn btn-outline-white-primary job-main-form__button"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </form>
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
        <div class="pages">
          <p class="load-more"><a href="#" class="mb-4 btn btn-outline-white-primary"><i class="fa fa-chevron-down"> </i>Load more</a></p>
          <nav aria-label="Page navigation example" class="d-flex justify-content-center mt-4 mb-4">
            <ul class="pagination">
              <li class="page-item"><a href="#" aria-label="Previous" class="page-link"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>
              <li class="page-item active"><a href="#" class="page-link">1</a></li>
              <li class="page-item"><a href="#" class="page-link">2</a></li>
              <li class="page-item"><a href="#" class="page-link">3</a></li>
              <li class="page-item"><a href="#" class="page-link">4</a></li>
              <li class="page-item"><a href="#" aria-label="Next" class="page-link"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>
            </ul>
          </nav>
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