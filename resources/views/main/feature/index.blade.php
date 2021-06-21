@extends('main.partials.base')
@section('styles')
<style>
    .modal-button {
        padding: 14px 24px;
        border: 0 none;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;  padding: 14px 24px;
        color:white;
    }
    .navbar-brand {
        margin-left: 0px;
        font-weight: normal;
    }
    .topnav {
        background: transparent;
    }
    body {
        background-color: #FFF;
    }
    table {
        border-radius: 5px;
        color: #77909b;
    }
    tr {
        border: 3px solid #e0e6ed;
        border-radius: 5px;
    }
    td {
        text-align: center; 
        vertical-align: middle !important;
    }
    td p {
        margin: 0px !important;
    }
    
    .container {
        height: auto;
    }
    .reason h4 {
        font-size: 25px;
        margin:5px 0px;
        font-weight: 300 !important;        
    }
    .reason-title {
        margin-bottom: 20px;
    }
    .reason h6 {
        margin-bottom: 10px !important;        
        font-size: 18px;
        font-weight: 300 !important;
    }
    .reason h6 i{
        margin-right: 10px;
    }
    .reason .lead {
        margin-bottom: 0px;
        color: #455963;
        font-weight: 500;
        font-size: 20px;
    }    
    .reason p,
    .upgrade p {
        line-height: 1.7;
        font-size: 17px;
        margin: 0px 0px 35px;
        color: #aeaeae;        
    }
    .reason hr {
        margin-top: 100px;
        margin-bottom: 100px;
        border-top: 2px solid #eee;       
    }
    .disable-padding {
        padding-right: 0px !important;
        margin-top: 100px;
    }
    .intro {
        margin-bottom: 50px;
    }
    .button-green {
        border:2px solid #1abc9c;
        padding: 8px 21px;
        color: #1abc9c;
    }
    .button-green:hover,
    .button-green:active {
        color: #fff;
        background: #1abc9c;
        border-color: #1abc9c;
    }
    .btn-xl {
    border-radius: 15px;
    font-size: 42px;
}
body {
    margin-top: 70px !important;
    background: #fff !important;
}
.icon-size {
    font-size: 80px !important;
}
.no-margin {
    margin-bottom: 10px !important;
}
</style>
<div class="container-full">
    <div class="row">
    @include('main.feature.reasons')
    </div>
</div>