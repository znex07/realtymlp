@extends('main.dashboard.reports.base')

    @section('content.inner')

    <div class="row">
    	<div class="col-md-12">
		    <div class="panel panel-default">
                <div class="panel-heading">
                    Listing Reports
                </div>             
                <div class="panel-body">
                    <table id="example" class="table display" cellspacing="0" width="100%" style="font-size: 14px;">
                        <thead>
                            <tr>
                                <th width="10%">Property Code</th>
                                <th width="5%">Action</th>
                                <th width="10%">IP Address</th>
                                <th width="15%">Name</th>
                                <th width="10%">Timestamp</th>
                            </tr>
                        </thead>

                        <tbody>
                        
                        @foreach($properties as $property)
                            @foreach($property->property_logs as $log) 
                                <tr title='  
                                    @if($log->action == 'NEW LISTING')
                                        This is when you created your listing
                                    @elseif($log->action == 'EDIT LISTING')
                                        This is a time when you edited your listing
                                    @elseif($log->action == 'DELETE LISTING')
                                        This is a time when you deleted your listing
                                    @elseif($log->action == 'SHARE LISTING')
                                        This is a time when you shared your listing
                                    @elseif($log->action == 'VIEWED LISTING')
                                        This is a time when someone viewed your listing
                                    @elseif($log->action == 'YOUR CONTACT WAS VIEWED')
                                        This is a time when someone viewed your contact info for that listing
                                    @elseif($log->action == 'YOUR EMAIL WAS VIEWED')
                                        This is a time when someone viewed your email address for that listing
                                    @elseif($log->action == 'INQUIRY ON LISTING')
                                        This is a time when someone sent an inquiry for that listing        
                                    @endif 

                                ' style="cursor: pointer;">
                                    <td><div class="test"><a id="view_published" href=' {{ $log->action == 'DELETE LISTING' ? '#' : '/blowup/' . $property->id . '?view_from=1' }}' target="_blank">{{ $log->property_code }}</div></td>
                                    <td><div class="test">{{ $log->action }}</div></td>
                                    <td><div class="test">{{ $log->ip_address }}</div></td>
                                    <td><div class="test">{{ $log->inquirer_type }} <a href=" {{ $log->inquirer_type == 'Affiliate: ' || 'User: ' ? '/profile/' . $log->user_code . '/' . str_slug($log->inquirer_name) : '' }} ">  {{ $log->inquirer_name }} </a></div></td>
                                    <td><div class="test">{{ $log->updated_at }}</div></td>
                                </tr>
                            @endforeach
                        @endforeach
                            

                        </tbody>
                    </table>
                </div>   
            </div>    
    	</div>
    </div>


    @endsection

    @section('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>   
    <script>
        $('#example').DataTable();
        oTable = $('#AttributesList-table').dataTable({
    "aoColumnDefs": [
    {
        "aTargets": [ '_all' ],
        "mRender": function ( data, type, full ) {
            if(data!=null)
            {
                return '<div class="test" style="text-overflow:ellipsis;">'+data+'</div>';
            }
            else
            {
            return ''; 
            }
        }
    }
    ]
});
    </script>
@endsection
