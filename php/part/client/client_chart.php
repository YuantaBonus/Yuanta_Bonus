<?php

	$label_array = array();
	$value_array = array();

	for ($i=0; $i < $rows; $i++) { 
		if ($rs[$i]['bank_id'] == 1) 
    		$label_array[$i] = '國泰銀行';
    	else if ($rs[$i]['bank_id'] == 2) 
    		$label_array[$i] = '元大銀行';
    	else if ($rs[$i]['bank_id'] == 3) 
    		$label_array[$i] = '花旗銀行';

    	$value_array[$i] = $rs[$i]['value'];
	}
?>

<script type="text/javascript">
	$(function() {
	    myChart1(<?php echo json_encode($label_array); ?>,<?php echo json_encode($value_array); ?>);
	});

	$(function() {
	    myChart2(<?php echo json_encode($label_array); ?>,<?php echo json_encode($value_array); ?>);
	});

	$(function() {
	    myChart3();
	});
</script>