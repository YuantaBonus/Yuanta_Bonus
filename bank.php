<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>元大紅利 | 銀行專區</title>

	<!-- 套用bootstrap -->		<!-- 更改網址來更新css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<!-- 套用自訂css -->
	<link type="text/css" href="./css/bank.css?ver=3" rel="stylesheet"/>

	<!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- 套用bootstrap.js --> <!-- 一定要擺在jquery之後 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<!-- 套用 Ethereum 相關 api -->
	<script type="text/javascript" src="./node_modules/bignumber.js/bignumber.min.js"></script>
	<script type="text/javascript" src="./dist/web3.js"></script>
	<!-- my contract -->
	<script src="js/contract.js"></script>
	<!-- get event -->
	<script src="js/event.js"></script>
	<!-- bootbox -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

	<link rel="shortcut icon" type="image/png" href="./images/logo.jpg"/>	<!-- 分頁上的 小icon -->
</head>

<?php
	include('php/query/bank_data.php');
?>

<script>	
	
	window.onload = function(){

		//bootbox.alert("此網站無任何商業行為，純粹為學術研究，請勿當真。");

		document.getElementById('top_yuanta_coin_balance').innerText = myContractInstance.balanceOf('0x13f42ecb9fbf94ff33cd22828070f2fa10048a27').c[0];

		document.getElementById('yuanta_coin_balance').innerText = myContractInstance.balanceOf('0x13f42ecb9fbf94ff33cd22828070f2fa10048a27').c[0];

		var total_value = <?php echo $total_value;?>;
		document.getElementById('bonus_total_value').innerText = 
		total_value;

		bank_eventWatch();
	};


	function send_coin_transaction(){		// 在銀行之間轉移元大幣
	
		$.LoadingOverlay("show");	// loading 動畫


		bootbox.alert("兌換成功");	//瀏覽器 會 顯示 交易成功視窗


		$('#account_modal').modal('hide');	//隱藏交換點數視窗
		$.LoadingOverlay("hide");	//隱藏 loading 動畫
	}

	function coin_calculate(){  //計算手續費(0.5%)

		var amount = document.getElementById("amount").value;

		var fee = Math.round(amount * 0.005);

		document.getElementById("fee").innerText = fee;
	}


</script>

<body>
	<body id="myPage" data-spy="scroll" data-target="#myNavbar" data-offset="50">	<!-- ScrollSpy -->
	<!-- 導覽列 -->
	<nav class="navbar navbar-inverse  navbar-fixed-top">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>                        
		  </button>
		  <a class="navbar-brand" href="#myPage"><img src="images/logo.png" width="150" alt=""></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
		  <ul class="nav navbar-nav navbar-right">
		  	<!-- <li><a href="#intro">簡介</a></li>
        	<li><a href="#bonus">紅利</a></li> -->
        	<li>
        		<a href="./index.html">
		        	<i class="glyphicon glyphicon-home"></i>
		        		首頁
		        </a>
		    </li>
        	<li>
        		<a href="./shopping_example/details.html">
        			<i class="glyphicon glyphicon-shopping-cart"></i>
        				購物
        		</a>
        	</li>
        	<!-- <li>
				<a href="php/account/regist.php">
					<span class="glyphicon glyphicon-user"></span>
						註冊
				</a>
			</li> -->
			<li>
				<a href="./client.php">
					<span class="glyphicon glyphicon-log-in"></span> 
						用戶
				</a>
			</li>
		  </ul>
		</div>
	  </div>
	</nav>
	<!-- 導覽列結束 -->

	<!-- 銀行資料 -->
	<div class="container">
		<div class="alert alert-danger">
		  <strong>注意!</strong> 此網站無任何商業行為，純粹為學術研究，請勿當真。
		</div>
		<div class="jumbotron" id="member">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<img src="images/citi_logo.png" alt="..." class="img-thumbnail center-block">
					<button type="submit" id="sign" class="btn btn-primary btn-md center-block" style="margin-top: 10px">更換圖片</button>
				</div>
				<div class="col-sm-6 col-sm-offset-1">
			  		<table class="table table-user-information table-hover">
                    <tbody>
   		 			  <tr>
                        <td>名稱:</td>
                        <td>花旗銀行</td>
                      </tr>
                      <tr>
                        <td>帳號:</td>
                        <td>citi</td>
                      </tr>
                      <tr>
                        <td>密碼:</td>
                        <td>****</td>
                      </tr>
                      <tr>
                        <td>代號:</td>
                        <td>1234</td>
                      </tr>
                      <tr>
                        <td>花旗點數總額:</td>
                        <td  id="bonus_total_value">0</td>
                      </tr>
                      <tr>
                        <td>元大幣餘額:</td>
                        <td id="top_yuanta_coin_balance">0</td>
                      </tr>
                    </tbody>
                  </table>
                  <button type="submit" id="sign" class="btn btn-primary btn-md center-block" style="margin-top: 10px">編輯資料</button>
			  	</div>
			</div>
		</div>
		<hr/>
	</div>
	<!-- 銀行資料結束 -->

	<!-- 元大幣帳戶 -->
	<div class="container">
		<div class="row" id="div_account">
			<h1>元大幣帳戶管理</h1>
			
	        <div class="table-responsive col-md-12">
	            <table class="table table-hover" id = "account_table">
	               <thead>
	                    <tr>
	                    	<th>#</th>
	                    	<th>錢包地址</th>
	                    	<th>目前持有元大幣</th>	 
	                        <!-- <th>更新日期</th> -->
	                        <th>動作</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	<tr>
	                		<td>1</td>
	                		<td>0x13f42ecb9fbf94ff33cd22828070f2fa10048a27</td>
	                		<td><span class="label label-success" id="yuanta_coin_balance">0</span></td>
                            <!-- <td>2017-4-21</td>	  -->               	
                            <td cass="col-md-2">
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#coin_modal" style="margin-right: 3px"">兌換元大幣</button>
                                <button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button>
                            </td>
                        </tr>
	                </tbody>
	            </table>
	        </div>
		</div>
		<hr>
	</div>
	<!-- 元大幣帳戶結束 -->

	<!-- coin_popup -->	
	<div class="container">
	  <!-- Account Modal -->
	  <div class="modal fade" id="coin_modal" role="dialog">
	    <div class="modal-dialog">
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">兌換元大幣</h4>
	        </div>
	        <form class="form-horizontal" method="post" id="exchange_form" name="exchange_form" action="javascript:send_coin_transaction();">
		        <div class="modal-body">
		        	<div class="form-group">
						<label for="bank" class="col-sm-3 control-label">錢包地址:</label>
						<div class="col-sm-9">
							<p class="p_form">0x13f42ecb9fbf94ff33cd22828070f2fa10048a27</p>
						</div>
					</div>
					<div class="form-group">
						<label for="number" class="col-sm-3 control-label">欲換點數:</label>
						<div class="col-sm-9">
					    	<input type="number" id="amount" placeholder="輸入點數" class="form-control" onkeyup="coin_calculate()" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="bank" class="col-sm-3 control-label">轉入帳戶:</label>
						<div class="col-sm-9">
							<select id="to_bank" class="form-control">
								<option value="1">元大銀行</option>
								<option value="2">國泰銀行</option>
								<option value="3">花旗銀行</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="number" class="col-sm-3 control-label">手續費:</label>
						<div class="col-sm-9">
					    	<p id="fee" class="p_form">0點</p>
					    	<p class="p_form">至少收取1點</p>
						</div>
					</div>
		        </div>
		        <div class="modal-footer">
		        	 <button type="submit" class="btn btn-primary" id="sign" onclick="send_coin_transaction()">確認兌換</button>
		        </div>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- coin_popup 結束-->

	<!-- 客戶帳戶管理 -->
	<div class="container">
		<div class="row" id="div_account">
			<h1 style="margin-left: 10px">客戶帳戶管理</h1>
	        <div class="table-responsive col-md-12">
	            <table class="table table-hover">
	               <thead>
	                    <tr>
	                    	<th>#</th>
	                        <th>帳戶號碼</th>
	                        <th>擁有者姓名</th>
	                        <th>剩餘點數</th>
                        	<th>新增日期</th>
	                        <th>動作</th>
	                    </tr>
	                </thead>
	                <tbody>
                        <?php 
	                		include('php/part/bank/bank_account.php');
	                	 ?>
	                </tbody>
	            </table>
	        </div>
	        <div class="pull-right col-md-3 col-md-offset-9">
	            <ul class="pagination">
	                <li><a href="#">«</a></li>
	                <li class="active"><a href="#">1</a></li>
	                <li><a href="#">2</a></li>
	                <li><a href="#">3</a></li>
	                <li><a href="#">»</a></li>
	            </ul>
	        </div>
		</div>
		<hr>
	</div>
	<!-- 客戶帳戶管理結束 -->

	<!-- 最近交易_轉出 -->
	<div class="container" >
		<div class="row" id="div_history_out">
			<h1 style="margin-left: 10px">最近交易_轉出</h1>
	        <div class="table-responsive col-md-12">
	            <table class="table table-hover" id="recent_transaction_out">
	            	<thead>
	                    <tr>
	                    	<th>#</th>
	                        <th>轉出帳戶</th>
	                        <th>花費點數</th>
	                        <th>轉入帳戶</th>
                        	<th>獲得點數</th>
                        	<th>手續費</th>
	                        <th>交易日期</th>
	                        <th>動作</th>
	                    </tr>
	                </thead>
	                <tbody>
    
	                </tbody>
	            </table>
	        </div>
	        <div class="pull-right col-md-3 col-md-offset-9">
	            <ul class="pagination">
	                <li><a href="#">«</a></li>
	                <li class="active"><a href="#">1</a></li>
	                <li><a href="#">2</a></li>
	                <li><a href="#">3</a></li>
	                <li><a href="#">»</a></li>
	            </ul>
	        </div>
		</div>
		<hr>
	</div>
	<!-- 最近交易_轉出結束 -->

	<!-- 最近交易_轉入 -->
	<div class="container">
		<div class="row" id="div_history_in">
			<h1 style="margin-left: 10px">最近交易_轉入</h1>
	        <div class="table-responsive col-md-12">
	            <table class="table table-hover" id="recent_transaction_in">
	            	<thead>
	                    <tr>
	                    	<th>#</th>
	                        <th>轉出帳戶</th>
	                        <th>花費點數</th>
	                        <th>轉入帳戶</th>
                        	<th>獲得點數</th>
                        	<th>手續費</th>
	                        <th>交易日期</th>
	                        <th>動作</th>
	                    </tr>
	                </thead>
	                <tbody>
    
	                </tbody>
	            </table>
	        </div>
	        <div class="pull-right col-md-3 col-md-offset-9">
	            <ul class="pagination">
	                <li><a href="#">«</a></li>
	                <li class="active"><a href="#">1</a></li>
	                <li><a href="#">2</a></li>
	                <li><a href="#">3</a></li>
	                <li><a href="#">»</a></li>
	            </ul>
	        </div>
		</div>
	</div>
	<!-- 最近交易_轉入結束 -->

	<!-- 合作銀行列表開始 -->
		<?php include('php/part/cooperate_banklist.php'); ?>
	<!-- 合作銀行列表結束 -->

	<!-- 頁尾  -->
		<?php include('php/part/footer.php'); ?>	
	<!-- 頁尾結束  -->

</body>
</html>