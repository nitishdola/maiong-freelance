@extends('ui.maiong_ui.main')


@section('main_content')

<div class="row">
   <div class="col-sm-3 page-sidebar mobile-filter-sidebar">
      <aside>
         <div class="inner-box">
            <div class=" list-filter">
               <h5 class="list-title"><strong><a href="#"> Date Posted </a></strong></h5>
               <div class="filter-date filter-content">
                  <ul>
                     <li>
                        <input type="radio" value="1" id="posted_1" name="posted">
                        <label for="posted_1">24 hours</label>
                     </li>
                     <li>
                        <input type="radio" value="3" id="posted_3" name="posted">
                        <label for="posted_3">3 days</label>
                     </li>
                     <li>
                        <input type="radio" value="7" id="posted_7" name="posted">
                        <label for="posted_7">7 days</label>
                     </li>
                     <li>
                        <input type="radio" checked="checked" value="30" id="posted_30" name="posted">
                        <label for="posted_30">30 days</label>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="list-filter">
               <h5 class="list-title"><strong><a href="#">Employment Type</a></strong></h5>
               <div class="filter-content filter-employment-type">
                  <ul class="browse-list list-unstyled">
                     <li>
                        <input type="checkbox" id="employment_all" value="all" class="emp" checked="checked">
                        <label for="employment_all">All</label>
                     </li>
                     <li>
                        <input type="checkbox" id="employment_jtft" value="jtft" class="emp emp-type">
                        <label for="employment_jtft">Full Time</label>
                     </li>
                     <li>
                        <input type="checkbox" id="employment_jtpt" value="jtpt" class="emp emp-type">
                        <label for="employment_jtpt">Part Time</label>
                     </li>
                     <li>
                        <input type="checkbox" id="employment_jtct" value="jtct" class="emp emp-type">
                        <label for="employment_jtct">Contractor</label>
                     </li>
                     <li>
                        <input type="checkbox" id="employment_jtin" value="jtin" class="emp emp-type">
                        <label for="employment_jtin">Intern</label>
                     </li>
                     <li>
                        <input type="checkbox" id="employment_jtse" value="jtse" class="emp emp-type">
                        <label for="employment_jtse">Seasonal / Temp</label>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="  list-filter">
               <h5 class="list-title"><strong><a href="#">Salary Pay Range</a></strong></h5>
               <div class="filter-salary filter-content ">
                  <form role="form" class="form-inline ">
                     <div class="form-group col-sm-4 no-padding">
                        <input type="text" placeholder="$ 2000 " id="minPrice" class="form-control">
                     </div>
                     <div class="form-group col-sm-1 no-padding text-center hidden-xs"> -</div>
                     <div class="form-group col-sm-4 no-padding">
                        <input type="text" placeholder="$ 3000 " id="maxPrice" class="form-control">
                     </div>
                     <div class="form-group col-sm-3 no-padding">
                        <button class="btn btn-default pull-right btn-block-xs" type="submit">GO
                        </button>
                     </div>
                  </form>
                  <div class="clearfix"></div>
                  <ul class="mt15">
                     <li>
                        <input type="radio" name="pay" id="pay_0" value="0" checked="checked">
                        <label for="pay_0">Any</label>
                     </li>
                     <li>
                        <input type="radio" name="pay" id="pay_20" value="20">
                        <label for="pay_20">$20,000+</label>
                     </li>
                     <li>
                        <input type="radio" name="pay" id="pay_40" value="40">
                        <label for="pay_40">$40,000+</label>
                     </li>
                     <li>
                        <input type="radio" name="pay" id="pay_60" value="60">
                        <label for="pay_60">$60,000+</label>
                     </li>
                     <li>
                        <input type="radio" name="pay" id="pay_80" value="80">
                        <label for="pay_80">$80,000+</label>
                     </li>
                     <li>
                        <input type="radio" name="pay" id="pay_100" value="100">
                        <label for="pay_100">$100,000+</label>
                     </li>
                     <li>
                        <input type="radio" name="pay" id="pay_120" value="120">
                        <label for="pay_120">$120,000+</label>
                     </li>
                  </ul>
               </div>
               <div style="clear:both"></div>
            </div>
            <div class="locations-list  list-filter">
               <h5 class="list-title"><strong><a href="#">Specialisms</a></strong></h5>
               <ul class="browse-list list-unstyled long-list">
                  <li><a href="job-list.html">Engineering jobs <span class="count">12,578</span> </a></li>
                  <li><a href="job-list.html">Estate Agency jobs <span class="count">4,546</span> </a></li>
                  <li><a href="job-list.html">Financial Services jobs <span class="count">9,115</span></a></li>
                  <li><a href="job-list.html">Banking jobs <span class="count">1,468</span></a></li>
                  <li><a href="job-list.html">Security &amp; Safety jobs <span class="count">723</span></a></li>
                  <li><a href="job-list.html">Graduate jobs <span class="count">18,514</span></a></li>
                  <li><a href="job-list.html">Health &amp; Medicine jobs <span class="count">10,621</span></a></li>
                  <li><a href="job-list.html">Training jobs <span class="count">651</span></a></li>
                  <li><a href="job-list.html">Hospitality &amp; Catering jobs <span class="count">7,585</span></a></li>
                  <li><a href="job-list.html">Human Resources jobs <span class="count">3,768</span></a></li>
                  <li><a href="job-list.html">IT &amp; Telecoms jobs <span class="count">17,242</span></a></li>
                  <li><a href="job-list.html">IT Contractor jobs <span class="count">2,102</span></a></li>
               </ul>
            </div>
            <div class="locations-list  list-filter">
               <h5 class="list-title"><strong><a href="#">Location</a></strong></h5>
               <ul class="browse-list list-unstyled long-list">
                  <li><a href="job-list.html">New York</a></li>
                  <li><a href="job-list.html">South West</a></li>
                  <li><a href="job-list.html">South East</a></li>
                  <li><a href="job-list.html">East England</a></li>
                  <li><a href="job-list.html">East Midlands</a></li>
                  <li><a href="job-list.html">West Midlands</a></li>
                  <li><a href="job-list.html">North East</a></li>
                  <li><a href="job-list.html">North West</a></li>
                  <li><a href="job-list.html">Scotland</a></li>
                  <li><a href="job-list.html">Wales</a></li>
                  <li><a href="job-list.html">Northern Ireland</a></li>
                  <li><a href="job-list.html">England</a></li>
                  <li><a href="job-list.html">UK</a></li>
                  <li><a href="job-list.html"> Other Locations </a></li>
               </ul>
            </div>
            <div style="clear:both"></div>
         </div>
      </aside>
   </div>
   <div class="col-sm-9 page-content col-thin-left">
      <div class="category-list">
         <div class="tab-box clearfix ">
            <div class="col-lg-12  box-title no-border">
               <div class="inner">
                  <h2><span> Software </span> Engineer
                     <small> 1000+ Jobs Found</small>
                  </h2>
               </div>
            </div>
            <div class="mobile-filter-bar col-lg-12  ">
               <ul class="list-unstyled list-inline no-margin no-padding">
                  <li class="filter-toggle">
                     <a class="">
                     <i class="  icon-th-list"></i>
                     Filters
                     </a>
                  </li>
                  <li>
                     <div class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle"><i class="caret "></i>
                        Sort by </a>
                        <ul class="dropdown-menu">
                           <li><a href="#" rel="nofollow">Relevance</a></li>
                           <li><a href="#" rel="nofollow">Date</a></li>
                           <li><a href="#" rel="nofollow">Company</a></li>
                        </ul>
                     </div>
                  </li>
               </ul>
            </div>
            <div class="menu-overly-mask"></div>
            <div class="tab-filter hide-xs">
               <select class="selectpicker select-sort-by" data-style="btn-select" data-width="auto">
                  <option value="Sort by ">Sort by </option>
                  <option value="Relevance">Relevance</option>
                  <option value="Company">Company</option>
               </select>
            </div>
         </div>
         <div class="listing-filter hidden-xs">
            <div class="pull-left col-sm-6 col-xs-12">
               <div class="breadcrumb-list text-center-xs">
                  <a class="jobs-s-tag" rel="nofollow" title="Software Architect">Software
                  Engineer </a>
                  in <a rel="nofollow" class="jobs-s-tag"> New York</a>
               </div>
            </div>
            <div class="pull-right col-sm-6 col-xs-12 text-right text-center-xs listing-view-action">
               <a class="clear-all-button text-muted">Clear all</a>
            </div>
            <div style="clear:both"></div>
         </div>
         <div class="adds-wrapper jobs-list">
            <div class="item-list job-item">
               <div class="col-sm-1  col-xs-2 no-padding photobox">
                  <div class="add-image"><a href="#"><img class="thumbnail no-margin" src="images/jobs/company-logos/1.jpg" alt="company logo"></a></div>
               </div>
               <div class="col-sm-10  col-xs-10  add-desc-box">
                  <div class="add-details jobs-item">
                     <h5 class="company-title "><a href="#">CO Engineering</a></h5>
                     <h4 class="job-title"><a href="job-details.html"> Front-end Developer </a></h4>
                     <span class="info-row"> <span class="item-location"><i class="fa fa-map-marker"></i> New York, NY </span> <span class="date"><i class=" icon-clock"> </i>Full-time</span><span class=" salary"> <i class=" icon-money"> </i> $50000 - $81000 a year</span></span>
                     <div class="jobs-desc">
                        A Web Tester / Developer with experience in PHP, HTML, CSS and
                        JavaScript is needed to join a global music services company.
                     </div>
                     <div class="job-actions">
                        <ul class="list-unstyled list-inline">
                           <li>
                              <a href="#" class="save-job">
                              <span class="fa fa-star-o"></span>
                              Save Job
                              </a>
                           </li>
                           <li class="saved-job hide">
                              <a class="saved-job" href="#">
                              <span class="fa fa-star"></span>
                              Saved Job
                              </a>
                           </li>
                           <li>
                              <a class="email-job" href="#">
                              <i class="fa fa-envelope"></i>
                              Email Job
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="item-list job-item">
               <div class="col-sm-1  col-xs-2 no-padding photobox">
                  <div class="add-image"><a href="#"><img class="thumbnail no-margin" src="images/jobs/company-logos/2.jpg" alt="company logo"></a></div>
               </div>
               <div class="col-sm-10  col-xs-10  add-desc-box">
                  <div class="add-details jobs-item">
                     <h5 class="company-title "><a href="#">XIAO Co.</a></h5>
                     <h4 class="job-title"><a href="job-details.html">UI/UX Front-End Web
                        Developer </a>
                     </h4>
                     <span class="info-row"> <span class="item-location"><i class="fa fa-map-marker"></i> New York, NY </span> <span class="date"><i class=" icon-clock"> </i>Full-time</span><span class=" salary"> <i class=" icon-money"> </i> $10000 - $23000 a year</span></span>
                     <div class="jobs-desc"> We are seeking a talented UI/UX Front End Web Developer
                        to design, develop, support web app software. UI/UX Front-End Web
                        Developer....
                     </div>
                     <div class="job-actions">
                        <ul class="list-unstyled list-inline">
                           <li>
                              <a href="#" class="save-job">
                              <span class="fa fa-star-o"></span>
                              Save Job
                              </a>
                           </li>
                           <li class="saved-job hide">
                              <a class="saved-job" href="#">
                              <span class="fa fa-star"></span>
                              Saved Job
                              </a>
                           </li>
                           <li>
                              <a class="email-job" href="#">
                              <i class="fa fa-envelope"></i>
                              Email Job
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="item-list job-item">
               <div class="col-sm-1  col-xs-2 no-padding photobox">
                  <div class="add-image"><a href="#"><img class="thumbnail no-margin" src="images/jobs/company-logos/23.jpg" alt="company logo"></a></div>
               </div>
               <div class="col-sm-10  col-xs-10  add-desc-box">
                  <div class="add-details jobs-item">
                     <h5 class="company-title "><a href="#">Thatherton Fuels</a></h5>
                     <h4 class="job-title"><a href="job-details.html">Javascript Developer</a></h4>
                     <span class="info-row"> <span class="item-location"><i class="fa fa-map-marker"></i> New York, NY </span> <span class="date"><i class=" icon-clock"> </i>Contract </span><span class=" salary"> <i class=" icon-money"> </i>$50.00 - $60.00 / Hr</span></span>
                     <div class="jobs-desc">You’re obsessed with creating scalable applications using
                        Java. 5+ years of professional coding experience with Java. PKI and Security
                        Software....
                     </div>
                     <div class="job-actions">
                        <ul class="list-unstyled list-inline">
                           <li>
                              <a href="#" class="save-job">
                              <span class="fa fa-star-o"></span>
                              Save Job
                              </a>
                           </li>
                           <li class="saved-job hide">
                              <a class="saved-job" href="#">
                              <span class="fa fa-star"></span>
                              Saved Job
                              </a>
                           </li>
                           <li>
                              <a class="email-job" href="#">
                              <i class="fa fa-envelope"></i>
                              Email Job
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="item-list job-item">
               <div class="col-sm-1  col-xs-2 no-padding photobox">
                  <div class="add-image"><a href="#"><img class="thumbnail no-margin" src="images/jobs/company-logos/4.jpg" alt="company logo"></a></div>
               </div>
               <div class="col-sm-10  col-xs-10  add-desc-box">
                  <div class="add-details jobs-item">
                     <h5 class="company-title "><a href="#">Praxis corporation</a></h5>
                     <h4 class="job-title"><a href="job-details.html">Web Developer Jr. - Front
                        End</a>
                     </h4>
                     <span class="info-row"> <span class="item-location"><i class="fa fa-map-marker"></i> Barrington, IL</span> <span class="date"><i class=" icon-clock"> </i>Full-time</span><span class=" salary"> <i class=" icon-money"> </i> $20000 - $41000 a year</span></span>
                     <div class="jobs-desc"> Our developers work out of our offices in New York,
                        Washington DC, Los Angeles, Oakland, Boston, and London. We're looking for a
                        front-end web developer to join...
                     </div>
                     <div class="job-actions">
                        <ul class="list-unstyled list-inline">
                           <li>
                              <a href="#" class="save-job">
                              <span class="fa fa-star-o"></span>
                              Save Job
                              </a>
                           </li>
                           <li class="saved-job hide">
                              <a class="saved-job" href="#">
                              <span class="fa fa-star"></span>
                              Saved Job
                              </a>
                           </li>
                           <li>
                              <a class="email-job" href="#">
                              <i class="fa fa-envelope"></i>
                              Email Job
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="item-list job-item">
               <div class="col-sm-1  col-xs-2 no-padding photobox">
                  <div class="add-image"><a href="#"><img class="thumbnail no-margin" src="images/jobs/company-logos/5.jpg" alt="company logo"></a></div>
               </div>
               <div class="col-sm-10  col-xs-10  add-desc-box">
                  <div class="add-details jobs-item">
                     <h5 class="company-title "><a href="#">Bluth Company</a></h5>
                     <h4 class="job-title"><a href="job-details.html">UI/Web Developer</a></h4>
                     <span class="info-row"> <span class="item-location"><i class="fa fa-map-marker"></i> New York, NY </span> <span class="date"><i class=" icon-clock"> </i>Full-time</span><span class=" salary"> <i class=" icon-money"> </i> $50000 - $70000 a year</span></span>
                     <div class="jobs-desc"> Delivering a complete front end application. We are
                        looking for an AngularJS/Web Developer responsible for the client side of
                        our service....
                     </div>
                     <div class="job-actions">
                        <ul class="list-unstyled list-inline">
                           <li>
                              <a href="#" class="save-job">
                              <span class="fa fa-star-o"></span>
                              Save Job
                              </a>
                           </li>
                           <li class="saved-job hide">
                              <a class="saved-job" href="#">
                              <span class="fa fa-star"></span>
                              Saved Job
                              </a>
                           </li>
                           <li>
                              <a class="email-job" href="#">
                              <i class="fa fa-envelope"></i>
                              Email Job
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="item-list job-item">
               <div class="col-sm-1  col-xs-2 no-padding photobox">
                  <div class="add-image"><a href="#"><img class="thumbnail no-margin" src="images/jobs/company-logos/17.jpg" alt="company logo"></a></div>
               </div>
               <div class="col-sm-10  col-xs-10  add-desc-box">
                  <div class="add-details jobs-item">
                     <h5 class="company-title "><a href="#">Data Systems Ltd.</a></h5>
                     <h4 class="job-title"><a href="job-details.html">Full Stack Engineer,
                        International</a>
                     </h4>
                     <span class="info-row"> <span class="item-location"><i class="fa fa-map-marker"></i> Mountain View, OR</span> <span class="date"><i class=" icon-clock"> </i>Full-time</span><span class=" salary"> <i class=" icon-money"> </i> $30000 - $51000 a year</span></span>
                     <div class="jobs-desc"> You believe in the transformative power education brings
                        to people's lives, and know how to create the code that will further
                        opportunities for these lifelong...
                     </div>
                     <div class="job-actions">
                        <ul class="list-unstyled list-inline">
                           <li>
                              <a href="#" class="save-job">
                              <span class="fa fa-star-o"></span>
                              Save Job
                              </a>
                           </li>
                           <li class="saved-job hide">
                              <a class="saved-job" href="#">
                              <span class="fa fa-star"></span>
                              Saved Job
                              </a>
                           </li>
                           <li>
                              <a class="email-job" href="#">
                              <i class="fa fa-envelope"></i>
                              Email Job
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="item-list job-item">
               <div class="col-sm-1  col-xs-2 no-padding photobox">
                  <div class="add-image"><a href="#"><img class="thumbnail no-margin" src="images/jobs/company-logos/14.jpg" alt="company logo"></a></div>
               </div>
               <div class="col-sm-10  col-xs-10  add-desc-box">
                  <div class="add-details jobs-item">
                     <h5 class="company-title "><a href="#">Videlectrix Ltd.</a></h5>
                     <h4 class="job-title"><a href="job-details.html">Java Engineer </a></h4>
                     <span class="info-row"> <span class="item-location"><i class="fa fa-map-marker"></i> San Francisco </span> <span class="date"><i class=" icon-clock"> </i>Full-time</span><span class=" salary"> <i class=" icon-money"> </i> $30000 - $51000 a year</span></span>
                     <div class="jobs-desc"> Java C/C++, Python. 5+ years of backend software
                        development experience. Projects include real time data synchronization,
                        identity management, large...
                     </div>
                     <div class="job-actions">
                        <ul class="list-unstyled list-inline">
                           <li>
                              <a href="#" class="save-job">
                              <span class="fa fa-star-o"></span>
                              Save Job
                              </a>
                           </li>
                           <li class="saved-job hide">
                              <a class="saved-job" href="#">
                              <span class="fa fa-star"></span>
                              Saved Job
                              </a>
                           </li>
                           <li>
                              <a class="email-job" href="#">
                              <i class="fa fa-envelope"></i>
                              Email Job
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="tab-box  save-search-bar text-center"><a href="#"> <i class=" icon-star-empty"></i>
            Save Search </a>
         </div>
      </div>
      <div class="pagination-bar text-center">
         <ul class="pagination">
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#"> ...</a></li>
            <li><a class="pagination-btn" href="#">Next &raquo;</a></li>
         </ul>
      </div>
      <div class="post-promo text-center">
         <h2> Looking for a job? </h2>
         <h5> Upload your CV and easily apply to jobs from any device! </h5>
         <a href="#" class="btn btn-lg btn-border btn-post btn-danger">Upload your CV </a>
      </div>
   </div>
</div>
</div>
</div>
<footer class="main-footer">
   <div class="footer-content">
      <div class="container">
         <div class="row">
            <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-6 ">
               <div class="footer-col">
                  <h4 class="footer-title">About us</h4>
                  <ul class="list-unstyled footer-nav">
                     <li><a href="#">About Company</a></li>
                     <li><a href="#">For Business</a></li>
                     <li><a href="#">Our Partners</a></li>
                     <li><a href="#">Press Contact</a></li>
                     <li><a href="#">Careers</a></li>
                  </ul>
               </div>
            </div>
            <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-6 ">
               <div class="footer-col">
                  <h4 class="footer-title">Help & Contact</h4>
                  <ul class="list-unstyled footer-nav">
                     <li><a href="#">
                        Stay Safe Online
                        </a>
                     </li>
                     <li><a href="#">
                        How to Sell</a>
                     </li>
                     <li><a href="#">
                        How to Buy
                        </a>
                     </li>
                     <li><a href="#">Posting Rules
                        </a>
                     </li>
                     <li><a href="#">
                        Promote Your Ad
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-6 ">
               <div class="footer-col">
                  <h4 class="footer-title">More From Us</h4>
                  <ul class="list-unstyled footer-nav">
                     <li><a href="faq.html">FAQ
                        </a>
                     </li>
                     <li><a href="blogs.html">Blog
                        </a>
                     </li>
                     <li><a href="#">
                        Popular Searches
                        </a>
                     </li>
                     <li><a href="#"> Site Map
                        </a>
                     </li>
                     <li><a href="#"> Customer Reviews
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-6 ">
               <div class="footer-col">
                  <h4 class="footer-title">Account</h4>
                  <ul class="list-unstyled footer-nav">
                     <li><a href="account-home.html"> Manage Account
                        </a>
                     </li>
                     <li><a href="login.html">Login
                        </a>
                     </li>
                     <li><a href="signup.html">Register
                        </a>
                     </li>
                     <li><a href="account-myads.html"> My ads
                        </a>
                     </li>
                     <li><a href="seller-profile.html"> Profile
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12">
               <div class="footer-col row">
                  <div class="col-sm-12 col-xs-6 col-xxs-12 no-padding-lg">
                     <div class="mobile-app-content">
                        <h4 class="footer-title">Mobile Apps</h4>
                        <div class="row ">
                           <div class="col-xs-12 col-sm-6 ">
                              <a class="app-icon" target="_blank" href="https://itunes.apple.com/">
                              <span class="hide-visually">iOS app</span>
                              <img src="images/site/app_store_badge.svg" alt="Available on the App Store">
                              </a>
                           </div>
                           <div class="col-xs-12 col-sm-6 ">
                              <a class="app-icon" target="_blank" href="https://play.google.com/store/">
                              <span class="hide-visually">Android App</span>
                              <img src="images/site/google-play-badge.svg" alt="Available on the App Store">
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12 col-xs-6 col-xxs-12 no-padding-lg">
                     <div class="hero-subscribe">
                        <h4 class="footer-title no-margin">Follow us on</h4>
                        <ul class="list-unstyled list-inline footer-nav social-list-footer social-list-color footer-nav-inline">
                           <li><a class="icon-color fb" title="Facebook" data-placement="top" data-toggle="tooltip" href="#"><i class="fa fa-facebook"></i> </a></li>
                           <li><a class="icon-color tw" title="Twitter" data-placement="top" data-toggle="tooltip" href="#"><i class="fa fa-twitter"></i> </a></li>
                           <li><a class="icon-color gp" title="Google+" data-placement="top" data-toggle="tooltip" href="#"><i class="fa fa-google-plus"></i> </a></li>
                           <li><a class="icon-color lin" title="Linkedin" data-placement="top" data-toggle="tooltip" href="#"><i class="fa fa-linkedin"></i> </a></li>
                           <li><a class="icon-color pin" title="Linkedin" data-placement="top" data-toggle="tooltip" href="#"><i class="fa fa-pinterest-p"></i> </a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div style="clear: both"></div>
            <div class="col-lg-12">
               <div class=" text-center paymanet-method-logo">
                  <img src="images/site/payment/master_card.png" alt="img">
                  <img alt="img" src="images/site/payment/visa_card.png">
                  <img alt="img" src="images/site/payment/paypal.png">
                  <img alt="img" src="images/site/payment/american_express_card.png"> <img alt="img" src="images/site/payment/discover_network_card.png">
                  <img alt="img" src="images/site/payment/google_wallet.png">
               </div>
               <div class="copy-info text-center">
                  &copy; 2017 BootClassified. All Rights Reserved.
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>
</div>
<div class="modal fade modalHasList" id="select-country" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title uppercase font-weight-bold" id="exampleModalLabel"><i class=" icon-map"></i> Select your region </h4>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="row" style="padding: 0 20px">
                  <ul class="cat-list col-sm-3 col-xs-6 ">
                     <li>
                        <span class="flag-icon flag-icon-af"> </span>
                        <a href="#AF">
                        Afghanistan
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-al"> </span>
                        <a href="#AL">
                        Albania
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-dz"> </span>
                        <a href="#DZ">
                        Algeria
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ad"> </span>
                        <a href="#AD">
                        Andorra
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ao"> </span>
                        <a href="#AO">
                        Angola
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ar"> </span>
                        <a href="#AR">
                        Argentina
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-am"> </span>
                        <a href="#AM">
                        Armenia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-au"> </span>
                        <a href="#AU">
                        Australia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-at"> </span>
                        <a href="#AT">
                        Austria
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-az"> </span>
                        <a href="#AZ">
                        Azerbaijan
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-bs"> </span>
                        <a href="#BS">
                        Bahamas
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-bh"> </span>
                        <a href="#BH">
                        Bahrain
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-bd"> </span>
                        <a href="#BD">
                        Bangladesh
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-by"> </span>
                        <a href="#BY">
                        Belarus
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-be"> </span>
                        <a href="#BE">
                        Belgium
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-bz"> </span>
                        <a href="#BZ">
                        Belize
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-bj"> </span>
                        <a href="#BJ">
                        Benin
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-bo"> </span>
                        <a href="#BO">
                        Bolivia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ba"> </span>
                        <a href="#BA">
                        Bosnia and Herzegovina
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-bw"> </span>
                        <a href="#BW">
                        Botswana
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-br"> </span>
                        <a href="#BR">
                        Brazil
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-bn"> </span>
                        <a href="#BN">
                        Brunei
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-bg"> </span>
                        <a href="#BG">
                        Bulgaria
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-bf"> </span>
                        <a href="#BF">
                        Burkina Faso
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-bi"> </span>
                        <a href="#BI">
                        Burundi
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-kh"> </span>
                        <a href="#KH">
                        Cambodia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-cm"> </span>
                        <a href="#CM">
                        Cameroon
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ca"> </span>
                        <a href="#CA">
                        Canada
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-cv"> </span>
                        <a href="#CV">
                        Cape Verde
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-cf"> </span>
                        <a href="#CF">
                        Central African Republic
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-td"> </span>
                        <a href="#TD">
                        Chad
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-cl"> </span>
                        <a href="#CL">
                        Chile
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-cn"> </span>
                        <a href="#CN">
                        China
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-co"> </span>
                        <a href="#CO">
                        Colombia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-km"> </span>
                        <a href="#KM">
                        Comoros
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-cg"> </span>
                        <a href="#CG">
                        Congo - Brazzaville
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-cd"> </span>
                        <a href="#CD">
                        Congo - Kinshasa
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-cr"> </span>
                        <a href="#CR">
                        Costa Rica
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-hr"> </span>
                        <a href="#HR">
                        Croatia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-cu"> </span>
                        <a href="#CU">
                        Cuba
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-cy"> </span>
                        <a href="#CY">
                        Cyprus
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-cz"> </span>
                        <a href="#CZ">
                        Czech Republic
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ci"> </span>
                        <a href="#CI">
                        Côte d’Ivoire
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-dk"> </span>
                        <a href="#DK">
                        Denmark
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-dj"> </span>
                        <a href="#DJ">
                        Djibouti
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-dm"> </span>
                        <a href="#DM">
                        Dominica
                        </a>
                     </li>
                  </ul>
                  <ul class="cat-list col-sm-3 col-xs-6 ">
                     <li>
                        <span class="flag-icon flag-icon-do"> </span>
                        <a href="#DO">
                        Dominican Republic
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ec"> </span>
                        <a href="#EC">
                        Ecuador
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-eg"> </span>
                        <a href="#EG">
                        Egypt
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-gq"> </span>
                        <a href="#GQ">
                        Equatorial Guinea
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-er"> </span>
                        <a href="#ER">
                        Eritrea
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ee"> </span>
                        <a href="#EE">
                        Estonia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-et"> </span>
                        <a href="#ET">
                        Ethiopia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-fj"> </span>
                        <a href="#FJ">
                        Fiji
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-fi"> </span>
                        <a href="#FI">
                        Finland
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-fr"> </span>
                        <a href="#FR">
                        France
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ga"> </span>
                        <a href="#GA">
                        Gabon
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-gm"> </span>
                        <a href="#GM">
                        Gambia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ge"> </span>
                        <a href="#GE">
                        Georgia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-de"> </span>
                        <a href="#DE">
                        Germany
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-gh"> </span>
                        <a href="#GH">
                        Ghana
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-gi"> </span>
                        <a href="#GI">
                        Gibraltar
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-gr"> </span>
                        <a href="#GR">
                        Greece
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-gl"> </span>
                        <a href="#GL">
                        Greenland
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-gd"> </span>
                        <a href="#GD">
                        Grenada
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-gp"> </span>
                        <a href="#GP">
                        Guadeloupe
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-gu"> </span>
                        <a href="#GU">
                        Guam
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-gt"> </span>
                        <a href="#GT">
                        Guatemala
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-gn"> </span>
                        <a href="#GN">
                        Guinea
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-gw"> </span>
                        <a href="#GW">
                        Guinea-Bissau
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-gy"> </span>
                        <a href="#GY">
                        Guyana
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ht"> </span>
                        <a href="#HT">
                        Haiti
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-hn"> </span>
                        <a href="#HN">
                        Honduras
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-hk"> </span>
                        <a href="#HK">
                        Hong Kong SAR China
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-hu"> </span>
                        <a href="#HU">
                        Hungary
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-is"> </span>
                        <a href="#IS">
                        Iceland
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-in"> </span>
                        <a href="#IN">
                        India
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-id"> </span>
                        <a href="#ID">
                        Indonesia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ir"> </span>
                        <a href="#IR">
                        Iran
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-iq"> </span>
                        <a href="#IQ">
                        Iraq
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ie"> </span>
                        <a href="#IE">
                        Ireland
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-il"> </span>
                        <a href="#IL">
                        Israel
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-it"> </span>
                        <a href="#IT">
                        Italy
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-jm"> </span>
                        <a href="#JM">
                        Jamaica
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-jp"> </span>
                        <a href="#JP">
                        Japan
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-jo"> </span>
                        <a href="#JO">
                        Jordan
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-kz"> </span>
                        <a href="#KZ">
                        Kazakhstan
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ke"> </span>
                        <a href="#KE">
                        Kenya
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ki"> </span>
                        <a href="#KI">
                        Kiribati
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-kw"> </span>
                        <a href="#KW">
                        Kuwait
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-kg"> </span>
                        <a href="#KG">
                        Kyrgyzstan
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-la"> </span>
                        <a href="#LA">
                        Laos
                        </a>
                     </li>
                  </ul>
                  <ul class="cat-list col-sm-3 col-xs-6 ">
                     <li>
                        <span class="flag-icon flag-icon-lv"> </span>
                        <a href="#LV">
                        Latvia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-lb"> </span>
                        <a href="#LB">
                        Lebanon
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ls"> </span>
                        <a href="#LS">
                        Lesotho
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-lr"> </span>
                        <a href="#LR">
                        Liberia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ly"> </span>
                        <a href="#LY">
                        Libya
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-li"> </span>
                        <a href="#LI">
                        Liechtenstein
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-lt"> </span>
                        <a href="#LT">
                        Lithuania
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-lu"> </span>
                        <a href="#LU">
                        Luxembourg
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-mk"> </span>
                        <a href="#MK">
                        Macedonia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-mg"> </span>
                        <a href="#MG">
                        Madagascar
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-mw"> </span>
                        <a href="#MW">
                        Malawi
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-my"> </span>
                        <a href="#MY">
                        Malaysia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-mv"> </span>
                        <a href="#MV">
                        Maldives
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ml"> </span>
                        <a href="#ML">
                        Mali
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-mt"> </span>
                        <a href="#MT">
                        Malta
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-mq"> </span>
                        <a href="#MQ">
                        Martinique
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-mr"> </span>
                        <a href="#MR">
                        Mauritania
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-mu"> </span>
                        <a href="#MU">
                        Mauritius
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-yt"> </span>
                        <a href="#YT">
                        Mayotte
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-mx"> </span>
                        <a href="#MX">
                        Mexico
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-fm"> </span>
                        <a href="#FM">
                        Micronesia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-md"> </span>
                        <a href="#MD">
                        Moldova
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-mc"> </span>
                        <a href="#MC">
                        Monaco
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-mn"> </span>
                        <a href="#MN">
                        Mongolia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-me"> </span>
                        <a href="#ME">
                        Montenegro
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ma"> </span>
                        <a href="#MA">
                        Morocco
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-mz"> </span>
                        <a href="#MZ">
                        Mozambique
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-mm"> </span>
                        <a href="#MM">
                        Myanmar [Burma]
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-na"> </span>
                        <a href="#NA">
                        Namibia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-np"> </span>
                        <a href="#NP">
                        Nepal
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-nl"> </span>
                        <a href="#NL">
                        Netherlands
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-nc"> </span>
                        <a href="#NC">
                        New Caledonia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-nz"> </span>
                        <a href="#NZ">
                        New Zealand
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ni"> </span>
                        <a href="#NI">
                        Nicaragua
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ne"> </span>
                        <a href="#NE">
                        Niger
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ng"> </span>
                        <a href="#NG">
                        Nigeria
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-kp"> </span>
                        <a href="#KP">
                        North Korea
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-no"> </span>
                        <a href="#NO">
                        Norway
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-om"> </span>
                        <a href="#OM">
                        Oman
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-pk"> </span>
                        <a href="#PK">
                        Pakistan
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ps"> </span>
                        <a href="#PS">
                        Palestinian Territories
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-pa"> </span>
                        <a href="#PA">
                        Panama
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-pg"> </span>
                        <a href="#PG">
                        Papua New Guinea
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-py"> </span>
                        <a href="#PY">
                        Paraguay
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-pe"> </span>
                        <a href="#PE">
                        Peru
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ph"> </span>
                        <a href="#PH">
                        Philippines
                        </a>
                     </li>
                  </ul>
                  <ul class="cat-list col-sm-3 col-xs-6 ">
                     <li>
                        <span class="flag-icon flag-icon-pl"> </span>
                        <a href="#PL">
                        Poland
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-pt"> </span>
                        <a href="#PT">
                        Portugal
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-pr"> </span>
                        <a href="#PR">
                        Puerto Rico
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-qa"> </span>
                        <a href="#QA">
                        Qatar
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ro"> </span>
                        <a href="#RO">
                        Romania
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ru"> </span>
                        <a href="#RU">
                        Russia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-rw"> </span>
                        <a href="#RW">
                        Rwanda
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-re"> </span>
                        <a href="#RE">
                        Réunion
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ws"> </span>
                        <a href="#WS">
                        Samoa
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-sa"> </span>
                        <a href="#SA">
                        Saudi Arabia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-sn"> </span>
                        <a href="#SN">
                        Senegal
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-rs"> </span>
                        <a href="#RS">
                        Serbia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-sl"> </span>
                        <a href="#SL">
                        Sierra Leone
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-sg"> </span>
                        <a href="#SG">
                        Singapore
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-sk"> </span>
                        <a href="#SK">
                        Slovakia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-si"> </span>
                        <a href="#SI">
                        Slovenia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-so"> </span>
                        <a href="#SO">
                        Somalia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-za"> </span>
                        <a href="#ZA">
                        South Africa
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-kr"> </span>
                        <a href="#KR">
                        South Korea
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-es"> </span>
                        <a href="#ES">
                        Spain
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-lk"> </span>
                        <a href="#LK">
                        Sri Lanka
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-sd"> </span>
                        <a href="#SD">
                        Sudan
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-sz"> </span>
                        <a href="#SZ">
                        Swaziland
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-se"> </span>
                        <a href="#SE">
                        Sweden
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ch"> </span>
                        <a href="#CH">
                        Switzerland
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-sy"> </span>
                        <a href="#SY">
                        Syria
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-tw"> </span>
                        <a href="#TW">
                        Taiwan
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-tj"> </span>
                        <a href="#TJ">
                        Tajikistan
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-tz"> </span>
                        <a href="#TZ">
                        Tanzania
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-th"> </span>
                        <a href="#TH">
                        Thailand
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-tl"> </span>
                        <a href="#TL">
                        Timor-Leste
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-tg"> </span>
                        <a href="#TG">
                        Togo
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-tn"> </span>
                        <a href="#TN">
                        Tunisia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-tr"> </span>
                        <a href="#TR">
                        Turkey
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-tm"> </span>
                        <a href="#TM">
                        Turkmenistan
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ug"> </span>
                        <a href="#UG">
                        Uganda
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ua"> </span>
                        <a href="#UA">
                        Ukraine
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ae"> </span>
                        <a href="#AE">
                        United Arab Emirates
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-gb"> </span>
                        <a href="#UK">
                        United Kingdom
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-us"> </span>
                        <a href="#US">
                        United States
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-uy"> </span>
                        <a href="#UY">
                        Uruguay
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-uz"> </span>
                        <a href="#UZ">
                        Uzbekistan
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-vu"> </span>
                        <a href="#VU">
                        Vanuatu
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ve"> </span>
                        <a href="#VE">
                        Venezuela
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-vn"> </span>
                        <a href="#VN">
                        Vietnam
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-ye"> </span>
                        <a href="#YE">
                        Yemen
                        </a>
                     </li>
                  </ul>
                  <ul class="cat-list col-sm-3 col-xs-6 ">
                     <li>
                        <span class="flag-icon flag-icon-zm"> </span>
                        <a href="#ZM">
                        Zambia
                        </a>
                     </li>
                     <li>
                        <span class="flag-icon flag-icon-zw"> </span>
                        <a href="#ZW">
                        Zimbabwe
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade modalHasList" id="selectRegion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
   <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h4 class="modal-title" id="exampleModalLabel"><i class=" icon-map"></i> Select your region </h4>
   </div>
   <div class="modal-body">
      <div class="row">
         <div class="col-sm-12">
            <p>Popular cities in <strong>New York</strong></p>
            <div style="clear:both"></div>
            <div class="col-sm-6 no-padding">
               <select class="form-control selecter  " id="region-state" name="region-state">
                  <option value="">All States/Provinces</option>
                  <option value="Alabama">Alabama</option>
                  <option value="Alaska">Alaska</option>
                  <option value="Arizona">Arizona</option>
                  <option value="Arkansas">Arkansas</option>
                  <option value="California">California</option>
                  <option value="Colorado">Colorado</option>
                  <option value="Connecticut">Connecticut</option>
                  <option value="Delaware">Delaware</option>
                  <option value="District of Columbia">District of Columbia</option>
                  <option value="Florida">Florida</option>
                  <option value="Georgia">Georgia</option>
                  <option value="Hawaii">Hawaii</option>
                  <option value="Idaho">Idaho</option>
                  <option value="Illinois">Illinois</option>
                  <option value="Indiana">Indiana</option>
                  <option value="Iowa">Iowa</option>
                  <option value="Kansas">Kansas</option>
                  <option value="Kentucky">Kentucky</option>
                  <option value="Louisiana">Louisiana</option>
                  <option value="Maine">Maine</option>
                  <option value="Maryland">Maryland</option>
                  <option value="Massachusetts">Massachusetts</option>
                  <option value="Michigan">Michigan</option>
                  <option value="Minnesota">Minnesota</option>
                  <option value="Mississippi">Mississippi</option>
                  <option value="Missouri">Missouri</option>
                  <option value="Montana">Montana</option>
                  <option value="Nebraska">Nebraska</option>
                  <option value="Nevada">Nevada</option>
                  <option value="New Hampshire">New Hampshire</option>
                  <option value="New Jersey">New Jersey</option>
                  <option value="New Mexico">New Mexico</option>
                  <option selected value="New York">New York</option>
                  <option value="North Carolina">North Carolina</option>
                  <option value="North Dakota">North Dakota</option>
                  <option value="Ohio">Ohio</option>
                  <option value="Oklahoma">Oklahoma</option>
                  <option value="Oregon">Oregon</option>
                  <option value="Pennsylvania">Pennsylvania</option>
                  <option value="Rhode Island">Rhode Island</option>
                  <option value="South Carolina">South Carolina</option>
                  <option value="South Dakota">South Dakota</option>
                  <option value="Tennessee">Tennessee</option>
                  <option value="Texas">Texas</option>
                  <option value="Utah">Utah</option>
                  <option value="Vermont">Vermont</option>
                  <option value="Virgin Islands">Virgin Islands</option>
                  <option value="Virginia">Virginia</option>
                  <option value="Washington">Washington</option>
                  <option value="West Virginia">West Virginia</option>
                  <option value="Wisconsin">Wisconsin</option>
                  <option value="Wyoming">Wyoming</option>
               </select>
            </div>
            <div style="clear:both"></div>
            <hr class="hr-thin">
         </div>
         <div class="col-md-4">
            <ul class="list-link list-unstyled">
               <li><a href="#" title="">All Cities</a></li>
               <li><a href="#" title="Albany">Albany</a></li>
               <li><a href="#" title="Altamont">Altamont</a></li>
               <li><a href="#" title="Amagansett">Amagansett</a></li>
               <li><a href="#" title="Amawalk">Amawalk</a></li>
               <li><a href="#" title="Bellport">Bellport</a></li>
               <li><a href="#" title="Centereach">Centereach</a></li>
               <li><a href="#" title="Chappaqua">Chappaqua</a></li>
               <li><a href="#" title="East Elmhurst">East Elmhurst</a></li>
               <li><a href="#" title="East Greenbush">East Greenbush</a></li>
               <li><a href="#" title="East Meadow">East Meadow</a></li>
            </ul>
         </div>
         <div class="col-md-4">
            <ul class="list-link list-unstyled">
               <li><a href="#" title="Elmont">Elmont</a></li>
               <li><a href="#" title="Elmsford">Elmsford</a></li>
               <li><a href="#" title="Farmingville">Farmingville</a></li>
               <li><a href="#" title="Floral Park">Floral Park</a></li>
               <li><a href="#" title="Flushing">Flushing</a></li>
               <li><a href="#" title="Fonda">Fonda</a></li>
               <li><a href="#" title="Freeport">Freeport</a></li>
               <li><a href="#" title="Fresh Meadows">Fresh Meadows</a></li>
               <li><a href="#" title="Fultonville">Fultonville</a></li>
               <li><a href="#" title="Gansevoort">Gansevoort</a></li>
               <li><a href="#" title="Garden City">Garden City</a></li>
            </ul>
         </div>
         <div class="col-md-4">
            <ul class="list-link list-unstyled">
               <li><a href="#" title="Oceanside">Oceanside</a></li>
               <li><a href="#" title="Orangeburg">Orangeburg</a></li>
               <li><a href="#" title="Orient">Orient</a></li>
               <li><a href="#" title="Ozone Park">Ozone Park</a></li>
               <li><a href="#" title="Palatine Bridge">Palatine Bridge</a></li>
               <li><a href="#" title="Patterson">Patterson</a></li>
               <li><a href="#" title="Pearl River">Pearl River</a></li>
               <li><a href="#" title="Peekskill">Peekskill</a></li>
               <li><a href="#" title="Pelham">Pelham</a></li>
               <li><a href="#" title="Penn Yan">Penn Yan</a></li>
               <li><a href="#" title="Peru">Peru</a></li>
            </ul>
         </div>
      </div>
   </div>
</div>
<div style="clear: both"></div>
@endsection
