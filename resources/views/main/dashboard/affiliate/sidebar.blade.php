<style>
    .body {
        background-color: #fff;
    }
    .side-nav {
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
    }
    .side-nav>li>a:hover, .side-nav>li>a:focus {
        text-decoration: none;
        background-color: #eee;
        border-left: 6px solid #E74C3C;
        border-radius: 0;
    }
    .side-nav>li>a {
        position: relative;
        display: block;
        padding: 10px 15px;
    }
    .message-card .inbox-title{
        font-size: 15px

    }
    .message-card .primary {
        font-size: 16px;
    }

    .message-card .primary h3 {
        font-size: 14px;
        margin: 4px 0;
        color: #2869A0;
    }

    .message-card .primary .message-title,.property-label {
        font-size: 18px;
    }

    .message-card .secondary {
        font-size: 14px;
        font-weight: 300;
        margin-top: -13px;
        padding: 5px;
    }

    .message-card .secondary p {
        font-size: 14px;
        line-height: 1;
        font-weight: 400;
    }

    .contact-title {
        font-size: 15px;
        font-weight: 700;
        margin-top: 10px;
    }
    .contact-name {
        font-size: 15px;
        margin: 8px 0px 0px 25px;
        font-weight: 400;
    }
    .sender {
        line-height: 1.3;
    }
    .date,.date-title {
        font-weight: 100;
        color: #999;
        font-weight: 100;
    }
    .date-title {
        line-height: 0;
        font-size: 14px;
    }
    .msg-thumb {
        width: 70px;
        height: auto;
    }
    .img-small {
        width: 40px;
        height: auto;
    }
    
    
    .msg,.msg-body{overflow:hidden;zoom:1}
    .msg,.msg .msg{margin-top:15px}
    .msg:first-child{margin-top:0}
    .msg-object{display:block}
    .msg-heading{margin:0 0 5px}
    .msg>.pull-left{margin-right:10px}
    .msg>.pull-right{margin-left:10px}
    .msg-list{padding-left:0;list-style:none}
    .hr {
        margin-top: 1px;
    }
    .nav-msgbtn>li>a {
    border-radius: 4px;
    font-weight: 400;
    font-size: 15px;
    
    }
    .adjust {
        margin-top: -9px;
    }
    .reply-span {
        position: absolute;
        top: 0px;
        color: #999 !important;
        font-size: 15px !important; 
    }
</style>
<div class="col-md-3">
    <div class="panel panel-default message-card ">
        <div class="panel-body">
        <div class="form-group">
                    <div class="input-group">
                        <input class="form-control" id="navbarInput-01" type="search" placeholder="Search">
                        <span class="input-group-btn">
                         <button type="submit" class="btn"><span class="fui-search"></span></button>
                        </span>
                    </div>
                </div>
        <hr>
            <ul class="side-nav nav-msgbtn nav-stacked">
                
                <li><a href="/dashboard/message/"><i class="fa fa-inbox"></i> Inbox</a></li>
                <li><a href="#"><i class="fa fa-paper-plane"></i> Sent Items</a></li>
                <li><a href="#"><i class="fa fa-archive"></i> Archive</a></li>
                <li><a href="#"><i class="fa fa-trash"></i> Trash</a></li>
            </ul>
        </div>
    </div>
    <div class="panel panel-default message-card ">
        <div class="panel-body">
            <h3 class="contact-title text-center">
                Recent Contacts
            </h3>
            <hr>
            <div class="secondary">
                <div class="list-group">
                   @for($i=0;$i<=3;$i++)
                    <a href="#" class="list-group-item">
                        <div class="msg">
                            
                                <img class="msg-thumb img-small pull-left" src="/img/default-picture.jpg" alt="msg Object">
                            
                            <div class="msg-body">
                                <div class="message-title contact-name">
                                 Joram Salinas 
                                </div>
                            </div>
                        </div>
                    </a>
                   @endfor
                </div>
            </div>
        </div>
    </div>
</div>
