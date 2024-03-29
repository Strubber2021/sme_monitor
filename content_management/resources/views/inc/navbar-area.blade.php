<div class="navbar-area">
    <div class="main-responsive-nav">
        <div class="main-responsive-menu">
            <div class="responsive-burger-menu d-lg-none d-block">
                <span class="top-bar"></span>
                <span class="middle-bar"></span>
                <span class="bottom-bar"></span>
            </div>
        </div>
    </div>

    <div class="mobile-responsive-nav">
        <div class="mobile-responsive-menu">
        </div>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="desktop-nav desktop-nav-one nav-area">
        <nav class="navbar navbar-expand-md navbar-light ">
            <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ url('/ninechang') }}" class="nav-link">
                            Ninechang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/bukkhon') }}" class="nav-link">
                            Bukkhon
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/smethai') }}" class="nav-link">
                            Smethaisoftware
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/jobth') }}" class="nav-link">
                            งานไทย
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/findchang') }}" class="nav-link">
                            หาช่างหางาน
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/article') }}" class="nav-link">
                            บทความ
                        </a>
                    </li>
                </ul>
                {{-- 
                    
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Home 
                            <i class="ri-arrow-down-s-line"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="index.html" class="nav-link">
                                    Home One  
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index-2.html" class="nav-link">
                                    Home Two
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index-3.html" class="nav-link">
                                    Home Three
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Jobs
                            <i class="ri-arrow-down-s-line"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="job-listing.html" class="nav-link">Job Listing</a>
                            </li>
                            <li class="nav-item">
                                <a href="post-job.html" class="nav-link">Post A Job</a>
                            </li>
                            <li class="nav-item">
                                <a href="job-details.html" class="nav-link">Job Details</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Employers
                            <i class="ri-arrow-down-s-line"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="employers-listing.html" class="nav-link">
                                    Employers Listing
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="employers-details.html" class="nav-link">
                                    Employers Details
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard.html" class="nav-link">
                                    Employers Dashboard
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Candidates
                            <i class="ri-arrow-down-s-line"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="candidates-listing.html" class="nav-link">
                                    Candidates Listing
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="candidates-details.html" class="nav-link">
                                    Candidates Details
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="candidates-dashboard.html" class="nav-link">
                                    Candidates Dashboard
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Blog
                            <i class="ri-arrow-down-s-line"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="blog-1.html" class="nav-link">
                                    Blog Grid
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="blog-2.html" class="nav-link">
                                    Blog Left Sidebar 
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="blog-3.html" class="nav-link">
                                    Blog Right Sidebar 
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="blog-details.html" class="nav-link">
                                    Blog Details 
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="categories.html" class="nav-link">
                                    Categories
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="tags.html" class="nav-link">
                                    Tags
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Pages 
                            <i class="ri-arrow-down-s-line"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="about.html" class="nav-link">
                                    About Us
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="contact.html" class="nav-link">
                                    Contact Us
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="testimonials.html" class="nav-link">
                                    Testimonials
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Freelancer
                                    <i class="ri-arrow-down-s-line"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="freelancer.html" class="nav-link">
                                            Freelancer
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="freelancer-details.html" class="nav-link">
                                            Freelancer Details 
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="dashboard-invoice.html" class="nav-link">
                                    Invoice
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Company
                                    <i class="ri-arrow-down-s-line"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="company.html" class="nav-link">
                                            Company Listing
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="company-details.html" class="nav-link">
                                            Company Details 
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="search-job.html" class="nav-link">
                                            Search Job
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="pricing.html" class="nav-link">
                                    Pricing Plan
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="faq.html" class="nav-link">
                                    FAQ
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="log-in-register.html" class="nav-link">
                                    Log In / Register
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="forgot-password.html" class="nav-link">
                                    Forgot Password
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="terms-condition.html" class="nav-link">
                                    Terms & Conditions
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="privacy-policy.html" class="nav-link">
                                    Privacy Policy
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="404.html" class="nav-link">
                                    404 Page
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="coming-soon.html" class="nav-link">
                                    Coming Soon
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                 --}}
                <div class="others-options d-flex align-items-center">
                    <div class="optional-item">
                        <div class="dropdown profile-nav-item">
                            <a href="#" class="dropdown-bs-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="menu-profile">
                                    <img src="{{ asset('assets/images/user-img/user-img2.jpg') }}" class="rounded-circle" alt="image">
                                    <span class="name">{{ Cookie::get('name') }}</span>
                                </div>
                            </a>

                            <div class="dropdown-menu">
                                <div class="dropdown-header d-flex flex-column align-items-center">
                                    <div class="figure mb-3">
                                        <img src="assets/images/user-img/user-img2.jpg" class="rounded-circle" alt="image">
                                    </div>

                                    <div class="info text-center">
                                        <span class="name">{{ Cookie::get('name') }}</span>
                                        {{-- <p class="mb-3 email">hello@jeanburke.com</p> --}} 
                                    </div>
                                </div>

                                <div class="dropdown-body">
                                    <ul class="profile-nav p-0 pt-3">
                                        <li class="nav-item active">
                                            <a href="{{ url('/ninechang') }}" class="nav-link">
                                                <span class="icon"><i class="ri-home-line"></i></span>
                                                <span class="menu-title">Ninechang</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{ url('/bukkhon') }}" class="nav-link">
                                                <span class="icon"><i class="ri-user-line"></i></span>
                                                <span class="menu-title">Bukkhon</span>
                                            </a>
                                        </li>
                    
                                        <li class="nav-item">
                                            <a href="{{ url('/smethai') }}" class="nav-link">
                                                <span class="icon"><i class="ri-send-plane-fill"></i></span>
                                                <span class="menu-title">Smethaisoftware</span>
                                            </a>
                                        </li>
                    
                                        <li class="nav-item">
                                            <a href="{{ url('/jobth') }}" class="nav-link">
                                                <span class="icon"><i class="ri-briefcase-line"></i></span>
                                                <span class="menu-title">งานไทย</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{ url('/findchang') }}" class="nav-link">
                                                <span class="icon"><i class="ri-file-search-line"></i></span>
                                                <span class="menu-title">หาช่างหางาน</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{ url('/article') }}" class="nav-link">
                                                <span class="icon"><i class="ri-article-line"></i></span>
                                                <span class="menu-title">บทความ</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="dropdown-footer">
                                    <ul class="profile-nav">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" onclick="handleLogout(this,1)"><i class="ri-logout-box-r-line"></i> <span>Logout</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </nav>
    </div>

    <div class="side-nav-responsive">
        <div class="container-max">
            <div class="dot-menu">
                <div class="circle-inner">
                    <div class="circle circle-one"></div>
                    <div class="circle circle-two"></div>
                    <div class="circle circle-three"></div>
                </div>
            </div>
            
            <div class="container">
                <div class="side-nav-inner">
                    <div class="side-nav justify-content-center align-items-center">
                        <div class="option-item">
                            <div class="dropdown profile-nav-item">
                                <a href="#" class="dropdown-bs-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="menu-profile">
                                        <img src="assets/images/user-img/user-img2.jpg" class="rounded-circle" alt="image">
                                        <span class="name">My Account</span>
                                    </div>
                                </a>
    
                                <div class="dropdown-menu">
                                    <div class="dropdown-header d-flex flex-column align-items-center">
                                        <div class="figure mb-3">
                                            <img src="assets/images/user-img/user-img2.jpg" class="rounded-circle" alt="image">
                                        </div>
    
                                        <div class="info text-center">
                                            <span class="name">Andy Smith</span>
                                            <p class="mb-3 email">hello@androsmith.com</p>
                                        </div>
                                    </div>
    
                                    <div class="dropdown-body">
                                        <ul class="profile-nav p-0 pt-3">
                                            <li class="nav-item active">
                                                <a href="dashboard.html" class="nav-link">
                                                    <span class="icon"><i class="ri-home-line"></i></span>
                                                    <span class="menu-title">Dashboard</span>
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="dashboard-applicants.html" class="nav-link">
                                                    <span class="icon"><i class="ri-file-list-line"></i></span>
                                                    <span class="menu-title">All Applicants</span>
                                                </a>
                                            </li>
                        
                                            <li class="nav-item">
                                                <a href="dashboard-submit-resume.html" class="nav-link">
                                                    <span class="icon"><i class="ri-bookmark-line"></i></span>
                                                    <span class="menu-title">Submit Resumes</span>
                                                </a>
                                            </li>
                        
                                            <li class="nav-item">
                                                <a href="dashboard-packages.html" class="nav-link">
                                                    <span class="icon"><i class="ri-stack-fill"></i></span>
                                                    <span class="menu-title">Packages</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
    
                                    <div class="dropdown-footer">
                                        <ul class="profile-nav">
                                            <li class="nav-item">
                                                <a href="index.html" class="nav-link"><i class="ri-logout-box-r-line"></i> <span>Logout</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>