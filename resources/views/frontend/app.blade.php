<?php
$cat = App\Category::where('status' , '1')->get();
?>
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" lang="en">

   <link rel="canonical" href="index.html">
   <!-- Mirrored from paperpk.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Sep 2018 02:20:01 GMT -->
   <!-- Added by HTTrack -->
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <!-- /Added by HTTrack -->
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=BIG5">
      <title>Newspaper Jobs | Ads | Pakistani | Abroad | Online</title>
      <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link rel="stylesheet" href="{{asset('css/includes/bootstrap.min.css')}}" />
      <script src="{{asset('js/includes/jquery.min.js')}}"></script>
      <script src="{{asset('js/includes/bootstrap.min.js')}}"></script>
      <link rel="stylesheet" href="{{asset('css/includes/my_style.css')}}" />
      <link rel="shortcut icon" href="images/favicon.ico" />
       <link rel="stylesheet" href="{{asset('public/css/includes/fullcalendar.min.css')}}" />
       <link rel="stylesheet" href="{{asset('public/css/slider/thumbnail-slider.css')}}" />
       <link rel="stylesheet" href="{{asset('public/css/slider/thumbs2.css')}}" />
       <script src="{{asset('public/css/slider/thumbnail-slider.js')}}"></script>
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">
 
      <style>
         #job-table table a:visited{background-color: black;}
         #company-img2 a:hover img{
         -webkit-filter: grayscale(100%) brightness(50);
         -moz-filter: grayscale(100%) brightness(50);
         }
         #company-img2 a:hover{
         color:white;
         } 
         .Newspaper_border a img:hover{
         border:1px dashed brown;
         }
         .Newspaper_border {
         padding-top:5px;
         border-right: #DBE1E6 1px solid;
         border-bottom: #DBE1E6 1px solid;
         }
         #table td{
         text-align:center;
         }
         #table img{
         width:75px;
         height: 40px;
         }
         #job-link{color:#F60;}
         a#job-link:visited{color: blue;}
         #admission-link{color:#C00;}
         #tender-link{color:#666;}
         #newspaper img{
         width: 90px; height: 40px;
         }
         #s-h{display:none;}
         a#job-one-lnkl:visited{color: gray;}
         a#company_sub_link{
         color: #cb65dc;
         font-size:0.8em;
         } 
      </style>
   </head>
   <body>
      <div id="wrapper">
         <div id="main_container_mobile">
                <img alt="JobyLogo" src="pk_img/test.jpg" align="left" width="180px">
                <a id="nav_buttonid"><img alt="navigate-button" src="{{asset('public/nav_head_logo.png')}}" align="right" width="45px" style="margin:7px 14px ;"></a>
                
                    <ul id="toggle_ul">
                        @if(auth()->user())
                  <a href="{{url('/account')}}">My Account</a>
                  @else
                  <a href="{{url('/register')}}">Job Seeker</a>
                  <br>
                  <a href="{{url('/login')}}">Log in</a>
                  @endif
                    </ul>
            </div>
         <div id="main_container">
            <div id="menu_div">
               <div id="account_link">
                @if(auth()->user())
                  <a href="{{url('/account')}}">My Account</a>
                  @else
                  <a href="{{url('/register')}}">Job Seeker</a><a href="{{url('/es-register')}}">Employer</a>
                  <a href="{{url('/login')}}">Login</a>
                  @endif
               </div>
               <ul>
                  <li><a href="{{url('/')}}"><img src="{{asset('public/home.png')}}" height=30px /></a></li>
                  @if($cat)
                  @foreach($cat as $ca)
                  <li><a href="{{url('category/'.$ca->id)}}">{{$ca->title}}</a></li>
                  @endforeach
                  @endif
               </ul>
            </div>
         </div>
          <div id="logo_div">
                    <a href="{{url('/')}}"><img alt="JobyLogo" src="{{asset('pk_img/test.jpg')}}" align="left" width="200px" height="80px" /></a>
                     @include('frontend.includes.sevenintoninty')
                </div>
         <div id=clear></div>
         @yield('content')
         
         <div id=footer>
            
            <img alt="Pk_banner" src="{{asset('public/E31C2C11-C3B3-4560-A973-3B1461832C4E.jpg')}}" style="width:100%;" />
            <div id="copy-right">
               <table bgcolor="white" width="100%">
                  <tr>
                     <td bgcolor="white">
                        <p>  
                           CopyRight & Copy; 2019 & Trademark Jobssu.com Pvt Ltd.
                        </p>
                     </td>
                  </tr>
               </table>
               <br/> 
            </div>
            <br/>  <br/>       
            <script>
               function Hdiv(){
               document.getElementById("app").style.display="none";
               }
            </script>
         </div>
      </div>
   </body>
   <head>
      <script src="{{asset('js/includes/my_js.js')}}"></script>
      <script src="{{asset('js/includes/moment.min.js')}}"></script>
      <script src="{{asset('js/includes/fullcalendar.min.js')}}"></script>
      <script src="{{url('js/includes/jquery.validate.js')}}"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>

      @yield('js-script')
      <script>

         $(document).ready(function(){

var url1 = "{{url('showcalenderjobs')}}"
var url2 = "{{url('showcalendertender')}}"
var url3 = "{{url('showcalenderadmissions')}}"
            function search(){
               var news = $('#newspaper').find(":selected").text();
               var type = $('#job_type').find(":selected").text();
               var date = $('#date').val();
               windows.location = "{{url('/')}}"+news+"/"+type+"/"+date

            }
         
            $('#calendar2').fullCalendar({
              header: {
        left: '',
        center: '',
        right: ''
    },
              dayClick: function(date, jsEvent, view) {
    window.location = "{{url('apply_date/')}}"+'/'+date.format()

  }
            });
             $("#m-btn").click(function(){
                 $("#s-h").toggle('slow');
         
             });
             $('#calendar3').fullCalendar({
               header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
    },
   eventSources: [
    url1,
    url2,
    url3
  ],
  eventClick: function (calEvent, jsEvent, view) {
    console.log('html' , calEvent)
    window.location = calEvent.html;
},
});
         
         });
         
      </script>
      <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-124198877-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-124198877-2');
</script>
   </head>
</html>