function client_eventWatch(){

	var event = myContractInstance.Exchange({},
				{
					fromBlock: 8063,
					toBlock: 'latest'
				});

			id = 1;
			event.get(function(error, result){
			  	if (!error){
				    console.log(result);
				    for (var i = result.length-1; i >=0; i--) {
				    	console.log(result[i].transactionHash);
						console.log(result[i].args.account);
						console.log(result[i].args.date);
						console.log(result[i].args.fee.c[0]);
						console.log(result[i].args.from);
						console.log(result[i].args.from_bonus.c[0]);
						console.log(result[i].args.to);
						console.log(result[i].args.to_bonus.c[0]);
						console.log(result[i].args.value.c[0]);

						var bank_yuanta_address ='0xf58f04539ada143abec19204500d501160c44436';
						var bank_citi_address ='0x13f42ecb9fbf94ff33cd22828070f2fa10048a27';
						var bank_cathay_address ='0xb27dc07c2984d9643449e3f9f8feb63236fc2c98';
						var seller_address = '0x4aaa9ba999f9f489d3ee2326906d6231759b24c4';

						if (result[i].args.from === bank_yuanta_address) {
							result[i].args.from = "元大銀行";
						}else if (result[i].args.from === bank_citi_address) {
							result[i].args.from = "花旗銀行";
						}else if (result[i].args.from === bank_cathay_address) {
							result[i].args.from = "國泰銀行";
						}

						if (result[i].args.to === bank_yuanta_address) {
							result[i].args.to = "元大銀行";
						}else if (result[i].args.to === bank_citi_address) {
							result[i].args.to = "花旗銀行";
						}else if (result[i].args.to === bank_cathay_address) {
							result[i].args.to = "國泰銀行";
						}
						else if (result[i].args.to === seller_address) {
							result[i].args.to = "Puma專賣店";
						}

						if (result[i].args.account === '0367821 0235641' || result[i].args.account === '0134589 0134285' || result[i].args.account === '0126839 0693256') {
							$("#recent_transaction").find('tbody')
						    .append($('<tr>')
						        .append($('<td>')
						        	.text(id++)
						        )
						        .append($('<td>')
						        	.text(result[i].args.from)
						        )
						        .append($('<td>')
						        	.append($('<span>')
						                .attr('class', 'label label-warning')
						                .text(result[i].args.from_bonus.c[0])
						            )	
						        )
						        .append($('<td>')
						        	.text(result[i].args.to)
						        )
						        .append($('<td>')
						        	.append($('<span>')
						                .attr('class', 'label label-success')
						                .text(result[i].args.to_bonus.c[0])
						            )
						        )
						        .append($('<td>')
						        	.append($('<span>')
						                .attr('class', 'label label-info')
						                .text(result[i].args.fee.c[0])
						            )
						        )
						        .append($('<td>')
						        	.text(result[i].args.date)
						        )
						        .append($('<td>')
						        	.attr('class', 'col-md-2')
						        	.append($('<button>')
						        		.attr('class', 'btn btn-info btn-sm')
						        		.attr('style', 'margin-right: 3px')
						        		.text('詳細資料')
					        		)
						        	.append($('<button>')
						        		.attr('class', 'btn btn-danger btn-xs')
						        		.attr('data-title', 'Delete')
						        		.attr('data-toggle', 'modal')
						        		.attr('data-target', '#delete')
						        		.append($('<span>')
						        			.attr('class', 'glyphicon glyphicon-trash')
						        		)
					        		)
						        )
						    );
						}

				    }
				}
			});
}

function bank_eventWatch(){

	var event = myContractInstance.Exchange(
				{
					from: '0x13f42ecb9fbf94ff33cd22828070f2fa10048a27'
				},
				{
					fromBlock: 8063,
					toBlock: 'latest'
				});

			var from_id = 1;
			event.get(function(error, result){
			  	if (!error){
				    console.log(result);
				    for (var i = result.length-1; i >=0; i--) {
				    	console.log(result[i].transactionHash);
						console.log(result[i].args.account);
						console.log(result[i].args.date);
						console.log(result[i].args.fee.c[0]);
						console.log(result[i].args.from);
						console.log(result[i].args.from_bonus.c[0]);
						console.log(result[i].args.to);
						console.log(result[i].args.to_bonus.c[0]);
						console.log(result[i].args.value.c[0]);

						var bank_yuanta_address='0xf58f04539ada143abec19204500d501160c44436';
						var bank_citi_address='0x13f42ecb9fbf94ff33cd22828070f2fa10048a27';
						var bank_cathay_address='0xb27dc07c2984d9643449e3f9f8feb63236fc2c98';
						var seller_address = '0x4aaa9ba999f9f489d3ee2326906d6231759b24c4';

						if (result[i].args.from === bank_yuanta_address) {
							result[i].args.from = "元大銀行";
						}else if (result[i].args.from === bank_citi_address) {
							result[i].args.from = "花旗銀行";
						}else if (result[i].args.from === bank_cathay_address) {
							result[i].args.from = "國泰銀行";
						}

						if (result[i].args.to === bank_yuanta_address) {
							result[i].args.to = "元大銀行";
						}else if (result[i].args.to === bank_citi_address) {
							result[i].args.to = "花旗銀行";
						}else if (result[i].args.to === bank_cathay_address) {
							result[i].args.to = "國泰銀行";
						}else if (result[i].args.to === seller_address) {
							result[i].args.to = "Puma專賣店";
						}

						$("#recent_transaction_out").find('tbody')
						    .append($('<tr>')
						        .append($('<td>')
						        	.text(from_id++)
						        )
						        .append($('<td>')
						        	.text(result[i].args.from)
						        )
						        .append($('<td>')
						        	.append($('<span>')
						                .attr('class', 'label label-warning')
						                .text(result[i].args.from_bonus.c[0])
						            )	
						        )
						        .append($('<td>')
						        	.text(result[i].args.to)
						        )
						        .append($('<td>')
						        	.append($('<span>')
						                .attr('class', 'label label-success')
						                .text(result[i].args.to_bonus.c[0])
						            )
						        )
						        .append($('<td>')
						        	.append($('<span>')
						                .attr('class', 'label label-info')
						                .text(result[i].args.fee.c[0])
						            )
						        )
						        .append($('<td>')
						        	.text(result[i].args.date)
						        )
						        .append($('<td>')
						        	.attr('class', 'col-md-2')
						        	.append($('<button>')
						        		.attr('class', 'btn btn-info btn-sm')
						        		.attr('style', 'margin-right: 3px')
						        		.text('詳細資料')
					        		)
						        	.append($('<button>')
						        		.attr('class', 'btn btn-danger btn-xs')
						        		.attr('data-title', 'Delete')
						        		.attr('data-toggle', 'modal')
						        		.attr('data-target', '#delete')
						        		.append($('<span>')
						        			.attr('class', 'glyphicon glyphicon-trash')
						        		)
					        		)
						        )
						    );
				    }
				}
			});

	var event = myContractInstance.Exchange(
				{
					to: '0x13f42ecb9fbf94ff33cd22828070f2fa10048a27'
				},
				{
					fromBlock: 6000,
					toBlock: 'latest'
				});

			var to_id = 1;
			event.get(function(error, result){
			  	if (!error){
				    console.log(result);
				    for (var i = result.length-1; i >=0; i--) {
				    	console.log(result[i].transactionHash);
						console.log(result[i].args.account);
						console.log(result[i].args.date);
						console.log(result[i].args.fee.c[0]);
						console.log(result[i].args.from);
						console.log(result[i].args.from_bonus.c[0]);
						console.log(result[i].args.to);
						console.log(result[i].args.to_bonus.c[0]);
						console.log(result[i].args.value.c[0]);

						var bank_yuanta_address='0xf58f04539ada143abec19204500d501160c44436';
						var bank_citi_address='0x13f42ecb9fbf94ff33cd22828070f2fa10048a27';
						var bank_cathay_address='0xb27dc07c2984d9643449e3f9f8feb63236fc2c98';

						if (result[i].args.from === bank_yuanta_address) {
							result[i].args.from = "元大銀行";
						}else if (result[i].args.from === bank_citi_address) {
							result[i].args.from = "花旗銀行";
						}else if (result[i].args.from === bank_cathay_address) {
							result[i].args.from = "國泰銀行";
						}

						if (result[i].args.to === bank_yuanta_address) {
							result[i].args.to = "元大銀行";
						}else if (result[i].args.to === bank_citi_address) {
							result[i].args.to = "花旗銀行";
						}else if (result[i].args.to === bank_cathay_address) {
							result[i].args.to = "國泰銀行";
						}

						$("#recent_transaction_in").find('tbody')
						    .append($('<tr>')
						        .append($('<td>')
						        	.text(to_id++)
						        )
						        .append($('<td>')
						        	.text(result[i].args.from)
						        )
						        .append($('<td>')
						        	.append($('<span>')
						                .attr('class', 'label label-warning')
						                .text(result[i].args.from_bonus.c[0])
						            )	
						        )
						        .append($('<td>')
						        	.text(result[i].args.to)
						        )
						        .append($('<td>')
						        	.append($('<span>')
						                .attr('class', 'label label-success')
						                .text(result[i].args.to_bonus.c[0])
						            )
						        )
						        .append($('<td>')
						        	.append($('<span>')
						                .attr('class', 'label label-info')
						                .text(result[i].args.fee.c[0])
						            )
						        )
						        .append($('<td>')
						        	.text(result[i].args.date)
						        )
						        .append($('<td>')
						        	.attr('class', 'col-md-2')
						        	.append($('<button>')
						        		.attr('class', 'btn btn-info btn-sm')
						        		.attr('style', 'margin-right: 3px')
						        		.text('詳細資料')
					        		)
						        	.append($('<button>')
						        		.attr('class', 'btn btn-danger btn-xs')
						        		.attr('data-title', 'Delete')
						        		.attr('data-toggle', 'modal')
						        		.attr('data-target', '#delete')
						        		.append($('<span>')
						        			.attr('class', 'glyphicon glyphicon-trash')
						        		)
					        		)
						        )
						    );
				    }
				}
			});
}

function seller_eventWatch(){

	var event = myContractInstance.Exchange(
				{
					to: '0x4aaa9ba999f9f489d3ee2326906d6231759b24c4'
				},
				{
					fromBlock: 8063,
					toBlock: 'latest'
				});

			id = 1;
			event.get(function(error, result){
			  	if (!error){
				    console.log(result);
				    for (var i = result.length-1; i >=0; i--) {
				    	console.log(result[i].transactionHash);
						console.log(result[i].args.account);
						console.log(result[i].args.date);
						console.log(result[i].args.fee.c[0]);
						console.log(result[i].args.from);
						console.log(result[i].args.from_bonus.c[0]);
						console.log(result[i].args.to);
						console.log(result[i].args.to_bonus.c[0]);
						console.log(result[i].args.value.c[0]);

						var bank_yuanta_address='0xf58f04539ada143abec19204500d501160c44436';
						var bank_citi_address='0x13f42ecb9fbf94ff33cd22828070f2fa10048a27';
						var bank_cathay_address='0xb27dc07c2984d9643449e3f9f8feb63236fc2c98';
						var seller_address = '0x4aaa9ba999f9f489d3ee2326906d6231759b24c4'

						if (result[i].args.from === bank_yuanta_address) {
							result[i].args.from = "元大銀行";
						}else if (result[i].args.from === bank_citi_address) {
							result[i].args.from = "花旗銀行";
						}else if (result[i].args.from === bank_cathay_address) {
							result[i].args.from = "國泰銀行";
						}

						result[i].args.to = "Puma專賣店";

						$("#recent_transaction").find('tbody')
						    .append($('<tr>')
						        .append($('<td>')
						        	.text(id++)
						        )
						        .append($('<td>')
						        	.text('PUMA慢跑鞋')
						        )
						        .append($('<td>')
						        	.append($('<span>')
						                .attr('class', 'label label-warning')
						                .text(3999)
						            )	
						        )
						        .append($('<td>')
						        	.text(result[i].args.account)
						        )
						        .append($('<td>')
						        	.append($('<span>')
						                .attr('class', 'label label-success')
						                .text(result[i].args.value.c[0])
						            )
						        )
						        .append($('<td>')
						        	.append($('<span>')
						                .attr('class', 'label label-info')
						                .text(result[i].args.fee.c[0])
						            )
						        )
						        .append($('<td>')
						        	.text(result[i].args.date)
						        )
						        .append($('<td>')
						        	.attr('class', 'col-md-2')
						        	.append($('<button>')
						        		.attr('class', 'btn btn-info btn-sm')
						        		.attr('style', 'margin-right: 3px')
						        		.text('詳細資料')
					        		)
						        	.append($('<button>')
						        		.attr('class', 'btn btn-danger btn-xs')
						        		.attr('data-title', 'Delete')
						        		.attr('data-toggle', 'modal')
						        		.attr('data-target', '#delete')
						        		.append($('<span>')
						        			.attr('class', 'glyphicon glyphicon-trash')
						        		)
					        		)
						        )
						    );
				    }
				}
			});
}