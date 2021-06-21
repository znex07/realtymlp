<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <a class='btn btn-sm btn-default' href='#'> 
        <i class="fa fa-refresh" aria-hidden="true"></i> Refresh
      </a>
                                     
        <a class="btn btn-sm btn-default" href="#fakelink"><i class="fa fa-eye" aria-hidden="true"></i></a>
        <a class="btn btn-sm btn-default" href="#fakelink"><i class="fa fa-exclamation-circle"></i></a>
        <a class="btn btn-sm btn-default" href="#fakelink"><i class="fa fa-trash"></i></a>
                                 
    </div>
  </div>
</div>

<table class="table table-striped table-hover hidden-xs" id="tableInq">
  {{-- <thead>
    <tr>
      <th>Select</th>
      <th>Preview</th>
      <th>Property Code</th>
      <th>Name</th>
      <th>Message</th>
    </tr>
  </thead> --}}
  <tbody>
    @foreach($inquiry as $inquiries)
    <tr href="/dashboard/message/thread/{{ str_slug($inquiries->message) }}/{{ $inquiries->id }}">
      <td><input type="checkbox" data-toggle="checkbox" class="checkbox"></td>
      <td>{{ $inquiries->from_name }}</td>
      <td>{{ $inquiries->message }}</td>
      <td>{{ $inquiries->created_at->format('g:i A') }}</td>
    </tr>                                
    @endforeach
  </tbody>
</table>