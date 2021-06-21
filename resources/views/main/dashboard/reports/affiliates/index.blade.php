@extends('main.dashboard.reports.base')

    @section('content.inner')
    	<div class="row">
    		<div class="col-md-12">
            <div class="panel panel-default">
        			<div class="panel-heading">
        				Affiliate  Reports
        			</div>
        			<div class="panel-body">
        				<table id="example" class="table display" cellspacing="0" width="100%" style="font-size: 14px;">
        					<thead>
        						<tr>
        							<th width="10%">Name</th>
        							<th width="10%">Action</th>
        							<th width="10%">Timestamp</th>
        						</tr>
        					</thead>

                            <tbody>
                            @foreach($logs as $log)
                                <tr title=" 
                                    @if($log->action == 'YOU ADDED AN AFFILIATE')
                                        You were able to successfully add an affiliate at this time
                                    @elseif($log->action == 'AN AFFILIATE ADDED YOU')
                                        An affiliate was able to successfully add you at this time
                                    @endif
                                " style="cursor: pointer;">
                                    <td><div class="test"><a href="/profile/{{ $log->code }}/{{ str_slug($log->affiliate_name )}}" target="_blank"> {{ $log->affiliate_name }}</a></div></td>
                                    <td><div class="test">{{ $log->action }}</div></td>
                                    <td><div class="test">{{ $log->updated_at }}</div></td>

                                </tr>
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