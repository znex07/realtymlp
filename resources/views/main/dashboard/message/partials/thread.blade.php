<a href="/dashboard/message/thread/{{ str_slug($thread->subject) }}/{{ $thread->id }}" class="list-group-item">
    <div class="msg primary clearfix">
        <img class="msg-thumb pull-left img-circle" src="/avatars/{{ $thread->from->profile_image }}" alt="msg Object">
        <div class="msg-body">
            <div class="message-title secondary">
                <label class="date pull-right"><i class="fa fa-clock-o"></i> {{ $thread->created_at }}</label>
                <label></label>
            </div>
            <p class="secondary">
                {{ $thread->subject }}
            </p>
        </div>
    </div>
    
</a>
<hr>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
