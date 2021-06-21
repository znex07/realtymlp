$(document).ready(function(e) {
    $('#btnApprove').click(function(e) {
        $('#listings').load('helper/listing_approve.php');
    });
	$('#btnReject').click(function(e) {
        $('#listings').load('helper/listing_reject.php');
    });
	$('#btnPending').click(function(e) {
        $('#listings').load('helper/listing_pending.php');
    });
	
	
	
	
	
	
});

// JavaScript Document