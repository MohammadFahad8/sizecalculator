<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

<style>

    .tooltip-custom:hover
    {
       width: 100%!important;
    }
 .btn-sidebar:hover
 {
   transition: 0.5s ease-in-out;
   
   color:#013b6c;
   font-weight: 900 !important;
   margin-left:5px !important;
   text-decoration: none !important;
 
 }
 .switch {
   position: relative;
   display: inline-block;
   width: 60px;
   height: 34px;
 }
 
 .switch input { 
   opacity: 0;
   width: 0;
   height: 0;
 }
 
 .slider {
   position: absolute;
   cursor: pointer;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   background-color: #ccc;
   -webkit-transition: .4s;
   transition: .4s;
 }
 
 .slider:before {
   position: absolute;
   content: "";
   height: 26px;
   width: 26px;
   left: 4px;
   bottom: 4px;
   background-color: white;
   -webkit-transition: .4s;
   transition: .4s;
 }
 
 input:checked + .slider {
   background-color: #00ce0a;
 }
 
 input:focus + .slider {
   box-shadow: 0 0 1px #00ce0a;
 }
 
 input:checked + .slider:before {
   -webkit-transform: translateX(26px);
   -ms-transform: translateX(26px);
   transform: translateX(26px);
 }
 
 /* Rounded sliders */
 .slider.round {
   border-radius: 34px;
 }
 
 .slider.round:before {
   border-radius: 50%;
 }
 /* -------------------------------------------------------------------
  * ## pagination 
  * ------------------------------------------------------------------- */
 .pgn {
    margin: 3rem auto;
    text-align: center;
 }
 
 .pgn ul {
    display: inline-block;
    list-style: none;
    margin-left: 0;
    position: relative;
    padding: 0 6rem;
 }
 
 .pgn ul li {
    display: inline-block;
    margin: 0;
    padding: 0;
 }
 
 .pgn__num {
    font-family: "metropolis-bold", sans-serif;
    font-size: 14px;
    line-height: 2.4rem;
    display: inline-block;
    padding: .6rem 1.2rem;
    height: 3.6rem;
    margin: .3rem .15rem;
    color: #151515;
    border-radius: 3px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
 }
 
 .pgn__num:hover {
    background: #c4c4c4;
    color: #151515;
 }
 
 .pgn .current, .pgn .current:hover {
    background-color: #151515;
    color: #FFFFFF;
 }
 
 .pgn .inactive, .pgn .inactive:hover {
    color: #888888;
    cursor: default;
 }
 
 .pgn__prev, .pgn__next {
    display: block;
    background-color: #FFFFFF;
    background-repeat: no-repeat;
    background-size: 18px 12px;
    background-position: center;
    height: 4.8rem;
    width: 4.8rem;
    line-height: 4.8rem;
    padding: 0;
    margin: 0;
    border-radius: 50%;
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.15);
    font: 0/0 a;
    text-shadow: none;
    color: transparent;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
 }
 
 .pgn__prev:hover, .pgn__next:hover {
    background-color: #151515;
    color: #FFFFFF;
    text-decoration: none;
    background-repeat: no-repeat;
    background-position: center;
 }
 
 .pgn__prev {
    background-image: url("../images/icons/icon-arrow-left.svg");
    left: 0;
    width: 9%;
     height: 50%;
 }
 
 .pgn__prev:hover {
    background-image: url("../images/icons/icon-arrow-left-w.svg");
 }
 
 .pgn__next {
    background-image: url("../images/icons/icon-arrow-right.svg");
    right: 0;
    width: 9%;
     height: 50%;
 }
 
 .pgn__next:hover {
    background-image: url("../images/icons/icon-arrow-right-w.svg");
 }
 
 .pgn__prev.inactive, .pgn__next.inactive {
    background-color: #ffffff;
    opacity: 0.5;
    cursor: default;
 }
 
 .pgn__prev.inactive:hover {
    background-image: url("../images/icons/icon-arrow-left.svg");
 }
 
 .pgn__next.inactive:hover {
    background-image: url("../images/icons/icon-arrow-right.svg");
 }
 
 /* ------------------------------------------------------------------- 
  * responsive:
  * pagination
  * ------------------------------------------------------------------- */
 @media only screen and (max-width:600px) {
    .pgn ul {
       padding: 0 5rem;
    }
 
    .pgn__prev, .pgn__next {
       height: 3.6rem;
       width: 3.6rem;
       line-height: 3.6rem;
       background-size: 12px 8px;
    }
 
 }
 body
 {
    overflow-x: hidden   !important;
 }
 
 #preloader {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: #f7f4f4;
      z-index: 800;
      height: 100%;
      width: 100%;
      display: table;
   }
   
   .no-js #preloader, .oldie #preloader {
      display: none;
   }
   #loader {
    display: table-cell;
    text-align: center;
    vertical-align: middle;
  }
  
  .line-scale > div:nth-child(1) {
    -webkit-animation: line-scale 1s -0.4s infinite cubic-bezier(0.2, 0.68, 0.18, 1.08);
    animation: line-scale 1s -0.4s infinite cubic-bezier(0.2, 0.68, 0.18, 1.08);
  }
  
  .line-scale > div:nth-child(2) {
    -webkit-animation: line-scale 1s -0.3s infinite cubic-bezier(0.2, 0.68, 0.18, 1.08);
    animation: line-scale 1s -0.3s infinite cubic-bezier(0.2, 0.68, 0.18, 1.08);
  }
  
  .line-scale > div:nth-child(3) {
    -webkit-animation: line-scale 1s -0.2s infinite cubic-bezier(0.2, 0.68, 0.18, 1.08);
    animation: line-scale 1s -0.2s infinite cubic-bezier(0.2, 0.68, 0.18, 1.08);
  }
  
  .line-scale > div:nth-child(4) {
    -webkit-animation: line-scale 1s -0.1s infinite cubic-bezier(0.2, 0.68, 0.18, 1.08);
    animation: line-scale 1s -0.1s infinite cubic-bezier(0.2, 0.68, 0.18, 1.08);
  }
  
  .line-scale > div:nth-child(5) {
    -webkit-animation: line-scale 1s 0s infinite cubic-bezier(0.2, 0.68, 0.18, 1.08);
    animation: line-scale 1s 0s infinite cubic-bezier(0.2, 0.68, 0.18, 1.08);
  }
  
  .line-scale > div {
    background-color: rgb(51, 90, 248);
    width: 4px;
    height: 35px;
    border-radius: 2px;
    margin: 2px;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
    display: inline-block;
  }
  
  @-webkit-keyframes line-scale {
    0% {
       -webkit-transform: scaley(1);
       transform: scaley(1);
    }
  
    50% {
       -webkit-transform: scaley(0.4);
       transform: scaley(0.4);
    }
  
    100% {
       -webkit-transform: scaley(1);
       transform: scaley(1);
    }
  
  }
  
  @keyframes line-scale {
    0% {
       -webkit-transform: scaley(1);
       transform: scaley(1);
    }
  
    50% {
       -webkit-transform: scaley(0.4);
       transform: scaley(0.4);
    }
  
    100% {
       -webkit-transform: scaley(1);
       transform: scaley(1);
    }
  
  }
 
  .size-name:focus
  {
    outline:0px !important;
     -webkit-appearance:none;
     box-shadow: none !important;
  }
 
 
 </style>
 
 