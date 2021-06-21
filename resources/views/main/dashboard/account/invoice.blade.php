<style>
.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
.invoice-detail {
	font-weight: 400;
	margin: 0 0 15px;
	line-height: 1;
	font-size: 16px;
}
</style>

    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Order # 00011</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-md-6">
    				
    					<h6>Billed To:</h6>
						<p class="invoice-detail">Joram Salinas</p>
						<p class="invoice-detail">1234 Main</p>
						<p class="invoice-detail">Apt. 4B</p>
						<p class="invoice-detail">Manhattan, ST 54321</p> 	
                </div>
    			
    		</div>
    		<div class="row">
    			<div class="col-md-6">
    				
    					<h6>Payment Method:</h6>
						<p class="invoice-detail">Visa ending **** 4242</p>
						<p class="invoice-detail">joramaquinosalinas@gmail.com</p>
				</div>
    			<div class="col-md-6 text-right">
    				<h6>Order Date:</h6>
						<p class="invoice-detail">October 21, 2015</p>			
    					
    			</div>
    		</div>
    	</div>
    </div>    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Invoice Contents</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Plan</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Qty.</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<tr>
    								<td>3 Months Plan</td>
    								<td class="text-center">Php 1,500.00</td>
    								<td class="text-center">1</td>
    								<td class="text-right">Php 1,500.00</td>
    							</tr>                         
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">Php 1,500.00</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>TAX</strong></td>
    								<td class="no-line text-right">Php 0.01</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right"><strong>Php 1,500.01</strong></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
