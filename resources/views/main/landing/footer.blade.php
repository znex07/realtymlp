<style>
  .nav-link {
    padding: 1.5em .5em;
  }
.footer-list-group-item {
  background: transparent;
  padding: 3px 0 !important;
}
.footer-list-group-item-text {
  color: #888;
  font-weight: lighter;
}
.footer-list-group-item-text:hover,
.footer-list-group-item-text:focus {
  color: #1abc9c;
}
.site-links a {
  background-color: #bdc3c7;
  color: #888;
  font-size: 13px;
}
.site-links a {   
  display: inline-block;    
  font-size: 14px;
  font-weight: 500;
  line-height: 11px;
  margin: 3px 1px 2px 1px;
  padding: 10px;    
}
footer {
  border-top: 1px solid #dce0e0;
  padding: 40px 0 40px 0 !important;
  margin-top: 100px;
  color: #484848 ;
  background-color: #fff !important;
  padding-bottom: 10px;
}
footer h4, h4 strong {
  font-weight: 900;
}

.btn-xl {
  border-radius: 15px;
  font-size: 42px;
}
.input-group {
  margin-bottom: 30px;
}

.footer-list-group-item {
  background: transparent !important;
}
a.footer-list-group-item:hover,
a.footer-list-group-item:focus {
  background-color: transparent !important;
}
footer .container {
  margin-top: 0px;
  color: #767676;
  font-size: 14px;
  font-weight: normal;
}

</style>
<footer>
  <div class="container"> 
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <h4>Realty<strong class="text-primary">MLP</strong></h4>
        <p>Get updated</p>
        <div class="form-group">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Email Address">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Subscribe</button>
            </span>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 site-links">
        <p class="bold">Featured Projects</p>               
        {{-- <a href="#">Makati</a>                                        
        <a href="#">Taguig</a>
        <a href="#">Pasig</a>
        <a href="#">Marikina</a>                    
        <a href="#">Muntinlupa</a>                                     
        <a href="#">Manila</a>
        <a href="#">Quezon City</a>
        <a href="#">Parañaque </a> --}}
        @foreach($footer_FeaturedProjects as $cities) 
        <a href="/projects">{{ $cities->name }}</a>
        @endforeach
      </div>
      <div class="col-md-5 col-sm-12">
        <div class="col-md-12"><p class="bold">Useful Links</p></div>
        <div class="col-sm-6">
          <div class="list-group" >
            <a href="#" class="footer-list-group-item">
              <p class="footer-list-group-item-text">Search Property</p>
            </a>
            <a href="#" class="footer-list-group-item">
              <p class="footer-list-group-item-text">Search Agents</p>
            </a>                    
            <a href="/feature/contact" class="footer-list-group-item">
              <p class="footer-list-group-item-text">Contact Us</p>
            </a>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="list-group" >
            <a href="/feature" class="footer-list-group-item">
              <p class=footer-"list-group-item-text">About</p>
            </a>
            <a href="" class="footer-list-group-item">
              <p class="footer-list-group-item-text">Careers</p>
            </a>
            <a href="#" class="footer-list-group-item">
              <p class="footer-list-group-item-text">Help</p>
            </a>
            
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <hr style="border-top:1px solid #dce0e0;">
  <div class="container">
    <div class="pull-right">
      <nav class="nav">
        <a class="nav-link" href="/feature/terms">Terms</a>
        <a class="nav-link" href="#">Privacy</a>
        <a class="nav-link" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a class="nav-link" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        <a class="nav-link" href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
      </nav>
    </div>
    &copy; RealtyMLP

  </div>    
  
</footer>