@extends('main.dashboard.message.base')
@section('styles')
<link rel="stylesheet" href="/assets/css/dashboard/dashboard.css" >
<style>
    .counter {
        right: 17px;
    }
</style>
@endsection
@section('content.inner')
     <form class="form-horizontal" method='POST' action='/threads'>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default message-card ">
                    <div class="panel-heading">New Message</div>
                    <div class="panel-body">
                        <input type='hidden' name='_token' value='{{ csrf_token() }}' />
                        <input type='hidden' id='to_id' name='to_id' />
                        <input type='hidden' id='subject' name='subject' value="empty" />
                        <div class="form-group">
                            <label class="col-md-2 control-label">Recepient:</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control user-input" id="recepient" placeholder="To">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                
                                <textarea class="form-control" style="height:200px; resize:none;" id="my_message" name="message" placeholder="Message"></textarea>
                                <span class="counter" id="counter_message">250/250 Characters Left</span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer clearfix">
                        <button class=" pull-right btn btn-sm btn-primary">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
    
@section('scripts')
    <script type='text/javascript' src='/assets/js/datum/affiliates.js'></script>
    <script type='text/javascript' src='/assets/js/messages.js'></script>
    <script type='text/javascript'>
        (function () {
            messages.init();
        })();
    </script>

    <script type="text/javascript">
    $(function() {
   
        $("#subject").limitText($("#counter_subject"),100);
        $("#my_message").limitText($("#counter_message"),250);
        // console.log('message');
    })
    
    $.fn.limitText = function(counter,limit) {
        
        this.on('input', function(e) {
            var tval = $(this).val(),
                tlength = tval.length,
                set = limit,
                remain = parseInt(set - tlength);
            counter.text(remain + "/" + limit + " Characters left");
            if (remain <= 0) {
                counter.text(0 + "/" + limit + " Characters left");
                $(this).val((tval).substring(0, limit -1));            
            }
        });
        
    };
    </script>
@endsection